<?php
/* Datos de conexion */
$user = "root";
$pass = "";
$con = 'mysql:host=localhost;dbname=mercado;charset=utf8';
/* Variables necesarias */
$option = isset($_POST["option"]) ? $_POST["option"] : "";
$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
$apellido = isset($_POST["apellido"]) ? $_POST["apellido"] : "";
$clave = isset($_POST["clave"]) ? $_POST["clave"] : "";
$perfil = isset($_POST["perfil"]) ? $_POST["perfil"] : "";
$estado = isset($_POST["estado"]) ? $_POST["estado"] : "";
$id = isset($_POST["id"]) ? $_POST["id"] : "";
$tabla = "<table border='1'><thead><th>ID</th><th>Nombre</th><th>Apellido</th><th>Clave</th><th>Perfil</th><th>Estado</th></thead><tbody>";
/* Fin variables necesarias */
try {
    $db = new PDO($con, $user, $pass); //Conecto al servidor de base de datos
} catch (PDOException $e) {
    echo "Error al conectar a la base de datos.";
}
$query = ""; //Aqui guardare las consultas a realizar
$sentencia = null; //Recurso conteniendo la consulta realizada
switch ($option) {
    case "TraerTodos_usuarios":
        $query = "SELECT * FROM `usuarios`";
        $sentencia = $db->prepare($query); //Consulto
        $sentencia->execute();
        while ($row = $sentencia->fetch(PDO::FETCH_NUM) ) { //Obtengo los objetos
            $tabla .= "<tr>";
            foreach ($row as $value) {
                $tabla .= "<td>" . $value . "</td>";
            }
            $tabla .= "</tr>";
        }
        if ( $sentencia->rowCount() == 0) {
            $tabla .= "<tr><td colspan='6'>No hay usuarios cargados.</td></tr>";
        }
        $tabla .= "</tbody></table>";
        echo $tabla;
        break;
    case "TreaerPorId_usuarios":
        $query = "SELECT * FROM `usuarios` where id=:id";
        $sentencia = $db->prepare($query);
        $sentencia->bindParam("id",$id,PDO::PARAM_INT);
        while ($row = $sentencia->fetch()) {
            $tabla .= "<tr>";
            foreach ($row as $cell) {
                $tabla .= "<td>$cell</td>";
            }
            $tabla .= "</tr>";
        }
        if (mysqli_num_rows($sentencia) == 0) {
            $tabla .= "<tr><td colspan='6'>No hay usuarios que cumplan los requisitos.</td></tr>";
        }
        $tabla .= "</tbody></table>";
        echo $tabla;
        break;
    case "TraerPorEstado_usuarios":
        $query = "SELECT * FROM `usuarios` where estado=$estado";
        $sentencia = $db->query($query);
        while ($row = $sentencia->fetch_array(MYSQLI_NUM)) {
            $tabla .= "<tr>";
            foreach ($row as $cell) {
                $tabla .= "<td>$cell</td>";
            }
            $tabla .= "</tr>";
        }
        if (mysqli_num_rows($sentencia) == 0) {
            $tabla .= "<tr><td colspan='6'>No hay usuarios que cumplan los requisitos.</td></tr>";
        }
        $tabla .= "</tbody></table>";
        echo $tabla;
        break;
    case "Agregar_usuarios":
        $query = "INSERT INTO `usuarios`(`nombre`, `apellido`, `clave`, `perfil`, `estado`) VALUES ('$nombre','$apellido','$clave',$perfil,$estado)";
        $sentencia = $db->query($query);
        if ($sentencia !== false) {
            echo "<font color='green'>Usuario agregado con éxito.</font>";
        } else {
            echo "<font color='red'>Se produjo un error al agregar el usuario.</font>";
        }
        break;
    case "Modificar_usuarios":
        $query = "UPDATE `usuarios` SET `nombre`='$nombre', `apellido`='$apellido',`clave`='$clave',`perfil`=$perfil,`estado`=$estado WHERE id=$id";
        $sentencia = $db->query($query);
        if ($sentencia !== false) {
            echo "<font color='green'>Usuario modificado con éxito.</font>";
        } else {
            echo "<font color='red'>Se produjo un error al modificar el usuario.</font>";
        }
        break;
    case "Borrar_usuarios":
        $query = "DELETE FROM `usuarios` WHERE id = $id";
        $sentencia = $db->query($query);
        if ($sentencia !== false) {
            echo "<font color='green'>Usuario borrado con éxito.</font>";
        } else {
            echo "<font color='red'>Se produjo un error al borrar el usuario.</font>";
        }
        break;
}
