<?php
namespace Controllers;

use Config\BaseController;
use Views\Views;
use Models\Usuario;
use Models\Sucursal;
use Models\Perfil;
use Models\Usuario_x_Perfil;

class UsuariosController implements BaseController{

    var $usuarios;

    function __construct($id){
        $this->usuarios = new Usuario();
        $this->usuarios->id = $id;
    }

    function index(){
        new Views('Usuarios/list', array(
            'Sucursal' => $this->usuarios->list()
        ));
    }

    function edit(){
        new Views('Usuarios/edit', array(
            'Usuario' => $this->usuarios->find()
            ,'Sucursales' => new Sucursal()
            ,'Perfiles' => new Perfil()
            ,'Usuarios_x_Perfiles' => new Usuario_x_Perfil()
        ));
    }

    function store(){
        $this->usuarios->id = $_REQUEST["id"];
        $this->usuarios->Sucursales_id = $_REQUEST["Sucursales_id"];
        $this->usuarios->Nombre = $_REQUEST["nombre"];
        $this->usuarios->Apellido = $_REQUEST["apellido"];
        $this->usuarios->User = $_REQUEST["user"];
        $this->usuarios->Password = md5($_REQUEST["password"]);
        $this->usuarios->Active = $_REQUEST["active"];
        $this->usuarios->save();

        $line = new Usuario_x_Perfil();
        $line->truncate($this->usuarios->id);
        foreach($_REQUEST['perfiles'] as $r):
            $line->Usuarios_id = $this->usuarios->id;
            $line->Perfiles_id = $r;
            $line->save();
        endforeach;

        header("Location: {$this->usuarios->id}/edit");
        die();
    }

    function loginForm(){
        new Views('Usuarios/Login', Array());
    }

    function validate(){
        $this->usuarios->User = $_REQUEST["user"];
        $this->usuarios->Password = md5($_REQUEST["password"]);
        $user = $this->usuarios->validateUser();
        if(isset($user) && $user != []){
            foreach($user as $u):
                if($u->Active){
                    $_SESSION["user_id"] = serialize($u);
                }else{
                    $_SESSION['mensaje'] = Array("alert-danger","Usuario inactivo");
                    header("Location: Login");
                    exit;
                }
            endforeach;
            unset($_SESSION['mensaje']);
            header("Location: ../Inicio");
        }else{
            $_SESSION['mensaje'] = Array("alert-danger","Usuario o contraseña invalido");
            header("Location: Login");
        }
    }

    function close(){
        session_unset();
        session_destroy();
        header("Location: Login");
    }
}