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
    $query = ""; //Aqui guardare las consultas a realizar
    $sentencia = null; //Recurso conteniendo la consulta realizada
    $db = new PDO($con, $user, $pass); //Conecto al servidor de base de datos
    switch ($option) {
        case "TraerTodos_usuarios":
            $query = "SELECT * FROM `usuarios`";
            $sentencia = $db->prepare($query); //Consulto
            $sentencia->execute();
            while ($row = $sentencia->fetch(PDO::FETCH_NUM)) { //Obtengo los objetos
                $tabla .= "<tr>";
                foreach ($row as $value) {
                    $tabla .= "<td>" . $value . "</td>";
                }
                $tabla .= "</tr>";
            }
            if ($sentencia->rowCount() == 0) {
                $tabla .= "<tr><td colspan='6'>No hay usuarios cargados.</td></tr>";
            }
            $tabla .= "</tbody></table>";
            echo $tabla;
            break;
        case "TreaerPorId_usuarios":
            $query = "SELECT * FROM `usuarios` where id=:id";
            $sentencia = $db->prepare($query);
            $sentencia->bindParam("id", $id, PDO::PARAM_INT);
            $sentencia->execute();
            while ($row = $sentencia->fetch(PDO::FETCH_NUM)) {
                $tabla .= "<tr>";
                foreach ($row as $cell) {
                    $tabla .= "<td>$cell</td>";
                }
                $tabla .= "</tr>";
            }
            if ($sentencia->rowCount() == 0) {
                $tabla .= "<tr><td colspan='6'>No hay usuarios que cumplan los requisitos.</td></tr>";
            }
            $tabla .= "</tbody></table>";
            echo $tabla;
            break;
        case "TraerPorEstado_usuarios":
            $query = "SELECT * FROM `usuarios` where estado=:estado";
            $sentencia = $db->prepare($query);
            $sentencia->bindParam("estado", $estado, PDO::PARAM_INT);
            $sentencia->execute();
            while ($row = $sentencia->fetch(PDO::FETCH_NUM)) {
                $tabla .= "<tr>";
                foreach ($row as $cell) {
                    $tabla .= "<td>$cell</td>";
                }
                $tabla .= "</tr>";
            }
            if ($sentencia->rowCount() == 0) {
                $tabla .= "<tr><td colspan='6'>No hay usuarios que cumplan los requisitos.</td></tr>";
            }
            $tabla .= "</tbody></table>";
            echo $tabla;
            break;
        case "Agregar_usuarios":
            $query = "INSERT INTO `usuarios`(`nombre`, `apellido`, `clave`, `perfil`, `estado`) VALUES (?,?,?,?,?)";
            $sentencia = $db->prepare($query);
            $sentencia->bindParam(1, $nombre, PDO::PARAM_STR);
            $sentencia->bindParam(2, $apellido, PDO::PARAM_STR);
            $sentencia->bindParam(3, $clave, PDO::PARAM_STR);
            $sentencia->bindParam(4, $perfil, PDO::PARAM_INT);
            $sentencia->bindParam(5, $estado, PDO::PARAM_INT);
            $sentencia->execute();
            if ($sentencia->rowCount() == 1) {
                echo "<font color='green'>Usuario agregado con éxito.</font>";
            } else {
                echo "<font color='red'>Se produjo un error al agregar el usuario.</font>";
            }
            break;
        case "Modificar_usuarios":
            $query = "UPDATE `usuarios` SET `nombre`=?,`apellido`=?,`clave`=?,`perfil`=?,`estado`=? WHERE id=?";
            $sentencia = $db->prepare($query);
            $sentencia->bindParam(1, $nombre, PDO::PARAM_STR);
            $sentencia->bindParam(2, $apellido, PDO::PARAM_STR);
            $sentencia->bindParam(3, $clave, PDO::PARAM_STR);
            $sentencia->bindParam(4, $perfil, PDO::PARAM_INT);
            $sentencia->bindParam(5, $estado, PDO::PARAM_INT);
            $sentencia->bindParam(6, $id, PDO::PARAM_INT);
            $sentencia->execute();
            if ($sentencia->rowCount() == 1) {
                echo "<font color='green'>Usuario modificado con éxito.</font>";
            } else {
                echo "<font color='red'>Se produjo un error al modificar el usuario.</font>";
            }
            break;
        case "Borrar_usuarios":
            $query = "DELETE FROM `usuarios` WHERE id = :id";
            $sentencia = $db->prepare($query);
            $sentencia->bindParam("id", $id, pdo::PARAM_INT);
            $sentencia->execute();
            $r4 =  $sentencia->rowCount();
            if ($sentencia->rowCount() == 1) {
                echo "<font color='green'>Usuario borrado con éxito.</font>";
            } else {
                echo "<font color='red'>Se produjo un error al borrar el usuario.</font>";
            }
            break;
    }
} catch (PDOException $e) {
    echo "Error al conectar a la base de datos.";
}
