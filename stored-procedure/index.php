<?php
require_once("class/class.php");

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <link rel="stylesheet" href="">
</head>
<body>

  <h2>Listado de Eventos de hoy <?php echo date("d-m-Y"); ?></h2>

  <ul>
    <?php
    $tra = new Trabajo;
    $reg = $tra->getCalendario();
    for ($i=0; $i < sizeof($reg); $i++) {
      # code...

      ?>
      <li>Título: <?php echo $reg["$i"]["titulo"]; ?>
        <br>
        Descripción: <?php echo $reg["$i"]["descripcion"]; ?>
        <br>
        Inicio: <?php echo $reg["$i"]["inicio"]; ?>
        <br>
        Término: <?php echo $reg["$i"]["termino"]; ?>
        <br>
      </li>
      <?php
    }
    ?>
  </ul>
  <hr>
  <button type="button" value="Crear Evento" title="Crear Evento" onclick="window.location='crear_evento.php';">Crear Evento</button>
</body>
</html>
