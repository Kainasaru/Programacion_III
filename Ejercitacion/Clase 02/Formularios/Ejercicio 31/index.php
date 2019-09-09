<!--Aplicación Nº 31 (Superficie del rectángulo)
Confeccionar un formulario que solicite la medida de los lados de un rectángulo. Luego de
pulsar un botón se mostrará la superficie del mismo:
a- en la misma página.
b- en otra página (con un link para poder volver).-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rectángulo</title>
</head>
<body>
    <h2>Ejercicio A</h2>
    <form action="pagina.php" method="GET">
        Base:<input type="number" name="base"><br/>
        Altura:<input type="number" name="altura"><br/>
        <input type="submit" value="Enviar">
    </form>
    <h2>Ejercicio B</h2>
    <form action="otraPagina.php" method="GET">
        Base:<input type="number" name="base"><br/>
        Altura:<input type="number" name="altura"><br/>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>