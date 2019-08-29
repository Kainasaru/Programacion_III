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
abstract class FiguraGeometrica {
    //Atrbiutos
    protected $_color;
    protected $_perimetro;
    protected $_superficie;
    //Constructor
    public function __construct($color = "black")
    {
        $this->setColor($color);
    }
    //Getters y Setters
    public function getColor() {
        return $this->_color;
        
    }
    public function setColor($color) {
        $this->_color = $color;
    }
    //Metodos
    protected abstract function calcularDatos();
    public abstract function dibujar();
    public function toString() {
        return "Color: ".$this->getColor().".<br>Per&iacute;metro: $this->_perimetro - Superficie: $this->_superficie.<br>";
    }
}
?>