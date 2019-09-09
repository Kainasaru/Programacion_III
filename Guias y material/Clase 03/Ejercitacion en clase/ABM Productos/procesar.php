<?php
require_once "./Clases/Archivo.php";
/*var_dump($_FILES);
echo "<br/><br/><br/>El nombre del archivo es: ". $_FILES["archivo"]["name"]."<br/>";
echo "La ruta en el temporal es: ".$_FILES["archivo"]["tmp_name"]."<br/>";
echo "Muevo el archivo:<br/>";
move_uploaded_file($_FILES["archivo"]["tmp_name"],"./Archivos/archivin.txt");
echo "Imprimo el temporal para ver si sigue ahí el archivo:<br/>";
echo $_FILES["archivo"]["tmp_name"]."<br/>";
echo "Obtengo la extensin mediante la función que manipula la cadena para obtener 
extensión:".pathinfo($_FILES["archivo"]["name"],PATHINFO_EXTENSION);*/
if( Archivo::subir() ) {
    echo "Subido";
}
else {
    echo "Error";
}
?>