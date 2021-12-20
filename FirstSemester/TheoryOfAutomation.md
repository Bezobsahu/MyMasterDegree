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
