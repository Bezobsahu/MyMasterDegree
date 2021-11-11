#include <stdio.h>
#include <ADUC812.H>
//realizace logicke fce
sbit iA = P2^5;
sbit iB = P2^4;
sbit iC = P2^3;
sbit iD = P2^2;
sbit oF = P2^7;

unsigned char helpChar, firstAnd, secondAnd, thirdAnd;
void main ()
{iteration:     helpChar=P2;
            firstAnd= helpChar&(helpChar>>1);//b2
            secondAnd= firstAnd&(~helpChar<<1);//b4
            thirdAnd= helpChar&(~helpChar>>2);//b3
            helpChar= firstAnd<<1|secondAnd>>1|thirdAnd;

        if ((helpChar&0x08)==0) oF=0; else oF=1;
    goto iteration;
}
