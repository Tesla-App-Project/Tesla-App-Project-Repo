import {Subscription} from "./Subscription.js";

export class SafeObserver{
    constructor(baseObserver, subscription){
        this.baseObserver = baseObserver;
        this.B_isUnsubbed = false;
        this.subscription = subscription;
        this.subscription.addTeardown(() => {
            this.B_isUnsubbed = true;
        });
    }
 
    next(value){
        if(this.baseObserver.next && !this.B_isUnsubbed){
            this.baseObserver.next(value);
        }
    }
 
    error(err){
        if(this.baseObserver.error && !this.B_isUnsubbed){
            this.B_isUnsubbed = true;
            this.baseObserver.error(err);
            this.subscription.unsubscribe();
        }
    }
 
    complete(){
        if(this.baseObserver.complete && !this.B_isUnsubbed){
            this.B_isUnsubbed = true;
            this.baseObserver.complete();
            this.subscription.unsubscribe();
        }
    }
}