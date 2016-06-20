<?php
//Clase Para ejecutar operaciones básicas sobre BDD utlizando conector Mysql
//(Deprecated en PHP 5.6 y Eliminado en PHP 7.0)

//Clase Conectar(); de Conexión a la BDD configurando SET NAMES='utf8' para trabajar con eñes y acentos
class Conectar {

	public static function con() {
		$conexion = mysql_connect("localhost", "root", "p3lk4x");
		mysql_query("SET NAMES 'utf8'");
		mysql_select_db("php_poo");
		return $conexion;
	}
}
//*******************************************
// Clase Trabajo(); utilizada para manejar las operaciones básicas en la BDD (CRUD)
//
class Trabajo {
	//variable dónde se almacenarán los datos obtenidos de la BDD
	private $visitas;

// Método constructor de la clase, define la variable $visitas como un arreglo
	public function __construct() {
		$this->visitas = array();
	}

// Método de Consulta a la BDD, devuelve todos los registros de la tabla en un arreglo asociativo
	public function get_Visitas() {

		$sql = "select * from libro_de_visitas order by id desc";

		$res = mysql_query($sql, Conectar::con());

		while ($reg = mysql_fetch_assoc($res)) {
			$this->visitas[] = $reg;
		}
		return $this->visitas;
	}

// Método que añade un registro a la BDD, recibe como párametros campos de la tabla,
//  muestra un mensaje con javascript alert() y redirecciona a la página señalada en window.location
	public function add_Visitas($nom,$texto)
	{
		$sql = "insert into libro_de_visitas VALUES(null,'$nom','$texto',now(),now())";
		$res = mysql_query($sql,Conectar::con());
		echo "<script type='text/javascript' >
		alert('Gracias por escribir en nuestro libro de visitas');
		window.location='index.php';
	</script>";
}

// Método utilizado para editar registros, selecciona el registro con el $id indicado
//  devuelve un arreglo asociativo con un solo registro
public function get_Visitas_por_Id($id) {

	$sql = "select * from libro_de_visitas where id=$id";

	$res = mysql_query($sql, Conectar::con());

	while ($reg = mysql_fetch_assoc($res)) {
		$this->visitas[] = $reg;
	}
	return $this->visitas;
}

// Método utilizado para editar registros, actualiza los campos indicados como párametros
// en el registro con el $id, muestra un mensaje con javascript alert() y redirecciona
// con javascript window.location
public function edit_Vistas($nom,$texto,$id)
{
	$sql = "update libro_de_visitas "
	."set "
	."nombre_persona='$nom', "
	."texto='$texto' "
	."where "
	."id='$id'";

	$res = mysql_query($sql,Conectar::con());

	echo "<script type='text/javascript' >
	alert('Registro Modificado Correctamente');
	window.location='index.php';
</script>";
}

// Método utilizado para eliminar el registro con el $id, muestra mensaje y redirecciona
public function eliminar_Visitas($id)	{

	$sql = "delete from libro_de_visitas where id=$id";
	$res = mysql_query($sql,Conectar::con());
	echo "<script type='text/javascript' >
	alert('Registro Eliminado Correctamente');
	window.location='index.php';
</script>";
}
}
?>
