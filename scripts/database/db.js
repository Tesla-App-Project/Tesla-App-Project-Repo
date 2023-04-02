class Database {

    constructor(store, storeName) {
        this.storeName = storeName;
        this.store = store;
        this.store.version(1).stores({
            [this.storeName]: `
            id,
            batteryLevel`,
        });
    }

    storeExists(name) {
        return this.store.table(name);
    }

    initializeCar() {
        this.store[this.storeName].put({ id: 'car-1', batteryLevel: null });
    }

    async getBatteryLevel() {
        let carData = await this.store[this.storeName].get('car-1');
        return carData.batteryLevel;
    }

    async setBatteryLevel(level) {
        await this.store[this.storeName].update('car-1', { batteryLevel: level });
        return level;
    }
}