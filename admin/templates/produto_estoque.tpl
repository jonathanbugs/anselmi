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
                            <label class="form-label span4" for="checkboxes">Quantidade Produto <= </label>
                            <div class="span8 controls">   
                                <input type="text" value="{$qtdFiltro}" name="qtdEstoque" id="qtdEstoque" class="span1">
                                <span class="btn btn-info" id="gerarRelatorio">Gerar</span>
                            </div> 
                        </div>
                    </div> 
                </div>
                
                </form> 

                <div class="span10" id="conteudoImprimir">
                    <span class="entypo-icon-printer right" id="imprimirRelatorio"></span>
                    <div class="page-header">
                        <h4>Estoque de Produtos</h4>
                    </div>
                    <table class="responsive table table-condensed">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Descri&ccedil;&atilde;o Venda</th>
                            <th>Refer&ecirc;ncia</th>
                            <th>Atributo</th>
                            <th>Quantidade</th>
                          </tr>
                        </thead>
                        <tbody>
                          {foreach $listaProdutoEstoque as $value}
                          <tr class="linhaProdutoEstoque" id="{$value.ID_PRODUTO}">
                            <td>{$value.ID_PRODUTO}</td>
                            <td>{$value.DESCRICAO_VENDA}</td>
                            <td>{$value.REFERENCIA}</td>
                            <td>{$value.ATRIBUTO}</td>
                            <td>{$value.SALDO}</td>
                          </tr>
                          {/foreach}
                        </tbody>
                    </table>

                </div><!-- End .span6 -->              
                <!-- Page end here -->
                    
               
            </div><!-- End contentwrapper -->
        </div><!-- End #content -->
    
    </div><!-- End #wrapper -->

   