#Zadání
Ovládání unipolárního krokového motoru. 
Výstupní piny pro ovládání jednotlivých fází zvolte po řadě na pinech portu P2.0 až P2.3. 

t = 42ms - doba, po kterou je připojena jedna fáze KM
|vztah pro T/2|jednotky čas. úseku|přesnost %|režim |převod|THn|TLn|odladění
|-|-|-|-|-|-|-|-|-|
|42| ms| +/- 5 µs|1|65 535-42 000=23 535|0101 1011=5B|1110 1111=EF|69 00


```c
#include <stdio.h>
#include <ADUC812.H>
//output
sbit o1 = P2^0;
sbit o2 = P2^1;
sbit o3 = P2^2;
sbit o4 = P2^3;
//input
sbit i1 = P3^0; //0 stop 1 start
sbit i2 = P3^1; //0 doprava 1 doleva



void main ()
{
TMOD = 0x01; //b1 = 0 , b0 =  1 řežim 1


cycle:
	if (i1 == 1){

		if	 (i2 == 0){

		 			TH0 = 0x69; // nastavení honoty kdy dojde k přetečení
		    		TL0 = 0x00; // nastavení honoty kdy dojde k přetečení
		    		TR0 = 1; //spuštění časovače
		
		   			while (!TF0); //přetečení
		        	TR0 = 0; //vypnutí časovače
		
		        	TF0 = 0;
		
		        	if (o4 == 1){
						o4 = (!o4);
						o1 = (!o1);
					}
					else if (o1 == 1){
						o1 = (!o1);
						o2 = (!o2);
					}
					else if (o2==1){
						o2 = (!o2);
						o3 = (!o3);
					}
					else if (o3==1){
						o3 = (!o3);
						o4 = (!o4);
					}

                    else o1=1;
			}
		 else { //if i2=1
		 		   
		 			TH0 = 0x69; // nastavení honoty kdy dojde k přetečení
		    		TL0 = 0x00; // nastavení honoty kdy dojde k přetečení
		    		TR0 = 1; //spuštění časovače
		
		   			while (!TF0); //přetečení
		        	TR0 = 0; //vypnutí časovače
		
		        	TF0 = 0;
		
		        	if (o4 == 1){
						o4 = (!o4);
						o3 = (!o3);
					}
					else if (o1 == 1){
						o1 = (!o1);
						o4 = (!o4);
					}
					else if (o2==1){
						o2 = (!o2);
						o1 = (!o1);
					}
					else if (o3==1){
						o3 = (!o3);
						o2 = (!o2);
					}
                    else o1=1;

		 
		    } 
    }
    		
			  
		
	else {
		o1 = 0; 
		o2 = 0;
		o3 = 0; 
		o4 = 0;
		}

goto cycle;

}


```