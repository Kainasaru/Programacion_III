<?php
require_once "./Rectangulo.php";

$rec = new Rectangulo2( new Punto(5,2) , new Punto(20,8) );
echo $rec->toString();
echo "<br>";
echo $rec->dibujar();
?>