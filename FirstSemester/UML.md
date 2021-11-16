# Class diagram
```PlantUML
class Sample{
    GPS N
    GPS E
    DateOfSampling
    Depth
    Author
}

class Worker{
    Name
    Surname
    BirtDate
    Instituion
    Position
    Field
    Xname
}

class ChemicalTest{
    DateOfTesting
    WetWeight
    DryWeight
    PH
    C [%]
    UsedMethod
    Author
}

class PhisicalTest{
    DateOfTesting
    UsedForce
    MaximumDeformation
    Diameter
    UsedTool
    Author
}

class Institution{
    Name
    Adress
    Type
}
class Building{
    Owner
    Adress
    Capacity
    EmergencyExits
}
class Equipment{
    Name
    Price
    DateOfLastControl
    Weight
}
class PhysicalTestingMashine{
    MaxForce
    Resolution
    Extensions
}
class ChemicalTestingEquipment{
    Volume
    Material
}
class Room{
    Floor
    Number
    Size
    Type
}

Sample "1" -- "*" PhisicalTest
Sample "1" -- "*" ChemicalTest

Worker "1" -- "*" Sample
Worker "1" -- "*" ChemicalTest
Worker "1" -- "*" PhisicalTest
Worker - Equipment: inspect >

Equipment <|-- PhysicalTestingMashine
Equipment <|-- ChemicalTestingEquipment

Institution "1" o-- "*" Building
Institution "1..n" -- "*" Worker

Building "1" *-- "*" Room

Room "1" -- "*" Equipment

PhisicalTest "*" -- "1" PhysicalTestingMashine
ChemicalTest "*" -- "1"  ChemicalTestingEquipment

```
# State diagram of worker
``` PlantUML
State WorkerCreated
State WorkerDeleted
State WorkerEdited


[*] -->  WorkerCreated : CreateWorker





```
# State diagram of sample
```PlantUml
State SampleTaken
State SampleOnTheWay
State SampleStored
State SampelTested
State SampleExpired

```