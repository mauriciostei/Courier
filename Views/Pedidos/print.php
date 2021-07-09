<?php

$fMonto = 0;
$iva10 = 0;

?>

<h4>Impresion de factura</h4>

<p>No se olvide proveer a su cliente el codigo de seguimiento: <b><?php echo number_format($Pedido->id); ?></b></p>

<input type="button" onclick="printDiv('areaImprimir')" value="Imprimir Factura" class="form-control btn btn-primary btn-outline-primary" />

<hr>
<br>

<div class="d-flex justify-content-md-center">

<div class="card w-50">
    <div class="card-header">
        <h4>Factura impresa</h4>
    </div>
    <div class="card-body">

        <div id="areaImprimir">
        <center>
            <h3>SIC - Logistica</h3>
            <p>Asuncion</p>
            <p>SIC Logistica S.A.</p>
            <p><b>RUC: </b>8004456-4</p>
            <p>Mcal. Lopez casi Madame Lynch </p>
        </center>

        <table class="w-100">
            <tr>
                <td>Timbrado N°</td>
                <td><?php echo $Timbrado->Timbrado; ?></td>
            </tr>
            <tr>
                <td>Inicio Vigencia</td>
                <td><?php echo $Timbrado->InicioVigencia; ?></td>
            </tr>
            <tr>
                <td>Fin Vigencia</td>
                <td><?php echo $Timbrado->FinVigencia; ?></td>
            </tr>
        </table>

        <br>

        <table class="w-100">
            <tr>
                <td>Factura</td>
                <td>Contado</td>
            </tr>
            <tr>
                <td>Factura N°</td>
                <td><?php echo $Pedido->NumFac; ?></td>
            </tr>
            <tr>
                <td>Fecha</td>
                <td><?php echo $Pedido->Fecha; ?></td>
            </tr>
        </table>

        <br>

        <?php
            $Cliente->id = $Pedido->Clientes_id;
            $cl = $Cliente->find();
        ?>

        <div>
        <b>Nombre o Razon Social:</b> <?php echo $cl->Nombres; ?> <?php echo $cl->Apellidos; ?>
        <br>
        <b>RUC del cliente:</b> <?php echo $cl->documento; ?> - <?php echo $cl->DV; ?>
        </div>

        <br>

        <table class="w-100">
            <thead>
                <th>Descripcion</th>
                <th>Tipo</th>
                <th>Peso Final</th>
                <th>Precio Unitario</th>
            </thead>
            <tbody>
                <?php foreach($Det_pedido as $d): ?>
                    <?php 
                        $pVol = $d->Alto * $d->Ancho * $d->Profundidad;
                    
                    ?>
                    <tr>
                        <td><?php echo $d->Observacion; ?></td>
                        <td><?php echo $d->getType(); ?></td>
                        <td><?php echo $pVol>$d->Peso ? $pVol : $d->Peso; ?> KG.</td>
                        <td><?php echo number_format($d->Monto); ?> GS.</td>
                        <?php $fMonto += $d->Monto; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <br>

        <?php $iva10 = $fMonto / 11; ?>
        <table class="w-100">
            <tr>
                <td><b>Total a Pagar</b></td>
                <td><?php echo number_format($fMonto); ?> GS.</td>
            </tr>
            <tr>
                <td colspan="2">Detalle de total</td>
            </tr>
            <tr>
                <td>Exentas</td>
                <td>0 GS.</td>
            </tr>
            <tr>
                <td>Gravada 5%</td>
                <td>0 GS.</td>
            </tr>
            <tr>
                <td>Gravada 10%</td>
                <td><?php echo number_format($iva10); ?> GS.</td>
            </tr>
            <tr>
                <td><b>Total IVA:</b></td>
                <td><?php echo number_format($iva10); ?> GS.</td>
            </tr>
        </table>

        <br>

        <b>
            <p>Original: Cliente</p>
            <p>Copia: Archivo Tributario</p>
            <p>Gracias por su compra!</p>
        </b>

    </div>


    </div>
</div>

</div>


<script>

function printDiv(nombreDiv) {
     var contenido= document.getElementById(nombreDiv).innerHTML;
     var contenidoOriginal= document.body.innerHTML;

     document.body.innerHTML = contenido;

     window.print();

     document.body.innerHTML = contenidoOriginal;
}

</script>