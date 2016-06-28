<?php

class Conectar {

  public static function con() {
    $conexion = mysql_connect("localhost", "root", "p3lk4x");
    mysql_query("SET NAMES 'utf8'");
    mysql_select_db("php_poo");
    return $conexion;
  }
}
 ?>
