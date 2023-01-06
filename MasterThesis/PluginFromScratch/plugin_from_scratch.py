# -*- coding: utf-8 -*-

import os
import sys
from typing_extensions import Self


from qgis.PyQt import QtWidgets

from qgis.PyQt import uic

FORM_CLASS, _ = uic.loadUiType(os.path.join(os.path.dirname(__file__)))

class PluginFromScratch(QtWidgets.QMainWindow):
    def __init__(self) -> None:
        super().__init__()
        