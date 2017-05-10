<?php

/**
 * Este script se encargara de buscar el cliente en la base de datos
 * y devolver toda la informacion que pueda sernos util,
 * para que desde Javascript usando JSON, podamos determinar posibles
 * datos a usar en las validaciones. 
 */
require_once '../Configuracion.php';
require_once '../lib/Libreria.php';
require_once '../database/Database.class.php';

/* Dato buscado */
$dato = filter_input(INPUT_POST, "input_busqueda");

/* Conexion a MySQL */
$database = new Database(Configuracion::DB_HOST, Configuracion::DB_USUARIO, Configuracion::DB_CLAVE, Configuracion::DB_NOMBRE);
$database->conectar();

/* Busqueda */
$libreria = new Libreria($database);
$informacion = $libreria->consultarCliente($dato);


/* Resultado */
header('Content-Type: application/json');

print json_encode(
                array("informacion" => $informacion)
);


/* Desconexion de MySQL */
$database->desconectar();
?>