<?php
namespace Models;

use Config\DataBase;

class Camion{

    var $id;
    var $Sucursales_id;
    var $Nombre;
    var $Marca;
    var $Modelo;
    var $Chapa;
    var $Active;

    function __construct(){}

    function list(){
        $db = new DataBase('camiones', __CLASS__);
        return $db->fullList();
    }

    function find(){
        $db = new DataBase('camiones', __CLASS__);
        return $this->id>0 ? $db->getById($this->id) : $this;
    }

    function findBySucursal($sucursal){
        $db = new DataBase('camiones', __CLASS__);
        $this->Sucursales_id = $sucursal;

        return $db->getWhere(Array(
            "Sucursales_id = '{$this->Sucursales_id}'"
            , "Active = 1"
        ));
    }

    function save(){
        $db = new DataBase('camiones', __CLASS__);
        $id = $db->execSaveSQL($this);
        $this->id = $id==0 ? $this->id : $id;
    }
}