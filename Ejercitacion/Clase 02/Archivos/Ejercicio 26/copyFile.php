<?php 
$path = $_POST["file"];
date_default_timezone_set("America/Argentina/Buenos_Aires");
$fileName = date("Y")."_".date("m")."_".date("d")."_".date("H")."_".date("i")."_".date("s").".txt";
if( !copy($path,"./misArchivos/$fileName") ) {
    echo "Error al copiar el archivo. Verifique la url";
}
else {
    echo "Copia exitosa!";
}
?>