<div class="cuadro" id="c-candidato">
		<div class="cuadro-ins bg-info">
			<p class="lead text-center">
				Registrar Candidato
			</p>
		</div>
		<div class="wrap">
			<form id="frmCandidato">
				<div class="form-row">
					<div class="form-column col-md-12">
						<div class="form-group bmd-form-group">
							<label for="duiCandidato" class="bmd-label-floating">DUI del Candidato</label>
							<input type="text" class="form-control" name="duiCandidato" id="duiCandidato">
						</div>
					</div>
				</div>

				<div class="form-row">
					<div class="form-column col-md-6">
						<div class="form-group bmd-form-group is-filled">
							<label for="departamento" class="bmd-label-floating">Partido Político</label>
							<select type="text" class="form-control" name="departamento" id="departamento">
								<option value="-">Seleccione uno...</option>
								<option value="Partido 1">Partido 1</option>
								<option value="Partido 2">Partido 2</option>
								<option value="Partido 3">Partido 3</option>			
							</select>
						</div>
					</div>
					<div class="form-column col-md-6">
						<div class="form-group bmd-form-group is-filled">
							<label for="municipio" class="bmd-label-floating">Tipo de Candidato</label>
							<select type="text" class="form-control" name="municipio" id="municipio">
								<option value="-">Seleccione uno...</option>
								<option value="Presidente">Presidente</option>
								<option value="Vicepresidente">Vicepresidente</option>
							</select>
						</div>
					</div>
				</div>

				<br>
				<div class="form-row">
					<div class="form-column col-md-12">
						<div class="form-group">
							<div class="custom-file">
							  <input type="file" class="custom-file-input" id="customFileLang" lang="es">
							  <label class="custom-file-label" for="customFileLang">Seleccionar Foto</label>
							</div>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-column col-md-12">
						<div class="form-group bmd-form-group">
							<button type="button" id="btnPersona" name="btnPartido" class="waves-effect waves-light btn btn-raised btn-info">Registrar</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>