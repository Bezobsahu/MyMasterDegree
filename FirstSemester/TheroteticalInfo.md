#Konečné automaty
$\delta ^*(q_0,w)=q_k\in F ✓ $ 
 $ \delta ^*(q_0,w)=q_k\notin T 🞪  $
$\delta^*$ - rozšířená přechodová funkce
$q_0$ - počáteční stav
$w$ - vstupní slovo
$q_k$ - konečný stav
**Akceptovaný jazyk** - množina znaků w které vzniknou zřetězením vstupních symbolů z množiny $\Sigma$

### Příklad 1
Nakreslete přechodový graf pro DFA: M=({q0, q1, q2, q3}, {a,b,c}, $\delta $, q0, {q2, q3}) a rozhodněte, zda jazyk L obsahující slova (řetězce) {aabcbca, baabc, ccbcaab, acabbcc, bbccaa} je akceptovaný M a zda se jedná o  regulární jazyk. Sestrojte tabulku dostupnosti stavů.

**Množina přechodových funkcí**
$\delta$(q0, a)=q1
$\delta$(q0, b)=q0
$\delta$(q0, c)=q3
$\delta$(q1, a)=q1
$\delta$(q1, b)=q2
$\delta$(q1, c)=q3
$\delta$(q2, a)=q2
$\delta$(q2, b)=q2 
$\delta$(q2, c)=q3 
$\delta$(q3, a)=q0
$\delta$(q3, b)=q2
$\delta$(q3, c)=q3
**Přechodový graf**
```plantuml

digraph foo {

	node [shape = circle];q0;q1 ;
	node [shape = doublecircle];q2;q3 ;

 q0 -> q1 [label=a]
 q0 -> q0 [label=b]
 q0 -> q3 [label=c]
 q1 -> q1 [label=a]
 q1 -> q2 [label=b]
 q1 -> q3 [label=c]
 q2 -> q2 [label=a]
 q2 -> q2 [label=b]
 q2 -> q3 [label=c]
 q3 -> q0 [label=a]
 q3 -> q2 [label=b]
 q3 -> q3 [label=c]
   
 
}


```
**Tabulka dostupnosti stavů**
|Q\ $\Sigma$|a|b|c|
|-----|-----|-|-|
|$q_0$|$q_1$|$q_0$|$q_3$|
|$q_1$|$q_1$|$q_2$|$q_3$|
| $q_2$|$q_2$|$q_2$|$q_3$|
| $q_3$ |$q_0$|$q_2$|$q_3$|

$\delta ^*(q_0,aabcbca)=q_0\notin F 🞪 $ 
$\delta ^*(q_0,baabc)=q_3\in F ✓ $
$\delta ^* (q_0,ccbcaab)=q_2 \in F✓ $
$\delta ^* (q_0,acabbcc)=q_3\in F ✓ $
$\delta ^* (q_0,bbccaa)=q_1\notin F 🞪 $ 

### Příklad 2
Navrhněte a nakreslete přechodový graf DFA, který přijímá všechna slova jazyka L nad abecedou {0,1}, která končí řetězcem "101". Sesstrojte tabulku dostupnosti stavů. 
M: 	Q={q0,....}
(DFA)
$\Sigma$ ={0,1} $w\in \Sigma ^*$
L(M)={101,}
```plantUml
digraph foo {
	node [shape = circle]; q0; q1; q2 ;
	node [shape = doublecircle];q3 ;

 q0 -> q1 [label=1];
 q0 -> q0 [label=0];
 q1 -> q2 [label=0];
 q2 -> q3 [label=1];
 q2 -> q0 [label=0];
 q1 -> q1 [label=1];
 q2 -> q1 [label=1];
 q3 -> q1 [label=1];
 q3 -> q2 [label=0];


 
}
 
```
**Tabulka dostupnosti stavů**
|Q\ $\Sigma$|0| 1|
|-----|-----|-----|
|$q_0$|$q_0$|$q_1$|
|$q_1$|$q_2$|$q_1$|
|$q_2$|$q_0$|$q_3$|
|$q_3$|$q_2$|$q_1$|

## Nedetermistický konečný automat

přechodová funkce může skončit v množině stavů nebo v žádném

### Příklad 4
||0|1|
|-|-|-
|$q_0$|{$q_0$,$q_1$}|{$q_1$}|
|$q_1$|{$q_2$}|{$q_2$}|
|$q_2$|$\empty$|{$q_1$}|

```plantUml
digraph foo{
	node [shape = circle]; q0; q1 ;
	node [shape = doublecircle]; q2 ;

 q0 -> q0 [label=0];
 q0 -> q1 [label=0];
 q0 -> q1 [label=1];
 q1 -> q2 [label=0];
 q1 -> q2 [label=1];
 q2 -> q2 [label=1];

}
 ```
 $\delta ^*(q_0,0)=${$q_0,q_1$}$ \notin F 🞪$
 $\delta ^*(q_0,00)=${$q_0,q_1,q_2$}$ \notin F ✓$
 $\delta ^*(q_0,11)=${$q_2$}$ \notin F ✓$
 $\delta ^*(q_0,111)=${$q_2$}$ \notin F ✓$
 $\delta ^*(q_0,110)=${$\empty$}$ \notin F 🞪$

**Sestrojení DFA pro NFA**
```plantUml
digraph foo{
	node [shape = circle]; ´´q0´´; ´´q0q1´´ ;´´q1´´;´´∅´´;
	node [shape = doublecircle]; ´´q2´´ ;

 ´´q0´´ -> ´´q0q1´´ [label=0];
 ´´q0q1´´  -> ´´q0q1q2´´ [label=0];
 ´´q0´´ -> ´´q1´´ [label=1];
 ´´q0q1´´->´´q1q2´´ [label=1];
 ´´q1q2´´ ->´´q2´´ [label=0]
 ´´q1q2´´ ->´´q2´´ [label=1]
 ´´q0q1q2´´ -> ´´q0q1q2´´ [label=0]
 ´´q0q1q2´´ -> ´´q1q2´´ [label=1]
 ´´q1´´ -> ´´q2´´ [label=0];
 ´´q1´´ -> ´´q2´´ [label=1 ];
 ´´q2´´ -> ´´∅´´ [label=0 ];
 ´´q2´´ -> ´´q2´´ [label=1 ];
  ´´∅´´ -> ´´∅´´ [label=0 ];
 ´´∅´´ -> ´´∅´´ [label=1 ];
 

}
 ```
# Jazyky a gramatiky
### Abeceda
$\Sigma^*$ množina všech řetězců včetně $\lambda$
$\Sigma^+$ množina všech neprázdných řetězců

Předpokládejme $\Sigma$ ={a, b}, potom $\Sigma^*$ 

={$\lambda$, a, aa, ab, ba, bb, aaa, . . .}
Jaká slova w obsahuje jazyk L, je-li jazyk L dán vztahem:
L1={(ab): n: n >= 1}={ab,abab,ababab...}
L2={$\lambda$,b, b...b, ab...b, aabb...}
L3={$\lambda$}
### Přepisovací pravidlo 
řetězec     w=uxv
pravilo     $x \to y$
z=uxv

//u zkoušky pravá a levá lineární gramatika

Jaký jazyk L(G) generuje gramatika G daná přepisovacími pravidly. Rozhodněte, o jaký typ gramatiky
se jedná.
a) G1: S->aSb|$\lambda$ = {$\lambda$,ab,aabb,aaabbbb,....}={a^n^b^n^:n>=0}
b) G2 -> abA^

### Sestavení NFA z pravidel gramatiky
Příklad 1
```plantUml

digraph foo {

	node [shape = doublecircle];q2 ;
	node [shape = circle]; q0;

q0 ->qA [label=a]
qA ->q2 [label=b]
qA ->q3 [label=a]
q3 ->q0 [label=b]
q0 ->q1 ->qA [label=b]

}

   ```
### Bezkontextové dramatiky - zjednodušení pravidel
### Odstranění nulových proměných
V_N = {A}
 $X A -> \lambda$
### Pravidlo substituce
### Odstranění jednotkových pravidel
### Odstranění neužitečných pravidel
proměná není užitečná ve dvou případech
#### Nelze odvodit terminální řetězec
#### Neodvoditelné z S nebo z nich nejde odvodit terminální řetězec 