<?php

require_once "../controladores/formularios.controlador.php";
require_once "../modelos/formularios.modelos.php";

//======CLASE DE AJAX

class AjaxFormularios{

    public $validarEmail;
    public function ajaxValidarEmail(){
        $item = "email";
        $valor = $this->validarEmail;

        $respuesta = ControladorFormularios::ctrSeleccionaRegistros($item,$valor);
        echo '<pre>'; print_r($respuesta); echo '</pre>';
    }
}
if(isset($_POST["validarEmail"])){

    $valEmail = new AjaxFormularios;
    $valEmail -> validarEmail = $_POST["validarEmail"];
    $valEmail ->ajaxValidarEmail();
}