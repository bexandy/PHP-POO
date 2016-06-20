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
	private $post = array();
	private $comentarios = array();
	private $ultimos_posts = array();

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

	public function get_post_por_id()
	{
		$sql = "select * from noticias where id_noticia=".$_GET["id"];
		$res = mysql_query($sql,Conectar::con());
		if ($reg=mysql_fetch_array($res)) {
			$this->post[] = $reg;
		}
		return $this->post;
	}

	public function insertar_comentarios()
	{

		$sql = "insert into comentarios values (null,'".strip_tags($_POST["nom"])."','".strip_tags($_POST["correo"])."','".strip_tags($_POST["web"])."','".strip_tags($_POST["mensaje"])."',now(),'".strip_tags($_POST["id_noticia"])."')";

		$res = mysql_query($sql,Conectar::con());
		echo "
		<script type='text/javascript'>
			alert('El comentario ha sido ingresado correctamente. Gracias por escribir a mi web');
			window.location='".$_POST["url"]."';
		</script>";
	}

	public function get_comentarios($id)
	{
		$sql = "select * from comentarios where id_noticia=$id order by id_comentario desc";
		$res = mysql_query($sql,Conectar::con());

		while ($reg = mysql_fetch_assoc($res)) {
			$this->comentarios[] = $reg;
		}
		return $this->comentarios;
	}

public function get_ultimos_5_posts()
{
	$sql = "select * from noticias order by id_noticia desc limit 5";
	$res = mysql_query($sql,Conectar::con());
	while ($reg = mysql_fetch_assoc($res)) {
		$this->ultimos_posts[]=$reg;
	}
	return $this->ultimos_posts;
}

}
?>
