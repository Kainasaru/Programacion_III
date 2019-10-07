<?php
class Usuario
{
    public $id;
    public $nombre;
    public $apellido;
    public $clave;
    public $correo;
    public $perfil;
    public $estado;
    public $pathFoto;

    public function MostrarDatos()
    {
        return $this->id." - ".$this->nombre." - ".$this->apellido." - ".$this->clave." - ".$this->correo." - ".$this->perfil." - ".
        $this->estado." - ".$this->pathFoto;
    }
    
    public static function TraerTodosLosUsuarios()
    {    
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * from `usuarios`");        
        
        $consulta->execute();
        
        $consulta->setFetchMode(PDO::FETCH_INTO, new Usuario() );                                                

        return $consulta; 
    }

    public static function TraerUsuarioPorId($id)
    {    
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * from `usuarios` WHERE id=:id");        
        $consulta->bindValue("id",$id,PDO::PARAM_INT);
        $consulta->execute();
        
        $consulta->setFetchMode(PDO::FETCH_INTO, new Usuario() );                                                

        return $consulta; 
    }
    
    public function InsertarElUsuario()
    {
        $result = Usuario::existeCorreoEnBD($this->correo);
        if( !$result) {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            
            $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO `usuarios` ( nombre, apellido, clave, correo , perfil, estado, pathFoto)"
            . "VALUES(:nombre, :apellido, :clave, :correo , :perfil, :estado,:pathFoto)");
            
            $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
            $consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
            $consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);
            $consulta->bindValue(':correo', $this->correo, PDO::PARAM_STR);
            $consulta->bindValue(':perfil', $this->perfil, PDO::PARAM_INT);
            $consulta->bindValue(':estado', $this->estado, PDO::PARAM_INT);
            $consulta->bindValue(':pathFoto', $this->pathFoto, PDO::PARAM_STR);
            $consulta->execute();
        }
        return !$result;   

    }
    
    public static function ModificarUsuario($id, $nombre, $apellido, $clave,$correo ,$perfil,$estado,$pathFoto)
    {

        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE `usuarios` SET nombre = :nombre, apellido = :apellido,". 
        "clave = :clave, correo = :correo, perfil = :perfil, estado = :estado,pathFoto = :pathFoto WHERE id = :id");
        $usuario = Usuario::TraerUsuarioPorId($id)->fetch();
        if( $pathFoto == "" || $usuario->pathfoto != $pathFoto ) {
            unlink($usuario->pathFoto);
        }
        $consulta->bindValue(':id', $id, PDO::PARAM_INT);
        $consulta->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $consulta->bindValue(':apellido', $apellido, PDO::PARAM_STR);
        $consulta->bindValue(':clave', $clave, PDO::PARAM_STR);
        $consulta->bindValue(':correo', $correo, PDO::PARAM_STR);
        $consulta->bindValue(':perfil', $perfil, PDO::PARAM_INT);
        $consulta->bindValue(':estado', $estado, PDO::PARAM_INT);
        $consulta->bindValue(':pathFoto', $pathFoto, PDO::PARAM_STR);

        return $consulta->execute();

    }

    public static function EliminarUsuario($usuario)
    {

        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM `usuarios` WHERE id = :id");
        
        $consulta->bindValue(':id', $usuario->id, PDO::PARAM_INT);

        return $consulta->execute();

    }

    public static function existeEnBD($correo,$clave) {
        $con = AccesoDatos::DameUnObjetoAcceso();
        $consulta = $con->RetornarConsulta("SELECT * FROM `usuarios` WHERE clave = :clave AND correo = :correo");
        $consulta->bindValue("clave",$clave,PDO::PARAM_STR);
        $consulta->bindValue("correo",$correo,PDO::PARAM_STR);
        $consulta->execute();
        $json = new stdClass();
        $json->existe = false;
        $json->usuario = null;
        if($consulta->rowCount() == 1 ) {
            $json->existe = true;   
            $json->usuario = $consulta->fetch(PDO::FETCH_OBJ);
        }
        return json_encode($json);
    }

    public static function existeCorreoEnBD($correo) {
        $con = AccesoDatos::DameUnObjetoAcceso();
        $consulta = $con->RetornarConsulta("SELECT correo FROM `usuarios` WHERE correo = :correo ");
        $consulta->bindValue("correo",$correo,PDO::PARAM_STR);
        $consulta->execute();
        return ($consulta->rowCount() == 0)? false : true;
    }
    
}