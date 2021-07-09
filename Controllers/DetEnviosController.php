<?php
namespace Controllers;

use Config\BaseController;
use Views\Views;
use Models\Det_Envio;
use Models\Envio;
use Models\Existencia;
use Models\det_pedido;
use Models\Ruta;
use Models\Camion;

class DetEnviosController implements BaseController{

    var $det_envios;

    function __construct($id){
        $this->det_envios = new Det_Envio();
        $this->det_envios->Envios_id = $id;
    }

    function index(){}

    function edit(){
        $env = new Envio();
        $env->id = $this->det_envios->Envios_id;
        $env = $env->find();

        if($env->Estado==1){
            $env->Estado = 2;
            $env->SalidaReal = date('Y-m-d H:i:s');
            $env->save();
        }
        
        new Views('Det_Envios/edit', array(
            'Det_Envios' => $this->det_envios->find($env->id)
            ,'Envio' => $env->id
        ));
    }

    function store(){
        if(isset($_REQUEST["id"])){    
            $this->det_envios->id = $_REQUEST["id"];
            $this->det_envios = $this->det_envios->findById();

            $this->det_envios->Alcanzado = 1;
            $this->det_envios->HoraMarcado = date('Y-m-d H:i:s');
            $this->det_envios->save();

            $pendientes = 0;
            foreach($this->det_envios->find($this->det_envios->Envios_id) as $r):
                if($r->Alcanzado==0){
                    $pendientes++;
                }
            endforeach;

            if($pendientes==0){
                $env = new Envio();
                $env->id = $this->det_envios->Envios_id;
                $env = $env->find();
                $env->Estado = 3;
                $env->LlegadaReal = date('Y-m-d H:i:s');
                $env->save();

                $rt = new Ruta();
                $rt->id = $env->Rutas_id;
                $rt = $rt->find();

                $cm = new Camion();
                $cm->id = $env->Camiones_id;
                $cm = $cm->find();
                $cm->Sucursales_id = $rt->Sucursales_id;
                $cm->save();
                
                $ex = new Existencia();
                foreach($ex->findByEnvio($this->det_envios->Envios_id) as $r):
                    $det_ped = new Det_Pedido();
                    $det_ped = $det_ped->findById($r->det_pedido_id);
                    $det_ped->Estado = 3;
                    $det_ped->save();

                    $r->delete($r->det_pedido_id, $r->Sucursales_id);

                    $r->Sucursales_id = $rt->Sucursales_id;
                    $r->save();
                endforeach;
            }
            
        }else{
            $od = $_REQUEST["orden"];

            foreach($this->det_envios->find($_REQUEST["envio"]) as $r):
                if($r->Orden>=$od){
                    $r->Orden++;
                    $r->save();
                }
            endforeach;

            $this->det_envios->id = 0;
            $this->det_envios->Envios_id = $_REQUEST["envio"];
            $this->det_envios->Nombre = $_REQUEST["nombre"];
            $this->det_envios->Hora = $_REQUEST["hora"];
            $this->det_envios->Orden = $od;
            $this->det_envios->Alcanzado = 0;
            $this->det_envios->save();

        }

        header("Location: {$this->det_envios->Envios_id}/edit");
        die();
    }
}