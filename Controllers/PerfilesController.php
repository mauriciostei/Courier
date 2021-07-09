<?php
namespace Controllers;

use Config\BaseController;
use Views\Views;
use Models\Perfil;
use Models\Rol;
use Models\Rol_x_Perfil;

class PerfilesController implements BaseController{

    var $perfiles;

    function __construct($id){
        $this->perfiles = new Perfil();
        $this->perfiles->id = $id;
    }

    function index(){
        new Views('Perfiles/list', array(
            'Perfil' => $this->perfiles->list()
        ));
    }

    function edit(){
        new Views('Perfiles/edit', array(
            'Perfil' => $this->perfiles->find()
            ,'Roles' => new Rol()
            ,'Roles_x_Perfiles' => new Rol_x_Perfil()
        ));
    }

    function store(){
        $this->perfiles->id = $_REQUEST["id"];
        $this->perfiles->Nombre = $_REQUEST["nombre"];
        $this->perfiles->Active = $_REQUEST["active"];
        $this->perfiles->save();

        $line = new Rol_x_Perfil();
        $line->truncate($this->perfiles->id);
        foreach($_REQUEST['roles'] as $r):
            $line->Perfiles_id = $this->perfiles->id;
            $line->Roles_id = $r;
            $line->save();
        endforeach;

        header("Location: {$this->perfiles->id}/edit");
        die();
    }
}