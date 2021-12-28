# Formulace problému
Při analýze půd se shromažďuje velké množství dat. Tato data jsou následně zpracovávána k vytvářní komplexních modelů. Účelem této aplikace je zjednodušit zaznamenávání těchto údajů a zárověň umožnit jednoduchou orientaci v nasbíraných datech. Zároveň aplikace funguje jako poptávkový systém po analýze půdních vlastností, určený převážně pro zemědělce. 
# Datový slovník
**Institution** -sídlo školy, výzkumného ustavu nebo firmy zajištující analýzu
**User** - uživatel, zadavatel (nejčastěji zemědělec)
**Empolyee** - zaměstnanec instituce, pracovník zopovědný za odběr a analýzu půdy
**Building** - budova instituce, kde se nachází místnosti
**Room** - nachází se v budově, je závislá na existenci budovy, obsahuje vybavení
**Contract** - definuje požadavky zákazníka (uživatele)
**Sample** - vzorek odebraný na konkrétního místa a hloubky pracovníkem
**ChemicalTest** - chemický test prováděný na vzorku pracovníkem
**PhysicalTest** - fyzikální test prváděný na vzorku pracovníkem
**Equipment** - vybavení místnosti

# Class diagram
```PlantUML

class Contract{
    Price
    Location
    Demands
    FeedBack

}

class User{
    Name
    Surname
    Email
    Adress
    Phone
    DefineContract()
    SeeResults()
    MakeFeedback ()

}

class Sample{
    GPS N
    GPS E
    DateOfSampling
    Depth
    Author
    Placement

    ExpirationCheck()

    
}

class Results {
    Conclusion
    Recomandation
}

class Employee{
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
User "1"--"*" Contract
Contract "1" -- "1" Results
User - Results : see >

Sample "1" -- "*" PhysicalTest
Sample "1" -- "*" ChemicalTest

Employee "1" -- "*" Sample
Employee "1" -- "*" ChemicalTest
Employee "1" -- "*" PhysicalTest
Employee -- Equipment: inspect >
Employee - Results : make >
Employee -- Contract : see >
Equipment <|-- PhysicalTestingMashine
Equipment <|-- ChemicalTestingEquipment

Institution "1" o-- "*" Building
Institution "1..n" -- "*" Employee

Building "1" *-- "*" Room

Room "1" -- "*" Equipment

PhysicalTest "*" -- "1" PhysicalTestingMashine
ChemicalTest "*" -- "1"  ChemicalTestingEquipment

```
# State diagram of user
``` PlantUML


[*] -->  Registered_NotVerified  :UserFinishRegisterForm[RequiredAtributesAdded]
Registered_NotVerified -> LoggedOut : AdminVerifyUser
LoggedIn --> LoggedOut :UserLoggOut
LoggedOut --> LoggedIn :UserLoggIn
LoggedIn --> Blocked :AdminBlockAcount
LoggedOut --> Blocked :AdminBlockAcount
Blocked -> LoggedOut :AdminGiveAcces
Registered_NotVerified --> Blocked : AdminBlockAcount
LoggedIn --> Deactivated





```
# State diagram of sample
```PlantUml
        
State Taken 
State OnTheWay
State Stored
State UnderTesting
State Expired
State Contaminated
State Discarded

[*] --> Taken : WorkerTakeSample (atributs)[CoordationAdded] /do:CreateNewSampleTag
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
# Model interakcí
## Use case diagram
``` plantuml
left to right direction



package PROGRAME {
    (DefineContract)
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



 DefineContract   <-- USER   
 SeeResults      <-- USER 
 Login           <-- USER
 RegisterAcount  <-- USER
 MakeFeedback    <-- USER


```
## Sequence diagram of user
```plantUML
actor User


User -> RegisterForm++: RegisterAcount
actor Admin
RegisterForm -> Admin--: RequestRegistration
Admin -> Acount**: VerifyAcount


User -> Acount++: Login
Acount -> User : ShowMainMenu

User -> Acount :DefineContract
Acount -> User: ShowContractForm
User -> Acount: FillContractForm
Acount -> Contract**: NewContract
{a} Contract -> Employee: RequestResults
Contract -> Acount:  ContractDefined
Acount -> User: ShowContract

participant Results
actor Employee
{b} Employee ->Results**: MakeResults

Activate Results
Results -> Contract: ResultsDone
Contract -> Acount: ContractComleted
User -> Acount : AskForResults
Acount -> Results: RequestResulst
Results -> Acount : ProvideResults

Acount -> User: ShowResults
User -> Acount: LoggOutRequest
Acount -> User: LoggedOut
deactivate Acount

```
## Activity diagram
```plantUml
(*)--> Login

partition User {



Login --> if "" then

  --> "DefineContract"
  
else

  -> "SeeResults"
}

partition Admin {
Login --> if "" then

  --> "VerifyUser"

else

  -> "BlockAcount"

}

endif

partition Worker {
    Login --> if "" then

  --> "TakeSample"

else 

--> DepositSample

else

  -> "DiscardSample"

}

endif


}

partition LaboratoryAssistent

Login --> if "" then

  --> "TestSample"

else

  -> "MakeResults"

}

endif
Login ---> ===LogOut===
SeeResults ---> ==LogOut==
BlockAcount ---> ==LogOut==
DefineContract ---> ==LogOut==
VerifyUser ---> ====LogOut====
TakeSample ---> ==LogOut==
DepositSample ---> ==LogOut==
DiscardSample ---> ==LogOut==
TestSample ---> ==LogOut==
MakeResults --> ==LogOut==
==LogOut== --> (*)

```
# Závěr
Project popisuje hlavní časti navrhované aplikace. Aplikace by mohla důkladně dokumentovat veškeré aktivity spojené s analýzou půdy čímž poskytovat sekundární data, která mohou být přednmětem zkoumání. Tato data by mohla být analizoána algoritmy a identifikovat sppojitosti které člověk není schopen zaznamenat. 
Dalšími vylepšeními by mohla být automatizace procesu na kterou je struktura programu připravena. To by v praxi znamenalo využití např. QR kódů u každého odebraného vzorku. Dále by se mohl systém rozšířit o další možnosti typu leteckých snímku, implementace geoinformačních systémů a podobně. 