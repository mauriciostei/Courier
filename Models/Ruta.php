<?php
namespace Models;

use Config\DataBase;

class Ruta{

    var $id;
    var $Usuarios_id;
    var $Sucursales_id;
    var $Nombre;
    var $Horas;
    var $Active;

    function __construct(){}

    function list(){
        $db = new DataBase('rutas', __CLASS__);
        return $db->fullList();
    }

    function find(){
        $db = new DataBase('rutas', __CLASS__);
        return $this->id>0 ? $db->getById($this->id) : $this;
    }

    function save(){
        $db = new DataBase('rutas', __CLASS__);
        $id = $db->execSaveSQL($this);
        $this->id = $id==0 ? $this->id : $id;
    }
}