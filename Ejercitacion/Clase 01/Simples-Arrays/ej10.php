<?php
/*Aplicación Nº 10 (Mostrar impares)
Generar una aplicación que permita cargar los primeros 10 números impares en un Array. 
Luego imprimir (utilizando la estructura for) cada uno en una línea distinta 
(recordar que el salto de línea en HTML es la etiqueta <br/>).
 Repetir la impresión de los números utilizando las estructuras while y foreach.*/
$impares = array();
echo "Primeros 10 n&uacute;meros impares con un for:<br>";
/*Cargo y muestro */
for ($i = 0; $i < 10; $i++) {
    array_push($impares, 2 * $i + 1);
    echo $impares[$i] . "<br>";
}
echo "Primeros 10 n&uacute;meros impares con un while:<br>";
$index = 0;
while( $index < count($impares) ) {
    echo $impares[$index]."<br>";
    $index++;
}
echo "Primeros 10 n&uacute;meros impares con un foreach:<br>";
foreach( $impares as $num ) {
    echo $num."<br>";
}
