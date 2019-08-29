<?php
/*Aplicación Nº 5 (Obtener el valor del medio)
Dadas tres variables numéricas de tipo entero $a, $b y $c, realizar una aplicación que muestre el contenido 
de aquella variable que contenga el valor que se encuentre en el medio de las tres variables.
 De no existir dicho valor, mostrar un mensaje que indique lo sucedido.
Ejemplo 1: $a = 6; $b = 9; $c = 8; => se muestra 8.
Ejemplo 2: $a = 5; $b = 1; $c = 5; => se muestra un mensaje “No hay valor del medio”*/

$a = rand(0,10);
$b = rand(0,10);
$c = rand(0,10);
$numeros = array($a,$b,$c);
echo "Valores obtenidos: $a - $b - $c <br>"; 
sort($numeros); //Ordeno para que el valor medio quede en el centro.
if( count(array_count_values($numeros)) == 3 ) { //Si count_values construye un array menor a length 3 es que hay nums repetidos
    echo "El valor medio es ".$numeros[1];
} 
else {
    echo "No hay valor medio.";
}


?>