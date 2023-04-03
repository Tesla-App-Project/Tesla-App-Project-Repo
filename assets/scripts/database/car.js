function displayCarInfo() {
    api.getBatteryLevel()
        .then((level) => database.setBatteryLevel(level)).then(level => {
            batteryLevel.innerText = level;
        })
        .catch(function () {
            database.getBatteryLevel().then(level => {
                batteryLevel.innerText = level;
            });
        });
}