
<div class="row">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">
                        <i class="fa fa-table fa-fw "></i> 
                                Table 
                        <span>> 
                                Data Tables
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

                                                <table id="datatable_fixed_column" class="table table-striped table-bordered" width="100%">

                                                <thead>
                                                                <tr>
                                                                        <th class="hasinput" style="width:17%">
                                                                                <input type="text" class="form-control" placeholder="Filter Name" />
                                                                        </th>
                                                                        <th class="hasinput" style="width:18%">
                                                                                <div class="input-group">
                                                                                        <input class="form-control" placeholder="Filter Position" type="text">
                                                                                        <span class="input-group-addon">
                                                                                                <span class="onoffswitch">
                                                                                                        <input type="checkbox" name="start_interval" class="onoffswitch-checkbox" id="st3">
                                                                                                        <label class="onoffswitch-label" for="st3"> 
                                                                                                                <span class="onoffswitch-inner" data-swchon-text="YES" data-swchoff-text="NO"></span> 
                                                                                                                <span class="onoffswitch-switch"></span> 
                                                                                                        </label> 
                                                                                                </span>
                                                                                        </span>
                                                                                </div>


                                                                        </th>
                                                                        <th class="hasinput" style="width:16%">
                                                                                <input type="text" class="form-control" placeholder="Filter Office" />
                                                                        </th>
                                                                        <th class="hasinput" style="width:17%">
                                                                                <input type="text" class="form-control" placeholder="Filter Age" />
                                                                        </th>
                                                                        <th class="hasinput icon-addon">
                                                                                <input id="dateselect_filter" type="text" placeholder="Filter Date" class="form-control datepicker" data-dateformat="yy/mm/dd">
                                                                                <label for="dateselect_filter" class="glyphicon glyphicon-calendar no-margin padding-top-15" rel="tooltip" title="" data-original-title="Filter Date"></label>
                                                                        </th>
                                                                        <th class="hasinput" style="width:16%">
                                                                                <input type="text" class="form-control" placeholder="Filter Salary" />
                                                                        </th>
                                                                </tr>
                                                    <tr>
                                                    <th data-class="expand">Name</th>
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
                                                <td><a href="<?php echo $row->editLink() ?>">
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