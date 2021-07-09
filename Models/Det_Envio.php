<?php
namespace Models;

use Config\DataBase;

class Det_Envio{

    var $id;
    var $Envios_id;
    var $Nombre;
    var $Hora;
    var $Alcanzado;
    var $HoraMarcado;
    var $Orden;

    function __construct(){}

    function find($envio){
        $db = new DataBase('det_envio', __CLASS__);
        $this->Envios_id = $envio;

        return $db->getWhere(Array(
            "Envios_id = '{$this->Envios_id}'"
        ));
    }

    function findById(){
        $db = new DataBase('det_envio', __CLASS__);
        return $this->id>0 ? $db->getById($this->id) : $this;
    }

    function truncate($envio){
        $db = new DataBase('det_envio', __CLASS__);
        $this->Envios_id = $envio;
        $db->delete(" Envios_id = {$this->Envios_id}");
    }

    function save(){
        $db = new DataBase('det_envio', __CLASS__);
        $id = $db->execSaveSQL($this);
        $this->id = $id==0 ? $this->id : $id;
    }
}