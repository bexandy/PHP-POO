<?php
require_once 'class/class.php';

if (isset($_POST["grabar"]) and $_POST["grabar"]=="si") {
  //print_r($_POST);
  $t = new Trabajo;
  $t->logueo();
  exit;
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registro de Usuarios</title>
  <link rel="stylesheet" href="">
  <script language="javascript" type="text/javascript" src="js/md5.js"></script>
  <script language="javascript" type="text/javascript" src="js/funciones.js"></script>
</head>

<body onload="limpiar_logueo();">

  <form name="form" action="index.php" method="post">
    <table align="center" width="400">
      <tr>
        <td valign="top" align="center" colspan="2" width="400">
          <strong>Ingrese sus Datos</strong>
          <hr>
        </td>
      </tr>

      <tr style="background-color: #cccccc;">
      <td valign="top" align="right" width="200">
          Login:
        </td>
        <td valign="top" align="left" width="200">
          <input type="text" name="user" >
        </td>
      </tr>

      <tr style="background-color: #cccccc;">
      <td valign="top" align="right" width="200">
          Password:
        </td>
        <td valign="top" align="left" width="200">
          <input type="password" name="pass" >
        </td>
      </tr>

      <tr>
        <td valign="top" align="center" colspan="2" width="400">
          <hr>
          <button type="button" value="Registrarse" title="Registrase" onclick="">Registrarse</button>
          &nbsp;&nbsp;||&nbsp;&nbsp;
          <input type="hidden" name="grabar" value="si">
          <button type="button" value="Entrar" title="Entrar" onclick="validar_logueo();">Entrar</button>
        </td>
      </tr>

    </table>
  </form>

</body>
</html>
