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