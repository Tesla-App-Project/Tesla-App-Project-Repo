<?php

$filepath = realpath(dirname(__FILE__));
require_once($filepath."/../kernel/Database.php");

final class Simone
{
    public function giveMessage()
    {
        //Default
        print_r('Default');
    }
}
