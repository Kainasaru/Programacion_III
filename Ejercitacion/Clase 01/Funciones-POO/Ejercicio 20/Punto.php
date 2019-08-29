<?php 
/*La clase Punto ha de tener dos atributos privados con acceso de sólo 
lectura (sólo con getters), que serán las coordenadas del punto.
 Su constructor recibirá las coordenadas del punto.*/
class Punto {
    //Atributos
    private $_x; 
    private $_y; 
    //Constructor   
    public function __construct($x,$y) {
        $this->_x = $x;
        $this->_y = $y;
    }
    //Getters
    public function getX() {
        return $this->_x;
    }
    public function getY() {
        return $this->_y;
    }
}
?>