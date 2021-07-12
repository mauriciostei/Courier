<a href="../../<?php echo $module; ?>">Volver...</a>

<form action="../store" method="POST" onsubmit="return confirm('Seguro de guardar los cambios?');">

<div class="row">
    <div class="col">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Datos del Timbrado</h5>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Codigo identificatorio:</label>
                            <input type="number" class="form-control" value="<?php echo $Timbrado->id; ?>" disabled>
                            <input type="hidden" name="id" value="<?php echo $Timbrado->id; ?>">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Sucursal:</label>
                            <select name="Sucursales_id" class="form-control">
                                <?php foreach($Sucursales->list() as $r): ?>
                                    <option value="<?php echo $r->id; ?>" <?php echo $r->id==$Timbrado->Sucursales_id ? 'selected' : ''; ?> > <?php echo $r->Nombre; ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Timbrado:</label>
                            <input type="number" class="form-control" value="<?php echo $Timbrado->Timbrado; ?>" name="timbrado" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Expedicion:</label>
                            <input type="text" class="form-control" value="<?php echo $Timbrado->Expedicion; ?>" name="expedicion" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Inicio de la Vigencia:</label>
                            <input type="date" class="form-control" value="<?php echo $Timbrado->InicioVigencia; ?>" name="IniVigencia" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Fin de la Vigencia:</label>
                            <input type="date" class="form-control" value="<?php echo $Timbrado->FinVigencia; ?>" name="FinVigencia" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Inicio de la Factura:</label>
                            <input type="number" class="form-control" value="<?php echo $Timbrado->InicialFac; ?>" name="IniFac" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Fin de la Factura:</label>
                            <input type="number" class="form-control" value="<?php echo $Timbrado->FinFac; ?>" name="FinFac" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Factura Actual:</label>
                            <input type="number" class="form-control" value="<?php echo $Timbrado->ActFac; ?>" name="ActFac" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Activo:</label>
                            <input type="hidden" name="active" value="<?php echo $Timbrado->Active; ?>">
                            <input type="checkbox" class="" name="activeCheck" <?php echo $Timbrado->Active==1 ? 'checked' : ''; ?>>
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