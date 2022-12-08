<?php

class APIModel
{
    private $token;
    private $baseURL = 'http:/78.123.242.51:25000/api/1/vehicles';

    private function setToken() {

        // TODO : Requête BDD pour récupérer le token crypté
        // Puis le décrpyter

        $this->token = "letokendelatesla";
    }

    private function makeAPIRequest($idVoiture, $url, $requestType) {

        // On charge le token
        $this->setToken();

        // TODO : alexlebg doit etre remplacé par l'id de la voiture
        // Plusieurs voitures pour une seule personne

        $idVoiture === null ? $urlRequest = "{$this->baseURL}/" : $urlRequest = "{$this->baseURL}/{$idVoiture}/{$url}";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $urlRequest);

        /* Header avec le token */

        $headers = [];
        $headers[] = 'Content-Type:application/json';
        $headers[] = "Authorization: Bearer " . $this->token;

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $requestType);

        try {
            $result = curl_exec($ch);
        } catch (Exception $e) {
            var_dump($e->getCode() . " " . $e->getMessage());
        } finally {
            curl_close($ch);
            return json_decode($result) ?? "Erreur";
        }
    }


    public function getAllVehicles() {
        $this->makeAPIRequest(null, "", "GET");
    }

    public function getVehiculeData() {
        $this->makeAPIRequest("alexlebg", "", "GET");
    }

    public function startCar() {
        $this->makeAPIRequest("alexlebg", "wake_up" , "POST");
    }


}