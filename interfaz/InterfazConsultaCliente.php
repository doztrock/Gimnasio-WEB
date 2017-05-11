<html>
    <head>
        <script type="text/javascript">

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
                            var fila;

                            /* Creamos la fila */
                            fila = "<tr class='fila_resultado'><td>" + informacion.cedula + "</td><td>" + informacion.nombre + "</td><td>" + informacion.edad + "</td><td>" + informacion.tipo_sangre + "</td><td>" + informacion.telefono + "</td><td>" + informacion.direccion + "</td><td>" + informacion.eps + "</td></tr>";

                            /* Mostramos la informacion */
                            $("#tabla_resultados").append(fila);

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
            <a class="titulo_formulario">Consultar Cliente</a>
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
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>RH</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>EPS</th>
                    </tr>  
                </thead>            
            </table>        
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