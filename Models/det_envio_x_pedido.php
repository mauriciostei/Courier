<?php
namespace Models;

use Config\DataBase;

class Det_Envio_x_Pedido extends DataBase{

    var $Envios_id;
    var $det_pedido_id;

    function __construct(){
        parent::__construct('det_envio_x_pedidos', __CLASS__);
    }

    function find($envio){
        $this->Envios_id = $envio;

        return parent::getWhere(Array(
            "Envios_id = '{$this->Envios_id}'"
        ));
    }

    function save(){
        $columns = "Envios_id, det_pedido_id";
        $inserted = "{$this->Envios_id}, {$this->det_pedido_id}";
        $updated = "Envios_id={$this->Envios_id}, det_pedido_id={$this->det_pedido_id}";
        parent::execSaveSQL($columns, $inserted, $updated);
    }
}