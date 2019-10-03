<!DOCTYPE html>
<html lang="es">

<head>
    <script type="text/javascript" src="./javascript/reset.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos</title>
</head>

<body>
    <form action="Administracion.php" method="POST" enctype="multipart/form-data" id="alta">
        <h1>Leo Drive</h1>
        <fieldset style="width:10em">
            <legend>Cargar productos</legend>
            <table>
                <tbody>
                    <tr>
                        <td>Nombre:</td>
                        <td><input type="text" name="name"></td>
                    </tr>
                    <tr>
                        <td>Código de barras:</td>
                        <td><input type="number" name="codBarra"></td>
                    </tr>
                    <tr>
                        <td>Seleccionar imagen:</td>
                        <td><input type="file" name="archivo"></td>
                        <input type="hidden" name="option" value="ALTA"/>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Enviar" style="width:35em;"></td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
    </form>
    <hr/>
    <form method="POST" action="./Administracion.php" id="mostrar">
        <input type="hidden" name="option" value="MOSTRAR"/>
        <input type="submit" value="Mostrar listado" style="width:37.7em;">
        
    </form>
</body>

</html>