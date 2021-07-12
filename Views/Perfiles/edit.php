<a href="../../<?php echo $module; ?>">Volver...</a>

<form action="../store" method="POST" onsubmit="return confirm('Seguro de guardar los cambios?');">

<div class="row">
    <div class="col">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Datos del Perfil</h5>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Codigo identificatorio:</label>
                            <input type="number" class="form-control" value="<?php echo $Perfil->id; ?>" disabled>
                            <input type="hidden" name="id" value="<?php echo $Perfil->id; ?>">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input type="text" class="form-control" name="nombre" value="<?php echo $Perfil->Nombre; ?>" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Activo:</label>
                            <input type="hidden" name="active" value="<?php echo $Perfil->Active; ?>">
                            <input type="checkbox" class="" name="activeCheck" <?php echo $Perfil->Active==1 ? 'checked' : ''; ?>>
                        </div>
                    </div>
                </div>

                <br>
                <input type="submit" value="Guardar" class="form-control btn btn-primary btn-outline-primary">

            </div>
        </div>

    </div>


    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Roles en el Perfil</h5>

                <table class="table table-bordered table-hover table-sm">
                    <thead>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Activo</th>
                    </thead>
                    <tbody>
                        <?php foreach($Roles->list() as $r): ?>
                            <?php
                                $checked = $Roles_x_Perfiles->find($Perfil->id, $r->id)==Array() ? '' : 'Checked';
                            ?>
                            <tr>
                                <td> <?php echo $r->id; ?> </td>
                                <td> <?php echo $r->Nombre; ?> </td>
                                <td>
                                    <input type="checkbox" name="roles[]" value="<?php echo $r->id; ?>" <?php echo $checked; ?> >
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                
            </div>

            <div class="card-footer">Seleccione los roles a los cuales podra acceder el perfil</div>
        </div>
    </div>

</div>

</form>