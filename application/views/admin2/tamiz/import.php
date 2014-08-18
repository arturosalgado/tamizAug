





<div class="row">
	<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
		<h1 class="page-title txt-color-blueDark">
			
			<!-- PAGE HEADER -->
			<i class="fa-fw fa fa-pencil-square-o"></i> 
				Tamiz
			<span>>  
				Importar
			</span>
		</h1>
	</div>
	
	
</div>



<!-- widget grid -->
<section id="widget-grid" style="" class="">


<!-- START ROW -->

<div class="row" style="">

        <!-- NEW COL START -->
        <article class="col-sm-12 col-md-12 col-lg-12" style="">

                <!-- Widget ID (each widget will need unique ID)-->

                <!-- end widget -->

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget" id="wid-id-3" data-widget-editbutton="false" data-widget-custombutton="false">
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
                                <h2>Importar archivo CSV </h2>				

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

                                    <form method="post" enctype="multipart/form-data" action="<?php echo site_url('/tamiz/importfile/')?>" id="order-form" class="smart-form" novalidate="novalidate">
                                                <header>
                                                       CVS
                                                </header>



                                                <fieldset>




                                                        <section>
                                                                <div class="input input-file">
                                                                        <span class="button"><input id="file" type="file" name="userfile" onchange="this.parentNode.nextSibling.value = this.value">Explorar</span><input type="text" placeholder="Adjuntar archivo" readonly="">
                                                                </div>
                                                        </section>

                                                       
                                                </fieldset>
                                                <footer>
                                                        <button type="submit" class="btn btn-primary">
                                                               Importar
                                                        </button>
                                                </footer>
                                        </form>

                                </div>
                                <!-- end widget content -->

                        </div>
                        <!-- end widget div -->

                </div>
                <!-- end widget -->				




        </article>
        <!-- END COL -->

        <!-- NEW COL START -->


        <!-- END COL -->		

</div>

<!-- END ROW -->

</section>
<!-- end widget grid -->





			