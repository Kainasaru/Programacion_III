<!--Aplicación Nº 38 (Descuento por Compra)
Un restaurante ofrece un descuento del 10% para consumos entre $ 300 y $ 550 y un descuento del 20% para consumos
mayores a $ 550. Para todos los demás casos no se aplica ningún tipo de descuento.
Elaborar una aplicación web que permita determinar el importe a pagar por el consumidor.-->

<?php
$importeInicial = ( isset($_POST["price"]) )? intval($_POST["price"]) : 0;
$importeFinal = 0;
$texto = "";
if($importeInicial > 550) {
    $importeFinal = $importeInicial * 0.8;
    $texto = "\$".$importeFinal." (-20%)";
}
else if( $importeInicial >= 300 ) {
    $importeFinal = $importeInicial * 0.9;
    $texto = "\$".$importeFinal." (-10%)";
}
else if( $importeInicial >= 0) {
    $texto = "\$".$importeInicial." (No se aplican descuentos)";
}
else {
    $texto = "Error";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Descuentos</title>
</head>

<body>
    <form action="./index.php" method="POST">
        <h1>Restaurant Hyper-V</h1>
        <fieldset style="width:10em;">
            <legend>Verificar si posee un descuento</legend>
            <table>
                <tbody>
                    <tr>
                        <td>Importe a consumir:</td>
                        <td><input type="text" name="price" style="width:15em;" value="<?php echo $importeInicial ?>" placeholder="Ingrese importe..." required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Enviar" id="envBtn" style="width:21.5em;"></td>
                    </tr>
                    <tr>
                        <td>Pagará:</td>
                        <td><input type="text" value="<?php echo $texto?>" disabled style="width:15em;"></td>
                    </tr>       
                </tbody>
            </table>
        </fieldset>
    </form>
</body>

</html>