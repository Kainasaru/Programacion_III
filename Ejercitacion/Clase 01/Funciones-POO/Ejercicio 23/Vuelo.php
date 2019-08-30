<?php
/*Vuelo
Atributos privados: _fecha (DateTime), _empresa (string) _precio (double), _listaDePasajeros 
(array de tipo Pasajero), _cantMaxima (int; con su getter). Tanto _listaDePasajero 
como _cantMaxima sólo se inicializarán en el constructor.
Crear el constructor capaz de que de poder instanciar objetos pasándole como parámetros:
i. La empresa y el precio.
ii. La empresa, el precio y la cantidad máxima de pasajeros.
Agregar un método getter, que devuelva en una cadena de caracteres toda la información de un vuelo: 
    fecha, empresa, precio, cantidad máxima de pasajeros, y toda la información de todos los pasajeros.
Crear un método de instancia llamado AgregarPasajero, en el caso que no exista en la lista, se agregará
 (utilizar Equals). Además tener en cuenta la capacidad del vuelo. El valor de retorno de este método
  indicará si se agregó o no.
Agregar un método de instancia llamado MostrarVuelo, que mostrará la información de un vuelo.
Crear el método de clase “Add” para que permita sumar dos vuelos. El valor devuelto deberá ser de 
tipo numérico, y representará el valor recaudado por los vuelos. Tener en cuenta que si un pasajero es 
Plus, se le hará un descuento del 20% en el precio del vuelo.
Crear el método de clase “Remove”, que permite quitar un pasajero de un vuelo, siempre y cuando el
 pasajero esté en dicho vuelo, caso contrario, informarlo. El método retornará un objeto de tipo Vuelo.*/
class Vuelo {
    //Atributos
    private $_fecha;
    private $_empresa;
    private $_precio;
    private $_listaDePasajeros;
    private $_cantMaxima;
    //Constructor
    public function __construct() {

    }
    //Getters
    public function getCantMaxima() {
        return $this->_cantMaxima();
    }
}
?>