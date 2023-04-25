let swRegistration;

window.addEventListener('load', async () => {

    if ('serviceWorker' in navigator) {
        navigator.serviceWorker
            .register('./service-worker.js')
            .then(swReg => {
                console.log('Service Worker is registered', swReg);
                swRegistration = swReg;

                displayNotification("Tesla", "Bienvenue sur l'application Tesla");
            })
            .catch(error => {
                console.error('Service Worker Error', error);
                document.querySelector('.offline-banner').classList.remove('hidden');
            });

        navigator.serviceWorker.addEventListener('message', (event) => {
            console.log(event.data.msg, event.data.url);

            if (event.data.msg === "offline") {
                document.querySelector('.offline-banner').classList.remove('hidden');
            }
        });
    }
});

function checkOnlineStatus() {
    if (navigator.onLine) {
        document.querySelector('.offline-banner').classList.add('hidden');
    } else {
        document.querySelector('.offline-banner').classList.remove('hidden');
    }
}

window.addEventListener('online', checkOnlineStatus);
window.addEventListener('offline', checkOnlineStatus);