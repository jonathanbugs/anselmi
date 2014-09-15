    <div id="wrapper">

        {include file="sidebar.tpl"}

        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                {include file="heading.tpl"}

                <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

                <form class="form-horizontal" id="produtoDoDia" enctype="multipart/form-data" action="{$ACTIONS_DIR}produto.php" method="post" />

                <input value="gravaProdutoDoDia" name="acao" type="hidden">
                <div id="teste"></div>
                                
                <div class="form-row row-fluid">
                    <div class="span6">
                        <div class="row-fluid">
                            <label class="form-label span4" for="textarea">Refer&ecirc;ncia</label>
                            <input type="text" name="referencia" id="referencia" class="span4" /> <button type="submit" class="btn btn-info">Salvar</button>
                        </div>
                        
                    </div>
                    <br>
                    <br>
                    <br>

                    <div class="row-fluid">
                        <div class="span12" id="tabelaProdutoDoDia">
                            <table class="responsive table">
                                <thead>
                                  <tr>
                                    <th>Foto</th>
                                    <th>Refer&ecirc;ncia</th>
                                    <th>Descri&ccedil;&atilde;o</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  {foreach $produtoPromoDia as $valueProdutoPromoDia}  
                                  <tr>
                                    <td>
                                        <a href="../{$valueProdutoPromoDia.URL_AMIGAVEL}.html" target="_blank">
                                            <img alt="" src="../midia/produtos/carrinho/{$valueProdutoPromoDia.IMAGEM_PRINCIPAL}">
                                        </a>
                                    </td>
                                    <td>{$valueProdutoPromoDia.REFERENCIA}</td>
                                    <td>
                                        <a href="../{$valueProdutoPromoDia.URL_AMIGAVEL}.html" target="_blank">
                                            {$valueProdutoPromoDia.DESCRICAO_VENDA}<br>
                                            De R$ {$valueProdutoPromoDia.PRECO_VENDA|number_format:2:",":"."}<br>
                                            Por R$ {$valueProdutoPromoDia.PRECO_PROMOCIONAL|number_format:2:",":"."}
                                        </a>
                                    </td>
                                  </tr>
                                  {/foreach}
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                

                </form> 

    			<!-- Page end here -->

                
                    
            </div><!-- End contentwrapper -->
        </div><!-- End #content -->
    
    </div><!-- End #wrapper -->

   