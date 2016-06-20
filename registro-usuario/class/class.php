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
    $sql = "select * from usuarios where user='$user' and pass_js='$pass_js' and pass_php='$pass_php' and estado='activo'";
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

//Método para Registro de Usuarios

public function registro()
{
  $user=$_POST["login"];
  $pass_js=$_POST["pass"];
  $pass_php=md5($_POST["pass"]);
  $nom=$_POST["nom"];

  $sql = "select * from usuarios where user='$user'";
  $res = mysql_query($sql,Conectar::con());
  if (mysql_num_rows($res)==0) {
    //echo "El User no existe por lo tanto sigo";
    $query="insert into usuarios values (null,'".$_POST["nom"]."','".$_POST["correo"]."','$user','$pass_js','$pass_php',now(),'no_activo');";
    //echo $query;
    $resp=mysql_query($query,Conectar::con());
    //
    $fecha=date("d-m-Y");
    $hora=date("H:m:s");

    $correo= $_POST["correo"];
    $remitente="Remitente <info@bexandy.16mb.com>";
    $asunto="Confirme su Registro";

    $cuerpo="
    <div align='left'>
      Estimado(a) $nom gracias por registrarse con nosotros
      <br>
      <br>
      Por favor haga click en el siguiente link para terminar y confirmar su registro:
      <br>
      <br>
      <a href='http://www.bexandy.16mb.com/verificacion.php?token=".mysql_insert_id()."&f=$fecha&h=$hora' >http://www.bexandy.16mb.com/verificacion.php?token=".mysql_insert_id()."&f=$fecha&h=$hora</a>
      <br>
      <br>
      Si lo prefiere tome el link y péguelo en la barra de direcciones de su navegador favorito
      <br>
      <br>
      Gracias por registrarse en www.bexandy.16mb.com
    </div>
    ";
      $sheader="From:".$remitente."\nReply-To:".$remitente."\n";
      $sheader=$sheader."X-Mailer:PHP/".phpversion()."\n";
      $sheader=$sheader."Mime-Version: 1.0\n";
      $sheader=$sheader."Content-Type: text/html";

      mail($correo,$asunto,$cuerpo,$sheader);
      header("Location: index.php");

  } else {
    echo "El Login $user ya está siendo usado por otro usuario<br>";
    ?>
    <button type="button" value="Volver" title="Volver" onclick="window.location='registro.php';">Volver</button>
    <?php
  }
}

public function verificacion()
{
  //print_r($_GET);
  $sql="select id_usuario from usuarios where id_usuario=".$_GET["token"]." and estado='no_activo'";
  $res=mysql_query($sql,Conectar::con());
  if (mysql_num_rows($res)==0) {
    header("Location: index.php");
  } else {
    $query="update usuarios set estado='activo' where id_usuario=".$_GET["token"];
    $res=mysql_query($query,Conectar::con());
    $_SESSION["session_reg_usuario"]=$_GET["token"];
    //header("Location:home.php");
    echo "<script type='text/javascript' >
    alert('Usted se ha registrado correctamente');
    window.location='home.php';
    </script>";
  }

}

}

?>
