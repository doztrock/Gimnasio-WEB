<?php

/**
 * Este script se encargara de :
 * 
 * - Almacenar la informacion del cliente
 * 
 */
require_once '../Configuracion.php';
require_once '../lib/Libreria.php';
require_once '../database/Database.class.php';

/* Datos del Cliente */
$cedula = filter_input(INPUT_POST, "input_cedula");
$nombre = filter_input(INPUT_POST, "input_nombre");
$genero = filter_input(INPUT_POST, "combo_genero");
$tipoSangre = filter_input(INPUT_POST, "combo_tipo_sangre");
$edad = filter_input(INPUT_POST, "input_edad");
$telefono = filter_input(INPUT_POST, "input_telefono");
$direccion = filter_input(INPUT_POST, "input_direccion");
$eps = filter_input(INPUT_POST, "input_eps");

/* Conexion a MySQL */
$database = new Database(Configuracion::DB_HOST, Configuracion::DB_USUARIO, Configuracion::DB_CLAVE, Configuracion::DB_NOMBRE);
$database->conectar();

/* Busqueda */
$libreria = new Libreria($database);
$resultado = $libreria->registrarCliente($cedula, $nombre, $genero, $tipoSangre, $edad, $telefono, $direccion, $eps);


/* Resultado */
header('Content-Type: application/json');

print json_encode(
                array("resultado" => $resultado)
);


/* Desconexion de MySQL */
$database->desconectar();
?>