<?php 
class JSON {    
    private $_path;
    private $_arch;
    public function __construct($path,$create = false) {
        if( $create ) {
            Archivo::createTextFile($path);
        }
        $this->_arch = null;
        $this->setPath($path);
    }
    public function setPath($path) {
        $this->_path = $path;
        if( $this->_arch === null) {
            $this->_arch = new Archivo($this->_path,true);
        } 
        else {
            $this->_arch->setPath($this->_path,true);
        }
    }
    public function getPath() {
        return $this->_path;
    }
    public function read(){
        $text = $this->_arch->read();
        $result = ($text== "")? array() : 
        json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '',mb_convert_encoding($text,"UTF-8")) );
        return $result === null? false : $result;
    }
    public function clear() {
        $ok = false;
        $file = @fopen($this->_path,"w");
        if($file !== false) {
            fwrite($file,"");
            fclose($file);
            $ok = true;
        }
        return $ok;
    }
    public function write($json) {
        $this->clear();
        return $this->append($json);
    }
    public function append($jsonObj) {
        $ok = false;
        $text = "[";
        if( ($jsonArray = $this->read()) !== false ) {
            if( is_array($jsonObj) ) {
                $jsonArray = array_merge($jsonArray,$jsonObj);
            }
            else {
                array_push($jsonArray,$jsonObj);
            }
            for($i = 0 ; $i < count($jsonArray) ; $i++) {
                $text .= ($i == count($jsonArray)-1)? json_encode($jsonArray[$i])."]\r\n"
                 : json_encode($jsonArray[$i]).",\r\n";
            }
            $text = (count($jsonArray) == 0)? "" : $text;
            if( $this->_arch->write($text) ) {
                $ok = true;
            }
        }
        return $ok;
    }
} 