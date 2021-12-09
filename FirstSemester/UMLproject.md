# Class diagram
```PlantUML
class Sample{
    GPS N
    GPS E
    DateOfSampling
    Depth
    Author
    Placement

    ExpirationCheck()

    
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

class PhysicalTest{
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

Sample "1" -- "*" PhysicalTest
Sample "1" -- "*" ChemicalTest

Worker "1" -- "*" Sample
Worker "1" -- "*" ChemicalTest
Worker "1" -- "*" PhysicalTest
Worker - Equipment: inspect >

Equipment <|-- PhysicalTestingMashine
Equipment <|-- ChemicalTestingEquipment

Institution "1" o-- "*" Building
Institution "1..n" -- "*" Worker

Building "1" *-- "*" Room

Room "1" -- "*" Equipment

PhysicalTest "*" -- "1" PhysicalTestingMashine
ChemicalTest "*" -- "1"  ChemicalTestingEquipment

```
# State diagram of worker
``` PlantUML


[*] -->  Registered :PersonFinishRegisterForm[RequiredAtributesAdded]
Registered --> NotVerified 
NotVerified --> LoggedIn
LoggedIn --> LoggedOut
LoggedIn --> Blocked
LoggedOut --> Blocked
NotVerified --> Blocked





```
# State diagram of sample
```PlantUml

State Taken :/do /entry /exit
State OnTheWay
State Stored
State UnderTesting
State Expired
State Contaminated
State Discarded

[*] --> Taken : WorkerTakeSample (atributs)[CoordationAdded] /CreateNewSampleTag
Taken       -->     OnTheWay : WorkerFinishSamling
Taken       -->     Discarded : WorkerDiscardSample
OnTheWay    -->      Discarded : WorkerDiscardSample
OnTheWay    -->     Stored : WorkerDepositSample
Stored      -->     UnderTesting :LaboratoryAssistantTakeSampleForTesting
UnderTesting      -->     Discarded :LaboratoryAssistantDiscardSample
UnderTesting  --> Stored :LaboratoryAssistantDepositSample
UnderTesting  --> Expired : SampleExpired (DateOfExpiry>TodayDate)
Stored  --> Discarded :LaboratoryAssistantDiscardSample
Expired --> Discarded :LaboratoryAssistantDiscardSample
Stored  --> Expired : SampleExpired (DateOfExpiry>TodayDate)
Stored  --> Contaminated :EmployContaminateSample
Contaminated --> Discarded :LaboratoryAssistantDiscardSample
Expired --> Stored :LaboratoryAssistantProlongSapleDurability


```

#Use case diagram
``` plantuml
left to right direction

:CUSTOMER:

package PROGRAME {
    (DefineDemand)
    (TakeSample)
    (TestSample)
    (RegisterAcount)
    (Login)
    (SeeResults)
    (DepositSample)
    (MakeFeedback)
    (DiscardSample)
    

}
 package EMPLOYEE {
     :WORKER:
     :LABORATORY_ASSISTANT:

 }

WORKER --> TakeSample
WORKER --> RegisterAcount
WORKER --> Login
WORKER --> DepositSample
WORKER --> DiscardSample

LABORATORY_ASSISTANT --> TestSample
LABORATORY_ASSISTANT --> RegisterAcount
LABORATORY_ASSISTANT --> Login
LABORATORY_ASSISTANT --> DiscardSample
LABORATORY_ASSISTANT --> SeeResults



 DefineDemand    <-- CUSTOMER   
 SeeResults      <-- CUSTOMER 
 Login           <-- CUSTOMER
 RegisterAcount  <-- CUSTOMER
 MakeFeedback    <-- CUSTOMER






```

