<?php
require_once("class/classMysqlDeprecated.php");
//print_r($_GET);
$tra = new Trabajo;
$tra->eliminar_Visitas($_GET["id"]);
 ?>
