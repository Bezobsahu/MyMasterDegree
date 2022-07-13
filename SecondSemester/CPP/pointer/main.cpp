#include <iostream>
using namespace std;
struct TKomplex
{
   int re;
   int im;
};
void Nuluj(int *x)
{
  *x=0;
}
bool Podil(int a,int b,int *vysledek)
{
  *vysledek=(b==0)?0:(a/b);  //if (b==0) *vysledek=0; else *vysledek=a/b;
  return (b==0)?false:true;  //if (b==0) return false; else return true;
}

int Soucet(int x,int y)
{
    return x+y;
}
int Nasobeni(int x,int y)
{
    return x*y;
}
int Operace(int a,int b,int (*funkce)(int,int))
{
 return (*funkce)(a,b);
}
int main()
{
  int x=5;
  cout << Operace(5,3,Soucet);
  Nuluj(&x);
  cout << "x=" << x;
  int *vysledek;
  vysledek=new int;
  if (Podil(6,2,vysledek)) cout << "Podil=" << *vysledek;
  else cout << "Cisla nelze podelit";
  delete vysledek;
/*    int a=5,b=10;
    int *p,*q;
    TKomplex *x;
    for (int i=0;i<1000000000;i++) {
     x=new TKomplex;
     (*x).re=5;
     x->im=10;
     delete x;
     x=new TKomplex;
     x->re=20;
     x->im=30;
     delete x;
    }*/
    return 0;
}
