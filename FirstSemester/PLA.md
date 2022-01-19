# 18) Co je to Grafcet? Popište strukturu diagramu.
grafický návrhový nástroj pro řídicí systémy, popisuje pouze logický automat v matematickém smyslu,
nezávisle na technologii a konečné realizaci
znázornění zakreslování GRAFCET
Si
... stavy
Ti
... logické výrazy definující podmínku přechodu ze stavu Si-1 do stavu Si
Vi
... logické výrazy definující hodnoty výstupů ve stavu Si
i…. 0 až n
1. Grafcet obsahuje dva základní prvky: krok a přechod.
2. Každý krok se může vyskytovat ve dvou stavech: aktivní nebo neaktivní
aktivita kroku je znázorněna značkou (tečka)
3. Ke kroku lze vázat akci, jež je výstupem logického popisu v Grafcetu.
4. K přechodu je vázána podmínka, je vstupem logického popisu v Grafcetu
Obr. 16 značení v GRAFCET
Postup návrhu sekvenčního řízení:
1. určíme jednotlivé kroky (stavy) a jejich pořadí v sekvenci,
2. určíme vstupy, pro daný krok významné,
3. vytvoříme logické výrazy definující podmínky pro přechody mezi kroky,
4. pro každý krok vytvoříme logické výrazy, které určují hodnoty výstupů
5. vytvoříme sekvenční diagram řízení a odvodíme logické rovnice pro jednotlivé kroky
Otázka 03
Odvození rovnic pro vytvoření řídícího programu:
z diagramu odvodit soustavu logických rovnic:
kroky a přechody – budou logickými proměnnými v rovnicích a v
programu automatu => nutné
vhodně označit např.: K1, K2, K3 ….kroky diagramu
P1, P2, P3 … přechody diagramu
Pro aktivitu kroku K2 platí že:
K2 se stane vždy aktivní, jestliže K1 je aktivní a je splněna podmínka
přechodu P1 a zůstaneme v něm dokud nebude splněna podmínka P2.
Tato věta charakterizuje aktivitu kroku v čase jako podmínku vstupu
do kroku, setrvání v něm a opuštění kroku. To lze vyjádřit boolskou
funkcí konkrétně pro krok K2:
𝐾2 = 𝐾1 · 𝑃1 + 𝐾2 · 𝑃2 Obr. 17 schéma úlohy 1
První člen: 𝐾1 · 𝑃1 - podmínka vstupu do kroku
Druhý člen: 𝐾2 · 𝑃2- podmínka udržení v kroku a výstupu z kroku
Pro všechny kroky dostaneme tyto logické funkce:
Postup - krokování po rovnicích - možná by chtělo zkrátit
Ki = 1 pak je aktivní; Ki = 0 je krok neaktivní
Start cyklického vyhodnocování funkcí (1) až (3) – Vstup do kroku K1 :
- krok K1 bude aktivní (K=1), je.- li druhý člen funkce (1) roven 1 (podmínka P1= 0 nesplněna, s = 0)
- kroky K2 a K3 budou neaktivní, protože oba členy funkcí (2) a (3) jsou rovny nule
- po změně hodnoty podmínky P1 na jedničku (po načtení hodnoty s = 1 při otočce cyklu programu) se
druhý člen ve funkci stane nulový a tím se deaktivuje krok K1 (K1 = 0).
Vstup do kroku K2 a dalších kroků:
- vzniká zde problém, -- > v reálných PA se funkce vypočítávají postupně za sebou, a proto ve výpočtu
následujících funkcí se uplatní už nové hodnoty předcházejících funkcí !!!!!
• když se krok K1 stane neaktivní (K1 = 1) díky výpočtu funkce (1), nemůže se vzápětí „vstupní“ člen
funkce (2) nastavit na 1 a nedojde tedy k aktivaci kroku K2.
• problém lze obejít tím, že zajistíme aby se aktivace následujícího kroku provedla vždy před deaktivací
předcházejícího kroku
• toho dosáhneme tak, že opuštění (deaktivaci) kroku K1 v druhém členu podmíníme aktivací následujícího
kroku ( /K2 ) místo splnění podmínky přechodu ( /P1 ).
Otázka 03
- funkce zabezpečí --> při provedení přechodu aktivuje následující krok dříve, než se opustí předcházející
- během jednoho cyklu programu - dva kroky aktivní současně několik jednotek až desítek milisekund,
to v naprosté většině případů řízení technologických procesů nevadí

19) Popište princip Paralelismu a Synchronizace v prostředí Grafcet.
20) Popište princip Výběru a Spojení v prostředí Grafcet.
21) Definujte pravidla pro tvorbu algoritmu v prostředí Grafcet.