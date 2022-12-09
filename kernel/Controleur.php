<?php

final class Controleur
{
    private $A_urlDecortique;

    public function __construct($S_controleur, $S_action)
    {
        if (empty($S_controleur)) {
            // Nous avons pris le parti de préfixer tous les controleurs par "Controleur"
            $this->A_urlDecortique['controleur'] = 'ControleurHelloworld';
        } else {
            $this->A_urlDecortique['controleur'] = 'Controleur' . ucfirst($S_controleur);
        }

        if (empty($S_action)) {
            // L'action est vide ! On la valorise par défaut
            $this->A_urlDecortique['action'] = 'defautAction';
        } else {
            // On part du principe que toutes nos actions sont suffixées par 'Action'...à nous de le rajouter
            $this->A_urlDecortique['action']  = $S_action . 'Action';
        }
        var_dump($this->A_urlDecortique);
    }

    // On exécute
    public function executer()
    {
        //fonction de rappel de notre controleur cible (ControleurHelloworld pour notre premier exemple)
        call_user_func_array(array(new $this->A_urlDecortique['controleur'](),
            $this->A_urlDecortique['action']), array());
    }
}
