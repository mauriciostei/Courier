<a href="<?php echo $module; ?>/0/create">Nuevo</a>

<article>

    <table class="table table-bordered table-hover table-sm">
        <caption>Lista de <?php echo $module; ?></caption>
        <thead>
            <th>#</th>
            <th>Nombre y Apellido</th>
            <th>Username</th>
            <th>Activo</th>
            <th>Acciones</th>
        </thead>
        <?php foreach($Sucursal as $r): ?>
        <tr>
            <td> <?php echo $r->id; ?> </td>
            <td> <?php echo $r->Nombre; ?>, <?php echo $r->Apellido; ?> </td>
            <td> <?php echo $r->User; ?> </td>
            <td  <?php echo $r->Active==1 ? 'class="bi bi-check-lg"' : 'class="bi bi-x-lg"'; ?>></td>
            <td> <a href="<?php echo $module; ?>/<?php echo $r->id; ?>/edit">Editar</a> </td>
        </tr>
        <?php endforeach; ?>
    </table>

</article>