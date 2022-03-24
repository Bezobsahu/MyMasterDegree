import os
import sys
firstFileName="Bio_chmel_200427.tif"
firstFileAbsolutePath = r'C:\Users\Státnice\MyMasterDegree\MasterThesis\DP_podklady\DP_podklady\Bio_chmel_200427.tif '#os.path.abspath(firstFileName)
#firstFileInfo=QFileInfo(firstFileAbsolutePath)
firstFileLayer= iface.addRasterLayer(firstFileAbsolutePath,firstFileName)


