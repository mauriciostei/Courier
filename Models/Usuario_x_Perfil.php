<?php
namespace Models;

use Config\DataBase;

class Usuario_x_Perfil{

    var $Usuarios_id;
    var $Perfiles_id;

    function __construct(){}

    function find($user, $perfil){
        $db = new DataBase('Usuarios_x_Perfiles', __CLASS__);
        $this->Usuarios_id = $user;
        $this->Perfiles_id = $perfil;

        return $db->getWhere(Array(
            "Usuarios_id = '{$this->Usuarios_id}'"
            ,"Perfiles_id = '{$this->Perfiles_id}'"
        ));
    }

    function truncate($usuario){
        $db = new DataBase('Usuarios_x_Perfiles', __CLASS__);
        $this->Usuarios_id = $usuario;
        $db->delete(" Usuarios_id = {$this->Usuarios_id}");
    }

    function save(){
        $db = new DataBase('Usuarios_x_Perfiles', __CLASS__);
        $id = $db->execSaveSQL($this);
        $this->id = $id==0 ? $this->id : $id;
    }
}