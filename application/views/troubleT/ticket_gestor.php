<script type="text/javascript">
    var id_alumno;
    var status_alumno;
    var nombre_alumno;
    
    $(document).ready(function(e)
    {
        $('#formulario').submit(function(e){
            $.ajax({
                cache       : false,
                data        : $('#formulario').serialize(),
                dataType    : 'json',
                type        : 'POST',
                url         : '<?php echo site_url()."/troubleticket/buscar/";?>',
                beforeSend  : function()     { $('.boton').attr('disabled','disabled');},
                complete    : function()     { $('.boton').removeAttr('disabled');},
                success     : function(datos){ 
                                            $("#total_busqueda" ).html(datos.total_ticket);
                                            $('#resultado').html(datos.html);
                                        },
                error       : function()     { 
                                                $('.boton').removeAttr('disabled');
                                                mostrar_mensaje('<strong>Error interno del servidor.</strong> Inténtelo más tarde.', 'alert-danger');
                                            }
            });
            return false;
        });     

        $('#inicio').datepicker({
            altField: "#alter_inicio",
            altFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd/mm/yy',
            showAnim: 'drop',
            yearRange: '1980:2015',
            maxDate: '0',
            onSelect: function(selectedDate) {
                $("#fin").datepicker("option", "minDate", selectedDate);
            }
        });
        
        $('#fin').datepicker({
            altField: "#alter_fin",
            altFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd/mm/yy',
            showAnim: 'drop',
            maxDate : '0',
        });

        $('#boton_limpiar').click(function(e){
            $('#inicio').val('');
            $('#fin').val('');
            $('#alter_fin').val('');
            $('#alter_inicio').val('');
            $('#formulario').reset();
            $('#formulario').trigger('submit');
        });

        $('.fancy').fancybox();

        $('#cancelar_fancy').click(function(){
            $.fancybox.close();
            id_alumno = 0;
        });

        <?php if($this->session->flashdata('msg')){ ?>
                mostrar_mensaje('<?php echo $this->session->flashdata('msg'); ?>', 'alert-success');
        <?php } ?>      
    });

</script>

<div class="oculto ocultar alert" id="mensaje_servidor">
    <button class="close" type="button">×</button>
    <span id="mensaje_texto"></span>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="panel panel-default">               
            <div class="borde_editar mb-10" id="ml0"><h4 class="titulo_editar">TICKETS</h4></div>           
            <div class="panel panel-body pb0">          
                <form id="formulario" class="form-horizontal">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-3 mb5">
                            <label class="col-xs-3 col-sm-3 col-md-3 control-label label_busqueda alineacion_izq" for="nombre">Buscar:</label>
                            <div class="col-xs-9 col-sm-9 col-md-9 input_busqueda">
                                <input type="text" class="form-control" placeholder="Ticket" name="nombre" id="nombre" autofocus>
                            </div>
                        </div><!-- col-xs-12 -->
                        <div class="col-xs-12 col-sm-6 col-md-3 mb5">
                            <label class="col-xs-3 col-sm-3 col-md-3 control-label label_busqueda alineacion_izq" for="nombre">Status:</label>
                            <div class="col-xs-9 col-sm-9 col-md-9 input_busqueda">
                                <select class="form-control" name="status" id="status">
                                    <option value="todos">TODOS</option>
                                    <option value="Cerrado">Cerrados</option>
                                    <option value="Asignados">Asignados</option>
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="En Curso">En Curso</option>
                                    <option value="No Conforme">No Conforme</option>
                                    <option value="Resuelto">Resuelto</option>
                                </select>
                            </div>
                        </div><!-- col-xs-12                        
                    </div>
                    <div class="row">  -->                      
                         <div class="col-xs-12 col-sm-6 col-md-3 mb5">
                            <label class="col-xs-3 col-sm-3 col-md-3 control-label label_busqueda alineacion_izq" for="nombre">Mostrar:</label>
                            <div class="col-xs-9 col-sm-9 col-md-9 input_busqueda">
                                <select class="form-control" name="mostrar" id="mostrar">
                                    <option value="0">TODOS</option>
                                    <option value="50" selected="selected">50</option>
                                    <option value="100">100</option>
                                    <option value="500">500</option>
                                    <option value="1000">1000</option>                            
                                </select>
                            </div>
                        </div><!-- col-xs-12 -->
                        <!--<div class="col-xs-12 col-sm-6 col-md-3 mb5">
                            <label class="col-xs-3 col-sm-3 col-md-3 control-label label_busqueda alineacion_izq" for="inicio">Registrado:</label>
                            <div class="col-xs-4 col-sm-4 col-md-4 input_busqueda">
                                <input type="text" maxlength="10" class="form-control" placeholder="Fecha Inicial" id="inicio">
                                <input type="hidden" id="alter_inicio" name="inicio"/>  
                            </div>
                            <label class="col-xs-1 col-sm-1 col-md-1 control-label label_busqueda" for="fin">y</label>
                            <div class="col-xs-4 col-sm-4 col-md-4 input_busqueda">
                                <input type="text" maxlength="10" class="form-control" placeholder="Fecha Final" id="fin">
                                <input type="hidden" id="alter_fin" name="fin"/>    
                            </div>
                        </div><!-- col-xs-12 -->                                              
                    <!--</div> -->
                                       
                        <div class="col-xs-12 col-sm-6 col-md-3 mb5">
                            <label class="col-xs-3 col-sm-3 col-md-3 control-label label_busqueda alineacion_izq" for="ordenamiento">Ordenar:</label>
                            <div class="col-xs-9 col-sm-9 col-md-9 input_busqueda">
                                <select class="form-control" name="ordenamiento" id="ordenamiento">
                                    <option value="1">FECHA CIERRE DESC</option>
                                    <option value="0">FECHA CIERRE ASC</option>                                                                                 
                                </select>
                            </div>
                        </div><!-- col-xs-12 -->
                    </div>
                    <div class="row">        
                        <div class="col-xs-12 col-sm-6 col-md-9 mb5"></div> 
                        <div class="col-xs-12 col-sm-6 col-md-3 mb5">
                            <div class="col-xs-6 col-sm-6 col-md-6 input_busqueda">
                                <button id="btn_buscar" class="btn btn-default btn_busqueda btn-bordered boton" type="submit" name="boton" ><i class="fa fa-search letra_iconos pr5"></i>Buscar</button>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 input_busqueda alineacion_der">
                                <button id="boton_limpiar" class="btn btn-default btn_busqueda btn-bordered boton" type="button" name="boton" ><i class="fa fa-eraser letra_iconos pr5"></i>Limpiar</button>
                            </div>
                        </div><!-- col-xs-12 --> 
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-12 pr10 pb10">
        <div class="col-xs-12 col-sm-6 col-md-2 pt10 pl0">          
            <?php
                $renglon = '<a class="btn width160 btn-default btn_busqueda btn-bordered boton" type="button" href="'.site_url().'/alumno/agregar/"><i class="fa fa-plus pr10"></i>Agregar</a>';                
    
              //  echo $renglon;
            ?> 
        </div>
        <div class="col-xs-12 col-sm-6 col-md-2 pt10 pl0">                        
            <div class="col-xs-6 col-sm-6 col-md-12 input_busqueda alineacion_izq">                                         
                 <?php

                     $renglon = '<a class="btn width160 btn-default btn_busqueda btn-bordered boton" type="button" href="'.site_url().'/alumno/carga_masiva/"><i class="fa fa-upload pr10"></i>Carga Masiva</a>';
    
                  //  echo $renglon;
                ?>       
            </div>
        </div><!-- col-xs-12 --> 
        <div class="col-xs-12 col-sm-6 col-md-2 pt10 pl0"> </div><!-- col-xs-12 --> 
        <div class="col-md-6 alineacion_der registros"><span id="total_busqueda"><?php echo $total_ticket ?></span> registro(s) encontrado(s)</div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 table-responsive">
        <table class="table table-condensed">
            <thead>
                <tr class="active">
                    <th></th>
                    <th>TICKET</th>
                    <th>FULL_CATEGORY_NAME</th>
                    <th>ID_CI</th>
                    <th>DESCRIPCION_COMMENTS</th>
                    <th>CLOSING_TIME</th>                   
                    <th>CREATION_TIME</th>                   
                    <th>INCIDENT_STATUS</th>                   
                    <th>INCIDENT_TYPE</th>                   
                    <th>CDM</th>                   
                    <th>RGM</th>                   
                </tr>
            </thead>
            <tbody id="resultado">
                <?php  $this->load->view('troubleT/_tabla_ticket')?>
            </tbody>
        </table>
    </div>
</div>