<?php

/**
 * Este script se encargara de :
 * 
 * - Almacenar la informacion del servicio
 * 
 */
require_once '../Configuracion.php';
require_once '../lib/Libreria.php';
require_once '../database/Database.class.php';

/* Datos del Servicio */
$servicio = filter_input(INPUT_POST, "combo_servicio");
$identificadorCliente = filter_input(INPUT_POST, "hidden_identificador_cliente");

/* Conexion a MySQL */
$database = new Database(Configuracion::DB_HOST, Configuracion::DB_USUARIO, Configuracion::DB_CLAVE, Configuracion::DB_NOMBRE);
$database->conectar();

/* Almacenamiento */
$libreria = new Libreria($database);
$resultado = $libreria->registrarServicio($servicio, $identificadorCliente);


/* Resultado */
header('Content-Type: application/json');

print json_encode(
                array("resultado" => $resultado)
);


/* Desconexion de MySQL */
$database->desconectar();
?>