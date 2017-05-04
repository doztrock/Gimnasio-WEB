<html>
	<head>
		<script type="text/javascript">
			
			$(document).ready(function(){
				
			});

		</script>
	</head>
	<body>
	
		<form>
			
			<div>

				<div>
					<label class="label_formulario">Cedula:</label>
					<input type="text" class="input_formulario" id="input_cedula" name="input_cedula">
				</div>

				<div>
					<label class="label_formulario">Nombre:</label>
					<input type="text" class="input_formulario" id="input_nombre" name="input_nombre">
				</div>

				<div>
					<label class="label_formulario">Genero:</label>
					<select id="combo_genero" class="select_formulario" name="combo_genero">
						<option value="M">Masculino</option>
						<option value="F">Femenino</option>
					</select>					
				</div>

				<div>
					<label class="label_formulario">Tipo de Sangre:</label>
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

				<div>
					<label class="label_formulario">Edad:</label>
					<input type="text" class="input_formulario" id="input_edad" name="input_edad">
				</div>

				<div>
					<label class="label_formulario">Telefono:</label>
					<input type="text" class="input_formulario" id="input_telefono" name="input_telefono">
				</div>

				<div>
					<label class="label_formulario">Direccion:</label>
					<input type="text" class="input_formulario" id="input_direccion" name="input_direccion">
				</div>

				<div>
					<label class="label_formulario">EPS:</label>
					<input type="text" class="input_formulario" id="input_eps" name="input_eps">
				</div>

			</div>

			<input type="button" class="boton_formulario_negativo" id="boton_cancelar" name="boton_cancelar" value="Cancelar">
			<input type="button" class="boton_formulario_positivo" id="boton_registrar" name="boton_registrar" value="Registrar">

		</form>

	</body>
</html>