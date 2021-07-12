<a href="../../<?php echo $module; ?>">Volver...</a>

<form action="../store" method="POST" onsubmit="return confirm('Seguro de guardar los cambios?');">

    <div class="card w-50">
        <div class="card-body">
            <h5 class="card-title">Datos de la Ciudad</h5>

            <div class="form-group">
                <label>Codigo identificatorio:</label>
                <input type="number" class="form-control" value="<?php echo $Ciudad->id; ?>" disabled>
                <input type="hidden" name="id" value="<?php echo $Ciudad->id; ?>">
            </div>
            <div class="form-group">
                <label>Nombre:</label>
                <input type="text" class="form-control" name="nombre" value="<?php echo $Ciudad->Nombre; ?>" required>
            </div>
            <div class="form-group">
                <label>Activo:</label>
                <input type="hidden" name="active" value="<?php echo $Ciudad->Active; ?>">
                <input type="checkbox" class="" name="activeCheck" <?php echo $Ciudad->Active==1 ? 'checked' : ''; ?>>
            </div>

            <input type="submit" value="Guardar" class="form-control btn btn-primary btn-outline-primary">

        </div>
    </div>

</form>