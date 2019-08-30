<?php 
require_once "./Garage.php";
$gar = new Garage("Lao S.A");
$gar->mostrarGarage();
$a1 = new Auto("Fiat","black",450,"02/07/1996");
$a2 = new Auto("Fiat","black",450,"02/07/1996");
$a3 = new Auto("Ford","red",450,"02/07/1996");
$a4 = new Auto("Gen","blue",450,"02/07/1996");
$a5 = new Auto("Irish","white",450,"02/07/1996");
$gar->add($a1);
$gar->add($a2);
$gar->add($a3);
$gar->add($a4);
$gar->add($a5);
$gar->mostrarGarage();
$gar->remove($a1);
$gar->remove($a1);
$gar->mostrarGarage();
$gar->remove($a3);
$gar->remove($a3);
$gar->mostrarGarage();
?>