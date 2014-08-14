<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
		<h1 class="page-title txt-color-blueDark">
			
			<!-- PAGE HEADER -->
			<i class="fa-fw fa fa-pencil-square-o"></i> 
				Laboratorios
			<span>>  
				Formulario
			</span>
		</h1>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-9">
        <ul id="sparks" class="">
                <li class="sparks-info">
                    <input id="smart-mod-eg1" type="button" value="Regresar sin Guardar"  />
                </li>
                <li class="sparks-info">
                    <input type="button" id="save-form" value="Guardar"  />
                    
                </li>
                <li class="sparks-info">
                    <input type="button" id="save-new" value="Guardar y Nuevo"  />
                </li>
                <li class="sparks-info">
                    <input type="button" id="save-form-list" value="Guardar e ir al Listado"  />
                </li>
        </ul>
	</div>
	
</div>



<section id="widget-grid" class="">

        <!-- START ROW -->
        <div class="row">

                <!-- NEW COL START -->
                <article class="col-sm-12 col-md-12 col-lg-12">

                        <!-- Widget ID (each widget will need unique ID)-->
                        <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">
                                <!-- widget options:
                                usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                                data-widget-colorbutton="false"
                                data-widget-editbutton="false"
                                data-widget-togglebutton="false"
                                data-widget-deletebutton="false"
                                data-widget-fullscreenbutton="false"
                                data-widget-custombutton="false"
                                data-widget-collapsed="true"
                                data-widget-sortable="false"

                                -->
                                <header>
                                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                                        <h2></h2>

                                </header>

                                <!-- widget div-->
                                <div>

                                        <!-- widget edit box -->
                                        <div class="jarviswidget-editbox">
                                                <!-- This area used as dropdown edit box -->

                                        </div>
                                        <!-- end widget edit box -->

                                        <!-- widget content -->
                                        <div class="widget-body no-padding">

    <form id="form-tamiz" class="smart-form" method="post" action="<?php echo $record->getFormUpdateAction(); ?>">
    <fieldset>  
         <input name="saveType" id="saveType"  type="hidden"> 
         <input name="id" id="current-id" value="<?php echo $record->id?>"  type="hidden" > 
    <div class="row">
                <section class="col col-3">
                        Nombre del Laboratorio
                        <label class="input" >
                             
                          <input class="form-control ui-autocomplete-input required" 
                                  name="nombre"
                                  id="unidad_clinica"
                                  required="required"
                                  title='Se requiere esta información'
                                  value="<?php echo $record->nombre  ?>"
                                 placeholder="" type="text" 
                                 autocomplete="off" />
                          
                            
                        </label>
                </section>
                
                
                
     </div>  
     <div class="row">
                
                <section class="col col-3">
                        Correo electronico
                        <label class="input">
                            
                           
                      <input class="form-control ui-autocomplete-input" 
                             name="email"
                             id="jurisdiccion"
                               required="required"
                                  title='Se requiere esta información'
                             value="<?php echo $record->email  ?>"
                             placeholder="" type="text"  />
                               
                            
                        </label>
                </section>
                
                
     </div> 
         
     
         
     </fieldset>                                               
     
     
        

   
                                                
                                                
                                                
                                                
   </form>

                                        </div>
                                        <!-- end widget content -->

                                </div>
                                <!-- end widget div -->

                        </div>
                        <!-- end widget -->

                </article>
                <!-- END COL -->

        </div>

        <!-- END ROW -->

        <!-- START ROW -->



        <!-- END ROW -->

        <!-- NEW ROW -->



        <!-- END ROW-->

</section>


<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
		<!-- place hholder -->
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-9">
        <ul id="sparks" class="">
                <li class="sparks-info">
                    <input type="button" value="Regresar sin Guardar"  />
                </li>
                <li class="sparks-info">
                    <input type="button" value="Guardar"  />
                    
                </li>
                <li class="sparks-info">
                    <input type="button" value="Guardar Y Nuevo"  />
                </li>
                <li class="sparks-info">
                    <input type="button" value="Guardar e ir al Listado"  />
                </li>
        </ul>
	</div>
	
</div>

<!-- widget grid -->

<!-- end widget grid -->






<!--XXX --->

	

		<!--================================================== -->

		

		

		

		<!--[if IE 8]>

		<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->

		

		<!-- PAGE RELATED PLUGIN(S) -->
		


                    