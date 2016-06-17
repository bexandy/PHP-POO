<?php
require_once 'class/class.php';
//print_r($_SESSION);
if (isset($_SESSION["session_reg_usuario"]))
{
  $t = new Trabajo;
  $nom=$t->saluda_al_usuario($_SESSION["session_reg_usuario"]);
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Contenidos</title>
    <link rel="stylesheet" href="">
  </head>
  <body>
  <?php echo "Hola ".$nom[0]["nombre"]." !Bienvenid@ !"; ?>
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
