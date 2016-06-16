<?php
//require_once "class/classMysqlDeprecated.php";
require_once "class/classMysqli.php";
//print_r($_POST); //Imprime en pantalla el valor de la variable que se pasa como párametro
//echo "<script type='text/javascript' >
//    alert('Estoy en ingresar.php');

//  </script>";
//$tra = new Trabajo;
//$tra->add_Visitas($_POST["nom"],$_POST["texto"]);

$cons = new Consulta;
$cons->addDatos($_POST["nom"],$_POST["texto"]);
?>
