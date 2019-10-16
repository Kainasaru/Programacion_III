<?php
class Database
{
    /* Esta clase es capaz de realizar operaciones basicas en bases de datos con cualquier tipo
    de objeto. Simplemente se le carga una clase standard cuyos campos coincidan con los de una tabla
    a elegir en el constructor. A partir de la StdClass y en ciertos casos especificar que campo es el 
    qeu corresponde a una primaryKey la clase automatiza los procesos en bases de datos.*/
    private $_table;
    private $_pdo;
    private $_obj;
    public function __construct($database, $table, $usuario, $clave, $stdObj = null)
    {
        $this->_obj = $stdObj;
        $this->_table = $table;
        $this->_pdo = new PDO('mysql:host=localhost;dbname=' . $database . ';charset=utf8', $usuario, $clave);
    }

    public function getAll()
    {
        $consulta = $this->_pdo->prepare("SELECT * from `" . $this->_table . "`");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    public function insert()
    {
        $query = "INSERT INTO `" . $this->_table . "` (" . implode(",", array_keys(get_object_vars($this->_obj))) . ") " .
            "VALUES( :" . implode(",:", array_keys(get_object_vars($this->_obj))) . ")";
        $consulta = $this->_pdo->prepare($query);
        foreach ($this->_obj as $atrib => $value) {
            $consulta->bindValue(":$atrib", $value);
        }
        return $consulta->execute();
    }

    /**
     * Modifica un objeto en una base de datos a partir de los campos de la StdClass.
     *
     * @param string $pkFieldName Nombre del campo primaryKey a partir del cual se eliminara.
     *
     * @param mixed $id Valor del campo primaryKey asociado al elemento a modificar.
     *
     * @return bool Retorna booleano que indica si se modifico alguna fila
     */
    public function modify($pkFieldName, $id)
    {
        $atribs = array_keys(get_object_vars($this->_obj));
        $values = array_values(get_object_vars($this->_obj));

        $query = "UPDATE `" . $this->_table . "` SET ";
        for ($i = 0; $i < count($atribs); $i++) {
            if ($atribs[$i] != $pkFieldName) { //No se debe cambiar el campo primary key al modificar
                $query .= ($i == count($atribs) - 1) ? $atribs[$i] . " = :" . $atribs[$i] . " " : $atribs[$i] . " = :" . $atribs[$i] . ", ";
            }
        }
        $query .= "WHERE $pkFieldName = :$pkFieldName";
        $consulta = $this->_pdo->prepare($query);
        $consulta->bindValue(":$pkFieldName", $id);
        for ($i = 0; $i < count($atribs); $i++) {
            if ($atribs[$i] != $pkFieldName) {
                $consulta->bindValue($atribs[$i], $values[$i]);
            }
        }
        $consulta->execute();
        return $consulta->rowCount() == 0 ? false : true;
    }

    public function remove($pkFieldName, $id)
    {
        $consulta = $this->_pdo->prepare("DELETE FROM `" . $this->_table . "` WHERE $pkFieldName = :$pkFieldName");
        $consulta->bindValue(":$pkFieldName", $id);
        $consulta->execute();
        return $ok = $consulta->rowCount() == 0 ? false : true;
    }
}
