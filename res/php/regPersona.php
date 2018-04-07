<?php  
	include 'plantillas.php';
	$plantilla = new Plantilla();
	$plantilla->compInicioSesion();
	$nomUsuario = $_SESSION["nomUsuario"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo $nomUsuario; ?> | Registrar Persona </title>
	<?php $plantilla->Zeldas() ?>
	<script src="../js/regPersona.js"></script>
</head>
<body id="body">
	<?php 
		$plantilla->HeaderBarUser(); 
		$plantilla->Menu();
	?>
	<div class="cuadro" id="c-persona">
		<div class="cuadro-ins bg-primary">
			<p class="lead text-center">
				Registrar Persona
			</p>
		</div>
		<div class="wrap">
			<form id="frmPersona" action="../proc/procRegPersona.php" method="POST">
				<div class="form-row">
					<div class="form-column col-md-12">
						<div class="form-group bmd-form-group">
							<label for="dui" class="bmd-label-floating">DUI</label>
							<input type="text" class="form-control" name="dui" id="dui">
						</div>
					</div>
				</div>

				<div class="form-row">
					<div class="form-column col-md-6">
						<div class="form-group bmd-form-group">
							<label for="nomPersona" class="bmd-label-floating">Nombres</label>
							<input type="text" class="form-control" name="nomPersona" id="nomPersona">
						</div>
					</div>
					<div class="form-column col-md-6">
						<div class="form-group bmd-form-group">
							<label for="apellidosPersona" class="bmd-label-floating">Apellidos</label>
							<input type="text" class="form-control" name="apellidosPersona" id="apellidosPersona">
						</div>
					</div>
				</div>

				<div class="form-row">
					<div class="form-column col-md-6">
						<label for="">Género</label>
						   <span class="bmd-form-group is-filled">
						   	<div class="radio">
						   	    <label style="color:#555;">
						   	      <input type="radio" name="generoPersona" id="generoPersona1" value="Masculino" >
						   	      <span class="bmd-radio waves-effect waves-ripple"></span>
						   	      Masculino
						   	    </label>
						   	  </div>
						   </span>
						   <span class="bmd-form-group is-filled">
						   	<div class="radio">
						   	    <label style="color:#555;">
						   	      <input type="radio" name="generoPersona" id="generoPersona2" value="Femenino" >
						   	      <span class="bmd-radio waves-effect waves-ripple"></span>
						   	      Femenino
						   	    </label>
						   	  </div>
						   </span>
					</div>
						<div class="form-column col-md-6">
						<label for="">Estado Civil</label>
						   <span class="bmd-form-group is-filled">
						   	<div class="radio">
						   	    <label style="color:#555;">
						   	      <input type="radio" name="estadoCivil" id="estadoCivil1" value="Casado" >
						   	      <span class="bmd-radio waves-effect waves-ripple"></span>
						   	      Casado
						   	    </label>
						   	  </div>
						   </span>
						   <span class="bmd-form-group is-filled">
						   	<div class="radio">
						   	    <label style="color:#555;">
						   	      <input type="radio" name="estadoCivil" id="estadoCivil2" value="Soltero" >
						   	      <span class="bmd-radio waves-effect waves-ripple"></span>
						   	      Soltero
						   	    </label>
						   	  </div>
						   </span>
						   <span class="bmd-form-group is-filled">
						   	<div class="radio">
						   	    <label style="color:#555;">
						   	      <input type="radio" name="estadoCivil" id="estadoCivil3" value="Divorciado" >
						   	      <span class="bmd-radio waves-effect waves-ripple"></span>
						   	      Divorciado
						   	    </label>
						   	  </div>
						   </span>
						   	   <span class="bmd-form-group is-filled">
						   	<div class="radio">
						   	    <label style="color:#555;">
						   	      <input type="radio" name="estadoCivil" id="estadoCivil4" value="Viudo" >
						   	      <span class="bmd-radio waves-effect waves-ripple"></span>
						   	      Viudo
						   	    </label>
						   	  </div>
						   </span>
					</div>
				</div>

				<div class="form-row">
					<div class="form-column col-md-6">
						<div class="form-group bmd-form-group is-filled">
							<label for="fechaNacimiento" class="bmd-label-floating">Fecha de Nacimiento</label>
							<input type="date" class="form-control" name="fechaNacimiento" id="fechaNacimiento">
						</div>
					</div>
					<div class="form-column col-md-6">
						<div class="form-group bmd-form-group is-filled">
							<label for="fechaVencimiento" class="bmd-label-floating">Fecha de Vencimiento</label>
							<input type="date" class="form-control" name="fechaVencimiento" id="fechaVencimiento">
						</div>
					</div>
				</div>
				
				<div class="form-row">
					<div class="form-column col-md-12">
						<div class="form-group bmd-form-group">
							<label for="profesion" class="bmd-label-floating">Profesión</label>
							<input type="text" class="form-control" name="profesion" id="profesion">
						</div>
					</div>
				</div>

				<div class="form-row">
					<div class="form-column col-md-12">
						<div class="form-group bmd-form-group is-filled">
							<label for="municipio" class="bmd-label-floating">Municipio</label>
							<select type="text" class="form-control" name="municipio" id="municipio">
								<option value="-">Seleccione uno...</option>
								<option value="1">Santa Tecla</option>
								<option value="2">San Salvador</option>
							</select>
						</div>
					</div>
				</div>

				<div class="form-row">
					<div class="form-column col-md-12">
						<div class="form-group bmd-form-group">
							<label for="direccion" class="bmd-label-floating">Dirección</label>
							<input type="text" class="form-control" name="direccion" id="direccion">
						</div>
					</div>
				</div>

				<div class="form-row">
					<div class="form-column col-md-12">
						<div class="form-group bmd-form-group">
							<button type="button" id="btnPersona" name="btnPersona" class="waves-effect waves-light btn btn-raised btn-success">Registrar</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>