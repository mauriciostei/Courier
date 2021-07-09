<?php
namespace Controllers;

use Config\BaseController;
use Views\Views;

use Models\Envio;
use Models\Camion;
use Models\Ruta;

class InicioController implements BaseController{

    function __construct($id){}

    function index(){
        new Views('Inicio/Dashboard', array(
            'Envios' => new Envio()
            ,'Ruta' => new Ruta()
            ,'Camion' => new Camion()
        ));
    }

    function Publico(){
        new Views('Inicio/Publico', Array() );
    }

    function edit(){}

    function store(){}
}