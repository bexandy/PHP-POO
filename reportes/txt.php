<?php
require_once("class/class.php");
$tra = new Trabajo;
$reg = $tra->get_noticias();
$nombreArchivo="reporte_".date("h:i:s")."_".date("d-m-Y").".txt";
/*
fopen() crea un archivo en el servidor
-a- = leerá el archivo y se incorporarán los registros al final de la última línea
-r- = leer el archivo
-w- = leer el archivo y borrar su contenido, y luego reescribir los datos
*/
$txt = fopen("$nombreArchivo","w");
//validamos que exista el txt
if (!$txt) {
  echo "Error creando el txt";
  exit;
}
// insertamos registros al txt
for ($i=0; $i < sizeof($reg); $i++) {
  # code...
  # usamos @ para que no muestre warning en caso de error en tiempo de ejecucion
  #  fputs() funcion que nos permite agregar registros a nuestro txt,
  @fputs($txt,$reg[$i]["titulo"]);
  @fputs($txt,"\t");
  @fputs($txt,$reg[$i]["detalle"]);
  @fputs($txt,"\t");
  @fputs($txt,$reg[$i]["fecha"]);
  @fputs($txt,"\t");
  @fputs($txt,$reg[$i]["nombre"]);
  @fputs($txt,"\t");
  @fputs($txt,$reg[$i]["correo"]);
  @fputs($txt,"\t");
  @fputs($txt,$reg[$i]["pais"]);
  @fputs($txt,"\t");
  @fputs($txt,$reg[$i]["empresa"]);
  @fputs($txt,"\t");
  @fputs($txt,"\n");
}

// cerramos el txt
@fclose($txt);

// De aqui hacia abajo programamos que la descarga sea un archivo comprimido
require_once("class/zipfile.php");
$nombreZip="reporte_".date("h:i:s")."_".date("d-m-Y").".zip";
$zipfile = new zipfile();
$zipfile->add_file(implode("",file("$nombreArchivo")),$nombreArchivo);
header("Content-type: application/octet-stream");
header("Content-disposition: attachment; filename=$nombreZip");
echo $zipfile->file(); //cerramos la clase

?>
