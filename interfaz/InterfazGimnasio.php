<?php
/**
 * Este es el menu principal de la aplicacion 
 */

?>
<html>
    <head>
        <script type="text/javascript">

            $(document).ready(function () {

                /**
                 * Asociamos las acciones a los botones de la interfaz
                 */

                /* Boton: Registrar Cliente */
                $("#btn_registrar_cliente").click(function () {
                    $("#contenedor").load("interfaz/InterfazRegistroCliente.php");
                });

                /* Boton: Registrar Medidas */
                $("#btn_registrar_medidas").click(function () {
                    $("#contenedor").load("interfaz/InterfazRegistroMedidas.php");
                });

                /* Boton: Registrar Servicio */
                $("#btn_registrar_servicio").click(function () {
                    $("#contenedor").load("interfaz/InterfazRegistroServicio.php");
                });

                /* Boton: Imprimir Rutina */
                $("#btn_imprimir_rutina").click(function () {
                    $("#contenedor").load("interfaz/InterfazImpresionRutina.php");
                });

                /* Boton: Registrar Rutina */
                $("#btn_registrar_rutina").click(function () {
                    $("#contenedor").load("interfaz/InterfazRegistroRutina.php");
                });

                /* Boton: Modificar Rutina */
                $("#btn_modificar_rutina").click(function () {
                    $("#contenedor").load("interfaz/InterfazModificacionRutina.php");
                });

                /* Boton: Consultar Cliente */
                $("#btn_consultar_cliente").click(function () {
                    $("#contenedor").load("interfaz/InterfazConsultaCliente.php");
                });

            });

        </script>
    </head>
    <body>

        <!--Panel Izquierdo-->
        <div id="panel_izquierdo">

            <div class="contenedor_boton_menu_principal">
                <input type="button" id="btn_registrar_cliente" class="boton_menu_principal" value="Registrar Cliente">
            </div>
            <div class="contenedor_boton_menu_principal">
                <input type="button" id="btn_registrar_medidas" class="boton_menu_principal" value="Registrar Medidas">
            </div>
            <div class="contenedor_boton_menu_principal">
                <input type="button" id="btn_registrar_servicio" class="boton_menu_principal" value="Registrar Servicio">
            </div>

        </div>

        <!--Panel Central-->
        <div id="panel_central">

            <div class="">
                <input type="button" id="btn_imprimir_rutina" class="boton_menu_principal" value="Imprimir Rutina">
            </div>

        </div>

        <!--Panel Derecho-->
        <div id="panel_derecho">

            <div class="contenedor_boton_menu_principal">
                <input type="button" id="btn_registrar_rutina" class="boton_menu_principal" value="Registrar Rutina">
            </div>
            <div class="contenedor_boton_menu_principal">
                <input type="button" id="btn_modificar_rutina" class="boton_menu_principal" value="Modificar Rutina">
            </div>
            <div class="contenedor_boton_menu_principal">
                <input type="button" id="btn_consultar_cliente" class="boton_menu_principal" value="Consultar Cliente">
            </div>

        </div>

    </body>
</html>