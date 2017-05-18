<?php
require_once '../Configuracion.php';
require_once '../lib/Libreria.php';
require_once '../database/Database.class.php';

if (filter_input(INPUT_POST, "identificador_rutina") != NULL) {

    /* Identificacion de la rutina */
    $identificadorRutina = filter_input(INPUT_POST, "identificador_rutina");

    /* Conexion a MySQL */
    $database = new Database(Configuracion::DB_HOST, Configuracion::DB_USUARIO, Configuracion::DB_CLAVE, Configuracion::DB_NOMBRE);
    $database->conectar();

    $libreria = new Libreria($database);
    $informacionRutina = $libreria->obtenerRutina($identificadorRutina)[0];

    $database->desconectar();
}
?>

<html>
    <head>
        <script type="text/javascript">

            $(document).ready(function () {

                /**
                 * Boton Registrar
                 */
                $("#boton_registrar").click(function () {

                    /* Mostramos la animacion de carga */
                    $(".div_cargando").show();
                    $.ajax({
                        url: "proceso/InterfazRegistroRutina.process.php",
                        type: "POST",
                        cache: false,
                        data: $('#formulario_registro_rutina').serialize(),
                        success: function (data) {

                            /** Mostramos el resultado */
                            if (data.resultado === true) {
                                alert("Rutina asignada exitosamente.");
                            } else {
                                alert("Ocurrio un error asignando la rutina.");
                            }

                            /* Ocultamos la animacion de carga */
                            $(".div_cargando").hide();

                        }
                    });

                });

                /**
                 * Boton Cancelar
                 */
                $("#boton_cancelar").click(function () {
                    $("#contenedor").load("interfaz/InterfazGimnasio.php");
                });

                /**
                 *  Boton Buscar
                 */
                $("#boton_buscar").click(function () {

                    /* Mostramos la animacion de carga */
                    $(".div_cargando").show();
                    $.ajax({
                        url: "proceso/BusquedaCliente.process.php",
                        type: "POST",
                        cache: false,
                        data: $('#input_busqueda').serialize(),
                        success: function (data) {

                            /* Notificamos cuando no se encuentre el cliente */
                            if (data.informacion === null) {
                                alert("No se encontro el cliente.");
                                $(".div_cargando").hide();
                                return;
                            }

                            var informacion = data.informacion;

                            /* Mostramos la informacion */
                            $(".contenedor_seccion_resultado").show();
                            $(".label_resultado_informacion").text(informacion.nombre);

                            /* Guardamos el identificador */
                            $("#hidden_identificador_cliente").val(informacion.identificador);

                            /* Ocultamos la animacion de carga */
                            $(".div_cargando").hide();

                        }
                    });

                });

                /**
                 * Datepicker
                 */
                $("#input_fecha").datepicker({
                    dateFormat: 'yy-mm-dd'
                });

            });

        </script>
    </head>
    <body>

        <!--Titulo-->
        <div class="contenedor_titulo_formulario">

            <?php
            /** Cambiamos el titulo */
            $titulo = "Registrar Rutina";
            if (filter_input(INPUT_POST, "identificador_rutina") != NULL) {
                $titulo = "Modificar Rutina";
            }
            ?>

            <a class="titulo_formulario"><?php print $titulo; ?></a>

        </div>

        <!--Buscador-->
        <div class="contenedor_buscador">

            <?php
            /** INICIO: Omitimos el buscador */
            if (filter_input(INPUT_POST, "identificador_rutina") == NULL) {
                ?>

                <!--Seccion de busqueda--> 
                <div class="contenedor_seccion_busqueda">
                    <div class="caja_input_busqueda">
                        <input type="text" class="input_busqueda" id="input_busqueda" name="input_busqueda" placeholder="Ingrese cedula o nombre">
                    </div>            
                    <div  class="caja_boton_busqueda">
                        <input type="button" class="boton_busqueda" id="boton_buscar" name="boton_buscar" value="Buscar">   
                    </div>
                </div>

                <!--Seccion de resultado-->
                <div class="contenedor_seccion_resultado">
                    <label class="label_resultado_etiqueta">Cliente:</label>
                    <label class="label_resultado_informacion"></label>
                </div>

                <?php
                /** FIN: Omitimos el buscador */
            }
            ?>

        </div>

        <!--Formulario-->
        <div class="contenedor_formulario">

            <form id="formulario_registro_rutina">

                <div>

                    <div>
                        <div class="caja_label_formulario">
                            <label class="label_formulario">Area:</label>
                        </div>
                        <div class="caja_input_formulario">
                            <input type="text" class="input_formulario" id="input_area" name="input_area" value="<?php print isset($informacionRutina) ? $informacionRutina['area'] : ""; ?>">
                        </div>
                    </div>

                    <div>
                        <div class="caja_label_formulario">
                            <label class="label_formulario">Peso:</label>
                        </div>
                        <div class="caja_input_formulario">
                            <input type="text" class="input_formulario" id="input_peso" name="input_peso" value="<?php print isset($informacionRutina) ? $informacionRutina['peso'] : ""; ?>">
                        </div>
                    </div>

                    <div>
                        <div class="caja_label_formulario">
                            <label class="label_formulario">Series:</label>
                        </div>
                        <div class="caja_input_formulario">
                            <input type="text" class="input_formulario" id="input_series" name="input_series" value="<?php print isset($informacionRutina) ? $informacionRutina['series'] : ""; ?>">
                        </div>
                    </div>

                    <div>
                        <div class="caja_label_formulario">
                            <label class="label_formulario">Fecha:</label>
                        </div>
                        <div class="caja_input_formulario">
                            <input type="text" class="input_formulario" id="input_fecha" name="input_fecha" value="<?php print isset($informacionRutina) ? $informacionRutina['fecha'] : ""; ?>">
                        </div>
                    </div>

                    <!--Informacion-->
                    <?php
                    /** Cambiamos la informacion */
                    if (filter_input(INPUT_POST, "identificador_rutina") != NULL) {
                        ?>
                        <input type="hidden" id="hidden_accion" name="hidden_accion" value="modificar">
                        <input type="hidden" id="hidden_identificador_rutina" name="hidden_identificador_rutina" value="<?php print $informacionRutina['identificador']; ?>">
                        <?php
                    } else {
                        ?>
                        <input type="hidden" id="hidden_accion" name="hidden_accion" value="registrar">
                        <input type="hidden" id="hidden_identificador_cliente" name="hidden_identificador_cliente">
                        <?php
                    }
                    ?>

                </div>

            </form>

        </div>

        <!--Botones-->
        <div class="contenedor_boton_formulario">

            <div class="contenedor_boton_negativo">
                <input type="button" class="boton_formulario_negativo" id="boton_cancelar" name="boton_cancelar" value="Cancelar">
            </div>

            <div class="contenedor_boton_positivo">

                <?php
                /** Cambiamos el texto */
                $textoBoton = "Registrar";
                if (filter_input(INPUT_POST, "identificador_rutina") != NULL) {
                    $textoBoton = "Guardar";
                }
                ?>

                <input type="button" class="boton_formulario_positivo" id="boton_registrar" name="boton_registrar" value="<?php print $textoBoton; ?>">

            </div>

            <div class="div_cargando">
                <object data="img/cargando.svg" type="image/svg+xml">
                </object>
            </div>

        </div>

    </body>
</html>