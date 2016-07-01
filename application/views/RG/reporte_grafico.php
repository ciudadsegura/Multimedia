<script type="text/javascript">
var usuario_valido = true;
    $(document).ready(function(){
        
		var options = {
            dataType    : 'json',
            beforeSubmit: function(){

                                    var valido = true;

                                   valido = validar_texto('#nombre', '#nombre_mensaje', 2, 150) && valido;
									valido = validar_texto('#contrasena', '#contrasena_mensaje', 5, 35) && valido;
									valido = validar_texto('#usuario','#usuario_mensaje', 2, 20) && validar_nombre_usuario('#usuario', '#usuario_mensaje')  && valido;
									valido = validar_seleccion('#perfil','#perfil_mensaje') && valido;

                                    return (valido && usuario_valido);
            },
            beforeSend  : function()     { $('.btn_guardar').attr('disabled','disabled');},
            complete    : function()     { $('.btn_guardar').removeAttr('disabled');},
            success     : function(data){
											if (data.tipo != 'exito')
											{
												mostrar_mensaje(data.mensaje, 'alert-danger');
											}
											else
											{
												location.href='<?php echo site_url()."/usuarios/";?>';
											}
                                        },
            error       : function()     { 
											$('.boton').removeAttr('disabled');
											mostrar_mensaje('<strong>Error interno del servidor.</strong> Inténtelo más tarde.', 'alert-danger'); 
										}
        };

        $('#formulario').ajaxForm(options);
		
		

        $('#usuario').focusout(function(){
            $.ajax({
                cache       : false,
                data        : 'usuario='+ $('#usuario').val(),
                dataType    : 'json',
                type        : 'POST',
                url         : '<?php echo site_url()."/usuarios/validar_usuarios_nuevos"; ?>',
                beforeSend  : function() { $('.boton').attr('disabled', 'disabled'); },
                complete    : function() { $('.boton').removeAttr('disabled'); },
                success     : function(data)
                              { 
                                if(data.respuesta == 1)
                                {
                                    usuario_valido = false;
									
									error_personalizado('','#usuario_mensaje',data.mensaje,false);
                                }
                                else
                                {
                                    usuario_valido = true;
                                }
                              },
                error       : function() 
								{ 
									mostrar_mensaje('<strong>Error interno del servidor.</strong> Inténtelo más tarde.', 'alert-danger'); 
								}
            });
        });
	 $("#acepta").click(modif);

	 function modif()
		{
	    	var valores = $( "#files" ).val();
	 		 $( "#nombrear" ).html( "<b>Archivos:</b> " + valores );
		}
    });

	$(function() {
     $("input:file").change(function (){
       var fileName = $(this).val();
       $("#nombrear").html("Archivo cargado:" +fileName);
     });
  });
</script>

<style type="text/css">
  div.upload {
    width: 224px;
    height: 224px;
    background-image: url(cdn/icon/images.png);
    overflow: hidden;
}

div.upload input {
    display: block !important;
   /* width: 157px !important;
    height: 57px !important;*/
    width: 100%;
    height: 100%;
    opacity: 0 !important;
    overflow: hidden !important; 
}
#cascara{
    position:relative;
    width:50.5%;
    height: 50%;
    margin-left: 25%;
}
</style>

<?php
	
	if(isset($_GET['troublet'])){
	$troublet=$_GET['troublet'];
	}
	else{
		$troublet=0;
	}

	$count = 0;
    $exito = 0;
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){    

      foreach($_FILES['files']['name'] as $file)
      {
	     $name = $_FILES['files']['name'][$file];  
		    if (strlen($_FILES['files']['name'][$file]) > 1) {
            $file_ext=strtolower(end(explode('.',$name)));
            $exten = array("JPEG","jpeg","JPE","jpe","jpg","JPG","png","PNG");
          $nombref=$_FILES['files']['name'][$file];
          if(in_array($file_ext,$exten)=== true)
          {
            if (move_uploaded_file($_FILES['files']['tmp_name'][$file], 'evidencias/'.$troublet."/".$name)) 
            {
              $count++;
              $exito = 1;
            }
          }
          elseif (move_uploaded_file($_FILES['files']['tmp_name'][$file], $name)) {
            $count++;
            $exito = 1;
          }
		    }
    }
    if ($exito == 1) {
    }
?>

<div class="oculto ocultar alert" id="mensaje_servidor">
 <button class="close" type="button">×</button>
    <span id="mensaje_texto"></span>
</div>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="borde_editar mb-10" id="ml0">
			<h4 class="titulo_editar">Reporte Gráfico</h4>
		</div>
		<div class="pt5 pb5 ml0 pl0">
			<h5><strong>Ingrese los siguientes datos:</strong></h5>
		</div>
		
		<form class="form-horizontal" id="formulario" method="post"  action="<?php echo site_url()."/usuarios/agregar"; ?>" enctype="multipart/form-data">
			<div class="panel panel-default panel_formulario borde_cuadro_editar">
				<div class="panel-body panel_interno nopadding">
					<div class="col-md-9">
						<div>
							<label for="stv" class="col-sm-2 control-label">ID STV*:</label>
							<div class="col-sm-8">
								<input type="text" name="stv" id="stv" class="form-control" autofocus="autofocus" value=""  placeholder="ID STV" maxlength="8">
							</div>
						</div>

						<div class="col-md-12">
							<div class="col-md-2"></div>
							<div class="col-md-10 oculto label_error" id="nombre_mensaje"></div>
						</div><!--  col-md-12 -->

						<div>
							<label for="descdam" class="col-sm-2 control-label">DESCRIPCIÓN GENERAL DEL DAÑO*:</label>
							<div class="col-sm-8">
								<input type="text" name="descdam" id="descdam" class="form-control" autofocus="autofocus" value=""  placeholder="DESCRIPCIÓN GENERAL DEL DAÑO" maxlength="150">
							</div>
						</div>

						<div>
							<label for="cab_obr_civ" class="col-sm-2 control-label">CABLEADO Y OBRA CIVIL*:</label>
							<div class="col-sm-8">
								<input type="text" name="cab_obr_civ" id="cab_obr_civ" class="form-control" autofocus="autofocus" value=""  placeholder="CABLEADO Y OBRA CIVIL" maxlength="150">
							</div>
						</div>

						<div>
							<label for="poste_brazo" class="col-sm-2 control-label">POSTE Y BRAZO*:</label>
							<div class="col-sm-8">
								<input type="text" name="poste_brazo" id="poste_brazo" class="form-control" autofocus="autofocus" value=""  placeholder="POSTE Y BRAZO" maxlength="150">
							</div>
						</div>

						<div>
							<label for="gepe" class="col-sm-2 control-label">GEPE*:</label>
							<div class="col-sm-8">
								<input type="text" name="gepe" id="gepe" class="form-control" autofocus="autofocus" value=""  placeholder="GEPE" maxlength="150">
							</div>
						</div>

						<div>
							<label for="inter_alta_cam" class="col-sm-2 control-label">INTERFON, ALTAVOCES Y CAMARA*:</label>
							<div class="col-sm-8">
								<input type="text" name="inter_alta_cam" id="inter_alta_cam" class="form-control" autofocus="autofocus" value=""  placeholder="INTERFON, ALTAVOCES Y CAMARA" maxlength="150">
							</div>
						</div>
						<div>
							<label for="perfil" class="col-sm-2 control-label">Perfil*:</label>
							<div class="col-sm-8">
								
							</div>
						</div><!--form-group-->
  
    <div id="cascara">
      <form class="pure-form" method="post" enctype="multipart/form-data">
        <center>
          <fieldset>
            <legend>Carga de Evidencias</legend>
            <div class="upload">            
               <input type="file" name="files" id="files"  >
            </div>
          <div>
            <button id="acepta" type="submit" class="pure-button pure-button-primary">Aceptar</button>
              <div id="nombrear"></div>
          </div> 
          </fieldset>   
          </center>    
      </form>   
  </div>
 						
						<div class="col-md-12">
							<div class="col-md-2"></div>
							<div class="col-md-10 oculto label_error" id="perfil_mensaje"></div>
						</div><!-- form-group col-md-12 -->

						<div>
							<label for="usuario" class="col-sm-2 control-label">Usuario*:</label>
							<div class="col-sm-8">
								<input type="text" name="usuario" id="usuario" class="form-control" value="" placeholder="Usuario" maxlength="20">
							</div>
						</div><!--form-group-->

						<div class="col-md-12">
							<div class="col-md-2"></div>
							<div class="col-md-10 oculto label_error" id="usuario_mensaje"></div>
						</div><!-- form-group col-md-12 -->

						<div>
							<label for="contrasena" class="col-sm-2 control-label">Contraseña:</label>
							<div class="col-sm-8">
								<input type="password" name="contrasena" id="contrasena" class="form-control" value="" placeholder="Contraseña" maxlength="35">
							</div>
						</div><!--form-group-->

						<div class="col-md-12">
							<div class="col-md-2"></div>
							<div class="col-md-10 oculto label_error" id="contrasena_mensaje"></div>
						</div><!-- form-group col-md-12 -->

						<div>
							<label for="telefono" class="col-sm-2 control-label">Telefono*:</label>
							<div class="col-sm-4">
								<input type="text" name="telefono" id="telefono" class="form-control" value="" placeholder="55-1235-5456" maxlength="20">
							</div>
						</div><!--form-group-->

						<div class="col-md-12">
							<div class="col-md-2"></div>
							<div class="col-md-10 oculto label_error" id="contrasena_mensaje"></div>
						</div><!-- form-group col-md-12 -->


						<div>
							<label for="foto" class="col-sm-2 control-label">Foto:</label>
							<div class="col-sm-5">
								<input type="file" name="archivo" id="foto">
							</div>
						</div><!--form-group-->
						
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6" id="padding_left">
				<button type="submit" class="btn btn-default btn-bordered btn_guardar">
				<span class="fa fa-floppy-o letra_iconos mr5"></span>&nbsp;Guardar</button>
			</div><!-- col-md-6 -->
		</form>
	</div><!-- col-xs-12 col-sm-12 col-md-12 -->
</div><!--row-->