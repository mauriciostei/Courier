<?php
namespace Models;

use Config\DataBase;

class det_pedido{

    var $id;
    var $Pedidos_id;
    var $Clientes_id;
    var $Sucursales_id;
    var $Peso;
    var $Alto;
    var $Ancho;
    var $Profundidad;
    var $TipoProducto;
    var $Estado;
    var $Observacion;
    var $Monto;

    function __construct(){}

    function listPending(){
        $db = new DataBase('det_pedido', __CLASS__);

        return $db->getWhere(Array(
            "id NOT IN (SELECT det_pedido_id FROM existencias WHERE envios_id IS NOT null)"
        ));
    }

    function list(){
        $db = new DataBase('det_pedido', __CLASS__);
        return $db->fullList();
    }

    function find($pedido){
        $db = new DataBase('det_pedido', __CLASS__);
        $this->Pedidos_id = $pedido;

        return $db->getWhere(Array(
            "Pedidos_id = '{$this->Pedidos_id}'"
        ));
    }

    function findById($id){
        $db = new DataBase('det_pedido', __CLASS__);
        return $db->getById($id);
    }

    function findBySucursal($sucursal){
        $db = new DataBase('det_pedido', __CLASS__);
        $this->Sucursales_id = $sucursal;

        return $db->getWhere(Array(
            "Sucursales_id = '{$this->Sucursales_id}'"
        ));
    }

    function save(){
        $db = new DataBase('det_pedido', __CLASS__);
        $id = $db->execSaveSQL($this);
        $this->id = $id==0 ? $this->id : $id;
    }

    function getType(){
        switch($this->TipoProducto){
            case 1: return 'Cuidado Personal'; break;
            case 2: return 'Joyas y accesorios'; break;
            case 3: return 'Juguetes y Juegos'; break;
            case 4: return 'Artesanía'; break;
            case 5: return 'Plantas'; break;
            case 6: return 'Informática'; break;
            case 7: return 'Proyector y Pantallas'; break;
            case 8: return 'Mobiliarios'; break;
            case 9: return 'Cocina y Comedor'; break;
            case 10: return 'Pequeños Electrodomésticos'; break;
            case 11: return 'Equipos de Audio'; break;
            case 12: return 'bazar'; break;
            case 13: return 'Tecnología'; break;
            case 14: return 'Cocina'; break;
            case 15: return 'Jardín'; break;
            case 16: return 'Somieres'; break;
            case 17: return 'Línea de Bebés'; break;
            case 18: return 'Deporte y Fitness'; break;
            case 19: return 'Lavado - Cuidado de Prendas'; break;
            case 20: return 'Hogar y Limpieza'; break;
            case 21: return 'Heladeras y Freezers'; break;
            case 22: return 'Refrigeración'; break;
            case 23: return 'Herramientas manuales o electrónicas '; break;
            case 24: return 'Medicina.'; break;
        }
    }
}