<?php
namespace Models;

use Config\DataBase;

class Ciudad{

    var $id;
    var $Nombre;
    var $Active;

    function __construct(){}

    function list(){
        $db = new DataBase('ciudades', __CLASS__);
        return $db->fullList();
    }

    function find(){
        $db = new DataBase('ciudades', __CLASS__);
        return $this->id>0 ? $db->getById($this->id) : $this;
    }

    function save(){
        $db = new DataBase('ciudades', __CLASS__);
        $id = $db->execSaveSQL($this);
        $this->id = $id==0 ? $this->id : $id;
    }
}