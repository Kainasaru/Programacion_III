<?php
/*Aplicación Nº 14 (Arrays de Arrays)
Realizar las líneas de código necesarias para generar un Array asociativo y otro indexado que contengan como
 elementos tres Arrays del punto anterior cada uno. Crear, cargar y mostrar los Arrays de Arrays.*/

 //Declaro
$arrayAsociativo = array();
$arrayIndexado = array();
$array1 = array();
$array2 = array();
$array3 = array();

//Cargo
array_push($array1,"Perro", "Gato", "Ratón", "Araña", "Mosca");
array_push($array2,"1986", "1996", "2015", "78", "86");
array_push($array3,"php", "mysql", "html5", "typescript", "ajax");
array_push($arrayIndexado,$array1,$array2,$array3);
$arrayAsociativo["Array1"] = $array1;
$arrayAsociativo["Array2"] = $array2;
$arrayAsociativo["Array3"] = $array3;

//Muestro:
echo "Array asociativo: <br>";
foreach($arrayAsociativo as $key => $array) {
    echo "$key: <br>";
    foreach($array as $item) {
        echo $item , "<br>";
    }
}
echo "Array indexado: <br>";
var_dump($arrayIndexado);
?>