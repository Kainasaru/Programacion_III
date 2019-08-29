<?php
/*Aplicación Nº 9 (Carga aleatoria)
Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la función rand).
 Mediante una estructura condicional, determinar si el promedio de los números son mayores, menores o iguales que 6.
  Mostrar un mensaje por pantalla informando el resultado.*/

$arrayNumerico = array();
$promedio = 0;
echo "Numeros asignados:<br>";
for( $i = 0 ; $i < 5 ; $i++) {
    array_push($arrayNumerico,rand(0,10));
    echo $arrayNumerico[$i]."<br>";
}
$promedio = array_sum($arrayNumerico) / count($arrayNumerico);
if($promedio > 6) {
    echo "El promedio es mayor que 6.";
} 
else if($promedio == 6) {
    echo "El promedio es igual a 6.";
}
else {
    echo "El promedio es menor que 6.";
}


?>