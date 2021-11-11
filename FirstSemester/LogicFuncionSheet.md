## Logická funkce
$F = f(A,B,C,D)=C.D+A.B./C+C./A$
## Pravdivostí tabulka
A|B|C|D|Y|
|-|-|-|-|-|
|0|0|0|0|0
|0|0|0|1|0
|0|0|1|0|1
|0|0|1|1|1
|0|1|0|0|0
|0|1|0|1|0
|0|1|1|0|1
|0|1|1|1|1
|1|0|0|0|0
|1|0|0|1|0
|1|0|1|0|0
|1|0|1|1|1
|1|1|0|0|1
|1|1|0|1|1
|1|1|1|0|0
|1|1|1|1|1
# Funkce přepsaná do bitobé tabulky
$F = f(A,B,C,D)=C.D+A.B./C+C./A$
|b7|b6|b5|b4|b3|b2|b1|b0|des
|-|-|-|-|-|-|-|-|-|
|F| |A|B|C|D|||helpChar
||F| |A|B|C|D||helpChar>>1
|| | |BA|CB|**DC**|||firstAND
| |nA|nB|nC|nD||||~helpChar<<1
|| ||**BAnC**|CBnD||||secondAnd
|||nF| |nA|nB|nC||~helpChar>>2
|| |||**CnA**|DnB|||thirdAnd
```c
#include <stdio.h>
#include <ADUC812.H>
//realizace logické fce
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

```
```c
#include <stdio.h>
#include <aduc812.h>
code unsigned char outputTruthTable[]={0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 0, 1, 1, 1, 0, 1};
main()
{
unsigned char input,filteredInput;
iteration: input=P2>>2;
filteredInput= 0x0F & input;
if (outputTruthTable[filteredInput]==1) P2 |= 0x80 ; 
    else P2 &= 0x7F;

goto iteration;
}
```
