<?php
require_once "./Operario.php";
/* 
Remove (de instancia): Recibe a un objeto de tipo Operario y lo saca de la fábrica, siempre y cuando el operario se encuentre en el Array de tipo Operario. Retorna TRUE si pudo quitar al operario, FALSE, caso contrario.
Crear los objetos necesarios en testFabrica.php como para probar el buen funcionamiento de las clases.
*/
class Fabrica {
    //Atributos
    private $_cantMaxOperarios;
    private $_operarios;
    private $_razonSocial;
    //Constructor
    public function __construct($rs)
    {
        $this->_cantMaxOperarios = 5;
        $this->_razonSocial = $rs;
        $this->_operarios = array();
    }
    //Metodos de clase
    public static function mostrarCosto($fb) {
        echo "Costos de salarios de la f&aacute;brica: $".$fb->retornarCostos().".<br/>";
    }
    //Metodos de instancia
    public function add($op) {
        $ret = false;
        if( count($this->_operarios) < $this->_cantMaxOperarios && !$this->equals($this,$op) ) {
            array_push($this->_operarios, $op);
            $ret = true;
        }
        return $ret;
    }
    public function equals($fb , $op) {
        return $fb->indexOf($op) > -1;
    }
    public function mostrar() {
        echo "<F&aacute;brica.<br>Raz&oacuten social: $this->_razonSocial.<br>";
        echo "Cantidad m&aacute;xima de operarios: $this->_cantMaxOperarios.<br>";
        echo "Operarios:<br>".$this->mostrarOperarios();
    }
    
    private function mostrarOperarios() {
        $info = "";
        foreach($this->_operarios as $item) {
            $info .=  $item->mostrar();
        }
        return $info;
    }
    public function remove($op) {
        $ret = false;
        if( $this->equals($this,$op) ) {
            unset($this->_operarios[$this->indexOf($op)]);
            $this->_operarios = array_values($this->_operarios);
            $ret = true;
        }
        return $ret;
    }
    private function retornarCostos() {
        $costos = 0;
        foreach( $this->_operarios as $item) {
            $costos += $item->getSalario();
        }
        return $costos;
    }
    private function indexOf($operario) {
        $index = -1;
        for($i = 0 ; $i < count($this->_operarios) ; $i++) {
            if($operario->equals($operario , $this->_operarios[$i])) {
                $index = $i;
                break;
            }
        }
        return $index;
    }
}
?>