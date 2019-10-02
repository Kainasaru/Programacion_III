<?php
/*Aplicación Nº 44 (Files UpLoad II)
A partir del ejercicio anterior, permitirle al usuario que pueda seleccionar varios
 archivos al mismo tiempo, manteniendo las mismas restricciones mencionadas anteriormente.*/

if (isset($_FILES["archivo"])) { // Si esta seteada la variable y no hay error procedo
    $errores = $_FILES["archivo"]["error"];
    $names = $_FILES["archivo"]["name"];
    $sizes = $_FILES["archivo"]["size"];
    $tmpNames = $_FILES["archivo"]["tmp_name"];
    $extensiones = array();
    $length = count($names);
    //Agrego extensiones
    for ($i = 0; $i < $length; $i++) {
        array_push($extensiones, pathinfo($names[$i], PATHINFO_EXTENSION));
    }
    //Valido extensiones y tamaños
    for ($i = 0; $i < $length; $i++) {
        $uploadOk = true;
        if( $errores[$i] ) {
            $uploadOk = false;
        }
        if ((($extensiones[$i] == "doc" || $extensiones[$i] == "docx") && $sizes[$i] > 60000)
            || (($extensiones[$i] == "jpg" || $extensiones[$i] == "jpeg" || $extensiones[$i] == "gif") &&
                $sizes[$i] > 300000) || $sizes[$i] > 500000
        ) {
            $uploadOk = false;
        }
        if ($uploadOk) {
            $path = "Uploads/" . $names[$i];
            if (file_exists($path)) {
                $num = 0;
                $fileName = pathinfo($names[$i], PATHINFO_FILENAME);
                while (file_exists("Uploads/$fileName(" . (++$num) . ")." . $extensiones[$i]));
                $path = "Upload/$fileName($num)" . $extensiones[$i];
            }
            move_uploaded_file($tmpNames[$i], $path);
            echo "El archivo ".$names[$i]." se subió. Tiene extensión ." . $extensiones[$i] . " y pesa " . ($sizes[$i] / 1000) . " KB.<br/>";
        }
        else {
            echo $names[$i] . " no se pudo subir.<br/>";
        }
    }
} else {
    echo "No se pudo subir ningún archivo.<br/>";
}
