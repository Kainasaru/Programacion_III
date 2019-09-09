<?php
$base = $_GET["base"];
$altura = $_GET["altura"];
$calculo = $_GET["calcular"];
$resultado = "ERROR";
if($base > 0 && $altura > 0) {
    if($calculo == "perim") {
        $resultado = "El per&iacute;metro de su rect&aacute;ngulo es: ".(2 * ($base + $altura));
    }
    else if( $calculo == "super") {
        $resultado = "La superficie de su rect&aacute;ngulo es: ". $base * $altura;
    }
}
echo $resultado;
?>