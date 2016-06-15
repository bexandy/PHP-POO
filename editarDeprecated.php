<?php
require_once "class/classMysqlDeprecated.php";
$tra = new Trabajo;
//echo "Metodo GET : ";
//print_r($_GET);
//echo "<hr />";


if (isset($_POST["grabar"]) and $_POST["grabar"]=="si") {
  //echo "Metodo POST : ";
  //print_r($_POST);
  $tra->edit_Vistas($_POST["nom"],$_POST["texto"],$_POST["id"]);
  exit;
}

$reg = $tra->get_Visitas_por_Id($_GET["id"]);
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
  <script type="text/javascript" language="javascript" src="js/funciones.js"></script>
  <title>Editar Comentarios</title>

</head>
<body onload="limpiar();">
  <center>
    <form name ="form" action="editarDeprecated.php" method="POST">
      <table>
        <thead>
          <tr>
            <th align="center" width="400" valign="top" colspan="2">Editar Comentario</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td valign="top" align="right">
              Su nombre
            </td>
            <td valign="top" align="left">
              <input type="text" name="nom" value="<?php echo $reg[0]["nombre_persona"] ?>" />
            </td>
          </tr>
          <tr>
            <td valign="top" align="right">
              Su mensaje
            </td>
            <td valign="top" align="left">
              <textarea name="texto" cols="35" rows="5"><?php echo $reg[0]["texto"] ?></textarea>
            </td>
          </tr>
          <tr>
            <td valign="top" align="center" width="400" colspan="2">
              <hr />
              <input type="hidden" name="grabar" value="si">
              <input type="hidden" name="id" value="<?php  echo $_GET["id"]; ?>">
              <button type="button" value="Volver" title="Volver" onclick="window.location='formularioDeprecated.php';" >Volver</button>
              &nbsp;&nbsp;||&nbsp;&nbsp;
              <button type="button" value="Editar" title="Editar" onclick="validar();" >Editar</button>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </center>
</body>
</html>
