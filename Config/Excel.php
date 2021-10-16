<?php

$filename = $_REQUEST["nombreArchivo"];

header("Pragma: public");
header("Expires: 0");
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

echo "<table border='1'>".$_REQUEST["tabla"]."</table>";

?>