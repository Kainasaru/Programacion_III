<?php
require_once "./Vuelo.php";
$v1 = new Vuelo("Latam",10,3);
$p1 = new Pasajero("Manassali", "Leonardo",39489767,false);
$p2 = new Pasajero("Perez", "Juan",39489768,false);
$p3 = new Pasajero("Soryon", "Gabriel",39469767,false);
Vuelo::add($v1,$p1);
Vuelo::add($v1,$p2);
Vuelo::add($v1,$p3);
$v1->mostrarVuelo();
?>