# -*- coding: utf-8 -*-

import os
import sys

from osgeo import gdal

from qgis.PyQt import uic
from qgis.PyQt import QtWidgets
from qgis.core import * 
import qgis.processing
from PyQt5.QtCore import QVariant

import datetime
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

        
        
        # Pushbutons
        self.pbPotvrdit.clicked.connect(self.pbPotvrditClicked)
        self.pbZavrit.clicked.connect(self.LoadFile)
        
        

    def pbPotvrditClicked(self):
        # Load the layers to variables
        index = self.cbLayers.currentIndex()
        input_raster = self.raster_all_layers[index]
        index2 = self.cbLayers_2.currentIndex()
        input_vector = self.polygon_all_layers[index2]
        index3 = self.cbLayers_3.currentIndex()
        input_vector_line = self.line_all_layers[index3]

        # Find path to the project
        path_of_project = QgsProject.instance().readPath("./")
        # Create path to croped raster
        name_of_file="RasterCropedLayer"
        complete_path_of_cliped_raster= path_of_project+"/"+name_of_file+".tif"

        

        # Clip raster by mask point_layer_with_all_detected_plants and save it to project folder
        qgis.processing.run("gdal:cliprasterbymasklayer", {'INPUT': input_raster,'MASK': input_vector,
                                                           'OUTPUT': complete_path_of_cliped_raster})
        
        # Open cliped raster
        clipped_raster=QgsRasterLayer(complete_path_of_cliped_raster)

        # Create path to raster calculator result
        complete_path_of_raster_calculator_result= path_of_project+"/"+name_of_file+"binar.tif"

        # Set cordinates used in raster calculator
        global_cordinates='epsg:32633'
        cordinates=QgsCoordinateReferenceSystem(global_cordinates)

        #region conversion and definition of 5 bands of raster layer

        maxValue=255
        band_1_min=clipped_raster.dataProvider().bandStatistics(1).minimumValue
        band_1_max=clipped_raster.dataProvider().bandStatistics(1).maximumValue
        k1=str(band_1_max-band_1_min/maxValue)
        raster_layer_band1=str('((RasterCropedLayer@1-'+str(band_1_min)+')/'+k1+')')    

        band_2_min=clipped_raster.dataProvider().bandStatistics(2).minimumValue
        band_2_max=clipped_raster.dataProvider().bandStatistics(2).maximumValue
        k2=str(band_2_max-band_2_min/maxValue)
        raster_layer_band2=str('((RasterCropedLayer@2-'+str(band_2_min)+')/'+k2+')')

        band_3_min=clipped_raster.dataProvider().bandStatistics(3).minimumValue
        band_3_max=clipped_raster.dataProvider().bandStatistics(3).maximumValue
        k3=str(band_3_max-band_3_min/maxValue)
        raster_layer_band3=str('((RasterCropedLayer@3-'+str(band_3_min)+')/'+k3+')')

        band_4_min=clipped_raster.dataProvider().bandStatistics(4).minimumValue
        band_4_max=clipped_raster.dataProvider().bandStatistics(4).maximumValue
        k4=str(band_4_max-band_4_min/maxValue)
        raster_layer_band4=str('((RasterCropedLayer@4-'+str(band_4_min)+')/'+k4+')')

        band_5_min=clipped_raster.dataProvider().bandStatistics(5).minimumValue
        band_5_max=clipped_raster.dataProvider().bandStatistics(5).maximumValue
        k5=str(band_5_max-band_5_min/maxValue)
        raster_layer_band5=str('((RasterCropedLayer@5-'+str(band_5_min)+')/'+k5+')')

        #endregion
        
        
        ndi='(('+raster_layer_band2+' - '+raster_layer_band1+') / (' +raster_layer_band2+'+'+raster_layer_band1+') * 127.5) + 127.5'
        exg='(((2 *'+raster_layer_band2+')-'+raster_layer_band1+' - '+raster_layer_band3+')*127.5) + 127.5'
        tgi='(('+raster_layer_band2+' - (0.39*'+raster_layer_band1+') - (0.61*'+raster_layer_band3+')) * 127.5) + 127.5'
        ndvi='(('+raster_layer_band4+' - '+raster_layer_band1+') / ('+raster_layer_band4+' + '+raster_layer_band1+') * 127.5) + 127.7'


        # Calculate index and save it to project folder
        usedIndex="none"
        if self.checkBoxUseNDI.isChecked():
            usedIndex="NDI"
            qgis.processing.run("qgis:rastercalculator", {'INPUT': clipped_raster, 'LAYERS': clipped_raster, 'EXPRESSION': ndi, 
                                                          'CRS':cordinates, 'OUTPUT': complete_path_of_raster_calculator_result})
        elif self.checkBoxUseExG.isChecked():
            usedIndex="ExG"
            qgis.processing.run("qgis:rastercalculator", {'INPUT': clipped_raster, 'LAYERS': clipped_raster, 'EXPRESSION': exg, 
                                                          'CRS':cordinates, 'OUTPUT': complete_path_of_raster_calculator_result})
        elif self.checkBoxUseNDVI.isChecked():   
            usedIndex="NDV"
            qgis.processing.run("qgis:rastercalculator", {'INPUT': clipped_raster,  'LAYERS': clipped_raster, 'EXPRESSION': ndvi, 
                                                          'CRS':cordinates, 'OUTPUT': complete_path_of_raster_calculator_result})
        elif self.checkBoxUseTGI.isChecked():   
            usedIndex="TGI"
            qgis.processing.run("qgis:rastercalculator", {'INPUT': clipped_raster,  'LAYERS': clipped_raster, 'EXPRESSION': tgi, 
                                                          'CRS':cordinates, 'OUTPUT': complete_path_of_raster_calculator_result})
        else:
            qgis.processing.run("qgis:rastercalculator", {'INPUT': clipped_raster,  'LAYERS': clipped_raster, 
                                                          'EXPRESSION': 'RasterCropedLayer@1', 
                                                          'CRS':cordinates, 'OUTPUT': complete_path_of_raster_calculator_result})
        # Show NDVI raster in interface if is checkbox checked
        if self.checkBoxShowNDVI.isChecked():
            QgsProject.instance().addMapLayer(QgsRasterLayer(complete_path_of_raster_calculator_result, input_raster.name()+usedIndex))


        
        # Convert raster (geoTiff) to numpy array
        im = Image.open(complete_path_of_raster_calculator_result)
        image_data = np.array(im)       

        # Encode image
        _, img_encoded = cv2.imencode('.jpg', image_data)

        # Decode image
        img_decoded = cv2.imdecode(img_encoded, 1)
        # Convert RGB image to gray (not working if not used)
        gray = cv2.cvtColor(img_decoded, cv2.COLOR_BGR2GRAY)
        if True:
            if self.checkBoxUseNDI.isChecked():
                thresh=cv2.threshold(gray,21,100,cv2.THRESH_TOZERO)[1]
                thresh1=cv2.adaptiveThreshold(thresh,250,cv2.ADAPTIVE_THRESH_GAUSSIAN_C,cv2.THRESH_BINARY,45,-6)
            elif self.checkBoxUseExG.isChecked():
                thresh=cv2.threshold(gray,70,100,cv2.THRESH_TOZERO)[1]#max value 70 because mica
                thresh1=cv2.adaptiveThreshold(thresh,250,cv2.ADAPTIVE_THRESH_GAUSSIAN_C,cv2.THRESH_BINARY,63,-21)
            elif self.checkBoxUseTGI.isChecked(): 
                thresh=cv2.threshold(gray,21,100,cv2.THRESH_TOZERO)[1]
                thresh1=cv2.adaptiveThreshold(thresh,250,cv2.ADAPTIVE_THRESH_GAUSSIAN_C,cv2.THRESH_BINARY,45,-12)
            elif self.checkBoxUseNDVI.isChecked():   
                thresh=cv2.threshold(gray,21,100,cv2.THRESH_TOZERO)[1]
                thresh1=cv2.adaptiveThreshold(thresh,250,cv2.ADAPTIVE_THRESH_GAUSSIAN_C,cv2.THRESH_BINARY,45,-12)
        else:
            thresh=cv2.threshold(gray,21,100,cv2.THRESH_TOZERO)[1]
            thresh1=cv2.adaptiveThreshold(thresh,250,cv2.ADAPTIVE_THRESH_GAUSSIAN_C,cv2.THRESH_BINARY,45,-12)
        # Use blur function on gray image
        blurred=cv2.GaussianBlur(thresh1,[15,15],sigmaY=1,sigmaX=1,borderType=cv2.BORDER_DEFAULT)
        # Use tresh filter on blured image
        
        # Use canny function on treshed image
        edges = cv2.Canny(blurred,10,10)
        # Find contours on edged image
        contours_img = cv2.findContours(edges, cv2.RETR_TREE, cv2.CHAIN_APPROX_SIMPLE)
        # Save all contours
        contours = imutils.grab_contours(contours_img)
        
        # Save size of image to variables
        height, width, channels = img_decoded.shape
        max_x = width 
        max_y = height

        # Create point in coner of image
        #cv2.circle(img_decoded, (max_x, max_y), 10, (255, 255, 255), -1)
        # Find and save cordinates of raster corners
        xmin=clipped_raster.extent().xMinimum()
        ymin=clipped_raster.extent().yMinimum()
        xmax=clipped_raster.extent().xMaximum()
        ymax=clipped_raster.extent().yMaximum()

        x=datetime.datetime.now().time()
        time_str = x.strftime("%M:%S")
        
        # Create to points layers
        point_layer_with_all_detected_plants =  QgsVectorLayer('Point?crs='+global_cordinates,'Body všech rostlin'+usedIndex+time_str,"memory") 
        point_layer_with_detected_plants_in_row =  QgsVectorLayer('Point?crs='+global_cordinates,'Body roslin v řádku'+usedIndex+time_str,"memory") 
        pr = point_layer_with_all_detected_plants.dataProvider()
        pr2 = point_layer_with_detected_plants_in_row.dataProvider()

        

        # This create testing points in coners
            #pt1 = QgsFeature()
            #pt2 = QgsFeature()
            #point1 = QgsPointXY(xmax,ymin)
            #point2 = QgsPointXY(xmin,ymax)
            
            #pt1.setGeometry(QgsGeometry.fromPointXY(point1))
            #pt2.setGeometry(QgsGeometry.fromPointXY(point2))
            #pr.addFeatures([pt1])
            #pr.addFeatures([pt2])        
        # Calculate size coefficient
        kx=max_x/(xmax-xmin)
        ky=max_y/(ymax-ymin)
        
        # Create empty (aray)variable
        pt3 = QgsFeature()

        # Define helpful variable
        memOfMoments=0

        # Find and save center of contours
        for c in contours:
            M = cv2.moments(c)
            # Discriminate contours smaler than 0
            if M["m00"] >0 and M["m00"]<1000 :
            # Compute the center of the contour
                cX = int(M["m10"] / M["m00"])
                cY = int(M["m01"] / M["m00"])
                # Discriminate contours have same or similar center point like preceding
                if(not(cX+cY<memOfMoments+10 and cX+cY>memOfMoments-10)):

                    # Draw center of the shape on the image
                    cv2.circle(img_decoded, (cX, cY), 2, (0, 255, 255), -1)

                    # Calculate real position on map point_layer_with_all_detected_plants
                    recalculation_x=xmin+(cX/kx)
                    recalculation_y=ymax-(cY/ky)
                    
                    # Create point and add it to point_layer_with_all_detected_plants
                    point3 = QgsPointXY(recalculation_x,recalculation_y)
                    pt3.setGeometry(QgsGeometry.fromPointXY(point3))
                    pr.addFeatures([pt3])
                # Save moment to memory
                memOfMoments=cX+cY

         
        # Show all detected plants in interface if is checkbox checked
        if self.checkBoxShowAllPoints.isChecked():
            QgsProject.instance().addMapLayer(point_layer_with_all_detected_plants)
        
        pocet_row_name="POCT "+usedIndex
        # Add row pocet_row_name to atributs in input_vector_line, id does not exist yet
        if pocet_row_name not in input_vector_line.fields().names():
            input_vector_line.dataProvider().addAttributes([QgsField(pocet_row_name, QVariant.Int)])
            input_vector_line.updateFields()
        mezerovost_row_name="MEZV "+usedIndex
        # add row mezerovost_row_name to atributs in input_vector_line, id does not exist yet
        if mezerovost_row_name not in input_vector_line.fields().names():
            input_vector_line.dataProvider().addAttributes([QgsField(mezerovost_row_name, QVariant.Double)])
            input_vector_line.updateFields()

        # Find row with pocet_row_name
        pocet_index = input_vector_line.fields().indexFromName(pocet_row_name)

        # Find row with mezerovost_row_name
        mezerovitost_index = input_vector_line.fields().indexFromName(mezerovost_row_name)
    
        # Create empty (aray)variable
        pt4 = QgsFeature()
        
        # Enable editing of atribute tab
        input_vector_line.startEditing()
        # Go through every line
        for linie in input_vector_line.getFeatures():
            # Set point count to zero
            point_count=0
            # Create buffer based on spinBoxValue
            buffer_distance = self.spinBoxVelikostBuferu.value() # poloměr oblasti v metrech
            buffered_line = linie.geometry().buffer(buffer_distance,0)
            request = QgsFeatureRequest().setFilterRect(buffered_line.boundingBox())
            # Go through every point from point_layer_with_all_detected_plants
            for point_feat in point_layer_with_all_detected_plants.getFeatures(request):
                # Disciminate points father than bufer_distance
                if buffered_line.distance(point_feat.geometry()) <= buffer_distance:
                    # Create point and add it to point_layer_with_detected_plants_in_row
                    pt4.setGeometry(point_feat.geometry())
                    pr2.addFeatures([pt4])
                    # Count every point
                    point_count += 1
            # Calculate "mezerovitost"
            mezerovitost = point_count/((linie.geometry().length()/self.spinBoxDelkaUseku.value())*self.spinBoxPocetNaUsek.value())
            # Transfer to % and round "mezerovitost" 
            mezerovitostR=round((100*mezerovitost),3)
            # Add point count and "mezerovitost" to atribute table
            input_vector_line.changeAttributeValue(linie.id(), pocet_index, point_count)
            input_vector_line.changeAttributeValue(linie.id(), mezerovitost_index, mezerovitostR)

        # Reload vector point_layer_with_all_detected_plants atributes       
        input_vector_line.commitChanges() 
        QgsProject.instance().addMapLayer(input_vector_line)
        # Show filtered points layer 
        QgsProject.instance().addMapLayer(point_layer_with_detected_plants_in_row)    
                
        # Display the image made by cv2
        if self.checkBoxTresh.isChecked():
            cv2.imshow('Tresh', thresh1)
        if self.checkBoxContures.isChecked():
            cv2.drawContours(img_decoded, contours, -1, (0, 255, 0), 1)
            cv2.imshow("Kontury", img_decoded)
        if self.checkBoxBlured.isChecked():
            cv2.imshow("Blured", blurred)      
        #cv2.imshow('lines', gray)
        #cv2.imshow('edges', edges)
        cv2.waitKey(0)
        self.accept()       
        
    def LoadFile (self):

        self.reject()
        #path_of_project = QgsProject.instance().readPath("./")
        #name_of_file="layerWithPoints"
        #complete_path_of_cliped_raster= path_of_project+"/"+name_of_file+".txt"
        #print(complete_path_of_cliped_raster)
        #pointLayer = open(complete_path_of_cliped_raster,"w") 
        #pointLayer.write( "nejake souradnice 00 1122 111")
        #pointLayer.close()
        #print(path_of_project)
        
