<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        
        <title>Reportes</title>
        <link href="<?php echo base_url(); ?>assets/css/style.default.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/css/morris.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/css/bootstrap-timepicker.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/css/select2.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/js/fancy/jquery.fancybox.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        
        <link href="<?php echo base_url(); ?>assets/css/estilos.css" rel="stylesheet" />


        
        <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/tooltip.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/validaciones.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/utilerias.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/img/jquery.form.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-migrate-1.2.1.min.js"></script>
        
        <script src="<?php echo base_url(); ?>assets/js/modernizr.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/pace.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/retina.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.cookies.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/flot/jquery.flot.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/flot/jquery.flot.resize.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/flot/jquery.flot.spline.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.sparkline.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/morris.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/raphael-2.1.0.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-wizard.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.autogrow-textarea.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.mousewheel.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.tagsinput.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/toggles.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-timepicker.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.maskedinput.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/colorpicker.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/dropzone.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/tab.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.number.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/fancy/jquery.fancybox.pack.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/combo/modernizr-latest.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.3.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/combo1/prettify.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/combo1/bootstrap-multiselect.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/default.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/img/jquery.form.js"></script>


        <script type="text/javascript">
            $(document).ready(function() {
                // Marcar el menú
                $('.nav-pills > li').each(function() {
                    
                    var menu = $(this).children('a').children('span').html();
                    
                    if(menu == "<?php echo isset($menu) ? $menu : ''; ?>") {
                        $(this).addClass("active");
                    }
                });
                
                // Marcar el submenú
                $('.nav-pills .children li').each(function() {
                    
                    var submenu = $(this).children('a').children('span').html();
                    
                    if(submenu == "<?php echo isset($submenu) ? $submenu : ''; ?>") {
                        $(this).addClass("active");
                    }
                });
            });
        </script>
        
    <header>
        <?php 
            $datos = $this->session->userdata("loggedIn");
        ?>  
        <div class="headerwrapper">
            <div class="header-left ">
                <a href="<?php echo site_url(); ?>" class="logo"><img class="width160"  src="<?php echo base_url().'assets/imagenes/case.jpg'; ?>" alt="logo" /></a> 
                <div class="pull-right">
                    <a href="#" class="menu-collapse">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
            </div><!-- header-left -->
            
            <div class="header-right">
                
                <div class="hidden-xs hidden-sm">
                
                    <div role="complementary" class="bs-docs-sidebar hidden-print hidden-xs affix">
                        <div class="pageheader">
                            <div class="media width450">
                                <div class="media-body">
                                    <h5 class="nombre_escuela pt0">CASE MANTENIMIENTO</h5>
                                    <ul class="breadcrumb"><?php if(isset($navegacion)) echo $navegacion; ?></ul>
                                </div>
                            </div><!-- media -->
                        </div><!-- pageheader -->
                    </div><!-- complementary -->
                    
                </div>
                
                <div class="pull-right">
                    <div class="btn-group btn-group-option">
                        <div class="mr10 pt0">
                            <div class="titulo_bienvenida">Bienvenido!</div>
                            <h4 class="sin_margen nombre_usuario"><?php echo $datos['nombre']; ?></h4>
                        </div>
                    </div>
                    
                    <div class="btn-group btn-group-option">
                        <button type="button" class="btn btn-default dropdown-toggle btn_menu" data-toggle="dropdown">
                          <i class="fa fa-caret-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                              <li><a href="<?php echo site_url().'/login/logout' ?>"><i class="glyphicon glyphicon-log-out"></i>Cerrar Sesión</a></li>
                        </ul>
                    </div><!-- btn-group -->
                    
                </div><!-- pull-right -->
                
            </div><!-- header-right -->

        </div><!-- headerwrapper -->
</header>
<section id="main-section">
    <div class="mainwrapper">
        <div class="leftpanel">
                <ul class="nav nav-pills nav-stacked ">
                    <?php $this->load->view('_menu'); ?>
                </ul>
        </div>
        <!-- leftpanel -->
        <div class="mainpanel">
            <div class="contentpanel">
                <div class="row row-stat">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                    <?php $this->load->view($pagina); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cb">
    </div>
</section>
<footer>
      <div id="footer">
        <div class="col-xs-12 col-sm-offset-4 col-sm-4 footer-text">
            
        </div>
        <div class="clearfix"></div>
      </div>
</footer>
</body>
</html>
