<?php
namespace Models;

use Config\DataBase;

class Cliente{

    var $id;
    var $documento;
    var $DV;
    var $Nombres;
    var $Apellidos;
    var $Correo;
    var $Telefono;
    var $fechaNacimiento;
    var $Active;

    function __construct(){}

    function list(){
        $db = new DataBase('clientes', __CLASS__);
        return $db->fullList();
    }

    function find(){
        $db = new DataBase('clientes', __CLASS__);
        return $this->id>0 ? $db->getById($this->id) : $this;
    }

    function save(){
        $db = new DataBase('clientes', __CLASS__);
        $id = $db->execSaveSQL($this);
        $this->id = $id==0 ? $this->id : $id;
    }
}