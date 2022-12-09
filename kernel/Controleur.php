<?php

final class Controleur
{
    private $_A_urlDecortique;

    public function __construct($S_url, $A_postParams)
    {
        if ('/' == substr($S_url, -1, 1)) {
            $S_url = substr($S_url, 0, strlen($S_url) - 1);
        }
        $A_urlDecortique = explode('/', $S_url);
        //  Controleur / Action

        if (!empty($A_urlDecortique[0])) {
            $S_controleur = $A_urlDecortique[0];
            if (!empty($A_urlDecortique[1])) {
                $S_action = $A_urlDecortique[1];
            } else {
                $S_action = null;
            }
        } else {
            $S_controleur = null;
        }


        if (empty($S_controleur)) {
            // Nous avons pris le parti de préfixer tous les controleurs par "Controleur"
            $this->_A_urlDecortique['controleur'] = 'ControleurHelloworld';
        } else {
            $this->_A_urlDecortique['controleur'] = 'Controleur' . ucfirst($S_controleur);
        }

        if (empty($S_action)) {
            // L'action est vide ! On la valorise par défaut
            $this->_A_urlDecortique['action'] = 'defautAction';
        } else {
            // On part du principe que toutes nos actions sont suffixées par 'Action'...à nous de le rajouter
            $this->_A_urlDecortique['action']  = $S_action . 'Action';
        }
        var_dump($A_urlDecortique);
    }

    // On exécute
    public function executer()
    {
        //fonction de rappel de notre controleur cible (ControleurHelloworld pour notre premier exemple)
        call_user_func_array(array(new $this->_A_urlDecortique['controleur'](),
            $this->_A_urlDecortique['action']), array());
    }
}
