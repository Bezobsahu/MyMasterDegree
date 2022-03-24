#include <iostream>

using namespace std;

int main()
{
    int a=5, b=10;
    int *p,*q;
    p=&a;
    p++;
    cout << *p << endl;
    return 0;
}
