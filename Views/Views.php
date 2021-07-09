<?php
namespace Views;

use DOMDocument;
use Views\TemplateManager;

class Views extends TemplateManager{

    public function __construct($view, $parameters){
        foreach($parameters as $key => $value) {
            $$key = $value;
        }

        $path = $this->getPublicPath();
        $module = explode("/",$view)[0];

        ob_start();
        include 'Views/'.$view.'.php';
        $content = ob_get_clean();
        require_once(parent::getTemplate($view));
    }

    private function getPublicPath(){
        $parse = explode("/", $_SERVER["REQUEST_URI"]);
        $path = "";
        for($i=1;  $i < count($parse)-2; $i++){
            $path .= "../";
        }
        return $path;
    }
}