<?php
namespace Controllers;

use Config\BaseController;
use Views\Views;
use Models\Camion;
use Models\Sucursal;

class CamionesController implements BaseController{

    var $camiones;

    function __construct($id){
        $this->camiones = new Camion();
        $this->camiones->id = $id;
    }

    function index(){
        new Views('Camiones/list', array(
            'Camion' => $this->camiones->list()
        ));
    }

    function edit(){
        new Views('Camiones/edit', array(
            'Camion' => $this->camiones->find()
            ,'Sucursales' => new Sucursal()
        ));
    }

    function store(){
        $this->camiones->id = $_REQUEST["id"];
        $this->camiones->Sucursales_id = $_REQUEST["Sucursales_id"];
        $this->camiones->Nombre = $_REQUEST["nombre"];
        $this->camiones->Marca = $_REQUEST["marca"];
        $this->camiones->Modelo = $_REQUEST["modelo"];
        $this->camiones->Chapa = $_REQUEST["chapa"];
        $this->camiones->Active = $_REQUEST["active"];
        $this->camiones->save();

        header("Location: {$this->camiones->id}/edit");
        die();
    }
}