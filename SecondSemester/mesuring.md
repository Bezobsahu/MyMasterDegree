Semestrální práce na zkoušku

# Základní principy virtuální instrumentace
## Vývoj měřící techniky
Je odezvou na stále se zvyšující nároky na flexibilitu měřících přístrojů
## Časový nárust flexibility měřícich techniky
- klasické analogové měřící přístroje 
- měřící přístroje vybavené rozhraním (RS 232, USB, GPIB-IEE488 aj.)
- virtuální měřící přístroje - fázr virtuální instrumentace (PC) 
- zásuvné měřící karty
- VXI // je používán v Dukovanech
1. Klasické měřící přístroje 
Funkce přístroje je jednoznačně definována výrobcem,
Uživatel může využít pouze
2. Měřící přístroje vybavené kounikačním rozhraním 
Dvě etapy interakce uživatele a měřícího přístroje:
a) konfigurace měřícího přístroje
b) vlastní vyčítání naměřených hodnot
V obou fazích komunikace uživatele s měřícím přístrojem lze něco...
Možné výhody nahrady koncového uživatele počítačem
a) možnost automatizace celého měření
b) vyloučení lidského faktoru

**Nejběžnnější komunikační razhraní měřících přístrojů:**
- RS-232
- GPIB
- USB
- Ethernet

1. Měřící přístroje vybavené kounikačním rozhraním RS - 232
*Výhody:*
- jednoduchá a levná kabeláž
- standartní vybavení PC
- velká vzdalenost
*Nevýhody:*
- omezení na dvě zaříjení (PC a přístroj)
- malá propustnost (omezená přenosová rychlost)

2. Měřící přístroje vybavené kounikačním rozhraním GPIB
*Výhody*
- vysoká přenosová rychlost 
- možnost připojení více měřích přístrojů na jeden PC
*Nevýhody*
- omezená vzdálenost
- nutnost vybavit PC

3. Měřící přístroje vybavené kounikačním rozhraním Ethernet
*Výhody*
- připojeníměřícíhho přístroje na standardní médium llokální počítačové sítě
- vysoká přenosová rychlost
- využívání standartních protokolů známých z komunikace mezi PC
*Nevýhody*
- ne všichni výrobci zatím
-  obsloužné programy zatím uzpůsobrny pro RS-232 a GPIB , USB

### Výhody propojení měřícího přístroje s počítačem
- Možnost doplnit funkce definované výrobcem funkcemi, které lze naprogramovat do řídícího počítače (digitální osciloskop + frekvenční analýza (FFT)=> frekv. analyzátor)
- Rostoucí počet funkcí zařízení (u klasické koncepce) vede k vyššímu počtu ovládacích prvků X sdružuné funkce ovládascích prvků...
- Posun vývoje 

### Podstata virtuálního přístroje 
je doplnění počítače tím, co mu chybí pro funkci měřícího přídtroje
    - Harware
    - Software
    - Grafické rozhraní 

|Hledisko|Tradiční přístroj|Virtuální přístroj|
|-|-|-|
|Funkce definuje| výrobce|uživatel|
|orientace přístrojů a jejich propojitelnost|specifická|specifická|
|Klíčová komponenta| Hardware| Software|
|Náklady na výrobu| vysoké| nízké, opakované použití|

# Úvod do LabVIEW
Základní vlastnoosti:
- grafický prorgamovací jazyk G
- Proramový kód v podobě blokového schématu
- Zpracování programu na základě toku dat
- Programy = virtuální měřící přístroje

# LabVIEW prostředí

- Front panel
uživatelské rozhraní
    - Panel nástrojů
        - Spouštěcí tlačítko
        - Tlačítko pro opakované měření ///Používáme cyklus 
        - Ukončení programu
        - Pauza
        - Zvýrazněný průběh program
        - Sonda - zobrazí se honota v určitém místě

    - Logický ovládací prvek
    - Numerický ovládací prvek
    - Graf
    - Stop tlačítko
    - Help
        - kontextové menu
        - vyhledávání
    - Ikona programu

- Block diagram
místo pro sestavení grafického zdrojového kódu program, vytváří se v návaznosti na přední panel, propojení teminálů objektů z předního panelu pomocí vodičů, provádění nejruznějších operací s daty pomocí expresních VI 
    - Panel nástrojů
        - stejný jako front panel
    - While loop
    - Propojení (tok dat)
    - Terminál grafu
    - Numerická konstanta
    - Express VI
    - Funkce
    - Standartní VI

- Terminály
    - realizují výstupy z blokového diagramu do čelního panelu
    - realizují vstupy z čelního panelu do blokového diagramu

- Ikona a konektor
    - pro možní použití VI jako snadno identifikovatrlný podprogram tj. sub VI
    - grafická reprezentace programu
    - text, orázek, kombinace
    - konektory - počet musí souhlasit s počtem indikátorů a ovládacích prvků v podprogramu
    - max 28 terminálů

- Paleta nástrojů 
    - **Automatický výběr nástroje**
    
## Programové struktury

- **For loop** - programový cyklus s známým počtem opakování
- **While loop** - programový cyklus s opakováním v záviislosti na splněnění určité podmínky
- **Case structur** - podmíněný příkaz nebo přepínač pro větvení vykonávání algoritmu
- **Flat sequence** - jedna z možností zajištění sekvenčnosti provádění funkcí
- **Formula noda** - možnost efektivního zadání matemetického vzorce

- nalezneme je v okně blokového diagramu
    - funcion > programing > structures
- **shift register** 
    - je to zvlaštní lokální proměnná, která předá hodnotu do ní přivedenou výstupní na konci jednoho cyklu jako vstupní v dalším cyklu 
    - vytvoření příkazem *Add Shift Register*
    - smazání příkazem *Remove Shift Register*

## Zadání projektů
- **změřit charakteristiku zenerovi diody**
- **měření přechodové charakteristiky**
    - měření závislosti napětí na RC obvodu
    - nabíjení a vybíjení kondenzátoru
- **měření charakteristiky optronu**
- **měření parametrů logických obvodů**
    - měření přenosové charakteristiky
    - určit zda vyhovuje parametrům dle sheetu
- **realizace číslicového filtru**
- **indikace polohy tříosovým náklanoměrem**


## NI USB-6008/6009
#### MUX
- má jeden A/D převodníke
- multiplexer přepíná jdenotlivé kanály
#### A/D převodník
Analogově digitální převodník transformuje analogový signál (napětí) na číslicově vyjádřenou informace

#### FIFO 
Zařázení může provádět A/D převod:
a) jedné hodnoty
b) více hodnot