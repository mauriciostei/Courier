<?php
namespace Controllers;

use Config\BaseController;
use Views\Views;
use Models\Pedido;
use Models\Timbrado;
use Models\Cliente;
use Models\det_pedido;
use Models\Sucursal;
use Models\Existencia;

class PedidosController implements BaseController{

    var $pedidos;

    function __construct($id){
        $this->pedidos = new Pedido();
        $this->pedidos->id = $id;
    }

    function index(){
        new Views('Pedidos/list', array(
            'Pedido' => $this->pedidos->list()
        ));
    }

    function edit(){
        new Views('Pedidos/edit', array(
            'Pedido' => $this->pedidos->find()
            ,'Timbrado' => new Timbrado()
            ,'Cliente' => new Cliente()
            ,'det_pedido' => new det_pedido()
            ,'Sucursal' => new Sucursal()
        ));
    }

    function takeOut(){
        new Views('Pedidos/takeOut', array(
            'Pedido' => $this->pedidos->find()
            ,'Timbrado' => new Timbrado()
            ,'Cliente' => new Cliente()
            ,'det_pedido' => new det_pedido()
            ,'Sucursal' => new Sucursal()
        ));
    }

    function take(){
        foreach($_REQUEST['det_pedido'] as $r):
            $det_ped = new Det_Pedido();
            $det_ped = $det_ped->findById($r);
            $det_ped->Estado = 4;
            $det_ped->save();
        endforeach;

        header("Location: ../Inicio");
        die();
    }

    function print(){
        $this->pedidos = $this->pedidos->find();

        $det = new det_pedido();
        $det = $det->find($this->pedidos->id);

        $tim = new Timbrado();
        $tim->id = $this->pedidos->Timbrados_id;
        $tim = $tim->find();

        new Views('Pedidos/print', array(
            'Pedido' => $this->pedidos
            ,'Det_pedido' => $det
            ,'Timbrado' => $tim
            ,'Cliente' => new Cliente()
            ,'Sucursal' => new Sucursal()
        ));
    }

    function store(){
        $t = new Timbrado();
        $t->id = $_REQUEST["Timbrados_id"];
        $tt = $t->find();

        $this->pedidos->id = 0;
        $this->pedidos->Clientes_id = $_REQUEST["Clientes_id"];
        $this->pedidos->Timbrados_id = $_REQUEST["Timbrados_id"];
        $this->pedidos->Fecha = date("Y-m-d");
        $this->pedidos->NumFac = $tt->ActFac;
        $this->pedidos->Estado = 1;
        $this->pedidos->Observacion = $_REQUEST["Observacion"];
        $this->pedidos->save();

        foreach($_REQUEST['sucursalesDet'] as $k => $r):
            $line = new det_pedido();
            $line->id = 0;
            $line->Sucursales_id = $r;
            $line->Clientes_id = $_REQUEST['clientesDet'][$k];
            $line->Pedidos_id = $this->pedidos->id;
            $line->Peso = $_REQUEST['pesoDet'][$k];
            $line->Alto = $_REQUEST['altoDet'][$k];
            $line->Ancho = $_REQUEST['anchoDet'][$k];
            $line->Profundidad = $_REQUEST['profundidadDet'][$k];
            $line->TipoProducto = $_REQUEST['tProductoDet'][$k];
            $line->Estado = 1;
            $line->Observacion = $_REQUEST['obsDet'][$k];
            $line->Monto = $_REQUEST['montoDet'][$k];
            $line->save();

            $ex = new Existencia();
            $ex->det_pedido_id = $line->id;
            $ex->Sucursales_id = unserialize($_SESSION["user_id"])->Sucursales_id;
            $ex->save();
        endforeach;

        $tt->ActFac++;
        $tt->save();

        header("Location: {$this->pedidos->id}/print");
        //header("Location: ../Inicio");
        die();
    }

    function Reporte(){
        @new Views('Pedidos/Reporte', array(
            'Pedido' => $this->pedidos->report($_REQUEST["fechaIni"], $_REQUEST["fechaFin"])
            ,'Timbrado' => new Timbrado()
            ,'Cliente' => new Cliente()
            ,'det_pedido' => new det_pedido()
            ,'data' => array(
                'fechaIni' => $_REQUEST["fechaIni"]
                ,'fechaFin' => $_REQUEST["fechaFin"]
            )
        ));
    }
}