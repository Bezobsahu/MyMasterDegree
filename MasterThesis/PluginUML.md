užitečná videa
https://www.youtube.com/watch?v=G3tP6mmXe_k
https://www.youtube.com/watch?v=nWKyRDxUIrI
https://www.youtube.com/c/GeoDeltaLabs/videos
https://hatarilabs.com/ih-en/5-tutorials-for-crop-detection-and-vegetation-delineation-with-python-and-qgis

#Use case 


```plantUML
(Load file)
(Recognize Plants)
(Show gaps)

``` 
# JOSEF COOKBOOK 2022
## create a point on the map canvas
``` python
layer =  QgsVectorLayer('Point?crs=epsg:4326','MyPoint',"memory") 
pr = layer.dataProvider() 
pt = QgsFeature()
point1 = QgsPointXY(20,20)
pt.setGeometry(QgsGeometry.fromPointXY(point1))
pr.addFeatures([pt])
QgsProject.instance().addMapLayer(layer)

```

``` python
from PyQt5.QtCore import * 
from PyQt5.QtGui import * 
from qgis.core import * 
from qgis.gui import * 
 
def run_script(iface): 
    layer =  QgsVectorLayer('Polygon?crs=epsg:4326', 'Mississippi',"memory") 
    pr = layer.dataProvider() 
    poly = QgsFeature() 
    geom = QgsGeometry.fromWkt("""POLYGON ((-88.82 34.99, -88.09 34.89, -88.39 30.34, -89.57 30.18, -89.73 31, -91.63 30.99, -90.87 32.37, -91.23 33.44, -90.93 34.23, -90.30 34.99, -88.82 34.99))""") 
    poly.setGeometry(geom) 
    pr.addFeatures([poly]) 
    layer.updateExtents() 
    QgsProject.instance().addMapLayer(layer)

run_script(iface)

```