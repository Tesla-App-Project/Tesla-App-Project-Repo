<?php

// Ce fichier est le point d'entrée de votre application
require_once 'model/ApiModel.php';
require 'kernel/AutoLoad.php';
/*
 url pour notre premier test MVC Hello World,
 nous n'avons pas d'action précisée on visera celle par défaut
 index.php?ctrl=helloworld
 index.php?url=CTRL/ACTION
*/
$S_controleur = $_GET['ctrl'] ?? null;
$S_action = $_GET['action'] ?? null;

View::ouvrirTampon(); //  /kernel/View.php : on ouvre le tampon d'affichage, les contrôleurs qui appellent des vues les mettront dedans
$O_controleur = new Controller($S_controleur, $S_action);
$O_controleur->executer();

// Les différentes sous-vues ont été "crachées" dans le tampon d'affichage, on les récupère
$contenuPourAffichage = View::recupererContenuTampon();

// On affiche le contenu dans la partie body du gabarit général
View::montrer('gabarit', array('body' => $contenuPourAffichage));
