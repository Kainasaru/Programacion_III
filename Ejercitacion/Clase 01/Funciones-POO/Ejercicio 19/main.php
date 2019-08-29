<?php
require_once "./Rectangulo.php";
require_once "./Triangulo.php";

$rec = new Rectangulo(10,5,"black");
echo $rec->dibujar();
echo $rec->toString();
$tr = new Triangulo(5,3,"black");
$tr2 = new Triangulo(30,20,"black");
echo $tr2->toString();
echo $tr->toString();
?>