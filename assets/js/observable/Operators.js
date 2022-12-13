import {Observable} from "./Observable.js";
import {SafeObserver} from "./SafeObserver.js";
import {Subscription} from "./Subscription.js";

/**
 * Renvoie des valeurs incrémentées de 1 sous forme d'observable
 * @param {Integer} I_period en ms, l'intervalle d'envoie des valeurs
 * @returns flux de valeur incrémentées sous forme d'observable
 */

const interval = (I_period) => {
    return new Observable(observer => {
        let I_counter = 0;
        const id = setInterval(() => observer.next(++I_counter), I_period);
        return() => {
            clearInterval(id);
        }
    });
}

/**
 * Applique une fonction passée en paramètre aux valeurs d'un observable et renvoie les valeurs
 * transformées sous forme d'observable
 * Utiliser avec pipe
 * @param {Function} mapFunc fonction à appliquer aux valeurs
 * @returns Les valeurs transformées sous forme d'observable
 */

const map = (mapFunc) => (sourceObservable) => {
    return new Observable(observer => {
        const sourceSubscription = sourceObservable.subscribe({
            next(val){
                let next;
                try{
                    next = mapFunc(val);
                }catch (e){
                    this.error(e);
                }
                observer.next(next);
            },
            error(err){
                observer.error(err);
            },
            complete(){
                observer.complete();
            }
        });
        return() =>{
            sourceSubscription.unsubscribe();
        }
    });
}

/**
 * Prend les I_combien première valeurs renvoyées par un observable et les renvoie sous forme d'observable
 * @param {Integer} I_combien  nombre de valeurs à récupérer
 * @returns  Les valeurs voulues sous forme d'observable
 */

const take = (I_combien) => (sourceObservable) => {
    let I_counter = 0
    return new Observable(observer => {
      const sourceSubscription = sourceObservable.subscribe({
        next: (val) => {
          I_counter++;
          observer.next(val);
          if (I_counter >= I_combien) {
            observer.complete();
            sourceSubscription.unsubscribe();
          }
        },
        error: (err) => {
            observer.error(err);
        },
        complete: () => {
            observer.complete();
        }
      });
      return () => sourceSubscription.unsubscribe();
    });
  }

/**
   * Renvoie des datas passées en argument sous forme d'observable
   * @param {Array} A_data Data à renvoyer sous forme d'observable
   * @returns la data voulue sous forme d'observable
   */
  const of = (A_data) => {
    return new Observable(observer => {
        A_data.forEach(element => {
            observer.next(element);
        });
        return() => {};
    });
  }

  /**
   * Renvoie les valeurs passées par un observable à interval régulier sous forme d'observable
   * @param {Integer} I_period période de l'intervalle en ms
   * @returns les valeurs voulues sous forme d'observable
   */

const pipeInterval = (I_period) => (sourceObservable) => {
    return new Observable(observer => {
        let id;
        const sourceSubscription = sourceObservable.subscribe({
            next(val){
                id = setInterval(() => observer.next(val), I_period);
            },
            error(err){
                observer.error(err);
            },
            complete(){
                observer.complete();
            }
        });
        return() => {
            clearInterval(id);
            sourceSubscription.unsubscribe();
        }
    });
}

/**
 * Applique un ou plusieurs fonctions passées en argument par un observable aux valeurs renvoyées
 * par un observable
 * @param {*} innerObsReturningFunc observable renvoyant les fonctions
 * @returns les valeurs sous formes d'observables
 */
const switchMap = (innerObsReturningFunc) => (sourceObs) => {
    let innerSubscription;
    return new Observable(observer => {
      const sourceSubscription = sourceObs.subscribe({
        next(val) {
          if(innerSubscription){
              innerSubscription.unsubscribe();
          }
          const innerObs = innerObsReturningFunc(val);
          innerSubscription = innerObs.subscribe({
            next: (_val) => observer.next(_val),
            error: (_err) => observer.error(_err),
            complete: () => observer.complete()
          });
        },
        error() {},
        complete() {}
      });
      return () => {
        innerSubscription.unsubscribe();
        sourceSubscription.unsubscribe();
      }
    });
  }