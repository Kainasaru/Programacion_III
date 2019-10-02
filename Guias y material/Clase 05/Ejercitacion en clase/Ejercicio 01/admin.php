<?php
$conStr = "mysql:host=localhost;dbname=cdcol;charset=utf8";
$user = "root";
$pass = "";
$exito = true;
//$tabla = "<table><thead><"
try {
    $db = new PDO($conStr,$user,$pass);
    $sql = 'SELECT * FROM `cds`';
    $result = $db->query($sql);
    $filas = $result->fetchAll(PDO::FETCH_NUM);
    $tabla = "<table><thead><th>titulo</th><th>";
    foreach( $filas as $fila) {
        foreach( $fila as $value) {
            $print .= $value." ";
        }
        $print .= "<br/>";
    }
    echo $print;
}
catch( PDOException $e) {
    $exito = false;
    echo $e->getMessage();
}
if($exito ) {
    echo "Exito en la conexion";
}
?>