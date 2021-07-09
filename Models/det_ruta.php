<?php
namespace Models;

use Config\DataBase;

class det_ruta{

    var $id;
    var $Rutas_id;
    var $Nombre;
    var $Hora;

    function __construct(){}

    function find($ruta){
        $db = new DataBase('det_rutas', __CLASS__);
        $this->Rutas_id = $ruta;

        return $db->getWhere(Array(
            "Rutas_id = '{$this->Rutas_id}'"
        ));
    }

    function save(){
        $db = new DataBase('det_rutas', __CLASS__);
        $id = $db->execSaveSQL($this);
        $this->id = $id==0 ? $this->id : $id;
    }
}