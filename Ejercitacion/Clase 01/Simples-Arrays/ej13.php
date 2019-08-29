<?php
/*Aplicación Nº 13 (Arrays asociativos II)
Cargar los tres arrays con los siguientes valores y luego ‘juntarlos’ en uno. Luego mostrarlo por pantalla.
"Perro", "Gato", "Ratón", "Araña", "Mosca"
"1986", "1996", "2015", "78", "86"
"php", "mysql", "html5", "typescript", "ajax"
Para cargar los arrays utilizar la función array_push. Para juntarlos, utilizar la función array_merge.*/

$array1 = array();
$array2 = array();
$array3 = array();
$arrayFinal = array();

array_push($array1,"Perro", "Gato", "Ratón", "Araña", "Mosca");
array_push($array2,"1986", "1996", "2015", "78", "86");
array_push($array3,"php", "mysql", "html5", "typescript", "ajax");
$arrayFinal = array_merge($array1,$array2,$array3);
var_dump($arrayFinal);

?>