 <!--  <div class="barra-titulo">
    <p class="texto-barra-titulo">
      Registro de Partidos
    </p>
  </div>
    <div class="dataTab">
      <table id="tableTransacciones" class="table table-hover table-bordered" style="width: 100%; margin: auto;">
        <thead class="bg-primary">
          <th class="text-light">idPartido</th>
          <th class="text-light">Nombre del Partido</th>
          <th class="text-light">Bandera</th>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>-->


  <div class="cuadro" id="c-partido">
    <div class="cuadro-ins bg-info">
      <p class="lead text-center">
        Registrar Partido
      </p>
    </div>
    <div class="wrap">
      <form id="frmPartido">
        
      <div class="form-row">
            <div class="form-column col-md-12">
                <div class="form-group bmd-form-group">
                    <label for="nomPartido" class="bmd-label-floating">Nombre del Partido</label>
                    <input type="text" class="form-control" name="nomPartido" id="nomPartido">
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