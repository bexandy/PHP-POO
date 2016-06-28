<?php
require_once("class/class.php");
require_once("pdf-php/src/Cezpdf.php");

$pdf = new Cezpdf('US Letter');
// Seleccionamos la fuente
$pdf->selectFont('pdf-php/src/fonts/Helvetica.afm');

// seteamos la información del documento que se creará
$datacreator = array(
              'Title' => "Ejemplo PDF",
              'Author' => 'Bexandy Rodríguez',
              'Subject' => 'Ejemplo de PDF',
              'Creator' => 'bexandy@gmail.com',
              'Producer' => 'http://www.bexandyrodriguez.com.ve'
  );

$pdf->addInfo($datacreator);
// Traemos la data de nuestra base de datos
$tra = new Trabajo();
$reg = $tra->get_noticias();
// Cargamos la información en el array multidimensional data
for ($i=0; $i < sizeof($reg) ; $i++) {
  $data[] = array(
          "titulo"=>$reg[$i]["titulo"],
          "detalle"=>$reg[$i]["detalle"],
          "fecha"=>Conectar::invierte_fecha($reg[$i]["fecha"]),
          "nombre"=>$reg[$i]["nombre"],
          "correo"=>$reg[$i]["correo"],
          "pais"=>$reg[$i]["pais"],
          "empresa"=>$reg[$i]["empresa"]
    );
}

$titles = array(
          "titulo"=>"Titulo",
          "detalle"=>"Detalle",
          "fecha"=>"Fecha",
          "nombre"=>"Nombre Autor",
          "correo"=>"Correo Autor",
          "pais"=>"País Autor",
          "empresa"=>"Empresa Autor"
    );

$options = array(
          "shadeCol"=>array(0.9,0.9,0.9), //Color de las celdas
          "xOrientation"=>"center", //El reporte aparece centrado
          "width"=>700 //Ancho de la tabla
  );

// Ponemos un título
$pdf->ezText("<b>Noticias de la Web</b>\n",16);

// Creamos la tabla dentro del PDF
$pdf->ezTable($data,$titles,'',$options);

// Mostramos el PDF
$pdf->ezStream();
 ?>
