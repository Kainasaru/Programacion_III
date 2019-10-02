<!--Aplicación Nº 41 (Galería de Imágenes)
Amplíe el ejercicio de la galería de fotos realizada anteriormente y permita al usuario añadir nuevas fotos.
 Para ello hay que poner el atributo enc_type=”multipart/form-data” en el FORM y usar la variable $_FILES['foto'].-->
<?php
$photoNum = 0;
$ok = true;
$pathCont = "./content.txt"; //Ruta de registro filas
$file = fopen($pathCont,"a+");
$fotos = (filesize($pathCont) > 0)? fread($file,filesize($pathCont)): "";

if (isset($_FILES["imagen"])) {
    $extension = pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION);
    if (getimagesize($_FILES["imagen"]["tmp_name"]) === false) {
        $ok = false;
    }
    if ($extension != "jpg" && $extension != "png" && $extension != "jpeg") {
        $ok = false;
    }
    if ($_FILES["imagen"]["size"] / (1024 * 1024) > 5) {
        $ok = false;
    }
    if ($ok) {
        //Cuento la cantidad de ficheros html que hay.
        $fi = new FilesystemIterator("./html", FilesystemIterator::SKIP_DOTS);
        $photoNum = iterator_count($fi) + 1;
        $ruta = "./images/foto$photoNum." . $extension; //Ruta donde se guardara la foto en el servidor
        $rutaDesdeOriginal = "../images/foto$photoNum." . $extension; //Ruta a la foto desde ./html/x
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta); //Copio la imagen
        $pathHTML = "./html/foto$photoNum.html"; //Ruta del archivo html asociado a esa foto
        //Contenido del archivo html
        $htmlContent = '<!DOCTYPE html>  
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>Original</title>
            </head>
            <body>
                <h1>Foto original</h1>
                <img src="' . $rutaDesdeOriginal . '"><br/>
                <a href="../index.php">Volver</a>
            </body>
            </html>';

        /* Creo archivo html con la foto original*/
        $htmFile = fopen($pathHTML, "w");
        fwrite($htmFile, $htmlContent);
        fclose($htmFile);

        /* Agrego el contenido html de index.php */
        $row = "<tr>
                <td>
                    <a href='" . $pathHTML . "'><img src='./images/foto" . $photoNum . "." . $extension . "' width='100px' height='100px' ></a>
                </td>
            </tr>";
        $fotos .= $row;
        fwrite($file,$row);
        header("location: ./index.php") ;
    }
}
fclose($file);  
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Imagenes</title>
</head>

<body>
    <form method="POST" action="./index.php" enctype="multipart/form-data" id="frm">
        <fieldset style="width:10em;">
            <legend>Agregar imagen</legend>
            Archivo:<br />
            <input type="file" name="imagen"><br /><br />
            <input type="submit" value="Enviar">
        </fieldset>
    </form><br /><br />
    <table border="1">
        <thead>
            <thead>
                <th>Fotos</th>
            </thead>
        <tbody>
            <tr>
                <td><a href="./html/foto1.html"><img src="./images/foto1.jpg" width="100px" height="100px"></a> </td>
            </tr>
            <tr>
                <td><a href="./html/foto2.html"><img src="./images/foto2.jpg" width="100px" height="100px"></a></td>
            </tr>
            <tr>
                <td><a href="./html/foto3.html"><img src="./images/foto3.jpg" width="100px" height="100px"></a></td>
            </tr>
            <tr>
                <td><a href="./html/foto4.html"><img src="./images/foto4.jpg" width="100px" height="100px"></a></td>
            </tr>
            <tr>
                <td><a href="./html/foto5.html"><img src="./images/foto5.jpg" width="100px" height="100px"></a></td>
            </tr>
            <tr>
                <td><a href="./html/foto6.html"><img src="./images/foto6.jpg" width="100px" height="100px"></a></td>
            </tr>
            <tr>
                <td><a href="./html/foto7.html"><img src="./images/foto7.jpg" width="100px" height="100px"></a></td>
            </tr>
            <tr>
                <td><a href="./html/foto8.html"><img src="./images/foto8.jpg" width="100px" height="100px"></a></td>
            </tr>
            <tr>
                <td><a href="./html/foto9.html"><img src="./images/foto9.jpg" width="100px" height="100px"></a></td>
            </tr>
            <tr>
                <td><a href="./html/foto10.html"><img src="./images/foto10.jpg" width="100px" height="100px"></a></td>
            </tr>
            <?php
            echo $fotos;
            ?>
        </tbody>
        </thead>
    </table>
</body>

</html>