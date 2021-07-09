<?php

session_start();
//echo md5(12345);

$controller = $_GET['controller'];
$action = isset($_GET['action']) ? $_GET['action'] :'index';
$id = isset($_GET['id']) ? $_GET['id'] : 0;

spl_autoload_register(function($clase){
    $ruta = str_replace('\\','/',$clase).'.php';
    if(is_readable($ruta)){
        require_once $ruta;
    }
    //print $ruta.'<br>';
});

//echo json_encode(unserialize($_SESSION["user_id"]));

$control = 'Controllers\\'.$controller.'Controller';
$control = new $control($id);
call_user_func(array($control, $action));