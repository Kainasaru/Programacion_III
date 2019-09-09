<?php

setcookie("TestCookie1", "",time()-3600);

echo "<br/>Despu&eacute;s de eliminar...<br/>";

var_dump($_COOKIE);

?>

<a href="../index.html" >Volver al Inicio</a>