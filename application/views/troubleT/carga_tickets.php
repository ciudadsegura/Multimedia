<div class="col-xs-12 col-sm-12 col-md-12 ">
	<form id="formulario_importar" method="post" enctype="multipart/form-data" action="<?php echo site_url().'/troubleticket/importar_excel';?>">
		<div class="borde_editar mb-10 mb20" id="ml0">
			<h4 class="titulo_editar">Carga Masiva de Tickets</h4>
		</div>		
		
		<div class="panel panel-default panel_formulario borde_cuadro_editar">
			<div class="panel-body panel_interno nopadding">
				<div class="col-xs-12 col-sm-12 col-md-12 borde_bottom"></div>
				<div class="col-xs-12 col-sm-12 col-md-12 pt5 pb5 ml0 pl0">
					<h5>Seleccione el archivo <strong>ConcentradoTTs.xlsx</strong> a adjuntar.</h5>					
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 pt5 pb5 ml0 pl0">							
    				<input type="file" id="carga_tickets" name="carga_tickets" />    				
				</div>
			</div>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-12 alineacion_der" id="padding_left">
			<button type="submit" name="boton" class="btn btn-default btn-bordered boton">
			<span class="letra_iconos"></span>&nbsp;Cargar</button>
		</div><!-- col-md-6 -->
	</form>
</div>