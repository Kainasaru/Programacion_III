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

        $cds = cd::TraerTodosLosCd();
        
        foreach ($cds as $cd) {
            
            print_r($cd->MostrarDatos());
            print("
                    ");
        }
    
        break;

    case 'insertarCd':
    
        $miCD = new cd();
        $miCD->id = 66;
        $miCD->titulo = "Un titulo";
        $miCD->anio = 2018;
        $miCD->interprete = "Un cantante";
        
        $miCD->InsertarElCD();

        echo "ok";
        
        break;

    case 'modificarCd':
    
        $id = $_POST['id'];        
        $titulo = $_POST['titulo'];
        $anio = $_POST['anio'];
        $interprete = $_POST['interprete'];
    
        echo cd::ModificarCD($id, $titulo, $anio, $interprete);
            
        break;

    case 'eliminarCd':
    
        $miCD = new cd();
        $miCD->id = 66;
        
        $miCD->EliminarCD($miCD);

        echo "ok";
        
        break;
        
        
    default:
        echo ":(";
        break;
}
