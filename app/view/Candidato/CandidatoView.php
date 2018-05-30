<?php $Candidato = new CandidatoController() ?>
  
  <link rel="stylesheet" href="res/plugins/dataTableBootstrap/dataTables.bootstrap4.min.css">
  <script src="res/plugins/dataTableBootstrap/jquery.dataTables.min.js"></script>
  <script src="res/plugins/dataTableBootstrap/dataTables.bootstrap.min.js"></script>

  <script src="res/ajax/CandidatoAjax.js"></script>
  
  <!-- modal principal de Registro -->
 <div id="contenedor-modal">
    <div class="modal fade" id="modalFrmCandidato" tabindex="-1" role="dialog" aria-labelledby="ModalFrm" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header" id="modal-header-frm">
            <h5 class="modal-title" id="modal-title-frm">Registrar Candidato</h5>
          </div>    
          <div id="modal-body-frm" class="modal-body">
              <form id="frmCandidato" action="" method="POST">
              <div class="form-row">
                <div class="form-column col-md-12">
                  <div class="form-group bmd-form-group">
                    <label for="dui" id="label-dui" class="bmd-label-floating">DUI de el Candidato</label>
                    <input type="text" class="form-control dui  requeridoRegistrar" name="dui" id="dui">
                    <span id="ayudaDui" class="bmd-help">El guión será agregado automáticamente</span>
                    <div id="mensajeDui" class="invalid-feedback">Ya se registró este N° de DUI</div>
                  </div>
                </div>
              </div>

              <div class="form-row">
          <div class="form-column col-md-6">
            <div class="form-group bmd-form-group is-filled">
              <label for="departamento" class="bmd-label-floating">Partido Político</label>
              <select type="text" class="form-control partido" name="partido" id="partido">
                
              </select>
            </div>
          </div>
          <div class="form-column col-md-6">
            <div class="form-group bmd-form-group is-filled">
              <label for="municipio" class="bmd-label-floating">Tipo de Candidato</label>
              <select type="text" class="form-control tipo" name="TipoCandidato" id="TipoCandidato">
                
              </select>
            </div>
          </div>

          <br>
        <div class="form-row">
          <div class="form-column col-md-12">
            <div class="form-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFileLang" lang="es" name="candidato">
                <label class="custom-file-label" for="customFileLang">Seleccionar Foto</label>
              </div>
            </div>
          </div>
        </div>
        </div>

              
          </form>
          </div>
          <div class="modal-footer" id="modal-footer-frm">
            <button type="button" id="btnCancelarFrm" class="btn btn-secondary material-ripple" data-dismiss="modal">Cancelar</button>
            <button type="button" id="btnFrmRegistrar" class="btn btn-success material-ripple">Registrar Candidato</button>
          </div>
        </div>
      </div>
    </div>


  <!-- modal secundario -->
  <div id="contenedor-modal">
    <div class="modal fade" id="modalDatos" tabindex="-1" role="dialog" aria-labelledby="modalDatosCandidato" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header" id="modal-header-datos">
            <h5 class="modal-title" id="modal-title-datos">Registrar Candidato</h5>
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
                    <input type="hidden" name="idCandidato" id="idCandidato">
                    <label for="dui" id="label-dui" class="bmd-label-floating">DUI</label>
                    <input type="text" class="form-control dui  requerido" name="dui" id="duiModificar" autofocus="autofocus">
                    <span id="ayudaDui" class="bmd-help">El guión será agregado automáticamente</span>
                    <div id="mensajeDui" class="invalid-feedback">Ya se registró este N° de DUI</div>
                  </div>
                </div>
              </div>
        <div class="form-row">
          <div class="form-column col-md-6">
            <div class="form-group bmd-form-group is-filled">
              <label for="departamento" class="bmd-label-floating">Partido Político</label>
              <select type="text" class="form-control partido" name="partido" id="partido">
                
              </select>
            </div>
          </div>
          <div class="form-column col-md-6">
            <div class="form-group bmd-form-group is-filled">
              <label for="municipio" class="bmd-label-floating">Tipo de Candidato</label>
              <select type="text" class="form-control tipo" name="TipoCandidato" id="TipoCandidato">
                
              </select>
            </div>
          </div>
        </div>

          <br>
        <div class="form-row">
          <div class="form-column col-md-12">
            <div class="form-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFileLang" lang="es" name="candidato">
                <label class="custom-file-label" for="customFileLang">Seleccionar Foto</label>
              </div>
            </div>
          </div>
        </div>

<br>
        <div class="form-row">
                <div class="form-column col-md-12">
                  <div class="form-group bmd-form-group">

                   <div id="viewFoto"><p>Imagen Actual del Candidato</p></div> 
                  </div>
                </div>
              </div>
              <br>
          </form>
          </div>
          <div class="modal-footer" id="modal-footer-modificar">
            <button type="button" id="btnCancelarModificar" class="btn btn-secondary material-ripple" data-dismiss="modal">Cancelar</button>
            <button type="button" id="btnFrmModificar" class="btn btn-info material-ripple">Guardar Cambios</button>
          </div>
        </div>
      </div>
    </div>



<!-- CONFIRMACION DE ACTUALIZADO-->

 <div id="contenedor-modal">
    <div class="modal fade" id="modalConfirmacionAgregado" tabindex="-1" role="dialog" aria-labelledby="modalConfirmacionAgregado" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header" id="modal-header-agregar">
            <h5 class="modal-title" id="modal-title-agregar">Confirmacion</h5>
          </div>    
          <div id="agregado" class="modal-body">
            
          </div>
          <div class="modal-footer" id="modal-footer-eliminar">
           
            <button type="button" id="btnModificar" data-dismiss="modal" class="btn btn-danger material-ripple ">Aceptar</button>
          </div>
        </div>
      </div>
    </div>
  
<!-- modal eliminar -->
  <div id="contenedor-modal">
    <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarCandidato" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header" id="modal-header-eliminar">
            <h5 class="modal-title" id="modal-title-eliminar">Eliminar Candidato</h5>
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

<!--CONFIRMACION DE ELIMINADO-->
 <div id="contenedor-modal">
    <div class="modal fade" id="modalConfirmacionEliminado" tabindex="-1" role="dialog" aria-labelledby="modalConfirmacionEliminado" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header" id="modal-header-eliminar">
            <h5 class="modal-title" id="modal-title-eliminar">Confirmacion</h5>
          </div>    
          <div id="eliminado" class="modal-body">
            
          </div>
          <div class="modal-footer" id="modal-footer-eliminar">
           
            <button type="button" id="btnEliminar" data-dismiss="modal" class="btn btn-danger material-ripple ">Aceptar</button>
          </div>
        </div>
      </div>
    </div>


  <!-- modal Detalles -->
  <div id="contenedor-modal">
    <div class="modal fade" id="modalDetalles" tabindex="-1" role="dialog" aria-labelledby="modalDetallesCandidato" aria-hidden="true">
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
            Candidatos
        </p>
    </div>
    <?php 

      if(($_SESSION["rol"] == "Administrador") || ($_SESSION["rol"] == "Desarrollador"))
      {
        echo '  <div class="barra-principal">
                <button type="button" id="btnRegistrar" class="material-ripple btn-raised btn btn-primary ml-auto p2">
                  
             Registrar Candidato
            </button>
            </div>
          <hr>';
      }

    ?>
  <div class="dataTab">
    <table id="tableCandidato" class="table table-hover table-bordered" style="width:100%; margin:auto;">
      <thead class="bg-primary">
              <tr>
                  <th class="text-light" >idCandidato</th>
                  <th class="text-light" >DUI</th>
                  <th class="text-light" >Apellidos</th>
                  <th class="text-light" >Nombres</th>
                  <th class="text-light" >Partido</th>
                  <th class="text-light" >Tipo de Candidato</th>
                  <th class="text-light" >Foto</th>
                  <th class="text-light" >Acciones</th>
              </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
</div>

