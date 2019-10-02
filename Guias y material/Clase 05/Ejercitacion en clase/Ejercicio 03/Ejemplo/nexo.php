<?php

include_once ("AccesoDatos.php");
include_once ("cd.php");

$op = isset($_POST['op']) ? $_POST['op'] : NULL;

switch ($op) {
    case 'accesoDatos':
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta = $objetoAccesoDato->RetornarConsulta("select titel AS titulo, interpret AS interprete, jahr AS anio "
                                                        . "FROM cds");
        $consulta->execute();
        
        $consulta->setFetchMode(PDO::FETCH_INTO, new cd);
        
        foreach ($consulta as $cd) {
        
            print_r($cd->MostrarDatos());
            print("
                    ");
        }

        break;
 
    case 'mostrarTodos':

        $usuarios = usuario::TraerTodosLosUsuarios();
        
        foreach ($usuarios as $usuario) {
            
            print_r($usuario->MostrarDatos());
            print("");
        }
    
        break;

    case 'insertarUsuario':
    
        $miUsuario = new usuario();
        $miUsuario->id = 66;
        $miUsuario->titulo = "Un titulo";
        $miUsuario->anio = 2018;
        $miUsuario->interprete = "Un cantante";
        
        $miUsuario->InsertarElUsuario();

        echo "ok";
        
        break;

    case 'modificarUsuario':
    
        $id = $_POST['id'];        
        $titulo = $_POST['titulo'];
        $anio = $_POST['anio'];
        $interprete = $_POST['interprete'];
    
        echo usuario::ModificarUsuario($nombre, $apellido, $clave, $perfil,$estado,$correo);
            
        break;

    case 'eliminarCd':
    
        $miUsuario = new usuario();
        $miUsuario->id = 66;
        
        $miUsuario->EliminarUsuario($miUsuario);

        echo "ok";
        
        break;
        
        
    default:
        echo ":(";
        break;
}
