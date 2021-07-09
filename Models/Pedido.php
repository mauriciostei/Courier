<?php
namespace Models;

use Config\DataBase;

class Pedido{

    var $id;
    var $Clientes_id;
    var $Timbrados_id;
    var $Fecha;
    var $NumFac;
    var $Estado;
    var $Observacion;

    function __construct(){}

    function list(){
        $db = new DataBase('pedidos', __CLASS__);
        return $db->fullList();
    }

    function find(){
        $db = new DataBase('pedidos', __CLASS__);
        return $this->id>0 ? $db->getById($this->id) : $this;
    }

    function save(){
        $db = new DataBase('pedidos', __CLASS__);
        $id = $db->execSaveSQL($this);
        $this->id = $id==0 ? $this->id : $id;
    }
}