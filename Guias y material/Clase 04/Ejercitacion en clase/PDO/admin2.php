<?php 
/* Datos de conexion */
$user = "root";
$pass = "";
$con = 'mysql:host=localhost;dbname=mercado;charset=utf8';
/* Variables necesarias */
$option = isset($_POST["option"])? $_POST["option"] : "";
$id = isset($_POST["id"])? $_POST["id"] : "";
$codigoDeBarra = isset($_POST["codigo_barra"])? $_POST["codigo_barra"] : "";
$nombre = isset($_POST["nombre"])? $_POST["nombre"] : "";
$pathFoto = isset($_POST["path_foto"])? $_POST["path_foto"] : "";
/* Fin variables necesarias */
try {
    $db = new PDO($con,$user,$pass); //Conecto al servidor de base de datos
}
catch( PDOException $e) {
    echo "Error al conectar a la base de datos.";
}
$query = ""; //Aqui guardare las consultas a realizar
$tabla = "<table border='1'><thead><tr><th>Id</th><th>Código de barra</th><th>Nombre</th><th>Ruta de la foto</th><th>Foto</th></tr></thead><tbody>";
if( $db ) {
    $rs = null; //Recurso conteniendo la consulta realizada
    switch($option ) {
        case "TraerTodos_productos":
        $query = "SELECT * FROM `productos` ";
        $rs = $db->prepare($query); //Consulto
        $rs->execute();
        while( $row = $rs->fetch(PDO::FETCH_NUM) ) {
            $tabla .= "<tr>";
            for($i = 0 ; $i < count($row) ; $i++ ) {
                $tabla .= "<td>".$row[$i]."</td>";
                if( $i == 3) {
                    $row[$i] = str_replace("\n","",$row[$i]);
                    $tabla .= "<td><img src='".$row[$i]."'></td>";
                }
            }
            $tabla .= "</tr>";
        }
        if($rs->rowCount() == 0)  {
            $tabla .= "<tr><td colspan='6'>No hay productos que cumplan los requisitos.</td></tr>";
        }
        $tabla .= "</tbody></table>";
        echo $tabla;
        break;
        case "TreaerPorId_productos":
        $query = "SELECT * FROM `productos` where id=:id";
        $rs = $db->prepare($query);
        $rs->bindParam("id",$id,PDO::PARAM_INT);
        $rs->execute();
        while( $row = $rs->fetch(PDO::FETCH_NUM)) {
            $tabla .= "<tr>";
            for($i = 0 ; $i < count($row) ; $i++ ) {
                $tabla .= "<td>".$row[$i]."</td>";
                if( $i == 3) {
                    $row[$i] = str_replace("\n","",$row[$i]);
                    $tabla .= "<td><img src='".$row[$i]."'></td>";
                }
            }
            $tabla .= "</tr>";
        }
        if($rs->rowCount() == 0)  {
            $tabla .= "<tr><td colspan='6'>No hay productos que cumplan los requisitos.</td></tr>";
        }
        $tabla .= "</tbody></table>";
        echo $tabla;
        break;
        case "TraerPorNombre_productos":
        $query = "SELECT * FROM `productos` where nombre=:nombre";
        $rs = $db->prepare($query);
        $rs->bindParam("nombre",$nombre,PDO::PARAM_STR);
        $rs->execute();
        while( $row = $rs->fetch(PDO::FETCH_NUM)) {
            $tabla .= "<tr>";
            for($i = 0 ; $i < count($row) ; $i++ ) {
                $tabla .= "<td>".$row[$i]."</td>";
                if( $i == 3) {
                    $row[$i] = str_replace("\n","",$row[$i]);
                    $tabla .= "<td><img src='".$row[$i]."'></td>";
                }
            }
            $tabla .= "</tr>";
        }
        if($rs->rowCount() == 0)  {
            $tabla .= "<tr><td colspan='6'>No hay productos que cumplan los requisitos.</td></tr>";
        }
        $tabla .= "</tbody></table>";
        echo $tabla;
        break;
        case "Agregar_productos":
        $query = "INSERT INTO `productos`(`codigo_barra`, `nombre`, `path_foto`) VALUES (?,?,?)";
        $rs = $db->prepare($query);
        $rs->bindParam(1,$codigoDeBarra,PDO::PARAM_INT);
        $rs->bindParam(2,$nombre,PDO::PARAM_STR);
        $rs->bindParam(3,$pathFoto,PDO::PARAM_STR);
        $rs->execute();
        if($rs->rowCount() == 1)  {
            echo "<font color='green'>Producto agregado con éxito.</font>";
        }
        else {
            echo "<font color='red'>Se produjo un error al agregar el producto.</font>";
        }
        break;
        case "Modificar_productos":
        $query = "UPDATE `productos` SET `codigo_barra`=?, `nombre`=?,`path_foto`=? WHERE id=?";
        $rs = $db->prepare($query);
        $rs->bindParam(1,$codigoDeBarra,PDO::PARAM_INT);
        $rs->bindParam(2,$nombre,PDO::PARAM_STR);
        $rs->bindParam(3,$pathFoto,PDO::PARAM_STR);
        $rs->bindParam(4,$id,PDO::PARAM_INT);
        $rs->execute();
        if($rs->rowCount() == 1)  {
            echo "<font color='green'>Producto modificado con éxito.</font>";
        }
        else {
            echo "<font color='red'>Se produjo un error al modificar el producto.</font>";
        }
        break;
        case "Borrar_productos":
        $query = "DELETE FROM `productos` WHERE id = :id";
        $rs = $db->prepare($query);
        $rs->bindParam("id",$id,PDO::PARAM_INT);
        $rs->execute();
        if($rs->rowCount() == 1)  {
            echo "<font color='green'>Producto borrado con éxito.</font>";
        }
        else {
            echo "<font color='red'>Se produjo un error al borrar el Producto.</font>";
        }
        break;
    }
}
?>