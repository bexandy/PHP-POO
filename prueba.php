<?php
require_once "class/classMysqli.php";
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="author"  content="Bexandy Rodríguez">
  <meta name="description" content="Blog Personal realizado con PHP">
  <meta name="keywords" content="Blog Personal,PHP,Programación Orientada a Objetos">
  <meta name="viewport" content="width=device-width, initial-scale=1">

   <title>Prueba de Conexión</title>
</head>

<body>
<h2>Listado de Comentarios en el Libro de Visitas</h2>
<!--
<?php
/*$tra = new Trabajo();
$visitas = $tra->get_Visitas();

for ($i = 0; $i < sizeof($visitas); $i++) {
echo $visitas[$i]["nombre_persona"];
echo "&nbsp;&nbsp;||&nbsp;&nbsp;";
echo $visitas[$i]["texto"];
echo "<br>";
}*/
?>
-->
<?php
//Connect::conn();
$consulta = new Consulta;
$data = $consulta->getDatos();
echo "<br>";
for ($i = 0; $i < sizeof($data); $i++) {
  # code...
  echo $data[$i]["nombre_persona"];
  echo "&nbsp;&nbsp;||&nbsp;&nbsp;";
  echo $data[$i]["texto"];
  echo "<br>";
}
echo "<hr>";
echo "Prueba de Conexión con MySQLi";
?>

</body>
</html>
