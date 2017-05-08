<html>
    <head>
        <script type="text/javascript">

            $(document).ready(function () {

                /**
                 * Boton Registrar
                 */
                $("#boton_registrar").click(function () {

                    $("#div_cargando").show();

                    $.ajax({
                        url: "proceso/InterfazRegistroRutina.process.php",
                        type: "POST",
                        cache: false,
                        data: $('#formulario_registro_rutina').serialize(),
                        success: function (data) {
                            alert(data);
                            $("#div_cargando").hide();
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
                    $("#contenedor").load("interfaz/InterfazGimnasio.php");
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
            <a class="titulo_formulario">Registrar Rutina</a>
        </div>

        <!--Buscador-->
        <div class="contenedor_buscador">

            <!--Seccion de busqueda--> 
            <div class="contenedor_seccion_busqueda">
                <div class="caja_input_busqueda">
                    <input type="text" class="input_busqueda" placeholder="Ingrese cedula o nombre">
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

            <form id="formulario_registro_rutina">

                <div>

                    <div>
                        <div class="caja_label_formulario">
                            <label class="label_formulario">Area:</label>
                        </div>
                        <div class="caja_input_formulario">
                            <input type="text" class="input_formulario" id="input_area" name="input_area">
                        </div>
                    </div>

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
                            <label class="label_formulario">Series:</label>
                        </div>
                        <div class="caja_input_formulario">
                            <input type="text" class="input_formulario" id="input_series" name="input_series">
                        </div>
                    </div>

                    <div>
                        <div class="caja_label_formulario">
                            <label class="label_formulario">Fecha:</label>
                        </div>
                        <div class="caja_input_formulario">
                            <input type="text" class="input_formulario" id="input_fecha" name="input_fecha">
                        </div>
                    </div>

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

            <div id="div_cargando" style="display: none">
                CARGANDO...
            </div>

        </div>

    </body>
</html>