
<form action="../take" method="POST" onsubmit="return confirm('Seguro de guardar los cambios?');">

<div class="row">
    <div class="col col-lg-4">

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Retiro de paquetes</h5>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Cedula Cliente:</label>
                            <input type="number" class="form-control" id="cliente" required>
                            <input type="hidden" name="Clientes_id" id="clienteId">
                            <span id="clienteInfo"></span>
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
            </div>
            <div class="card-body">
                <div class="row">
                    <table class="table table-bordered table-hover table-sm">
                        <caption>Unidades de medida establecida son Kilogramo y Metro</caption>
                        <thead>
                            <th>#</th>
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
        </div>
    </div>

</div>

</form>

<script>


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

    var det = <?php echo json_encode($det_pedido->list()); ?>;
    var sucursal = <?php echo unserialize($_SESSION["user_id"])->Sucursales_id; ?>;
    var content = "";

    $.each(det, function(index, value){
        if(value.Estado === "3" && value.Clientes_id === encontrado.id && value.Sucursales_id === sucursal.toString()){

            var productType = "";
            switch(value.TipoProducto){
                case '1':  productType = 'Cuidado Personal'; break;
                case '2':  productType = 'Joyas y accesorios'; break;
                case '3':  productType = 'Juguetes y Juegos'; break;
                case '4':  productType = 'Artesanía'; break;
                case '5':  productType = 'Plantas'; break;
                case '6':  productType = 'Informática'; break;
                case '7':  productType = 'Proyector y Pantallas'; break;
                case '8':  productType = 'Mobiliarios'; break;
                case '9':  productType = 'Cocina y Comedor'; break;
                case '10':  productType = 'Pequeños Electrodomésticos'; break;
                case '11':  productType = 'Equipos de Audio'; break;
                case '12':  productType = 'bazar'; break;
                case '13':  productType = 'Tecnología'; break;
                case '14':  productType = 'Cocina'; break;
                case '15':  productType = 'Jardín'; break;
                case '16':  productType = 'Somieres'; break;
                case '17':  productType = 'Línea de Bebés'; break;
                case '18':  productType = 'Deporte y Fitness'; break;
                case '19':  productType = 'Lavado - Cuidado de Prendas'; break;
                case '20':  productType = 'Hogar y Limpieza'; break;
                case '21':  productType = 'Heladeras y Freezers'; break;
                case '22':  productType = 'Refrigeración'; break;
                case '23':  productType = 'Herramientas manuales o electrónicas '; break;
                case '24':  productType = 'Medicina.'; break;
            }


            content = content + "<tr>";
            content = content + "<td>" + value.id + "</td>";
            content = content + "<td>" + value.Peso + "</td>";
            content = content + "<td>" + value.Alto + "</td>";
            content = content + "<td>" + value.Ancho + "</td>";
            content = content + "<td>" + value.Profundidad + "</td>";
            content = content + "<td>" + productType + "</td>";
            content = content + "<td>" + value.Observacion + "</td>";
            content = content + "<td>" + addCommas(value.Monto) + "</td>";
            content = content + "<td><input type='checkbox' name='det_pedido[]' value='" + value.id +"' ></td>";
            content = content + "</tr>";
        }
    });

    $("#tablaBase").html(content);
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