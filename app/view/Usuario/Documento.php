<?php 
require_once 'app/view/vendor/autoload.php';


		$html ="<style>";
		$html .="table {
 					 border-collapse: collapse; 
 					}";
 		$html .="
.texto-barra-titulo{
    font-family: 'vape';
    color:rgba(39, 46, 64, 0.955);
    font-size: 28px;
    padding-bottom: 13px;
    border-bottom: 1px solid rgba(39, 46, 64, 0.2);
    /*background: rgba(0,0,0,0.2);*/
}";
	$html .= "
	:root{
	--font-family-sans-serif: 'Roboto', 'Helvetica', 'Arial', sans-serif;
	}
	  html {
  font-family: sans-serif;
  line-height: 1.15;
  -webkit-text-size-adjust: 100%;
  -ms-text-size-adjust: 100%;
  -ms-overflow-style: scrollbar;
  -webkit-tap-highlight-color: transparent; }
.table {
  width: 100%;
  max-width: 100%;
  margin-bottom: 1rem;
  background-color: transparent; }
  .table th,
  .table td {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid rgba(0, 0, 0, 0.06); }
  .table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid rgba(0, 0, 0, 0.06); }
  .table tbody + tbody {
    border-top: 2px solid rgba(0, 0, 0, 0.06); }
  .table .table {
    background-color: #fafafa; }

.table-sm th,
.table-sm td {
  padding: 0.3rem; }

.table-bordered {
  border: 1px solid rgba(0, 0, 0, 0.06); }
  .table-bordered th,
  .table-bordered td {
    border: 1px solid rgba(0, 0, 0, 0.06); }
  .table-bordered thead th,
  .table-bordered thead td {
    border-bottom-width: 2px; }

.table-striped tbody tr:nth-of-type(odd) {
  background-color: rgba(0, 0, 0, 0.05); }

.table-hover tbody tr:hover {
  background-color: rgba(0, 0, 0, 0.075); }

.table-primary,
.table-primary > th,
.table-primary > td {
  background-color: #b8e2de; }

.table-hover .table-primary:hover {
  background-color: #a6dbd6; }
  .table-hover .table-primary:hover > td,
  .table-hover .table-primary:hover > th {
    background-color: #a6dbd6; }

.table-secondary,
.table-secondary > th,
.table-secondary > td {
  background-color: #d6d8db; }

.table-hover .table-secondary:hover {
  background-color: #c8cbcf; }
  .table-hover .table-secondary:hover > td,
  .table-hover .table-secondary:hover > th {
    background-color: #c8cbcf; }

.table-success,
.table-success > th,
.table-success > td {
  background-color: #cde9ce; }

.table-hover .table-success:hover {
  background-color: #bbe1bd; }
  .table-hover .table-success:hover > td,
  .table-hover .table-success:hover > th {
    background-color: #bbe1bd; }

.table-info,
.table-info > th,
.table-info > td {
  background-color: #b8e7fc; }

.table-hover .table-info:hover {
  background-color: #a0dffb; }
  .table-hover .table-info:hover > td,
  .table-hover .table-info:hover > th {
    background-color: #a0dffb; }

.table-warning,
.table-warning > th,
.table-warning > td {
  background-color: #ffd0c1; }

.table-hover .table-warning:hover {
  background-color: #ffbda8; }
  .table-hover .table-warning:hover > td,
  .table-hover .table-warning:hover > th {
    background-color: #ffbda8; }

.table-danger,
.table-danger > th,
.table-danger > td {
  background-color: #fccac7; }

.table-hover .table-danger:hover {
  background-color: #fbb3af; }
  .table-hover .table-danger:hover > td,
  .table-hover .table-danger:hover > th {
    background-color: #fbb3af; }

.table-light,
.table-light > th,
.table-light > td {
  background-color: #fcfcfc; }

.table-hover .table-light:hover {
  background-color: #efefef; }
  .table-hover .table-light:hover > td,
  .table-hover .table-light:hover > th {
    background-color: #efefef; }

.table-dark,
.table-dark > th,
.table-dark > td {
  background-color: #cacaca; }

.table-hover .table-dark:hover {
  background-color: #bdbdbd; }
  .table-hover .table-dark:hover > td,
  .table-hover .table-dark:hover > th {
    background-color: #bdbdbd; }

.table-active,
.table-active > th,
.table-active > td {
  background-color: rgba(0, 0, 0, 0.075); }

.table-hover .table-active:hover {
  background-color: rgba(0, 0, 0, 0.075); }
  .table-hover .table-active:hover > td,
  .table-hover .table-active:hover > th {
    background-color: rgba(0, 0, 0, 0.075); }

.table .thead-dark th {
  color: #fafafa;
  background-color: #212529;
  border-color: #32383e; }

.table .thead-light th {
  color: #495057;
  background-color: #e9ecef;
  border-color: rgba(0, 0, 0, 0.06); }

.table-dark {
  color: #fafafa;
  background-color: #212529; }
  .table-dark th,
  .table-dark td,
  .table-dark thead th {
    border-color: #32383e; }
  .table-dark.table-bordered {
    border: 0; }
  .table-dark.table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(255, 255, 255, 0.05); }
  .table-dark.table-hover tbody tr:hover {
    background-color: rgba(255, 255, 255, 0.075); }

@media (max-width: 575.98px) {
  .table-responsive-sm {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    -ms-overflow-style: -ms-autohiding-scrollbar; }
    .table-responsive-sm > .table-bordered {
      border: 0; } }

@media (max-width: 767.98px) {
  .table-responsive-md {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    -ms-overflow-style: -ms-autohiding-scrollbar; }
    .table-responsive-md > .table-bordered {
      border: 0; } }

@media (max-width: 991.98px) {
  .table-responsive-lg {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    -ms-overflow-style: -ms-autohiding-scrollbar; }
    .table-responsive-lg > .table-bordered {
      border: 0; } }

@media (max-width: 1199.98px) {
  .table-responsive-xl {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    -ms-overflow-style: -ms-autohiding-scrollbar; }
    .table-responsive-xl > .table-bordered {
      border: 0; } }

.table-responsive {
  display: block;
  width: 100%;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
  -ms-overflow-style: -ms-autohiding-scrollbar; }
  .table-responsive > .table-bordered {
    border: 0; }";
		$html .="</style>";

		$html .="<h5 class='texto-barra-titulo'>Reporte Partidos</h5>";
		$html.="<table class='table' width='100%' border='1'>";
		$html.="<tr>
					<th>Partido</th>
					<th>Numero de Votos</th>
			   </tr>";
		foreach ($datos as  $value) {
			
				$html.="<tr>
							<td>".$value['nomPartido']."</td>
							<td>".$value['votos']."</td>
						</tr>";	
		}

		$html.= "</table>";
		$mpdf = new \Mpdf\Mpdf();
        $html= utf8_encode($html);
        $mpdf->WriteHTML($html);
        $mpdf->Output();

