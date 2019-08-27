<?php 
/*Aplicación Nº 16 (Invertir palabra)
Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden de las letras del Array.
Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.*/

function StringReverse($str) {
    return implode( "", array_reverse( str_split($str))  );
}
 ?>