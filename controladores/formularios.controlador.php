<?php

class ControladorFormularios{

    //REGISTRO============================
    static public function ctrRegistro(){
        if (isset($_POST["registro_nombre"])){

            if(preg_match('/^[a-zA-ZñÑ ]+$/', $_POST["registro_nombre"])&&
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0.9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}+$/', $_POST["registro_email"])&&
                preg_match('/^[0-9a-zA-Z]+$/', $_POST["registro_password"])){
                
                $tabla= "registros";
                $token = md5($_POST["registro_nombre"]."+".$_POST["registro_email"]);

                $encriptarPassword = crypt($_POST["registro_password"],'$2a$07$luisfernandocamposdoradoo$');

                $datos = array("token" =>$token,
                                "nombre" => $_POST["registro_nombre"],
                                "email" => $_POST["registro_email"],
                                "password" => $encriptarPassword);

                $respuesta = ModeloFormularios::mdlRegistro($tabla,$datos);

                return $respuesta;
            }else{
                $respuesta = "error";
                
                return $respuesta;
            }
        }
    }


    //SELECCIONAR REGISTRO==========================
    static public function ctrSeleccionaRegistros($item,$valor){
        $tabla = "registros";
        $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla,$item,$valor);

        return $respuesta;
    }


    //////////INGRESO

    public function ctrIngreso(){
        
        if(isset($_POST["ingreso_email"])){

            $tabla = "registros";
            $item = "email";
            $valor = $_POST["ingreso_email"];
            $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla,$item,$valor);
            $encriptarPassword = crypt($_POST["ingreso_password"],'$2a$07$luisfernandocamposdoradoo$');

            if($respuesta["email"] == $_POST["ingreso_email"] && $respuesta["password"] == $encriptarPassword){

                $_SESSION["validaringreso"] = "ok";
                echo '<script>
                        if (window.history.replaceState) {
                            window.history.replaceState(null,null,window.location.href);
                        }
                        window.location = "index.php?pagina=inicio";
                        </script>';
            }else{
                echo '<script>
                        if (window.history.replaceState) {
                            window.history.replaceState(null,null,window.location.href);
                        }
                        </script>';
                        echo '<div class="alert alert-danger">Error al ingresar al sistema</div>';
            }
        }
    }

    //////////////actualziar REGISTRO
    static public function actualizarRegistro(){
        if(isset($_POST["actualizar_nombre"])){

            if(preg_match('/^[a-zA-ZñÑ ]+$/', $_POST["actualizar_nombre"])&&
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0.9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}+$/', $_POST["actualizar_email"])){

                    $usuario = ModeloFormularios::mdlSeleccionarRegistros("registros","token",$_POST["token_usuario"]);
                    $comparartoken = md5($usuario["nombre"]."+".$usuario["email"]);
                    



                    echo '<pre>'; print_r($comparartoken); echo '</pre>';

                    echo '<pre>'; print_r($usuario["nombre"]."+".$usuario["email"]); echo '</pre>';

                    echo '<pre>'; print_r($_POST["token_usuario"]); echo '</pre>';




                    if($comparartoken == $_POST["token_usuario"] && $_POST["id_usuario"] == $usuario["id"]){

                        if($_POST["actualizar_password"] != ""){
                            if(preg_match('/^[0-9a-zA-Z]+$/', $_POST["actualizar_password"])){
                                $password = crypt($_POST["actualizar_password"],'$2a$07$luisfernandocamposdoradoo$');
                            }
                        }else{
                            $password = $_POST["passwordActual"];
                        }

                        $tabla= "registros";

                        $actualizarToken = md5($_POST["actualizar_nombre"]."+".$_POST["actualizar_email"]);
                            $datos = array("id" => $_POST["id_usuario"],
                                            "token" => $_POST["token_usuario"],
                                            "nombre" => $_POST["actualizar_nombre"],
                                            "email" => $_POST["actualizar_email"],
                                            "password" => $password);

                            $respuesta = ModeloFormularios::mdlActulizarRegistro($tabla,$datos);
                            return $respuesta;
                    }else{
                        $respuesta = "error";
                        return $respuesta;
                    }
            }
                
        }
    }

    public function ctrEliminarRegistro(){
        if(isset($_POST["eliminarRegistro"])){

            $usuario = ModeloFormularios::mdlSeleccionarRegistros("registros","token",$_POST["eliminarRegistro"]);
            $comparartoken = md5($usuario["nombre"]."+".$usuario["email"]);

            if($comparartoken == $usuario["eliminarRegistro"]){
            
            
                if ($respuesta == "ok"){

                    echo '<script>
                            if (window.history.replaceState) {
                                window.history.replaceState(null,null,window.location.href);
                            }
                            window.location = "index.php?pagina=inicio";
                            </script>';
                }
            }
        }
    }

}