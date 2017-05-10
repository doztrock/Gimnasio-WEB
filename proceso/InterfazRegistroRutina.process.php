<?php

/**
 * Este script se encargara de :
 * 
 * - Almacenar la informacion de la rutina
 * 
 */
require_once '../Configuracion.php';
require_once '../lib/Libreria.php';
require_once '../database/Database.class.php';

/* Datos de la Rutina */
$area = filter_input(INPUT_POST, "input_area");
$peso = filter_input(INPUT_POST, "input_peso");
$series = filter_input(INPUT_POST, "input_series");
$fecha = filter_input(INPUT_POST, "input_fecha");
$identificadorCliente = filter_input(INPUT_POST, "hidden_identificador_cliente");

/* Conexion a MySQL */
$database = new Database(Configuracion::DB_HOST, Configuracion::DB_USUARIO, Configuracion::DB_CLAVE, Configuracion::DB_NOMBRE);
$database->conectar();

/* Almacenamiento */
$libreria = new Libreria($database);
$resultado = $libreria->registrarRutina($area, $peso, $series, $fecha, $identificadorCliente);


/* Resultado */
header('Content-Type: application/json');

print json_encode(
                array("resultado" => $resultado)
);


/* Desconexion de MySQL */
$database->desconectar();
?>