<!--Aplicación Nº 29 (Cambiar color de fondo II)
 una página que posea sólo un control <select> (lista de opciones), con seis nombres de colores
como opciones (y su correspondiente 
código RGB como valor asociado), y un control <input> (type=”button”) con la leyenda “Cambiar Color”.
 funcionalidad de la aplicación es sencilla, se selecciona un color del combo, se pulsa el botón y el color de 
 de la página cambia a dicho color.-->

<!DOCTYPE html>
<html lang="es">

<head>
    <script type="text/javascript" src="./submit.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Opciones</title>
</head>

<body>
    <form action="background.php" method="POST" id="colorFrm">
        <select name="color">
            <option>Rojo #ff0000</option>
            <option>Verde #00ff00</option>
            <option>Azul #0000ff</option>
            <option>Amarillo #ffff00</option>
            <option>Negro #000000</option>
            <option>Blanco #ffffff</option>
        </select>
        <input type="button" value="Cambiar color" onclick="submitForm('colorFrm')">
    </form>
</body>

</html>