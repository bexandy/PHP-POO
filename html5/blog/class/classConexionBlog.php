<?php
//Clase Para ejecutar operaciones básicas sobre BDD utlizando conector Mysql
//(Deprecated en PHP 5.6 y Eliminado en PHP 7.0)

//Clase Conectar(); de Conexión a la BDD configurando SET NAMES='utf8' para trabajar con eñes y acentos
session_start();

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
}
//*******************************************
// Clase BlogBDD(); utilizada para manejar las operaciones básicas en la BDD (CRUD)
//
class BlogBDD {
	//variable dónde se almacenarán los datos obtenidos de la BDD
	private $cat = array();

	private $noticias = array();

// Método de Consulta a la BDD, devuelve todos los registros de la tabla en un arreglo asociativo
	public function get_categorias() {

		$sql = "select * from categorias order by categoria asc";

		$res = mysql_query($sql, Conectar::con());

		while ($reg = mysql_fetch_assoc($res)) {
			$this->cat[] = $reg;
		}
		return $this->cat;
	}

	public function get_paginacion_noticias($inicio,$c)
	{
		//$sql = "select * from noticias noticias order by id_noticia desc limit $inicio,5";
		$sql = "select * from noticias where id_categoria=$c order by id_noticia desc limit $inicio,5";

		$res = mysql_query($sql,Conectar::con());

		while ($reg = mysql_fetch_assoc($res)) {
			$this->noticias[]=$reg;
		}

		return $this->noticias;
	}

public function total_comentarios($id_noticia)
{
	$sql = "select count(*) as cuantos from comentarios where id_noticia=$id_noticia";
	$res = mysql_query($sql,Conectar::con());
	if ($reg=mysql_fetch_array($res)) {
		$total = $reg["cuantos"];
	}
	return $total;
}

}
?>
