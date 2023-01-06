from math import *

def soucet ():
    a = int(input("zadej a"))
    b = int(input("zadej b"))
    print ("Součet čísel: ",a+b)


def korenyKvadratickeRovnice():
    a = int(input("Zadej člen kadratické části: ")) #1.2
    b = int(input("Zadej člen lineární části: "))#1.2
    c = int(input("Zadej člen absolutní části: "))#1.2

        
   
    if a==0:
        if b==0:
            print("Nejedná se o rovnici" )
        else:
            print("Kořen lineárního polynomu: ",-c/b)
    else:
        Diskriminant = int((b**2)-(4*a*c))
        if Diskriminant==0:
            k1 = (-b+(sqrt(Diskriminant)))/(2*a)
            print("Oba kořeny jsou stejné: ",k1)
            print("Oba kořeny jsou stejné: ",k2)
            
        elif Diskriminant>0:
            k1 = (-b+(sqrt(Diskriminant)))/(2*a)#1.2
            k2 = (-b-(Diskriminant**(1/2)))/(2*a)#1.2
            print("První kořen: ",k1)
            print("Druhý kořen: ", k2)
        else:
            real = -b/(2*a)
            img = sqrt(-Diskriminant)/(2*a)
            print("První kořen: ",real, "+",img,"j", sep=" ")
            print("Druhý kořen: ",real, " - ",img,"j", sep="")
            

def objemKoule(r):
    V = float(4/3*pi*r**3)
    return V 

def obsahPlasteKoule(r):
    S = float(4*pi*r**2)
    return S

def kouleVypocty():
    r = float(input("zadejte poloměr"))
    print ("Objem koule je: ", objemKoule(r))
    print ("Obsah pláště koule je: ", obsahPlasteKoule(r))


def deleniFunkce(a,b):
    if b==0:
        print("dělit nulou nelze")
        return 
    else:
        print("Podíl:", int(a/b))     
        print("Zbytek:", int(a%b))     

def deleni():
    a = int(input("zadej a"))
    b = int(input("zadej b"))
    deleniFunkce(a,b)
    print(znamenko(a))
    celociselneDeleniPomociCyklu(a,b)
    vsechnyDelitele(a)

def znamenko(a):
    if a<0:
        return "-"
    else:
        return "+"

def celociselneDeleniPomociCyklu(a,b):
    
    i=0
    while a>=b:
        a -= b
        i +=1
    print ("podíl pomocí funkce while:",i)
    print ("Zbytek po dělení pomocí funkce while:",a)

def nulaUkonci():
    b=0
    while True:
        a=int(input("nenulové číslo:"))
        b+=a
        if a==0:
            break
    print(b)

def vsechnyDelitele (a):
    b=a
    while a>0:
        c = b%a
        if c==0:
            print ("dělitel čísla a je",a)
        a=a-1

def ulozeniSeznamu():
    seznam=[]#ctrl+alt+f , ctrl+alt+g

    while True:
        a=int(input("nenulové číslo:"))
        if a==0:
            break
        seznam.append(a)
    print(seznam)

    for prvek in seznam:
        print (prvek)

def najdiPrvocislo():
    a = int(input("zadej limit"))
    listPrvocisel = a * [True]
    for cislo in range (2,a
    
    ):
        if listPrvocisel [cislo]:
            print (cislo)
            for i in range (2*cislo, a, cislo):
                listPrvocisel [i] = False


def faktorial(n):
    if n <= 1:
        return 1
    else: 
        return n * faktorial(n-1)

def fibonacihoPosloupnost (n):
    if n==0:
        return 0
    elif n==1:
        return 1
    else:
        return fibonacihoPosloupnost(n-2) + fibonacihoPosloupnost(n-1)

def mocnina(x,n):
    if n==0:
        return 1
    else:
        return x*mocnina(x,n-1)

print (mocnina(2,4))
