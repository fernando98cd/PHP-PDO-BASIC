<div class="container-fluid bg-light">
        <div class="container">
            <h2 class="text-center py-4">REGISTRO</h2>
        </div>
    </div>

<div class="d-flex justify-content-center text-center">
    <form class="p-5 bg-light" method="post">
                    <div class="mb-3">
                        <label for="nombre">Nombre Completo</label>
                        <input type="text" class="form-control" id="nombre" name="registro_nombre">
                    </div>
                    <div class="mb-3">
                        
                        <label for="email">E-mail Adresse</label>
                        <input type="email" class="form-control" id="email" name="registro_email">
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label">Password</label>
                        <input type="password" class="form-control" id="pwd" name="registro_password">
                    </div>

                    <?php
                        $registro = ControladorFormularios::ctrRegistro();

                        if($registro == "ok"){
                            echo '<script>
                                    if (window.history.replaceState) {
                                        window.history.replaceState(null,null,window.location.href);
                                    }
                                 </script>';
                                 echo '<div class="alert alert-success">El usuario ha sido registrado correctamente</div>';
                        }
                        if($registro == "error"){
                            echo '<script>
                                    if (window.history.replaceState) {
                                        window.history.replaceState(null,null,window.location.href);
                                    }
                                 </script>';
                                 echo '<div class="alert alert-danger">No se permiten caracteres especiales</div>';
                        }
                    ?>

                    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>