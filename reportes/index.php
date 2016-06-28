<?php
require_once("class/class.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Generar excel dinámico con php y mysql</title>
  <link rel="stylesheet" href="">
</head>
<body>
  <?php
  $tra = new Trabajo;
  $reg = $tra->get_noticias();
  ?>
  <table align="center">
    <tr>
      <td align="center" colspan="7">
        <h2>Noticias de la web</h2>
      </td>
    </tr>

    <tr style="background-color: #666666; color: #ffffff; font-weight: bold; font-size: 12px;">
      <td align="center">
        Título
      </td>
      <td align="center">
        Detalle
      </td>
      <td align="center">
        Fecha
      </td>
      <td align="center">
        Nombre Autor
      </td>
      <td align="center">
        Correo Autor
      </td>
      <td align="center">
        País Autor
      </td>
      <td align="center">
        Empresa Autor
      </td>
    </tr>

    <?php
    for ($i=0; $i < sizeof($reg); $i++) {

     ?>
     <tr style="background-color: #f0f0f0; font-size: 12px;">
      <td align="center">
        <?php echo $reg[$i]["titulo"]; ?>
      </td>
      <td align="center">
      <div align="justify" style="margin: 10px 10px;">
          <?php echo $reg[$i]["detalle"]; ?>
        </div>
      </td>
      <td align="center">
        <?php echo Conectar::invierte_fecha($reg[$i]["fecha"]); ?>
      </td>
      <td align="center">
        <?php echo $reg[$i]["nombre"]; ?>
      </td>
      <td align="center">
        <?php echo $reg[$i]["correo"]; ?>
      </td>
      <td align="center">
        <?php echo $reg[$i]["pais"]; ?>
      </td>
      <td align="center">
        <?php echo $reg[$i]["empresa"]; ?>
      </td>
    </tr>
    <?php
  }
  ?>
  <tr>
    <td align="center" colspan="7">
      <hr>
      <button type="button" value="Exportar a Excel" title="Exportar a Excel" onclick="window.location='excel.php';">Exportar a Excel</button>
      &nbsp;&nbsp;||&nbsp;&nbsp;
      <button type="button" value="Exportar a TXT" title="Exportar a TXT" onclick="window.location='txt.php';">Exportar a TXT</button>
      &nbsp;&nbsp;||&nbsp;&nbsp;
      <button type="button" value="Exportar a PDF" title="Exportar a PDF" onclick="window.location='pdf.php';">ExportarPDF</button>
      &nbsp;&nbsp;||&nbsp;&nbsp;
      <button type="button" value="Ejemplo de PDF con HTML" title="Ejemplo de PDF con HTML" onclick="window.location='pdf_html.php';">Ejemplo de PDF con HTML</button>
    </td>
  </tr>
</table>
</body>
</html>
