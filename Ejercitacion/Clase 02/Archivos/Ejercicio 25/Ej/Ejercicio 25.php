<?php
/*Aplicación Nº 25 (Contar letras)
Se quiere realizar una aplicación que lea un archivo (../misArchivos/palabras.txt) y
ofrezca estadísticas sobre cuantas palabras de 1, 2, 3, 4 y más de 4 letras hay en el texto. 
No tener en cuenta los espacios en blanco ni saltos de líneas como palabras.
Los resultados mostrarlos en una tabla.*/
$texto = "una palabra\r\ndos palabras.";
$arch = fopen("../misArchivos/palabras.txt","r");
if($arch != null ) {
    $texto = fread($arch,filesize($arch));
    str_ireplace($texto,"\r\n"," ");
    str_ireplace($texto,"\n"," ");
    str_ireplace($texto,"."," ");
    str_ireplace($texto,":"," ");
    str_ireplace($texto,";"," ");
    str_ireplace($texto,","," ");
    $array = str_word_count($texto,1,"àèìòùáéíóúñ¿");
    $array = array_count_values($array);
    f
}
?>