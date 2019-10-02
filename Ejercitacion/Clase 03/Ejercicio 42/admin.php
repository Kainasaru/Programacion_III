<?php
$errorMsg = "";
$photoNum = 0;
$cantImagenes = 0;
$ok = true;
$pathCont = "./content.txt"; //Ruta de registro filas
$file = fopen($pathCont, "a+");
$fotos = (filesize($pathCont) > 0) ? fread($file, filesize($pathCont)) : "";

if (isset($_FILES["imagen"])) {
    $cantImagenes = count($_FILES["imagen"]["name"]);
    $fi = new FilesystemIterator("./html", FilesystemIterator::SKIP_DOTS);
    $photoNum = iterator_count($fi) + 1;
    for ($i = 0; $i < $cantImagenes; $i++) {
        $ok = true;
        $extension = pathinfo($_FILES["imagen"]["name"][$i], PATHINFO_EXTENSION);
        if( $_FILES["imagen"]["error"][$i] ) {
            $ok = false;
        }
        if ($extension != "jpg" && $extension != "jpeg") {
            $ok = false;
        }
        if (getimagesize($_FILES["imagen"]["tmp_name"][$i]) === false) {
            $ok = false;
        }
        if ($_FILES["imagen"]["size"][$i] / 1024 > 900) {
            $ok = false;
        }
        if ($ok == true) {
            $ruta = "./images/foto$photoNum." . $extension; //Ruta donde se guardara la foto en el servidor
            $rutaDesdeOriginal = "../images/foto$photoNum." . $extension; //Ruta a la foto desde ./html/x
            move_uploaded_file($_FILES["imagen"]["tmp_name"][$i], $ruta); //Copio la imagen
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
            fwrite($file, $row);
            $photoNum++;
        } else {
            $errorMsg .= "El archivo " . $_FILES["imagen"]["name"][$i] . " es inválido y no se ha cargado.<br/>";
        }
    }
}
else {
    $errorMsg = "No se pudo subir ningún archivo.";
}

fclose($file);
$html = '<!DOCTYPE html>
<html lang="es">

<head>
    <script type="text/javascript" src="./javascript/noSubmitOnReload.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Imagenes</title>
</head>

<body>
    <form method="POST" action="./admin.php" enctype="multipart/form-data" id="frm">
        <fieldset style="width:10em;">
            <legend>Agregar imagen</legend>
            Solo se aceptan imágenes con extensión jpeg y jpg de hasta 900kb.<br/><br/>
            Archivo:<br />
            <input type="file" name="imagen[]" multiple><br /><br />
            <input type="submit" value="Enviar"><br/>
            '.$errorMsg.'
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
            '.$fotos.'
        </tbody>
        </thead>
    </table>
</body>

</html>';
$indexPath = "./index.php";
$file = fopen($indexPath,"w");
fwrite($file,$html);
fclose($file);
header("location: ./index.php");