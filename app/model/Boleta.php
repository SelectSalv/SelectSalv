<?php

class Boleta extends ModeloBase
{
    /**
     * summary
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function getBoleta()
	{
		$_query = "select count(idPartido) as numPartidos from partido";

		$resultado = $this->con->conectar()->query($_query);

		$resultado = $resultado->fetch_assoc();

		$numPartidos = $resultado["numPartidos"];


		if($numPartidos > 0)
		{
			for ($i = 1; $i < ($numPartidos + 1) ; $i++) {
			
				$_query = "

					select p.idPartido, p.nomPartido, p.rutaBandera, p.estado as estadoPartido, 

						(select nomPersona 
						from persona per, candidato c, tipoCandidato t, partido p
						where p.idPartido = c.idPartido and c.idPersona = per.idPersona and c.idTipoCandidato = t.idTipoCandidato and t.descTipoCandidato = 'Presidente' and p.idPartido = ".$i.") as nomPresidente,
					    
					    (select apePersona 
						from persona per, candidato c, tipoCandidato t, partido p
						where p.idPartido = c.idPartido and c.idPersona = per.idPersona and c.idTipoCandidato = t.idTipoCandidato and t.descTipoCandidato = 'Presidente' and p.idPartido = ".$i.") as apePresidente,
					    
					    
						(select nomPersona 
						from persona per, candidato c, tipoCandidato t, partido p
						where p.idPartido = c.idPartido and c.idPersona = per.idPersona and c.idTipoCandidato = t.idTipoCandidato and t.descTipoCandidato = 'Vicepresidente' and p.idPartido = ".$i.") as nomVicepresidente,
					    
					    (select apePersona 
						from persona per, candidato c, tipoCandidato t, partido p
						where p.idPartido = c.idPartido and c.idPersona = per.idPersona and c.idTipoCandidato = t.idTipoCandidato and t.descTipoCandidato = 'Vicepresidente' and p.idPartido = ".$i.") as apeVicepresidente
				    
					from partido p
					where idPartido = ".$i;

				$resultado = $this->con->conectar()->query($_query);

				$fila = $resultado->fetch_assoc();


				$nomPresidente = explode(" ", $fila["nomPresidente"]);
				$nomVicepresidente = explode(" ", $fila["nomVicepresidente"]);

				$apePresidente = explode(" ", $fila["apePresidente"]);
				$apeVicepresidente = explode(" ", $fila["apeVicepresidente"]);


				if($fila["estadoPartido"] == 1)
				{
					echo '
						<div class="col-md-4 col-sm-12">
							<div class="cuadro-boleta" id="'.$fila["idPartido"].'" style="background-image: url('.$fila["rutaBandera"].')">
								<div class="humo d-flex flex-column">
									<div class="detalles-partido mt-auto p-2">
										<p class="nombre-partido">
											'.$fila["nomPartido"].'
										</p>
										<div class="candidatos">
											<div class="candidato-left">
												<p class="nombre-candidato">
													'.$nomPresidente[0].' '.$apePresidente[0].'
												</p>
												<p class="titulo-candidato">
													Presidente
												</p>
											</div>
											<div class="candidato-right">
												<p class="nombre-candidato">
													'.$nomVicepresidente[0].' '.$apeVicepresidente[0].'
												</p>
												<p class="titulo-candidato">
													Vicepresidente
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					 ';

				}
			}
		}
		else
		{
			echo "sugfa";
		}

	}

}