let swRegistration;

let store = new Dexie("TeslaApp");
let database = new Database(store, "car");

let api = new API();

let batteryLevel;

window.addEventListener('load', async () => {
    loadElements();

    if (!database.storeExists("car"))
        database.initializeCar();

    if ('serviceWorker' in navigator) {
        navigator.serviceWorker
            .register('./service-worker.js')
            .then(swReg => {
                console.log('Service Worker is registered', swReg);
                swRegistration = swReg;

                displayNotification("Tesla", "Bienvenue sur l'application Tesla");
                displayCarInfo();
            })
            .catch(error => {
                console.error('Service Worker Error', error);
            });
    }
});

function loadElements() {
    batteryLevel = document.querySelector('#battery-level');
}