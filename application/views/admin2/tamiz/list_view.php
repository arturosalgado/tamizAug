
<div class="row">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">
                        <i class="fa fa-table fa-fw "></i> 
                                Tamiz 
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
                                        <h2>Column Filters </h2>

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
        <form>
        <th class="hasinput" colspan="10" style="width:17%">
       
            <input style="display: block;width: 160px;margin-right:10px;float:left;" type="text" class="form-control" placeholder="Filtrar por folio" />
            <input style="display: block;width: 300px;margin-right:10px;float:left;" type="text" class="form-control" placeholder="Filtrar por nombre" />
            
            <input style="margin-right: 0px;display: block;width: 200px;float:left;"  id="dateselect_filter" type="text" placeholder="Filter Date" class="form-control datepicker" data-dateformat="yy/mm/dd">
          
            <label style="margin-right:0px;display: block;top:-4px;left:-30px;float:left;"for="dateselect_filter" class="glyphicon glyphicon-calendar no-margin padding-top-15" rel="tooltip" title="" data-original-title="Filter Date"></label>                
            
            
            <input style="margin-right: 0px;display: block;width: 200px;float:left;"  id="dateselect_filter" type="text" placeholder="Filter Date" class="form-control datepicker" data-dateformat="yy/mm/dd">
          
            
            <label style="top:-4px;left:-30px;display: block;float:left;"for="dateselect_filter" class="glyphicon glyphicon-calendar no-margin padding-top-15" rel="tooltip" title="" data-original-title="Filter Date"></label>                
              
            <input style="width: 80px;" type="submit" value="buscar" name="" class="btn btn-default">
            
        </th>
       </form>    
      
</tr>


                                                    <tr>
                                                    <th class="sorting_desc" data-class="expand">
                                                        
                                                    <a href="<?php echo $record->getOrderByLink('name') ?>">Name</a></th>
                                                    <th>Position</th>
                                                    <th data-hide="phone">Office</th>
                                                    <th data-hide="phone">Age</th>
                                                    <th data-hide="phone,tablet">Start date</th>
                                                    <th data-hide="phone,tablet">Salary</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($all as $row):?>
                                                    <tr>
                                                        <td ><a href="<?php echo $row->editLink() ?>">
                                                        <?php echo $row->apellido_paterno ." ".$row->apellido_materno." ".$row->nombre ?>
                                                        </a>
                                                    </td>
                                                    <td><?php echo $row->folio;?></td>
                                                    <td>Edinburgh</td>
                                                    <td>61</td>
                                                    <td>2014/12/12</td>
                                                    <td>$320,800</td>
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