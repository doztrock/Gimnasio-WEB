<?php

/**
 * Este script se encargara de :
 * 
 * - Eliminar la rutina del cliente de acuerdo al identificador de la misma
 * 
 */
require_once '../Configuracion.php';
require_once '../lib/Libreria.php';
require_once '../database/Database.class.php';

/* Datos de la rutina */
$identificadorRutina = filter_input(INPUT_POST, "identificador_rutina");

/* Conexion a MySQL */
$database = new Database(Configuracion::DB_HOST, Configuracion::DB_USUARIO, Configuracion::DB_CLAVE, Configuracion::DB_NOMBRE);
$database->conectar();

/* Eliminacion */
$libreria = new Libreria($database);
$resultado = $libreria->eliminarRutina($identificadorRutina);


/* Resultado */
header('Content-Type: application/json');

print json_encode(
                array("resultado" => $resultado)
);


/* Desconexion de MySQL */
$database->desconectar();
?>