<?php
/**
 * Este es el menu principal de la aplicacion 
 */
?>
<html>
    <head>
        <script>

            $(document).ready(function () {

                /**
                 * Asociamos las acciones a los botones de la interfaz
                 */

                /* Boton: Registrar Cliente */
                $("#btn_registrar_cliente").click(function () {
                });

                /* Boton: Registrar Medidas */
                $("#btn_registrar_medidas").click(function () {
                });

                /* Boton: Registrar Servicio */
                $("#btn_registrar_servicio").click(function () {
                });

                /* Boton: Imprimir Rutina */
                $("#btn_imprimir_rutina").click(function () {
                });

                /* Boton: Registrar Rutina */
                $("#btn_registrar_rutina").click(function () {
                });

                /* Boton: Modificar Rutina */
                $("#btn_modificar_rutina").click(function () {
                });

                /* Boton: Consultar Cliente */
                $("#btn_consultar_cliente").click(function () {
                });

            });

        </script>
    </head>
    <body>

        <!--Panel Izquierdo-->
        <div id="panel_izquierdo">

            <div>
                <input type="button" id="btn_registrar_cliente" class="boton_menu_principal" value="Registrar Cliente">
            </div>
            <div>
                <input type="button" id="btn_registrar_medidas" class="boton_menu_principal" value="Registrar Medidas">
            </div>
            <div>
                <input type="button" id="btn_registrar_servicio" class="boton_menu_principal" value="Registrar Servicio">
            </div>

        </div>

        <!--Panel Central-->
        <div id="panel_central">

            <div>
                <input type="button" id="btn_imprimir_rutina" class="boton_menu_principal" value="Imprimir Rutina">
            </div>

        </div>

        <!--Panel Derecho-->
        <div id="panel_derecho">

            <div>
                <input type="button" id="btn_registrar_rutina" class="boton_menu_principal" value="Registrar Rutina">
            </div>
            <div>
                <input type="button" id="btn_modificar_rutina" class="boton_menu_principal" value="Modificar Rutina">
            </div>
            <div>
                <input type="button" id="btn_consultar_cliente" class="boton_menu_principal" value="Consultar Cliente">
            </div>

        </div>

    </body>
</html>