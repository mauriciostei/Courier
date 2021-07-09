
<?php

use Config\DataBase;

if(isset($_REQUEST["pedido"])){
    
    $ped = $_REQUEST["pedido"];
    $db = new DataBase('', null);

    foreach($db->getPKGStatus($ped) as $r):

        echo "<tr>
            <td>".$r['id']."</td>
            <td>".$r['Obs']."</td>
            <td>".$r['Origen']."</td>
            <td>".$r['Destino']."</td>
            <td>".$r['Estado']."</td>
        </tr>";

    endforeach;

}