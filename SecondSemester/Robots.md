# NEMUSÍM TU VŮBEC BÝT
# :D :)
Jdu se zabýt
# Zase se nic nenanučíme :)
# Skládat hudbu k videím o automatizaci

# Základní pojmy 
- **Robot** 
    - je antropomorfní mechanická bytost postavená na rutinní manuální práci pro lidskí bytosti
    - je reprogramovatelmý multifunkční manipulátor navržný pro přenášení materiálu součástí, nástrojů, nebo specializovaných zařázení atd.
        - Umožňují nějakou mobility
        - Může být naprogamován k vrlmi variabilním úkolům
        - Po naprogramování již pracuje v automatickém režimu
    - V technické praxi má v současné době smysl místo obecného robota, používat slovo průmyslový robot
    - Průmyslový robot je automaticky řízený, reprogramovatelný, robustní robot
    - Průmyslový manipulátor nemůže být průmslovým robotem
        - manipulátor nemůže převracet výrobek
    - Servisní robot jezdí v prostředí mezi lidmi
- **Robotika**
    - Teoretická - řeší otázky teoretické koncepční umělé inteligence
    - Technická
    - Aplikační

- Robotizované pracoviště
    - je účelové seskupení zařízení a jednoho či více promyslových robotů, které autonomně, v autpmatickém pracovním cyklu vykonává manipulační  a technologické operace daného výrobního procesu.
# Klasifikace
- Podle početu stupňů volnosti
- Podle kinematické struktury
- Podle použítých pohonů
- Podle geometrie pracovního prostoru
- Podle pohybový charakteristik
- Podle způsobu řízení
- Podle způsob programování

### Z hlediska řízení a programování
- Manipulátor
    - Jednoúčelový manipulátor, manipulátor s pevným programem
- Syncronní manipulátor¨
    - člověk ve smyčce, man on line, master-slave
- Robot
    - Manipulátor s pružným programem
- Adaptivní robot
    - Robot reaguje na změny pracovní scény
- Kognitivní robot
    - Robot s určitou mírou inteligence
- Konativní
    - Near future

### Počet stupňů vonosti
- Univerzální robot
- Reduntatní 
- Deficitní

### Kinematická struktura
- Seriové
    - v každém kloubu je jeden motor
- Paralerní roboty
    - na základě pohybu horních 

### Druhy pohonů
- Elektrické
- Hydraulické
- Pneumatické

### Geometrie pracovního prostoru
- Kartézská
- Cylindrická
- Sférická
- Angulární
- SCARA

### Konpaktnost
- Univerzální
- Modulární konstrukce

### Generace robotů
- Nultá generace
    - manipulátory a roboty zpravidla bez zpěté vazby, kdy veškeré poruchy či změny 
- První generace
    - roboty s jadnoduchou zpětnou vazbou, schopné přepínáníé několika
- Druhá generace
    - roboty se schopností optimalizace tj. schopností vybírat z pře
- Třetí generace
- Čtvrtá generace

### Geoometrie PRaA
- Při odvíjení základníh úloh....

### Kritéria volby vsazeb a ppohonů
- Tvar a velikost pracovního prostoru
- Požadovaná dráha těžiště objektu manipulace, (napnuté rameno se nepoužívá často)
- Požadovaná přesnost polohování
- Požadovaná orientace
- Volba druhu pohonu jednotlivých os
- Vhodné konstrukční provedení kinematické dvojice 
- Způsob součinosti PR (prumyslového robota) s periferiemi

- Řetězec může být poppsán posloupností 
- Konematické řetězce se označují také podle toho v jakém prostoru se pohybují koncové boddy horního ramene 
- Zatímco typ 

### Manipulace
- jakákoliv činnost vedoucí ke změně staavu bjeku
    - polární souřadnice
    - kartérské souřadnice

### Translační kinematická struktura
 - Lineární pohyb v ose x, y, z
 - Tři posuvné pohyby
 - Nedocházá ke změně orientace pohybu

### Prostorovaá portálová struktura
 - neomezuje provozní prostor v hale
- paletizace
- manipulace

### Rovinná portálová struktura

### Cylindrická válcová kinematická struktura
- Realizována tak, že nosná část ramene se otáčí kolemm osy z a rameno má možnost zdvihu v ose y a výsuv v ose x 
- Jeden rotační a dva posuvné pohyby
- obsluha obráběcích strojů
- obsluha při plošném 

### Sférická kinematická struktura
    - 

### Kinematická struktura SCARA
- vysoká tuhost
- vysoká přesnost

### Paralelní kinematická struktrura
- vysoká tuhost
- minimální problémy s ohybem konstrukce

### Struktura a ustrojí 
- Průmyslový robot je složitý mechtronický systélm, který ze strukturovat z několika hledisek
- Subsystémy
        - Akční 
        - Řídící 
        - Vnímací
 - Podle rozsahu pohybů a jejich účelu se realizují jednotlivými skupinami 

### Parametry PR
 - Nosnost
 - Dosah
 - Volitelné krití
 - Provedení 
 - Opakovatelná přenost
 - Rychlost
 - Zrychlení
 - Aplikace
 - Rozměry

||Pneumatické|Elektrické|Hydralické
 -|-|-|-|
 transformace|.|+|.|
 doprava energie|+|+|.
 výroba|+|+|.
 úniky|.|+|.
 regulace|.|+|.
 nosnost|.|.|+

### Pneumatické
```plantuml

digraph foo {

	node [shape = 1];kompresor;úpravna ;
	
kompresor->úpravna;
úpravna -> rozvaděče;
 
   
 
}


```


### PLC
- **Robustnost**
- **Programování (asembler)**
- **Rychlost**
- **Architektura**
    - modulární 
    - kompaktní
- **Diagnostika**
    - umožňuje rychlé odstranění poruch; samotestovací diagnostika, grafické znázornění pochodů v řízené technologii

### Koomponenty PLC
- šasi
- napájecí modul
- CPU modul
- vstupní, výstupní moduly 
- komunikační moduly

### Struktura vstupů a výstupů
- Na binární se připojují tlačítka, přepínače atd.
### Upgrade
- snížení chyybovosti
- snížení prostojů
- zvýšení dostupnosti náhradních dílů

### ST zápis
y:= NOT ($x_1$ AND NOT $x_2$)OR($x_1$)


## Snímače
- Odměřování polohy v prostoru
- Regulace dynamických pohybových veličin
- Snímače pro technologické opeorace
- Kalibrace
- Speciální
### Základní rozdělení
- Podle funkce
    - Absolutní (bitový zápis polohy)
    - Inkrementální (Neví kde je jen že není tam kde by měl být)
- Dle druhu práce se signály
    - Analogová (Napětí 0-10 V| Proud 4-24 mA)
    - Digitální
- Dle vazby na měřený objekt 
    - Dotykový
    - Bezdotykový
### Struktura systému
- Polohová senzorika
- Senzory pro kontrolu pohybu 

#### Indukční senzory
- reagují na feromagnetické materiály
- Princip snímače je zalořin na změně inpedace cívky vlivem vířivých proudů indukovaný ve snímaném předmětu
- pracují bezdotykově
- bez zpětného působení
- použití:    
    - detekce polohy
    - počítaní kusů
    - regulace
    - inspekční uloha
    - koncové snímače
- princip
    - aktivním prvkem je cívka ulístěná na jádru poloviny feritového hrníčku
    - napájení 10 - 30V (24V)
                - 150 - 200 mA
    - koncový stupeň ochrana proti skratu
        - temistor rozpojí obvod při překročení určité teploty
        - taktování (protože dochází k pravidelnému zapnutí a vypnutí vlivem ohřátí a chladnutí)
        - funkční cca 10 min
- spínací vzdálenost
    - Je vzdálenost mezi clonkou a čelem senzoru při ktré dojde k změně výstupního signálu
    - Jak měřící clonka je předepsaná destička silná 1mm
#### Magnetiké senzory
- měření změny magnetického pole
- Dva typy
    - halova sonda 
    - jazýčkové relé
#### Kapacitní snímače
- C=$\epsilon_0*\epsilon*\frac S d$
- Pracují jako indukční senzory
- bez dotikově, bez zpětného působení, s polovodičovým výstupem
- Dají se s nimi detekovat kovové i nekovové materiály
- Rušivé vlivy
    - Hlavní zdroje ruení jsou elektromagnetická střídavá pole

#### Optické

#### Ultrazvukové

#### Tenzometry

#### Kamerové systémy


##### Požadavky na pracovní hlavice
- Minimální hmotnost
- Rozměry a prostorové uspořádání
- Provozní bezpečnost
- Provozní spolehlivost


### Uchopové hlavice

Dělení podle způsobu úchopu
- Mechanické
- Podtlakové
- Magnetické
**nebo**
- Pasivní
- Aktivní

**Zakladní parametry úchopných hlavic**
- Typ prvku (hlavice a její struktura)
- Úchopná síla
- Přesnost polohy objektu
- Pracovní rozsah hlavice
- Maximální příčný a podélný rozměr
- Hmotnost
- Druh energie pro napájení aktivních prvků
- 

### Motory robotů
**Požadavky**
- Minimální hmotnost
- Vhodné prostorové uspořádání
