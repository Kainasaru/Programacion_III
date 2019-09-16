<!--Amplíe el ejercicio anterior y permita al usuario añadir múltiples fotos en una misma subida. Para ello agregar
 el atributo ‘multiple’ en el input (type=”file”).
Del lado del servidor, verificar que cada archivo subido posea la extensión .jpg o .jpeg y que su tamaño máximo no
 supere los 900 kb.
Si alguno de los archivos subidos no cumple con los requisitos expuestos anteriormente, informarlo, caso contrario,
 agregarlo a la galería de imágenes.-->
<?php
session_start();
$msj = "";
if (!isset($_SESSION["tabla2"])) { //Si no se cargo la sesion establezco...
    if (file_exists("./images/" . session_id()) ) { //Si el usuario tiene ya datos registrados los cargo
        $path = "./images/" . session_id() . "/table.txt";
        $file = fopen($path, "r");
        $_SESSION["tabla2"] = fread($file, filesize($path));
        fclose($file);
    } else { //En caso de que el usuario sea nuevo genero su directorio y le cargo sus fotos por defeecto
        mkdir("./images/" . session_id()); //Creo directorio del usuario
        fclose(fopen("./images/" . session_id() . "/table.txt", "w")); //Creo el archivo con los datos del usuario
        copy("./images/photo_index.txt", "./images/" . session_id() . "/photo_index.txt"); //Copio el archivo de nomenclatura 
        for ($i = 0; $i < 10; $i++) { //Copio las fotos por defecto al directorio del usuario
            copy("./images/foto" . ($i + 1) . ".jpg", "./images/" . session_id() . "/foto" . ($i + 1) . ".jpg");
        }
        //Guardo la tabla del usuario con sus fotos por defecto
        $_SESSION["tabla2"] = '<td><a href="./original.html"><img src="./images/foto1.jpg" width="100px" height="100px" onclick="saveSelectedImg(this)"></a> </td>
        </tr>
        <tr>
        <td><a href="./original.html"><img src="./images/foto2.jpg" width="100px" height="100px" onclick="saveSelectedImg(this)"></a></td>
        </tr>
        <tr>
        <td><a href="./original.html"><img src="./images/foto3.jpg" width="100px" height="100px" onclick="saveSelectedImg(this)"></a></td>
        </tr>
        <tr>
        <td><a href="./original.html"><img src="./images/foto4.jpg" width="100px" height="100px" onclick="saveSelectedImg(this)"></a></td>
        </tr>
        <tr>
        <td><a href="./original.html"><img src="./images/foto5.jpg" width="100px" height="100px" onclick="saveSelectedImg(this)"></a></td>
        </tr>
        <tr>
        <td><a href="./original.html"><img src="./images/foto6.jpg" width="100px" height="100px" onclick="saveSelectedImg(this)"></a></td>
        </tr>
        <tr>
        <td><a href="./original.html"><img src="./images/foto7.jpg" width="100px" height="100px" onclick="saveSelectedImg(this)"></a></td>
        </tr>
        <tr>
        <td><a href="./original.html"><img src="./images/foto8.jpg" width="100px" height="100px" onclick="saveSelectedImg(this)"></a></td>
        </tr>
        <tr>
        <td><a href="./original.html"><img src="./images/foto9.jpg" width="100px" height="100px" onclick="saveSelectedImg(this)"></a></td>
        </tr>
        <tr>
        <td><a href="./original.html"><img src="./images/foto10.jpg" width="100px" height="100px" onclick="saveSelectedImg(this)"></a></td>
        </tr>';
    }
} else if (isset($_FILES["foto"]["name"])) { //Si el usuario quiere cargar una foto
    //Validaciones
    $uploadOk = true;
    $sizes = $_FILES["foto"]["size"];
    $names = $_FILES["foto"]["name"];
    $tmpNames = $_FILES["foto"]["tmp_name"];
    $extensiones = array();
    foreach ($names as $name) { //Cargo  extensiones
        array_push($extensiones, pathinfo($name, PATHINFO_EXTENSION));
    }
    //Verifico que sea una imagen
    for($i = 0 ; $i < count($tmpNames);$i++) {
        if ( getimagesize($tmpNames[$i]) === false ) {
            $uploadOk = false;
            $msj = "Un archivo seleccionado no es una imagen.<br/>";
            break;
        }
    }
    //Verifico tamaño
    foreach ($sizes as $size) {
        if ($size > 900000) {
            $uploadOk = false;
            $msj = "Un archivo seleccionado es mayor a 900kb.<br/>";
            break;
        }
    }
    //Verifico extension
    foreach ($extensiones as $extensiones) {
        if ( strtolower( $extensiones) != "jpg" && strtolower( $extensiones) != "jpeg") {
            $uploadOk = false;
            $msj =  "Un archivo seleccionado tiene una extensión no permitida (extensiones soportadas: jpg,jpeg).<br/>";
            break;
        }
    }
    if ($uploadOk) {
        //Abro archivo de indices de nomenclarura de archivos
        $file = fopen("./images/" . session_id() . "/photo_index.txt", "r");
        $photoNum = intval(fread($file, filesize("./images/photo_index.txt")));
        fclose($file);
        for($i = 0 ; $i < count($names) ; $i++) {
            //Obtengo ruta de guardado
            $path = "./images/" . session_id() . "/foto".(++$photoNum).".".pathinfo($names[$i], PATHINFO_EXTENSION);
            move_uploaded_file($tmpNames[$i], $path);
            $_SESSION["tabla2"] .= "<tr><td><a href='original.html'><img src='$path' width='100px' height='100px' onclick='saveSelectedImg(this)' ></a></td></tr>";
        }
        //Escribo el nuevo indice en el archivo
        $file = fopen("./images/" . session_id() . "/photo_index.txt", "w");
        fwrite($file, $photoNum);
        fclose($file);
        /* Para evitar que los datos del formulario se reenvien */
        header("location:./index.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <script type="text/javascript" src="./javascript/functions.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Imagenes</title>
</head>

<body>
    <form method="POST" enctype="multipart/form-data" action="index.php" id="frm">
        <fieldset style="width:15em;">
            <legend>Agregar nuevas fotos al servidor</legend>
            Foto: <input type="file" name="foto[]" accept="image/jpg,jpeg" multiple><br />
            <input type="submit" value="Enviar">
        </fieldset>
    </form>
    <?php echo $msj; ?>
    <table border="1">
        <thead>
            <th>Imagen</th>
        </thead>
        <tbody id="1">
            <?php echo $_SESSION["tabla2"] ?>
        </tbody>
    </table>
</body>

</html>