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

    public function MostrarDatos()
    {
        return $this->id." - ".$this->nombre." - ".$this->apellido." - ".$this->clave." - ".$this->correo." - ".$this->perfil." - ".
        $this->estado;
    }
    
    public static function TraerTodosLosUsuarios()
    {    
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * from `usuarios`");        
        
        $consulta->execute();
        
        $consulta->setFetchMode(PDO::FETCH_INTO, new Usuario() );                                                

        return $consulta; 
    }
    
    public function InsertarElUsuario()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO `usuarios` (id, nombre, apellido, clave, correo , perfil, estado)"
        . "VALUES(:id, :nombre, :apellido, :clave, :correo , :perfil, :estado)");
        
        $consulta->bindValue(':id', $this->id, PDO::PARAM_INT);
        $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
        $consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);
        $consulta->bindValue(':correo', $this->correo, PDO::PARAM_STR);
        $consulta->bindValue(':perfil', $this->perfil, PDO::PARAM_INT);
        $consulta->bindValue(':estado', $this->estado, PDO::PARAM_INT);

        $consulta->execute();   

    }
    
    public static function ModificarUsuario($id, $nombre, $apellido, $clave,$correo ,$perfil,$estado)
    {

        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE `usuarios` SET nombre = :nombre, apellido = :apellido,". 
        "clave = :clave, correo = :correo, perfil = :perfil, estado = :estado WHERE id = :id");
        
        $consulta->bindValue(':id', $id, PDO::PARAM_INT);
        $consulta->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $consulta->bindValue(':apellido', $apellido, PDO::PARAM_STR);
        $consulta->bindValue(':clave', $clave, PDO::PARAM_STR);
        $consulta->bindValue(':correo', $correo, PDO::PARAM_STR);
        $consulta->bindValue(':perfil', $perfil, PDO::PARAM_INT);
        $consulta->bindValue(':estado', $estado, PDO::PARAM_INT);

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
        $consulta = $con->RetornarConsulta("SELECT nombre FROM `usuarios` WHERE clave = :clave AND correo = :correo");
        $consulta->bindValue("clave",$clave,PDO::PARAM_STR);
        $consulta->bindValue("correo",$correo,PDO::PARAM_STR);
        $consulta->execute();
        return ($consulta->rowCount() == 0)? false : true;
    }
    
}