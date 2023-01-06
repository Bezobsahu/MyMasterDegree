# -*- coding: utf-8 -*-

import os
import sys

from qgis.PyQt import uic
from qgis.PyQt import QtWidgets

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
        #Pushbutons
        self.pbHello.clicked.connect(self.pbHelloClicked)
        self.pbLoadFile.clicked.connect(self.LoadFile)

    def pbHelloClicked(self):
        print('heloooooo')
        text = self.cbLayers.currentText
        print(text)
        

    def LoadFile (self):

       
        pathOfProject = QgsProject.instance().readPath("./")
        nameOfFile="layerWithPoints"
        completeName= pathOfProject+"/"+nameOfFile+".txt"
        print(completeName)
        pointLayer = open(completeName,"w") 
        pointLayer.write( "nejake souradnice 00 111")
        pointLayer.close()
        print(pathOfProject)
        
       


        




