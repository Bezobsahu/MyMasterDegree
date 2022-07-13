# ÚVOD 
Navrhovaná databáze by měla přispět k lepší organizaci souborů dat nasbíraných při precizním zemědělství. Klient (zemědělec) by měl mít možnost zadat parametry své objednávky (cena, zadání, souřadnice, atd.) a následně mít přistup k výsledkům. Objednávku zpracovávají zaměstnanci. Ti zadanou lokalitu snímkují (použitý přistroj, datum a čas pořízení, autor, vlastnosti snímkování, sluneční svit), následně zpracují (použitý software, autor, výsledný soubor ) a zpracovaná data přemění na výsledky.

## Třídní diagram
```plantUML

class user {
    + username
    + name
    + surname
    + email
    + birtdate
    - password
    + age ()
}
user <|-- client
user <|-- employee

    class client {
        + totalMoneySpend()
        + clientDiscount()
        
    }

    class employee {
        + workedHours
        + hourTax
        + bordingDate
        + salary ()
    }
client "1"<--"*" order
class order {
    + dateOfCreate
    + location
    + area
    + estimatedPrice ()
    + realPrice
    


}

class result {
    + author
    + createDate
    + relativePathToFile
}
result "*"->"1" order
result <|-- ShapeFile

class ShapeFile {
    + usedSoftware
}
result <|-- ortofoto

class ortofoto{
    + takingTime
    + sunPosition

}


employee -- result: create >
```
##ER Diagram
```PlantUML

entity user {
    * username
    * name
    * surname
    * email
    * birtdate
    * password
    ---
    * age
}


    entity client {
        ---
        * totalMoneySpend
        * clientDiscount
    }

    entity employee {
        * workedHours
        * hourTax
        * bordingDate
        ---
        * salary
    }

user ||--|| client
user ||--|| employee


entity order {
    * createdDate
    * location
    * area
    * realPrice
    ---
    * estimatedPrice
}

client ||--o{ order:create

entity result {
    * author
    * createdDate
    * relativePathToFile
}



entity ShapeFile {
    * usedSoftware
}



entity ortofoto{
    * takingTime
    * sunPosition

}


employee ||--o{ result:create
result }o-|| order:include
result ||--|| ShapeFile

result ||--|| ortofoto


```
## Lambda-popis


### Metody
Věk uživatele
    〈age,((DateToday – σ.birtdate / 365.2422)truncated)〉 $\in$ meth(User)

Doba pracovního poměru
    〈employmentDays,(DateToday – σ.boardingDate)〉 $\in$ meth(Emloyee)

Odhadovaná cena
    〈estimatedPrice,((area*4,2)〉 $\in$ meth(Order)

### Dotazy
Všechny záznamy kde daný zaměstnanec je autorem ortofoto
    Inst.(Ortofoto) // (λx |x⨞ author username = 'joseko')

Zobraz jmena klientů u kterých objednávka má lokaci Praha
    Inst.(Order) // (λx |x⨞ location = 'Praha') ›› (λy | y author)

Zobraz uživalelská jména klientu kteří mají alespoň jeden result v orderu 
    Inst.(Ortofoto) // (λx |x⨞ Order $\neq$ Null) ›› (λy | y author)

## Daskalos
### Metody
Věk uživatele
``` smalltalk
age
	birtdate isNil 
		ifTrue: [^nil]
		ifFalse: [^((Date today subtractDate: birtdate) / 365.2422) truncated]
```

Doba pracovního poměru
``` smalltalk
emloymentDays
	boardingDate isNil 
		ifTrue: [^nil]
		ifFalse: [^Date today subtractDate: boardingDate]
```

Odhadovaná cena
``` smalltalk
estimatedPrice
	"comment stating purpose of message"

	^area * 4.2
```

### Dotazy
Všechny záznamy kde daný zaměstnanec je autorem ortofoto
``` smalltalk
SetOrtofoto select: [:x| x author username = 'joseko' ]
```

Zobraz jmena klientů u kterých objednávka má lokaci Praha
``` smalltalk
(SetOrder select: [:x| x location = 'Praha']) collect: [:y| y author]
```

Zobraz uživalelská jména klientu kteří mají alespoň jeden result v orderu 
``` smalltalk
(SetOrtofoto select: [:x| x order notNil]) collect: [:y| y order]
```



## SQL
Bylo implementováno v programu Acces. Syntaxe se může mírně lišit.
### Metody
Věk uživatele
``` php
SELECT Fix((Date()-User.birtdate)/365) AS vekUzivatele
FROM [User];
```
Doba pracovního poměru
``` php
SELECT Date() - Employee.bordingDate AS DobaPracovnihoPomeru
FROM Employee;
```
Odhadovaná cena
``` php
[area]*4,2
```
Klientská sleva
``` php
SELECT Order.clientID, IIf(Sum(Order.realPrice)>300,20,0) AS clientDiscout
FROM [Order]
GROUP BY (clientID);
```


### Dotazy
Zobraz všechna použití danného softwaru

``` php
SELECT User.nameGiven, User.surname, Result.created AS used, ShapeFile.UsedSoftware
FROM (([User] LEFT JOIN Employee ON User.username = Employee.username) LEFT JOIN Result ON Employee.ID = Result.authorID) LEFT JOIN ShapeFile ON Result.ID = ShapeFile.resultID
WHERE ShapeFile.UsedSoftware=PouzitySoftware;
```

Zobraz jmena klientů u kterých objednávka má lokaci Praha
``` php
SELECT User.nameGiven, User.surname, Order.ID
FROM [User] RIGHT JOIN (Client INNER JOIN [Order] ON Client.ID = Order.clientID) ON User.username = Client.username
WHERE Order.location = 'Praha';
```
Zobraz uživatelská jména všech klientu u kterých je alespoň jedno řešení objednávky
``` php
SELECT User.username
FROM [User] RIGHT JOIN ((Client INNER JOIN [Order] ON Client.ID = Order.clientID) INNER JOIN Result ON Order.ID = Result.orderID) ON User.username = Client.username
GROUP BY (User.username);
```
## Daskalos skript
``` smalltalk
"Note that variables begining with uppercase letter will be moved into the workspace pool."

SetEmployee:= Set new.
SetClient:= Set new.
SetOrder:= Set new.
SetShapeFile:= Set new.
SetOrtofoto:= Set new.

Empl_1:= Employee new.
Empl_1 username: 'joseko';
name: 'Josef';
surname:'Korinek';
email:'koren@seznam.cz';
birtdate: '1-5-2000' asDate;
workedHours:'10' asNumber;
hourTax:'10' asNumber;
boardingDate: '10-10-2006' asDate.
SetEmployee add:Empl_1.

Cli_1:= Client new.
Cli_1 username: 'houska';
name: 'Martin';
surname:'Houska';
email:'houska@seznam.cz'.
SetClient add: Cli_1.

Ord_1:= Order new.
Ord_1 author: Cli_1;
dateOfCreate: '10-6-2016' asDate;
location: 'Praha';
area:'10' asNumber;
realPrice:'500' asNumber.
SetOrder add: Ord_1.

ShaFl_1:= ShapeFile new.
ShaFl_1 author: Empl_1;
order:Ord_1;
createDate: '6-16-2016' asDate;
relativePathToFile:'asdf/movie';
usedSoftware: 'Qgis'.
SetShapeFile add:ShaFl_1.

Ort_1:= Ortofoto new.
Ort_1 author: Empl_1;
order:Ord_1;
createDate: '6-16-2016' asDate;
relativePathToFile:'asdf/movie';
takingHour:'11' asNumber;
takingMinute:'21' asNumber;
sunPosition: 'nad hlavou'.
SetOrtofoto add:Ort_1.

```