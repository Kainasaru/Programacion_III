<?php
/*
La base de todos los rectángulos de esta clase será siempre
 horizontal. Por lo tanto, debe tener un constructor para construir el
  rectángulo por medio de los vértices 1 y 3.
Los atributos ladoUno, ladoDos, área y perímetro se deberán inicializar
 una vez construido el rectángulo.
Desarrollar una aplicación que muestre todos los datos del rectángulo y lo dibuje
 en la página.*/
require_once "./Punto.php";
 class Rectangulo2 {
  //Atributos
    private $_vertice1;
    private $_vertice2;
    private $_vertice3;
    private $_vertice4;
    public $area;
    public $ladoUno;
    public $ladoDos;
    public $perimetro;
    //Constructor
    public function __construct($v1, $v3) {
      $this->area = 0;
      $this->ladoUno = 0;
      $this->ladoDos = 0;
      $this->perimetro = 0;
      $this->_vertice1 = $v1;
      $this->_vertice2 = new Punto( $v3->getX(),$v1->getY() );
      $this->_vertice3 = $v3;
      $this->_vertice4 = new Punto( $v1->getX(),$v3->getY());
    }
    //Metodos
    public function dibujar() {
      $dibujo = "";
      for($i = 0 ; $i < $this->ladoDos ; $i++ ) {
          $dibujo .= str_repeat("*",$this->ladoUno)."<br>";
      }
      return $dibujo;
    }
    public function toString() {
      $this->ladoUno = abs( $this->_vertice1->getX() - $this->_vertice2->getX()); 
      $this->ladoDos = abs( $this->_vertice2->getY() - $this->_vertice3->getY()); 
      $this->perimetro = 2 * ( $this->ladoUno + $this->ladoDos );
      $this->area = $this->ladoUno * $this->ladoDos;
      $info = "Rectangulo:<br> V&eacute;rtice 1: (".$this->_vertice1->getX().";".$this->_vertice1->getY().")<br>";
      $info .= "V&eacute;rtice 2: (".$this->_vertice2->getX().";".$this->_vertice2->getY().")<br>";
      $info .= "V&eacute;rtice 3: (".$this->_vertice3->getX().";".$this->_vertice3->getY().")<br>";
      $info .= "V&eacute;rtice 4: (".$this->_vertice4->getX().";".$this->_vertice4->getY().")<br>";
      $info .= "Lado uno: $this->ladoUno. - Lado dos: $this->ladoDos.<br>";
      $info .= "Per&iacute;metro: $this->perimetro. - Area: $this->area.<br>";
      $info .= $this->dibujar();
      return $info;
    }
 }
