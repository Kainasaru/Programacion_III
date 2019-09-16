<!--Aplicación Nº 41 (Galería de Imágenes)
Amplíe el ejercicio de la galería de fotos realizada anteriormente y permita al usuario añadir nuevas fotos. 
Para ello hay que poner el atributo enc_type=”multipart/form-data” en el FORM y usar la variable $_FILES['foto'].-->
<?php
session_start();
if (!isset($_SESSION["tabla"])) { //Si no se cargo la sesion establezco...
    if (file_exists("./images/" . session_id()) ) { //Si el usuario tiene ya datos registrados los cargo
        $path = "./images/" . session_id() . "/table.txt";
        $file = fopen($path, "r");
        $_SESSION["tabla"] = fread($file, filesize($path));
        fclose($file);
    } else { //En caso de que el usuario sea nuevo genero su directorio y le cargo sus fotos por defeecto
        mkdir("./images/" . session_id()); //Creo directorio del usuario
        fclose(fopen("./images/" . session_id() . "/table.txt", "w")); //Creo el archivo con los datos del usuario
        copy("./images/photo_index.txt", "./images/" . session_id() . "/photo_index.txt"); //Copio el archivo de nomenclatura 
        for ($i = 0; $i < 10; $i++) { //Copio las fotos por defecto al directorio del usuario
            copy("./images/foto" . ($i + 1) . ".jpg", "./images/" . session_id() . "/foto" . ($i + 1) . ".jpg");
        }
        //Guardo la tabla del usuario con sus fotos por defecto
        $_SESSION["tabla"] = '<td><a href="./original.html"><img src="./images/foto1.jpg" width="100px" height="100px" onclick="saveSelectedImg(this)"></a> </td>
        <td>Bosque mágico</td>
        </tr>
        <tr>
        <td><a href="./original.html"><img src="./images/foto2.jpg" width="100px" height="100px" onclick="saveSelectedImg(this)"></a></td>
        <td>Cataratas</td>
        </tr>
        <tr>
        <td><a href="./original.html"><img src="./images/foto3.jpg" width="100px" height="100px" onclick="saveSelectedImg(this)"></a></td>
        <td>Playa montañosa</td>
        </tr>
        <tr>
        <td><a href="./original.html"><img src="./images/foto4.jpg" width="100px" height="100px" onclick="saveSelectedImg(this)"></a></td>
        <td>Cascadas</td>
        </tr>
        <tr>
        <td><a href="./original.html"><img src="./images/foto5.jpg" width="100px" height="100px" onclick="saveSelectedImg(this)"></a></td>
        <td>Pradera</td>
        </tr>
        <tr>
        <td><a href="./original.html"><img src="./images/foto6.jpg" width="100px" height="100px" onclick="saveSelectedImg(this)"></a></td>
        <td>Pradera otoñal</td>
        </tr>
        <tr>
        <td><a href="./original.html"><img src="./images/foto7.jpg" width="100px" height="100px" onclick="saveSelectedImg(this)"></a></td>
        <td>Río y cascadas</td>
        </tr>
        <tr>
        <td><a href="./original.html"><img src="./images/foto8.jpg" width="100px" height="100px" onclick="saveSelectedImg(this)"></a></td>
        <td>Playa mágica</td>
        </tr>
        <tr>
        <td><a href="./original.html"><img src="./images/foto9.jpg" width="100px" height="100px" onclick="saveSelectedImg(this)"></a></td>
        <td>Perú</td>
        </tr>
        <tr>
        <td><a href="./original.html"><img src="./images/foto10.jpg" width="100px" height="100px" onclick="saveSelectedImg(this)"></a></td>
        <td>Bosque de otoño</td>
        </tr>';
    }
} 
else if ( isset($_FILES["foto"]["name"]) ) { //Si el usuario quiere cargar una foto
    //Abro archivo de indices de nomenclarura de archivos
    $file = fopen("./images/".session_id()."/photo_index.txt", "r");
    $photoNum = intval(fread($file, filesize("./images/photo_index.txt")));
    fclose($file);
    //Escribo el nuevo indice en el archivo
    $file = fopen("./images/".session_id()."/photo_index.txt", "w");
    fwrite($file, ++$photoNum);
    fclose($file);
    //Guarda la imagen en la variable de sesion
    $path = "./images/".session_id()."/foto$photoNum." . pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["foto"]["tmp_name"], $path);
    $_SESSION["tabla"] .= "<tr><td><a href='original.html'><img src='$path' width='100px' height='100px' onclick='saveSelectedImg(this)' ></a></td><td>" . $_POST["descripcion"] . "</tr>";
    /* Para evitar que los datos del formulario se reenvien */
    header("location:./index.php");
    exit();
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
            Foto: <input type="file" name="foto" accept="image/jpg,jpeg"><br />
            Descripción: <input type="text" name="descripcion" style="width:20em"><br />
            <input type="submit" value="Enviar">
        </fieldset>
    </form>
    <table border="1">
        <thead>
            <th>Fotos</th>
            <th>Descripción</th>
        </thead>
        <tbody id="1">
            <?php echo $_SESSION["tabla"] ?>
        </tbody>
    </table>
</body>

</html>