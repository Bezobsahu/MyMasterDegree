def classFactory(iface):
  from .mainPlugin import TestPlugin
  return TestPlugin(iface)