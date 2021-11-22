#Konečné automaty
$\sigma ^*(q_0,w)=q_k\in F ✓ $ 
   $ \notin T 🞪  $

   Příklad 1
Nakreslete přechodový graf pro DFA: M=({q0, q1, q2, q3}, {a,b,c}, $\sigma $, q0, {q2, q3}) a rozhodněte, zda jazyk L obsahující slova (řetězce) {aabcbca, baabc, ccbcaab, acabbcc, bbccaa} je akceptovaný M a zda se jedná o  regulární jazyk. Sestrojte tabulku dostupnosti stavů.
$\sigma$(q0, a)=q1
$\sigma$(q0, b)=q0
$\sigma$(q0, c)=q3
$\sigma$(q1, a)=q1
$\sigma$(q1, b)=q2
$\sigma$(q1, c)=q3
$\sigma$(q2, a)=q2
$\sigma$(q2, b)=q2 
$\sigma$(q2, c)=q3 
$\sigma$(q3, a)=q0
$\sigma$(q3, b)=q2
$\sigma$(q3, c)=q3

```plantuml

digraph foo {

	//node [shape = doublecircle]; ;
	node [shape = circle] ;

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
pravilo     x -> y
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
