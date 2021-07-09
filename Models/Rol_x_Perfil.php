<?php
namespace Models;

use Config\DataBase;

class Rol_x_Perfil extends DataBase{

    var $Perfiles_id;
    var $Roles_id;

    function __construct(){}

    function find($perfil, $rol){
        $db = new DataBase('Roles_x_Perfiles', __CLASS__);
        $this->Perfiles_id = $perfil;
        $this->Roles_id = $rol;

        return $db->getWhere(Array(
            "Perfiles_id = '{$this->Perfiles_id}'"
            ,"Roles_id = '{$this->Roles_id}'"
        ));
    }

    function truncate($perfil){
        $db = new DataBase('Roles_x_Perfiles', __CLASS__);
        $this->Perfiles_id = $perfil;
        $db->delete(" Perfiles_id = {$this->Perfiles_id}");
    }

    function save(){
        $db = new DataBase('Roles_x_Perfiles', __CLASS__);
        $id = $db->execSaveSQL($this);
        $this->id = $id==0 ? $this->id : $id;
    }
}