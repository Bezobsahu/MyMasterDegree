#include <stdio.h>
#include <ADUC812.H>

sbit LED=P3^4;

unsigned char clockChar=0;

main ()
{
    TMOD = 0x01; //b1 = 0 , b0 =  1 øežim 1

cycle:
    TH0 = 0xD8; // nastavení honoty kdy dojde k pøeteèení
    TL0 = 0x36; // nastavení honoty kdy dojde k pøeteèení
    TR0 = 1; //spuštìní èasovaèe
    while (clockChar <10)
       {
        while (!TF0); //pøeteèení
        clockChar = clockChar+1;
        TF0 = 0;
    }
    TR0 = 0; //vypnutí èasovaèe
    clockChar=0;
    LED = (!LED);
    goto cycle;

}