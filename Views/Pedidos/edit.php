
<form action="../store" method="POST" onsubmit="return confirm('Seguro de guardar los cambios?');">

<div class="row">
    <div class="col col-lg-4">

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Nuevo Pedido</h5>
                <a class="btn btn-primary btn-outline-primary float-right" href="../../Clientes/0/create">
                    <i class="bi bi-plus"></i> Nuevo Cliente
                </a>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Timbrado:</label>
                            <select name="Timbrados_id" class="form-control">
                                <?php foreach($Timbrado->findBySucursal( unserialize($_SESSION["user_id"])->Sucursales_id ) as $r): ?>
                                    <option value="<?php echo $r->id; ?>"> <?php echo $r->Timbrado; ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Cedula Cliente:</label>
                            <input type="number" class="form-control" id="cliente">
                            <input type="hidden" name="Clientes_id" id="clienteId">
                            <span id="clienteInfo"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Observacion:</label>
                            <textarea name="Observacion" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                

                <br>
                <input type="submit" value="Guardar" class="form-control btn btn-primary btn-outline-primary">

            </div>
        </div>

    </div>

    <div class="col col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Paquetes</h5>
                <a class="btn btn-primary btn-outline-primary float-right" id="btnAddRow">
                    <i class="bi bi-plus"></i> Añadir Fila
                </a>
            </div>
            <div class="card-body">
                <div class="row">
                    <table class="table table-bordered table-hover table-sm">
                        <caption>Unidades de medida establecida son Kilogramo y Metro</caption>
                        <thead>
                            <th>Sucursal:</th>
                            <th>Cliente:</th>
                            <th>Peso:</th>
                            <th>Alto:</th>
                            <th>Ancho:</th>
                            <th>Profundidad:</th>
                            <th>Tipo Producto:</th>
                            <th>Observacion:</th>
                            <th>Precio</th>
                            <th></th>
                        </thead>
                        <tbody id="tablaBase">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <h4 class="card-title d-flex justify-content-end" id="subTotal">Total: 0 GS.</h4>
            </div>
        </div>
    </div>

</div>

</form>

<script>

$(document).ready(function(){
	$("#btnAddRow").click(function(){
        var content = '<tr>';
        content = content + '<td><select name="sucursalesDet[]" class="form-control">  <?php foreach($Sucursal->list() as $r): ?> <option value="<?php echo $r->id; ?>"> <?php echo $r->Nombre; ?> </option> <?php endforeach; ?> </select></td>';
        content = content + '<td><select name="clientesDet[]" class="form-control">  <?php foreach($Cliente->list() as $r): ?> <option value="<?php echo $r->id; ?>"> <?php echo $r->Nombres; ?> </option> <?php endforeach; ?> </select></td>';
        content = content + '<td><input type="number" step="0.01" onchange="changeText()" class="form-control" name="pesoDet[]" placeholder="Peso"></td>';
        content = content + '<td><input type="number" step="0.01" onchange="changeText()" class="form-control" name="altoDet[]" placeholder="Alto"></td>';
        content = content + '<td><input type="number" step="0.01" onchange="changeText()" class="form-control" name="anchoDet[]" placeholder="Ancho"></td>';
        content = content + '<td><input type="number" step="0.01" onchange="changeText()" class="form-control" name="profundidadDet[]" placeholder="Profundidad"></td>';
        content = content + '<td><select name="tProductoDet[]" class="form-control">';
            content = content + '<option value=1>Cuidado Personal</option>';
            content = content + '<option value=2>Joyas y accesorios</option>';
            content = content + '<option value=3>Juguetes y Juegos</option>';
            content = content + '<option value=4>Artesanía</option>';
            content = content + '<option value=5>Plantas</option>';
            content = content + '<option value=6>Informática</option>';
            content = content + '<option value=7>Proyector y Pantallas</option>';
            content = content + '<option value=8>Mobiliarios</option>';
            content = content + '<option value=9>Cocina y Comedor</option>';
            content = content + '<option value=10>Pequeños Electrodomésticos</option>';
            content = content + '<option value=11>Equipos de Audio</option>';
            content = content + '<option value=12>bazar</option>';
            content = content + '<option value=13>Tecnología</option>';
            content = content + '<option value=14>Cocina</option>';
            content = content + '<option value=15>Jardín</option>';
            content = content + '<option value=16>Somieres</option>';
            content = content + '<option value=17>Línea de Bebés</option>';
            content = content + '<option value=18>Deporte y Fitness</option>';
            content = content + '<option value=19>Lavado - Cuidado de Prendas</option>';
            content = content + '<option value=20>Hogar y Limpieza</option>';
            content = content + '<option value=21>Heladeras y Freezers</option>';
            content = content + '<option value=22>Refrigeración</option>';
            content = content + '<option value=23>Herramientas manuales o electrónicas </option>';
            content = content + '<option value=24>Medicina.</option>';
        content = content + '</select></td>';
        content = content + '<td><input type="text" class="form-control" name="obsDet[]" placeholder="Observacion"></td>';
        content = content + '<td><input type="number" class="form-control" name="montoDet[]" readonly></td>';
        content = content + '<td><i class="bi bi-trash removeLine"></i></td>';
        content = content + '</tr>';
		$("#tablaBase").append(content);
	});
    $("#tablaBase").on('click','.removeLine',function(){
        $(this).parent().parent().remove();
    });

    $("#btnAddRow").click();
});

function changeText(){
    var subTotal = 0;
    $('#tablaBase tr').each(function() {
        var peso = $(this).find("td").eq(2).find("input").val();
        var alto = $(this).find("td").eq(3).find("input").val();
        var ancho = $(this).find("td").eq(4).find("input").val();
        var profundidad = $(this).find("td").eq(5).find("input").val();

        var pesoVol = peso * alto * profundidad;
        var result = 0;
        var monto = 20000;

        if(pesoVol > peso){
            result = pesoVol * monto;
        }else{
            result = peso * monto;
        }

        subTotal = subTotal + result;
        $(this).find("td").eq(8).find("input").val(result);
    });

    $("#subTotal").html("Total: " + addCommas(subTotal) + " GS.");
}

$("#cliente").on('change', function(){
    var ci = $("#cliente").val();
    var clientes = <?php echo json_encode($Cliente->list()); ?>;
    var encontrado = clientes.find(o => o.documento === ci);

    $("#clienteId").val(encontrado.id);

    var result = "";
    result = result + "<br><b>Nombres: </b>" + encontrado.Nombres;
    result = result + "<br><b>Apellidos: </b>" + encontrado.Apellidos;
    result = result + "<br><b>Telefono: </b>" + encontrado.Telefono;
    result = result + "<br><b>Factura: </b>" + encontrado.documento + "-" + encontrado.DV;
    result = result + "<br>";

    $("#clienteInfo").html(result);
});

function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

</script>