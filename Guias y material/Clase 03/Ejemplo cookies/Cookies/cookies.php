<?php

$valor1 = "valor_cookie_1";
$valor2 = "valor_cookie_2";
$valor3 = "valor_cookie_3";

setcookie("TestCookie1",$valor1);
setcookie("TestCookie2",$valor2,time()+15); //Expira en 15 segundos
setcookie("TestCookie3",$valor3,time()+30,"/Ejemplos/clase10/"); //Expira en 30 segundos, sólo para el dominio actual 
																		 //y dentro del subdirectorio clase10 (y sus subdirectorios)

/*
//--Arrays
setcookie("cookie[0]", "cookieUno");
setcookie("cookie[1]", "cookieDos");
setcookie("cookie[2]", "cookieTres");

setcookie("cookieAsoc[uno]", "cookieUno");
setcookie("cookieAsoc[dos]", "cookieDos");
setcookie("cookieAsoc[tres]", "cookieTres");

foreach($_COOKIE['cookie'] as $name => $value) {
	$name = htmlspecialchars($name);
	$value = htmlspecialchars($value);
	echo "$name : $value <br />";
}

foreach($_COOKIE['cookieAsoc'] as $name => $value) {
	$name = htmlspecialchars($name);
	$value = htmlspecialchars($value);
	echo "$name : $value <br />";
}

*/

?>
<a href="verificar_cookies.php" >Ir a otra p&aacute;gina</a>
<br/>
<a href="../index.html" >Volver al Inicio</a>