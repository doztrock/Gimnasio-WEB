<?php

require_once '../database/Database.class.php';

class Cliente {

    /** Conexion a MySQL */
    private $database = NULL;

    public function __construct(Database $database) {
        $this->database = $database;
    }

    /**
     * Se encarga de realizar la consulta de un cliente en la base de datos.
     * Se basa en un dato, que bien puede ser la cedula 
     * o el nombre del cliente retorna un arreglo con la informacion respectiva.
     */
    public function consultar($dato) {

        $consulta = sprintf("SELECT cliente.cedula, cliente.nombre, cliente.edad "
                . "FROM cliente "
                . "WHERE cliente.cedula LIKE '%%%s%%' "
                . "OR cliente.nombre LIKE '%%%s%%' "
                . "LIMIT 1", $dato, $dato);

        return $this->database->consulta($consulta);
    }

    /**
     * Se encarga de realizar el almacenamiento de la informacion 
     * del cliente en la base de datos.
     */
    public function registrar($cedula, $nombre, $genero, $tipoSangre, $edad, $telefono, $direccion, $eps) {

        $consulta = sprintf("INSERT INTO cliente "
                . "(cedula, nombre, genero, tipo_sangre, edad, direccion, telefono, eps) "
                . "VALUES "
                . "('%s', '%s', '%s', '%s', %d, '%s', '%s', '%s')", $cedula, $nombre, $genero, $tipoSangre, $edad, $telefono, $direccion, $eps);

        return $this->database->consulta($consulta);
    }

}
