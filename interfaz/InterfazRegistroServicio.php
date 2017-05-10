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
                        url: "proceso/InterfazRegistroServicio.process.php",
                        type: "POST",
                        cache: false,
                        data: $('#formulario_registro_servicio').serialize(),
                        success: function (data) {

                            /** Mostramos el resultado */
                            if (data.resultado === true) {
                                alert("Servicio asignado exitosamente.");
                            } else {
                                alert("Ocurrio un error asignando el servicio.");
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
            <a class="titulo_formulario">Registrar Servicio</a>
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

            <form id="formulario_registro_servicio">

                <div>

                    <div>
                        <div class="caja_label_formulario">
                            <label class="label_formulario">Servicio:</label>
                        </div>
                        <div class="caja_input_formulario">
                            <select class="select_formulario" id="combo_servicio" name="combo_servicio">
                                <option value="Aumento de Masa Muscular">Aumento de Masa Muscular</option>
                                <option value="Aumento de Peso">Aumento de Peso</option>
                                <option value="Condicionamiento Fisico">Condicionamiento Fisico</option>                                
                                <option value="Disminucion de Peso">Disminucion de Peso</option>
                            </select>
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