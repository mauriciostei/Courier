<?php
namespace Controllers;

use Config\BaseController;
use Views\Views;
use Models\Ciudad;

class CiudadesController implements BaseController{

    var $ciudades;

    function __construct($id){
        $this->ciudades = new Ciudad();
        $this->ciudades->id = $id;
    }

    function index(){
        new Views('Ciudades/list', array(
            'Ciudad' => $this->ciudades->list()
        ));
    }

    function edit(){
        new Views('Ciudades/edit', array(
            'Ciudad' => $this->ciudades->find()
        ));
    }

    function store(){
        $this->ciudades->id = $_REQUEST["id"];
        $this->ciudades->Nombre = $_REQUEST["nombre"];
        $this->ciudades->Active = $_REQUEST["active"];
        $this->ciudades->save();

        header("Location: {$this->ciudades->id}/edit");
        die();
    }
}