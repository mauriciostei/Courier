<?php
namespace Controllers;

use Config\BaseController;
use Views\Views;
use Models\Cliente;

class ClientesController implements BaseController{

    var $cliente;

    function __construct($id){
        $this->cliente = new Cliente();
        $this->cliente->id = $id;
    }

    function index(){}

    function edit(){
        new Views('Clientes/edit', array());
    }

    function store(){
        $this->cliente->id = 0;
        $this->cliente->Nombres = $_REQUEST["nombres"];
        $this->cliente->Apellidos = $_REQUEST["apellidos"];
        $this->cliente->Correo = $_REQUEST["correo"];
        $this->cliente->documento = $_REQUEST["documento"];
        $this->cliente->DV = $_REQUEST["DV"];
        $this->cliente->Telefono = $_REQUEST["telefono"];
        $this->cliente->fechaNacimiento = $_REQUEST["fechaNacimiento"];
        $this->cliente->Active = 1;
        $this->cliente->save();

        header("Location: 0/edit");
        die();
    }
}