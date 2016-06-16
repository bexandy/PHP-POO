<?php
require_once("class/classMysqli.php");
$consulta = new Consulta;
$consulta->eliminarDatos($_GET["id"]);
 ?>
