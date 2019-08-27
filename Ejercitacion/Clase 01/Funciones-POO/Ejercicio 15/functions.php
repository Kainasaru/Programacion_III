<?php 
/*Aplicación Nº 15 (Potencias de números)
Mostrar por pantalla las primeras 4 potencias de los números del uno 1 al 4 
(hacer una función que las calcule invocando la función pow).*/
function CalcularPotencias1A4() {
    for($base = 1 ; $base <= 4 ; $base++) {
        for($exponente = 1 ; $exponente <= 4 ; $exponente++) {
            echo "$base ^ $exponente = ".pow($base,$exponente)."<br>";
        }
    }
}
?>