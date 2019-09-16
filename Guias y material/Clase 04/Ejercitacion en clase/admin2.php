<?php 
/* Datos de conexion */
$host = "localhost";
$user = "root";
$pass = "";
$base = "mercado"; 
/* Variables necesarias */
$option = isset($_POST["option"])? $_POST["option"] : "";
$id = isset($_POST["id"])? $_POST["id"] : "";
$codigoDeBarra = isset($_POST["codigo_barra"])? $_POST["codigo_barra"] : "";
$nombre = isset($_POST["nombre"])? $_POST["nombre"] : "";
$pathFoto = isset($_POST["path_foto"])? $_POST["path_foto"] : "";
/* Fin variables necesarias */
$connection = mysqli_connect($host,$user,$pass,$base); //Conecto al servidor de base de datos
$query = ""; //Aqui guardare las consultas a realizar
if( $connection ) {
    $rs = null; //Recurso conteniendo la consulta realizada
    switch($option ) {
        case "TraerTodos_productos":
        $query = "SELECT * FROM `productos` ";
        $rs = $connection->query($query); //Consulto
        while( $row = $rs->fetch_object() ) { //Obtengo los objetos
            var_dump($row); //Muestro los objetos
        }
        break;
        case "TreaerPorId_productos":
        $query = "SELECT * FROM `productos` where id='$id'";
        $rs = $connection->query($query);
        while( $row = $rs->fetch_object() ) {
            var_dump($row);
        }
        break;
        case "TraerPorNombre_productos":
        $query = "SELECT * FROM `productos` where nombre=$nombre";
        $rs = $connection->query($query);
        while( $row = $rs->fetch_object() ) {
            var_dump($row);
        }
        break;
        case "Agregar_productos":
        $query = "INSERT INTO `productos`(`codigo_barra`, `nombre`, `path_foto`) VALUES ('$codigoDeBarra','$nombre','$pathFoto')";
        $rs = $connection->query($query);
        break;
        case "Modificar_productos":
        $query = "UPDATE `productos` SET `codigo_barra`='$codigoDeBarra', `nombre`='$nombre',`path_foto`='$pathFoto' WHERE id=$id";
        $rs = $connection->query($query);
        break;
        case "Borrar_productos":
        $query = "DELETE FROM `productos` WHERE id = $id";
        $rs = $connection->query($query);
        break;
    }
    mysqli_close($connection); //Cierro la conexion con el servidor de base de datos
}
?>