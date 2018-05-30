	<?php $persona = new PersonaController() ?>
	

	<!-- DataTable -->
	<link rel="stylesheet" href="res/plugins/dataTableBootstrap/dataTables.bootstrap4.min.css">
	<script src="res/plugins/dataTableBootstrap/jquery.dataTables.min.js"></script>
	<script src="res/plugins/dataTableBootstrap/dataTables.bootstrap.min.js"></script>
	

	<!-- datePicker -->
	<link rel="stylesheet" href="res/plugins/datePicker/css/gijgo.css">
	<script src="res/plugins/datePicker/js/gijgo.js"></script>
	<script src="res/plugins/datePicker/js/messages/messages.es-es.js"></script>
	
	<style>
		.autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; }
.autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
.autocomplete-selected { background: #F0F0F0; }
.autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
.autocomplete-group { padding: 2px 5px; }
.autocomplete-group strong { display: block; border-bottom: 1px solid #000; }
	</style>
	<!-- Ajax Persona -->
	<script src="res/ajax/PersonaAjax.js"></script>
	
	<!-- Inicializacion DatePicker -->
	<script>
        $(document).ready(function () {
        	 var datepicker, config;
		        config = {
		            locale: 'es-es',
		            uiLibrary: 'materialdesign',
		            format: 'dd/mm/yyyy'
		        };

            $('#fechaNacimiento').datepicker(config);
            $('#fechaVencimiento').datepicker(config);
        });
    </script>
    <script>
    	$(document).ready(function() {
    		var municipios = <?php echo $municipios.";" ?>
    		var options = {
					// serviceUrl: "?1=Persona&2=listaMunicipios",
					lookup: municipios
				};
				$('.autoMunicipio').autocomplete({
					lookup: municipios
				}); 
    	});	
    </script>
        <script>
    	$(document).ready(function() {
    		var municipios = <?php echo $municipios.";" ?>
    		var options = {
					// serviceUrl: "?1=Persona&2=listaMunicipios",
					lookup: municipios
				};
				$('.autoMunicipio').autocomplete({
					lookup: municipios
				}); 
    	});	
    </script>
	<!-- modal principal de Registro -->
	<div id="contenedor-modal">
		<div class="modal fade" id="modalFrmPersona" tabindex="-1" role="dialog" aria-labelledby="ModalFrm" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header" id="modal-header-frm">
		        <h5 class="modal-title" id="modal-title-frm">Registrar Persona</h5>
		      </div>		
		      <div id="modal-body-frm" class="modal-body">
					  	<form id="frmPersona" action="" method="POST">
							<div class="form-row">
								<div class="form-column col-md-12">
									<div class="form-group bmd-form-group">
										<label for="dui" id="label-dui" class="bmd-label-floating">DUI</label>
										<input type="text" class="form-control dui  requeridoRegistrar" name="dui" id="dui">
										<span id="ayudaDui" class="bmd-help">El guión será agregado automáticamente</span>
										<div id="mensajeDui" class="invalid-feedback">Ya se registró este N° de DUI</div>
									</div>
								</div>
							</div>

							<div class="form-row">
								<div class="form-column col-md-6">
									<div class="form-group bmd-form-group">
										<label for="nomPersona" class="bmd-label-floating">Nombres</label>
										<input type="text" class="form-control requeridoRegistrar" name="nomPersona" id="nomPersona">
									</div>
								</div>
								<div class="form-column col-md-6">
									<div class="form-group bmd-form-group">
										<label for="apellidosPersona" class="bmd-label-floating">Apellidos</label>
										<input type="text" class="form-control requeridoRegistrar" name="apellidosPersona" id="apellidosPersona">
									</div>
								</div>
							</div>

							<div class="form-row">
								<div class="form-column col-md-6">
									<div class="form-group bmd-form-group is-filled">
										<label for="" class="bmd-label-floating">Género</label>
										<select name="genero" id="genero" class="form-control">
											<option value="-" data="">Seleccione uno...</option>
											<option value="1" data="Masculino">Masculino</option>
											<option value="2" data="Femenino">Femenino</option>
										</select>
									</div>
								</div>
								<div class="form-column col-md-6">
									<div class="form-group bmd-form-group is-filled">
										<label for="" class="bmd-label-floating">Estado Civil</label>
										<select name="estadoCivil" id="estadoCivil" class="form-control">
											<option value="-" data="">Seleccione uno...</option>
											<option value="1" data="Soltero">Soltero</option>
											<option value="2" data="Casado">Casado</option>
											<option value="3" data="Divorciado">Divorciado</option>
											<option value="4" data="Viudo">Viudo</option>
										</select>
									</div>
								</div>
							</div>

							<div class="form-row">
								<div class="form-column col-md-6">
									<div class="form-group bmd-form-group is-filled">
										<label for="fechaNacimiento" class="bmd-label-floating">Fecha de Nacimiento</label>
										<input class="form-control fecha requeridoRegistrar" name="fechaNacimiento" id="fechaNacimiento">
									</div>
								</div>
								<div class="form-column col-md-6">
									<div class="form-group bmd-form-group is-filled">
										<label for="fechaVencimiento" class="bmd-label-floating">Fecha de Vencimiento</label>
										<input class="form-control fecha requeridoRegistrar" name="fechaVencimiento" id="fechaVencimiento">
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="form-column col-md-12">
									<div class="form-group bmd-form-group">
										<label for="profesion" class="bmd-label-floating">Profesión</label>
										<input type="text" class="form-control requeridoRegistrar" name="profesion" id="profesion">
									</div>
								</div>
							</div>

							<div class="form-row">
								<div class="form-column col-md-12">
									<div class="form-group bmd-form-group is-filled">
										<label for="municipio" class="bmd-label-floating">Municipio</label>
										<input class="form-control autoMunicipio requeridoRegistrar" name="municipio" id="municipio">
										<!-- <select type="text" class="form-control autoMunicipio requeridoRegistrar" name="municipio" id="municipio">
											
										</select> -->
										<!-- <select type="text" class="form-control requeridoRegistrar" name="municipio" id="municipio">
											<option value="-" data="">Seleccione uno...</option>
											<option value="1" data="SanTa Tecla">Santa Tecla</option>
											<option value="2" data="San Salvador">San Salvador</option>
										</select> -->
									</div>
								</div>
							</div>

							<div class="form-row">
								<div class="form-column col-md-12">
									<div class="form-group bmd-form-group">
										<label for="direccion" class="bmd-label-floating">Dirección</label>
										<input type="text" class="form-control requeridoRegistrar" name="direccion" id="direccion">
									</div>
								</div>
							</div>
					</form>
		      </div>
		      <div class="modal-footer" id="modal-footer-frm">
		      	<button type="button" id="btnCancelarFrm" class="btn btn-secondary material-ripple" data-dismiss="modal">Cancelar</button>
		        <button type="button" id="btnFrmRegistrar" class="btn btn-success material-ripple" data-dismiss="modal">Registrar</button>
		      </div>
		    </div>
		  </div>
		</div>


	<!-- modal secundario -->
	<div id="contenedor-modal">
		<div class="modal fade" id="modalDatos" tabindex="-1" role="dialog" aria-labelledby="modalDatosPersona" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header" id="modal-header-datos">
		        <h5 class="modal-title" id="modal-title-datos">Registrar Persona</h5>
		      </div>		
		      <div id="modal-body-datos" class="modal-body">
		      	<table width="80%" style="margin: auto;" class="table table-striped" id="tablaModalDatos">
		      		<thead>
		      			<tr>
		      				<th>Campos</th>
		      				<th>Datos</th>
		      			</tr>
		      		</thead>
		      		<tbody id="bodyTablaDatos">
		      			
		      		</tbody>
		      	</table>
		      	<div id="mensaje-modal"></div>
		      </div>
		      <div class="modal-footer" id="modal-footer-datos">
		       <button type="button" id="btnCancelarDatos" class="btn btn-secondary material-ripple" data-dismiss="modal">Cancelar</button>
		        <button type="button" id="btnDatos" class="btn btn-success material-ripple ">Registrar</button>
		      </div>
		    </div>
		  </div>
		</div>


<!-- Modal Modificar -->
	<div id="contenedor-modal">
		<div class="modal fade" id="modalFrmModificar" tabindex="-1" role="dialog" aria-labelledby="ModalFrmModificar" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header" id="modal-header-modificar">
		        <h5 class="modal-title" id="modal-title-modificar">Modificar Información</h5>
		      </div>		
		      <div id="modal-body-modificar" class="modal-body">
					  	<form id="frmModificar" method="POST">
							<div class="form-row">
								<div class="form-column col-md-12">
									<div class="form-group bmd-form-group">
										<label for="dui" id="label-dui" class="bmd-label-floating">DUI</label>
										<input type="text" class="form-control dui  requerido" name="dui" id="duiModificar">
										<span id="ayudaDui" class="bmd-help">El guión será agregado automáticamente</span>
										<div id="mensajeDui" class="invalid-feedback">Ya se registró este N° de DUI</div>
									</div>
								</div>
							</div>

							<div class="form-row">
								<div class="form-column col-md-6">
									<div class="form-group bmd-form-group">
										<label for="nomPersona" class="bmd-label-floating">Nombres</label>
										<input type="text" class="form-control requerido" name="nomPersona" id="nomPersonaModificar">
									</div>
								</div>
								<div class="form-column col-md-6">
									<div class="form-group bmd-form-group">
										<label for="apellidosPersona" class="bmd-label-floating">Apellidos</label>
										<input type="text" class="form-control requerido" name="apellidosPersona" id="apellidosPersonaModificar">
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="form-column col-md-6">
									<div class="form-group bmd-form-group is-filled">
										<label for="" class="bmd-label-floating">Género</label>
										<select name="generoModificar" id="generoModificar" class="form-control">
											<option value="-" data="">Seleccione uno...</option>
											<option value="1" data="Masculino">Masculino</option>
											<option value="2" data="Femenino">Femenino</option>
										</select>
									</div>
								</div>
								<div class="form-column col-md-6">
									<div class="form-group bmd-form-group is-filled">
										<label for="" class="bmd-label-floating">Estado Civil</label>
										<select name="estadoCivilModificar" id="estadoCivilModificar" class="form-control">
											<option value="-" data="">Seleccione uno...</option>
											<option value="1" data="Soltero">Soltero</option>
											<option value="2" data="Casado">Casado</option>
											<option value="3" data="Divorciado">Divorciado</option>
											<option value="4" data="Viudo">Viudo</option>
										</select>
									</div>
								</div>
							</div>

							<div class="form-row">
								<div class="form-column col-md-6">
									<div class="form-group bmd-form-group is-filled">
										<label for="fechaNacimiento" class="bmd-label-floating">Fecha de Nacimiento</label>
										<input type="date" class="form-control requerido" name="fechaNacimiento" id="fechaNacimientoModificar">
									</div>
								</div>
								<div class="form-column col-md-6">
									<div class="form-group bmd-form-group is-filled">
										<label for="fechaVencimiento" class="bmd-label-floating">Fecha de Vencimiento</label>
										<input type="date" class="form-control requerido" name="fechaVencimiento" id="fechaVencimientoModificar">
									</div>
								</div>
							</div>
							
							<div class="form-row">
								<div class="form-column col-md-12">
									<div class="form-group bmd-form-group">
										<label for="profesion" class="bmd-label-floating">Profesión</label>
										<input type="text" class="form-control requerido" name="profesion" id="profesionModificar">
									</div>
								</div>
							</div>

							<div class="form-row">
								<div class="form-column col-md-12">
									<div class="form-group bmd-form-group is-filled">
										<label for="municipio" class="bmd-label-floating">Municipio</label>
										<input class="form-control autoMunicipio requerido" name="municipio" id="municipioModificar">
										<!-- <select type="text" class="form-control requerido" name="municipio" id="municipioModificar">
											<option value="-">Seleccione uno...</option>
											<option value="1">Santa Tecla</option>
											<option value="2">San Salvador</option>
										</select> -->
									</div>
								</div>
							</div>

							<div class="form-row">
								<div class="form-column col-md-12">
									<div class="form-group bmd-form-group">
										<label for="direccion" class="bmd-label-floating">Dirección</label>
										<input type="text" class="form-control requerido" name="direccion" id="direccionModificar">
										<input type="hidden" name="idModificar" id="idModificar">
									</div>
								</div>
							</div>
					</form>
		      </div>
		      <div class="modal-footer" id="modal-footer-modificar">
		      	<button type="button" id="btnCancelarModificar" class="btn btn-secondary material-ripple" data-dismiss="modal">Cancelar</button>
		        <button type="button" id="btnFrmModificar" class="btn btn-info material-ripple">Guardar Cambios</button>
		      </div>
		    </div>
		  </div>
		</div>
	
<!-- modal eliminar -->
	<div id="contenedor-modal">
		<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarPersona" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header" id="modal-header-eliminar">
		        <h5 class="modal-title" id="modal-title-eliminar">Eliminar del Padrón</h5>
		      </div>		
		      <div id="modal-body-eliminar" class="modal-body">
		      	¿Desea eliminar este registro?
		      </div>
		      <div class="modal-footer" id="modal-footer-eliminar">
		       <button type="button" id="btnCancelarEliminar" class="btn btn-secondary material-ripple" data-dismiss="modal">Cancelar</button>
		        <button type="button" id="btnEliminar" data-dismiss="modal" class="btn btn-danger material-ripple ">Eliminar</button>
		      </div>
		    </div>
		  </div>
		</div>
	<!-- modal Detalles -->
	<div id="contenedor-modal">
		<div class="modal fade" id="modalDetalles" tabindex="-1" role="dialog" aria-labelledby="modalDetallesPersona" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header" id="modal-header-detalles">
		        <h5 class="modal-title" id="modal-title-detalles">Información adicional</h5>
		      </div>		
		      <div id="modal-body-detalles" class="modal-body">
		      	
		      </div>
		      <div class="modal-footer" id="modal-footer-detalles">
		       <button type="button" id="btnCancelardetalles" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>
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
    <?php 

    	if(($_SESSION["rol"] == "Administrador") || ($_SESSION["rol"] == "Desarrollador"))
    	{
    		echo '	<div class="barra-principal">
				        <button type="button" id="btnRegistrar" class="material-ripple btn-raised btn btn-primary ml-auto p2">
				        	
						 Registrar Persona
						</button>
				    </div>
					<hr>';
    	}

    ?>
	<div class="dataTab">
		<table id="tablePadron" class="table table-hover table-bordered" style="width:100%; margin:auto;">
			<thead class="bg-primary">
	            <tr>
	            	<th class="text-light" >idPersona</th>
	                <th class="text-light" >DUI</th>
	                <th class="text-light" >Apellidos</th>
	                <th class="text-light" >Nombres</th>
	                <th class="text-light" >JRV</th>
	                <th class="text-light" >Género</th>
	                <th class="text-light" >Fecha de Nacimiento</th>
	                <th class="text-light" >Municipio</th>
	                <th class="text-light" >Estado</th>
	              	<th class="text-light" >Acciones</th>
	            </tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</div>

