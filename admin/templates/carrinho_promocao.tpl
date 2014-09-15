<div id="wrapper">

    {include file="sidebar.tpl"}

    <!--Body content-->
    <div id="content" class="clearfix">
        <div class="contentwrapper"><!--Content wrapper-->

            {include file="heading.tpl"}

            <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

                {foreach $listaPromocaoCarrinho as $valorListaPromocaoCarrinho}{/foreach}

                {if $valorListaPromocaoCarrinho.ID_PROMOCAO_CARRINHO}

                <form class="form-horizontal" id="editaPromocaoCarrinho" action="{$ACTIONS_DIR}promocao.php" method="post"/>
                
                <div class="row-fluid">

                    <div class="span9">

                        <div class="box">

                            <div class="title">

                                <h4>
                                    <span class="icon16 brocco-icon-grid"></span>
                                    <span>Cadastra Promo&ccedil;&atilde;o Carrinho</span>
                                </h4>
                                
                            </div>
                            <div class="content">
                               
                                    <input type="hidden" name="acao" value="editaPromocaoCarrinho">

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">ID Promo&ccedil;&atilde;o</label>
                                                <input class="span2" id="idPromocaoCarrinho" type="text" name="idPromocaoCarrinho" value="{$valorListaPromocaoCarrinho.ID_PROMOCAO_CARRINHO}" readonly required="required" />
                                            </div>
                                        </div>
                                    </div>                       
                                    

                                    
                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Descri&ccedil;&atilde;o</label>
                                                <input class="span8" id="descricaoPromocao" type="text" name="descricaoPromocao" required="required" value="{$valorListaPromocaoCarrinho.DESCRICAO_PROMOCAO}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Cupom Promocional</label>
                                                <input class="span8" id="cupomPromocional" type="text" name="cupomPromocional"  value="{$valorListaPromocaoCarrinho.CUPOM_PROMOCIONAL}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">E-mail Cliente Contemplado</label>
                                                <input class="span8" id="emailClienteContemplado" type="text" name="emailClienteContemplado" value="{$valorListaPromocaoCarrinho.EMAIL_CLIENTE_CONTEMPLADO}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Data Inicial</label>
                                                <input class="span4 mask-date" id="dataInicialValidade" type="text" name="dataInicialValidade" value="{$valorListaPromocaoCarrinho.DATA_INICIAL_VALIDADE}" required="required" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Data Final</label>
                                                <input class="span4 mask-date" id="dataFinalValidade" type="text" name="dataFinalValidade" value="{$valorListaPromocaoCarrinho.DATA_FINAL_VALIDADE}" required="required" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Tipo Promo&ccedil;&atilde;o</label>
                                                <div class="span8 controls">
                                                    <select id="tipoDesconto" name="tipoDesconto" required="required">
                                                        {if $valorListaPromocaoCarrinho.TIPO_DESCONTO eq 'P'}
                                                        <option value="P" selected="selected">PERCENTUAL</option>
                                                        <option value="V">VALOR</option>
                                                        {else}
                                                        <option value="V" selected="selected">VALOR</option>
                                                        <option value="P">PERCENTUAL</option>
                                                        {/if}
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Valor Desconto</label>
                                                <input class="span4 mask-moeda-real" id="valorDesconto" type="text" name="valorDesconto"  value="{$valorListaPromocaoCarrinho.VALOR_DESCONTO|number_format:2:",":"."}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Valor M&iacute;nimo Compra</label>
                                                <input class="span4 mask-moeda-real" id="valorMinimoCompra" type="text" name="valorMinimoCompra" required="required" value="{$valorListaPromocaoCarrinho.VALOR_MINIMO_COMPRA|number_format:2:",":"."}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Promo&ccedil;&atilde;o Ativa</label>
                                                {if $valorListaPromocaoCarrinho.PROMOCAO_ATIVA eq 'S'}
                                                <input id="promocaoAtiva" type="checkbox" name="promocaoAtiva" value="S" checked="checked" />
                                                {else}
                                                <input id="promocaoAtiva" type="checkbox" name="promocaoAtiva" value="S" />
                                                {/if}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Utiliza&ccedil;&atilde;o &Uacute;nica</label>
                                                {if $valorListaPromocaoCarrinho.UTILIZACAO_UNICA eq 'S'}
                                                <input id="utilizacaoUnica" type="checkbox" name="utilizacaoUnica" value="S" checked="checked" />
                                                {else}
                                                <input id="utilizacaoUnica" type="checkbox" name="utilizacaoUnica" value="S" />
                                                {/if}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Quantidade Produto Carrinho</label>
                                                <input class="span1" id="quantidadeProdutoCarrinho" type="text" name="quantidadeProdutoCarrinho" value="{$valorListaPromocaoCarrinho.QUANTIDADE_PROMOCAO_CARRINHO}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Frete Gr&aacute;tis</label>
                                                {if $valorListaPromocaoCarrinho.FRETE_GRATIS eq 'S'}
                                                <input id="freteGratis" type="checkbox" name="freteGratis" value="S" checked="checked" />
                                                {else}
                                                <input id="freteGratis" type="checkbox" name="freteGratis" value="S" />
                                                {/if}
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Pacote Presente Gr&aacute;tis</label>
                                                {if $valorListaPromocaoCarrinho.PACOTE_PRESENTE_GRATIS eq 'S'}
                                                <input id="pacotePresenteGratis" type="checkbox" name="pacotePresenteGratis" value="S" checked="checked" />
                                                {else}
                                                <input id="pacotePresenteGratis" type="checkbox" name="pacotePresenteGratis" value="S" />
                                                {/if}
                                            </div>
                                        </div>
                                    </div>-->

                                    <div class="form-actions">
                                       <button type="submit" class="btn btn-info">Salvar</button>
                                       <!--<button type="button" class="btn">Cancelar</button>-->
                                    </div>
                                    <div id="teste">123</div>  

                            </div>

                        </div><!-- End .box -->

                    </div>
                

                </div>

                </form>

                {else}

                <form class="form-horizontal" id="cadastraPromocaoCarrinho" action="{$ACTIONS_DIR}promocao.php" method="post"/>
                
                <div class="row-fluid">

                    <div class="span9">

                        <div class="box">

                            <div class="title">

                                <h4>
                                    <span class="icon16 brocco-icon-grid"></span>
                                    <span>Cadastra Promo&ccedil;&atilde;o Carrinho</span>
                                </h4>
                                
                            </div>
                            <div class="content">
                               
                                    <input type="hidden" name="acao" value="cadastraPromocaoCarrinho">

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Descri&ccedil;&atilde;o</label>
                                                <input class="span8" id="descricaoPromocao" type="text" name="descricaoPromocao" required="required" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Cupom Promocional</label>
                                                <input class="span8" id="cupomPromocional" type="text" name="cupomPromocional" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">E-mail Cliente Contemplado</label>
                                                <input class="span8" id="emailClienteContemplado" type="text" name="emailClienteContemplado"  />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Data Inicial</label>
                                                <input class="span4 mask-date" id="dataInicialValidade" type="text" name="dataInicialValidade"  required="required" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Data Final</label>
                                                <input class="span4 mask-date" id="dataFinalValidade" type="text" name="dataFinalValidade"  required="required" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Tipo Promo&ccedil;&atilde;o</label>
                                                <div class="span8 controls">
                                                    <select id="tipoDesconto" name="tipoDesconto" required="required">
                                                        <option value="P" checked="checked">PERCENTUAL</option>
                                                        <option value="V">VALOR</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Valor Desconto</label>
                                                <input class="span4 mask-moeda-real" id="valorDesconto" type="text" name="valorDesconto"  />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Valor M&iacute;nimo Compra</label>
                                                <input class="span4 mask-moeda-real" id="valorMinimoCompra" type="text" name="valorMinimoCompra" required="required"  />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Promo&ccedil;&atilde;o Ativa</label>
                                                <input id="promocaoAtiva" type="checkbox" name="promocaoAtiva" value="S" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Utiliza&ccedil;&atilde;o &Uacute;nica</label>
                                                <input id="utilizacaoUnica" type="checkbox" name="utilizacaoUnica" value="S" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Quantidade Produto Carrinho</label>
                                                <input class="span1" id="quantidadeProdutoCarrinho" type="text" name="quantidadeProdutoCarrinho"  />
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

                                    <!-- <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Pacote Presente Gr&aacute;tis</label>
                                                <input id="pacotePresenteGratis" type="checkbox" name="pacotePresenteGratis" value="S" />
                                            </div>
                                        </div>
                                    </div>-->

                                    <div class="form-actions">
                                       <button type="submit" class="btn btn-info">Salvar</button>
                                       <!--<button type="button" class="btn">Cancelar</button>-->
                                    </div>
                                    <div id="teste">123</div>  

                            </div>

                        </div><!-- End .box -->

                    </div>
                

                    
                </div>

                </form>
                {/if}
            <!-- Page end here -->
                
           
        </div><!-- End contentwrapper -->
    </div><!-- End #content -->

</div><!-- End #wrapper -->

   

