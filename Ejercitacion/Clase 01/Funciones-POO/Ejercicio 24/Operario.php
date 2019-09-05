<?php 
class Operario {
    //Atributos
    private $_apellido;
    private $_legajo;
    private $_nombre;
    private $_salario;
    //Constructor
    public function __construct($legajo, $apellido , $nombre)
    {
        $this->_legajo = $legajo;
        $this->_apellido = $apellido;
        $this->_nombre = $nombre;
        $this->_salario = null;
    }
    //Getters y setters
    public function getNombreApellido() {
        return "Apellido y nombre: $this->_apellido, $this->_nombre.<br/>";
    }
    public function getSalario() {
        return $this->_salario;
    }
    public function setAumentarSalario($aumento) {
        $this->_salario = ($this->getSalario() == null)? $aumento : $this->getSalario() * (1 + $aumento / 100);
    }
    //Metodos de clase
    public static function mostrarOperario($operario) {
        return $operario->mostrar();
    }
    //Metodos de instancia
    public function equals($op1,$op2) {
        return $op1->_nombre == $op2->_nombre && $op1->_apellido == $op2->_apellido && $op1->_legajo == $op2->_legajo;
    }
    public function mostrar() {
        $info = $this->getNombreApellido();
        $info .= "Legajo: $this->_legajo.<br/>";
        $info .= "Salario: ".$this->getSalario()."<br/>";
        return $info;
    }
    
    
    
}
