<!--Aplicación Nº 39 (Información del Número)
Construya una aplicación que permita el ingreso de un número entero y muestre en pantalla la siguiente información:
1) Cantidad de cifras que posee.
2) Suma de cifras impares del número.
3) Suma de cifras pares del número.
4) Suma total de todas las cifras del número.
5) Todos los divisores de dicho número.
Mostrar los anteriores datos en una tabla convenientemente diseñada.-->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Números</title>
</head>

<body>
    <form action="./resources/mostrar.php" method="POST">
        <h1>Analizar número</h1>
        <fieldset style="width:10em;">
            <legend>Escriba un número</legend>
            <table>
                <tbody>
                    <tr>
                        <td>Número:</td>
                        <td><input type="number" name="num" style="width:15em;" value="0" placeholder="Ingrese un número..." required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Enviar" id="envBtn" style="width:20em;"></td>
                    </tr> 
                </tbody>
            </table>
        </fieldset>
    </form>
</body>

</html>