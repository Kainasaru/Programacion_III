<?php 
/*Aplicación Nº 4 (Sumar números) Confeccionar un programa que sume todos los números enteros desde 1 mientras la
 suma no supere a 1000. Mostrar los números sumados y al finalizar el proceso indicar cuantos números se sumaron.*/
$numerosSumados = 0;
$sumaAcumulada = 0;
for($sumando = 1 ; $sumaAcumulada + $sumando <= 1000 ; $sumando++)  {
    echo "Se sum&oacute;: $sumaAcumulada + $sumando = ";
    $sumaAcumulada += $sumando;
    $numerosSumados = $sumando;
    echo $sumaAcumulada."<br>";
}
echo "Total de numeros enteros sumados: $numerosSumados";
?>