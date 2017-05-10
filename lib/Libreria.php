<?php

require_once '../clase/Cliente.class.php';
require_once '../clase/Entrenador.class.php';
require_once '../clase/Gimnasio.class.php';
require_once '../clase/Medida.class.php';
require_once '../clase/Rutina.class.php';
require_once '../clase/Servicio.class.php';
require_once '../database/Database.class.php';

class Libreria {

    /** Conexion a MySQL */
    private $database = NULL;

    /** Recursos */
    private $cliente = NULL;

    public function __construct(Database $database) {

        /* Guardamos la conexion a MySQL */
        $this->database = $database;

        /** Instanciamos los recursos */
        $this->cliente = new Cliente($this->database);

        return;
    }

    /**
     * 
     * CLIENTE
     * 
     */

    /**
     * Consulta de cliente
     */
    public function consultarCliente($dato) {
        return $this->cliente->consultar($dato);
    }

}

?>