<?php

final class Controller
{
    private $_A_dissectUrl;

    private $_A_urlSettings;

    private $_A_postSettings;

    public function __construct($S_url, $A_postParams)
    {
        if ('/' == substr($S_url, -1, 1)) {
            $S_url = substr($S_url, 0, strlen($S_url) - 1);
        }
        $A_urlDecortique = explode('/', $S_url);
        //  Controller / Action

        if (!empty($A_urlDecortique[0])) {
            $S_controller = $A_urlDecortique[0];
            if (!empty($A_urlDecortique[1])) {
                $S_action = $A_urlDecortique[1];
            } else {
                $S_action = null;
            }
        } else {
            $S_controller = null;
        }

        if (empty($S_controller)) {
            // Nous avons pris le parti de préfixer tous les controleurs par "Controleur"
            $this->_A_dissectUrl['controller'] = 'ControllerHelloworld';
        } else {
            $this->_A_dissectUrl['controller'] = 'Controller' . ucfirst($S_controller);
        }

        if (empty($S_action)) {
            // L'action est vide ! On la valorise par défaut
            $this->_A_dissectUrl['action'] = 'defautAction';
        } else {
            // On part du principe que toutes nos actions sont suffixées par 'Action'...à nous de le rajouter
            $this->_A_dissectUrl['action']  = $S_action . 'Action';
        }
        // var_dump($this->_A_dissectUrl['action']);


        // on dépile 2 fois de suite depuis le début, c'est à dire qu'on enlève de notre tableau le contrôleur et l'action
        // il ne reste donc que les éventuels parametres (si nous en avons)...

        // var_dump($this->_A_dissectUrl['action']);

        // ...on stocke ces éventuels parametres dans la variable d'instance qui leur est réservée
        $this->_A_urlSettings = $A_urlDecortique;

        // On  s'occupe du tableau $A_postParams
        $this->_A_postSettings = $A_postParams;
    }

    // // On exécute
    // public function executer()
    // {
    //     //fonction de rappel de notre controleur cible (ControllerHelloworld pour notre premier exemple)
    //     call_user_func_array(array(new $this->_A_dissectUrl['controleur'](),
    //         $this->_A_dissectUrl['action']), array());
    // }

        // On exécute notre triplet


    public function execute()
    {
        // try {
        if (!class_exists($this->_A_dissectUrl['controller'])) {
            throw new ControllerException($this->_A_dissectUrl['controller'] . " n'est pas un controleur valide.");
        }
        // var_dump($this->_A_dissectUrl['action']);
        if (!method_exists($this->_A_dissectUrl['controller'], $this->_A_dissectUrl['action'])) {
            throw new ControllerException($this->_A_dissectUrl['action'] . " du contrôleur " .
                $this->_A_dissectUrl['controller'] . " n'est pas une action valide.");
        }

        $B_called = call_user_func_array(array(new $this->_A_dissectUrl['controller'](),
            $this->_A_dissectUrl['action']), array($this->_A_urlSettings, $this->_A_postSettings ));

        if (false === $B_called) {
            throw new ControllerException("L'action " . $this->_A_dissectUrl['action'] .
                " du contrôleur " . $this->_A_dissectUrl['controller'] . " a rencontré une erreur.");
        }
        // }
        // catch(Exception $e) {
        //     var_dump($this->_A_dissectUrl);
        // }
    }
}
