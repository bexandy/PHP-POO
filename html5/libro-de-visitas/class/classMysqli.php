<?php
//*******************************************************************************
class Connect {
	public static function conn() {
		$mysqli = new mysqli("localhost", "root", "p3lk4x", "php_poo");
		if ($mysqli->connect_error) {
			die("Falló la conexión a MySQL:( " . $mysqli->connect_errno . ")" . $mysqli->connect_error);
		}
		//else {
		//	echo "Conexión Exitosa";
		//}
		$mysqli->query("SET NAMES 'utf8'");
		return $mysqli;

	}
}
//********************************************************************************
class Consulta {

	private $datos;

	function __construct() {
		$this->datos = array();
	}

	public function getDatos() {
		$mysqli = Connect::conn();
		$query = "SELECT * FROM libro_de_visitas ORDER BY id DESC";
		$resultado = $mysqli->query($query);
		while ($rows = $resultado->fetch_assoc()) {
			# code...
			$this->datos[] = $rows;
		}
		$mysqli->close();
		return $this->datos;
	}

	public function addDatos($nombre,$texto)
	{
		$mysqli = Connect::conn();
		$query = "INSERT INTO libro_de_visitas VALUES(null,'$nombre','$texto',now(),now())";
		$resultado = $mysqli->query($query);
		$mysqli->close();
		echo "<script type='text/javascript' >
		alert('Gracias por escribir en nuestro libro de visitas');
		window.location='index.php';
	</script>";
}

public function getDatosPorId($id)
{
	$mysqli = Connect::conn();
	$query = "SELECT * FROM libro_de_visitas WHERE id=$id";
	$resultado = $mysqli->query($query);
	while ($rows = $resultado->fetch_assoc()) {
		$this->datos[] = $rows;
	}
	$mysqli->close();
	return $this->datos;
}

public function editDatos($nombre,$texto,$id)
{
	$mysqli = Connect::conn();
	$query =  "UPDATE libro_de_visitas "
						."SET "
						."nombre_persona='$nombre', "
						."texto='$texto' "
						."WHERE "
						."id='$id'";
	$resultado = $mysqli->query($query);
	$mysqli->close();

	echo "<script type='text/javascript' >
	alert('El Registro se ha Modificado Correctamente');
	window.location='index.php';
</script>";
}

public function eliminarDatos($id)
{
	$mysqli = Connect::conn();
	$query = "DELETE FROM libro_de_visitas WHERE id=$id";
	$resultado = $mysqli->query($query);
	$mysqli->close();

	echo "<script type='text/javascript' >
	alert('El Registro se ha Eliminado Correctamente');
	window.location='index.php';
</script>";

}
}
?>
