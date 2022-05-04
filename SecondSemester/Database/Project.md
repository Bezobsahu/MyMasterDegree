# ÚVOD 

Navrhovaná databáze by měla přispět k lepší organizaci souborů dat nasbíraných při precizním zemědělství. Klient (zemědělec) by měl mít možnost zadat parametry své objednávky (cena, zadání, souřadnice, atd.) a následně mít přistup k výsledkům. Objednávku zpracovávají zaměstnanci. Ti zadanou lokalitu snímkují (použitý přistroj, datum a čas pořízení, autor, vlastnosti snímkování, sluneční svit), následně zpracují (použitý software, autor, výsledný soubor ) a zpracovaná data přemění na výsledky.

## třídní diagram
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
## Lambda-kalkul

## SQL dotazy

zobraz všechny záznamy kde daný zaměstnanec je autorem ortofoto

zobraz jmena klientů u kterých objednávka má lokaci Praha

zobraz jména VIP klientů (totalMoneySpend více než 100 000)

zobraz jmena klientu ktery mají alespon jeden result v orderu 

zobraz lidi kteří používají tento software

**heslo k databazy**
jmeno:neo4j
heslo:am295dnG4Fvvrqw9JLcrJs3Y5W-6v9LAwXscokdrQkE

