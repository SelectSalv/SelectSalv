<?php $usuario = new UsuarioController() ?>	

<link rel="stylesheet" href="res/plugins/dataTableBootstrap/dataTables.bootstrap4.min.css">
<script src="res/plugins/dataTableBootstrap/jquery.dataTables.min.js"></script>
<script src="res/plugins/dataTableBootstrap/dataTables.bootstrap.min.js"></script>

<script src="res/ajax/UsuarioAjax.js"></script>

<!-- modal de registro -->
	<div id="contenedor-modal">
		<div class="modal fade" id="modalRegistrar" tabindex="-1" role="dialog" aria-labelledby="modalregistrarPersona" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header" id="modal-header-registrar">
		        <h5 class="modal-title" id="modal-title-registrar">Registrar Usuario</h5>
		      </div>		
		      <div id="modal-body-registrar" class="modal-body">
		      	<form id="frmRegistrar">
		      		<div class="form-row">
		      			<div class="form-column col-md-12">
		      				<div class="form-group bmd-form-group">
		      					<label id="labelUsuario" class="bmd-label-floating" for="nomUsuario">Nombre de Usuario:</label>
		      					<input type="text" class="form-control requeridoRegistrar" name="nomUsuario" id="nomUsuario">
		      					<div id="mensajeUsuario" class="invalid-feedback"></div>
		      				</div>
		      			</div>
		      			<div class="form-column col-md-12">
		      				<div class="form-group bmd-form-group">
		      					<label class="bmd-label-floating" for="passUsuario">Contraseña:</label>
		      					<input type="password" class="form-control requeridoRegistrar" name="passUsuario" id="passUsuario">
		      				</div>
		      			</div>
		      			<div class="form-column col-md-12">
		      				<div class="form-group bmd-form-group is-filled">
		      					<label class="bmd-label-floating" for="rolUsuario">Permisos de la Cuenta:</label>
		      					<select class="form-control" name="rolUsuario" id="rolUsuario">
		      						<option value="lcqe0p8=">Administrador</option>
		      						<option value="ndSn">Invitado</option>
		      					</select>
		      				</div>
		      			</div>
		      		</div>
		      	</form>
		      </div>
		      <div class="modal-footer" id="modal-footer-registrar">
		       <button type="button" id="btnCancelarRegistrar" class="btn btn-secondary material-ripple" data-dismiss="modal">Cancelar</button>
		        <button type="button" id="btnRegistrar" data-dismiss="modal" class="btn btn-success">Registrar</button>
		      </div>
		    </div>
		  </div>
		</div>

<!-- modal editar -->
<div id="contenedor-modal">
		<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modaleditarPersona" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header" id="modal-header-editar">
		        <h5 class="modal-title" id="modal-title-editar">Editar Usuario</h5>
		      </div>		
		      <div id="modal-body-editar" class="modal-body">
		      	<form id="frmEditar">
		      		<div class="form-row">
		      			<div class="form-column col-md-12">
		      				<div class="form-group bmd-form-group">
		      					<label class="bmd-label-floating" for="nomUsuario">Nombre de Usuario:</label>
		      					<input type="text" class="form-control requeridoEditar" name="nomUsuarioEditar" id="nomUsuarioEditar">
		      				</div>
		      			</div>
		      			<div class="form-column col-md-6">
		      				<div class="form-group bmd-form-group">
		      					<label class="bmd-label-floating" for="passUsuario" id="labelContra">Contraseña Antigua:</label>
		      					<input type="password" class="form-control requeridoEditar" name="passAntiguaEditar" id="passAntiguaEditar">
		      					<div id="mensajeContra" class="invalid-feedback"></div>
		      				</div>
		      			</div>
		      			<div class="form-column col-md-6">
		      				<div class="form-group bmd-form-group">
		      					<label class="bmd-label-floating" for="passUsuario">Nueva Contraseña:</label>
		      					<input type="password" class="form-control requeridoEditar" name="passNuevaEditar" id="passNuevaEditar">
		      				</div>
		      			</div>
		      			<div class="form-column col-md-12">
		      				<div class="form-group bmd-form-group is-filled">
		      					<label class="bmd-label-floating" for="rolUsuario">Permisos de la Cuenta:</label>
		      					<select class="form-control" name="rolUsuarioEditar" id="rolUsuarioEditar">
		      						<option value="lcqe0p8=">Administrador</option>
		      						<option value="ndSn">Invitado</option>
		      					</select>
		      					<input type="hidden" id="idUsuarioEditar" name="idUsuarioEditar">
		      				</div>
		      			</div>
		      		</div>
		      	</form>
		      </div>
		      <div class="modal-footer" id="modal-footer-editar">
		       <button type="button" id="btnCancelarEditar" class="btn btn-secondary material-ripple" data-dismiss="modal">Cancelar</button>
		        <button type="button" id="btnEditar" data-dismiss="modal" class="btn btn-info">Guardar Cambios</button>
		      </div>
		    </div>
		  </div>
		</div>


<!-- Modal Eliminar -->
	<div id="contenedor-modal">
		<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalregistrarPersona" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header" id="modal-header-eliminar">
		        <h5 class="modal-title" id="modal-title-eliminar">Eliminar Usuario</h5>
		      </div>		
		      <div id="modal-body-eliminar" class="modal-body">
		      	¿Desea eliminar a este usuario del Sistema?
		      </div>
		      <div class="modal-footer" id="modal-footer-eliminar">
		       <button type="button" id="btnCancelarEliminar" class="btn btn-secondary material-ripple" data-dismiss="modal">Cancelar</button>
		        <button type="button" id="btnEliminar" data-dismiss="modal" class="btn btn-danger">Eliminar</button>
		      </div>
		    </div>
		  </div>
		</div>

<!-- Contenido -->
<div class="contenedor">
	<div class="barra-titulo">
		<p class="texto-barra-titulo">
			Gestión de Usuarios
		</p>
	</div>
	<div class="barra-principal">
		<button class="btn btn-raised btn-primary ml-auto p2" id="btnNuevoUsuario">Registrar Usuario</button>
	</div>
	
	<hr>

	<div class="dataTab">
		<table id="tableUsuarios" class="table table-hover table-bordered" style="width: 100%; margin: auto;">
			<thead class="bg-primary">
				<th class="text-light">idUsuario</th>
				<th class="text-light">Nombre de Usuario</th>
				<th class="text-light">Permisos</th>
				<th class="text-light">Acciones</th>
			</thead>
			<tbody>
				
			</tbody>
		</table>
	</div>
</div>