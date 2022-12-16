Documentation sur les Observables
================================
# Introduction
## Observer
Pour utiliser un observable, on aura besoin d'un observer. Un observer est un objet possédant 3 
fonctions : next(val), error(err) et complete().
La fonction next(val) prend en argument la ou les données passées à l'observer. Cette fonction sera 
ensuite appelée par l'observable à chaque fois qu'il reçoit une valeur.
La fonction error(err) est appelée lorsque l'observable reçoit une erreur et prend en argument l'erreur 
reçue.
La fonction complete() ne prend pas d'arguments et est appelée lorsque l'observable reçoit une 
notification de complétion.
Exemple :
```js
const observer = {
    next: (val) => {console.log('valeur reçue :' + val);},
    error: (err) => {console.warn('erreur reçue: ' + err);},
    complete: () =>; {console.log('notification de complétion reçue');}
};
```
## Subscription
Pour utiliser un observable, on doit y souscrire. Pour faire ça on appelle la fonction .subscribe
(observer) de l'observable. La fonction subscribe(observer) nous renverra ensuite un objet de type 
Subscription qu'on pourra ensuite utiliser pour arrêter l'observable avec sa fonction unsubscribe().
Exemple :
```js
const monObservable = new Observable(function);
const maSubscription = monObservable.subscribe({
    next: (val) => {console.log('valeur reçue :' + val);},
    error: (err) => {console.warn('erreur reçue: ' + err);},
    complete: () =>; {console.log('notification de complétion reçue');}
}); // l'observable est actif
maSubscription.unsubscribe(); //l'observable n'est plus actif
```
# Opérateurs
interval(I_period).
Les opérateurs sont des fonctions renvoyant des observables. On a deux types d'opérateurs: les 
opérateurs de création qui peuvent être utilisés de façon indépendante et les opérateurs pipeable qui 
sont combinés avec d'autres observables
## Opérateurs de création
### Interval
Interval crée un observable qui émet des nombres s'incrémentant chaque période de temps spécifié.
On choisira la période de temps avec le paramètre.
Exemple :
```js
const monInterval = interval(1000);
const maSubscription = monInterval.subscribe({
    next: (val) => {console.log(val);},
    error: (err) => {console.warn('erreur reçue: ' + err);},
    complete: () =>; {console.log('fini');}
});

//Résultats :
//0
//1
//2
//3
//4
//etc... jusqu'à ce qu'on unsubscribe
```
### Of
of(A_data).
Of crée un observable émettant les valeurs qui lui sont passées en argument. 
Exemple :
```js
const A_maData = [0,1,2,3,4];
const monOf = of(A_maData);
const maSubscription = monInterval.subscribe({
    next: (val) => {console.log(val);},
    error: (err) => {console.warn('erreur reçue: ' + err);},
    complete: () =>; {console.log('fini');}
});

//Résultats :
//0
//1
//2
//3
//4
```
### FromEvent
fromEvent(targetElement, evenement)
FromEvent crée un un observable qui permet d'assigner une fonction de gestion d'événement une fonction à 
un élément cible à chaque fois qu'il est souscrit.
Exemple :
```js
const monBouton = document.getElementById('buttonId');
const monFromEvent = fromEvent(monBouton, 'click');
const maSubscription = monFromEvent.subscribe({
    next: (val) => {console.log(val);},
    error: (err) => {console.warn('erreur reçue: ' + err);},
    complete: () => {console.log('fini');}
});

//Résultat
//Loggera le click à chaque fois qu'on cliquera sur le bouton
```
On est pas obligé de se contenter de logger l'événement, on peut aussi faire des vrais fonctions :
```js
const monBouton = document.getElementById('buttonId');
const monFromEvent = fromEvent(monBouton, 'click');
let I_i = 0;
const maSubscription = monFromEvent.subscribe({
    next: (val) => {console.log(I_i++);},
    error: (err) => {console.warn('erreur reçue: ' + err);},
    complete: () => {console.log('fini');}
});

//Qui loggera :
//0
//1
//2
//3
//etc... à chaque clic
```
## Opérateurs pipeable
Les opérateurs pipeable auront tous un observable source qui leur passera des valeurs. On les utilisera 
donc avec .pipe, qui est une fonction d'Observable dont j'ai pas franchement compris le fonctionnement 
donc je peux pas expliquer comme ça marche, mais en gros ça permet d'enchaîner les observables en 
renvoyant une chaîne qui est elle même un observable.
Exemple :
```js
const monObservableDeCreation = new Observable(function); 
// on crée un observable de création qui passera des valeurs à l'observable pipeable
const monObservablePipeable = new Observable(function); 
// on crée un observable pipeable qui utilisera l'observable de création comme source
const maChaineDObservable = monObservableDeCreation.pipe(monObservablePipeable); 
// on "pipe" les 2 observables
const maSubscription = maChaineDObservable.subscribe({
    next: (val) => {console.log(val);},
    error: (err) => {console.warn('erreur reçue: ' + err);},
    complete: () => {console.log('fini');}
}); //on souscrit à la chaîne
```
On peut aussi enchaîner plusieurs observables pipeables :
```js
const monObservableDeCreation = new Observable(function); 
const monObservablePipeableUn = new Observable(function); 
const monObservablePipeableDeux = new Observable(function);
const monObservablePipeableTrois = new Observable(function);
const maChaineDObservable = monObservableDeCreation.pipe(monObservablePipeableUn, 
monObservablePipeableDeux, monObservablePipeableTrois); 
// on "pipe" tous les observables à la suite avec une virgule
const maSubscription = maChaineDObservable.subscribe({
    next: (val) => {console.log(val);},
    error: (err) => {console.warn('erreur reçue: ' + err);},
    complete: () => {console.log('fini');}
}); 
```
Une autre façons d'enchainer plusieurs observables pipeables :
```js
const monObservableDeCreation = new Observable(function); 
const monObservablePipeableUn = new Observable(function); 
const monObservablePipeableDeux = new Observable(function);
const maChaineDObservable = monObservableDeCreation.pipe(monObservablePipeableUn.pipe(monObservablePipeable2)); 
// on "pipe" l'observable deux à l'observable un
const maSubscription = maChaineDObservable.subscribe({
    next: (val) => {console.log(val);},
    error: (err) => {console.warn('erreur reçue: ' + err);},
    complete: () => {console.log('fini');}
}); 
```
### Map
map(function)
Map applique une fonction passée en argument aux valeurs émises par l'observable source puis les émet 
sous forme d'observable.
Exemple :
```js
const monObservableSource = of([1,2,3]);
function maFonction (I_x){
    return(I_x*10);
}
const maChaine = monObservableSource.pipe(map(maFonction));
const maSubscription = maChaine.subscribe({
    next: (val) => {console.log(val);},
    error: (err) => {console.warn('erreur reçue: ' + err);},
    complete: () => {console.log('fini');}
}); 
//Résultats
//10
//20
//30
```
On peut aussi définir la fonction directement lors de la déclaration de map :
```js
const monObservableSource = of([1,2,3]);
const maChaine = monObservableSource.pipe(map(I_x => I_x*10));
const maSubscription = maChaine.subscribe({
    next: (val) => {console.log(val);},
    error: (err) => {console.warn('erreur reçue: ' + err);},
    complete: () => {console.log('fini');}
}); 
```
### SwitchMap
switchMap(observableEmetteurDeFonction)
SwitchMap applique plusieurs fonctions émises par un observable passé en argument aux valeurs émises par 
un observable source, puis les émet sous forme d'observable.
Exemple :
```js
const monObservableSource = of([1,2,3]);
const monObservableEmetteurDeFonction = (I_x => of([I_x*2, I_x*3, I_x*4]));
const maChaine = monObservableSource.pipe(switchMap(monObservableEmetteurDeFonction));
const maSubscription = maChaine.subscribe({
    next: (val) => {console.log(val);},
    error: (err) => {console.warn('erreur reçue: ' + err);},
    complete: () => {console.log('fini');}
}); 

//Résultats
// //Les valeurs émises par l'observable sources sont soumises à la première fonction :
// 2 * val
//2
//4
//6
// //Elles sont ensuite soumises à la deuxième fonction
//3
//6
//9
// //Puis la troisème
//4
//8
//12
```
### MergeMap
mergeMap(observableEmetteurDeFonction)
Même principe que switchMap, la différence est que lorsque switchMap reçoit la deuxième fonction de la 
part de son observable émetteur de fonction, les valeurs ne pourront plus être soumises à la première 
fonction. Concrètement les 2 foncctionnent de la même façon, mais mergeMap pourra appliquer la première 
fonction à une nouvelle valeur reçue même s'il a commencé à émettre avec la deuxième fonction.
### Take
take(I_nombreDeValeursAPrendre)
Take prend un certain nombre de valeurs passé en argument émises par un observable source.
Exemple :
```js
const monObservableSource = of([1,2,3,4,5]);
const maChaine = monObservableSource.pipe(take(3));
const maSubscription = maChaine.subscribe({
    next: (val) => {console.log(val);},
    error: (err) => {console.warn('erreur reçue: ' + err);},
    complete: () => {console.log('fini');}
}); 

//Résultats :
//1
//2
//3
//fini
```
### TakeUntil
takeUntil(observableDeNotification)
TakeUntil émet des valeurs émises par un observable source jusqu'à recevoir une notification de 
l'observable passé en argument.
Exemple :
```js
const monObservableSource = interval(1000); //envoie une valeur toutes les secondes
const monObservableDeNotification = interval(5000); //envoie une valeur toutes les 5 secondes
const maChaine = monObservableSource.pipe(takeUntil(monObservableDeNotification));
const maSubscription = maChaine.subscribe({
    next: (val) => {console.log(val);},
    error: (err) => {console.warn('erreur reçue: ' + err);},
    complete: () => {console.log('fini');}
}); 

//Résultats
//0
//1
//2
//3
//4
```
### PipeInterval
pipeInterval(I_period)
PipeInterval émet les valeurs émises par l'observable source chaque période de temps spécifiée en 
paramètre.
Exemple:
```js
const monObservableSource = of([1,2,3]);
const maChaine = monObservableSource.pipe(pipeInterval(1000));
const maSubscription = maChaine.subscribe({
    next: (val) => {console.log(val);},
    error: (err) => {console.warn('erreur reçue: ' + err);},
    complete: () => {console.log('fini');}
}); 

//Résultats
//Après une seconde
//1
//2
//3
//Après deux secondes
//1
//2
//3
//etc... chaque seconde
```