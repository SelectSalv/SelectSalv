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
	<!-- modal principal -->

	<div class="modal fade" id="modalFrmPersona" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header  bg-primary">
		        <div class="cuadro-ins-modal bg-primary">
					<p class="lead text-center">
						Registrar Persona
					</p>
				</div>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
	      </div>
	      <div class="modal-body">
	        
			<form id="frmPersona" action="../proc/procRegPersona.php" method="POST">
				<div class="form-row">
					<div class="form-column col-md-12">
						<div class="form-group bmd-form-group">
							<label for="dui" class="bmd-label-floating">DUI</label>
							<input type="text" class="form-control dui  requerido" name="dui" id="dui">
							<span id="ayudaDui" class="bmd-help">El guión será agregado automáticamente</span>
							<div id="mensajeDui" class="invalid-feedback">Ya se registró este N° de DUI</div>
						</div>
					</div>
				</div>

				<div class="form-row">
					<div class="form-column col-md-6">
						<div class="form-group bmd-form-group">
							<label for="nomPersona" class="bmd-label-floating">Nombres</label>
							<input type="text" class="form-control requerido" name="nomPersona" id="nomPersona">
						</div>
					</div>
					<div class="form-column col-md-6">
						<div class="form-group bmd-form-group">
							<label for="apellidosPersona" class="bmd-label-floating">Apellidos</label>
							<input type="text" class="form-control requerido" name="apellidosPersona" id="apellidosPersona">
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
							<input type="date" class="form-control requerido" name="fechaNacimiento" id="fechaNacimiento">
						</div>
					</div>
					<div class="form-column col-md-6">
						<div class="form-group bmd-form-group is-filled">
							<label for="fechaVencimiento" class="bmd-label-floating">Fecha de Vencimiento</label>
							<input type="date" class="form-control requerido" name="fechaVencimiento" id="fechaVencimiento">
						</div>
					</div>
				</div>
				
				<div class="form-row">
					<div class="form-column col-md-12">
						<div class="form-group bmd-form-group">
							<label for="profesion" class="bmd-label-floating">Profesión</label>
							<input type="text" class="form-control requerido" name="profesion" id="profesion">
						</div>
					</div>
				</div>

				<div class="form-row">
					<div class="form-column col-md-12">
						<div class="form-group bmd-form-group is-filled">
							<label for="municipio" class="bmd-label-floating">Municipio</label>
							<select type="text" class="form-control requerido" name="municipio" id="municipio">
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
							<input type="text" class="form-control requerido" name="direccion" id="direccion">
						</div>
					</div>
				</div>
			</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary waves-effect waves-ripple" data-dismiss="modal">Cancelar</button>
	       <button type="button" data-toggle="modal" data-target="#modalRegPersona" id="btnPersonaFrm" name="btnPersonaFrm" class="waves-effect waves-ripple waves-green btn btn-success">Registrar</button>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- modal secundario -->
	<div id="contenedor-modal">
		<div class="modal fade" id="modalRegPersona" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="modal-title-sec">Registrar Persona</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>		
		      <div id="modal-body-sec" class="modal-body">
		      </div>
		      <div class="modal-footer">
		        <button type="button" id="btnCancelar" class="btn btn-secondary waves-effect waves-ripple" data-dismiss="modal">Cancelar</button>
		        <button type="button" id="btnPersona" class="btnPersona btn btn-success waves-effect  waves-ripple waves-green">Registrar</button>
		      </div>
		    </div>
		  </div>
		</div>
	</div>

	<!-- modal buscar -->
	<div id="contenedor-modal">
		<div class="modal fade" id="modalBuscar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="modal-title-sec">Buscar</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>		
		      <div id="modal-body-buscar" class="modal-body">
		      	<form action="" id="frmBuscar">
		      		<div class="form-row">
					<div class="form-column col-md-12">
						<div class="form-group bmd-form-group">
							<label for="buscar" class="bmd-label-floating">Buscar</label>
							<input type="text" class="form-control" name="buscar" id="buscar">
						</div>
					</div>
				</div>
		      	</form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" id="btnBuscar" class="btn btn-primary waves-effect  waves-ripple waves-teal"><i class="material-icons align-middle">search</i></button>
		      </div>
		    </div>
		  </div>
		</div>
	</div>

<div class="contenedor">
    <div class="barra-titulo">
        <p class="texto-barra-titulo">
            Padrón Electoral
        </p>
    </div>
    <div class="barra-principal">
        <button type="button" style="margin-right: 10px;" class="waves-effect waves-light btn-raised btn btn-primary ml-auto p2" data-toggle="modal" data-target="#modalFrmPersona">
		 Registrar Persona
		</button>
		<button type="button" class="waves-effect waves-light btn-raised btn btn-secondary p2" data-toggle="modal" data-target="#modalBuscar">
		 Buscar
		</button>
    </div>
	<hr>
	<table class="mdl-data-table" cellspacing="1" width="100%" id="tablePadron">
	<thead>
		<th>N° DUI</th>
		<th>Apellidos</th>
		<th>Nombres</th>
		<th>JRV</th>
		<th>Acciones</th>
	</thead>
	<tbody>
		
	</tbody>
</table>
</div>



</body>
</html>