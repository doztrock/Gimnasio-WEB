<?php

require_once '../database/Database.class.php';

class Rutina {

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
    public function consultar($identificadorCliente) {
        return NULL;
    }

    /**
     * Se encarga de realizar el almacenamiento de la informacion 
     * de la rutina en la base de datos.
     */
    public function registrar($area, $peso, $series, $fecha, $identificadorCliente) {

        $consulta = sprintf("INSERT INTO rutina "
                . "(area, peso, series, fecha, id_cliente) "
                . "VALUES "
                . "('%s', %f, %d, '%s', %d)", $area, $peso, $series, $fecha, $identificadorCliente);

        return $this->database->consulta($consulta);
    }

}

?>