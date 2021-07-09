<a href="../../<?php echo $module; ?>">Volver...</a>

<form action="../store" method="POST" onsubmit="return confirm('Seguro de guardar los cambios?');">

<div class="row">
    <div class="col">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Datos del Envio</h5>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Codigo identificatorio:</label>
                            <input type="number" class="form-control" value="<?php echo $Envio->id; ?>" disabled>
                            <input type="hidden" name="id" value="<?php echo $Envio->id; ?>">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Ruta:</label>
                            <select name="Rutas_id" class="form-control">
                                <option value="" disabled <?php echo 0==$Envio->Rutas_id ? 'selected' : ''; ?>>Seleccione Ruta</option>
                                <?php foreach($Ruta->list() as $r): ?>
                                    <option value="<?php echo $r->id; ?>" <?php echo $r->id==$Envio->Rutas_id ? 'selected' : ''; ?> > <?php echo $r->Nombre; ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Camion:</label>
                            <select name="Camiones_id" class="form-control">
                                <?php foreach($Camion->findBySucursal( unserialize($_SESSION["user_id"])->Sucursales_id ) as $r): ?>
                                    <option value="<?php echo $r->id; ?>" <?php echo $r->id==$Envio->Camiones_id ? 'selected' : ''; ?> > <?php echo $r->Nombre; ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Salida Estimada:</label>
                            <input type="datetime-local" class="form-control" name="SalidaEstimada" value="<?php echo $Envio->SalidaEstimada; ?>" >
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Llegada Estimada:</label>
                            <input type="datetime-local" class="form-control" name="LlegadaEstimada" value="<?php echo $Envio->LlegadaEstimada; ?>" readonly>
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
                <h5 class="card-title">Productos Captados</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <table class="table table-bordered table-hover table-sm">
                        <caption>Detalle de productos a ser enviados</caption>
                        <thead>
                            <th>Tipo Producto:</th>
                            <th>Peso Calculado:</th>
                            <th>Observacion</th>
                        </thead>
                        <tbody id="detalleEnvio">

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
    $("select[name='Rutas_id']").change(function(){
        var rutaSelected = $("select[name='Rutas_id']").val();
        var rutas = <?php echo json_encode($Ruta->list()); ?>;
        var encontrado = rutas.find(o => o.id === rutaSelected);

        var det = <?php echo json_encode($det_pedido->listPending()); ?>;

        var content = "";
        $.each( det, function( key, line ) {
            if(line.Sucursales_id === encontrado.Sucursales_id){

                var productType = "";
                switch(line.TipoProducto){
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
                content = content + "<td>" + productType +"</td>";
                content = content + "<td>" + line.Peso +"</td>";
                content = content + "<td>" + line.Observacion +"</td>";
                content = content + "<td><input type='checkbox' name='det_pedido[]' value='" + line.id +"' ></td>";
                content = content + "</tr>";
            }
        });
        $("#detalleEnvio").html(content);
	});

	$("input[name='SalidaEstimada']").change(function(){
        var rutaSelected = $("select[name='Rutas_id']").val();
        var rutas = <?php echo json_encode($Ruta->list()); ?>;
        var encontrado = rutas.find(o => o.id === rutaSelected);

        var dt = new Date($("input[name='SalidaEstimada']").val());
        dt.addHours(encontrado.Horas);
        const dateTimeLocalValue = (new Date(dt.getTime() - dt.getTimezoneOffset() * 60000).toISOString()).slice(0, -1);
        $("input[name='LlegadaEstimada']").val(dateTimeLocalValue);
	});
});

Date.prototype.addHours = function(h) {
  this.setTime(this.getTime() + (h*60*60*1000));
  return this;
}
</script>