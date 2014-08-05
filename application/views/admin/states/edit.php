	<div class="row">
                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                        <h1 class="page-title txt-color-blueDark">
                                <i class="fa fa-edit fa-fw "></i> 
                                       Tamiz 
                                <span> > 
                                      <?php echo isset($record->id)?"Editar Registro":"Nuevo Registro"; ?>
                                </span>
                        </h1>
                </div>

        </div>

			
				
				<!-- widget grid -->
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

    <form class="smart-form" method="post" action="<?php echo $record->formAction(); ?>">
     <fieldset>                                                
    <div class="row">
                <section class="col col-3">
                        Nombre del Estado
                        <label class="input">
                            <input name="nombre" type="text" placeholder="Nombre del estado" value="<?php echo $record->nombre ?>" >
                        </label>
                </section>
                
               
     </div>  
     </fieldset>                                               
    
     

                                                
    <footer>
            <button type="submit" class="btn btn-primary">
                    Guardar
            </button>
            <button type="button" class="btn btn-default" onclick="window.history.back();">
                   Regresar
            </button>
    </footer>
                                                
                                                
                                                <input type="hidden" name="estatus" value="pendiente"
                                                       >                                                    
                                                
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
				<!-- end widget grid -->
                                
                                
                             