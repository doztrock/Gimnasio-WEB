<?php

require_once '../database/Database.class.php';

class Servicio {

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
     * del servicio en la base de datos.
     */
    public function registrar($servicio, $identificadorCliente) {

        $consulta = sprintf("INSERT INTO servicio "
                . "(servicio, id_cliente) "
                . "VALUES "
                . "('%s', %d)", $servicio, $identificadorCliente);

        return $this->database->consulta($consulta);
    }

}

?>