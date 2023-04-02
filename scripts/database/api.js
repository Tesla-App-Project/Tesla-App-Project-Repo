class API {

    constructor() {
        this.base_url = "https://tesla.lol/httprequesthandler.php?url=";
    }

    buildUrl(base_url, controller, action) {
        return base_url + controller + "/" + action;
    }

    async apiRequest(base_url, controller, action) {
        try {
            const response = await fetch(this.buildUrl(base_url, controller, action));
            const json = await response.json();
            return json;
        } catch (ex) {
            throw new Error(ex);
        }
    }

    async getBatteryLevel() {
        let controller = "Charge";
        let action = "getChargeStateData";

        let data = await this.apiRequest(this.base_url, controller, action);
        return data.response.battery_level;
    }


}