<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">
		<title>Ingresa al sistema</title>
		<?php header("Access-Control-Allow-Origin: *"); ?>
		
		<link href="<?php echo base_url(); ?>assets/css/style.default.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/css/estilos.css" rel="stylesheet" />
		<link href="<?php echo base_url(); ?>assets/js/fancy/jquery.fancybox.css" rel="stylesheet" />
		<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery-migrate-1.2.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.3.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validaciones.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/fancy/jquery.fancybox.pack.js"></script>

		<script type="text/javascript">
            $(document).ajaxStop(function() {
                $.fancybox.hideLoading();
            });

			  function ocultar()
			    {
			        $('#mensaje_servidor').slideUp();
			    }

			$(document).ready(function() {

			    $('#usuario').focus();


			    $('#formulario').submit(function()
			    {
			            var valido = true;
			           
			            if (valido)
			            {
			                $.fancybox.showLoading();
			                $.ajax({
			                    cache       : false,
			                    data        : $('#formulario').serialize(),
			                    dataType    : 'json',
			                    type        : 'POST',
			                    url         : '<?php echo site_url().'/login/do_login/'; ?>',
			                    beforeSend  : function() { $('#btnEnviar').attr('disabled', 'disabled'); },
			                    complete    : function() { $('#btnEnviar').removeAttr('disabled'); },
			                    success     : respuesta_formulario,
			                    error       : function() { mostrar_mensaje_formulario('Error interno del servidor.<br />Inténtelo más tarde.',  'alert-danger'); }
			                });
			            }
			      return false;
			    });

			    $('#mensaje_servidor').click(function(e)
			    {
			        $('#formulario').removeClass('formulario');
			     });

			    function respuesta_formulario(data)
			    {
			        if (data.tipo != 'exito')
			        {
			            $('#usuario').focus();
			            mostrar_mensaje_formulario(data.mensaje, 'alert-danger')
			        }
			        else
			        {
			            location.href = '<?php echo site_url().'/troubleticket'; ?>';
			        }
			    }
			    function mostrar_mensaje_formulario(mensaje, tipo)
			    {
			            $('#mensaje_texto').html(mensaje);
			            $('#mensaje_servidor').addClass(tipo);
			            $('#mensaje_servidor').slideDown();
			            $('#formulario').addClass('formulario')
			    }
			});
		</script>
	</head>
	<body>
		<div class="col-md-12 fondo_img_login"></div>
		<div class="container">
			<div class="row">
				<div class="row pt50">
					<div align="center" class=" col-md-4 col-ms-3"></div>
					<div align="center" class="col-md-4 col-ms-3">
						<div class="oculto alert alert-danger" id="mensaje_servidor">
							<div class="close" data-dismiss="alert" aria-hidden="true" onclick="ocultar()">
								&times;
							</div>
							<span id="mensaje_texto" class="alert-link"></span>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-3"></div>
				<div class="col-md-4 col-sm-6">
					<h2>Login</h2>
					<form action="" id="formulario" method="post">
						<div class="form-group">
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input id="usuario" name="usuario" type="text" title="usuario" class="usuario col-xs-12 col-sm-6 col-md-12 form-control borde_input_login" placeholder="Usuario" maxlength="20" autofocus/>
								</div>
								<div id="usuario_mensaje" class="error oculto ocultar mt-10 label_error">
									<span id="usuario_mensaje_texto"></span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
									<input id="password" name="password" type="password" title="password" class="password col-xs-12 col-sm-6 col-md-12 form-control borde_input_login" placeholder="Password "/>
								</div>
								<div id="password_mensaje" class="error oculto ocultar mt-10 label_error">
									<span id="password_mensaje_texto"></span>
								</div>
								<!-- input-group -->
							</div>
						</div>
						<div align="center" class="col-xs-12 col-sm-12 col-md-12 mt10 clearfix">
							<div align="pull-left" class="">
								<button type="submit"  class="btn btn-default btn-bordered width225 btn_login"> 
								<span class="fa fa-sign-in letra_iconos"></span>&nbsp;Ingresar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>