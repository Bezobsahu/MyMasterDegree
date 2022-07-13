#include <iostream>
#include <string>

#include <stdio.h>
#include <windows.h>
#include <conio.h>

using namespace std;

//operátory
double addition (double x, double y){
    return (x+y);
}
 subtraction (double x, double y) {
    return (x-y);
}
 double multipication (double x, double y){
    return (x*y);
 }
 double division (double x, double y) {
    return (x/y);
 }


 //router
double calcule (double x, double y, char o) {
    if (o == 's') {
        addition(x,y);}
    else if (o == 'o') {
        subtraction(x,y);
    }
    else if (o == 'n') {
        multipication (x,y);
    }

     else if (o == 'd') {
        division(x,y);
    }

    else {
        cout << "Chybný operátor" << endl;
        return 0;
    }
}

//ošetření a input
double checkeddoubleIn (){
    bool isdouble = false;
    while (isdouble == false)
    {
        string x;
        cin >> x;
        for (double i=0; i<x.length();i++)
        {
            if (isdigit(x[i]))
                {
                isdouble = true;
                }
            else
                {
                isdouble = false;

                break;
                }
        }

            if (isdouble == true)
        {
            double xx;
            xx = stoi(x) ;
            return(xx);
        }
            else
        {
            cout<<"Písmena zatím neumíme, zkuste čísla"<<endl;


            }
    }
}

char checkedCharIn (){
    char x;
    x = getch();
    if (x=='o' || x=='s' || x=='d' || x=='n' ){
        return(x);
    }
    else {
        cout << "Překlik.  ";
        checkedCharIn ();
    }
}

char endFunction()
{
    cout << "Pro přerušení stiskněte k" << endl;
    cout << "Pro nové zadání stiskněte libovolnou klávesu" << endl;
    char wannaEndChar;
    wannaEndChar = getch();
    return(wannaEndChar);
}

int main()
{
    char endCh='a';
    while (endCh!='k')
    {
        SetConsoleOutputCP(65001);

        cout << "Zadej první hodnotu" << endl;
        double x = checkeddoubleIn();
        cout << "Zadej operaci" << endl;
        cout << "s-sčítání, o-odčítání, n-násobení, d-dělení" << endl;
        double o = checkedCharIn();
        cout << "Zadej druhou hodnotu" << endl;
        double y =  checkeddoubleIn();


        double v;
        v = calcule(x,y,o);
        cout << "Výsledkem je:" << endl;
        cout << v << endl;
        endCh = endFunction();

    }
return 0;

}
