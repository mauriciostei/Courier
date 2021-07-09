<?php
namespace Models;

use Config\DataBase;

class Sucursal{

    var $id;
    var $Ciudades_id;
    var $Nombre;
    var $Direccion;
    var $Telefono;
    var $Latitud;
    var $Longitud;
    var $Active;

    function __construct(){}

    function list(){
        $db = new DataBase('sucursales', __CLASS__);
        return $db->fullList();
    }

    function find(){
        $db = new DataBase('sucursales', __CLASS__);
        return $this->id>0 ? $db->getById($this->id) : $this;
    }

    function save(){
        $db = new DataBase('sucursales', __CLASS__);
        $id = $db->execSaveSQL($this);
        $this->id = $id==0 ? $this->id : $id;
    }
}