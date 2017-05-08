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
                        url: "proceso/InterfazRegistroCliente.process.php",
                        type: "POST",
                        cache: false,
                        data: $('#formulario_registro_cliente').serialize(),
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

            });

        </script>
    </head>
    <body>

        <!--Titulo-->
        <div class="contenedor_titulo_formulario">
            <a class="titulo_formulario">Registrar Cliente</a>
        </div>

        <!--Formulario-->
        <div class="contenedor_formulario">

            <form id="formulario_registro_cliente">

                <div>

                    <div>
                        <div class="caja_label_formulario">
                            <label class="label_formulario">Cedula:</label>
                        </div>
                        <div class="caja_input_formulario">
                            <input type="text" class="input_formulario" id="input_cedula" name="input_cedula">
                        </div>
                    </div>

                    <div>
                        <div class="caja_label_formulario">
                            <label class="label_formulario">Nombre:</label>
                        </div>
                        <div class="caja_input_formulario">
                            <input type="text" class="input_formulario" id="input_nombre" name="input_nombre">
                        </div>
                    </div>

                    <div>
                        <div class="caja_label_formulario">
                            <label class="label_formulario">Genero:</label>
                        </div>
                        <div class="caja_input_formulario">
                            <select id="combo_genero" class="select_formulario" name="combo_genero">
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <div class="caja_label_formulario">
                            <label class="label_formulario">Tipo de Sangre:</label>
                        </div>
                        <div class="caja_input_formulario">
                            <select id="combo_tipo_sangre" class="select_formulario" name="combo_tipo_sangre">
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <div class="caja_label_formulario">
                            <label class="label_formulario">Edad:</label>
                        </div>
                        <div class="caja_input_formulario">
                            <input type="text" class="input_formulario" id="input_edad" name="input_edad">
                        </div>
                    </div>

                    <div>
                        <div class="caja_label_formulario">
                            <label class="label_formulario">Telefono:</label>
                        </div>
                        <div class="caja_input_formulario">
                            <input type="text" class="input_formulario" id="input_telefono" name="input_telefono">
                        </div>
                    </div>

                    <div>
                        <div class="caja_label_formulario">
                            <label class="label_formulario">Direccion:</label>
                        </div>
                        <div class="caja_input_formulario">
                            <input type="text" class="input_formulario" id="input_direccion" name="input_direccion">
                        </div>
                    </div>

                    <div>
                        <div class="caja_label_formulario">
                            <label class="label_formulario">EPS:</label>
                        </div>
                        <div class="caja_input_formulario">
                            <input type="text" class="input_formulario" id="input_eps" name="input_eps">
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