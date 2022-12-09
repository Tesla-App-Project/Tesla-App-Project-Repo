<?php


require_once ("APIModel.php");

$apiTest = new APIModel();
$apiTest->postSunRoofControl("move", 20);

