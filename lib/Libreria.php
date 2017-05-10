<?php

require_once '../clase/Cliente.class.php';
require_once '../clase/Medida.class.php';
require_once '../clase/Rutina.class.php';
require_once '../clase/Servicio.class.php';
require_once '../database/Database.class.php';

class Libreria {

    /** Conexion a MySQL */
    private $database = NULL;

    /** Recursos */
    private $cliente = NULL;
    private $medida = NULL;
    private $rutina = NULL;
    private $servicio = NULL;

    public function __construct(Database $database) {

        /* Guardamos la conexion a MySQL */
        $this->database = $database;

        /** Instanciamos los recursos */
        $this->cliente = new Cliente($this->database);
        $this->medida = new Medida($this->database);
        $this->rutina = new Rutina($this->database);
        $this->servicio = new Servicio($this->database);

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

    /**
     * Registro de cliente
     */
    public function registrarCliente($cedula, $nombre, $genero, $tipoSangre, $edad, $telefono, $direccion, $eps) {
        return $this->cliente->registrar($cedula, $nombre, $genero, $tipoSangre, $edad, $telefono, $direccion, $eps);
    }

    /**
     * 
     * MEDIDA
     * 
     */
    /**
     * 
     * RUTINA
     * 
     */

    /**
     * Consulta de rutina
     */
    public function consultarRutina($identificadorCliente) {
        return $this->rutina->consultar($identificadorCliente);
    }

    /**
     * Registro de rutina
     */
    public function registrarRutina($area, $peso, $series, $fecha, $identificadorCliente) {
        return $this->rutina->registrar($area, $peso, $series, $fecha, $identificadorCliente);
    }

    /**
     * 
     * SERVICIO
     * 
     */

    /**
     * Consulta de servicio
     */
    public function consultarServicio($identificadorCliente) {
        return $this->servicio->consultar($identificadorCliente);
    }

    /**
     * Registro de servicio
     */
    public function registrarServicio($servicio, $identificadorCliente) {
        return $this->servicio->registrar($servicio, $identificadorCliente);
    }

}

?>