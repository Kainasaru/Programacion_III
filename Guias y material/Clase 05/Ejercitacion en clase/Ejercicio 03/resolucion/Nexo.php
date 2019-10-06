<?php

include_once ("AccesoDatos.php");
include_once ("usuarios.php");

$op = isset($_POST['option']) ? $_POST['option'] : NULL;

switch ($op) {
    case 'accesoDatos':
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * from `usuarios`");
        $consulta->execute();
        
        $consulta->setFetchMode(PDO::FETCH_INTO, new Usuario());
        
        foreach ($consulta as $usuario) {
        
            print_r($usuario->MostrarDatos());
            print("<br/>");
        }

        break;
 
    case 'mostrarTodos':

        $usuarios = Usuario::TraerTodosLosUsuarios();
        foreach ($usuarios as $usuario) {
            
            print_r($usuario->MostrarDatos());
            print("<br/>");
        }
    
        break;

    case 'insertarUsuario':
    
        $miUsuario = new Usuario();
        $miUsuario->id = 66;
        $miUsuario->nombre = "Anibal";
        $miUsuario->apellido = "Ariman";
        $miUsuario->clave = "1234";
        $miUsuario->correo = "spore2@gmail.com";
        $miUsuario->perfil = 22;
        $miUsuario->estado = 1;
        
        $miUsuario->InsertarElUsuario();

        echo "ok";
        
        break;

    case 'modificarUsuario':
    
        $id = $_POST['id'];        
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $clave = $_POST['clave'];
        $clave = $_POST['correo'];
        $perfil = $_POST['perfil'];
        $estado = $_POST['estado'];
    
        echo Usuario::ModificarUsuario($id, $nombre, $apellido, $clave,$correo,$perfil,$estado);
        break;

    case 'eliminarUsuario':
    
        $miUsuario = new Usuario();
        $miUsuario->id = 66;
        
        $miUsuario->eliminarUsuario($miUsuario);

        echo "ok";
        
        break;
    case "existeUsuario":
        echo Usuario::existeEnBD($_POST["correo"],$_POST["clave"])? "Existe.":"No existe.";
        break;
        
    default:
        echo ":(";
        break;
}
