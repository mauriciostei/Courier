<?php
namespace Controllers;

use Config\BaseController;
use Views\Views;
use Models\Timbrado;
use Models\Sucursal;

class TimbradosController implements BaseController{

    var $timbrados;

    function __construct($id){
        $this->timbrados = new Timbrado();
        $this->timbrados->id = $id;
    }

    function index(){
        new Views('Timbrados/list', array(
            'Timbrado' => $this->timbrados->list()
        ));
    }

    function edit(){
        new Views('Timbrados/edit', array(
            'Timbrado' => $this->timbrados->find()
            ,'Sucursales' => new Sucursal()
        ));
    }

    function store(){
        $this->timbrados->id = $_REQUEST["id"];
        $this->timbrados->Sucursales_id = $_REQUEST["Sucursales_id"];
        $this->timbrados->Timbrado = $_REQUEST["timbrado"];
        $this->timbrados->Expedicion = $_REQUEST["expedicion"];
        $this->timbrados->InicioVigencia = $_REQUEST["IniVigencia"];
        $this->timbrados->FinVigencia = $_REQUEST["FinVigencia"];
        $this->timbrados->InicialFac = $_REQUEST["IniFac"];
        $this->timbrados->FinFac = $_REQUEST["FinFac"];
        $this->timbrados->ActFac = $_REQUEST["ActFac"];
        $this->timbrados->Active = $_REQUEST["active"];
        $this->timbrados->save();

        header("Location: {$this->timbrados->id}/edit");
        die();
    }
}