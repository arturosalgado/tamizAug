	<div class="row">
                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                        <h1 class="page-title txt-color-blueDark">
                                <i class="fa fa-edit fa-fw "></i> 
                                      Laboratorio Tamiz 
                                <span>> 
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

                                            <form class="smart-form" method="post" action="<?php echo site_url('/lab/tamiz/update').'/'.$record->id; ?>">
      
                                                 
      <fieldset style="">
                                                          
         <div class="row">
                
             
               
             
                <section class="col col-3">
                      
                    
                    ¿La muesra es adecuada?
                    <label class="radio">
                        <input type="radio" name="muestraadecuada" value="No" <?php if($record->muestraadecuada=='No') echo 'checked' ?> >
                            <i></i>Si</label>
                    <label class="radio">
                        <input type="radio" name="muestraadecuada" value="Si" <?php if($record->muestraadecuada=='Si' or empty($record->muestraadecuada)   ) echo 'checked' ?>  >
                    <i></i>No
                    </label>
                    
														
                    
                    
                </section>
              
              
           
             
              
              
             
     </div>  
          
                                                        
     </fieldset>      
                                                
                                                
     <fieldset style="">
           <legend>Reporte de Laboratorio</legend>                                                 
         <div class="row">
                
             
               
             
                <section class="col col-3">
                      
                    
                    THS
                    <label class="radio">
                        <input type="radio" name="ths" value="normal" <?php if($record->ths=='normal') echo 'checked' ?> >
                            <i></i>Normal</label>
                    <label class="radio">
                        <input type="radio" name="ths" value="sospechoso" <?php if($record->ths=='sospechoso') echo 'checked' ?>  >
                    <i></i>Sospechoso
                    </label>
                    <label class="input">
                        <input type="text" name="ths_valor" value="<?php echo $record->ths_valor ?>" placeholder="valor"  >
                            
                    </label>
														
                    
                    
                </section>
              
              <section class="col col-3">
                      
                    
                    17-OH
                    <label class="radio">
                        <input type="radio" name="oh17" value="normal" <?php if($record->oh17=='normal') echo 'checked' ?> >
                            <i></i>Normal</label>
                    <label class="radio">
                        <input type="radio" name="oh17" value="sospechoso" <?php if($record->oh17=='sospechoso') echo 'checked' ?>  >
                    <i></i>Sospechoso
                    </label>
                    <label class="input">
                        <input type="text" name="oh17_valor" value="<?php echo $record->oh17_valor ?>" placeholder="valor"  >
                            
                    </label>
														
                    
                    
                </section>
              <section class="col col-3">
                      
                    
                    Gal
                    <label class="radio">
                        <input type="radio" name="gal" value="normal" <?php if($record->gal=='normal') echo 'checked' ?> >
                            <i></i>Normal</label>
                    <label class="radio">
                        <input type="radio" name="gal" value="sospechoso" <?php if($record->gal=='sospechoso') echo 'checked' ?>  >
                    <i></i>Sospechoso
                    </label>
                    <label class="input">
                        <input type="text" name="gal_valor" value="<?php echo $record->gal_valor ?>" placeholder="valor"  >
                            
                    </label>
														
                    
                    
                </section>
             
              <section class="col col-3">
                      
                    
                    PKU
                    <label class="radio">
                        <input type="radio" name="pku" value="normal" <?php if($record->pku=='normal') echo 'checked' ?> >
                            <i></i>Normal</label>
                    <label class="radio">
                        <input type="radio" name="pku" value="sospechoso" <?php if($record->pku=='sospechoso') echo 'checked' ?>  >
                    <i></i>Sospechoso
                    </label>
                    <label class="input">
                        <input type="text" name="pku_valor" value="<?php echo $record->pku_valor ?>" placeholder="valor"  >
                            
                    </label>
														
                    
                    
                </section>
              
             <input type="hidden" name="estatus" value="completo" />
     </div>  
          
                                                        
     </fieldset>                                                     
     

<fieldset>
    <legend>Datos de la Muestra</legend>
        <div class="row">
                <section class="col col-2">
                        Tecnica de toma
                          <label class="radio">
                              <input type="radio" name="tecnica"  value="Cordon" <?php if ($record->tecnica=='Cordon') echo "checked"?>>
                <i></i>Cordón</label>
        <label class="radio">
            <input type="radio" name="tecnica" value="Talon" <?php if($record->tecnica=='Talon') echo "checked"?>>
                <i></i>Talón</label>
                </section>
                <section class="col col-3">
                       Nombre del Responsable de la Toma
                       <label class="select">
                            <select name="responsable_id">
                                
                                <?php echo $record->listResponsable($record->responsable_id)?>
                            </select>
                        </label>
                </section>
                <section class="col col-4">
                        Responsable de la Toma que avala el resultado
                        <label class="select">
                            <select name="responsable_lab_id">
                                
                                <?php echo $record->listResponsable($record->responsable_lab_id)?>
                            </select>
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
                                
                                
                             