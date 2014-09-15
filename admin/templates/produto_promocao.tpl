<div id="wrapper">

    {include file="sidebar.tpl"}

    <!--Body content-->
    <div id="content" class="clearfix">
        <div class="contentwrapper"><!--Content wrapper-->

            {include file="heading.tpl"}

            <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

            {foreach $listaPromocao as $valorListaPromocao}{/foreach}

            {if {$valorListaPromocao.ID_PROMOCAO} }

            <form class="form-horizontal" id="editaPromocao" action="{$ACTIONS_DIR}promocao.php" method="post"/>
            <div class="row-fluid">

                <div class="span12">

                    <div class="box">

                        <div class="title">

                            <h4>
                                <span class="icon16 brocco-icon-grid"></span>
                                <span>Cadastra Promo&ccedil;&atilde;o</span>
                            </h4>

                        </div>
                        <div class="content">



                            <input type="hidden" name="acao" value="editaPromocao">


                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="required">ID Promo&ccedil;&atilde;o</label>
                                        <input class="span2" id="idPromocao" type="text" name="idPromocao" value="{$valorListaPromocao.ID_PROMOCAO}" readonly />
                                    </div>
                                </div>
                            </div>                       



                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="required">Descri&ccedil;&atilde;o</label>
                                        <input class="span8" id="nomePromocao" type="text" name="nomePromocao" required="required" value="{$valorListaPromocao.NOME_PROMOCAO}" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="required">Data Inicial</label>
                                        <input class="span4 mask-date" id="dataInicialPromocao" type="text" name="dataInicialPromocao" value="{$valorListaPromocao.DATA_INICIAL}" required="required" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="required">Data Final</label>
                                        <input class="span4 mask-date" id="dataFinalPromocao" type="text" name="dataFinalPromocao" value="{$valorListaPromocao.DATA_FINAL}" required="required" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="normal">Tipo Promo&ccedil;&atilde;o</label>
                                        <div class="span8 controls">
                                            <select id="tipoPromocao" name="tipoPromocao" required="required">
                                                {if $valorListaPromocao.TIPO_PROMOCAO eq 'P'}
                                                <option value="P" checked="checked">PERCENTUAL</option>
                                                <option value="V">VALOR</option>
                                                {else}
                                                <option value="P">PERCENTUAL</option>
                                                <option value="V" checked="checked">VALOR</option>
                                                {/if}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="normal">Valor</label>
                                        <input class="span4 mask-moeda-real" id="valorPromocao" type="text" name="valorPromocao"  value="{$valorListaPromocao.VALOR|number_format:2:",":"."}" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="normal">Promo&ccedil;&atilde;o Ativa</label>
                                        {if $valorListaPromocao.PROMOCAO_ATIVA eq 'S'}
                                        <input id="ativaPromocao" type="checkbox" name="ativaPromocao" value="S" checked="checked" />
                                        {else}
                                        <input id="ativaPromocao" type="checkbox" name="ativaPromocao" value="S" />
                                        {/if}
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="normal">Frete Gr&aacute;tis</label>
                                        {if $valorListaPromocao.FRETE_GRATIS eq 'S'}
                                        <input id="freteGratis" type="checkbox" name="freteGratis" value="S" checked="checked" />
                                        {else}
                                        <input id="freteGratis" type="checkbox" name="freteGratis" value="S" />
                                        {/if}
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="normal">Observa&ccedil;&atilde;o</label>
                                        <input class="span8" id="obsPromocao" type="text" name="obsPromocao" value="{$valorListaPromocao.OBS}" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="produtoPromocaoSelect">Produtos</label>
                                        <!-- <select class="nostyle" id="produtoPromocaoSelect" name="produtoPromocaoSelect[]" multiple>  
                                        </select> -->
                                        <input type="text" id="produtoPromocaoSelect" name="produtoPromocaoSelect" value="{$stringProdutoPromocao}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="categoriaPromocaoSelect">Categorias</label>
                                        <!-- <select class="nostyle" id="categoriaPromocaoSelect" name="categoriaPromocaoSelect[]" multiple>  
                                        </select> -->
                                        <input type="text" id="categoriaPromocaoSelect" name="categoriaPromocaoSelect" value="{$stringCategoriaPromocao}"/>
                                    </div>
                                </div>
                            </div>

                            <!-- <hr />                                    
                            <div class="form-row row-fluid">
                                <div class="span6">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="normal">Categoria</label>

                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="row-fluid lista-categoria">

                                        <div>{$listaCategoria}</div>
                                    </div>
                                </div>
                            </div> -->

                            <div class="form-actions">
                               <button type="submit" class="btn btn-info">Salvar</button>
                               <!--<button type="button" class="btn">Cancelar</button>-->
                           </div>
                           <div id="teste"></div>  

                       </div>

                   </div><!-- End .box -->

               </div>


                    <!--<div class="span6">



                        <div class="box">

                            <div class="title">

                                <h4>
                                    <span class="icon16 brocco-icon-grid"></span>
                                    <span>Promo&ccedil;&atilde;o Produto</span>
                                </h4>
                                
                            </div>
                            <div class="content">


                                <div class="form-actions">
                                       <button type="submit" class="btn btn-info">Salvar</button>
                                       <button type="button" class="btn">Cancelar</button>
                                    </div>
                                    <div id="teste">123</div>

                            </div>
                        </div>
 
                    </div>-->
                </div>

            </form>

            {else}

            <form class="form-horizontal" id="cadastraPromocao" action="{$ACTIONS_DIR}promocao.php" method="post"/>
            <div class="row-fluid">

                <div class="span12">

                    <div class="box">

                        <div class="title">

                            <h4>
                                <span class="icon16 brocco-icon-grid"></span>
                                <span>Cadastra Promo&ccedil;&atilde;o</span>
                            </h4>

                        </div>
                        <div class="content">



                            <input type="hidden" name="acao" value="cadastraPromocao">


                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="required">Descri&ccedil;&atilde;o</label>
                                        <input class="span8" id="nomePromocao" type="text" name="nomePromocao" required="required" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="required">Data Inicial</label>
                                        <input class="span4 mask-date" id="dataInicialPromocao" type="text" name="dataInicialPromocao" required="required" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="required">Data Final</label>
                                        <input class="span4 mask-date" id="dataFinalPromocao" type="text" name="dataFinalPromocao" required="required" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="normal">Tipo Promo&ccedil;&atilde;o</label>
                                        <div class="span8 controls">
                                            <select id="tipoPromocao" name="tipoPromocao" required="required">
                                                <option value="P">PERCENTUAL</option>
                                                <option value="V">VALOR</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="normal">Valor</label>
                                        <input class="span4 mask-moeda-real" id="valorPromocao" type="text" name="valorPromocao"  />
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="normal">Promo&ccedil;&atilde;o Ativa</label>
                                        <input id="ativaPromocao" type="checkbox" name="ativaPromocao" value="S" checked="checked" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="normal">Frete Gr&aacute;tis</label>
                                        <input id="freteGratis" type="checkbox" name="freteGratis" value="S" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="normal">Observa&ccedil;&atilde;o</label>
                                        <input class="span8" id="obsPromocao" type="text" name="obsPromocao" />
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="produtoPromocaoSelect">Produtos</label>
                                        <!-- <select class="nostyle" id="produtoPromocaoSelect" name="produtoPromocaoSelect[]" multiple>  
                                        </select> -->
                                        <input type="hidden" id="produtoPromocaoSelect" name="produtoPromocaoSelect"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="categoriaPromocaoSelect">Categorias</label>
                                        <!-- <select class="nostyle" id="categoriaPromocaoSelect" name="categoriaPromocaoSelect[]" multiple>  
                                        </select> -->
                                        <input type="hidden" id="categoriaPromocaoSelect" name="categoriaPromocaoSelect"/>
                                    </div>
                                </div>
                            </div>

                                    <!-- <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="checkboxes">Produtos</label>
                                                <div class="span8 controls">   
                                                    <select name="idProdutos[]" id="select2" class="nostyle" style="width:100%;" multiple="multiple">
                                                            {foreach $listaProduto as $valorListaProduto}
                                                                <option value="{$valorListaProduto.ID_PRODUTO}" />{$valorListaProduto.REFERENCIA} - {$valorListaProduto.DESCRICAO_VENDA}
                                                            {/foreach}
                                                      </select>
                                                </div> 
                                            </div>
                                        </div> 
                                    </div>

                                    <hr /> -->
                                    <!-- <div class="form-row row-fluid">
                                        <div class="span6">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Categoria</label>
                                                
                                            </div>
                                        </div>
                                        <div class="span6">
                                            <div class="row-fluid lista-categoria">

                                                <div>{$listaCategoria}</div>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="form-actions">
                                       <button type="submit" class="btn btn-info">Salvar</button>
                                       <!--<button type="button" class="btn">Cancelar</button>-->
                                   </div>
                                   <div id="teste"></div>  

                               </div>

                           </div><!-- End .box -->

                       </div>


                    <!--<div class="span6">



                        <div class="box">

                            <div class="title">

                                <h4>
                                    <span class="icon16 brocco-icon-grid"></span>
                                    <span>Promo&ccedil;&atilde;o Produto</span>
                                </h4>
                                
                            </div>
                            <div class="content">


                                <div class="form-actions">
                                       <button type="submit" class="btn btn-info">Salvar</button>
                                       <button type="button" class="btn">Cancelar</button>
                                    </div>
                                    <div id="teste">123</div>

                            </div>
                        </div>
 
                    </div>-->
                </div>

            </form>
            {/if}
            <!-- Page end here -->


        </div><!-- End contentwrapper -->
    </div><!-- End #content -->

</div><!-- End #wrapper -->


