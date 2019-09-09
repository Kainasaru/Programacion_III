<?php
class Numero {
    //Atributos
    private $_num;
    private $_cantidadDeCifras;
    private $_sumaCifrasImpares;
    private $_sumaCifrasPares;
    private $_sumaCifras;
    private $_divisores;
    //Constructor
    public function __construct($num) {
        $this->set( intval($num) );
    }
    //Setters y getters
    /* Getter y setter del numero */
    public function set($num) {
        $this->_num = $num;
        $this->_cantidadDeCifras = $this->contarCifras();
        $this->_sumaCifrasImpares = $this->sumarCifrasImpares();
        $this->_sumaCifrasPares = $this->sumarCifrasPares();
        $this->_sumaCifras =  $this->sumarCifras();
        $this->_divisores = $this->divisores();
    }
    /* FIN Getter y setter del numero */
    public function get() {
        return $this->_num;
    }
    public function getCantCifras() {
        return $this->_cantidadDeCifras;
    }
    public function getSumaCifrasImpares() {
        return $this->_sumaCifrasImpares;
    }
    public function getSumaCifrasPares() {
        return $this->_sumaCifrasPares;
    }
    public function getSumaCifras() {
        return $this->_sumaCifras;
    }
    public function getDivisores() {
        return $this->_divisores;
    }
    //Métodos principales
    private function contarCifras() {
        return count($this->obtenerCifras());
    }
    private function sumarCifrasImpares() {
        $suma = 0;
        foreach($this->obtenerCifras() as $digit) {
            if( !$this->isEvenNumber($digit)) {
                $suma += $digit;
            }
        }
        return $suma;
    }
    private function sumarCifrasPares() {
        $suma = 0;
        foreach($this->obtenerCifras() as $digit) {
            if($this->isEvenNumber($digit)) {
                $suma += $digit;
            }
        }
        return $suma;
    }
    private function sumarCifras() {
        return $this->sumarCifrasPares() + $this->sumarCifrasImpares();
    }
    private function divisores() {
        $divisores = array();
        for($i = 1 ; $i <= abs($this->get()) ; $i++ ) {
            if( $this->esDivisorDe($this->get(),$i) ) {
                array_push($divisores,$i);
                if($this->get() < 0) {
                    array_push($divisores,-$i);
                }
            }
        }
        return $divisores;
    }
    //Funciones complementarias
   
    private function obtenerCifras() {
        $cifras = array();
        $strNum = strval($this->get());
        for( $i = 0 ; $i < strlen($strNum) ; $i++  )  {
            if( $strNum[$i] != "+" && $strNum[$i] != "-") {
                array_push($cifras,intval($strNum[$i]) );
            }
        }
        return $cifras;
    }
    private function isEvenNumber($num) {
        return is_integer($num) && $num % 2 == 0;
    }
    private function esDivisorDe($n1,$n2) {
        return $n1 % $n2 == 0;
    }
}
