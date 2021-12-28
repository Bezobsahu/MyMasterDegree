#include <stdio.h>
#include <ADUC812.H>

sbit LED=P3^4;

unsigned char clockChar=0;

main ()
{
    TMOD = 0x01; //b1 = 0 , b0 =  1 �e�im 1

cycle:
    TH0 = 0xD8; // nastaven� honoty kdy dojde k p�ete�en�
    TL0 = 0x36; // nastaven� honoty kdy dojde k p�ete�en�
    TR0 = 1; //spu�t�n� �asova�e
    while (clockChar <10)
       {
        while (!TF0); //p�ete�en�
        clockChar = clockChar+1;
        TF0 = 0;
    }
    TR0 = 0; //vypnut� �asova�e
    clockChar=0;
    LED = (!LED);
    goto cycle;

}