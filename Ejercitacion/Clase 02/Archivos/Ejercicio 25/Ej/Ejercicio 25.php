<?php
/*Aplicación Nº 25 (Contar letras)
Se quiere realizar una aplicación que lea un archivo (../misArchivos/palabras.txt) y
ofrezca estadísticas sobre cuantas palabras de 1, 2, 3, 4 y más de 4 letras hay en el texto. 
No tener en cuenta los espacios en blanco ni saltos de líneas como palabras.
Los resultados mostrarlos en una tabla.*/
$arch = fopen("../misArchivos/palabras.txt","r");
$statistics = array();
$texto = fread($arch,filesize("../misArchivos/palabras.txt"));
$texto = str_replace("?"," ",$texto);
$texto = str_replace("¿"," ",$texto);
$texto = mb_convert_encoding($texto,"ASCII");
$array = str_word_count($texto,1,"?");
if($arch != null ) {
    fclose($arch);
    for($i = 0 ; $i < count($array) ; $i++) {
        $statistics[strlen($array[$i])] = isset( $statistics[strlen($array[$i])] )?
         $statistics[strlen($array[$i])]+1 : 1;
    } //A medida que van cayendo las length voy sumando.
    foreach($statistics as $len => $frequency) {
        echo "Hay $frequency palabras de $len caracteres.<br>";
    }
}
?>