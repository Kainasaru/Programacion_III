<?php
abstract class Size {
    const Bytes = 1;
    const KiloBytes = 2;
    const MegaBytes = 3;
}
class Archivo
{
    private $_path;
    private $_fileName;
    private $_baseName;
    private $_extension;
    private $_isImage;
    private $_sizeB;
    private $_error;
    private $_type;
    private $_name;


    /* Constructor */
    //El name , error y type pueden usarse al trabajar con los paths temporales de $_files
    public function __construct($path, $clearPath = false,$name = null, $error = null, $type = null)
    {
        $this->setPath($path, $clearPath,$name, $error, $type);
    }

    /* propiedades */
    public function getPath()
    {
        return $this->_path;
    }
    public function setPath($path, $clearPath = false,$name = null, $error = null, $type = null)
    {
        clearstatcache();
        $this->_path = $path;
        if ($clearPath) {
            $this->clearPath();
        }
        $this->_fileName = pathinfo($this->getPath(), PATHINFO_FILENAME);
        $this->_baseName = pathinfo($this->getPath(), PATHINFO_BASENAME);
        $this->_extension = pathinfo($this->getPath(), PATHINFO_EXTENSION);
        $this->_isImage = file_exists($this->getPath()) && @getimagesize($this->getPath()) === true ? true : false;
        $this->_sizeB =  file_exists($this->_path)? filesize($path) : 0;
        $this->_error = $error;
        $this->_type = $type;
        $this->_name = $name;
    }

    public function getExtension()
    {
        return $this->_extension;
    }
    public function getFileName()
    {
        return $this->_fileName;
    }
    public function getBaseName()
    {
        return $this->_baseName;
    }
    public function isImage()
    {
        return $this->_isImage;
    }
    public function getSizeMB()
    {
        return $this->_sizeB / (1024*1024);
    }
    public function getSizeKB()
    {
        return $this->_sizeB / 1024;
    }
    public function getSizeB()
    {
        return $this->_sizeB;
    }
    public function getError()
    {
        return $this->_error;
    }
    public function getType()
    {
        return $this->_type;
    }
    public function getName()
    {
        return $this->_name;
    }
    /* Lectura-escritura*/
    public static function createTextFile($name) {
        $ok = false;
        $file = fopen($name,"w");
        if($file !== false) {
            $ok = true;
            fclose($file);
        }
        return $ok;
    }
    public function read()
    {
        clearstatcache();
        $text = "";
        if( file_exists($this->getPath())) {
            $fileSize = filesize($this->getPath());
            if( $fileSize > 0) {
                $file = @fopen($this->getPath(), "r");
                $fileSize = filesize($this->getPath());
                if ($file !== false) {
                    $text = fread($file, $fileSize);
                    fclose($file);
                }
            }
        }
        return $text;
    }
    public function write($content, $append = false)
    {
        $mode = $append ? "a" : "w";
        $status = false;
        $file = fopen($this->getPath(), $mode);
        if ($file !== false) {
            $status = fwrite($file, $content);
            $status = fclose($file);
        }
        return $status;
    }
    /* operaciones */
    public function exists()
    {
        return file_exists($this->getPath());
    }

    public function delete()
    {
        return unlink($this->getPath());
    }
    /* validaciones */
    //Use name es util cuando se trabaja con archivos temporales de $_files
    public function hasExtension($strExtensionsArray, $useName = false)
    {
        $status = false;
        $verify = $useName ? pathinfo( $this->_name , PATHINFO_EXTENSION) : $this->_extension;
        foreach ($strExtensionsArray as $extension) {
            if ($extension == $verify) {
                $status = true;
                break;
            }
        }
        return $status;
    }

    public function hasError() 
    {
        return $this->_error === null;
    }
    public function lessThan($size,$unit)
    {
        $ret = false;
        switch($unit) {
            case Size::Bytes: 
            $ret = $this->getSizeB() < $unit;
            break;
            case Size::KiloBytes: 
            $ret = $this->getSizeKB() < $unit;
            break;
            case Size::MegaBytes: 
            $ret = $this->getSizeMB() < $unit;
            break;
        }
        return $ret;
    }

    public function move_uploaded_file_to($path)
    {
        return move_uploaded_file($this->getPath(), $path);
    }

    /* uso interno */
    private function clearPath()
    {
        $this->_path = preg_replace('/[\x00-\x1F\x7F-\xFF]/', '', $this->getPath());
    }


}
