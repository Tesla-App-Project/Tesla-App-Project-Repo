let swRegistration;

window.addEventListener('load', async () => {
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker
            .register('./service-worker.js')
            .then(swReg => {
                console.log('Service Worker is registered', swReg);
                swRegistration = swReg;

            })
            .catch(error => {
                console.error('Service Worker Error', error);
            });
    }
});