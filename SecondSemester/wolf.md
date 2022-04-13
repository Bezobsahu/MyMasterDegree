# Vnitřní popis
Blokové schema
vnější popis 
- vztah mezi výstupem a vstupem
vnitřní popi
- vztah mezi vstupem, výstupem a stavy

Příklad:

𝐽 𝜑 " + 𝐵 𝜑′ = 𝐾 u

počet stavových proměných je stejný jako řád systému


# Nelineární systém
je tvořen různým propojením lineárních a nelineárních prvků

# +

x.1=(x1)(x2)^2+2/(x3)

# Stabilita

**lineární systémy:** 
    - není ovlivňována vnějšími signály
    - stačí znalost diferenciální rovnice
    - není potřeba znát počáteční podmínky
**nelineární systémy:**
    - složitější 
    - je ovliviňována vnějšími signály
    - třeba znát počatáční podmínky

# Dynamické programování
optimalizační metoda víceetapových rozhodovacích procesů

Přepoklad užití: možnost rozdělit daný rozhodovací proces na etapy, v každé etapě provést takové rothodnutí, aby byl dotažen optimální efekt celého procesu

1. rozhodování o investicích
2. model teorie zásobníku 
    - JUST IN TIME
3. model teorie obnovy
4. některé problémy matematického programu
5. problémy pořadí
6. volba optimálního nákladu
7. nejkratší cesta sítí

**ROZHODNUTÍ** - stanovení hodnot řiditelných proměnlivých v danné etapě
**STRATEGIE** - posloupnost po sobě následujících rozhodnutí

Cílem je najít **OPTIMÁLNÍ STRATEGII** 
    - Optimální vzhledem ke zvolenému kriteriu optimality


**Bellmanův princip optimality:**
Optimální strategie má následující vlastnost:
Ať jsou počáteční stavy procesy a rozhonutí v prví etapě jakékoliv, poslopnost následujích rozhodnutí musí tvořit optimální strategii vzhledem ke stavu procesu, vzniklém v důsledku rozhodnutí v první etapě.

## OPTIMÁLÍ ROZDĚLOVÁNÍ OMEZENÉHOO ZDROJE DO OBLASTÍ
Zdroj o velikosti z -> rozdělit do n oblastí
$x_j$ (j=1,..,n) - čast  zdroje přidělená do j-té oblasti
$g_j (x_j)$ (j=1,..,n) - efekt použití zdroje $x_j$ v j-té oblasti (zisk, náklady)

předpoklad: nezávislosti a aditivnosti dílčích efektů


## EXTREMÁLNÍ REGULACE

```plantuml

digraph foo {

	node [shape = 1];extermálníRegulátor, bezPokusnéhoSignálu, seSpojtýmPrůběhemAkčníVeličity ;
	

 
   
 
}
``` 

$p_1$=0,7
$p_2$=0,6
$c_1$=2
$c_2$=1
c=7
$z_c=2c_1+c_2<=7$
F=P
## Vzorkování a číslicová regulace

### Číslicový regulační obvod
```plantuml

digraph foo {

	node [shape = 1];

ŘízenýObjekt,
Vzorkování,
Kvantování,
Kódování,
PočítačVýpočet,
Dekódování,
Kvantování2,
Tvarování,
AkčníOrgán;

ŘízenýObjekt ->
Vzorkování ->
Kvantování->
Kódování->
PočítačVýpočet->
Dekódování->
Kvantování2->
Tvarování->
AkčníOrgán-> ŘízenýObjekt
}
```


Číslicový regulátor určuje jednotlivé akční veličiny u(k) výpočtem z posloupnosti získaných vzorků y(k) a w(k).

**Vstup - regulační odchylka:**

$e(k)=w(k)-y(k)$

**PID regulátor:**

$u(t)=u(0) +[e(t)+\frac 1{T_I} \int^1 _2  ] $
