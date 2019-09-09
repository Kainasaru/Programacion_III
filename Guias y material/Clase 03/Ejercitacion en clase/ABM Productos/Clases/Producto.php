<?php
class Producto{
    private $_nombre;
    private $_codBarra;
    private $_pathFoto;

    public function __construct($n=null, $c=null, $pf = null){
        $this->_nombre = ($n != null)? $n : "";
        $this->_codBarra = ($c != null)? $c : "";
        $this->_pathFoto = ($pf != null)? $pf : "" ;
    }

    public function toString(){
        return $this->_codBarra . " - " . $this->_nombre . " - ".$this->_pathFoto."\r\n";
    }

    //devuelve un booleano
    public static function guardar($obj){
        $result = false;
        $archivo = fopen("./Archivos/productos.txt", "a");
        if( $archivo !== false ) {
            if(fwrite($archivo, $obj->ToString()) > 0 ) {
                $result = true;
            }
            fclose($archivo);
        }
        return $result;
    }

    //devuelve un array de tipo producto
    public static function traerTodosLosProductos(){
        $archivo = fopen("./Archivos/productos.txt", "a+");
        $array = array();
        while(!feof($archivo)){
            $aux = null;
            $elemento = explode(" - ", fgets($archivo));
            if( isset($elemento[1])) {
                array_push($array, new Producto($elemento[0], $elemento[1],$elemento[2]));
            }
        }
        fclose($archivo);
        return $array;
    }

    public function getPathFoto() {
        return $this->_pathFoto;
    }
    public function getNombre() {
        return $this->_nombre;
    }
    public function getCodBarra() {
        return $this->_codBarra;
    }
}


?>