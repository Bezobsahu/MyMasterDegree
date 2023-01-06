from qgis.PyQt.QtGui import *
from qgis.PyQt.QtWidgets import *

from plugin_from_scratch import PluginFromScratch

from . import resources


class TestPlugin:

    def __init__(self, iface):
        self.iface = iface

    def initGui(self):
        self.action = QAction(QIcon(":/plugins/PluginFromScratch/icon.png"),
                          "Tankyyy",
                          self.iface.mainWindow())
                          
        self.action.triggered.connect(self.run)
        self.iface.addPluginToMenu("&Test plugins", self.action)
        self.iface.addToolBarIcon(self.action)

    def unload(self):
        self.iface.removeToolBarIcon(self.action)
            
        self.iface.removePluginMenu("&Test plugins", self.action)

        del self.action

    def run(self):
        QMessageBox.information(None, 'Minimal plugin', 'Do something useful here')
        self.window = PluginFromScratch()
        