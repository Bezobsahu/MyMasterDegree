# ÚVOD 

Navrhovaná databáze by měla přispět k lepší organizaci souborů dat nasbíraných při precizním zemědělství. Klient (zemědělec) by měl mít možnost zadat parametry své objednávky (cena, zadání, souřadnice, atd.) a následně mít přistup k výsledkům. Objednávku zpracovávají zaměstnanci. Ti zadanou lokalitu snímkují (použitý přistroj, datum a čas pořízení, autor, vlastnosti snímkování, sluneční svit), následně zpracují (použitý software, autor, výsledný soubor ) a zpracovaná data přemění na výsledky.

```plantUML

class user {
    + name
    + surname
    + username
    + institution
    - pasword
}
user <|- client
user <|- employee

    class client {
        createorder ()
    }

    class employee {

        uploadOrtofoto()
        uploadShapeFile()
    }
client -> Order
class Order {
    


}

class result {
    + relativePathToFile
    + author
}

result <|- ShapeFile

class ShapeFile {
    + usedSoftware
}
result <|- Ortofoto

class Ortofoto{
    + dateOfTaking
    + sunPosition
}


```

