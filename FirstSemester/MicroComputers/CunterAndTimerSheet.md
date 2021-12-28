# Cvičení
Generování kmitočtu 10 kH
```c
#include <stdio.h>
#include <ADUC812.H>

sbit LED=P3^4;
main ()
{
    TMOD = 0x02;
    TH0 = -100;
    TL0 = -100;
    TR0 = 1;

cycle:  
    while (!TF0);
    TF0 = 0;
    LED = (!LED);
    goto cycle;
}
```

```c
#include <stdio.h>
#include <ADUC812.H>
sbit LED=P3^4;
main ()
{
    TMOD = 0x01;

cycle:
    TH0 = 0xFE;
    TL0 = 0x18;
    TR0 = 1;

    while (!TF0);
    TR0 = 0;

    TF0 = 0;
    LED = (!LED);
goto cycle;
}
````
N - pořadové číslo v systému tedy 6
jeden MHz je jedna µs
schema časovače 8 51 má na oscilátoru zpomalení 12 tiku


### 1. Zadání
|vztah pro T/2|jednotky čas. úseku|přesnost %|režim |převod|THn|TLn|TLn korekce
|-|-|-|-|-|-|-|-|-|
|60|µs|+/- 1 µs|0|8 191 - 60 = 8 131 |1111 1110 = FE| 0 0011 = 03|03+(7+3)=0E
```C
#include <stdio.h>
#include <ADUC812.H>

sbit LED=P3^4;

main ()
{
    TMOD = 0x00; //b1 = 0 , b0 =  0 řežim 0

cycle:
    TH0 = 0xFE; // nastavení honoty kdy dojde k přetečení
    TL0 = 0x0E; // nastavení honoty kdy dojde k přetečení
    TR0 = 1; //spuštění časovače

    while (!TF0); //přetečení
        TR0 = 0; //vypnutí časovače

        TF0 = 0;
        LED = (!LED);
    goto cycle;

    
}
```
### 2. Zadání
|vztah pro T/2|jednotky čas. úseku|přesnost %|režim |převod|THn|TLn|TLn korekce
|-|-|-|-|-|-|-|-|-|
|12| ms| +/- 5 µs|1|65 535-12 000=53 535|1101 0001=D1|0001 1111=1F|1F+11=2A

```c
#include <stdio.h>
#include <ADUC812.H>

sbit LED=P3^4;

main ()
{
    TMOD = 0x01; //b1 = 0 , b0 =  1 řežim 1

cycle:
    TH0 = 0xD1; // nastavení honoty kdy dojde k přetečení
    TL0 = 0x2A; // nastavení honoty kdy dojde k přetečení
    TR0 = 1; //spuštění časovače

    while (!TF0); //přetečení
        TR0 = 0; //vypnutí časovače

        TF0 = 0;
        LED = (!LED);
    goto cycle;
    
```

### 3. Zadání

|vztah pro T/2|jednotky čas. úseku|přesnost %|režim |převod|THn|TLn|TLn korekce
|-|-|-|-|-|-|-|-|-|
| 0,6| s |+/- 1 ms|1|9x65535+65535|D8|36|bez
```c
#include <stdio.h>
#include <ADUC812.H>

sbit LED=P3^4;

unsigned char clockChar=0;

main ()
{
    TMOD = 0x01; //b1 = 0 , b0 =  1 řežim 1

cycle:
    TH0 = 0xD8; // nastavení honoty kdy dojde k přetečení
    TL0 = 0x36; // nastavení honoty kdy dojde k přetečení
    TR0 = 1; //spuštění časovače
    while (clockChar <10)
       {
        while (!TF0); //přetečení
        clockChar = clockChar+1;
        TF0 = 0;
    }
    TR0 = 0; //vypnutí časovače
    clockChar=0;
    LED = (!LED);
    goto cycle;

}
```
```C
#include <stdio.h>
#include <ADUC812.H>

sbit LED=P3^4;
sbit SW1=P3^2;
int CAS= -50000;
unsigned int pocet_pret=0;

void extern1 () interrupt 0
{
    LED=0;
    TL1=CAS;
    TH1=(CAS>>8);
    TR1=1;
}

void timer1 () interrupt 3 
{
    TL1=CAS;
    TH1=(CAS>>8);
    pocet_pret++;
    if (pocet_pret==40)
    {
        LED=1;
        pocet_pret=0;
        TR=0;
    }
main ()
{
    TMOD = 0x10;
    TCON = 0x05;
    IE = 0#89;

sem: goto sem;

}
}
```