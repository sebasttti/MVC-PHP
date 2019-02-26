<?php

//cargamos librerias
require_once 'config/config.php';
require_once 'helpers/urlhelper.php';

spl_autoload_register(function($className){
    require_once 'libs/'.$className.'.php';
});

 ?>
