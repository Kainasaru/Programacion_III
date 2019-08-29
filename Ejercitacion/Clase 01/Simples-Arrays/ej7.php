<?php
/*Aplicación Nº 7 (Mostrar fecha y estación)
Obtenga la fecha actual del servidor (función date) y luego imprímala dentro de la página con distintos formatos 
(seleccione los formatos que más le guste). Además indicar que estación del año es. Utilizar una estructura selectiva
 múltiple.*/
$mes = date("m");
$dia = intval(date("d"));

/* Jugando con los formatos */
echo date("d \d\\e M \d\\e Y h:m:s")."<br>";
echo date("d\\\m\\\Y - h:m:s")."<br>";
echo date(DATE_ATOM)."<br>";
echo date(DATE_RFC3339_EXTENDED)."<br>";
echo date(DATE_RSS)."<br>";
echo date(DATE_RFC7231)."<br>";
echo date(DATE_COOKIE)."<br>";

$estacion = "Verano";
switch ($mes) {
    case "03":
        if ($dia >= 21) {
            $estacion = "Otoño";
        }
        break;
    case "04":
    case "05":
        $estacion = "Otoño";
        break;
    case "06":
        if ($dia < 21) {
            $estacion = "Otoño";
        }
        else {
            $estacion = "Invierno";
        }
        break;
    case "07":
    case "08":
        $estacion = "Invierno";
        break;
    case "09":
        if ($dia < 21) {
            $estacion = "Invierno";
        }
        else {
            $estacion = "Primavera";
        }
        break;
    case "10":
    case "11":
        $estacion = "Primavera";
        break;
    case "12":
        if ($dia < 21) {
            $estacion = "Primavera";
        }
}
echo "Estamos en: ¡$estacion!";
