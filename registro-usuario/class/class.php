<?php
session_start();
/**
*
*/
class Conectar
{

  public static function con() {
    $conexion = mysql_connect("localhost", "root", "p3lk4x");
    mysql_query("SET NAMES 'utf8'");
    mysql_select_db("php_poo");
    return $conexion;
  }
}

/**
*
*/
class Trabajo
{
  private $nombre=array();

// Funcion para que el usuario se loguee
  function logueo()
  {
    $user=$_POST["user"];
    $pass_js=$_POST["pass"];
    $pass_php=md5($_POST["pass"]);

  //echo "user=$user<br>pass_js=$pass_js<br>pass_php=$pass_php";
    $sql = "select * from usuarios where user='$user' and pass_js='$pass_js' and pass_php='$pass_php'";
    $res = mysql_query($sql,Conectar::con());
    if (mysql_num_rows($res)== 0) {
      //echo "los datos ingresados no existen en la base de datos";
      echo "<script type='text/javascript'>
      alert('los datos ingresados no existen en la base de datos');
      window.location='index.php';
    </script>";
  } else {
      //echo "si existen";
    if ($reg=mysql_fetch_array($res)) {
      $_SESSION["session_reg_usuario"]=$reg["id_usuario"];
      header("Location:home.php");
    }
  }
}

//Metodo para obtener e nombre del usuario logueado

public function saluda_al_usuario($id_usuario)
{
  $sql = "select nombre from usuarios where id_usuario=$id_usuario";
  $res = mysql_query($sql,Conectar::con());
  while ($reg=mysql_fetch_assoc($res)) {
    $this->nombre[]=$reg;
  }
  return $this->nombre;
}

}

?>
