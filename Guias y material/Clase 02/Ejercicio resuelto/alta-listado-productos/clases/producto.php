<?php
class Producto {
    private $_codBarra;
    private $_nombre;
    private $_productos;

    public function __construct($codBarra , $nombre) {
        $this->_codBarra = $codBarra === null? "0" : $codBarra;
        $this->_nombre = $nombre === null? "" : $nombre;
    }

    public function GetCodBarra() {
        return $this->_codBarra;
    }
    public function GetNombre() {
        return $this->_nombre;
    }
    public function ToString() {
        return $this->_codBarra . " - ". $this->_nombre . "\r\n";
    }

    public static function Guardar($prod) {
        $path = "./archivos/productos.txt";
        $file = fopen($path,"a");
        $ok = false;
        if($file !== false) {
            if( fwrite($file,$prod->ToString()) ){
                $ok = true;
            }
            fclose($file);
        }
        return $ok;
    }

    public static function TraerTodosLosProductos() {
        $path = "./archivos/productos.txt";
        $file = fopen($path,"r");
        $productos = explode( "\r\n" , fread($file,filesize($path)));
        fclose($file);
        $arrayProductos = array();
        foreach($productos as $prod) {
            if($prod != "") {
                $prod = explode("-",$prod);
                array_push($arrayProductos, new Producto($prod[0],$prod[1]));
            }
        }
        return $arrayProductos;
    }
}

?>