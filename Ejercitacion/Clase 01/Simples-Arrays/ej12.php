<?php
/*Aplicación Nº 12 (Arrays asociativos)
Realizar las líneas de código necesarias para generar un Array asociativo $lapicera,
 que contenga como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’. Crear, cargar y mostrar tres lapiceras.*/
$lapicera1 = array("color"=>"negro","marca" => "Maped" , "trazo" => "fino", "precio" => 40);
$lapicera2 = array("color"=>"blanco","marca" => "Vic" , "trazo" => "grueso", "precio" => 60);
$lapicera3 = array("color"=>"azul","marca" => "Colorped" , "trazo" => "gigantesco", "precio" => 50);

echo "Lapicera 1:<br>";
foreach( $lapicera1 as $key => $item) {
    echo ($key != "precio")? "$key : $item <br>" : "$key : \$$item <br>";
}
echo "Lapicera 2:<br>";
foreach( $lapicera2 as $key => $item) {
    echo ($key != "precio")? "$key : $item <br>" : "$key : \$$item <br>";
}
echo "Lapicera 3: <br>";
foreach( $lapicera3 as $key => $item) {
    echo ($key != "precio")? "$key : $item <br>" : "$key : \$$item <br>";
}
?>