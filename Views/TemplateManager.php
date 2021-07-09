<?php
namespace Views;

class TemplateManager{

    var $templatesWeb = Array(
        //Plantilla de Login
        'Usuarios/Login' => 'Views/Templates/Web/LoginTemplate.php'
        //Plantilla Publica
        ,'Inicio/Publico' => 'Views/Templates/Web/PublicTemplate.php'
        //Plantilla de Consola
        ,'Inicio/Dashboard' => 'Views/Templates/Web/AdminTemplate.php'
        ,'Usuarios/list' => 'Views/Templates/Web/AdminTemplate.php'
        , 'Usuarios/edit' => 'Views/Templates/Web/AdminTemplate.php'
        , 'Perfiles/list' => 'Views/Templates/Web/AdminTemplate.php'
        , 'Perfiles/edit' => 'Views/Templates/Web/AdminTemplate.php'
        , 'Sucursales/list' => 'Views/Templates/Web/AdminTemplate.php'
        , 'Sucursales/edit' => 'Views/Templates/Web/AdminTemplate.php'
        , 'Ciudades/list' => 'Views/Templates/Web/AdminTemplate.php'
        , 'Ciudades/edit' => 'Views/Templates/Web/AdminTemplate.php'
        , 'Camiones/list' => 'Views/Templates/Web/AdminTemplate.php'
        , 'Camiones/edit' => 'Views/Templates/Web/AdminTemplate.php'
        , 'Timbrados/list' => 'Views/Templates/Web/AdminTemplate.php'
        , 'Timbrados/edit' => 'Views/Templates/Web/AdminTemplate.php'
        , 'Rutas/list' => 'Views/Templates/Web/AdminTemplate.php'
        , 'Rutas/edit' => 'Views/Templates/Web/AdminTemplate.php'
        //, 'Pedidos/list' => 'Views/Templates/Web/AdminTemplate.php'
        , 'Pedidos/edit' => 'Views/Templates/Web/AdminTemplate.php'
        , 'Pedidos/print' => 'Views/Templates/Web/AdminTemplate.php'
        , 'Pedidos/takeOut' => 'Views/Templates/Web/AdminTemplate.php'
        //, 'Clientes/list' => 'Views/Templates/Web/AdminTemplate.php'
        , 'Clientes/edit' => 'Views/Templates/Web/AdminTemplate.php'
        , 'Envios/list' => 'Views/Templates/Web/AdminTemplate.php'
        , 'Envios/edit' => 'Views/Templates/Web/AdminTemplate.php'
        , 'Det_Envios/edit' => 'Views/Templates/Web/AdminTemplate.php'
    );

    var $templatesMovil = Array(
        //Plantilla de Login
        'Usuarios/Login' => 'Views/Templates/Movil/LoginTemplate.php'
        //Plantilla Publica
        ,'Inicio/Publico' => 'Views/Templates/Movil/PublicTemplate.php'
        //Plantilla de Consola
        ,'Inicio/Dashboard' => 'Views/Templates/Movil/AdminTemplate.php'
        //Envio en curso
        , 'Det_Envios/edit' => 'Views/Templates/Movil/AdminTemplate.php'

    );

    public function getTemplate($view){
        $movil = preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini
        |mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);


        if(array_key_exists($view, $this->templatesWeb)){
            if($movil==0){
                return $this->templatesWeb[$view];
            }else{
                return $this->templatesMovil[$view];
            }
            
        }
    }

}