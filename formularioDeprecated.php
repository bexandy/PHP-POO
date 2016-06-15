<?php
require_once "class/classMysqlDeprecated.php";
?>

<!DOCTYPE html >
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
  <script type="text/javascript" language="javascript" src="js/funciones.js"></script>
  <title>Insertar registros con PHP POO</title>
</head>
<body onload="limpiar();">

  <center>
    <form name ="form" action="ingresarDeprecated.php" method="POST">
      <table>
        <thead>
          <tr>
            <th align="center" width="400" valign="top" colspan="2">Ingrese su comentario</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td valign="top" align="right">
              Su nombre
            </td>
            <td valign="top" align="left">
              <input type="text" name="nom" />
            </td>
          </tr>
          <tr>
            <td valign="top" align="right">
              Su mensaje
            </td>
            <td valign="top" align="left">
              <textarea name="texto" cols="35" rows="5"></textarea>
            </td>
          </tr>
          <tr>
            <td valign="top" align="center" width="400" colspan="2">
              <hr />
              <button type="button" value="Escribir" onclick="validar();" >Escribir</button>
              <!--<input type="submit" value="Escribir" title="Escribir" onclick="validar();" /> -->
            </td>
          </tr>
        </tbody>
      </table>
    </form>

    <table align="center" width="700">
      <tr>
        <td colspan="6" valign="top" align="center" width="700" >
          <hr />
        </td>
      </tr>

      <tr style="background-color: #666666 ; color: #ffffff; font-weight: bold;">
        <td align="right" valign="top" width="150">
          Nombre
        </td>
        <div align="justify">
          <td align="center" valign="top" width="350">
            Texto
          </td>
        </div>
        <td align="center" valign="top" width="50">
          Fecha
        </td>
        <td align="center" valign="top" width="50">
          Hora
        </td>
        <td align="center" valign="top" width="50">

        </td>
        <td align="center" valign="top" width="50">

        </td>
      </tr>

      <?php
      $tra = new Trabajo;
      $reg = $tra->get_Visitas();
      for ($i = 0; $i < count($reg); $i++) {
       ?>
       <tr id="<?php echo "tr_$i"; ?>" style="background-color: #f0f0f0;" onMouseMove=tr('<?php echo "tr_$i"; ?>','#CCCCCC'); onMouseOut=tr('<?php echo "tr_$i"; ?>','#F0F0F0');>
        <td align="right" valign="top" width="150">
          <?php echo $reg[$i]["nombre_persona"]; ?>
        </td>
        <div align="justify">
          <td align="center" valign="top" width="350">
            <?php echo $reg[$i]["texto"]; ?>
          </td>
        </div>
        <td align="center" valign="top" width="50">
          <?php echo $reg[$i]["fecha"]; ?>
        </td>
        <td align="center" valign="top" width="50">
          <?php echo $reg[$i]["hora"]; ?>
        </td>
        <td align="center" valign="top" width="50">
        <a href="javascript:void(0);" onclick="window.location='editarDeprecated.php?id=<?php echo $reg[$i]["id"]?>';"><img src="images/linedpaperpencil32.png" border="0"; alt="editar" title="Editar Comentario"></a>
        </td>
        <td align="center" valign="top" width="50">
          <a href="javascript:void(0);" onclick="eliminar('eliminarDeprecated.php?id=<?php echo $reg[$i]["id"] ?>');" ><img src="images/linedpaperminus32.png" border="0" alt="eliminar" title="Eliminar Comentario"></a>
        </td>
      </tr>
      <?php
    }
    ?>
  </table>
</center>
</body>
</html>
