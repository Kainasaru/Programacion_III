<?php 
$path = $_POST["file"];
$fileName = "";
$text = "";
$arch = false;

if( ($arch = fopen($path,"r")) !== false ) {
    $text = fread($arch, filesize($path));
    fclose($arch);
    $text = strrev($text);
    date_default_timezone_set("America/Argentina/Buenos_Aires");
    $fileName = date("Y")."_".date("m")."_".date("d")."_".date("H")."_".date("i")."_".date("s").".txt";
    $arch = fopen("./misArchivos/$fileName","w");
    fwrite($arch,$text);
    fclose($arch);
    echo "Proceso correcto.<br>";
}
else {
    echo "Se produjo un error.<br>";
}