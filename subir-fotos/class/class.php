<?php
session_start();

require_once "resize.php";

class Conectar {

  public static function con() {
    $conexion = mysql_connect("localhost", "root", "p3lk4x");
    mysql_query("SET NAMES 'utf8'");
    mysql_select_db("php_poo");
    return $conexion;
  }

  public static function corta_palabra($palabra,$num)
  {
    $largo = strlen($palabra);
    $cadena = substr($palabra,0,$num);
    return $cadena;
  }

  public static function invierte_fecha($fecha) {
    $dia = substr($fecha, 8, 2);
    $mes = substr($fecha, 5, 2);
    $anio = substr($fecha, 0, 4);
    $correcta = $dia . "-" . $mes . "-" . $anio;
    return $correcta;
  }

}

class Trabajo
{

  public function insert_usuario()
  {
    // primero le damos tratamiento a la imagen

    // subimos la foto al servidor
    copy($_FILES["foto"]["tmp_name"],"fotos/".$_FILES["foto"]["name"]);

    // creamos una instancia de la clase thumbnail y le pasamos como parámetro el nombre que le dimos a la foto en el FTP
    print_r($_FILES);
    $thumb=new thumbnail("fotos/".$_FILES["foto"]["name"]);
    $thumb->size_width(100);    // setea el ancho de la copia
    $thumb->size_height(300);   // setea el alto de la copia
    $thumb->jpeg_quality(75);   // setea la calidad jpg
    $nom = $_POST["login"].".jpg";
    $thumb->save("fotos/$nom"); // guardarla en el servidor
   $thumb->show();             // mostrar la imagen copiada

  }
}

?>
