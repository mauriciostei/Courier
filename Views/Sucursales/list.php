<a href="<?php echo $module; ?>/0/create">Nuevo</a>

<article>

    <table class="table table-bordered table-hover table-sm">
        <caption>Lista de <?php echo $module; ?></caption>
        <thead>
            <th>#</th>
            <th>Descripcion</th>
            <th>Activo</th>
            <th>Acciones</th>
        </thead>
        <?php foreach($Sucursal as $r): ?>
        <tr>
            <td> <?php echo $r->id; ?> </td>
            <td> <?php echo $r->Nombre; ?> </td>
            <td  <?php echo $r->Active==1 ? 'class="bi bi-check-lg"' : 'class="bi bi-x-lg"'; ?>></td>
            <td> <a href="<?php echo $module; ?>/<?php echo $r->id; ?>/edit">Editar</a> </td>
        </tr>
        <?php endforeach; ?>
    </table>

</article>