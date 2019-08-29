<?php
/*Aplicación Nº 19 (Figuras geométricas)
La clase FiguraGeometrica posee: todos sus atributos protegidos, un constructor por defecto, 
un método getter y setter para el atributo _color, un método virtual (ToString) y dos métodos
 abstractos: Dibujar (público) y CalcularDatos (protegido).
CalcularDatos será invocado en el constructor de la clase derivada que corresponda, 
su funcionalidad será la de inicializar los atributos _superficie y _perimetro.
Dibujar, retornará un string (con el color que corresponda) formando la 
figura geométrica del objeto. Utilizar el método ToString para obtener toda la información completa del objeto
, y luego dibujarlo por pantalla.*/
require_once "./FiguraGeometrica.php";
class Rectangulo extends FiguraGeometrica {
    //Atributos
    private $_ladoDos;
    private $_ladoUno;
    //Constructor
    public function __construct($l1 , $l2 , $color )
    {
        parent::__construct($color);
        $this->_ladoUno = abs($l1);
        $this->_ladoDos = abs($l2);
        $this->calcularDatos();
    }
    //Metodos
    protected function calcularDatos() {
        $this->_perimetro = 2 * ($this->_ladoUno + $this->_ladoDos);
        $this->_superficie = $this->_ladoUno * $this->_ladoDos;
    }
    function dibujar() {
        $dibujo = "";
        for($i = 0 ; $i < $this->_ladoDos ; $i++ ) {
            $dibujo .= str_repeat("*",$this->_ladoUno)."<br>";
        }
        return $dibujo;
    }
    function toString() {
        $info = "Rect&aacute;ngulo<br>Lado uno: $this->_ladoUno. - Lado dos: $this->_ladoDos.<br>".parent::toString();
        $info .= $this->dibujar();
        return $info;
    }
}
?>