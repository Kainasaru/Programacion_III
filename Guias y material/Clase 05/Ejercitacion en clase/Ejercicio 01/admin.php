<?php
$conStr = "mysql:host=localhost;dbname=cdcol;charset=utf8";
$user = "root";
$pass = "";
$exito = true;
try {
    $db = new PDO($conStr,$user,$pass);
    $sql = 'SELECT * FROM `cds`';
    $result = $db->query($sql);
    $filas = $result->fetchAll(PDO::FETCH_NUM);
    $tabla = "<table border='1'><thead><tr><th>Título</th><th>Intérprete</th><th>Año</th><th>Id</th></tr></thead><tbody>";
    foreach( $filas as $fila) {
        $tabla .= "<tr>";
        foreach( $fila as $value) {
            $tabla .= "<td>$value</td>";
        }
        $tabla .= "</tr>";
    }
    $tabla .= "</tbody></table>";
    echo $tabla;
}
catch( PDOException $e) {
    $exito = false;
    echo $e->getMessage();
}
if($exito ) {
    echo "Exito en la conexion";
}
?>