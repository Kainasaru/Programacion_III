<?php
require ".\Clases\Producto.php";
require ".\Clases\Archivo.php";

    $option = "MOSTRAR";

    switch ($option) {
        case 'ALTA':
            $destino = "./Archivos/images/".$_FILES["archivo"]["name"];
            $ok = false;
            if(Archivo::subir() ) {
                $producto = new Producto($_POST["name"], $_POST["codBarra"],$destino);
                if( $producto::Guardar($producto) ) {
                    $ok = true;
                }
            }  
            if($ok) {
                echo "Se guardó el producto correctamente.";
            }
            else {
                echo "Se produjo un error.";
            }
            break;
        case 'MOSTRAR':
            $tabla = "<table border='1'><thead><th>Nombre</th><th>Cod barra</th><th>Foto</th><thead><tbody>";
            foreach(Producto::traerTodosLosProductos() as $producto) {
                $tabla .= "<tr><td>".$producto->getNombre()."</td>";
                $tabla .= "<td>".$producto->getCodBarra()."</td>";
                $tabla .= "<td><img src='".$producto->getPathFoto()."'></td></tr>";
            }
            $tabla .= "</tbody></table>";
            echo $tabla;
            break;
        
        default:

            break;
    }

?>