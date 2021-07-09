<?php
namespace Controllers;

use Config\BaseController;
use Views\Views;
use Models\Envio;
use Models\Camion;
use Models\Ruta;
use Models\Det_Envio;
use Models\Det_Pedido;
use Models\Existencia;
use Models\det_ruta;

class EnviosController implements BaseController{

    var $envios;

    function __construct($id){
        $this->envios = new Envio();
        $this->envios->id = $id;
    }

    function index(){
        new Views('Envios/list', array(
            'Envio' => $this->envios->list()
            ,'Camiones' => new Camion()
            ,'Rutas' => new Ruta()
        ));
    }

    function edit(){
        new Views('Envios/edit', array(
            'Envio' => $this->envios->find()
            ,'Camion' => new Camion()
            ,'Ruta' => new Ruta()
            ,'det_pedido' => new Det_Pedido()
            ,'Existencias' => new Existencia()
        ));
    }

    function store(){
        $salida = date('Y-m-d H:i:s', strtotime($_REQUEST["SalidaEstimada"]));
        $llegada = date('Y-m-d H:i:s', strtotime($_REQUEST["LlegadaEstimada"]));

        $this->envios->id = $_REQUEST["id"];
        $this->envios->Rutas_id = $_REQUEST["Rutas_id"];
        $this->envios->Camiones_id = $_REQUEST["Camiones_id"];
        $this->envios->SalidaEstimada = $salida;
        $this->envios->LlegadaEstimada = $llegada;
        $this->envios->SalidaReal = $salida;
        $this->envios->LlegadaReal = $llegada;
        $this->envios->Estado = 1;
        $this->envios->save();

        foreach($_REQUEST['det_pedido'] as $k => $r):
            $det_ped = new Det_Pedido();
            $det_ped = $det_ped->findById($r);
            $det_ped->Estado = 2;
            $det_ped->save();

            $exi = new Existencia();
            $exi = $exi->findByPedido($r)[0];
            $exi->Envios_id = $this->envios->id;
            $exi->save();
        endforeach;

        $orden = 1;
        $det_ruta = new det_ruta;
        foreach($det_ruta->find($this->envios->Rutas_id) as $r):
            $der = new Det_Envio();
            $der->id = 0;
            $der->Envios_id = $this->envios->id;
            $der->Nombre = $r->Nombre;
            $der->Hora = $r->Hora;
            $der->Alcanzado = 0;
            $der->Orden = $orden;
            $der->save();
            $orden++;
        endforeach;

        header("Location: ../Inicio");
        die();
    }

    function delete(){        
        $dEnv = new Det_Envio();
        $dEnv->truncate($this->envios->id);

        $ex = new Existencia();
        foreach($ex->findByEnvio($this->envios->id) as $r):
            $det_ped = new Det_Pedido();
            $det_ped = $det_ped->findById($r->det_pedido_id);
            $det_ped->Estado = 1;
            $det_ped->save();

            $r->delete($r->det_pedido_id, $r->Sucursales_id);

            $r->Envios_id = null;
            $r->save();
        endforeach;

        $this->envios->delete();

        header("Location: ../../Inicio");
    }
}