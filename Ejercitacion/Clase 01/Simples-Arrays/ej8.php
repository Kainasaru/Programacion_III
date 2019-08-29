<?php
/*Aplicación Nº 8 (Números en letras)
Realizar un programa que en base al valor numérico de la variable $num, pueda mostrarse por pantalla,
 el nombre del número que tenga dentro escrito con palabras, para los números entre el 20 y el 60.*/

 $num = strval(rand(20,60));
 $letras = "";

 define("N_1","uno");
 define("N_2_A","dos");
 define("N_2_B","dós");
 define("N_3_A","tres");
 define("N_3_B","trés");
 define("N_4","cuatro");
 define("N_5","cinco");
 define("N_6_A","seis");
 define("N_6_B","séis");
 define("N_7","siete");
 define("N_8","ocho");
 define("N_9","nueve");
 define("N_20","veinte");
 define("N_20_CON","veinti");
 define("N_30","treinta");
 define("N_40","cuarenta");
 define("N_50","cincuenta");
 define("N_60","sesenta");

switch($num[0]) {
    case "2": //Si es 20 -> veinte si es 21...29 -> veinti 
    if($num == "20") {
        $letras = N_20;
    }
    else {
        $letras = N_20_CON;
    }
    break;
    case "3":
    $letras = N_30;
    break;
    case "4":
    $letras = N_40;
    break;
    case "5":
    $letras = N_50;
    break;
    case "6":
    $letras = N_60;
    break;
}

if( intval($num) % 10 != 0) { //Si el numero es un multiplo de 10 no hace falta modificar la cadena.
    $letras .= ($num[0] == "2" )? "" : " y "; //Si el numero es mayor que 29 agrego el Y.
    if($num[0] == "2" && $num[1] == "2") {
        $letras .= N_2_B;
    }
    else if( $num[0] == "2" && $num[1] == "3") {
        $letras .= N_3_B;
    }
    else if( $num[0] ==  "2" && $num[1] == "6") {
        $letras .= N_6_B;
    }
    else if( $num[1] == "1") {
        $letras .= N_1;
    }
    else if( $num[1] == "2") {
        $letras .= N_2_A;
    }
    else if( $num[1] == "3") {
        $letras .= N_3_A;
    }
    else if( $num[1] == "4") {
        $letras .= N_4;
    }
    else if( $num[1] == "5") {
        $letras .= N_5;
    }
    else if( $num[1] == "6") {
        $letras .= N_6_A;
    }
    else if( $num[1] == "7") {
        $letras .= N_7;
    }
    else if( $num[1] == "8") {
        $letras .= N_8;
    }
    else if( $num[1] == "9") {
        $letras .= N_9;
    }
}
echo "Numero: $num - Escritura: $letras.";





