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
        $rutaFoto = "";
        if( isset($_FILES["foto"])) {
            $rutaFoto = "./fotos/".$_FILES["foto"]["name"];
            move_uploaded_file($_FILES["foto"]["tmp_name"],$rutaFoto);
        }
        $miUsuario = new Usuario();
        $loginData = json_decode($_POST["loginData"]);
        $miUsuario->nombre = $loginData->nombre;
        $miUsuario->apellido = $loginData->apellido;
        $miUsuario->clave = $loginData->clave;
        $miUsuario->correo = $loginData->correo;
        $miUsuario->perfil = $loginData->perfil;
        $miUsuario->estado = $loginData->estado;
        $miUsuario->pathFoto = $rutaFoto;
        echo $miUsuario->InsertarElUsuario()? "1" : "0";
        
        break;

    case 'modificarUsuario':
        $rutaFoto = "";
        if( isset($_FILES["foto"])) {
            $rutaFoto = "./fotos/".$_FILES["foto"]["name"];
            move_uploaded_file($_FILES["foto"]["tmp_name"],$rutaFoto);
        }
        $id = $_POST['id'];        
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $clave = $_POST['clave'];
        $clave = $_POST['correo'];
        $perfil = $_POST['perfil'];
        $estado = $_POST['estado'];
    
        echo Usuario::ModificarUsuario($id, $nombre, $apellido, $clave,$correo,$perfil,$estado,$rutaFoto)? "1" : "0";
        break;

    case 'eliminarUsuario':
        
        $miUsuario = new Usuario();
        $miUsuario->id = 66;
        
        $miUsuario->eliminarUsuario($miUsuario);

        echo "ok";
        
        break;
    case "existeUsuario":
        $status = "0";
        if( json_decode( Usuario::existeEnBD($_POST["correo"],$_POST["clave"]) )->existe) {
            $status = "1";
        }
        echo $status;
        break;
        
    default:
        echo ":(";
        break;
}
