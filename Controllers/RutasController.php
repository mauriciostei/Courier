<?php
namespace Controllers;

use Config\BaseController;
use Views\Views;
use Models\Ruta;
use Models\Sucursal;
use Models\Usuario;
use Models\det_ruta;

class RutasController implements BaseController{

    var $rutas;

    function __construct($id){
        $this->rutas = new Ruta();
        $this->rutas->id = $id;
    }

    function index(){
        new Views('Rutas/list', array(
            'Rutas' => $this->rutas->list()
        ));
    }

    function edit(){
        new Views('Rutas/edit', array(
            'Rutas' => $this->rutas->find()
            ,'Usuarios' => new Usuario()
            ,'Sucursales' => new Sucursal()
            ,'det_rutas' => new det_ruta()
        ));
    }

    function store(){
        $this->rutas->id = $_REQUEST["id"];
        $this->rutas->Usuarios_id = $_REQUEST["Usuarios_id"];
        $this->rutas->Sucursales_id = $_REQUEST["Sucursales_id"];
        $this->rutas->Nombre = $_REQUEST["nombre"];
        $this->rutas->Horas = isset($_REQUEST["horas"]) ? $_REQUEST["horas"] : 0;
        $this->rutas->Active = $_REQUEST["active"];
        $this->rutas->save();

        $line = new det_ruta();
        foreach($_REQUEST['horasDet'] as $k => $r):
            $line->id = $_REQUEST['idDet'][$k];
            $line->Rutas_id = $this->rutas->id;
            $line->Nombre = $_REQUEST['nomDet'][$k];
            $line->Hora = $r;
            $line->save();
        endforeach;

        header("Location: {$this->rutas->id}/edit");
        die();
    }
}