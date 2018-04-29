	
	<link rel="stylesheet" href="res/plugins/dataTable/dataTables.material.min.css">
	<script src="res/plugins/dataTable/jquery.dataTables.min.js"></script>
	<script src="res/plugins/dataTable/dataTables.material.min.js"></script>
	<script src="res/js/dataTables.js"></script> 

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
		        <button type="button" id="btnCancelar" class="btn btn-secondary waves-effect waves-" data-dismiss="modal">Cancelar</button>
		        <button type="button" id="btnPersona" class="btnPersona btn btn-success waves-effect waves-green">Registrar</button>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
	<!-- <div class="cuadro" id="c-persona">
		<div class="cuadro-ins bg-primary">
			<p class="lead text-center">
				Registrar Persona
			</p>
		</div>
		<div class="wrap">
			
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary waves-effect waves-ripple" data-dismiss="modal">Cancelar</button>
	       <button type="button" data-toggle="modal" data-target="#modalRegPersona" id="btnPersonaFrm" name="btnPersonaFrm" class="waves-effect waves-ripple waves-green btn btn-success">Registrar</button>
	      </div>
	    </div>
	  </div>
	</div>
 -->
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
	<table id="tablePadron" class="mdl-data-table" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011/07/25</td>
                <td>$170,750</td>
            </tr>
            <tr>
                <td>Ashton Cox</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>66</td>
                <td>2009/01/12</td>
                <td>$86,000</td>
            </tr>
            <tr>
                <td>Cedric Kelly</td>
                <td>Senior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>2012/03/29</td>
                <td>$433,060</td>
            </tr>
            <tr>
                <td>Airi Satou</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>33</td>
                <td>2008/11/28</td>
                <td>$162,700</td>
            </tr>
            <tr>
                <td>Brielle Williamson</td>
                <td>Integration Specialist</td>
                <td>New York</td>
                <td>61</td>
                <td>2012/12/02</td>
                <td>$372,000</td>
            </tr>
            <tr>
                <td>Herrod Chandler</td>
                <td>Sales Assistant</td>
                <td>San Francisco</td>
                <td>59</td>
                <td>2012/08/06</td>
                <td>$137,500</td>
            </tr>
            <tr>
                <td>Rhona Davidson</td>
                <td>Integration Specialist</td>
                <td>Tokyo</td>
                <td>55</td>
                <td>2010/10/14</td>
                <td>$327,900</td>
            </tr>
            <tr>
                <td>Colleen Hurst</td>
                <td>Javascript Developer</td>
                <td>San Francisco</td>
                <td>39</td>
                <td>2009/09/15</td>
                <td>$205,500</td>
            </tr>
            <tr>
                <td>Sonya Frost</td>
                <td>Software Engineer</td>
                <td>Edinburgh</td>
                <td>23</td>
                <td>2008/12/13</td>
                <td>$103,600</td>
            </tr>
            <tr>
                <td>Jena Gaines</td>
                <td>Office Manager</td>
                <td>London</td>
                <td>30</td>
                <td>2008/12/19</td>
                <td>$90,560</td>
            </tr>
            <tr>
                <td>Quinn Flynn</td>
                <td>Support Lead</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>2013/03/03</td>
                <td>$342,000</td>
            </tr>
            <tr>
                <td>Charde Marshall</td>
                <td>Regional Director</td>
                <td>San Francisco</td>
                <td>36</td>
                <td>2008/10/16</td>
                <td>$470,600</td>
            </tr>
            <tr>
                <td>Haley Kennedy</td>
                <td>Senior Marketing Designer</td>
                <td>London</td>
                <td>43</td>
                <td>2012/12/18</td>
                <td>$313,500</td>
            </tr>
            <tr>
                <td>Tatyana Fitzpatrick</td>
                <td>Regional Director</td>
                <td>London</td>
                <td>19</td>
                <td>2010/03/17</td>
                <td>$385,750</td>
            </tr>
            <tr>
                <td>Michael Silva</td>
                <td>Marketing Designer</td>
                <td>London</td>
                <td>66</td>
                <td>2012/11/27</td>
                <td>$198,500</td>
            </tr>
            <tr>
                <td>Paul Byrd</td>
                <td>Chief Financial Officer (CFO)</td>
                <td>New York</td>
                <td>64</td>
                <td>2010/06/09</td>
                <td>$725,000</td>
            </tr>
            <tr>
                <td>Gloria Little</td>
                <td>Systems Administrator</td>
                <td>New York</td>
                <td>59</td>
                <td>2009/04/10</td>
                <td>$237,500</td>
            </tr>
            <tr>
                <td>Bradley Greer</td>
                <td>Software Engineer</td>
                <td>London</td>
                <td>41</td>
                <td>2012/10/13</td>
                <td>$132,000</td>
            </tr>
            <tr>
                <td>Dai Rios</td>
                <td>Personnel Lead</td>
                <td>Edinburgh</td>
                <td>35</td>
                <td>2012/09/26</td>
                <td>$217,500</td>
            </tr>
            <tr>
                <td>Jenette Caldwell</td>
                <td>Development Lead</td>
                <td>New York</td>
                <td>30</td>
                <td>2011/09/03</td>
                <td>$345,000</td>
            </tr>
            <tr>
                <td>Yuri Berry</td>
                <td>Chief Marketing Officer (CMO)</td>
                <td>New York</td>
                <td>40</td>
                <td>2009/06/25</td>
                <td>$675,000</td>
            </tr>
            <tr>
                <td>Caesar Vance</td>
                <td>Pre-Sales Support</td>
                <td>New York</td>
                <td>21</td>
                <td>2011/12/12</td>
                <td>$106,450</td>
            </tr>
            <tr>
                <td>Doris Wilder</td>
                <td>Sales Assistant</td>
                <td>Sidney</td>
                <td>23</td>
                <td>2010/09/20</td>
                <td>$85,600</td>
            </tr>
            <tr>
                <td>Angelica Ramos</td>
                <td>Chief Executive Officer (CEO)</td>
                <td>London</td>
                <td>47</td>
                <td>2009/10/09</td>
                <td>$1,200,000</td>
            </tr>
            <tr>
                <td>Gavin Joyce</td>
                <td>Developer</td>
                <td>Edinburgh</td>
                <td>42</td>
                <td>2010/12/22</td>
                <td>$92,575</td>
            </tr>
            <tr>
                <td>Jennifer Chang</td>
                <td>Regional Director</td>
                <td>Singapore</td>
                <td>28</td>
                <td>2010/11/14</td>
                <td>$357,650</td>
            </tr>
            <tr>
                <td>Brenden Wagner</td>
                <td>Software Engineer</td>
                <td>San Francisco</td>
                <td>28</td>
                <td>2011/06/07</td>
                <td>$206,850</td>
            </tr>
            <tr>
                <td>Fiona Green</td>
                <td>Chief Operating Officer (COO)</td>
                <td>San Francisco</td>
                <td>48</td>
                <td>2010/03/11</td>
                <td>$850,000</td>
            </tr>
            <tr>
                <td>Shou Itou</td>
                <td>Regional Marketing</td>
                <td>Tokyo</td>
                <td>20</td>
                <td>2011/08/14</td>
                <td>$163,000</td>
            </tr>
            <tr>
                <td>Michelle House</td>
                <td>Integration Specialist</td>
                <td>Sidney</td>
                <td>37</td>
                <td>2011/06/02</td>
                <td>$95,400</td>
            </tr>
            <tr>
                <td>Suki Burks</td>
                <td>Developer</td>
                <td>London</td>
                <td>53</td>
                <td>2009/10/22</td>
                <td>$114,500</td>
            </tr>
            <tr>
                <td>Prescott Bartlett</td>
                <td>Technical Author</td>
                <td>London</td>
                <td>27</td>
                <td>2011/05/07</td>
                <td>$145,000</td>
            </tr>
            <tr>
                <td>Gavin Cortez</td>
                <td>Team Leader</td>
                <td>San Francisco</td>
                <td>22</td>
                <td>2008/10/26</td>
                <td>$235,500</td>
            </tr>
            <tr>
                <td>Martena Mccray</td>
                <td>Post-Sales support</td>
                <td>Edinburgh</td>
                <td>46</td>
                <td>2011/03/09</td>
                <td>$324,050</td>
            </tr>
            <tr>
                <td>Unity Butler</td>
                <td>Marketing Designer</td>
                <td>San Francisco</td>
                <td>47</td>
                <td>2009/12/09</td>
                <td>$85,675</td>
            </tr>
            <tr>
                <td>Howard Hatfield</td>
                <td>Office Manager</td>
                <td>San Francisco</td>
                <td>51</td>
                <td>2008/12/16</td>
                <td>$164,500</td>
            </tr>
            <tr>
                <td>Hope Fuentes</td>
                <td>Secretary</td>
                <td>San Francisco</td>
                <td>41</td>
                <td>2010/02/12</td>
                <td>$109,850</td>
            </tr>
            <tr>
                <td>Vivian Harrell</td>
                <td>Financial Controller</td>
                <td>San Francisco</td>
                <td>62</td>
                <td>2009/02/14</td>
                <td>$452,500</td>
            </tr>
            <tr>
                <td>Timothy Mooney</td>
                <td>Office Manager</td>
                <td>London</td>
                <td>37</td>
                <td>2008/12/11</td>
                <td>$136,200</td>
            </tr>
            <tr>
                <td>Jackson Bradshaw</td>
                <td>Director</td>
                <td>New York</td>
                <td>65</td>
                <td>2008/09/26</td>
                <td>$645,750</td>
            </tr>
            <tr>
                <td>Olivia Liang</td>
                <td>Support Engineer</td>
                <td>Singapore</td>
                <td>64</td>
                <td>2011/02/03</td>
                <td>$234,500</td>
            </tr>
            <tr>
                <td>Bruno Nash</td>
                <td>Software Engineer</td>
                <td>London</td>
                <td>38</td>
                <td>2011/05/03</td>
                <td>$163,500</td>
            </tr>
            <tr>
                <td>Sakura Yamamoto</td>
                <td>Support Engineer</td>
                <td>Tokyo</td>
                <td>37</td>
                <td>2009/08/19</td>
                <td>$139,575</td>
            </tr>
            <tr>
                <td>Thor Walton</td>
                <td>Developer</td>
                <td>New York</td>
                <td>61</td>
                <td>2013/08/11</td>
                <td>$98,540</td>
            </tr>
            <tr>
                <td>Finn Camacho</td>
                <td>Support Engineer</td>
                <td>San Francisco</td>
                <td>47</td>
                <td>2009/07/07</td>
                <td>$87,500</td>
            </tr>
            <tr>
                <td>Serge Baldwin</td>
                <td>Data Coordinator</td>
                <td>Singapore</td>
                <td>64</td>
                <td>2012/04/09</td>
                <td>$138,575</td>
            </tr>
            <tr>
                <td>Zenaida Frank</td>
                <td>Software Engineer</td>
                <td>New York</td>
                <td>63</td>
                <td>2010/01/04</td>
                <td>$125,250</td>
            </tr>
            <tr>
                <td>Zorita Serrano</td>
                <td>Software Engineer</td>
                <td>San Francisco</td>
                <td>56</td>
                <td>2012/06/01</td>
                <td>$115,000</td>
            </tr>
            <tr>
                <td>Jennifer Acosta</td>
                <td>Junior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>43</td>
                <td>2013/02/01</td>
                <td>$75,650</td>
            </tr>
            <tr>
                <td>Cara Stevens</td>
                <td>Sales Assistant</td>
                <td>New York</td>
                <td>46</td>
                <td>2011/12/06</td>
                <td>$145,600</td>
            </tr>
            <tr>
                <td>Hermione Butler</td>
                <td>Regional Director</td>
                <td>London</td>
                <td>47</td>
                <td>2011/03/21</td>
                <td>$356,250</td>
            </tr>
            <tr>
                <td>Lael Greer</td>
                <td>Systems Administrator</td>
                <td>London</td>
                <td>21</td>
                <td>2009/02/27</td>
                <td>$103,500</td>
            </tr>
            <tr>
                <td>Jonas Alexander</td>
                <td>Developer</td>
                <td>San Francisco</td>
                <td>30</td>
                <td>2010/07/14</td>
                <td>$86,500</td>
            </tr>
            <tr>
                <td>Shad Decker</td>
                <td>Regional Director</td>
                <td>Edinburgh</td>
                <td>51</td>
                <td>2008/11/13</td>
                <td>$183,000</td>
            </tr>
            <tr>
                <td>Michael Bruce</td>
                <td>Javascript Developer</td>
                <td>Singapore</td>
                <td>29</td>
                <td>2011/06/27</td>
                <td>$183,000</td>
            </tr>
            <tr>
                <td>Donna Snider</td>
                <td>Customer Support</td>
                <td>New York</td>
                <td>27</td>
                <td>2011/01/25</td>
                <td>$112,000</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>
</div>