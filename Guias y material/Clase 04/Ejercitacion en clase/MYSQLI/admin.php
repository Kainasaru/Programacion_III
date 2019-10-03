<?php 
/* Datos de conexion */
$host = "localhost";
$user = "root";
$pass = "";
$base = "mercado"; 
/* Variables necesarias */
$option = isset($_POST["option"])? $_POST["option"] : "";
$nombre = isset($_POST["nombre"])? $_POST["nombre"] : "";
$apellido = isset($_POST["apellido"])? $_POST["apellido"] : "";
$clave = isset($_POST["clave"])? $_POST["clave"] : "";
$perfil = isset($_POST["perfil"])? $_POST["perfil"] : "";
$estado = isset($_POST["estado"])? $_POST["estado"] : "";
$id = isset($_POST["id"])? $_POST["id"] : "";
$tabla = "<table border='1'><thead><th>ID</th><th>Nombre</th><th>Apellido</th><th>Clave</th><th>Perfil</th><th>Estado</th></thead><tbody>";
/* Fin variables necesarias */
$connection = mysqli_connect($host,$user,$pass,$base); //Conecto al servidor de base de datos
$query = ""; //Aqui guardare las consultas a realizar
if( $connection ) {
    $rs = null; //Recurso conteniendo la consulta realizada
    switch($option ) {
        case "TraerTodos_usuarios":
        $query = "SELECT * FROM `usuarios`";
        $rs = $connection->query($query); //Consulto
        while( $row = $rs->fetch_array(MYSQLI_NUM) ) { //Obtengo los objetos
            $tabla .= "<tr>";
            foreach( $row as $value ) {
                $tabla .= "<td>".$value."</td>";
            }
            $tabla .= "</tr>";
        }
        if(mysqli_num_rows($rs) == 0)  {
            $tabla .= "<tr><td colspan='6'>No hay usuarios cargados.</td></tr>";
        }
        $tabla .= "</tbody></table>";
        echo $tabla;
        break;
        case "TreaerPorId_usuarios":
        $query = "SELECT * FROM `usuarios` where id='$id'";
        $rs = $connection->query($query);
        while( $row = $rs->fetch_array(MYSQLI_NUM) ) {
            $tabla .= "<tr>";
            foreach($row as $cell ) {
                $tabla .= "<td>$cell</td>";
            }
            $tabla .= "</tr>";
        }
        if(mysqli_num_rows($rs) == 0)  {
            $tabla .= "<tr><td colspan='6'>No hay usuarios que cumplan los requisitos.</td></tr>";
        }
        $tabla .= "</tbody></table>";
        echo $tabla;
        break;
        case "TraerPorEstado_usuarios":
        $query = "SELECT * FROM `usuarios` where estado=$estado";
        $rs = $connection->query($query);
        while( $row = $rs->fetch_array(MYSQLI_NUM) ) {
            $tabla .= "<tr>";
            foreach($row as $cell ) {
                $tabla .= "<td>$cell</td>";
            }
            $tabla .= "</tr>";
        }
        if(mysqli_num_rows($rs) == 0)  {
            $tabla .= "<tr><td colspan='6'>No hay usuarios que cumplan los requisitos.</td></tr>";
        }
        $tabla .= "</tbody></table>";
        echo $tabla;
        break;
        case "Agregar_usuarios":
        $query = "INSERT INTO `usuarios`(`nombre`, `apellido`, `clave`, `perfil`, `estado`) VALUES ('$nombre','$apellido','$clave',$perfil,$estado)";
        $rs = $connection->query($query);
        if($rs !== false)  {
            echo "<font color='green'>Usuario agregado con éxito.</font>";
        }
        else {
            echo "<font color='red'>Se produjo un error al agregar el usuario.</font>";
        }
        break;
        case "Modificar_usuarios":
        $query = "UPDATE `usuarios` SET `nombre`='$nombre', `apellido`='$apellido',`clave`='$clave',`perfil`=$perfil,`estado`=$estado WHERE id=$id";
        $rs = $connection->query($query);
        if($rs !== false )  {
            echo "<font color='green'>Usuario modificado con éxito.</font>";
        }
        else {
            echo "<font color='red'>Se produjo un error al modificar el usuario.</font>";
        }
        break;
        case "Borrar_usuarios":
        $query = "DELETE FROM `usuarios` WHERE id = $id";
        $rs = $connection->query($query);
        if($rs !== false)  {
            echo "<font color='green'>Usuario borrado con éxito.</font>";
        }
        else {
            echo "<font color='red'>Se produjo un error al borrar el usuario.</font>";
        }
        break;
    }
    mysqli_close($connection); //Cierro la conexion con el servidor de base de datos
}
?>