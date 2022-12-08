<?php


require_once ("APIModel.php");

$apiTest = new APIModel();
$apiTest->postSunRoofControl("move", 20);
$apiTest->postSunRoofControl(20);
$apiTest->postSunRoofControl("open");
