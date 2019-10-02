<?php
class usuario
{
    public $id;
    public $nombre;
    public $apellido;
    public $clave;
    public $perfil;
    public $estado;
    public $correo;

    public function MostrarDatos()
    {
        return $this->id." - ".$this->nombre." - ".$this->apellido." - ".$this->clave." - ".
        $this->perfil." - ".$this->estado." - ".$this->correo;
    }
    
    public static function TraerTodosLosUsuarios()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM usuarios");        
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_INTO, new usuario);                                                
        return $consulta; 
    }
    
    public function InsertarElUsuario()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO usuarios (id, nombre, apellido, clave, perfil, estado, correo)"
                                                    . "VALUES(:id, :nombre, :apellido, :clave, :perfil, :estado, :correo)");
        
        $consulta->bindValue(':id', $this->id, PDO::PARAM_INT);
        $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
        $consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);
        $consulta->bindValue(':perfil', $this->perfil, PDO::PARAM_INT);
        $consulta->bindValue(':estado', $this->estado, PDO::PARAM_INT);
        $consulta->bindValue(':correo', $this->correo, PDO::PARAM_STR);
        $consulta->execute();   
    }
    
    public static function ModificarUsuario($id, $nombre, $apellido, $clave, $perfil, $estado, $correo)
    {

        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta = $objetoAccesoDato->RetornarConsulta("UPDATE usuarios SET nombre = :nombre, apellido = :apellido, 
                                                        clave = :clave, perfil = :perfil, estado =:estado, correo = :correo WHERE id = :id");
        $consulta->bindValue(':id', $id, PDO::PARAM_INT);
        $consulta->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $consulta->bindValue(':apellido', $apellido, PDO::PARAM_STR);
        $consulta->bindValue(':clave', $clave, PDO::PARAM_STR);
        $consulta->bindValue(':perfil', $perfil, PDO::PARAM_INT);
        $consulta->bindValue(':estado', $estado, PDO::PARAM_INT);
        $consulta->bindValue(':correo', $correo, PDO::PARAM_STR);


        return $consulta->execute();

    }

    public static function EliminarCD($cd)
    {

        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM usuarios WHERE id = :id");
        
        $consulta->bindValue(':id', $cd->id, PDO::PARAM_INT);

        return $consulta->execute();

    }
    
}
?>