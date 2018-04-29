	 <script>
    	$(document).ready(function() {
    		$('#user').focus();
    	});
    </script>
    <script src="res/ajax/UsuarioAjax.js"></script>
	<div class="cuadro c-centro" id="c-login">
		<div class="cuadro-ins bg-info" id="c-ins-login">
			<p class="lead text-center" id="title-login">Ingresar</p>
		</div>
		<div class="wrap">
			<form id="frmLogin">
				<div class="form-row">
					<div class="form-column col-md-12">
						<div class="form-group bmd-form-group" id="input-user">
							<label for="user" class="bmd-label-floating" id="label-user">Usuario</label>

							<input type="text" class="form-control" name="user" id="user">
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-column col-md-12">
						<div class="form-group bmd-form-group" id="input-pass">	
							<label for="pass" class="bmd-label-floating" id="label-pass">Contraseña</label>
							<input type="password" class="form-control" name="pass" id="pass">
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-column col-md-12">
						<div class="form-group bmd-form-group">
							<button type="button" class="waves-effect waves-light btn btn-raised btn-info" value="Ingresar" name="btnLogin" id="btnLogin">Ingresar</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
