<?php
require_once 'class/class.php';
//print_r($_SESSION);
if (isset($_SESSION["session_reg_usuario"]))
{
  $t = new Trabajo;
  $nom=$t->saluda_al_usuario($_SESSION["session_reg_usuario"]);
  ?>
  <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
  <html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Contenidos</title>
    <link rel="stylesheet" href="">
  </head>
  <body>
    <?php echo "Hola ".$nom[0]["nombre"]." !Bienvenid@ !"; ?>
    <br>
    <a href="salir.php" title="Cerrar Sesión">Cerrar Sesión</a>
  </body>
  </html>
  <?php
}else{
  echo "
  <script type='text/javascript'>
    alert('Debe loguearse primero para acceder a este contenido');
    window.location='index.php';
  </script>
  ";
}
?>
