export class Subscription{
    constructor(){
        this.A_teardowns = [];
    }
 
    addTeardown(teardown){
        this.A_teardowns.push(teardown);
    }
 
    unsubscribe(){
        this.A_teardowns.forEach(teardown =>teardown());
        this.A_teardowns = [];
    }
}