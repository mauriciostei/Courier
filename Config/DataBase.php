<?php
namespace Config;

use PDO;
use PDOException;

class DataBase{

    var $pdo;
    var $table;
    var $className;

    function __construct($table, $class){
        $this->pdo = new PDO('mysql:host=127.0.0.1;dbname=courier', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_AUTOCOMMIT,FALSE);
        $this->table = $table;
        $this->className = $class;
    }

    function fullList(){
        $stmt = $this->pdo->query("SELECT * FROM {$this->table}");
        $list = array();
        while ($unique = $stmt->fetchObject($this->className)) {
            $list[] = $unique;
        }
        return $list;
    }

    function fullActiveList(){
        $stmt = $this->pdo->query("SELECT * FROM {$this->table} WHERE active=1");
        $list = array();
        while ($unique = $stmt->fetchObject($this->className)) {
            $list[] = $unique;
        }
        return $list;
    }

    function getById($id){
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetchObject($this->className);
    }

    function getWhere($where){
        $elWhere = "";
        foreach($where as $w):
            $elWhere .= $w." and ";
        endforeach;
        $elWhere = substr($elWhere, 0, -5);
        $sql = "SELECT * FROM {$this->table} WHERE {$elWhere};";
        $stmt = $this->pdo->query($sql);
        $list = array();
        while ($unique = $stmt->fetchObject($this->className)) {
            $list[] = $unique;
        }
        return $list;
    }

    function getUserRoles($id){
        $sql = "SELECT DISTINCT r.*
        FROM usuarios u
            JOIN usuarios_x_perfiles up ON u.id=up.Usuarios_id
            JOIN perfiles p ON up.Perfiles_id=p.id
            JOIN roles_x_perfiles rp on p.id=rp.Perfiles_id
            JOIN roles r ON rp.Roles_id=r.id
        WHERE u.id={$id};";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    function getPKGStatus($id){
        $sql = "SELECT dp.id
        , CONCAT(dp.Observacion, ': ', dp.Peso) Obs
        , 'Matriz' Origen
        , s.Nombre Destino
        , case
            when dp.Estado=1 then 'Facturado'
            when dp.Estado=2 AND ev.Estado=1 then 'Plan de envio'
            when dp.Estado=2 AND ev.Estado=2 then CONCAT('Paquete en ruta, siguiente punto de control: <b>', (SELECT Nombre FROM det_envio WHERE envios_id=ev.id AND alcanzado=0 ORDER BY Orden LIMIT 1), '</b>' )
            when dp.Estado=3 then 'Paquete listo para retiro'
            when dp.Estado=4 then 'Paquete Retirado'
        END Estado
        , case 
      		when dp.Estado=2 AND ev.Estado=2 then (ev.SalidaReal + INTERVAL (SELECT SUM(Hora) FROM det_envio WHERE envios_id=ev.id) HOUR)
      		when dp.Estado=3 then ev.LlegadaReal
            when dp.Estado=4 then ev.LlegadaReal
            ELSE ev.LlegadaEstimada
        END Llegada
        FROM pedidos p
            JOIN det_pedido dp ON dp.Pedidos_id=p.id
            JOIN existencias e ON e.det_pedido_id=dp.id
            JOIN sucursales s ON dp.Sucursales_id=s.id
            LEFT JOIN envios ev ON e.Envios_id=ev.id
        WHERE p.id={$id};";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    function getSQL($sql){
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    function delete($deleted){
        $sql = "DELETE FROM {$this->table} WHERE {$deleted}";
        try{
            $this->pdo->beginTransaction();
            $this->pdo->query($sql);
            $this->pdo->commit();
        }catch(PDOException $e){
            $this->pdo->rollback();
            die();
        }
    }

    function execSaveSQL($object){

        $insert = '';
        $values = '';
        $update = '';
        
        foreach($object as $c => $v):
            if(isset($v)){
                $insert .= $c.", ";
                if(gettype($v) == "string"){
                    $values .= "'".$v."', ";
                    if($c != "id"){
                        $update .= $c."='".$v."', ";
                    }
                }else{
                    $values .= $v.", ";
                    if($c != "id"){
                        $update .= $c."=".$v.", ";
                    }
                }
            }
        endforeach;
        
        $insert = substr($insert, 0, -2);
        $values = substr($values, 0, -2);
        $update = substr($update, 0, -2);


        try{
            $sql = "INSERT INTO {$this->table} ({$insert}) VALUES ({$values}) ON DUPLICATE KEY UPDATE {$update};";
            $this->pdo->beginTransaction();
            $this->pdo->query($sql);

            $insId = $this->pdo->lastInsertId();

            $this->pdo->commit();
            $_SESSION['mensaje'] = Array("alert-success", "Registros almacenados con exito");
            return $insId;
        }catch(PDOException $e){
            $this->pdo->rollback();
            $_SESSION['mensaje'] = Array("alert-warning","No se ha podio realizar el registro");
        }
    }

    function execSQL($sql){
        $this->pdo->query($sql);
    }
}