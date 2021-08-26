<?php
    if(isset($_GET["token"])){

        $item = "token";
        $valor = $_GET["token"];
        $usuario = ControladorFormularios::ctrSeleccionaRegistros($item,$valor);


    }
?>
<div class="container-fluid bg-light">
        <div class="container">
            <h2 class="text-center py-4">Actualizar Registro</h2>
        </div>
    </div>

<div class="d-flex justify-content-center text-center">
    <form class="p-5 bg-light" method="post">
                    <div class="mb-3">
                        <label for="nombre">Nombre Completo</label>
                        <input type="text" value="<?php echo $usuario["nombre"]; ?>" class="form-control" id="nombre" name="actualizar_nombre">
                    </div>
                    <div class="mb-3">
                        
                        <label for="email">E-mail Adresse</label>
                        <input type="email" value="<?php echo $usuario["email"]; ?>" class="form-control" id="email" name="actualizar_email">
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label">Password</label>
                        <input type="password" class="form-control" id="pwd" name="actualizar_password">
                        <input type="hidden" name="passwordActual" value="<?php echo $usuario["password"]; ?>">
                        <input type="hidden" name="token_usuario" value="<?php echo $usuario["token"]; ?>">
                        <input type="hidden" name="id_usuario" value="<?php echo $usuario["id"]; ?>">
                    </div>
                    <?PHP
                    $actualizar = ControladorFormularios::actualizarRegistro();
                    
                    if($actualizar == "ok"){
                        echo '<script>
                            if (window.history.replaceState) {
                                window.history.replaceState(null,null,window.location.href);
                            }
                            </script>';
                        
                        echo '<div class="alert alert-success">El usuario ha sido actualizado</div>
                        
                        <script>
                                setTimeout(function(){
                                    window.location = "index.php?pagina=inicio";
                                },2000)
                        </script>';
                    }
                    if($actualizar == "error"){
                        echo '<script>
                            if (window.history.replaceState) {
                                window.history.replaceState(null,null,window.location.href);
                            }
                            </script>';
                        
                        echo '<div class="alert alert-danger">Error al actualizar el usuario</div>';
                    }
                    ?>
                    
                    <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>