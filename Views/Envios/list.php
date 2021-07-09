<a href="<?php echo $module; ?>/0/create">Nuevo</a>

<article>

    <table class="table table-bordered table-hover table-sm">
        <caption>Lista de <?php echo $module; ?></caption>
        <thead>
            <th>#</th>
            <th>Rutas</th>
            <th>Camiones</th>
            <th>Salida Estimada</th>
            <th>Llegada Estimada</th>
            <th>Estado</th>
            <th>Acciones</th>
        </thead>
        <?php foreach($Envio as $r): ?>
        <tr>
            <td> <?php echo $r->id; ?> </td>
            <td> <?php echo $r->Rutas_id; ?> </td>
            <td> <?php echo $r->Camiones_id; ?> </td>
            <td> <?php echo $r->SalidaEstimada; ?> </td>
            <td> <?php echo $r->LlegadaEstimada; ?> </td>
            <td> <?php echo $r->Estado; ?> </td>
            <td>
                <?php if($r->Estado==1){ ?> 
                    <a href="<?php echo $module; ?>/<?php echo $r->id; ?>/delete">Anular</a>
                <?php } ?> 
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

</article>