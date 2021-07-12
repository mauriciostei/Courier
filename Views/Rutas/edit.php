<a href="../../<?php echo $module; ?>">Volver...</a>

<form action="../store" method="POST" onsubmit="return confirm('Seguro de guardar los cambios?');">

<div class="row">
    <div class="col">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Datos de la Ruta</h5>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Codigo identificatorio:</label>
                            <input type="number" class="form-control" value="<?php echo $Rutas->id; ?>" disabled>
                            <input type="hidden" name="id" value="<?php echo $Rutas->id; ?>">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input type="text" class="form-control" name="nombre" value="<?php echo $Rutas->Nombre; ?>" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Usuario:</label>
                            <select name="Usuarios_id" class="form-control">
                                <?php foreach($Usuarios->list() as $r): ?>
                                    <option value="<?php echo $r->id; ?>" <?php echo $r->id==$Rutas->Usuarios_id ? 'selected' : ''; ?> > <?php echo $r->User; ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Sucursal:</label>
                            <select name="Sucursales_id" class="form-control">
                                <?php foreach($Sucursales->list() as $r): ?>
                                    <option value="<?php echo $r->id; ?>" <?php echo $r->id==$Rutas->Sucursales_id ? 'selected' : ''; ?> > <?php echo $r->Nombre; ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Horas:</label>
                            <input type="number" class="form-control" name="horas" id="horasCab" value="<?php echo $Rutas->Horas; ?>" disabled required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Activo:</label>
                            <input type="hidden" name="active" value="<?php echo $Rutas->Active; ?>">
                            <input type="checkbox" class="" name="activeCheck" <?php echo $Rutas->Active==1 ? 'checked' : ''; ?>>
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
            <div class="card-header">
                <h5 class="card-title">Hoja de ruta</h5>
                <a class="btn btn-primary btn-outline-primary float-right" id="btnAddRow">
                    <i class="bi bi-plus"></i> Añadir Fila
                </a>
            </div>
            <div class="card-body">
                <div class="row">
                    <table class="table table-bordered table-hover table-sm">
                        <caption>Detalle de puntos de control en ruta</caption>
                        <thead>
                            <th>Nombre:</th>
                            <th>Horas:</th>
                        </thead>
                        <tbody id="tablaBase">
                            <?php foreach($det_rutas->find($Rutas->id) as $r): ?>
                                <tr id="fila-base">
                                    <input type="hidden" name="idDet[]" value="<?php echo $r->id; ?>">
                                    <td><input type="text" class="form-control" name="nomDet[]" value="<?php echo $r->Nombre; ?>"></td>
                                    <td><input type="number" class="form-control" name="horasDet[]" value="<?php echo $r->Hora; ?>"></td>
                                    <td><i class="bi bi-trash removeLine"></i></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

</form>

<script>

$(document).ready(function(){
	$("#btnAddRow").click(function(){
        var content = '<tr>';
        content = content + '<input type="hidden" name="idDet[]" value="0">';
        content = content + '<td><input type="text" class="form-control" name="nomDet[]" placeholder="Nombre de punto de control"></td>';
        content = content + '<td><input type="number" onchange="changeHours()" class="form-control" name="horasDet[]" placeholder="Horas para punto de control" value="0"></td>';
        content = content + '<td><i class="bi bi-trash removeLine"></i></td>';
        content = content + '</tr>';
		$("#tablaBase").append(content);
	});
    $("#tablaBase").on('click','.removeLine',function(){
        $(this).parent().parent().remove();
    });

    $("#btnAddRow").click();
});

function changeHours(){
    var subTotal = 0;
    $('#tablaBase tr').each(function() {
        var horas = $(this).find("td").eq(1).find("input").val();

        subTotal = subTotal + parseInt(horas, 10);
    });

    $("#horasCab").val(subTotal);
}

</script>