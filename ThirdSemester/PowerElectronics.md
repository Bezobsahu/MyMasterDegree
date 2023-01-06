# Vývoj měničové techniky
- Podmíněn potřebou přeměny obvodových paramametrů elektrické energie (U, I, f,m)
## Rozdělení podle principu
1. Faradayův indukční zákon
2. Řízené spínací a přetušování obvodů

## Princip Faradayova zákona
- Synchronní konventory
- Rotační soustrojí (Ward - Leonard)
- Transformátory

## Princip řízeného spínací a přerušování obvodů
- mechanické kontaktní usměrňovače/střídače
- měniče selenové (relativně malé proudy) (desetiny až jednotky Ampér)
- elektronky (relativně malé prody)
- výbojky Hg
- polovodiče e, Si

## Rozdělení VE
1. usměrňovače
2. střídače
3. stejnosměrné měniče
4. střídavé měniče
- měniče napětí
- měniče kmitočtu 
- měnič počtu fází
- měniče impedance (kompenzace/dekompenzace)

## Součástky VE - rozdělení
- Neřízené (diody/ diaky)
- S řízeným zapínáním (tyristory, triaky)
- S řízeným zapínáním i vypínnáním (transistory, GTO tyristory, IGBT/IG-FET isoleted gate bipolar transistor, feild effect transistor)

## Diody
- pouze 1 PN přechod
- určeny pro průmyslové frekvence 50 - 60 Hz, použitelnost do 400 Hz
- proudová zatížitelnost až 5kA (F), napěťová zatížitelnost až 6kV (R)

- Propustný směr (F)
    - $U_{T0}-$ pravové napětí 0,8 - 1,8 V
    - $U_{FM},I_{FM}-$ maximální velikosti

- Závěrný směr (R)
    - $U_{RWM}$ - pracovní závěrné napětí
    - $U_{RRM}$ - opakovatelné závěrné napětí
    - $U_{BR}$ - průrazné závěrné napětí

- Dynamické chování - zapínání/vypínání není skokové
- $t_{rr}$ - doba závěrného zotavení, závislá na velikosti komutačního náboje $Q_{rr}$

- Ztráty v součástce
    - účinkem propustného proudu 
    - účinkem závěrného proudu 
    - spínací 
    - vypínací 

### Diody specialní
- Diody rychlé a frekvnční 
- r:$t{rr}= 2-5\mu s$

# Jednopulsní usměrňovač s odporově induktivní zátěží
$\Tau = \frac {L} {R}$
#### Střední hodnota výstupního napětí:
$U_{dAV}= \frac 1 {2\pi} \int \limits_0^{\pi+\xi} \sqrt 2 *U *\sin (\omega t)*d(\omega t)=  \frac 1 {2\pi}*\sqrt 2*U[-cos(\cot)]^{\pi+\xi}= \frac {\sqrt 2 * U} {\pi} * \frac {1+\cos(\xi)} {2}$

STŘÍDAČE
    - přeměna ss-soustavy na střídavou
- S VNĚJŠÍ KOMUTACÍ
     - invetory - usměrňovače se specifickým druhem řízení
- S VLASTNÍ KOMUTACÍ
    - vybaveny komutačními obvody nebo vypinatelnými součástmi
- SPECIÁLNÍ (měkká komutace)
    - komutovány v okamžiku
    - AC strana obsahuje rezonanční obvod

STŘÍDAČ

- NAPĚŤOVÝ
    - malá $Z_i$, přítomnost C
    - převažuje u regul. AC-pohonů
- PROUDOVÝ
     - velká $Z_i$, přítomnost L
     - tvar produ nezávislí na parametrech zátěže
     - náročnost na napěťvou odolnost elektronických součástech

