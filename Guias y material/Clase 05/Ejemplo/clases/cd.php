<?php
class cd
{
    public $titulo;
    public $interprete;
    public $anio;

    public function MostrarDatos()
    {
            return $this->titulo." - ".$this->interprete." - ".$this->anio;
    }
    
}