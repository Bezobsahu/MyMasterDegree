# -*- coding: utf-8 -*-

import os
import sys

from osgeo import gdal

from qgis.PyQt import uic
from qgis.PyQt import QtWidgets
from qgis.core import * 
import qgis.processing

import cv2
import numpy as np
from PIL import Image
import imutils

#for reading path of project
from qgis.core import QgsProject

# This loads your .ui file so that PyQt can populate your plugin with the elements from Qt Designer
FORM_CLASS, _ = uic.loadUiType(os.path.join(os.path.dirname(__file__), 'gap_detection_dialog_base.ui'))


class GapDetectionDialog(QtWidgets.QDialog, FORM_CLASS):
    def __init__(self, parent=None):
        """Constructor."""
        super(GapDetectionDialog, self).__init__(parent)
        # Set up the user interface from Designer through FORM_CLASS.
        # After self.setupUi() you can access any designer object by doing
        # self.<objectname>, and you can use autoconnect slots - see
        # http://qt-project.org/doc/qt-4.8/designer-using-a-ui-file.html
        # #widgets-and-dialogs-with-auto-connect
        self.setupUi(self)

        self.layer_names = []
        self.all_layers = []
        # 
        for layer in QgsProject.instance().mapLayers().values():
            self.layer_names.append(layer.name())
            self.all_layers.append(layer)
            
        

        # Filling combox 1 
        self.cbLayers.addItems(self.layer_names)

        # Filling combox 2
        self.cbLayers_2.addItems(self.layer_names)


        #Pushbutons
        self.pbHello.clicked.connect(self.pbHelloClicked)
        self.pbLoadFile.clicked.connect(self.LoadFile)

    def pbHelloClicked(self):
        index = self.cbLayers.currentIndex()
        input_raster = self.all_layers[index]
        index2 = self.cbLayers_2.currentIndex()
        input_vector = self.all_layers[index2]
        pathOfProject = QgsProject.instance().readPath("./")
        nameOfFile="RasterCropedLayer"
        completeName= pathOfProject+"/"+nameOfFile+".tif"
        qgis.processing.run("gdal:cliprasterbymasklayer", {'INPUT': input_raster,'MASK': input_vector,'OUTPUT': completeName})
        

        # Vytvoří výslednou rastrovou vrstvu a přidejte ji do projektu
        #result_raster = QgsRasterLayer(completeName, input_raster.name()+'result')
        #QgsProject.instance().addMapLayer(result_raster)

        clipped_raster=QgsRasterLayer(completeName)
        
        completeName2= pathOfProject+"/"+nameOfFile+"binar.tif"
        cordinates=QgsCoordinateReferenceSystem('EPSG:32633')
        print(type(cordinates))
        # Spustí funkci rasterCalculator
        qgis.processing.run("qgis:rastercalculator", {'INPUT': clipped_raster, 'BAND': [1, 2, 3], 'LAYERS': clipped_raster, 'EXPRESSION': '2 * RasterCropedLayer@2 - RasterCropedLayer@1 - RasterCropedLayer@3', 'CRS':cordinates, 'OUTPUT': completeName2})
        #qgis.processing.run("qgis:rastercalculator", {'INPUT': clipped_raster, 'BAND': [1, 2, 3], 'LAYERS': clipped_raster, 'EXPRESSION': '(2 * RasterCropedLayer@2 - RasterCropedLayer@1 - RasterCropedLayer@3)/(2 * RasterCropedLayer@2 + RasterCropedLayer@1 + RasterCropedLayer@3)', 'CRS':cordinates, 'OUTPUT': completeName2})
        # Vytvoří výslednou rastrovou vrstvu a přidejte ji do projektu
        #result_raster = QgsRasterLayer(completeName2, input_raster.name()+'ResultBinar')
        #QgsProject.instance().addMapLayer(result_raster)

        #Najde souřadnice rohů
        xmin=clipped_raster.extent().xMinimum()
        ymin=clipped_raster.extent().yMinimum()
        xmax=clipped_raster.extent().xMaximum()
        ymax=clipped_raster.extent().yMaximum()
        print(xmin,ymin)


        layer =  QgsVectorLayer('Point?crs=epsg:32633','MyPoint',"memory") 
        pr = layer.dataProvider() 
        pt = QgsFeature()
        pt2 = QgsFeature()
        point1 = QgsPointXY(xmax,ymin)
        point2 = QgsPointXY(xmin,ymax)
        
        pt.setGeometry(QgsGeometry.fromPointXY(point1))
        pt2.setGeometry(QgsGeometry.fromPointXY(point2))
        pr.addFeatures([pt])
        pr.addFeatures([pt2])
        QgsProject.instance().addMapLayer(layer)

        print(type(completeName2))
        im = Image.open(completeName2)
        image_data = np.array(im)
        print(type(image_data))
        print(completeName2)
        

        # encode image
        _, img_encoded = cv2.imencode('.jpg', image_data)

        # decode image
        img_decoded = cv2.imdecode(img_encoded, 1)

        gray = cv2.cvtColor(img_decoded, cv2.COLOR_BGR2GRAY)
        #blurred = cv2.GaussianBlur(gray, (0,0), 2,3500)
        #thresh = cv2.threshold(blurred, 42, 255, cv2.THRESH_TOZERO)[1]
        
        blurred=cv2.GaussianBlur(gray,[0,0],sigmaY=2,sigmaX=2,borderType=cv2.BORDER_ISOLATED)
        thresh= cv2.threshold(blurred,100,250,cv2.THRESH_OTSU)[1]
        edges = cv2.Canny(thresh,10,10)
        cnts = cv2.findContours(edges.copy(), cv2.RETR_TREE, cv2.CHAIN_APPROX_NONE)
        cnts = imutils.grab_contours(cnts)
        
      
        linesP = cv2.HoughLinesP(thresh,42, np.pi / 180, threshold=420, minLineLength=700, maxLineGap=1)
        print(linesP)

        if linesP is not None:
            for i in range(0, len(linesP)):
                l = linesP[i][0]
                cv2.line(gray, (l[0], l[1]), (l[2], l[3]), (150,0,0), 1)
                
       

        height, width, channels = img_decoded.shape
        max_x = width 
        max_y = height

        cv2.circle(img_decoded, (max_x, max_y), 10, (255, 255, 255), -1)
        
        print(int(max_x),int(max_y))
        print(int(xmax-xmin),int(ymax-ymin))
        kx=max_x/(xmax-xmin)
        ky=max_y/(ymax-ymin)


        #show the image
        for c in cnts:
            M = cv2.moments(c)
            if M["m00"] >0:
            # compute the center of the contour
                
                cX = int(M["m10"] / M["m00"])
                cY = int(M["m01"] / M["m00"])

                # draw the contour and center of the shape on the image
                
                cv2.circle(img_decoded, (cX, cY), 2, (0, 255, 255), -1)
                prepocetx=xmin+(cX/kx)
                prepocety=ymax-(cY/ky)
                pt3 = QgsFeature()
                point3 = QgsPointXY(prepocetx,prepocety)
        
                pt3.setGeometry(QgsGeometry.fromPointXY(point3))
                pr.addFeatures([pt3])
                

            # show the image

        prepocetx=xmin+(max_x/kx)
        prepocety=ymax-(max_y/ky)
        pt3 = QgsFeature()
        point3 = QgsPointXY(prepocetx,prepocety)
        
        pt3.setGeometry(QgsGeometry.fromPointXY(point3))
        pr.addFeatures([pt3])
        QgsProject.instance().addMapLayer(layer)

        cv2.drawContours(img_decoded, cnts, -1, (0, 255, 0), 1)
        img=img_decoded
        blurred=cv2.GaussianBlur(gray,[0,0],sigmaY=2,sigmaX=2,borderType=cv2.BORDER_ISOLATED)
        
        # Display the image
        cv2.imshow('lines', gray)
        #cv2.imshow('edges', edges)
        cv2.imshow('tresh', thresh)

        cv2.imshow("Image", img_decoded)       
        cv2.imshow("Image2", blurred)      
        cv2.waitKey(0)
                  
        
    def LoadFile (self):

       
        pathOfProject = QgsProject.instance().readPath("./")
        nameOfFile="layerWithPoints"
        completeName= pathOfProject+"/"+nameOfFile+".txt"
        print(completeName)
        pointLayer = open(completeName,"w") 
        pointLayer.write( "nejake souradnice 00 1122 111")
        pointLayer.close()
        print(pathOfProject)
        
