<?php
require "./Numero.php";
require "./function.php";
$num = new Numero($_POST["num"]);
$tabla = "<table border='1'><thead><th>Item</th><th>Valor</th><thead><tbody>";
$tabla .= "<tr><td>N&uacute;mero</td><td>".$num->get()."</td></tr>";
$tabla .= "<tr><td>Cantidad de cifras</td><td>".$num->getCantCifras()."</td></tr>";
$tabla .= "<tr><td>Suma de las cifras impares</td><td>".$num->getSumaCifrasImpares()."</td></tr>";
$tabla .= "<tr><td>Suma de las cifras pares</td><td>".$num->getSumaCifrasPares()."</td></tr>";
$tabla .= "<tr><td>Suma de todas las cifras</td><td>".$num->getSumaCifras()."</td></tr>";
$tabla .= "<tr><td>Divisores</td><td>".agregarComas($num->getDivisores(),6)."</td></tr>";
$tabla .= "</tbody></table>";
echo $tabla;