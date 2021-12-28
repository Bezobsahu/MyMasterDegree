#Zadání
$ \frac {d^2y} {dt^2}+5 \frac {dy} {dt}+6y=60u$
### 1. Proveďte Laplaceovu transformaci rovnice systému

předmět|název funkce|obraz|
|-|-|-|
$\delta$ (t) |diracův impuls |1|
1 (t) |jednotkový skok|1/p| 
t|čas|$\frac {1}{p^2}$
$y'(t)$|1.derivace (nulové počáteční podmínky)|$p*Y(p)$
$y^{(n)}(t)$|n-tá derivace|$p^nY(p)$
Zadání
$ \frac {d^2y} {dt^2}+5 \frac {dy} {dt}+6y=60u$
*Ekvivalentní zápis*
$y''(t)+5y'(t)+6y=60u$
*Laplacentova transformace*
$p^2Y(p)+5p*Y(p)+6*Y(p)=60U(p)$


### 2. Napište přenos systému
$G(p)=\frac {Y(p)}{U(p)}$
*Laplacentův obraz vstupu*
$G(p)=\frac {60}{p^2+5p+6}$
### 3. Nakreslete přechodovou charakteristiku
$H(s)= \frac {1}{p} *  \frac {60} {p^2+5p+6}= \frac {60}{p(p+2)(p+3)}$
$60*(\frac{A}{p}+\frac{B}{p+2}+\frac{C}{p+3})=60*(\frac{Ap+2A+Bp}{p*(p+2)}+\frac{C}{p+3})=60*(\frac{Ap^2+2Ap+Bp^2+3Ap+6A+3Bp+Cp^2+2Cp}{p(p+2)(p+3)})=60*(\frac{p^2*(A+B+C)+p(2A+3A+3B+2C)+6A}{p(p+2)(p+3)})$

A+B+C=0
2A+3A+3B+2C=0
6A=1
-
$A=\frac {1}{6}$

$B=-C-\frac {1}{6}$
$5*\frac {1}{6}+3(-C-\frac {1}{6})+2C=0$
$\frac {5}{6}-3C-\frac {3}{6}+2C=0$
$\frac {2}{6}=C$
$C=\frac {1}{3}$

$B=-\frac {1}{3}-\frac {1}{6}$
$B=-\frac {1}{2}$

$H(s)=60(\frac {1}{6}*\frac {1}{p}-\frac {1}{2}*\frac {1}{p+2}+\frac {1}{3}*\frac {1}{p+3})$

$h(t)=\Zeta^{-1}=10-30e^{-2t}+20e^{-3t}$
$\lim h(t) = \lim 10-30e^{-2t}+20e^{-3t}=10 $
$t\to \infty $
#### Inflexní bod
$(10-30e^{-2t}+20e^{-3t})''=(60e^{-2t}+60e^{-3t})'=-120e^{-2t}+180e^{-3t}=60e^{-3t}(-2e^{t}+3)$
$60e^{-3t}(-2e^{t}+3)=0$
$e^{-3t}>0$
$-2e^{t}+3=0$
$e^{t}=\frac 32/ln?$
$t=ln\frac 32 $
$t=0,405465$
$h(ln\frac 32)=10-30e^{-2ln\frac 32 }+20e^{-3ln\frac 32 }=\frac {70}{27}=2,5925926$
#### Další body
$h(0)=10-30+20=0$
$h(\frac {1}2)=10-\frac {30}{e}+\frac {20}{(e^3)^{1/2}}=3,42621997$
$h(1)=10-\frac {30}{e^2}+\frac {20}{(e^3)}=6,935683$
$h(2)=10-\frac {30}{e^4}+\frac {20}{(e^6)}=9,500106$
#### Drafické znázonění
![Impuls](./ImpulsFuncion.JPG)
### 4. Nakreslete frekvenční charakteristiku v komplexní rovině
 $G(j\omega)=\frac {60}{(j\omega)^2+5j\omega+6}=\frac {60}{-\omega^2+5j\omega+6}=\frac {60}{-\omega^2+5j\omega+6}*\frac {-\omega^2-5j\omega+6}{-\omega^2-5j\omega+6}=\frac {60*(-\omega^2-5j\omega+6)}{(-\omega^2+6)^2+(5\omega)^2}=\frac {60*(-\omega^2+6)}{(-\omega^2+6)^2+(5\omega)^2} +\frac {-5\omega*60}{(-\omega^2+6)^2+(5\omega)^2}j$
 
 -----

 $G(0)=\frac {60*6}{36}+0j=10$
 $G(\infty)=0+0j=0$
 #### Průsečík s osou y
 $60*(-\omega^2+6)=0$
 $\omega=\pm\sqrt 6$
 $G(\pm\sqrt 6)=0+\frac{5*\sqrt6*60}{25*6}=\pm 2\sqrt 6j=\pm 4,899j$
 $G(1)=\frac {60*5}{25+25}+\frac {-300}{25+25}=6-6j$
 ![Frekvence](./FrequencyFuncion.JPG)
 ### 5. Nakreslete frekvenční charakteristiku v logaritmických souřadnicích
$H(p)=\frac {60}{p^2+5p+6}=\frac {60}{(p+2)*(p+3)}=\frac {60}{2(\frac {p}{2}+1)*3(\frac p3+1)}=10*\frac {1} {\frac p2+1 \frac p3+1}$
$K=10\to20\log 10= 20 dB$
***Póly:***
$
 \omega _{p1}=2$
$\omega _{p2}=3$
![Frekvence](./FrekvenceLog.JPG)
![Frek](./frekvenceLog2.JPG)
### 6. Zjistěte, zda je systém stabilní
***póly:***
$\omega _{p1}=2$
$\omega _{p2}=3$
Oba póly jsou záporné, leží tedy ve stabilní oblasti a proto je systém **stabilní**.
