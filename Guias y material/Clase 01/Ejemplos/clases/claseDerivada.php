<?php
//CLASE QUE DERIVA DE TEST E IMPLEMENTA UNA INTERFACE
class OtroTest extends Test implements IMostrable
{
	public $atributoPropio;
	public static $att;
	
	public function __construct($valor = NULL)
	{
		//INVOCO AL CONSTRUCTOR PADRE
		parent::__construct();
		
		if($valor != NULL)
			$this->atributoPropio = $valor;
		else
			$this->atributoPropio = "valor propio";
	}
	
	//POLIMORFISMO
	public function Mostrar()
	{
		//INVOCO AL METODO MOSTRAR DEL PADRE
		$mostrarPadre = parent::Mostrar();
		return $mostrarPadre." - ".$this->atributoPropio;
	}
	
	public function MostrarMensaje()
	{
		echo "<br/>Mensaje desde un m&eacute;todo de una interface.<br/>";
	}
}
//DECLARO UNA INTERFACE
interface IMostrable
{
	function MostrarMensaje();
	
}

?>