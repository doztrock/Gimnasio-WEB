<?php

require_once '../database/Database.class.php';

class Medida {

    /** Conexion a MySQL */
    private $database = NULL;

    public function __construct(Database $database) {
        $this->database = $database;
    }

    /**
     * Se encarga de realizar la consulta de un cliente en la base de datos.
     * Se basa en un dato, que bien puede ser la cedula 
     * o el nombre del cliente retorna un arreglo con la informacion respectiva.
     * PENDIENTE
     */
    public function consultar($dato) {
        return NULL;
    }

    /**
     * Se encarga de realizar el almacenamiento de la informacion 
     * de las medidas en la base de datos.
     */
    public function registrar($peso, $estatura, $cintura, $cadera, $pierna_derecha, $pierna_izquierda, $brazo_derecho, $brazo_izquierdo, $gluteos, $gemelo_derecho, $gemelo_izquierdo, $cuello, $hombros, $espalda, $identificadorCliente) {

        $consulta = sprintf("INSERT INTO cliente "
                . "(cedula, nombre, genero, tipo_sangre, edad, direccion, telefono, eps) "
                . "VALUES "
                . "('%s', '%s', '%s', '%s', %d, '%s', '%s', '%s')", $cedula, $nombre, $genero, $tipoSangre, $edad, $telefono, $direccion, $eps);

        return $this->database->consulta($consulta);
    }

}

?>