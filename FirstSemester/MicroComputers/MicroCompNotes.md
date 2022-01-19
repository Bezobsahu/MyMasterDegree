# Stavebnice logických obvodů
### TTL
![TTL](./Images/TTLSchema.JPG)
1. Napájecí napětí:
$U_{CC}=5V$
- Napěťové rozsahy
$U_{IL}=0-0,8V $
$U_{IH}=2-5,5V$
$U_{OL}=0-0,4V$
$U_{OH}=2,4-U_{CC}$
2. Šumová imunita
$\delta_H= U_{OH}-U_{IH}=2,4-2V=0,4V$
$\delta_L= U_{IL}-U_{OL}=0,8-0,4V=0,4V$
3. Logický zisk
(zatížitelnost výstupu)
$N=10-30 $
Na výstup můžeme připojit až N hradel stejné modifikace
4. Zpoždění signálu na jedno hradlo
$t_p = 19 ns$
5. Převodní charakteristika
![TTLCharacteristic](./Images/TTLCharacteristic.JPG)

### CMOS
![CMOSSchema](./Images/CMOSSchema.JPG)
1. Napájecí napětí
$U_{CC}=3-18V$
**Pro: $U_{CC}=5V$**
- Napěťové rozsahy
$U_{IL}=1,5V(0,3U_{CC}) $
$U_{IH}=3,5V(0,7U_{CC})$
$U_{OL}=0-0,5V (0U_{CC})$
$U_{OH}=4,95 (U_{CC})$

2. Šumová imunita
$\delta_{HL}=2,2 (0,4U_{CC}) $
3. Logiký zisk
velký
4. Zpoždění signálu na jedno hradlo
$t_{pd} =20ns$
5. Převodní charkteristika
![CMOSCharacteristic](./Images/CMOSCharacteristic.JPG)

### HC
1. Napájecí napětí
$U_{CC}=2-6V$
2. Šumová imunita
$\delta_H= U_{OH}-U_{IH}=2,5V$
$\delta_L= U_{IL}-U_{OL}=1,8V$
3. Logický zisk 
neznámý 
4. Zpoždění signálu na jedno hradlo
$t_{pd} =20ns$

5. Převodní charakteristika
![HCCharacteristic](./Images/HCharacteristic.JPG)
# Sekvenční logické obvody
### RS klopný obvod
#### Pomocí nand
Set
[![RSFlipFlopSet](./Images/RSFlipFlopSet.JPG)](https://www.falstad.com/circuit/e-nandff.html)
Reset
[![RSFlipFlopReset](./Images/RSFlipFlopReset.JPG)](https://www.falstad.com/circuit/e-nandff.html)
Memory
[![RSFlipFlopMemory](./Images/RSFlipFlopMemory.JPG)](https://www.falstad.com/circuit/e-nandff.html)
### Synchronní RS 
obohaceno o dva nandy na začátek
### D klopný obvod
[![DFlipFlopMemory](./Images/DFlipFlop.JPG)](https://www.falstad.com/circuit/e-edgedff.html)
### JK klopný obvod
[![JK](./Images/JKFlipFlop.JPG)](https://www.falstad.com/circuit/e-jkff.html)
### Posuvný registr
[![Register](./Images/ShiftRegister.JPG)](https://www.falstad.com/circuit/circuitjs.html?ctz=CQAgjCAMB0l3BWcMBMcUHYMGZIA4UA2ATmIxAUgpABZsKBTAWjDACgwEk8q09wwKEHyhQOXYXn4jsaYflGRxSGj3n8axQusVsASiDXZs2poRohj2iELBxh0JCkeLHbAO6GqVr8JpUlTxQpSxNJaX8xT1VvMJi-AI9fH2D+H0Dw0O149KSwDG0RVJ0M7DwLEXiRJQAZX2qS0QAzAEMAGwBnBmolTiRCDCERQhCGjIQCnQGhhQzphJB53OijMKWw3oly6QU8c0aMgp3+bZKk9e1T5cNVLJuIxKA) 

### Asynchronní binární čítač
[![Counter](./Images/Counter.JPG)](https://www.falstad.com/circuit/e-counter.html)

# Programovatelné logické obvody a polovodičové paměti
## PLD
Programovatelné logické pole jsou realizovány kombinací:
- AND hradel
- OR hradel
- propojovacích polí
- inventurů a klopných obvodů
![PLD](./Images/PLDExample.JPG)

#### PROM
Programovatelné read only memory jsou realizovány kombinací: 
- neprogramovatelné propojovací pole hradel AND
- programovatelné pole hradel OR

![PROM](./Images/PROMSchema.JPG)

#### PAL
Programovatelné array (pole) logic jsou realizovány kombinací: 
- programovatelné propojovací pole hradel AND
- neprogramovatelné pole hradel OR

![PAL](./Images/PALSchema.JPG)

#### FPLA
Field (polové) programovatelné logické array (pole) jsou realizovány kombinací: 
- programovatelné propojovací pole hradel AND
- programovatelné pole hradel OR
![FPLA](./Images/FPLASchema.JPG)

#### GAL
Obecné (generic) polové (array) logiky jsou realizovány kombinací:
- programovatelné pole hradel AND
- pevné pole hradel OR
- výstup hradla OR s makrobuňkou OLM (Output Logic
Macrocell)
![GAL](./Images/GALSchema.JPG)

#### FPGA
(Field Programmable Gate Array)
- programovatelná logické pole s jednoduchými funkčními
bloky
- reprogramovatelná
- matice kovových propojovacích vodičů - propojují
jednotlivé bloky
![FPGA](./Images/FPGASchema.JPG)
**IOB** (INPUT/OUTPUT BLOCK)
**CLB** (Configurable Logic
Block) 
**PI** 
![PI](./Images/FPGA_PISchema.JPG)

# Číselné soustavy
### BCD soustava
(Binary Coded Decimal)
0-9 v binárním zápisu 
### Grayův kód
mění se jen jeden bit 
používá se k měření úhlů
### Zabezpečené kódy
- detekční kódy – schopné chyby nalézt při přenosu,
- korekční kódy – schopné chybu nalézt a opravit,
- bezpečnostní kódy – schopné zabezpečit přenos proti
neoprávněnému čtení (šifrování)
### CRC
(cyclic redundancy check)
- stanovíme si generační polynom (1001)
- přidáme bity na konec dat (0000)
- data vyXorujeme na nulu pomocí polynomu
- přidané bity nenulujeme jen Xorujeme (0110)
- bity zapíšeme za konec dat (data0101)
- po přenosu jsme schopni zjisti zda došlo k chybě 
- pomocí polynomu xoruje z pravé strany
- až dojde k vynulování 
- v případě že k vynulování nedošlo pak je chyba v přenosu






___



Čítače a časovače
- **dva binární čítače/časovače**
- jejich stav je softwarově dostupný v registrech TH0, TL0 resp. TH1,TL1
- použití:
    - generování časových intervalů
    - čítání událostí
    - generování přenosové rychlosti pro sériový port (seriová komunikace zabere jeden čítač)
- řízení spuštění a zastavování čítačů/časovačů
    - hardware
    - software
- kommparační regidtry záchytné registry
- generování přerušení (bude popsáno později)
# Režimy čítačů/časovačů 8051
Režim činnosti čítačů/časovačů je určen nastavením registru **TMOD**
|b7|b6|b5|b4|b3|b2|b1|b0|bit
|-|-|-|-|-|-|-|-|-|
|GATE|C/T|M1|M0|GATE|C/T|M1|M0|adresa=89H
|1||||0||||čítač
**C/T** -výběr hodin čítače 
    - (=1) -externí
    - (=0) -oscilátor

**TCON** - obsahuje stavové a řídící bity časovače 0 a časovače 1
|b7|b6|b5|b4|b3|b2|b1|b0|bit
|-|-|-|-|-|-|-|-|-|
|TF1|TR1|TF0|TR0|IE1|IT1|IE0|IT0|


# Generování pulzů
```c
sbit LED=P3^4
main ()
{
    TMOD = 0x02;
    TH0 = -50;
    TL0 = -50;
    TR0 = 1;
cycle:  
    while (!TF0);
    TF0 = 0;
    LED = (!LED);
    goto cycle;
}
```
