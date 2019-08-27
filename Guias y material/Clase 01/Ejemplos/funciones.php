<?php
	function Saludar()
	{
		echo "Hola Mundo, desde una funci&oacute;n!!!";
	}
	
	function Saludar2($nombre)
	{
		echo "Hola ", $nombre;
	}
	
	function Saludar3($nombre, $genero = "Masculino")
	{
		$retorno = "Hola $nombre. Tu g&eacute;nero es $genero";
		return $retorno;
	}

?>