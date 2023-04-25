<link rel="manifest" href="/manifest.json">
<link rel="icon" href="assets/images/icon.png" type="image/png" sizes="16x16">

<?php

// This file in the entry point of the application
ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'kernel/AutoLoad.php';
require_once __DIR__ . '/vendor/autoload.php';

@session_start();

$S_urlADecortiquer = $_GET['url'] ?? "";
$A_postSettings = $_POST ?? "";

View::openBuffer(); //  /kernel/View.php : we open the display buffer, controllers called the views
$O_controller = new Controller($S_urlADecortiquer, $A_postSettings);
$O_controller->execute();

$S_View = View::getBufferContent();
echo $S_View;