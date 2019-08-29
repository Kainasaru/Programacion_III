<?php
/*Aplicación Nº 6 (Calculadora)
Escribir un programa que use la variable $operador que pueda almacenar los
 símbolos matemáticos: ‘+’, ‘-’, ‘/’ y ‘*’; y definir dos variables enteras $op1 y $op2. 
 De acuerdo al símbolo que tenga la variable $operador, deberá realizarse la operación indicada y
  mostrarse el resultado por pantalla.*/
$operador = "/";
$op1 = 5;
$op2 = 0;
$resultado = 0;
echo "Operando 1 = $op1 | Operando 2 = $op2 <br>";
if( $operador == '+' || $operador == '-' || $operador == '*' || $operador == '/' ) {
    switch($operador) {
        case "+":
        $resultado = $op1 + $op2;
        break;
        case "-":
        $resultado = $op1 - $op2;
        break;
        case "*":
        $resultado = $op1 * $op2;
        break;
        case "/":
        $resultado = ($op2 == 0)? "ERROR" : $op1 / $op2;
        break;
    }
    echo "Resultado de la operacion: $op1 $operador $op2 = $resultado.";
}
else {
    echo "Carg&oacute; un operador err&oacute;neo." ;
}
?>