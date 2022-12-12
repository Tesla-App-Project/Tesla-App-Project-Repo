<?php

// This file in the entry point of the application

require 'kernel/AutoLoad.php';
require_once __DIR__ . '/vendor/autoload.php';

/*
to use our MVC, you have to enter inside your navbar
    firstly : "index.php?url="
    secondly : "index.php?url=ControllerName/ActionName"
*/
// $S_controller = $_GET['ctrl'] ?? null;
// $S_action = isset($_GET['action']) ? $_GET['action'] : null;

$S_urlADecortiquer = $_GET['url'] ?? null;
$A_postSettings = $_POST ?? null;

// $S_url = isset($_GET['url']) ? $_GET['url'] : null;

View::ouvrirTampon(); //  /kernel/View.php : we open the display buffer, controllers called the views
$O_controller = new Controller($S_urlADecortiquer, $A_postSettings);
$O_controller->executer();

// The few sub views were put inside the display buffer, we get them
$A_content = View::recupererContenuTampon();

// We display the content in the template body
View::montrer('gabarit', array('body' => $A_content));