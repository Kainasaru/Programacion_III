<?php
require ".\Clases\Producto.php";
require ".\Clases\Archivo.php";
$option = isset($_POST["option"]) ? $_POST["option"] : "";
switch ($option) {
    case 'ALTA':
        $destino = "./Archivos/images/" . $_FILES["archivo"]["name"];
        $ok = false;
        if (Archivo::subir()) {
            $producto = new Producto($_POST["name"], $_POST["codBarra"], $destino);
            if ($producto::Guardar($producto)) {
                $ok = true;
            }
        }
        if ($ok) {
            echo "Se guardó el producto correctamente.";
        } else {
            echo "Se produjo un error.";
        }
        break;
    case 'MOSTRAR':
        $tabla = "<table border='1'><thead><th>Nombre</th><th>Cod barra</th><th>Foto</th><thead><tbody>";
        foreach (Producto::traerTodosLosProductos() as $producto) {
            $tabla .= "<tr><td>" . $producto->getNombre() . "</td>";
            $tabla .= "<td>" . $producto->getCodBarra() . "</td>";
            $tabla .= "<td><img src='" . $producto->getPathFoto() . "' width='353px' height='353px'></td></tr>";
        }
        $tabla .= "</tbody></table>";
        echo "<a href='./index.php'><h1>Volver</h1></a>";
        echo $tabla;
        break;

    default:
        $tabla = "";
        break;
}
