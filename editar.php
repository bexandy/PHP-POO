<?php
require_once("class/classMysqli.php");
$consulta = new Consulta;

if (isset($_POST["grabar"]) and $_POST["grabar"]=="si") {
  $consulta->editDatos($_POST["nom"],$_POST["texto"],$_POST["id"]);
  exit;
}

$reg = $consulta->getDatosPorId($_GET["id"]);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="author"  content="Bexandy Rodríguez">
  <meta name="description" content="Blog Personal realizado con PHP">
  <meta name="keywords" content="Blog Personal,PHP,Programación Orientada a Objetos">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script type="text/javascript" language="javascript" src="js/funciones.js"></script>
  <title>Editar Comentarios</title>

</head>
<body onload="limpiar();">
  <center>
    <form name ="form" action="editar.php" method="POST">
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
              <button type="button" value="Volver" title="Volver" onclick="window.location='formulario.php';" >Volver</button>
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
