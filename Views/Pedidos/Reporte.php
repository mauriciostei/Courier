
<form action="" method="POST">

    <div class="card w-50 mx-auto">
        <div class="card-body">
            <h5 class="card-title">Reporte de Pedidos</h5>

            <div class="form-group">
                <label>Rango de fechas:</label>
                <div class="row">
                    <div class="col">
                        <input type="date" class="form-control" name="fechaIni" value="<?php echo $data['fechaIni']; ?>" required>
                    </div>
                    <div class="col">
                        <input type="date" class="form-control" name="fechaFin" value="<?php echo $data['fechaFin']; ?>" required>
                    </div>
                </div>
            </div>

            <input type="submit" value="Mostrar" class="form-control btn btn-primary btn-outline-primary">
            <br><br>
            <div id="boton_exportar"></div>

        </div>
    </div>

</form>

<?php if(isset($data['fechaIni']) && isset($data['fechaFin']) ){ ?>

    <br>
    <hr>

    <table id="reportes" class="table table-bordered table-hover table-sm">
        <caption>Reporte de <?php echo $module; ?></caption>
        <thead>
            <th>#</th>
            <th>Factura</th>
            <th>Cliente</th>
            <th>Fecha</th>
            <th>Peso Volumetrico</th>
            <th>Monto</th>
            <th>Observaciones</th>
        </thead>
        <?php foreach($Pedido as $r): ?>

            <?php
                $pesoFin = 0;
                $montoFin = 0;
                foreach($det_pedido->find($r->id) as $f):
                    $vol = $f->Peso * $f->Alto * $f->Ancho;
                    $pesoVol = ($vol > $f->Peso) ? $vol : $f->Peso;

                    $pesoFin += $pesoVol;
                    $montoFin += ($pesoVol * 20000);
                endforeach;
            ?>

        <tr>
            <td><?php echo $r->id; ?></td>
            <td>
                <?php
                    $Timbrado->id = $r->Timbrados_id;
                    echo $Timbrado->find()->Timbrado.': '.$r->NumFac;
                ?>
            </td>
            <td>
                <?php
                    $Cliente->id = $r->Clientes_id;
                    echo $Cliente->find()->Nombres.', '.$Cliente->find()->Apellidos;
                ?> 
            </td>
            <td><?php echo $r->Fecha; ?></td>
            <td><?php echo number_format($pesoFin); ?></td>
            <td><?php echo number_format($montoFin); ?></td>
            <td><?php echo $r->Observacion; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

<div style="visibility: hidden" id="nombreArchivo">ReportePedidos</div>
<script type="text/javascript"> Exportar(); </script>

<?php } ?>