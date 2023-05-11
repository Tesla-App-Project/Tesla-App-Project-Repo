<?php

class ControllerHome extends ControllerAPI
{
    //http://localhost:8080/index.php?url=home
    public function defautAction()
    {

        if(!isset($_SESSION['isLogged'])) {
            header("Location: /");
            exit;
        }

        if(!$_SESSION['token']){
            View::show('popup', array());
            return;
        }

        $position = json_decode($this->_httpRequestHandler->callAPI('carPosition'), true);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://nominatim.openstreetmap.org/reverse?lat=" . $position["latitude"] . "&lon=" . $position["longitude"] . "&format=json&addressdetails=1",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $headers = [0 => "Content-Type: application/json; charset=utf-8"],
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_USERAGENT => "Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0",
            CURLOPT_SSL_VERIFYPEER => 0,
        ));

        $response = "";
        if(!isset($_SESSION["position"])){
            $response = curl_exec($curl);
            curl_close($curl);
        }

        $response = json_decode($response, true) ?? json_decode('{ "place_id": 125363882, "licence": "Data © OpenStreetMap contributors, ODbL 1.0. https://osm.org/copyright", "osm_type": "way", "osm_id": 90394420, "lat": "52.54877605", "lon": "-1.8162703328316416", "display_name": "137, Pilkington Avenue, Maney, Sutton Coldfield, Wylde Green, Birmingham, West Midlands Combined Authority, England, B72 1LH, United Kingdom", "address": { "house_number": "137", "road": "Pilkington Avenue", "hamlet": "Maney", "town": "Sutton Coldfield", "village": "Wylde Green", "city": "Birmingham", "ISO3166-2-lvl8": "GB-BIR", "state_district": "West Midlands Combined Authority", "state": "England", "ISO3166-2-lvl4": "GB-ENG", "postcode": "B72 1LH", "country": "United Kingdom", "country_code": "gb" }, "boundingbox": [ "52.5487321", "52.5488299", "-1.8163514", "-1.8161885" ] }', true);
        $_SESSION["position"] = (isset($response["address"]["house_number"]) ? $response["address"]["house_number"] . " " . $response["address"]["road"] . ", " . $response["address"]["city"] : isset($response["address"]["amenity"])) ? $response["address"]["amenity"] . " " . $response["address"]["road"] . ", " . $response["address"]["town"] : $response["address"]["road"] . ", " . $response["address"]["town"];

        $A_content =
            ['title' => 'Accueil',
            'header' => 'HomeHeaderView',
            'content' => 'HomeView',
            'footer' => 'HomeFooterView',
            'carName' => $this->_httpRequestHandler->callAPI('getCarName'),
            'batteryPercent' => json_decode($this->_httpRequestHandler->callAPI('batteryLevelData'), true),
            'climPercent' => $this->_httpRequestHandler->callAPI('getTemperatureData'),
            'addressPosition' => $_SESSION["position"] ?? "Adresse inconnue",
            ];
        View::show('HomeView', $A_content);

        //View::show('template', $A_content);
        //View::show('HomeView', array());
    }


}