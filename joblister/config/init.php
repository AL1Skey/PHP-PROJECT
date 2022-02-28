<?php
/*
THIS CODE IS FOR INCLUDE ALL NECESSARY CLASS AND FILE SO YOU DONT HAVE TO DO THIS
"
INCLUDE JOBLIST
INCLUDE CONTACT
........
INCLUDE SOMETHING
*/

require_once 'config.php';

//AUTOLOADER
spl_autoload_register(function ($class) {
    require_once 'lib/'.$class.'.php';  
});

