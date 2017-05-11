<?php

/**
 * Este script se encargara de :
 * 
 * - Almacenar la informacion las medidas del cliente
 * 
 */
require_once '../Configuracion.php';
require_once '../lib/Libreria.php';
require_once '../database/Database.class.php';

/* Datos de las Medidas */
$peso = filter_input(INPUT_POST, "input_peso");
$estatura = filter_input(INPUT_POST, "input_estatura");
$cintura = filter_input(INPUT_POST, "input_cintura");
$cadera = filter_input(INPUT_POST, "input_cadera");
$pierna_derecha = filter_input(INPUT_POST, "input_pierna_derecha");
$pierna_izquierda = filter_input(INPUT_POST, "input_pierna_izquierda");
$brazo_derecho = filter_input(INPUT_POST, "input_brazo_derecho");
$brazo_izquierdo = filter_input(INPUT_POST, "input_brazo_izquierdo");
$gluteos = filter_input(INPUT_POST, "input_gluteos");
$gemelo_derecho = filter_input(INPUT_POST, "input_gemelo_derecho");
$gemelo_izquierdo = filter_input(INPUT_POST, "input_gemelo_izquierdo");
$cuello = filter_input(INPUT_POST, "input_cuello");
$hombros = filter_input(INPUT_POST, "input_hombros");
$espalda = filter_input(INPUT_POST, "input_espalda");
$identificadorCliente = filter_input(INPUT_POST, "hidden_identificador_cliente");

/* Conexion a MySQL */
$database = new Database(Configuracion::DB_HOST, Configuracion::DB_USUARIO, Configuracion::DB_CLAVE, Configuracion::DB_NOMBRE);
$database->conectar();

/* Almacenamiento */
$libreria = new Libreria($database);
$resultado = $libreria->registrarMedidas($peso, $estatura, $cintura, $cadera, $pierna_derecha, $pierna_izquierda, $brazo_derecho, $brazo_izquierdo, $gluteos, $gemelo_derecho, $gemelo_izquierdo, $cuello, $hombros, $espalda, $identificadorCliente);


/* Resultado */
header('Content-Type: application/json');

print json_encode(
                array("resultado" => $resultado)
);


/* Desconexion de MySQL */
$database->desconectar();
?>