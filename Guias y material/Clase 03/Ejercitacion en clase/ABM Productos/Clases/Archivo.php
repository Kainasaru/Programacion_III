<?php 
class Archivo {
    public static function subir() {
        $subido = getimagesize($_FILES["archivo"]["tmp_name"]) !== false && $_FILES["archivo"]["size"] <= 2000000;
        if(  $subido ) {
            $destino = "./Archivos/images/".$_FILES["archivo"]["name"];
            move_uploaded_file($_FILES["archivo"]["tmp_name"],"./Archivos/images/".$_FILES["archivo"]["name"]);
        }
        return $subido;
    }
}