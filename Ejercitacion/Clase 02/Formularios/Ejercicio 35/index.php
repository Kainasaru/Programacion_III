<!--Aplicación Nº 35 (Empresa de turismo)
Una empresa de turismo ofrece cinco destinos: Río de Janeiro, Punta del Este, La Habana,
Miami e Ibiza. Se pide hacer una página que posea un <select> con los cinco destinos y un
botón que le permita al usuario ver el valor del viaje.
Los valores de los viajes son: €900, €550, €1000, €1250 y €1500 respectivamente.-->

<?php
$precio = "";
$sitio = intval((isset($_POST["travel"])) ? $_POST["travel"] : "");
switch ($sitio) {
    case 1:
        $precio = "Su viaje cuesta €900.";
        break;
    case 2:
        $precio = "Su viaje cuesta €550.";
        break;
    case 3:
        $precio = "Su viaje cuesta €1000.";
        break;
    case 4:
        $precio = "Su viaje cuesta €1250.";
        break;
    case 5:
        $precio = "Su viaje cuesta €1500.";
        break;
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
            <h1>Viajes.com</h1>
            <fieldset style="width:10em;">
                <legend>Elija su destino</legend>
                <table>
                    <tbody>
                        <tr>
                            <td>Seleccionar</td>
                            <td>
                                <select name="travel">
                                    <option value="1">Río de Janeiro</option>
                                    <option value="2">Punta del Este</option>
                                    <option value="3">La Habana</option>
                                    <option value="4">Miami</option>
                                    <option value="5">Ibiza</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" value="Enviar" id="envBtn"></td>
                        </tr>
                        <tr>
                            <td>Precio:</td>
                            <td><?php echo $precio ?></td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
        </form>
    </body>
    </html>