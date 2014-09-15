    <div id="wrapper">

        {include file="sidebar.tpl"}

        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                {include file="heading.tpl"}

                <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

                <form class="form-horizontal" id="exportaArquivo" action="{$ACTIONS_DIR}exportacao.php" method="post" />

                <input value="exportaArquivo" name="acao" type="hidden">
                
                <div class="form-row row-fluid">
                    <div class="span12">
                        <div class="row-fluid">
                            <label class="form-label span4" for="checkboxes">Tipo de Arquivo</label>
                            <div class="span8 controls">   
                                <select name="tipoArquivo">
                                    <option value="cliente">Cliente</option>
                                    <option value="pedido">Pedido</option>
                                </select>
                            </div> 
                        </div>
                    </div> 
                </div>
                
                
                    
                    <div class="form-actions">
                       <button type="submit" class="btn btn-info">Exportar</button>
                       <!--<button type="button" class="btn">Cancel</button>-->
                    </div>
                                                            

                </form> 

                <div id="retorno"></div>              
    			<!-- Page end here -->
    				
               
            </div><!-- End contentwrapper -->
        </div><!-- End #content -->
    
    </div><!-- End #wrapper -->

   