<?php
/*
THIS CODE IS FOR INCLUDE ALL NECESSARY CLASS AND FILE SO YOU DONT HAVE TO DO THIS
"
INCLUDE JOBLIST
INCLUDE CONTACT
........
INCLUDE SOMETHING
*/
//SESSION START
session_start();

require_once 'config.php';
//INCLUDE HELPERS
require_once 'helper/redirect.php';

//AUTOLOADER
spl_autoload_register(function ($class) {
    require_once 'lib/'.$class.'.php';  
});

