<?php

// Ce fichier est le point d'entrée de votre application

require 'kernel/AutoLoad.php';
require_once __DIR__ . '/vendor/autoload.php';

/*
 url pour notre premier test MVC Hello World,
 nous n'avons pas d'action précisée on visera celle par défaut
 index.php?ctrl=helloworld
 index.php?url=CTRL/ACTION
*/
// $S_controller = $_GET['ctrl'] ?? null;
// $S_action = isset($_GET['action']) ? $_GET['action'] : null;

$S_urlADecortiquer = isset($_GET['url']) ? $_GET['url'] : null;
$A_postParams = isset($_POST) ? $_POST : null;

// $S_url = isset($_GET['url']) ? $_GET['url'] : null;

View::ouvrirTampon(); //  /kernel/View.php : on ouvre le tampon d'affichage, les contrôleurs qui appellent des vues les mettront dedans
$O_controleur = new Controleur($S_urlADecortiquer, $A_postParams);
$O_controleur->executer();

// Les différentes sous-vues ont été "crachées" dans le tampon d'affichage, on les récupère
$A_contenuPourAffichage = View::recupererContenuTampon();

// On affiche le contenu dans la partie body du gabarit général
View::show('gabarit', array('body' => $A_contenuPourAffichage));
