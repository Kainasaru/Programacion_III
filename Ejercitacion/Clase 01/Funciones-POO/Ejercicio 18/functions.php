<?php 
/*
Aplicación Nº 18 (Par e impar)
Crear una función llamada EsPar que reciba un valor entero como parámetro y devuelva TRUE si
 este número es par ó FALSE si es impar.
Reutilizando el código anterior, crear la función EsImpar.
*/
function esPar($num) {
    return is_integer($num) && $num % 2 == 0;
}
function esImpar($num) {
    return is_integer($num) && !esPar($num);
}
?>