<?php
require_once 'class/class.php';
if (isset($_POST) and $_POST["grabar"]=="si") {
  $obj = new Trabajo;
  $obj->insertEvento();
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Crear Evento</title>
  <link href="css/calendario.css" type="text/css" rel="stylesheet">
  <script src="js/calendar.js" type="text/javascript"></script>
  <script src="js/calendar-es.js" type="text/javascript"></script>
  <script src="js/calendar-setup.js" type="text/javascript"></script>
  <script  src="js/funciones.js" type="text/javascript" ></script>
</head>
<body onload="limpiar();">
  <form action="crear_evento.php" method="post" name="form">
    <h2>Crear NuevoEvento</h2>
    Titulo: <input type="text" name="titulo" >
    <br>
    Descripción: <textarea name="des" cols="30" rows="5"></textarea>
    <br>
    Hora Inicio: <input type="text" name="inicio" >
    <br>
    Hora Termino: <input type="text" name="termino" >
    <br>
    Fecha HTML5: <input type="date" name="fechahtml" value="" placeholder="">
    <br>
    Fecha:
    <!-- ******** INICIO CALENDARIO ********* -->
    <input type="text" name="fecha" id="ingreso" value="<?php echo date("Y-m-d"); ?>" readonly="readonly" />
    <img src="ima/calendario.png" width="16" height="16" border="0" title="Fecha Inicial" id="lanzador">
    <!-- script que define y configura el calendario-->
    <script type="text/javascript" charset="utf-8">
     Calendar.setup({
    inputField     :    "ingreso",     // id del campo de texto
     ifFormat     :     "%Y-%m-%d",     // formato de la fecha que se escriba en el campo de texto
     button     :    "lanzador"     // el id del botón que lanzará el calendario
   });
 </script>
 <!-- ******** fin CALENDARIO ************ -->
 <hr>
 <input type="hidden" name="grabar" value="si" >
 <button type="button" value="Volver" title="Volver" onclick="window.location='index.php';">Volver</button>
 &nbsp;&nbsp;||&nbsp;&nbsp;
 <button type="button" value="Crear Evento" title="Crear Evento" onclick="validar();">Crear Evento</button>

</form>

</body>
</html>
