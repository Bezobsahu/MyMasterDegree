# ÚVOD 

Navrhovaná databáze by měla přispět k lepší organizaci souborů dat nasbíraných při precizním zemědělství. Klient (zemědělec) by měl mít možnost zadat parametry své objednávky (cena, zadání, souřadnice, atd.) a následně mít přistup k výsledkům. Objednávku zpracovávají zaměstnanci. Ti zadanou lokalitu snímkují (použitý přistroj, datum a čas pořízení, autor, vlastnosti snímkování, sluneční svit), následně zpracují (použitý software, autor, výsledný soubor ) a zpracovaná data přemění na výsledky.

```plantUML

class user {
    + username
    + name
    + surname
    + institution
    + email
    - password
}
user <|-- client
user <|-- employee

    class client {
    
        createorder ()
    }

    class employee {
        +position
        uploadOrtofoto()
        uploadShapeFile()
    }
client <-- order
class order {
    + dateOfCreate
    + estimatedPrice
    + realPrice
    


}

class result {
    + relativePathToFile
    + author
}
result -> order
result <|-- ShapeFile

class ShapeFile {
    + usedSoftware
}
result <|-- ortofoto

class ortofoto{
    + dateOfTaking
    + sunPosition

}


employee <-- result
```
**heslo k databazy**
jmeno:neo4j
heslo:am295dnG4Fvvrqw9JLcrJs3Y5W-6v9LAwXscokdrQkE

