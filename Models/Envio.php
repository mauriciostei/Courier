<?php
namespace Models;

use Config\DataBase;

class Envio{

    var $id;
    var $Rutas_id;
    var $Camiones_id;
    var $SalidaEstimada;
    var $LlegadaEstimada;
    var $SalidaReal;
    var $LlegadaReal;

    function __construct(){}

    function list(){
        $db = new DataBase('envios', __CLASS__);
        return $db->fullList();
    }

    function find(){
        $db = new DataBase('envios', __CLASS__);
        return $this->id>0 ? $db->getById($this->id) : $this;
    }

    function delete(){
        $db = new DataBase('envios', __CLASS__);
        $db->delete(" id = {$this->id}");
    }

    function save(){
        $db = new DataBase('envios', __CLASS__);
        $id = $db->execSaveSQL($this);
        $this->id = $id==0 ? $this->id : $id;
    }
}