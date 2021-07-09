<a href="../../<?php echo $module; ?>">Volver...</a>

<form action="../store" method="POST" onsubmit="return confirm('Seguro de guardar los cambios?');">

<div class="row">
    <div class="col">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Datos de la Sucursal</h5>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Codigo identificatorio:</label>
                            <input type="number" class="form-control" value="<?php echo $Sucursal->id; ?>" disabled>
                            <input type="hidden" name="id" value="<?php echo $Sucursal->id; ?>">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input type="text" class="form-control" name="nombre" value="<?php echo $Sucursal->Nombre; ?>">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Ciudad:</label>
                            <select name="Ciudades_id" class="form-control">
                                <?php foreach($Ciudades->list() as $r): ?>
                                    <option value="<?php echo $r->id; ?>" <?php echo $r->id==$Sucursal->Ciudades_id ? 'selected' : ''; ?> > <?php echo $r->Nombre; ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Direccion:</label>
                            <input type="text" class="form-control" name="direccion" value="<?php echo $Sucursal->Direccion; ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label>Telefono:</label>
                        <input type="number" class="form-control" name="telefono" value="<?php echo $Sucursal->Telefono; ?>">
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Activo:</label>
                            <input type="hidden" name="active" value="<?php echo $Sucursal->Active; ?>">
                            <input type="checkbox" class="" name="activeCheck" <?php echo $Sucursal->Active==1 ? 'checked' : ''; ?>>
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
                <h5 class="card-title">Ubicacion de la Sucursal</h5>

                <input type="hidden" name="latitud" value="<?php echo $Sucursal->Latitud; ?>" id="latitud">
                <input type="hidden" name="longitud" value="<?php echo $Sucursal->Longitud; ?>" id="longitud">

                <div id='map' style='width: 100%; height: 300px;'></div>

            </div>

            <div class="card-footer">Seleccione en el mapa la ubicacion de la Sucursal</div>
        </div>
    </div>

</div>

</form>

<script>
        
var lat = $('#latitud').val();
var lng = $('#longitud').val();

if(lat!=0 && lng!=0){
    var mymap = L.map('map').setView([lat, lng], 15);
}else{
    var mymap = L.map('map').setView([-25.2965091, -57.5805807], 15);
}

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoibWFwb250ZSIsImEiOiJja3B3b2xoYWMyMjZxMm5wYWF1dW1ta2lrIn0.PCTVH-RxMzVO0rDb_TeFSQ'
}).addTo(mymap);

if(lat!=0 && lng!=0){
    var marker = L.marker([lat, lng]).addTo(mymap);
}

function onMapClick(e) {
    //console.log( JSON.stringify(e.latlng) );
    
    $('#latitud').val(e.latlng.lat);
    $('#longitud').val(e.latlng.lng);

    var marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(mymap);
}

mymap.on('click', onMapClick);

</script>