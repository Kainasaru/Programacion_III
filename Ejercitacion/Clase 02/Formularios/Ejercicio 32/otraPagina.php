<?php
$base = $_GET["base"];
$altura = $_GET["altura"];
$calculo = $_GET["calcular"];
$resultado = "ERROR<br/>";
if($base > 0 && $altura > 0) {
    if($calculo == "perim") {
        $resultado = "El per&iacute;metro de su rect&aacute;ngulo es: ".(2 * ($base + $altura))."<br>";
    }
    else {
        $resultado = "La superficie de su rect&aacute;ngulo es: ". $base * $altura."<br>";
    }
}
echo $resultado;
echo "<a href='./index.php'>Volver</a>";

?>