
<form action="../store" method="POST" onsubmit="return confirm('Seguro de guardar los cambios?');">

    <div class="card w-50">
        <div class="card-body">
            <h5 class="card-title">Datos del Cliente</h5>

            <div class="form-group">
                <label>Cedula de Identidad:</label>
                <input type="number" class="form-control" name="documento" required>
            </div>
            <div class="form-group">
                <label>Digito Verificador:</label>
                <input type="number" class="form-control" name="DV" >
            </div>
            <div class="form-group">
                <label>Nombres:</label>
                <input type="text" class="form-control" name="nombres" required>
            </div>
            <div class="form-group">
                <label>Apellidos:</label>
                <input type="text" class="form-control" name="apellidos" required>
            </div>
            <div class="form-group">
                <label>Correo:</label>
                <input type="email" class="form-control" name="correo">
            </div>
            <div class="form-group">
                <label>Telefono:</label>
                <input type="number" class="form-control" name="telefono">
            </div>
            <div class="form-group">
                <label>Fecha de Nacimiento:</label>
                <input type="date" class="form-control" name="fechaNacimiento">
            </div>

            <input type="submit" value="Guardar" class="form-control btn btn-primary btn-outline-primary">

        </div>
    </div>

</form>