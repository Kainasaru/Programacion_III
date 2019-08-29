<?php 
require_once "./FiguraGeometrica.php";
class Triangulo extends FiguraGeometrica{
    //Atrbiutos
    private $_altura;
    private $_base;
    //Constructor
    public function __construct($b, $h, $color)
    {
        parent::__construct($color);
        $this->_base = abs($b);
        $this->_altura = abs($h);
        $this->calcularDatos();
    }
    //Metodos
    protected function calcularDatos() {
        $this->_perimetro = "No se puede calcular";
        $this->_superficie = $this->_base * $this->_altura / 2;
    }
    function dibujar() {
        $dibujo = "";
        $asteriscos = 1;
        for($i = 0 ; $i < $this->_altura ; $i++ ) {
            $dibujo .= ($i == $this->_altura - 1 )? str_repeat("*",$this->_base)."<br>" : str_repeat("*",$asteriscos)."<br>";
            $asteriscos = ($asteriscos >= $this->_base - 1 )? $this->_base : $asteriscos + 1 ;
        }
        return $dibujo;
    }
    function toString() {
        $info = "Tri&aacute;ngulo<br>Base: $this->_base. - Altura: $this->_altura.<br>".parent::toString();
        $info .= $this->dibujar();
        return $info;
    }
}
?>