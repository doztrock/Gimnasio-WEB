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
                        url: "proceso/InterfazRegistroMedidas.process.php",
                        type: "POST",
                        cache: false,
                        data: $('#formulario_registro_medidas').serialize(),
                        success: function (data) {

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

            });

        </script>
    </head>
    <body>

        <!--Titulo-->
        <div class="contenedor_titulo_formulario">
            <a class="titulo_formulario">Registrar Medidas</a>
        </div>

        <!--Buscador-->
        <div class="contenedor_buscador">

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

        </div>

        <!--Formulario-->
        <div class="contenedor_formulario">

            <form id="formulario_registro_medidas">

                <div>

                    <div>
                        <div class="caja_label_formulario">
                            <label class="label_formulario">Peso:</label>
                        </div>
                        <div class="caja_input_formulario">
                            <input type="text" class="input_formulario" id="input_peso" name="input_peso">
                        </div>
                    </div>

                    <div>
                        <div class="caja_label_formulario">
                            <label class="label_formulario">Estatura:</label>
                        </div>
                        <div class="caja_input_formulario">
                            <input type="text" class="input_formulario" id="input_estatura" name="input_estatura">
                        </div>
                    </div>

                    <div>
                        <div class="caja_label_formulario">
                            <label class="label_formulario">Cintura:</label>
                        </div>
                        <div class="caja_input_formulario">
                            <input type="text" class="input_formulario" id="input_cintura" name="input_cintura">
                        </div>
                    </div>

                    <div>
                        <div class="caja_label_formulario">
                            <label class="label_formulario">Cadera:</label>
                        </div>
                        <div class="caja_input_formulario">
                            <input type="text" class="input_formulario" id="input_cadera" name="input_cadera">
                        </div>
                    </div>

                    <div>

                        <div style="display: table-cell">
                            <div class="caja_label_formulario">
                                <label class="label_formulario">Pierna Derecha:</label>
                            </div>
                            <div class="caja_input_formulario">
                                <input type="text" class="input_formulario" id="input_pierna_derecha" name="input_pierna_derecha">
                            </div>
                        </div>

                        <div style="display: table-cell">
                            <div class="caja_label_formulario">
                                <label class="label_formulario">Pierna Izquierda:</label>
                            </div>
                            <div class="caja_input_formulario">
                                <input type="text" class="input_formulario" id="input_pierna_izquierda" name="input_pierna_izquierda">
                            </div>
                        </div>

                    </div>

                    <div>

                        <div style="display: table-cell">
                            <div class="caja_label_formulario">
                                <label class="label_formulario">Brazo Derecho:</label>
                            </div>
                            <div class="caja_input_formulario">
                                <input type="text" class="input_formulario" id="input_brazo_derecho" name="input_brazo_derecho">
                            </div>
                        </div>

                        <div style="display: table-cell">
                            <div class="caja_label_formulario">
                                <label class="label_formulario">Brazo Izquierdo:</label>
                            </div>
                            <div class="caja_input_formulario">
                                <input type="text" class="input_formulario" id="input_brazo_izquierdo" name="input_brazo_izquierdo">
                            </div>
                        </div>

                    </div>

                    <div>
                        <div class="caja_label_formulario">
                            <label class="label_formulario">Gluteos:</label>
                        </div>
                        <div class="caja_input_formulario">
                            <input type="text" class="input_formulario" id="input_gluteos" name="input_gluteos">
                        </div>
                    </div>

                    <div>

                        <div style="display: table-cell">
                            <div class="caja_label_formulario">
                                <label class="label_formulario">Gemelo Derecho:</label>
                            </div>
                            <div class="caja_input_formulario">
                                <input type="text" class="input_formulario" id="input_gemelo_derecho" name="input_gemelo_derecho">
                            </div>
                        </div>

                        <div style="display: table-cell">
                            <div class="caja_label_formulario">
                                <label class="label_formulario">Gemelo Izquierdo:</label>
                            </div>
                            <div class="caja_input_formulario">
                                <input type="text" class="input_formulario" id="input_gemelo_izquierdo" name="input_gemelo_izquierdo">
                            </div>
                        </div>

                    </div>

                    <div>
                        <div class="caja_label_formulario">
                            <label class="label_formulario">Cuello:</label>
                        </div>
                        <div class="caja_input_formulario">
                            <input type="text" class="input_formulario" id="input_cuello" name="input_cuello">
                        </div>
                    </div>

                    <div>
                        <div class="caja_label_formulario">
                            <label class="label_formulario">Hombros:</label>
                        </div>
                        <div class="caja_input_formulario">
                            <input type="text" class="input_formulario" id="input_hombros" name="input_hombros">
                        </div>
                    </div>

                    <div>
                        <div class="caja_label_formulario">
                            <label class="label_formulario">Espalda:</label>
                        </div>
                        <div class="caja_input_formulario">
                            <input type="text" class="input_formulario" id="input_espalda" name="input_espalda">
                        </div>
                    </div>

                    <!--Identificador de Cliente-->
                    <input type="hidden" id="hidden_identificador_cliente" name="hidden_identificador_cliente">

                </div>

            </form>

        </div>

        <!--Botones-->
        <div class="contenedor_boton_formulario">

            <div class="contenedor_boton_negativo">
                <input type="button" class="boton_formulario_negativo" id="boton_cancelar" name="boton_cancelar" value="Cancelar">
            </div>

            <div class="contenedor_boton_positivo">
                <input type="button" class="boton_formulario_positivo" id="boton_registrar" name="boton_registrar" value="Registrar">
            </div>

            <div class="div_cargando">
                <object data="img/cargando.svg" type="image/svg+xml">
                </object>
            </div>

        </div>

    </body>
</html>