<?php
namespace Models;

use Config\DataBase;

class Usuario{

    var $id;
    var $Sucursales_id;
    var $Nombre;
    var $Apellido;
    var $User;
    var $Password;
    var $Active;

    function __construct(){}

    function list(){
        $db = new DataBase('usuarios', __CLASS__);
        return $db->fullList();
    }

    function listRoles(){
        $db = new DataBase('usuarios', __CLASS__);
        return $db->getUserRoles($this->id);
    }

    function find(){
        $db = new DataBase('usuarios', __CLASS__);
        return $this->id>0 ? $db->getById($this->id) : $this;
    }

    function validateUser(){
        $db = new DataBase('usuarios', __CLASS__);
        return $db->getWhere(Array(
            "User = '{$this->User}'"
            //,"Password = '{$this->Password}'"
            //,"Active = 1"
        ));
    }

    function save(){
        $db = new DataBase('usuarios', __CLASS__);
        $id = $db->execSaveSQL($this);
        $this->id = $id==0 ? $this->id : $id;
    }
}