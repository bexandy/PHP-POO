<?php
require_once 'class/class.php';

if (isset($_POST["grabar"]) and $_POST["grabar"]=="si") {
  $obj = new Trabajo;
  $obj->registro();
  exit;
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Registrarse</title>
  <link rel="stylesheet" href="">
  <script language="javascript" type="text/javascript" src="js/md5.js"></script>
  <script language="javascript" type="text/javascript" src="js/funciones.js"></script>
</head>
<body>

  <center>
    <form name="form" action="" method="post">
      <h2>Registrarse</h2>
      Nombre: <input type="text" name="nom" >
      <br>
      E-mail: <input type="text" name="correo" >
      <br>
      Login: <input type="text" name="login" >
      <br>
      Password: <input type="password" name="pass" >
      <br>
      Repetir Password: <input type="password" name="pass_1" >
      <hr>
      <input type="hidden" name="grabar" value="si">
      <button type="button" value="Volver Atrás" title="Volver Atrás" onclick="window.location='index.php';">Volver Atrás</button>
      &nbsp;&nbsp;||&nbsp;&nbsp;
      <button type="button" value="Registrarse" title="Registrarse" onclick="valida_registro();">Registrarse</button>
    </form>
  </center>
</body>
</html>
