<?php


class Trabajo
{
  private $eventos = array();

  public function getCalendario()
  {
    $mysqli = new mysqli("localhost","root","p3lk4x");
    $mysqli->query("SET NAMES 'utf8'");
    $mysqli->select_db("php_poo");
    $res = $mysqli->query("CALL listarCalendario();");
    while ($reg = $res->fetch_array()) {
      $this->eventos[]=$reg;
    }
    $mysqli->close();
    return $this->eventos;
  }

  public function insertEvento()
  {
    $mysqli = new mysqli("localhost","root","p3lk4x");
    $mysqli->query("SET NAMES 'utf8'");
    $mysqli->select_db("php_poo");
    $titulo = $_POST["titulo"];
    $des = $_POST["des"];
    $inicio = $_POST["inicio"];
    $termino = $_POST["termino"];
    $fecha = $_POST["fecha"];
    $res = $mysqli->query("CALL crearEvento('$titulo','$des','$inicio','$termino','$fecha');");
    echo "<script type='text/javascript' >
    alert('Evento creado satisfactoriamente');
    window.location='index.php';
  </script>";
}

}


?>
