<?php
require_once "./Fabrica.php";
$op1 = new Operario(100,"Leonardo","Manassali");
$op2 = new Operario(101,"Javier","Milei");
$op3 = new Operario(102,"Diego","Giacomini");
$op4 = new Operario(103,"Guillermo","Nielsen");
$op5= new Operario(100,"Leonardo","Manassali");

$fb1 = new Fabrica("Hotellum");
$op1->setAumentarSalario(500);
$op2->setAumentarSalario(1500);
$op3->setAumentarSalario(2500);
$op4->setAumentarSalario(3500);
$op5->setAumentarSalario(4500);
$op1->setAumentarSalario(10);
$fb1->add($op1);
$fb1->add($op2);
$fb1->add($op3);
$fb1->add($op4);
$fb1->add($op5);
$fb1->mostrar();
Fabrica::mostrarCosto($fb1);
$fb1->remove($op3);
$fb1->mostrar();
Fabrica::mostrarCosto($fb1);
?>