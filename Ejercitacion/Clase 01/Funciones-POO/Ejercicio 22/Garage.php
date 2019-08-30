<?php
/* Aplicación Nº 22 (Auto - Garage)
En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos los métodos.*/
require_once "../Ejercicio 21/Auto.php";
class Garage {
    //Atributos
    private $_razonSocial;
    private $_precioPorHora;
    private $_autos;
    //Constructor
    public function __construct($razonSocial , $precioPorHora = 0) {
        $this->_razonSocial = $razonSocial;
        $this->_precioPorHora = $precioPorHora;
        $this->_autos = array();
    }
    //Metodos de instancia
    public function mostrarGarage() {
        echo "Garage:<br>Raz&oacute;n social: $this->_razonSocial.<br>Precio por hora: "
        ."$this->_precioPorHora.<br>Autos:<br>";
        foreach($this->_autos as $item  ) {
            echo Auto::mostrarAuto($item)."<br>";
        }
    }
    public function equals( $auto) {
        return $this->indexOf($auto) > -1;
    }
    public function add($auto) {
        $ret = true;
        if(!$this->equals($auto)) {
            array_push($this->_autos,$auto);
        }
        else {
            echo "El auto ya est&aacute; en el garage.<br>";
        }
        return $ret;
    }

    public function remove($auto) {
        $ret = true;
        if($this->equals($auto)) {
           unset( $this->_autos[$this->indexOf($auto)] );
           $this->_autos = array_values($this->_autos);
        }
        else {
            echo "El auto no est&aacute; en el garage.<br>";
        }
        return $ret;
    }

    private function indexOf($auto) {
        $index = -1;
        for($i = 0 ; $i < count($this->_autos);$i++) {
            if($this->_autos[$i]->equals($this->_autos[$i], $auto)) {
                $index = $i;
                break;
            }
        }
        return $index;
    }
}
?> 