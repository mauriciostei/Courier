
<form action="../store" method="POST" onsubmit="return confirm('Seguro de guardar los cambios?');">

    <div class="card w-50">
        <div class="card-body">
            <h5 class="card-title">Datos del Cliente</h5>

            <div class="form-group">
                <label>Codigo identificatorio:</label>
                <input type="number" class="form-control" value="<?php echo $Clientes->id; ?>" disabled>
                <input type="hidden" name="id" value="<?php echo $Clientes->id; ?>">
            </div>

            <div class="form-group">
                <label>Cedula de Identidad:</label>
                <input type="number" class="form-control" value="<?php echo $Clientes->documento; ?>" name="documento" required>
            </div>
            <div class="form-group">
                <label>Digito Verificador:</label>
                <input type="number" class="form-control" name="DV" value="<?php echo $Clientes->DV; ?>">
            </div>
            <div class="form-group">
                <label>Nombres:</label>
                <input type="text" class="form-control" name="nombres" value="<?php echo $Clientes->Nombres; ?>" required>
            </div>
            <div class="form-group">
                <label>Apellidos:</label>
                <input type="text" class="form-control" name="apellidos" value="<?php echo $Clientes->Apellidos; ?>" required>
            </div>
            <div class="form-group">
                <label>Correo:</label>
                <input type="email" class="form-control" name="correo" value="<?php echo $Clientes->Correo; ?>">
            </div>
            <div class="form-group">
                <label>Telefono:</label>
                <input type="number" class="form-control" name="telefono" value="<?php echo $Clientes->Telefono; ?>">
            </div>
            <div class="form-group">
                <label>Fecha de Nacimiento:</label>
                <input type="date" class="form-control" name="fechaNacimiento" value="<?php echo $Clientes->fechaNacimiento; ?>">
            </div>

            <div class="form-group">
                <label>Activo:</label>
                <input type="hidden" name="active" value="<?php echo $Clientes->Active; ?>">
                <input type="checkbox" class="" name="activeCheck" <?php echo $Clientes->Active==1 ? 'checked' : ''; ?>>
            </div>

            <input type="submit" value="Guardar" class="form-control btn btn-primary btn-outline-primary">

        </div>
    </div>

</form>