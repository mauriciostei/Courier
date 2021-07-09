<?php
namespace Models;

use Config\DataBase;

class Det_Envio_x_Ruta extends DataBase{

    var $Envios_id;
    var $det_rutas_id;
    var $Estado;

    function __construct(){
        parent::__construct('det_envio_x_rutas', __CLASS__);
    }

    function find($envio){
        $this->Envios_id = $envio;

        return parent::getWhere(Array(
            "Envios_id = '{$this->Envios_id}'"
        ));
    }

    function save(){
        $columns = "Envios_id, det_rutas_id, Estado";
        $inserted = "{$this->Envios_id}, {$this->det_rutas_id}, {$this->Estado}";
        $updated = "Envios_id={$this->Envios_id}, det_rutas_id={$this->det_rutas_id}, Estado={$this->Estado}";
        parent::execSaveSQL($columns, $inserted, $updated);
    }
}