<?php
namespace Models;

use Config\DataBase;

class Existencia{

    var $det_pedido_id;
    var $Sucursales_id;
    var $Envios_id;

    function __construct(){}

    function findByPedido($det){
        $db = new DataBase('existencias', __CLASS__);
        $this->det_pedido_id = $det;

        return $db->getWhere(Array(
            "det_pedido_id = '{$this->det_pedido_id}'"
        ));
    }

    function findBySucursal($sucursal){
        $db = new DataBase('existencias', __CLASS__);
        $this->Sucursales_id = $sucursal;

        return $db->getWhere(Array(
            "Sucursales_id = '{$this->Sucursales_id}'"
        ));
    }

    function findByEnvio($envio){
        $db = new DataBase('existencias', __CLASS__);
        $this->Envios_id = $envio;

        return $db->getWhere(Array(
            "Envios_id = '{$this->Envios_id}'"
        ));
    }

    function delete($det_pedido_id, $sucursal){
        $db = new DataBase('existencias', __CLASS__);
        $db->delete(" Det_Pedido_id = {$det_pedido_id} and Sucursales_id = {$sucursal}");
    }

    function save(){
        $db = new DataBase('existencias', __CLASS__);
        $id = $db->execSaveSQL($this);
        $this->id = $id==0 ? $this->id : $id;
    }
}