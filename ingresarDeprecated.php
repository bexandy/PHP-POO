<?php
require_once "class/classMysqlDeprecated.php";
//print_r($_POST); //Imprime en pantalla el valor de la variable que se pasa como párametro
$tra = new Trabajo;
$tra->add_Visitas($_POST["nom"],$_POST["texto"]);

?>
