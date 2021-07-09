<?php
namespace Controllers;

use Config\BaseController;
use Views\Views;
use Models\Sucursal;
use Models\Ciudad;

class SucursalesController implements BaseController{

    var $sucursales;

    function __construct($id){
        $this->sucursales = new Sucursal();
        $this->sucursales->id = $id;
    }

    function index(){
        new Views('Sucursales/list', array(
            'Sucursal' => $this->sucursales->list()
        ));
    }

    function edit(){
        new Views('Sucursales/edit', array(
            'Sucursal' => $this->sucursales->find()
            ,'Ciudades' => new Ciudad()
        ));
    }

    function store(){
        $this->sucursales->id = $_REQUEST["id"];
        $this->sucursales->Ciudades_id = $_REQUEST["Ciudades_id"];
        $this->sucursales->Nombre = $_REQUEST["nombre"];
        $this->sucursales->Direccion = $_REQUEST["direccion"];
        $this->sucursales->Telefono = $_REQUEST["telefono"];
        $this->sucursales->Latitud = $_REQUEST["latitud"]!="" ? $_REQUEST['latitud'] : 1;
        $this->sucursales->Longitud = $_REQUEST["longitud"]!="" ? $_REQUEST['longitud'] : 1;
        $this->sucursales->Active = $_REQUEST["active"];
        $this->sucursales->save();

        header("Location: {$this->sucursales->id}/edit");
        die();
    }
}