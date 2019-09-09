<?php
$color = $_POST["color"];
switch($color) {
    case "Rojo #ff0000":
    $color = "red";
    break;
    case "Verde #00ff00":
    $color = "green";
    break;
    case "Azul #0000ff":
    $color = "blue";
    break;
    case "Amarillo #ffff00":
    $color = "yellow";
    break;
    case "Negro #000000":
    $color = "black";
    break;
    case "Blanco #ffffff":
    $color = "white";
    break;
}
echo "<body style='background-color:$color;'></body>";
?>