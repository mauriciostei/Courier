<a href="../../<?php echo $module; ?>">Volver...</a>

<form action="../store" class="row w-100" method="POST" onsubmit="return confirm('Seguro de guardar los cambios?');">

    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Datos del Usuario</h5>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Codigo identificatorio:</label>
                            <input type="number" class="form-control" value="<?php echo $Usuario->id; ?>" disabled>
                            <input type="hidden" name="id" value="<?php echo $Usuario->id; ?>">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label>Nombre y Apellido:</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" name="nombre" value="<?php echo $Usuario->Nombre; ?>" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="apellido" value="<?php echo $Usuario->Apellido; ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Sucursal:</label>
                            <select name="Sucursales_id" class="form-control">
                                <?php foreach($Sucursales->list() as $r): ?>
                                    <option value="<?php echo $r->id; ?>" <?php echo $r->id==$Usuario->Sucursales_id ? 'selected' : ''; ?> > <?php echo $r->Nombre; ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label>Usuario del Sistema:</label>
                        <input type="text" class="form-control" name="user" value="<?php echo $Usuario->User; ?>" required>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Activo:</label>
                            <input type="hidden" name="active" value="<?php echo $Usuario->Active; ?>">
                            <input type="checkbox" class="" name="activeCheck" <?php echo $Usuario->Active==1 ? 'checked' : ''; ?>>
                        </div>
                    </div>
                </div>

                <br>
                <input type="hidden" name="password" value="<?php echo $Usuario->Password; ?>">
                <input type="submit" value="Guardar" class="form-control btn btn-primary btn-outline-primary">

            </div>
            <div class="card-footer">Es recomendable que el "userName" sea la primera letra del nombre y el primer apellido completo</div>
        </div>
    </div>

    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Perfiles del usuario</h5>

                <table class="table table-bordered table-hover table-sm">
                    <thead>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Activo</th>
                    </thead>
                    <tbody>
                        <?php foreach($Perfiles->list() as $r): ?>
                            <?php
                                $checked = $Usuarios_x_Perfiles->find($Usuario->id, $r->id)==Array() ? '' : 'Checked';
                            ?>
                            <tr>
                                <td> <?php echo $r->id; ?> </td>
                                <td> <?php echo $r->Nombre; ?> </td>
                                <td>
                                    <input type="checkbox" name="perfiles[]" value="<?php echo $r->id; ?>" <?php echo $checked; ?> >
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>

</form>


<hr>

<div class="row">

    <form action="../store" method="POST" class="col" onsubmit="return confirm('Seguro de guardar los cambios?');">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Reiniciar Contraseña</h5>

            <div class="row">
                <div class="col">
                    <label>Contraseña Nueva:</label>
                    <input type="password" name="password" min=6 class="form-control" placeholder="Ingrese la nueva contraseña" <?php echo $Usuario->id==0 ? 'disabled' :''; ?> required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label>Repita Contraseña Nueva:</label>
                    <input type="password" class="form-control" min=6 placeholder="Ingrese de nuevo la contraseña" <?php echo $Usuario->id==0 ? 'disabled' :''; ?> required>
                </div>
            </div>

            <br>
            <input type="hidden" name="id" value="<?php echo $Usuario->id; ?>">
            <input type="hidden" name="Sucursales_id" value="<?php echo $Usuario->Sucursales_id; ?>">
            <input type="hidden" name="nombre" value="<?php echo $Usuario->Nombre; ?>">
            <input type="hidden" name="apellido" value="<?php echo $Usuario->Apellido; ?>">
            <input type="hidden" name="user" value="<?php echo $Usuario->User; ?>">
            <input type="hidden" name="active" value="<?php echo $Usuario->Active==1 ? 'on' : 'off'; ?>">
            <input type="submit" value="Reiniciar" class="form-control btn btn-primary btn-outline-primary" <?php echo $Usuario->id==0 ? 'disabled' :''; ?>>

        </div>

        <div class="card-footer">Debe indicar 2 veces la contraseña para su reinicio</div>
    </div>

    </form>

    <div class="col"></div>

</div>
