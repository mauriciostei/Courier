<?php 
    $bandera=0;
    $orden=0;

    usort($Det_Envios, "my_cmp");

    function my_cmp($a, $b) {
        if ($a->Orden == $b->Orden) {
            return 0;
        }
        return ($a->Orden < $b->Orden) ? -1 : 1;
    }


?>

<article>

    <table class="table table-bordered table-hover table-sm">
        <caption>Lista de <?php echo $module; ?></caption>
        <thead>
            <th>#</th>
            <th>Descripcion</th>
            <th>Horas en Ruta</th>
            <th>Acciones</th>
        </thead>
        <?php foreach($Det_Envios as $r): ?>
        <tr>
            <td> <?php echo $r->Orden; ?> </td>
            <td> <?php echo $r->Nombre; ?> </td>
            <td> <?php echo $r->Hora; ?> </td>
            <td>
            <?php if($r->Alcanzado==0){ $bandera++;?>
                <?php if($bandera==1){ ?>
                    <form action="../../DetEnvios/store" method="POST" onsubmit="return confirm('Seguro de marcar punto?');">
                        <input type="hidden" name="id" value="<?php echo $r->id; ?>">
                        <input type="submit" value="Punto Alcanzado" class="form-control btn btn-primary btn-outline-primary">
                    </form>
                    <?php $orden = $r->Orden; ?>
                <?php } ?>
            <?php } ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <a href="../../Inicio" class="form-control btn btn-primary btn-outline-primary">Volver</a>

    <hr>

    <form action="../../DetEnvios/store" method="POST" onsubmit="return confirm('Seguro de marcar punto?');">
        <input type="hidden" name="envio" value="<?php echo $Envio; ?>">
        <input type="hidden" name="orden" value="<?php echo $orden; ?>">
        
        <div class="card">
            <div class="card-header">
                <h5>Nuevo Retraso</h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Observacion del retraso:</label>
                    <input type="text" class="form-control" name="nombre" required>
                </div>
                <div class="form-group">
                    <label>Tiempo Aprox del retraso:</label>
                    <input type="number" class="form-control" name="hora" required>
                </div>

                <input type="submit" value="Guardar" class="form-control btn btn-primary btn-outline-primary">
            </div>
        </div>
    </form>

</article>