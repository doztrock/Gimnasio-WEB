<html>
    <head>
        <script type="text/javascript">

            /**
             * Boton Modificar Rutina
             * @param {Entero} identificador Identificador de la rutina a modificar
             */
            function modificarRutina(identificador) {

                /* Mostramos la animacion de carga */
                $(".div_cargando_consulta").show();

                /* Cargamos el formulario de Insercion */
                $("#contenedor").load("interfaz/InterfazRegistroRutina.php", {identificador_rutina: identificador});

                /* Ocultamos la animacion de carga */
                $(".div_cargando_consulta").hide();

            }

            /**
             * Boton Eliminar Rutina
             * @param {Entero} identificador Identificador de la rutina a eliminar
             */
            function eliminarRutina(identificador) {

                /* Mostramos la animacion de carga */
                $(".div_cargando_consulta").show();

                $.ajax({
                    url: "proceso/InterfazEliminacionRutina.process.php",
                    type: "POST",
                    cache: false,
                    data: {identificador_rutina: identificador},
                    success: function (data) {

                        /** Mostramos el resultado */
                        if (data.resultado === true) {
                            $("#fila_" + identificador).remove();
                        } else {
                            alert("Ocurrio un error eliminando la rutina.");
                        }

                        /* Ocultamos la animacion de carga */
                        $(".div_cargando_consulta").hide();

                    }
                });

            }

            $(document).ready(function () {

                /**
                 * Boton Volver
                 */
                $("#boton_volver").click(function () {
                    $("#contenedor").load("interfaz/InterfazGimnasio.php");
                });

                /**
                 *  Boton Buscar
                 */
                $("#boton_buscar").click(function () {

                    /* Mostramos la animacion de carga */
                    $(".div_cargando_consulta").show();

                    $.ajax({
                        url: "proceso/BusquedaCliente.process.php",
                        type: "POST",
                        cache: false,
                        data: $('#input_busqueda').serialize(),
                        success: function (data) {

                            /* Notificamos cuando no se encuentre el cliente */
                            if (data.informacion === null) {
                                alert("No se encontro el cliente.");
                                $(".div_cargando_consulta").hide();
                                return;
                            }

                            var informacion = data.informacion;

                            /* Mostramos la informacion */
                            $(".contenedor_seccion_resultado").show();
                            $(".label_resultado_informacion").text(informacion.nombre);

                            /* Guardamos el identificador */
                            $("#hidden_identificador_cliente").val(informacion.identificador);

                            /* Consultamos la Rutina */
                            $.ajax({
                                url: "proceso/BusquedaRutina.process.php",
                                type: "POST",
                                cache: false,
                                data: $('#hidden_identificador_cliente').serialize(),
                                success: function (data) {

                                    /* Notificamos cuando no se encuentre la rutina */
                                    if (data.informacion.length === 0) {
                                        alert("No se encontraron rutinas.");
                                        $(".div_cargando_consulta").hide();
                                        return;
                                    }

                                    var informacion = data.informacion;
                                    var fila;

                                    for (i = 0; i < informacion.length; i++) {

                                        /* Creamos la fila */
                                        fila = "<tr id='fila_" + informacion[i].identificador + "' class='fila_resultado'><td>" + informacion[i].area + "</td><td>" + informacion[i].peso + "</td><td>" + informacion[i].series + "</td><td>" + informacion[i].fecha + "</td><td><input type='button' class='boton_formulario_modificar' id='boton_modificacion_rutina' name='" + informacion[i].identificador + "' onclick='modificarRutina(this.name)'><input type='button' class='boton_formulario_eliminar' id='boton_eliminacion_rutina' name='" + informacion[i].identificador + "' onclick='eliminarRutina(this.name)'></td></tr>";

                                        /* Mostramos la informacion */
                                        $("#tabla_resultados").append(fila);

                                    }

                                }

                            });

                            /* Ocultamos la animacion de carga */
                            $(".div_cargando_consulta").hide();

                        }

                    });

                });

            });

        </script>
    </head>
    <body>

        <!--Titulo-->
        <div class="contenedor_titulo_formulario">
            <a class="titulo_formulario">Modificar Rutina</a>
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

        <!--Listado de resultados-->
        <div class="contenedor_tabla_resultados">

            <table border="1" id="tabla_resultados">
                <thead>
                    <tr class="encabezado_resultados">
                        <th>Area</th>
                        <th>Peso</th>
                        <th>Series</th>
                        <th>Fecha</th>
                        <th>Accion</th>
                    </tr>  
                </thead>            
            </table>  

            <!--Identificador de Cliente-->
            <input type="hidden" id="hidden_identificador_cliente" name="hidden_identificador_cliente">

        </div>

        <!--Botones-->
        <div class="contenedor_boton_formulario">

            <div class="contenedor_boton_formulario">
                <input type="button" class="boton_formulario_volver" id="boton_volver" name="boton_volver" value="Volver">
            </div>

            <div class="div_cargando_consulta">
                <object data="img/cargando.svg" type="image/svg+xml">
                </object>
            </div>

        </div>

    </body>
</html>