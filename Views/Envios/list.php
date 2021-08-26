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
            <th>Salida Real</th>
            <th>Llegada Real</th>
            <th>Estado</th>

        </thead>
        <?php foreach($Envio as $r): ?>
        <tr>
            <td> <?php echo $r->id; ?> </td>
            <td> 
                <?php
                    $Rutas->id = $r->Rutas_id;
                    echo $Rutas->find()->Nombre; 
                ?> 
            </td>
            <td> 
                <?php
                    $Camiones->id = $r->Camiones_id;
                    echo $Camiones->find()->Nombre; 
                ?> 
            </td>
            <td> <?php echo $r->SalidaEstimada; ?> </td>
            <td> <?php echo $r->LlegadaEstimada; ?> </td>
            <td> <?php echo $r->SalidaReal; ?> </td>
            <td> <?php echo $r->LlegadaReal; ?> </td>
            <td>
                <?php
                    switch($r->Estado){
                        case 1: echo 'Creado'; break;
                        case 2: echo 'En Ruta'; break;
                        case 3: echo 'Entregado'; break;
                    }
                ?>
                <?php if($r->Estado==1){ ?> 
                    <a href="<?php echo $module; ?>/<?php echo $r->id; ?>/delete"> - Anular</a>
                <?php } ?> 
            </td>

        </tr>
        <?php endforeach; ?>
    </table>

</article>