# Není to terorista je to teoretik
# Koziflame
$\lambda $ calcul je způsob zápisu matematických věcí 
$\beta $ redukce je dosazování 
$\alpha $ konverze zanmená že si můžu proměné označit jakkoliv
$\eta $ 

## CVIČENÍ
### projekt
Začneme
```plantUML
class osoba {
    + jmeno /public
    + prijmeni
    - /privat
    # heslo/protected
    + věk ()

}
class učitel {

 }

class katedra {
    + jmeno
    + kód
}

osoba <|- učitel

učitel "1"-- katedra : > je členem 



```

# DB - základní koncept
IS- informační sistém
DBS - databázový systém
        - nezávislost dat
        - perzistence dat {vydrží roky} (opak transientní což je dočasné)
        - integrita dat (můsí se jednat o souvislý graf) a konzistence dat 
        - současný přístup více uživatelů
        - přístupnost dat
DBMS 
    1) Definice dat (create/drop)
    2) Manipulace dat (insert/delete)
    3) Kontrola dat
DB - data

1) OS Adminstator
2) databázový administrátor
3) aplikační programátor
4) databázový uživatel
5) naivní uživatel

### Cvičení 2

($\lambda$ a|a*a)
($\lambda$ a|($\pi$(2a))^2/4)
select $\lambda $ )

## DATA NORMALIZACE
1. Normální forma
    - jedna relace nesmí obsahovat více hodnot
    R ([<ins>A</ins>BC],[A->->B,A->C])
        R => R1 ([<ins>A</ins>C]) 

2. Normální forma
    - neklíčové atributy musí být závislé jenom na celém klíči ne jen na jeho části

3. Normální forma
    - tady máme zavislost navíc tak udělej další tabulky

4. Normální forma
    - pracuje se s nezávislostí

<br>

##Relační alegebra
**vyber jména všech doktorů, kteří léčili chřipku**

A $\leftarrow$ join (Doktoři, Vyšetření, ($\lambda$d $\lambda$v | d.id=v.doktor))

A $\leftarrow$ 



SELECT d.jméno d.příjmení
FROM Doktoři d, Vyšetření v
Where (v diagnoza="chřipka") AND (d.id=v.doktor)


SELECT d.jméno d.příjmení
FROM Doktoři d
WHERE p.id IN 
        (SELECT v doctor
        FORM Pacienti p
        WHERE p.adresa = "Nerudova 23")