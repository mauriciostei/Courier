<?php
namespace Models;

use Config\DataBase;

class Rol{

    var $id;
    var $Nombre;
    var $URL;

    function __construct(){}

    function list(){
        $db = new DataBase('Roles', __CLASS__);
        return $db->fullList();
    }

    function find(){
        $db = new DataBase('Roles', __CLASS__);
        return $this->id>0 ? $db->getById($this->id) : $this;
    }
}