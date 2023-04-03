function displayNotification(title, body) {

    if (!window.Notification) return;

    const options = {
        body: body,
        icon: '/icon.png',
    };

    if (Notification.permission === 'granted') {
        swRegistration.showNotification(title, options);
    } else {
        Notification.requestPermission().then(permission => {
            if (permission !== 'granted') {
                alert('Notification permission not granted');
            }
            else {
                swRegistration.showNotification(title, options);
            }
        })
    }
}