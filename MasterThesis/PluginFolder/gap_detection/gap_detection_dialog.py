# -*- coding: utf-8 -*-

import os
import sys

from osgeo import gdal

from qgis.PyQt import uic
from qgis.PyQt import QtWidgets
from qgis.core import * 
import qgis.processing
from PyQt5.QtCore import QVariant


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

       
        
        # Pushbutons
        self.pbPotvrdit.clicked.connect(self.pbPotvrditClicked)
        self.pbZavrit.clicked.connect(self.LoadFile)

        

    def pbPotvrditClicked(self):
        # Load the layers to variables
        index = self.cbLayers.currentIndex()
        input_raster = self.all_layers[index]
        index2 = self.cbLayers_2.currentIndex()
        input_vector = self.all_layers[index2]
        index3 = self.cbLayers_3.currentIndex()
        input_vector_line = self.all_layers[index3]

        # Find path to the project
        path_of_project = QgsProject.instance().readPath("./")
        # Create path to croped raster
        name_of_file="RasterCropedLayer"
        complete_path_of_cliped_raster= path_of_project+"/"+name_of_file+".tif"

        # Clip raster by mask layer and save it to project folder
        qgis.processing.run("gdal:cliprasterbymasklayer", {'INPUT': input_raster,'MASK': input_vector,'OUTPUT': complete_path_of_cliped_raster})
        
        # Open cliped raster
        clipped_raster=QgsRasterLayer(complete_path_of_cliped_raster)

        # Create path to raster calculator result
        complete_path_of_raster_calculator_result= path_of_project+"/"+name_of_file+"binar.tif"

        # Set cordinates used in raster calculator
        global_cordinates='epsg:32633'
        cordinates=QgsCoordinateReferenceSystem(global_cordinates)

        # Calculate NDVI raster and save it to project folder
        qgis.processing.run("qgis:rastercalculator", {'INPUT': clipped_raster, 'BAND': [1, 2, 3], 'LAYERS': clipped_raster, 'EXPRESSION': '2 * RasterCropedLayer@2 - RasterCropedLayer@1 - RasterCropedLayer@3', 'CRS':cordinates, 'OUTPUT': complete_path_of_raster_calculator_result})
        # Calculate difernt index
        #qgis.processing.run("qgis:rastercalculator", {'INPUT': clipped_raster, 'BAND': [1, 2, 3], 'LAYERS': clipped_raster, 'EXPRESSION': '(2 * RasterCropedLayer@2 - RasterCropedLayer@1 - RasterCropedLayer@3)/(2 * RasterCropedLayer@2 + RasterCropedLayer@1 + RasterCropedLayer@3)', 'CRS':cordinates, 'OUTPUT': complete_path_of_raster_calculator_result})
        
        # Show NDVI raster in interface if is checkbox checked
        if self.checkBoxShowNDVI.isChecked():
            QgsProject.instance().addMapLayer(QgsRasterLayer(complete_path_of_raster_calculator_result, input_raster.name()+' NDVI'))

        # Find and save cordinates of raster corners
        xmin=clipped_raster.extent().xMinimum()
        ymin=clipped_raster.extent().yMinimum()
        xmax=clipped_raster.extent().xMaximum()
        ymax=clipped_raster.extent().yMaximum()

        # Create to points layers
        layer =  QgsVectorLayer('Point?crs='+global_cordinates,'Body všech rostlin',"memory") 
        layer_filtered =  QgsVectorLayer('Point?crs='+global_cordinates,'Body roslin v řádku',"memory") 
        pr = layer.dataProvider()
        pr2 = layer_filtered.dataProvider()

        # This create testing points in coners
            #pt = QgsFeature()
            #pt2 = QgsFeature()
            #point1 = QgsPointXY(xmax,ymin)
            #point2 = QgsPointXY(xmin,ymax)
            
            #pt.setGeometry(QgsGeometry.fromPointXY(point1))
            #pt2.setGeometry(QgsGeometry.fromPointXY(point2))
            #pr.addFeatures([pt])
            #pr.addFeatures([pt2])
        
        # Converting raster (geoTiff) to numpy array
        im = Image.open(complete_path_of_raster_calculator_result)
        image_data = np.array(im)       

        # Encode image
        _, img_encoded = cv2.imencode('.jpg', image_data)

        # Decode image
        img_decoded = cv2.imdecode(img_encoded, 1)

        gray = cv2.cvtColor(img_decoded, cv2.COLOR_BGR2GRAY)
        
        
        
        blurred=cv2.GaussianBlur(gray,[0,0],sigmaY=1,sigmaX=1,borderType=cv2.BORDER_ISOLATED)
        thresh= cv2.threshold(blurred,42,250,cv2.THRESH_OTSU)[1]
        edges = cv2.Canny(thresh,10,10)
        cnts = cv2.findContours(edges.copy(), cv2.RETR_TREE, cv2.CHAIN_APPROX_NONE)
        
        cnts = imutils.grab_contours(cnts)
        
      
       
                
       

        height, width, channels = img_decoded.shape
        max_x = width 
        max_y = height

        cv2.circle(img_decoded, (max_x, max_y), 10, (255, 255, 255), -1)
        
        print(int(max_x),int(max_y))
        print(int(xmax-xmin),int(ymax-ymin))
        kx=max_x/(xmax-xmin)
        ky=max_y/(ymax-ymin)
        
        pt3 = QgsFeature()
        #show the image
        memOfMoments=0
        for c in cnts:
            M = cv2.moments(c)
            if M["m00"] >0:
            # compute the center of the contour
                cX = int(M["m10"] / M["m00"])
                cY = int(M["m01"] / M["m00"])
                if(cX+cY!=memOfMoments and cX+cY+1!=memOfMoments and cX+cY-1!=memOfMoments):
                # draw the contour and center of the shape on the image
                
                    cv2.circle(img_decoded, (cX, cY), 2, (0, 255, 255), -1)
                    prepocetx=xmin+(cX/kx)
                    prepocety=ymax-(cY/ky)
                    
                    point3 = QgsPointXY(prepocetx,prepocety)
            
                    pt3.setGeometry(QgsGeometry.fromPointXY(point3))
                    pr.addFeatures([pt3])
                memOfMoments=cX+cY

            # show the image

        if self.checkBoxShowAllPoints.isChecked():
            QgsProject.instance().addMapLayer(layer)
        

        # add row "pocet" to atributs in input_vector_line, id does not exist yet
        if "Pocet" not in input_vector_line.fields().names():
            input_vector_line.dataProvider().addAttributes([QgsField("Pocet", QVariant.Int)])
            input_vector_line.updateFields()

        # add row "mezerovost" to atributs in input_vector_line, id does not exist yet
        if "mezerovost" not in input_vector_line.fields().names():
            input_vector_line.dataProvider().addAttributes([QgsField("mezerovost", QVariant.Double)])
            input_vector_line.updateFields()

        # Find row with "pocet"
        pocet_index = input_vector_line.fields().indexFromName("Pocet")

        # Find row with "mezerovost"
        mezerovitost_index = input_vector_line.fields().indexFromName("mezerovost")
    

        pt4 = QgsFeature()
        
        # projít každou funkci v input_vector_line vrstvě a přiřadit hodnotu 
        input_vector_line.startEditing()

        for linie in input_vector_line.getFeatures():
            point_count=0
             # vytvořit polygonální oblast kolem linie
            buffer_distance = 0.25 # poloměr oblasti v metrech
            buffered_line = linie.geometry().buffer(buffer_distance,0.25)
            request = QgsFeatureRequest().setFilterRect(buffered_line.boundingBox())
            # vytáhnout body z vrstvy `layer`, které se nacházejí v této oblasti
            for point_feat in layer.getFeatures(request):
                if buffered_line.distance(point_feat.geometry()) <= buffer_distance:
                    
                    
            
                    pt4.setGeometry(point_feat.geometry())
                    pr2.addFeatures([pt4])
                    
                    point_count += 1
            
            pocetNaUsek=self.spinBoxPocetNaUsek.value()
            mezerovitost = point_count/((linie.geometry().length()/self.spinBoxDelkaUseku.value())*pocetNaUsek)
            mezerovitost=round((100*mezerovitost),3)
            print(mezerovitost)
            input_vector_line.changeAttributeValue(linie.id(), pocet_index, point_count)
            input_vector_line.changeAttributeValue(linie.id(), mezerovitost_index, mezerovitost)

            


        input_vector_line.commitChanges() 
        # Reload vector layer atributes       
        QgsProject.instance().addMapLayer(input_vector_line)
        # Show filtered points        
        QgsProject.instance().addMapLayer(layer_filtered)

        cv2.drawContours(img_decoded, cnts, -1, (0, 255, 0), 1)
      
        
        
        # Display the image
        #cv2.imshow('lines', gray)
        #cv2.imshow('edges', edges)
        if self.checkBoxTresh.isChecked():
            cv2.imshow('Tresh', thresh)
        if self.checkBoxContures.isChecked():
            cv2.imshow("Image", img_decoded)
        if self.checkBoxBlured.isChecked():
            cv2.imshow("Blured", blurred)      
        cv2.waitKey(0)
                  
        
    def LoadFile (self):

       
        path_of_project = QgsProject.instance().readPath("./")
        name_of_file="layerWithPoints"
        complete_path_of_cliped_raster= path_of_project+"/"+name_of_file+".txt"
        print(complete_path_of_cliped_raster)
        pointLayer = open(complete_path_of_cliped_raster,"w") 
        pointLayer.write( "nejake souradnice 00 1122 111")
        pointLayer.close()
        print(path_of_project)
        
