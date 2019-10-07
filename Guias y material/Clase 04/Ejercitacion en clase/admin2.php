<?php
/* Datos de conexion */
$host = "localhost";
$user = "root";
$pass = "";
$base = "mercado";
/* Variables necesarias */
$option = isset($_POST["option"]) ? $_POST["option"] : "";
$id = isset($_POST["id"]) ? $_POST["id"] : "";
$codigoDeBarra = isset($_POST["codigo_barra"]) ? $_POST["codigo_barra"] : "";
$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
$pathFoto = isset($_POST["path_foto"]) ? $_POST["path_foto"] : "";
/* Fin variables necesarias */
$connection = mysqli_connect($host, $user, $pass, $base); //Conecto al servidor de base de datos
if ($connection) {
    $query = ""; //Aqui guardare las consultas a realizar
    $tabla = "<table border='1'><thead><tr><th>Id</th><th>Código de barra</th><th>Nombre</th><th>Ruta de la foto</th><th>Foto</th></tr></thead><tbody>";
    $rs = null; //Recurso conteniendo la consulta realizada
    switch ($option) {
        case "TraerTodos_productos":
            $query = "SELECT * FROM `productos` ";
            $rs = $connection->query($query); //Consulto
            while ($row = $rs->fetch_array(MYSQLI_NUM)) {
                $tabla .= "<tr>";
                for ($i = 0; $i < count($row); $i++) {
                    $tabla .= "<td>" . $row[$i] . "</td>";
                    if ($i == 3) {
                        $row[$i] = str_replace("\n", "", $row[$i]);
                        $tabla .= "<td><img src='" . $row[$i] . "'></td>";
                    }
                }
                $tabla .= "</tr>";
            }
            if (mysqli_num_rows($rs) == 0) {
                $tabla .= "<tr><td colspan='6'>No hay productos que cumplan los requisitos.</td></tr>";
            }
            $tabla .= "</tbody></table>";
            echo $tabla;
            break;
        case "TreaerPorId_productos":
            $query = "SELECT * FROM `productos` where id='$id'";
            $rs = $connection->query($query);
            while ($row = $rs->fetch_array(MYSQLI_NUM)) {
                $tabla .= "<tr>";
                for ($i = 0; $i < count($row); $i++) {
                    $tabla .= "<td>" . $row[$i] . "</td>";
                    if ($i == 3) {
                        $row[$i] = str_replace("\n", "", $row[$i]);
                        $tabla .= "<td><img src='" . $row[$i] . "'></td>";
                    }
                }
                $tabla .= "</tr>";
            }
            if (mysqli_num_rows($rs) == 0) {
                $tabla .= "<tr><td colspan='6'>No hay productos que cumplan los requisitos.</td></tr>";
            }
            $tabla .= "</tbody></table>";
            echo $tabla;
            break;
        case "TraerPorNombre_productos":
            $query = "SELECT * FROM `productos` where nombre='$nombre'";
            $rs = $connection->query($query);
            while ($row = $rs->fetch_array(MYSQLI_NUM)) {
                $tabla .= "<tr>";
                for ($i = 0; $i < count($row); $i++) {
                    $tabla .= "<td>" . $row[$i] . "</td>";
                    if ($i == 3) {
                        $row[$i] = str_replace("\n", "", $row[$i]);
                        $tabla .= "<td><img src='" . $row[$i] . "'></td>";
                    }
                }
                $tabla .= "</tr>";
            }
            if (mysqli_num_rows($rs) == 0) {
                $tabla .= "<tr><td colspan='6'>No hay productos que cumplan los requisitos.</td></tr>";
            }
            $tabla .= "</tbody></table>";
            echo $tabla;
            break;
        case "Agregar_productos":
            $query = "INSERT INTO `productos`(`codigo_barra`, `nombre`, `path_foto`) VALUES ('$codigoDeBarra','$nombre','$pathFoto')";
            $rs = $connection->query($query);
            if ($rs === true) {
                echo "<font color='green'>Producto agregado con éxito.</font>";
            } else {
                echo "<font color='red'>Se produjo un error al agregar el producto.</font>";
            }
            break;
        case "Modificar_productos":
            $query = "UPDATE `productos` SET `codigo_barra`='$codigoDeBarra', `nombre`='$nombre',`path_foto`='$pathFoto' WHERE id=$id";
            $rs = $connection->query($query);
            if (mysqli_affected_rows($connection) > 0) {
                echo "<font color='green'>Producto modificado con éxito.</font>";
            } else {
                echo "<font color='red'>Se produjo un error al modificar el producto.</font>";
            }
            break;
        case "Borrar_productos":
            $query = "DELETE FROM `productos` WHERE id = $id";
            $rs = $connection->query($query);
            if (mysqli_affected_rows($connection) > 0) {
                echo "<font color='green'>Producto borrado con éxito.</font>";
            } else {
                echo "<font color='red'>Se produjo un error al borrar el Producto.</font>";
            }
            break;
    }
}
mysqli_close($connection); //Cierro la conexion con el servidor de base de datos
?>