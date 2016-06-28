<?php
require_once("class/class.php");

if (isset($_POST) and $_POST["grabar"] == "si") {
  //print_r($_FILES);
  $tra=new Trabajo();
  $tra->insert_usuario();
  exit;
}else {
  echo "No llegó ningun dato";
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <link rel="stylesheet" type="text/css" href="" >
 <script language="javascript" type="text/javascript" src=""></script>
 <title></title>
</head>

<body>
 <center>
  <form action="" method="post" name="form" enctype="multipart/form-data">
    <h2>Ingrese sus datos</h2>
    Nombre: <input type="text" name="nombre" >
    <br>
    <br>
    Correo: <input type="text" name="correo" >
    <br>
    <br>
    Login: <input type="text" name="login" >
    <br>
    <br>
    Contraseña: <input type="password" name="pass" >
    <br>
    <br>
    Foto: <input type="file" name="foto" >
    <br>
    <br>
    <hr>
    <input type="hidden" name="grabar" value="si">
    <button type="submit" name="Enviar" title="Enviar">Enviar</button>
  </form>
</center>
</body>

</html>



