<?php
namespace Models;

use Config\DataBase;

class Timbrado{

    var $id;
    var $Sucursales_id;
    var $Timbrado;
    var $Expedicion;
    var $InicioVigencia;
    var $FinVigencia;
    var $InicialFac;
    var $FinFac;
    var $ActFac;
    var $Active;

    function __construct(){}

    function list(){
        $db = new DataBase('timbrados', __CLASS__);
        return $db->fullList();
    }

    function find(){
        $db = new DataBase('timbrados', __CLASS__);
        return $this->id>0 ? $db->getById($this->id) : $this;
    }

    function findBySucursal($sucursal){
        $db = new DataBase('timbrados', __CLASS__);
        $this->Sucursales_id = $sucursal;

        return $db->getWhere(Array(
            "Sucursales_id = '{$this->Sucursales_id}'"
            , "Active = 1"
        ));
    }

    function save(){
        $db = new DataBase('timbrados', __CLASS__);
        $id = $db->execSaveSQL($this);
        $this->id = $id==0 ? $this->id : $id;
    }
}