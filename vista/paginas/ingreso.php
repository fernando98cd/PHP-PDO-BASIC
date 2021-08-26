<div class="container-fluid bg-light">
        <div class="container">
            <h2 class="text-center py-4">INGRESO</h2>
        </div>
</div>
<div class="d-flex justify-content-center text-center">
    <form class="p-5 bg-light" method="post">
                    <div class="mb-3">                 
                        <label for="email">E-mail Adress</label>
                        <input type="email" class="form-control" id="email" name="ingreso_email">
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label">Password</label>
                        <input type="password" class="form-control" id="pwd" name="ingreso_password">
                    </div>

                    <?php
                        $ingreso = new ControladorFormularios();
                        $ingreso->ctrIngreso();
                        
                    ?>

                    <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>
</div>