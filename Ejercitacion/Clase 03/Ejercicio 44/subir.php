<?php
/*<!--Aplicación Nº 43 (Files UpLoad)
Se necesita crear una página que le permita al usuario subir al servidor web cualquier tipo de archivo. 
Sólo se restringirá el tamaño de cada archivo según el tipo de extensión que posea.
Para archivos con extensión .doc o .docx el tamaño máximo será de 60 Kb.
Archivos con extensión .jpg, jpeg o gif el valor máximo será de 300 kb.
Para el resto de las extensiones el máximo permitido será de 500 kb.
Dichos archivos se almacenarán en una carpeta llamada ‘Uploads’ que se ubicará en el directorio raíz del servidor web.
Se deberá informar si se logró subir el archivo o no. Si se pudo, informar el nombre del archivo, su extensión y 
que tamaño posee.-->*/
session_start();

if (isset($_POST["session"])) {
    session_destroy();
} else if (isset($_FILES["archivo"])) { // Si esta seteada la variable y no hay error procedo
    $errores = $_FILES["archivo"]["error"];
    $err = false;
    foreach ($errores as $error) {
        if ($error) {
            $err = true;
            break;
        }
    }
    if (!$err) {
        $userFolder = "./Uploads/" . session_id();
        if (!file_exists($userFolder)) {
            mkdir($userFolder);
        }
        $uploadOk = true;
        $names = $_FILES["archivo"]["name"];
        $sizes = $_FILES["archivo"]["size"];
        $tmpNames = $_FILES["archivo"]["tmp_name"];
        $extensiones = array();
        //Agrego extensiones
        for ($i = 0; $i < count($names); $i++) {
            array_push($extensiones, pathinfo($names[$i], PATHINFO_EXTENSION));
        }
        //Valido extensiones y tamaños
        for ($i = 0; $i < count($extensiones); $i++) {
            if ((($extensiones[$i] == "doc" || $extensiones[$i] == "docx") && $sizes[$i] > 60000)
                || (($extensiones[$i] == "jpg" || $extensiones[$i] == "jpeg" || $extensiones[$i] == "gif") &&
                    $sizes[$i] > 300000) || $sizes[$i] > 500000
            ) {
                $uploadOk = false;
                echo "No se pudo subir el/los archivo<br/>";
                echo "ERROR: Uno o más archivos incumplen parámetros.";
                break;
            }
        }
        if ($uploadOk) {
            echo "Archivos subidos<br/>";
            for ($i = 0; $i < count($names); $i++) {
                $path = "$userFolder/" . $names[$i];
                if (file_exists($path)) {
                    $num = 0;
                    $fileName = pathinfo($names[$i], PATHINFO_FILENAME);
                    while (file_exists("$userFolder/$fileName(" . (++$num) . ")." . $extensiones[$i]));
                    $path = "$userFolder/$fileName(" . ($num) . ")." . $extensiones[$i];
                }
                $name = pathinfo($path, PATHINFO_FILENAME);
                move_uploaded_file($tmpNames[$i], $path);
                echo "Archivo subido<br/>";
                echo "El archivo se llama $name, tiene extensión ." . $extensiones[$i] . " y pesa " . ($sizes[$i] / 1000) . " KB.<br/>";
            }
        }
    }
    else {
        echo "Se produjo un error al subir el/los archivos<br/>";
    }
}
else {
    echo "Se produjo un error al subir el/los archivos<br/>";
}
