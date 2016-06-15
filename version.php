<?php
class Valores {
	protected $valor1;
	protected $valor2;
	protected $resultado;

	protected function cargar1($v1) {
		$this->valor1 = $v1;

	}

	protected function cargar2($v2) {
		$this->valor2 = $v2;
	}
	public function imprimir() {
		return $this->resultado;
	}
}

/************************************************
 *
 */
class Sumar extends Valores {

	function __construct($v1, $v2) {
		$this->cargar1($v1);
		$this->cargar2($v2);
		$this->resultado = $this->valor1 + $this->valor2;

	}
	public function imprimir() {
		echo "La suma de $this->valor1 + $this->valor2 es:";
		echo parent::imprimir();
	}
	public function imprimirPadre() {
		return parent::imprimir();
	}
}
//*************************************************

$suma = new Sumar(15, 20);
$suma->imprimir();
echo "<br>";
echo "el metodo del papá es: ";
echo $suma->imprimirPadre();
?>
