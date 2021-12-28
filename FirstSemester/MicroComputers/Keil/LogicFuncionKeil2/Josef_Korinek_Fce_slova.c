#include <stdio.h>
#include <aduc812.h>
unsigned char bdata inputChar;
sbit iA = P2^5;
sbit iB = P2^4;
sbit iC = P2^3;
sbit iD = P2^2;
sbit oF = P2^7;
main ()
{iteration:     inputChar=P2;
    oF =(iC&&iD||iA&&iB&&~iC||iC&&~iA);
goto iteration;
}