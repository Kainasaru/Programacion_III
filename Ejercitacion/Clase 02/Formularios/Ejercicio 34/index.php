<!--Aplicación Nº 34 (Mostrar fecha)
Realizar una página que permita mostrar el día, mes o año actual, según lo elija el usuario.
Para esto debe utilizar controles de tipo <input> (type=”checkBox”) y un <input>
(type=”button”) para enviar la solicitud al servidor. Mostrar la fecha en la misma página.-->

<?php
require "./Traductor.php";
date_default_timezone_set("America/Buenos_Aires");
$resultado = "";
$dia = (isset($_POST["dia"])) ? $_POST["dia"] : null;
$mes = (isset($_POST["mes"])) ? $_POST["mes"] : null;
$ano = (isset($_POST["ano"])) ? $_POST["ano"] : null;
if ($dia !== null && $mes === null && $ano === null) {
    $resultado = "Hoy es " . Traductor::dia(date("l")) . ".";
} else if ($dia === null && $mes !== null && $ano === null) {
    $resultado = "Estamos en " . Traductor::mes(date("F")) . ".";
} else if ($dia === null && $mes === null && $ano !== null) {
    $resultado = "Estamos en el " . date("Y") . ".";
} else if ($dia !== null && $mes !== null && $ano === null) {
    $resultado = "Hoy es " . Traductor::dia(date("l")) . " " . date("d") . " de " . Traductor::mes(date("F")) . ".";
} else if ($dia !== null && $mes === null && $ano !== null) {
    $resultado = "Hoy es " . Traductor::dia(date("l")) . " " . date("d") . " y estamos en el " . date("Y") . ".";
} else if ($dia === null && $mes !== null && $ano !== null) {
    $resultado = "Estamos en el mes de " . Traductor::mes(date("F")) . " y en el año " . date("Y") . ".";
} else if ($dia !== null && $mes !== null && $ano !== null) {
    $resultado = "Hoy es " . Traductor::dia(date("l")) . " " . date("d") . " de " . Traductor::mes(date("F")) . " de " . date("Y") . ".";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fecha</title>
</head>

<body>
    <form action="./index.php" method="POST">
        <h1>Mostrar la fecha de hoy</h1>
        <fieldset style="width:10em;">
            <legend>Elija qué mostrar</legend><br />
            <table>
                <tbody>
                    <tr>
                        <td>Día</td>
                        <td><input type="checkbox" name="dia" value="1"><br /></td>
                    </tr>
                    <tr>
                        <td>Mes</td>
                        <td><input type="checkbox" name="mes" value="2"><br /></td>
                    </tr>
                    <tr>
                        <td>Año</td>
                        <td><input type="checkbox" name="ano" value="3"><br /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Enviar" id="envBtn"><br /></td>
                    </tr>
                </tbody>
                
            </table>

            <?php echo $resultado ?>
        </fieldset>
    </form>
</body>

</html>