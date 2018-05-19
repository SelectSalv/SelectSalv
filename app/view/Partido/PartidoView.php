  <?php $partido = new PartidoController() ?>
  
  <link rel="stylesheet" href="res/plugins/dataTableBootstrap/dataTables.bootstrap4.min.css">
  <script src="res/plugins/dataTableBootstrap/jquery.dataTables.min.js"></script>
  <script src="res/plugins/dataTableBootstrap/dataTables.bootstrap.min.js"></script>

  <script src="res/ajax/PartidoAjax.js"></script>

  <script>
    $(document).ready(function() {
      
    });
  </script>

    <!-- modal principal de Registro -->
    <div id="contenedor-modal">
        <div class="modal fade" id="modalFrmPartido" tabindex="-1" role="dialog" aria-labelledby="ModalFrm" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header" id="modal-header-frm">
                <h5 class="modal-title" id="modal-title-frm">Registrar Partido</h5>
              </div>        
              <div id="modal-body-frm" class="modal-body">
                        <form id="frmPartido" action="../proc/procRegPartido.php" method="POST">

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
                      <input type="file" class="" id="customFileLang" lang="es">
                      <label class="" for="customFileLang">Seleccionar Bandera</label>
                    </div>
                </div>
            </div>
        </div>


                    </form>
              </div>
              <div class="modal-footer" id="modal-footer-frm">
                <button type="button" id="btnCancelarFrm" class="btn btn-secondary material-ripple" data-dismiss="modal">Cancelar</button>
                <button type="button" id="btnFrmRegistrar" class="btn btn-success material-ripple">Registrar</button>
              </div>
            </div>
          </div>
        </div>