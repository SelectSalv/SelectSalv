<<<<<<< HEAD
=======
  <link rel="stylesheet" href="res/plugins/dataTableBootstrap/dataTables.bootstrap4.min.css">
<script src="res/plugins/dataTableBootstrap/jquery.dataTables.min.js"></script>
<script src="res/plugins/dataTableBootstrap/dataTables.bootstrap.min.js"></script>
<script src="res/ajax/PartidoAjax.js"></script>
  

<!--MODAL REGISTRAR PARTIDO-->
  <div id="contenedor-modal">
    <div class="modal fade" id="modalFrmPartido" tabindex="-1" role="dialog" aria-labelledby="ModalFrm" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header" id="modal-header-frm">
            <h5 class="modal-title" id="modal-title-frm">Registrar Partido</h5>
          </div>    
          <div id="modal-body-frm" class="modal-body">
      <form id="frmPartido" enctype="multipart/form-data">
        
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
                <input type="file" class="custom-file-input" id="customFileLang" lang="es" name="bandera">
                <label class="custom-file-label" for="customFileLang">Seleccionar Foto</label>
              </div>
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="form-column col-md-12">
            <div class="form-group bmd-form-group">
              <button type="button" id="btnCancelarFrm" class="btn btn-secondary material-ripple" data-dismiss="modal">Cancelar</button>
              <button type="button" id="btnPartido" name="btnPartido" class="waves-effect waves-light btn btn-raised btn-info">Registrar</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>


<div class="contenedor">
  <div class="barra-titulo" >
    <p class="texto-barra-titulo">
      Registro de Partidos
    </p>
  </div>
  <?php 

      if(($_SESSION["rol"] == "Administrador") || ($_SESSION["rol"] == "Desarrollador"))
      {
        echo '  <div class="barra-principal">
                <button type="button" id="btnRegistrarPartido" class="material-ripple btn-raised btn btn-primary ml-auto p2">
                  
             Registrar Partido
            </button>
            </div>
          <hr>';
      }

    ?>
    <div class="dataTab">
      <table id="tablePartidos" class="table table-hover table-bordered" style="width: 100%; margin: auto;">
        <thead class="bg-primary">
          <th class="text-light">idPartido</th>
          <th class="text-light">Nombre del Partido</th>
          <th class="text-light">Bandera</th>
          <th class="text-light">Acciones</th>
        </thead>
        <tbody>


        </tbody>
      </table>
    </div>
    </div>
