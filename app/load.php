<?php

    //load config
    require_once "config/config.php";
//load libraries
     require_once "lib/Database.php";
    require_once "lib/Controller.php";
    require_once "lib/Core.php";

// Autoload Core Libraries
   
    spl_autoload_register(function($className){
        require_once "models/" . $className . ".php";
    });




$init = new Core;
    
?> 