<a href="../../<?php echo $module; ?>">Volver...</a>

<form action="../store" method="POST" onsubmit="return confirm('Seguro de guardar los cambios?');">

<div class="row">
    <div class="col">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Datos del Camion</h5>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Codigo identificatorio:</label>
                            <input type="number" class="form-control" value="<?php echo $Camion->id; ?>" disabled>
                            <input type="hidden" name="id" value="<?php echo $Camion->id; ?>">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input type="text" class="form-control" name="nombre" value="<?php echo $Camion->Nombre; ?>" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Sucursal:</label>
                            <select name="Sucursales_id" class="form-control" required>
                                <?php foreach($Sucursales->list() as $r): ?>
                                    <option value="<?php echo $r->id; ?>" <?php echo $r->id==$Camion->Sucursales_id ? 'selected' : ''; ?> > <?php echo $r->Nombre; ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label>Marca:</label>
                        <input type="text" class="form-control" name="marca" value="<?php echo $Camion->Marca; ?>">
                    </div>
                    <div class="col">
                        <label>Modelo:</label>
                        <input type="text" class="form-control" name="modelo" value="<?php echo $Camion->Modelo; ?>">
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col">
                        <label>Chapa:</label>
                        <input type="text" class="form-control" name="chapa" value="<?php echo $Camion->Chapa; ?>">
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Activo:</label>
                            <input type="hidden" name="active" value="<?php echo $Camion->Active; ?>">
                            <input type="checkbox" class="" name="activeCheck" <?php echo $Camion->Active==1 ? 'checked' : ''; ?>>
                        </div>
                    </div>
                </div>

                <br>
                <input type="submit" value="Guardar" class="form-control btn btn-primary btn-outline-primary">

            </div>
        </div>

    </div>

</div>

</form>