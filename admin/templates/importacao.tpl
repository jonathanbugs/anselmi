    <div id="wrapper">

        {include file="sidebar.tpl"}

        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                {include file="heading.tpl"}

                <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

                <form class="form-horizontal" id="importaArquivo" enctype="multipart/form-data" action="{$ACTIONS_DIR}importacao.php" method="post" />

                <input value="importaArquivo" name="acao" type="hidden">
                
                <div class="form-row row-fluid">
                    <div class="span12">
                        <div class="row-fluid">
                            <label class="form-label span4" for="checkboxes">Tipo Arquivo</label>
                            <div class="span8 controls">   
                                <select name="tipoArquivo">
                                    <!-- <option value="cliente">Cliente</option> -->
                                    <option value="produto">Produto</option>
                                    <!--<option value="pedido">Pedido</option>-->
                                    <option value="preco">Pre&ccedil;o</option>
                                    <option value="imagem">Imagem Produto</option>
                                </select>
                            </div> 
                        </div>
                    </div> 
                </div>
                
                <div class="form-row row-fluid">
                        <div class="span12">
                            <div class="row-fluid">
                                <label class="form-label span4" for="textarea">Arquivo</label>
                                <input type="file" name="arquivo" id="arquivo" />
                            </div>
                        </div>  
                    </div>
                    
                    <div class="form-actions">
                       <button type="submit" class="btn btn-info">Importar</button>
                       <!--<button type="button" class="btn">Cancel</button>-->
                       <div id="loading" class="margin right">
                       		<img src="images/loaders/circular/017.gif" alt="" />
                       </div>
                    </div>
                                                            

                </form> 

                <div id="retorno"></div>              
    			<!-- Page end here -->
    				
               
            </div><!-- End contentwrapper -->
        </div><!-- End #content -->
    
    </div><!-- End #wrapper -->

   