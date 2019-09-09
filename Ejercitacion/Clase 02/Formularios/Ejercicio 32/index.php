<!--Aplicación Nº 32 (Superficie / Perímetro del rectángulo)
Modificar el formulario del ejercicio anterior para disponer de dos controles de tipo <input>
(type=”radio”) que permita seleccionar entre calcular la superficie y el perímetro del
rectángulo.
El resultado se mostrará:
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
    <form action="pagina.php" method="GET" id="aForm">
        Rectángulo:<br />
        Base:<input type="number" name="base" ><br />
        Altura:<input type="number" name="altura" ><br />
        <hr />
        Calcular:<br />
        Perímetro:<input type="radio" name="calcular" value="perim" ><br />
        Superficie:<input type="radio" name="calcular" value="super" ><br />
        <hr />
        <input type="submit" value="Enviar">
    </form>
    <hr />
    <h2>Ejercicio B</h2>
    <form action="otraPagina.php" method="GET" id="bForm">
        Rectángulo:<br />
        Base:<input type="number" name="base" ><br />
        Altura:<input type="number" name="altura" ><br />
        <hr />
        Calcular:<br />
        Perímetro:<input type="radio" name="calcular" value="perim" ><br />
        Superficie:<input type="radio" name="calcular" value="super" ><br />
        <hr />
        <input type="submit" value="Enviar">
    </form>
    <hr />
</body>

</html>