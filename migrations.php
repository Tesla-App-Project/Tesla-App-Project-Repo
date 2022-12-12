<?php

require_once __DIR__ . '/vendor/autoload.php';
$filepath = realpath(dirname(__FILE__));
require_once($filepath."/kernel/DbMigration.php");

//dirname, Renvoie le chemin d'un répertoire parent, on envoit ca à notre application
$db = new DbMigration();
$db->applyMigrations();
