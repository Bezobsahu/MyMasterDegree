#Čítače a časovače
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