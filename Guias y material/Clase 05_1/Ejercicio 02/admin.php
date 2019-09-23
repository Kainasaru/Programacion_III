<?php 
/* Datos de conexion */
$conStr = "mysql:host=localhost;dbname=mercado;charset=utf8";
$user = "root";
$pass = "";
/* Variables necesarias */
$option = isset($_POST["option"])? $_POST["option"] : "";
$nombre = isset($_POST["nombre"])? $_POST["nombre"] : "";
$apellido = isset($_POST["apellido"])? $_POST["apellido"] : "";
$clave = isset($_POST["clave"])? $_POST["clave"] : "";
$perfil = isset($_POST["perfil"])? $_POST["perfil"] : "";
$estado = isset($_POST["estado"])? $_POST["estado"] : "";
$id = isset($_POST["id"])? $_POST["id"] : "";
$tabla = "<table><thead><th>ID</th><th>Nombre</th><th>Apellido</th><th>Clave</th><th>Perfil</th><th>Estado</th></thead><tbody>";
/* Fin variables necesarias */
try {
    $pdo = new PDO($conStr,$user,$pass); //Conecto al servidor de base de datos
    $query = ""; //Aqui guardare las consultas a realizar
    if( $pdo ) {
        $rs = null; //Recurso conteniendo la consulta realizada
        switch($option ) {
            case "TraerTodos_usuarios":
            $query = "SELECT * FROM `usuarios`";
            $rs = $pdo->Prepare($query); //Consulto
            $rs->execute();
            while( $row = $rs->fetch(PDO::FETCH_NUM)) { //Obtengo los objetos
                $tabla .= "<tr>";
                foreach($row as $value) {
                    $tabla .= "<td>$value</td>";
                }
                $tabla .= "</tr>";
            }
            $tabla .= "</tbody></table>";
            echo $tabla;
            break;
            case "TreaerPorId_usuarios":
            $query = "SELECT * FROM `usuarios` where id = :id";
            $rs = $pdo->prepare($query);
            $rs->bindParam(":id",intval($_POST["id"]),PDO::PARAM_INT);
            $rs->execute();
            while( $row = $rs->fetch(PDO::FETCH_NUM)  ) {
                $tabla .= "<tr>";
                foreach($row as $value) {
                    $tabla .= "<td>$value</td>";
                }
                $tabla .= "</tr>";
            }
            $tabla .= "</tbody></table>";
            echo $tabla;
            break;
            case "TraerPorEstado_usuarios":
            $query = "SELECT * FROM `usuarios` where estado=:estado";
            $rs = $pdo->prepare($query);
            $rs->bindParam(":estado",intval($_POST["estado"]),PDO::PARAM_INT);
            $rs->execute();
            while( $row = $rs->fetch(PDO::FETCH_NUM)  ) {
                $tabla .= "<tr>";
                foreach($row as $value) {
                    $tabla .= "<td>$value</td>";
                }
                $tabla .= "</tr>";
            }
            $tabla .= "</tbody></table>";
            echo $tabla;
            break;
            case "Agregar_usuarios":
            $query = "INSERT INTO `usuarios`(`nombre`, `apellido`, `clave`, `perfil`, `estado`) VALUES (?,?,?,?,?)";
            $rs = $pdo->prepare($query);
            $rs->bindParam(1,$_POST["nombre"],PDO::PARAM_STR);
            $rs->bindParam(2,$_POST["apellido"],PDO::PARAM_STR);
            $rs->bindParam(3,$_POST["clave"],PDO::PARAM_STR);
            $rs->bindParam(4,$_POST["perfil"],PDO::PARAM_INT);
            $rs->bindParam(5,$_POST["estado"],PDO::PARAM_INT);
            $rs->execute();
            break;/*
            case "Modificar_usuarios":
            $query = "UPDATE `usuarios` SET `nombre`='$nombre', `apellido`='$apellido',`clave`='$clave',`perfil`=$perfil,`estado`=$estado WHERE id=$id";
            $rs = $pdo->query($query);
            break;
            case "Borrar_usuarios":
            $query = "DELETE FROM `usuarios` WHERE id = $id";
            $rs = $pdo->query($query);
            break;*/
        }
    }
}   
catch(PDOException $e) {
    echo $e->getMessage();
}

?>