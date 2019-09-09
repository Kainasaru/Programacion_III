<!--Aplicación Nº 33 (Confirmar contraseña)
Solicitar el ingreso de una clave dos veces, es decir, disponer dos controles de tipo <input>
(type=”password”), luego en el servidor, verificar si las claves ingresadas son iguales o no,
mostrando un mensaje de bienvenida en la página welcome.php, si son iguales o redireccionar
hacia la página de inicio, en el caso de que sean distintos.-->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contraseñas</title>
</head>

<body>
    <form action="./validar.php" method="POST">
        Escriba su contraseña:<input type="password" name="pass1"><br />
        Reescriba su contraseña:<input type="password" name="pass2"><br />
        <input type="submit" value="Enviar" id="envBtn"><br />
    </form>
</body>

</html>