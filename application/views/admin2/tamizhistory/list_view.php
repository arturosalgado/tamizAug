


<?php foreach ($all as $record):?>
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

    <form id="form-tamiz" class="smart-form" method="post" action="<?php echo site_url('/tamiz/update').'/'.$record->id; ?>">
     <fieldset>  
         <input name="saveType" id="saveType"  type="hidden"> 
         <input name="id" id="current-id" value="<?php echo $record->id?>"  type="hidden" > 
    <div class="row">
                <section class="col col-3">
                        Unidad donde se toma la muestra
                        <label class="input" >
                             
                          <input class="form-control ui-autocomplete-input required" 
                                  name="unidad_clinica"
                                  id="unidad_clinica"
                                  required="required"
                                  title='Se requiere esta información'
                                  value="<?php echo $record->unidad_clinica  ?>"
                                 placeholder="" type="text" data-autocomplete=
                         '<?php echo $record->toJsonNameList('unitmodel'); ?>' autocomplete="off" />
                          <script>
                              var unidades = <?php echo $record->toJsonNameList('unitmodel'); ?>;
                          </script>
                            
                        </label>
                </section>
                <section class="col col-3">
                        Jurisdicción
                        <label class="input">
                            
                           
                      <input class="form-control ui-autocomplete-input" 
                             name="unidad_jurisdiccion"
                             id="jurisdiccion"
                               required="required"
                                  title='Se requiere esta información'
                             value="<?php echo $record->unidad_jurisdiccion  ?>"
                             placeholder="" type="text" data-autocomplete=
                             '<?php echo $record->toJsonNameList('jurisdictionmodel'); ?>' autocomplete="off" />
                             <script>
                              var jurisdicciones = <?php echo $record->toJsonNameList('jurisdictionmodel'); ?>;
                             </script>  
                            
                        </label>
                </section>
                <section class="col col-3">
                        Estado 
                        <label class="input">
                            <input id="estados" name="estado_clinica" value="<?php echo $record->estado_clinica; ?>" class="form-control ui-autocomplete-input" placeholder="" type="text" data-autocomplete=
                         '<?php echo $record->toJsonNameList('estadomodel'); ?>' autocomplete="off" />
                            <script>
                              var estados = <?php echo $record->toJsonNameList('estadomodel'); ?>;
                              
                              
                            </script>   
                        </label>
                </section>
                <section class="col col-3">
                        Folio 
                        <label class="input">
                            <input id="folio" name = "folio" type="text" value="<?php echo $record->folio ?>">
                        </label>
                </section>
     </div>  
     </fieldset>                                               
     <fieldset style="">
           <legend>Datos del Recién Nacido</legend>                                                 
         <div class="row">
                <section class="col col-2">
                       Fecha de Nacimiento
                        

                        <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                <input type="text" name="fechadenacimiento"  value="<?php echo ($record->fechadenacimiento==null)?date('d/m/Y'):$record->getFechadenacimiento(); ?>" id="startdate" placeholder=""  >
                        </label>

                       
                       
                </section>
             
                 <section class="col col-1">
                       Hora
                        <label class="input">
                            <input type="text" placeholder="00:00" name="horanacimiento" value="<?php echo $record->horanacimiento?>" >
                        </label>
                </section>
             
                <section class="col col-2">
                      
                    
                    Sexo
                    <label class="radio">
                        <input type="radio" name="sexo" value="Masculino" <?php if($record->sexo=='Masculino') echo 'checked' ?> >
                            <i></i>Masculino</label>
                    <label class="radio">
                        <input type="radio" name="sexo" value="Femenino" <?php if($record->sexo=='Femenino') echo 'checked' ?>  >
                            <i></i>Femenino</label>
                    <label class="radio">
                        <input type="radio" name="sexo" value="Ambiguedad" <?php if($record->sexo=='Ambiguedad') echo 'checked' ?>  >
                            <i></i>Ambiguedad Genital
                    </label>
														
                    
                    
                </section>
             
               <section class="col col-2">
                      
                    
                    Edad Gestacional
                    <label class="radio">
                            <input type="radio" name="edadgestacional"  value="pretermino" <?php if($record->edadgestacional=='pretermino') echo 'checked' ?>  >
                            <i></i>Pre-término</label>
                    <label class="radio">
                            <input type="radio" name="edadgestacional" value="termino"  <?php if($record->edadgestacional=='termino') echo 'checked' ?> >
                            <i></i>Término</label>
                    <label class="radio">
                            <input type="radio" name="edadgestacional" value="posttermino"  <?php if($record->edadgestacional=='posttermino') echo 'checked' ?>  >
                            <i></i>Post-término
                    </label>
														
                    
                    
                </section>
             
               <section class="col col-2">
                      
                    
                   Producto 
                    <label class="radio">
                        <input type="radio" name="producto" value="unico"  <?php if ($record->producto=='unico')echo 'checked' ?>  >
                            <i></i>Único</label>
                    <label class="radio">
                            <input type="radio" name="producto" value="gemelo" <?php if ($record->producto=='gemelo')echo 'checked' ?>   >
                            <i></i>Numero de Gemelo </label>
                   <input size="3" style="width:40px; "value="<?php echo $record->numerodegemelo; ?>" name="numerodegemelo" type="number" step="1" min="1" max="7">
                   
                    
														
                    
                    
                </section>
             
                <section class="col col-2">
                        Peso al nacer (grs)
                        <label class="input">
                            <input type="text" name="peso" value="<?php echo $record->peso ?>">
                        </label>
                        Talla (cm)
                        <label class="input">
                            <input type="text" name="talla" value="<?php echo $record->talla ?>">
                        </label>
                </section>
     </div>  
            <div class="row">
                <section class="col col-2">
                       Toma de muestra
                        <label class="input">
                            <input type="text" name="fechademuestra" value="<?php echo ($record->fechademuestra==null)?date('d/m/Y'):$record->getFechademuestra(); ?>"  placeholder="dd/mm/aaaa"  >
                        </label>
                </section>
             
                 <section class="col col-1">
                       Hora 
                        <label class="input">
                            <input type="text" name="horamuestra" placeholder="00:00" value="<?php echo $record->horamuestra?>" >
                        </label>
                </section>
             
                <section class="col col-2">
                      
                    
                  Malformaciones Cong.
                    <label class="radio">
                        <input type="radio" name="malformacion" value="no"   <?php if ($record->malformacion=='no') echo 'checked' ?>  >
                            <i></i>No</label>
                    <label class="radio">
                        <input type="radio" name="malformacion" value="si"  <?php if ($record->malformacion=='si') echo 'checked' ?> >
                            <i></i>Si</label>
                  
                    Cual
                    <input type="text" name="malformacion_cong"value="<?php echo $record->malformacion_cong?>" size="16"/>														
                    
                    
                </section>
             
               <section class="col col-2">
                      
                  Condiciones RN
                    <label class="radio">
                        <input type="radio" name="condicion" value="sano" <?php if ($record->condicion=='sano') echo 'checked' ?> >
                            <i></i>Sano</label>
                    <label class="radio">
                            <input type="radio" name="condicion" value="enfermo" <?php if ($record->condicion=='enfermo') echo 'checked' ?>  >
                            <i></i>Enfermo</label>
                    <label class="radio">
                            <input type="radio" name="condicion" value="cuidadosintensivos" <?php if ($record->condicion=='cuidadosintensivos') echo 'checked' ?>  >
                            <i></i>Cuidados Intensivos
                    </label>
														
                    
                    
                </section>
             
               <section class="col col-2">
                      
                    
                  Alimentacion del RN
       <label class="radio">
           <input type="radio" name="alimentacion"  value="lechematerna" <?php if ($record->alimentacion=='lechematerna') echo 'checked' ?>  >
                <i></i>Leche Materna</label>
        <label class="radio">
            <input type="radio" name="alimentacion" value="formulalactea" <?php if ($record->alimentacion=='formulalactea') echo 'checked' ?>  >
                <i></i>Formula Lactea</label>
        <label class="radio">
            <input type="radio" name="alimentacion" value="mixta" <?php if ($record->alimentacion=='mixta') echo 'checked' ?> >
                <i></i>Mixta</label>

		 <label class="radio">
                <input type="radio" name="alimentacion" value="ayuno"  <?php if ($record->alimentacion=='ayuno') echo 'checked' ?> >
                <i></i>Ayuno</label>												
                    
                    
                </section>
             
                
     </div>  
                                                        
     </fieldset>                                                     
     
<fieldset>
    <legend>Datos de la Madre</legend>
        <div class="row">
                <section class="col col-2">
                        Apellido paterno
                        <label class="input">
                            <input 
                                  required="required"
                                  title='Se requiere esta información'
                                type="text" name="apellido_paterno" value="<?php echo $record->apellido_paterno ?>" placeholder="">
                        </label>
                </section>
                <section class="col col-2">
                        Apellido Materno
                        <label class="input">
                            <input 
                                 id="apellido_paterno"
                                  required="required"
                                  title='Se requiere esta información'
                                type="text" name="apellido_materno" value="<?php echo $record->apellido_materno ?>" placeholder="">
                        </label>
                </section>
                <section class="col col-2">
                        Nombre 
                        <label class="input">
                            <input 
                                  required="required"
                                  title='Se requiere esta información'
                                type="text" name="nombre"  value="<?php echo $record->nombre ?>" placeholder="">
                        </label>
                </section>
                <section class="col col-1">
                        Edad
                        <label class="input">
                            <input type="text" placeholder="" name="edadmadre" value="<?php echo $record->edadmadre ?>" >
                        </label>
                </section>
                <section class="col col-1">
                        Gesta
                        <label class="select">
                               
                           <select name="gesta">
                                 <?php echo  $record->listGesta($record->gesta) ?>
                           </select>     
                        </label>
                </section>
            
                 <section class="col col-3">
                        Enfermedad tiroidea o metabolica
                       
                         <label class="radio">
           <input type="radio" name="enfermedad" value="no" <?php if ($record->enfermedad=='no') echo 'checked'  ?>  >
                <i></i>No</label>
        <label class="radio">
            <input type="radio" name="enfermedad" value="si" <?php if ($record->enfermedad=='si') echo 'checked'  ?>>
                <i></i>Si</label>
                        ¿Cual?  <input name="enfermedad_metabolica" value="<?php echo $record->enfermedad_metabolica ?>" />          
                </section>
            
        </div>

      <div class="row">
                <section class="col col-3">
                       Domicilio
                        <label class="input">
                            <input type="text" name="domicilio" value="<?php echo $record->domicilio; ?>" placeholder="Calle y Numero"/>
                        </label>
                </section>
                <section class="col col-2">
                      Colonia o Localidad
                        <label class="input">
                            <input type="text" placeholder="" name="colonia" value="<?php echo $record->colonia; ?>">
                        </label>
                </section>
                <section class="col col-2">
                        Municipio o Delegacion
                        <label class="input">
                            <input type="text" placeholder="" name="municipio" value="<?php echo $record->municipio ?>">
                        </label>
                </section>
                <section class="col col-2">
                        Entidad Federativa
                        <label class="select">
                            <select name="estado_id">
                                <?php echo $record->listEstados($record->estado_id)?>
                            </select>
                        </label>
                </section>
                <section class="col col-1">
                       C. Postal
                        <label class="input">
                            <input type="text" placeholder="" name="cp" value="<?php echo $record->cp ?>" >
                        </label>
                </section>
            
                 <section class="col col-2">
                       Telefono
                       <label class="input">
                                <input type="text" placeholder="" name="telefono" value="<?php echo $record->telefono ?>" >
                        </label>
                               
                </section>
            
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

<?php endforeach;?>


<!-- widget grid -->

<!-- end widget grid -->






<!--XXX --->

	

		<!--================================================== -->

		

		

		

		<!--[if IE 8]>

		<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->

		

		<!-- PAGE RELATED PLUGIN(S) -->
		


                    