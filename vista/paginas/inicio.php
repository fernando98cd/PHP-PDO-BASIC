<?php

if (isset($_SESSION["validaringreso"])){
    if($_SESSION["validaringreso"] != "ok"){
        echo '<script>window.location = "index.php?pagina=ingreso";</script>';

        return;
    }
}else{
    echo '<script>window.location = "index.php?pagina=ingreso";</script>';
    return;
}
$usuarios = ControladorFormularios::ctrSeleccionaRegistros(null,null);

?>
<div class="container-fluid bg-light">
        <div class="container">
            <h2 class="text-center py-4">INICIO</h2>
        </div>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($usuarios as $key => $value):  ?>

            <tr>
                <td><?php echo ($key+1); ?></td>
                <td><?php echo $value["nombre"]; ?></td>
                <td><?php echo $value["email"]; ?></td>
                <td><?php echo $value["fecha"]; ?></td>
                <td>
                    <div class="btn-group">
                        <a href="index.php?pagina=editar_registro&token=<?php echo $value["token"];?>" class="btn btn-warning">Editar</a>

                        <form method="post">
                            <input type="hidden" value="<?php echo $value["token"];?>" name="eliminarRegistro">
                            <button type="submit" class="btn btn-danger">eliminar</button>
                            <?php 
                                $eliminar = new ControladorFormularios();
                                $eliminar->ctrEliminarRegistro();
                            ?>
                        </form>
                    </div>
                </td>
            </tr>

        <?php endforeach ?>
    </tbody>

</table>