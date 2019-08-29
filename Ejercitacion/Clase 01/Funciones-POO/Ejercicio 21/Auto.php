<?php
class Auto {
    //atributos
    private $_marca;
    private $_color;
    private $_precio;
    private $_fecha;
    //Constructor
    public function __construct($marca , $color, $precio = 0, $fecha = "" ) {
        $this->_marca = $marca;
        $this->_color = $color;
        $this->_precio = ($precio < 0)? 0 : $precio;
        $this->_fecha = $fecha;
    }
    //Metodos de clase
    public static function mostrarAuto($auto) {
        return "Auto:<br>Marca: $auto->_marca.<br>Color: $auto->_color.<br>Precio: $auto->_precio."
        ."<br>Fecha: $auto->_fecha.<br>";
    }
    public static function add($auto1 , $auto2) {
        $sumaPrecios = 0;
        if($auto1->_marca == $auto2->_marca && $auto1->_color == $auto2->_color) {
            $sumaPrecios = $auto1->_precio + $auto2->_precio;
        }
        else {
            echo "No se pueden sumar los objetos auto.<br>";
        }
        return $sumaPrecios;
    }
    //Metodos de instancia
    public function agregarImpuestos($impuesto) {
        $this->_precio += $impuesto;
    }
    public function equals($auto1 , $auto2) {
        return $auto1->_marca == $auto2->_marca;
    }
}
?>