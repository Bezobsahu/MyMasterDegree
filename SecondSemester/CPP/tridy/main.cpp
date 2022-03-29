#include <iostream>

using namespace std;

class Tdatum {
    public:
        bool Nastav (int prden,int prmesic,int prrok);
        void Vypis () {cout << den << "." << mesic<<"."<<   rok << endl;}
    private:
    int den, mesic, rok;
};

bool Tdatum::Nastav (int prden,int prmesic,int prrok){

    rok=prrok;
    mesic=prmesic;
    den=prden;
    return true;
}


int main()
{


    cout << datum.den << "." << datum.mesic<<"."<< datum.rok << endl;
    return 0;
}
