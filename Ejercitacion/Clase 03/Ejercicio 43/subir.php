<?php
/*<!--Aplicación Nº 43 (Files Uploads)
Se necesita crear una página que le permita al usuario subir al servidor web cualquier tipo de archivo. 
Sólo se restringirá el tamaño de cada archivo según el tipo de extensión que posea.
Para archivos con extensión .doc o .docx el tamaño máximo será de 60 Kb.
Archivos con extensión .jpg, jpeg o gif el valor máximo será de 300 kb.
Para el resto de las extensiones el máximo permitido será de 500 kb.
Dichos archivos se almacenarán en una carpeta llamada ‘Uploads’ que se ubicará en el directorio raíz del servidor web.
Se deberá informar si se logró subir el archivo o no. Si se pudo, informar el nombre del archivo, su extensión y 
que tamaño posee.-->*/
if (isset($_FILES["archivo"]) && !$_FILES["archivo"]["error"]) { // Si esta seteada la variable y no hay error procedo
    $uploadOk = true;
    $name = $_FILES["archivo"]["name"];
    $extension = pathinfo($name, PATHINFO_EXTENSION);
    if ((($extension == "doc" || $extension == "docx") && $_FILES["archivo"]["size"] > 60000) || (($extension == "jpg" || $extension == "jpeg" || $extension == "gif") && $_FILES["archivo"]["size"] > 300000) ||
        $_FILES["archivo"]["size"] > 500000
    ) {
        $uploadOk = false;
        echo "No se pudo subir el archivo<br/>";
        echo "ERROR: Archivo incumple parámetros.";
    }
    if ($uploadOk) {
        $path = "Uploads/$name";
        if (file_exists($path)) {
            $num = 0;
            $fileName = pathinfo($name, PATHINFO_FILENAME);
            while (file_exists("Uploads/$fileName(" . (++$num) . ")." . $extension));
            $path = "Uploads/$fileName(" . ($num) . ")." . $extension;
        }
        $name = pathinfo($path, PATHINFO_FILENAME);
        move_uploaded_file($_FILES["archivo"]["tmp_name"], $path);
        echo "Archivo subido<br/>";
        echo "El archivo se llama $name, tiene extensión .$extension y pesa " . ($_FILES["archivo"]["size"] / 1024) . " KB.";
    }
} else { //En caso de error de carga
    echo "Se produjo un error al subir el archivo<br/>";
}
