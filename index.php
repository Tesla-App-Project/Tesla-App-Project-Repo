<?php

// Ce fichier est le point d'entrée de votre application

require 'kernel/ChargementAuto.php';
/*
 url pour notre premier test MVC Hello World,
 nous n'avons pas d'action précisée on visera celle par défaut
 index.php?ctrl=helloworld
 index.php?url=CTRL/ACTION
*/
$S_controleur = $_GET['ctrl'] ?? null;
$S_action = isset($_GET['action']) ? $_GET['action'] : null;

Vue::ouvrirTampon(); //  /kernel/Vue.php : on ouvre le tampon d'affichage, les contrôleurs qui appellent des vues les mettront dedans
$O_controleur = new Controleur($S_controleur, $S_action);
$O_controleur->executer();

// Les différentes sous-vues ont été "crachées" dans le tampon d'affichage, on les récupère
$A_contenuPourAffichage = Vue::recupererContenuTampon();

// On affiche le contenu dans la partie body du gabarit général
Vue::montrer('gabarit', array('body' => $A_contenuPourAffichage));
