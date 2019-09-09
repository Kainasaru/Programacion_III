<?php 
abstract class Traductor {
    //Métodos estáticos
    public static function mes($month) {
        $month = strtolower($month);
        switch ($month) {
            case "january":
                $resultado = "enero";
                break;
            case "february":
                $resultado = "febrero";
                break;
            case "march":
                $resultado = "marzo";
                break;
            case "april":
                $resultado = "abril";
                break;
            case "may":
                $resultado = "mayo";
                break;
            case "june":
                $resultado = "junio.";
                break;
            case "july":
                $resultado = "julio.";
                break;
            case "august":
                $resultado = "agosto";
                break;
            case "september":
                $resultado = "septiembre";
                break;
            case "october":
                $resultado = "octubre";
                break;
            case "november":
                $resultado = "noviembre";
                break;
            case "december":
                $resultado = "diciembre";
                break;
            }
        return $resultado;
    }
    public static function dia($dia) {
        $dia = strtolower($dia);
        switch ($dia) {
            case "monday":
                $resultado = "lunes";
                break;
            case "tuesday":
                $resultado = "martes";
                break;
            case "wednesday":
                $resultado = "mi&eacute;rcoles";
                break;
            case "thursday":
                $resultado = "jueves";
                break;
            case "friday":
                $resultado = "viernes";
                break;
            case "saturday":
                $resultado = "s&aacute;bado";
                break;
            case "sunday":
                $resultado = "domingo";
                break;
        }
        return $resultado;
    }
}
