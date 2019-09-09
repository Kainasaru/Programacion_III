<!--Aplicación Nº 36 (Empresa de turismo con promociones)
Modificar la aplicación anterior para que la empresa pueda ofrecer una promoción de acuerdo
al modo de pago y la cantidad de pasajes a comprar.
Si el pago es en efectivo se realizará un descuento del 12% del valor del pasaje. Si es por
medio de tarjetas de crédito o débito el descuento será del 7%.
Independientemente de la forma de pago, si la cantidad de pasajes es superior a 2 cada pasaje
extra se abonará el 35% menos.-->

<?php
$precio = 0;
$precioUnitario = 0;
$sitio = intval((isset($_POST["travel"])) ? $_POST["travel"] : "");
$cantidad = intval( isset($_POST["amount"])? $_POST["amount"] : 0);
if ($cantidad > 0) {
    switch ($sitio) {
        case 1:
            $precioUnitario = 900;
            $precio = $precioUnitario * $cantidad;
            break;
        case 2:
            $precioUnitario = 550;
            $precio = $precioUnitario * $cantidad;
            break;
        case 3:
            $precioUnitario = 1000;
            $precio = $precioUnitario * $cantidad;
            break;
        case 4:
            $precioUnitario = 1250;
            $precio = $precioUnitario * $cantidad;
            break;
        case 5:
            $precioUnitario = 1500;
            $precio = $precioUnitario * $cantidad;
            break;
    }
    if($cantidad > 2) {
        $precio = ($precio - $precioUnitario * 2) * 0.65 + $precioUnitario * 2;
    }
    else if($_POST["rdoPay"] == "1") {
        $precio *= 0.93;
    }
    else {
        $precio *= 0.88;
    }
}

?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Destinos</title>
    </head>

    <body>
        <form action="./index.php" method="POST">
            <h1>Viajes.com(2)</h1>
            <fieldset style="width:10em;">
                <legend>Elija su destino</legend>
                <table>
                    <tbody>
                        <tr>
                            <td>Seleccionar</td>
                            <td>
                                <select name="travel">
                                    <option value="1">Río de Janeiro (€900)</option>
                                    <option value="2">Punta del Este (€550)</option>
                                    <option value="3">La Habana (€1000)</option>
                                    <option value="4">Miami (€1250)</option>
                                    <option value="5">Ibiza (€1500)</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Cantidad (Descuento del 35% en tus pasajes a partir del tercero):</td>
                            <td><input type="number" name="amount" value="1" required></td>
                        </tr>
                        <tr>
                            <td>Medio de pago (Descuentos en la compra de 1 o 2 pasajes):</td>
                            <td>
                                <input type="radio" name="rdoPay" value="1" checked>Tarjeta de crédito/débito (-7%).<br/>
                                <input type="radio" name="rdoPay" value="2">Efectivo (-12%).
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" value="Enviar" id="envBtn" style="width:50em"></td>
                        </tr>
                        <tr>
                            <td>Total: €</td>
                            <td><?php echo $precio ?></td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
        </form>
    </body>

    </html>