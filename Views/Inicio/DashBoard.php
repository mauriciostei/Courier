<?php use Config\DataBase; ?>


<div class="row">
    <div class="col"> </div>
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5>Pedidos del dia</h5>
            </div>
            <div class="card-body text-center">
                <?php $db = new DataBase('', null); ?>
                <?php $r = $db->getSQL("SELECT COUNT(*) COUNT FROM pedidos WHERE fecha=CURRENT_DATE();"); ?>
                <?php echo number_format($r[0]["COUNT"]); ?>
            </div>
        </div>
    </div>
    <div class="col"> </div>
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5>Recaudado en el dia</h5>
            </div>
            <div class="card-body text-center">
                <?php $db = new DataBase('', null); ?>
                <?php $r = $db->getSQL("SELECT SUM(Monto) SUM FROM pedidos JOIN det_pedido ON pedidos.id=det_pedido.Pedidos_id WHERE fecha=CURRENT_DATE();"); ?>
                <?php echo number_format($r[0]["SUM"]); ?> GS.
            </div>
        </div>
    </div>
    <div class="col"> </div>
</div>

<br>

<div class="row">
    <div class="col"> </div>
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5>Pedidos del Mes</h5>
            </div>
            <div class="card-body text-center">
                <?php $db = new DataBase('', null); ?>
                <?php $r = $db->getSQL("SELECT COUNT(*) COUNT FROM pedidos WHERE MONTH(fecha)=MONTH(CURRENT_DATE());"); ?>
                <?php echo number_format($r[0]["COUNT"]); ?>
            </div>
        </div>
    </div>
    <div class="col"> </div>
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5>Recaudado en el Mes</h5>
            </div>
            <div class="card-body text-center">
                <?php $db = new DataBase('', null); ?>
                <?php $r = $db->getSQL("SELECT SUM(Monto) SUM FROM pedidos JOIN det_pedido ON pedidos.id=det_pedido.Pedidos_id WHERE MONTH(fecha)=MONTH(CURRENT_DATE());"); ?>
                <?php echo number_format($r[0]["SUM"]); ?> GS.
            </div>
        </div>
    </div>
    <div class="col"> </div>
</div>


<br>
<hr>

<?php foreach($Envios->list() as $r): ?>
    <?php if($r->Estado<=2){ ?>
        <div class="card">
            <div class="card-header">
                <h6>Envio de Pedido</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-sm">
                    <tr>
                        <td>Camion:</td>
                        <td>
                            <?php
                                $Camion->id = $r->Camiones_id;
                                echo $Camion->find()->Nombre;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Ruta:</td>
                        <td>
                            <?php
                                $Ruta->id = $r->Rutas_id;
                                echo $Ruta->find()->Nombre;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Salida Estimada:</td>
                        <td><?php echo $r->SalidaEstimada; ?></td>
                    </tr>
                    <tr>
                        <td>Llegada Estimada:</td>
                        <td><?php echo $r->LlegadaEstimada; ?></td>
                    </tr>
                </table>

                <a href="DetEnvios/<?php echo $r->id; ?>/edit" class="form-control btn btn-primary btn-outline-primary"><?php echo $r->Estado==1 ? 'Iniciar' : 'Continuar'; ?></a>

            </div>
        </div>

        <br>
    <?php } ?>
<?php endforeach; ?>