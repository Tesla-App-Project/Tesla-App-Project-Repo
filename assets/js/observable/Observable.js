import {SafeObserver} from "./SafeObserver.js";
import {Subscription} from "./Subscription.js";

export const pipe = (...fns) => (val) => fns.reduce((acc, f) => f(acc), val);
 
export class Observable{
    constructor(initFunction){
        this.initFunction = initFunction;
    }
 
    subscribe(observer){
        const subscription = new Subscription();
        const safeObserver = new SafeObserver(observer, subscription);
        const teardown = this.initFunction(safeObserver);
        subscription.addTeardown(teardown);
        return subscription;
    }
    
/**
 * Permet de concaténer l'exécution d'observables prenant en paramètre d'autres observables
 * @param  {...any} observables
 * @returns l'observable résultat 
 */

    pipe(...fns) {
        return pipe(...fns)(this);
      }
}