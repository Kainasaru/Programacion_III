<?php
/*Vuelo
Crear el método de clase “Remove”, que permite quitar un pasajero de un vuelo, siempre y cuando el
 pasajero esté en dicho vuelo, caso contrario, informarlo. El método retornará un objeto de tipo Vuelo.*/
 require_once "./Pasajero.php";
class Vuelo {
    //Atributos
    private $_fecha;
    private $_empresa;
    private $_precio;
    private $_listaDePasajeros;
    private $_cantMaxima;
    //Constructor
    public function __construct($empresa,$precio,$cantMaxima = 5 ) {
        $this->_listaDePasajeros = array();
        $this->_empresa = $empresa;
        $this->_precio = $precio;
        $this->_cantMaxima = $cantMaxima;
    }
    //Getters
    public function getCantMaxima() {
        return $this->_cantMaxima;
    }
    //Metodos de clase
    public static function add( $v1 , $v2) {
        $recaudacion = 0;
        foreach($v1->_listaDePasajeros as $pasajero ) {
            $recaudacion += ($pasajero->getEsPlus()) ?$v1->_precio * 0.8 :  $v1->_precio ;
        }
        foreach($v2->_listaDePasajeros as $pasajero ) {
            $recaudacion += ($pasajero->getEsPlus())?$v2->_precio * 0.8 :  $v2->_precio ;
        }
        return $recaudacion;
    }
    public static function remove($vuelo , $pasajero) {
        if( $vuelo->equals($pasajero)) {
           unset( $vuelo->_listaDePasajeros[$vuelo->indexOf($pasajero)] );
           $this->_listaDePasajeros = array_values($this->_listaDePasajeros);
        }
        else {
            echo "El pasajero no est&aacute; en el vuelo.<br>";
        }
        return $this;
    }
    //Metodos de instancia
    public function getInfoVuelo() {
        $info = "Vuelo:<br>Fecha: $this->_fecha.<br>Empresa: $this->_empresa.<br>Precio: $this->_precio.<br>"
        ."Cantidad m&aacute;xima de pasajeros: ".$this->getCantMaxima()."<br>"."Pasajeros: <br>";
        foreach($this->_listaDePasajeros as $pasajero ) {
            $info .= $pasajero->getInfoPasajero()."<br>";
        }
        return $info;
    }
    public function equals($pasajero ) {
        return $this->indexOf($pasajero) > -1;
    }
    public function agregarPasajero($pasajero) {
        $ret = false;
        if( count($this->_listaDePasajeros) < $this->getCantMaxima() && !$this->equals($pasajero) )  {
            array_push($this->_listaDePasajeros , $pasajero);
            $ret = true;
        }
        return $ret;

    }
    public function mostrarVuelo() {
        echo $this->getInfoVuelo();
    }
    private function indexOf($pasajero) {
        $index = -1;
        for( $i = 0 ; $i < count($this->_listaDePasajeros) ; $i++ ) {
            if($this->_listaDePasajeros[$i]->equals($item , $pasajero)) {
                $index = $i;
                break;
            }
        }
        return $index;
    }
}
?>