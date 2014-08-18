
<div class="row">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">
                        <i class="fa fa-table fa-fw "></i> 
                               Laboratorios
                        <span>> 
                               Listado
                        </span>
                </h1>
        </div>
       <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
        <ul id="sparks" class="">
                <li class="sparks-info">
                    <a href="<?php echo $record->newLink(); ?>" class="btn btn-default">Crear Nuevo Registro </a>
                </li>
               
        </ul>
	</div>
      
</div>

<!-- widget grid -->
<section id="widget-grid" class="">

        <!-- row -->
        <div class="row">

                <!-- NEW WIDGET START -->
                <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


                        <!-- Widget ID (each widget will need unique ID)-->
                        <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-1" data-widget-editbutton="false">
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
                                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                                        <h2s> </h2s>

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

                                                <table id="datatable_fixed_column" class="table dataTable table-striped table-bordered" width="100%">

                                                <thead>

<tr>
     
        <th class="hasinput" colspan="10" style="width:17%">
       
        </th>
         
      
</tr>


                                                    <tr>
                                                    <th >
                                                       Id
                                                    </th>    
                                                    
                                                  
                                                    
                                                    <th>Nombre</th>
                                                    <th data-hide="phone,tablet">Email</th>
                                                    <th data-hide="phone,tablet">Creado</th>
                                                    <th data-hide="phone,tablet">Actualizado</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($all as $row):?>
                                                    <tr>
                                                        <td >
                                                            <a href="<?php echo $row->editLink() ?>">
                                                            <?php echo $row->id; ?>
                                                            </a>
                                                        </td>
                                                        <td >
                                                            <a href="<?php echo $row->editLink() ?>">
                                                                <?php echo $row->paterno ." ".$row->materno." ".$row->nombre ?>
                                                            </a>
                                                        </td>
                                                        <td >
                                                            
                                                            <?php echo $row->email ?>
                                                            
                                                        </td>
                                                         <td >
                                                            
                                                            <?php echo $row->created_on ?>
                                                            
                                                        </td>
                                                         <td >
                                                            
                                                            <?php echo $row->updated_on ?>
                                                            
                                                        </td>
                                                    </tr>
                                                <?php endforeach;?>
                                                </tbody>
                                                </table>
                                                <div class="dt-toolbar-footer">
                                                    <div class="col-sm-6 col-xs-12 hidden-xs">
                                                      
                                                    </div>
                                                            <div class="col-xs-12 col-sm-6">
                                                                <div class="dataTables_paginate paging_simple_numbers" id="datatable_fixed_column_paginate">
                                                                    <!--ul class="pagination pagination-sm">
                                                                        <li class="paginate_button previous disabled" aria-controls="datatable_fixed_column" tabindex="0" id="datatable_fixed_column_previous">
                                                                            <a href="#">Previous</a>
                                                                        </li>
                                                                        <li class="paginate_button active" aria-controls="datatable_fixed_column" tabindex="0">
                                                                            <a href="#">1</a>
                                                                        </li>
                                                                        <li class="paginate_button " aria-controls="datatable_fixed_column" tabindex="0">
                                                                            <a href="#">2</a>
                                                                        </li>
                                                                        <li class="paginate_button next" aria-controls="datatable_fixed_column" tabindex="0" id="datatable_fixed_column_next">
                                                                            <a href="#">Next</a>
                                                                        </li>
                                                                    </ul-->
                                                                     <ul class="pagination pagination-sm">
                                                                        <!-- pagination starts --->
                                                                        <?php echo $pagination ?>
                                                                        <!-- pagination ends --->
                                                                     </ul>
                                                                </div>
                                                            </div>
                                                </div>
                                        </div>
                                        <!-- end widget content -->

                                </div>
                                <!-- end widget div -->

                        </div>
                        <!-- end widget -->



                </article>
                <!-- WIDGET END -->

        </div>

        <!-- end row -->

        <!-- end row -->

</section>