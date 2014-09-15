   
            
    <div class="wrapper">

        {include file="sidebar.tpl"}

        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                {include file="heading.tpl"}

                <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

                <div class="row-fluid"> 
                <!--cadastro de produto-->
                <div class="span12">                            

                    <div class="page-header">
                        <h4>Cadastro de Produto</h4>
                    </div>
                    
                    {foreach $produto as $valueProduto}
                    {/foreach}

                    
                    <div style="margin-bottom: 20px;">
                        <div class="tabbable">
                            <ul id="myTab" class="nav nav-tabs pattern">
                                <li class="active"><a href="#tab1" data-toggle="tabProduto">Informa&ccedil;&otilde;es</a></li>
                                <li class="inativo"><a href="#tab2" data-toggle="tabProduto">Pre&ccedil;os</a></li>
                                <li class="inativo"><a href="#tab3" data-toggle="tabProduto">SEO</a></li>
                                <li class="inativo"><a href="#tab4" data-toggle="tabProduto">Categorias</a></li>
                                <li class="inativo"><a href="#tab5" data-toggle="tabProduto">Combina&ccedil;&otilde;es</a></li>
                                <li class="inativo"><a href="#tab8" data-toggle="tabProduto">Upload Imagens/Manual</a></li>
                                <li class="inativo"><a href="#tab6" data-toggle="tabProduto">Estoque</a></li>
                                <li class="inativo"><a href="#tab7" data-toggle="tabProduto">Tipo Frete</a></li>
                                <li class="inativo"><a href="#tab9" data-toggle="tabProduto">Compre Junto</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <form class="form-horizontal" id="cadastroProduto" action="{$ACTIONS_DIR}produto.php" method="post"/>
                                        {if $valueProduto.ID_PRODUTO}
                                            <input type="hidden" value="editarProduto" name="acao" id="acao">    
                                        {else}
                                            <input type="hidden" value="cadastrarProduto" name="acao" id="acao">
                                        {/if}

                                        <input type="hidden" value="{$valueProduto.ID_PRODUTO}" id="idProduto" name="idProduto">

                                        
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="checkboxes">Fabricante</label>
                                                    <div class="span8 controls">   
                                                        
                                                        <select name="fabricanteProduto" id="fabricanteProduto" style="width:100%;">
                                                            
                                                            {foreach $pessoaFabricante as $valorPessoaFabricante}
                                                                <option {if $valueProduto.PESS_ID_PESSOA_FABRICANTE eq $valorPessoaFabricante.ID_PESSOA}selected="selected"{/if} value="{$valorPessoaFabricante.ID_PESSOA}">{$valorPessoaFabricante.NOME}</option>
                                                            {/foreach}    
                                                        </select>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div> 

                                        
                                          
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="normal">Situa&ccedil;&atilde;o</label>
                                                    <div class="span4 controls">
                                                        <select id="situacaoProduto" name="situacaoProduto"  >
                                                            
                                                            {foreach $produtoSituacao as $valorProdutoSituacao}
                                                                {if $valueProduto.PRSI_ID_PRODUTO_SITUACAO eq $valorProdutoSituacao.ID_PRODUTO_SITUACAO}
                                                                    <option selected="selected" value="{$valorProdutoSituacao.ID_PRODUTO_SITUACAO}">{$valorProdutoSituacao.DESCRICAO_SITUACAO}</option>
                                                                {else}
                                                                    <option value="{$valorProdutoSituacao.ID_PRODUTO_SITUACAO}">{$valorProdutoSituacao.DESCRICAO_SITUACAO}</option>
                                                                {/if}
                                                            {/foreach}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="required">Descri&ccedil;&atilde;o Venda</label>
                                                    <input class="span8" id="nomeProduto" type="text" name="nomeProduto" value="{$valueProduto.NOME}" maxlength="100" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="required">Refer&ecirc;ncia</label>
                                                    <input class="span3" id="referenciaProduto" type="text" name="referenciaProduto"  maxlength="50" value="{$valueProduto.REFERENCIA}"   />
                                                </div>
                                            </div>
                                        </div>

                                        <!--<div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="required">EAN</label>
                                                    <input class="span8" id="codeanProduto" type="text" name="codeanProduto"  maxlength="50" value="{$valueProduto.COD_EAN}"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="required">NCM</label>
                                                    <input class="span8" id="ncmProduto" type="text" name="ncmProduto"  maxlength="50" value="{$valueProduto.NCM}"/>
                                                </div>
                                            </div>
                                        </div>-->

                                        

                                        <hr />

                                        {foreach $listaNivelAux as $keyNivelAux => $valueNivelAux}
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="normal">{($keyNivelAux|lower)|capitalize}</label>
                                                    <div class="span4 controls">
                                                        <select name="nivelAuxProduto[]"  >
                                                            {foreach $valueNivelAux as $value}
                                                                <option {if $value.ID_NIVEL_AUX_VALOR eq $listaNivelAuxProduto.$keyNivelAux[0]['ID_NIVEL_AUX_VALOR']}selected="selected"{/if} value="{$value.ID_NIVEL_AUX_VALOR}">{$value.VALOR}</option>
                                                            {/foreach}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {/foreach}

                                        
                                        <!-- <hr />

                                        
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="required">Pre&ccedil;o Venda</label>
                                                    <input class="span3 mask-moeda-real" id="precoVendaProduto" type="text" name="precoVendaProduto" value="{$valueProduto.PRECO_VENDA|number_format:2:",":"."}"  />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="required">Data Inicial Validade</label>
                                                    <input class="span3 mask-data datepicker" id="precoVendaProdutoDataInicialValidade" type="text" name="precoVendaProdutoDataInicialValidade" value="{if $valueProduto.DATA_INICIAL_VALIDADE}{$valueProduto.DATA_INICIAL_VALIDADE}{else}{$dataAtual}{/if}"/>
                                                </div>
                                            </div>
                                        </div> -->

                                        <hr />

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="required">Peso (Kg)</label>
                                                    <input class="span3 mask-4-decimais" id="pesoProduto" type="text" name="pesoProduto"  value="{$valueProduto.PESO_KG|number_format:4:",":"."}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="required">Altura (cm)</label>
                                                    <input class="span3 mask-4-decimais" id="alturaProduto" type="text" name="alturaProduto" value="{$valueProduto.ALTURA_CM|number_format:4:",":"."}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="required">Largura (cm)</label>
                                                    <input class="span3 mask-4-decimais" id="larguraProduto" type="text" name="larguraProduto"  value="{$valueProduto.LARGURA_CM|number_format:4:",":"."}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="required">Profundidade (cm)</label>
                                                    <input class="span3 mask-4-decimais" id="profundidadeProduto" type="text" name="profundidadeProduto" value="{$valueProduto.PROFUNDIDADE_CM|number_format:4:",":"."}"  />
                                                </div>
                                            </div>
                                        </div>

                                        <hr />

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3">Data Inicial Lan&ccedil;amento</label>
                                                    <input class="span3 datepicker" id="dataInicialLancamentoProduto" type="text" name="dataInicialLancamentoProduto" value="{$valueProduto.DATA_INICIAL_LANCAMENTO}"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3">Data Final Lan&ccedil;amento</label>
                                                    <input class="span3 datepicker" id="dataFinalLancamentoProduto" type="text" name="dataFinalLancamentoProduto" value="{$valueProduto.DATA_FINAL_LANCAMENTO}"/>
                                                </div>
                                            </div>
                                        </div>

                                        <hr />

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3">Descri&ccedil;&atilde;o Curta</label>
                                                    <div class="form-row">
                                                        <textarea   id="descricaoCurtaProduto" name="descricaoCurtaProduto" class="span8 limit" rows="3" >{$valueProduto.DESCRICAO_CURTA}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3">Descri&ccedil;&atilde;o Longa</label>
                                                    <div class="form-row">
                                                        <textarea   id="descricaoLongaProduto" name="descricaoLongaProduto" class="span8 limit" rows="5">{$valueProduto.DESCRICAO_LONGA}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="required">Video</label>
                                                    <input class="span8" id="videoProduto" name="videoProduto" type="text" value="{if $valueProduto.VIDEO}http://www.youtube.com/watch?v={$valueProduto.VIDEO}{/if}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="required"></label>
                                                    {if $valueProduto.VIDEO}
                                                    <iframe width="200" src="//www.youtube.com/embed/{$valueProduto.VIDEO}" frameborder="0" allowfullscreen></iframe>
                                                    {/if}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                           <button type="submit" class="btn btn-info">Salvar</button>
                                           <!--<button type="button" class="btn">Cancelar</button>-->
                                        </div>

                                    </form>
                                </div>
                                <div id="teste"></div>
                                <div class="tab-pane" id="tab2">

                                    <form class="form-horizontal" id="gravaPrecoProduto" action="{$ACTIONS_DIR}produto.php" method="post"/>

                                    <input type="hidden" value="gravaPrecoProduto" name="acao" id="acao">
                                    <input type="hidden" value="{$valueProduto.ID_PRODUTO}" name="idProdutoCorrente">


                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="required">Pre&ccedil;o Venda Atacado</label>
                                                    <input class="span3 mask-moeda-real" id="precoVendaProduto" type="text" name="precoVendaProduto" value="{$precoVenda|number_format:2:",":"."}" />
                                                </div>
                                            </div>
                                        </div>
                                        <input class="span3 mask-data datepicker" id="precoVendaProdutoDataInicialValidade" type="hidden" name="precoVendaProdutoDataInicialValidade" value="{$dataAtual}"/>
                                        <!-- <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="required">Data Inicial Validade</label>
                                                    <input class="span3 mask-data datepicker" id="precoVendaProdutoDataInicialValidade" type="text" name="precoVendaProdutoDataInicialValidade" value="{$precoVendaDataInicial}"/>
                                                </div>
                                            </div>
                                        </div> -->

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="required">Markup</label>
                                                    <input class="span1 mask-moeda-real" id="precoVendaMarkup" type="text" name="precoVendaMarkup" value="{$precoVendaMarkup}"/>
                                                    *Markup Geral R$ {$markup|number_format:2:",":"."}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="required">Pre&ccedil;o Venda Varejo</label>
                                                    <input class="span3 mask-moeda-real" id="precoVendaProdutoVarejo" readonly type="text" name="precoVendaProdutoVarejo" value="{($precoVenda*$markup)|number_format:2:",":"."}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="required">Pre&ccedil;o Promocional Atacado</label>
                                                    <input class="span3 mask-moeda-real" id="precoPromocionalProduto" type="text" name="precoPromocionalProduto" value="{$precoPromocional|number_format:2:",":"."}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="required">Pre&ccedil;o Promocional Varejo</label>
                                                    <input class="span3 mask-moeda-real" id="precoPromocionalProdutoVarejo" readonly type="text" name="precoPromocionalProdutoVarejo" value="{($precoPromocional*$markup)|number_format:2:",":"."}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="required">Data Inicial Validade</label>
                                                    <input class="span3 mask-data datepicker" id="precoPromocionalProdutoDataInicialValidade" type="text" name="precoPromocionalProdutoDataInicialValidade" value="{$precoPromocionalDataInicial}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="required">Data Final Validade</label>
                                                    <input class="span3 mask-data datepicker" id="precoPromocionalProdutoDataFinalValidade" type="text" name="precoPromocionalProdutoDataFinalValidade" value="{$precoPromocionalDataFinal}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="form-actions">
                                       <button type="submit" class="btn btn-info">Salvar</button>
                                       <!--<button type="button" class="btn">Cancelar</button>-->
                                    </div>

                                    </form>

                                        <table class="responsive table table-condensed">
                                            <thead>
                                              <tr>
                                                <th></th>
                                                <th>Valor Atacado R$</th>
                                                <th>Markup</th>
                                                <th>Valor Varejo R$</th>
                                                <th>Data Inicial Validade</th>
                                                <th>Data Final Validade</th>
                                                <th>Data Inserido</th>
                                                <th>A&ccedil;&otilde;es</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              {foreach $produtoPrecoTodos as $valueProdutoPrecoTodos}
                                              <tr id="tr{$valueProdutoPrecoTodos.ID_PRODUTO_PRECO_VENDA}">
                                                <td>{$valueProdutoPrecoTodos.DESCRICAO}</td>
                                                <td>{$valueProdutoPrecoTodos.VALOR|number_format:2:",":"."}</td>
                                                <td>{$valueProdutoPrecoTodos.MARKUP_GERAL|number_format:2:",":"."}</td>
                                                <td>{($valueProdutoPrecoTodos.VALOR*$valueProdutoPrecoTodos.MARKUP_GERAL)|number_format:2:",":"."}</td>
                                                <td>{$valueProdutoPrecoTodos.DATA_INICIAL_VALIDADE}</td>
                                                <td>{$valueProdutoPrecoTodos.DATA_FINAL_VALIDADE}</td>
                                                 <td>{$valueProdutoPrecoTodos.DATA_INSERT}</td>
                                                <td>
                                                    {if $valueProdutoPrecoTodos.DATA_INSERT eq $dataAtual}
                                                    <a href="javascript:removeProdutoPreco({$valueProdutoPrecoTodos.ID_PRODUTO_PRECO_VENDA});" title="Remover" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
                                                    {/if}
                                                </td>
                                              </tr>
                                              {/foreach}
                                            </tbody>
                                        </table>

                                    

                                </div>
                                
                                <div class="tab-pane" id="tab3">
                                    
                                    <form class="form-horizontal" id="gravaMetaProduto" action="{$ACTIONS_DIR}produto.php" method="post"/>

                                        <input type="hidden" value="editaMetaProduto" name="acao" id="acao">

                                        <input type="hidden" value="{$valueProduto.ID_PRODUTO}" id="idProduto" name="idProduto">

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3">Meta title</label>
                                                    <input class="span8" id="metaTitleProduto" type="text" name="metaTitleProduto" maxlength="70" value="{$valueProduto.META_TITLE}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3">Meta description</label>
                                                    <textarea   id="metaDescriptionProduto" name="metaDescriptionProduto" class="span8 limit" rows="2" >{$valueProduto.META_DESCRIPTION}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3">Meta keywords</label>
                                                    <input class="span8" id="metaKeywordsProduto" type="text" name="metaKeywordsProduto" maxlength="200" value="{$valueProduto.META_KEYWORDS}" />
                                                </div>
                                            </div>
                                        </div>
                                        <!--<div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3">URL Amig&aacute;vel</label>
                                                    <input class="span8" id="urlAmigavelProduto" type="text" name="urlAmigavelProduto" maxlength="100" value="{$valueProduto.URL_AMIGAVEL}" />
                                                </div>
                                            </div>
                                        </div>-->
                                        <!--<div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3">Tags</label>
                                                    <input class="span8" id="tagsProduto" type="text" name="tagsProduto" maxlength="100" />
                                                </div>
                                            </div>
                                        </div>-->
                                        <div class="form-actions">
                                           <button type="submit" class="btn btn-info">Salvar</button>
                                           <!--<button type="button" class="btn">Cancelar</button>-->
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane" id="tab4">
                                    <form class="form-horizontal" id="gravaCategoriaProduto" action="{$ACTIONS_DIR}produto.php" method="post"/>

                                    <input type="hidden" value="editarCategoriaProduto" name="acao" id="acao">
                                    
                                    <input type="hidden" value="{$valueProduto.ID_PRODUTO}" id="idProduto" name="idProduto">
                                    
                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                
                                               {$listaCategoria}
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                       <button type="submit" class="btn btn-info">Salvar</button>
                                       <!--<button type="button" class="btn">Cancelar</button>-->
                                    </div>
                                    </form>
                                    
                                </div>

                                <div class="tab-pane" id="tab5">
                                    
                                    <form class="form-horizontal" id="gravaCombinacaoProduto" action="{$ACTIONS_DIR}produto.php" method="post"/>

                                        <input type="hidden" value="gravaCombinacaoProduto" name="acao" id="acao">
                                        <input type="hidden" value="{$valueProduto.ID_PRODUTO}" name="idProdutoCorrente">

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <div class="span8 controls">   
                                                        <select id="atributos" style="width:300px; height:{count($listaAtributoProduto)*20}px;" name="atributos[]" class="nostyle" multiple="multiple">
                                                            {foreach $listaAtributo as $valorListaAtributo}
                                                               <optgroup label="{$valorListaAtributo.DESCRICAO_ATRIBUTO}">
                                                                    {foreach $listaAtributoProduto as $valorlistaAtributoProduto}
                                                                        {if $valorlistaAtributoProduto.ATRI_ID_ATRIBUTO eq $valorListaAtributo.ID_ATRIBUTO}
                                                                        <option value="{$valorListaAtributo.ID_ATRIBUTO}.{$valorlistaAtributoProduto.ID_ATRIBUTO_VALOR}">{$valorlistaAtributoProduto.VALOR}</option>
                                                                        {/if}
                                                                    {/foreach}
                                                               </option>
                                                            {/foreach} 
                                                        </select>
                                                    </div> 
                                                </div>
                                            </div> 
                                        </div>

                                        <div class="form-actions">
                                           <button type="submit" class="btn btn-info">Salvar</button>
                                           <!--<button type="button" class="btn">Cancelar</button>-->
                                        </div>
                                        
                                    </form>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <table class="responsive table">
                                                <thead>
                                                  <tr>
                                                    <th>Combina&ccedil;&atilde;o</th>
                                                    <th class="span4">Refer&ecirc;ncia</th>
                                                    <th class="span4">Pre&ccedil;o Produto</th>
                                                    <!-- <th>Principal</th> -->
                                                    <th style="width: 50px;">A&ccedil;&otilde;es</th>
                                                  </tr>
                                                </thead>
                                                {foreach $listaCombinacao1 as $key1 => $valueCombinacao1}
                                                <tbody>
                                                  <tr>
                                                    <td>
                                                        {$count=count($listaCombinacao2.$key1)}
                                                        {foreach $listaCombinacao2.$key1 as $valueCombinacao2}
                                                            {$valueCombinacao2}
                                                            {if $valueCombinacao2@iteration neq $count}
                                                            /
                                                            {/if}
                                                        {/foreach}   
                                                    </td>
                                                    <td><input class="span6" type="text" name="refeCombinacao{$valueCombinacao1.CODIGO_UNICO}" id="refeCombinacao{$valueCombinacao1.CODIGO_UNICO}" value="{$valueCombinacao1.REFERENCIA}"></td>
                                                    <td><input class="span6 mask-moeda-real" type="text" name="precoCombinacao{$valueCombinacao1.CODIGO_UNICO}" id="precoCombinacao{$valueCombinacao1.CODIGO_UNICO}" value="{$valueCombinacao1.PRECO_VENDA|number_format:2:",":"."}"></td>
                                                    <!-- <td><input type="radio" name="produtoPrincipal" id="produtoPrincipal{$valueCombinacao1.CODIGO_UNICO}" value="{$valueCombinacao1.CODIGO_UNICO}" {if $valueCombinacao1.PRODUTO_PRINCIPAL eq 'S'}checked="checked"{/if}></td> -->
                                                    <td>
                                                        <a class="tip" href="javascript: editaCombinacao('{$valueCombinacao1.CODIGO_UNICO}');" oldtitle="editar" title="editar" aria-describedby="ui-tooltip-13">
                                                            <span class="icon12 icomoon-icon-pencil "></span>
                                                        </a>
                                                        <a class="tip" href="javascript: removeCombinacao('{$valueCombinacao1.CODIGO_UNICO}');" oldtitle="excluir" title="excluir" aria-describedby="ui-tooltip-13">
                                                            <span class="icon12 icon-remove"></span>
                                                        </a>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                                {/foreach}
                                            </table>
                                        </div> 
                                    </div>


                                </div>

                                <div class="tab-pane" id="tab6">

                                    <form class="form-horizontal" id="gravaEstoqueProduto" action="{$ACTIONS_DIR}produto.php" method="post"/>

                                        <input type="hidden" value="editarEstoqueProduto" name="acao" id="acao">
                                        
                                        <input type="hidden" value="{$valueProduto.ID_PRODUTO}" id="idProduto" name="idProduto">

                                        <div class="form-row row-fluid">
                                            <div class="span9">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="normal">Opera&ccedil;&atilde;o Dep&oacute;sito</label>
                                                    <div class="span4 controls">
                                                       <select name="operacaoDeposito" id="operacaoDeposito">
                                                            <option value="" selected="selected">-Selecione-</option>
                                                            {foreach $listaOperacaoDeposito as $valorOperacaoDeposito}
                                                                <option value="{$valorOperacaoDeposito.ID}">{$valorOperacaoDeposito.DESCRICAO}</option>
                                                            {/foreach}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span9">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="normal">Dep&oacute;sito</label>
                                                    <div class="span4 controls">
                                                        <select name="deposito" id="deposito" >
                                                            <option value="" selected="selected">-Selecione-</option>
                                                            {foreach $listaDeposito as $valorDeposito}
                                                                <option value="{$valorDeposito.ID}">{$valorDeposito.DESCRICAO}</option>
                                                            {/foreach}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <br>
                                            
                                         <div class="row-fluid">

                                            <div class="span12">
                                                
                                                <table class="responsive table">
                                                    <thead>
                                                      <tr>
                                                        <th>Imagem</th>
                                                        <th>Atributo</th>
                                                        <th>Refer&ecirc;ncia</th>
                                                        <th>Saldo</th>
                                                        <th>Quantidade</th>
                                                        <!--<th style="width:10	px;">A&ccedil;&otilde;es</th>-->
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      {foreach $listaEstoqueProduto as $key => $valorListaEstoqueProduto}
                                                      <tr>
                                                        <td>
                                                            {foreach $listaImagemEstoque.$key as $imagem => $ordem}
                                                            <img src="{$urlImagem}{if $imagem}{$imagem}{else}SEM_IMAGEM.JPG{/if}" class="img-polaroid" />
                                                            {break}
                                                            {/foreach}
                                                        </td>
                                                        <td>{$codigoUnico = $valorListaEstoqueProduto.ID_PRODUTO_COMBINACAO}
                                                            {$count = count($listaCombinacao2.$codigoUnico)}
                                                            {foreach $listaCombinacao2.$codigoUnico as $valueCombinacao2}
                                                                {$valueCombinacao2}
                                                                {if $valueCombinacao2@iteration neq $count}
                                                                /
                                                                {/if}
                                                            {/foreach}
                                                        </td>
                                                        <td>{$valorListaEstoqueProduto.REFERENCIA}</td>
                                                        <td>{$valorListaEstoqueProduto.SALDO}</td>
                                                        <td>
                                                            <input id="quantidadeEstoque" name="quantidadeEstoque[{$valorListaEstoqueProduto.ID_PRODUTO_COMBINACAO}]" type="text" class="span3">
                                                        </td>
                                                       <!-- <td>
                                                            
                                                                <a class="tip" href="#" oldtitle="salvar este" title="salvar este" aria-describedby="ui-tooltip-13">
                                                                    <span class="icon12 icomoon-icon-pencil"></span>
                                                                </a>
                                                                                                                                
                                                            
                                                        </td>-->
                                                      </tr>
                                                      
                                                      {/foreach}
                                                    </tbody>

                                                </table>

                                            </div><!-- End .span6 -->   

                                        </div>

                                        <div class="form-actions">
                                           <button type="submit" class="btn btn-info">Salvar</button>
                                           <!--<button type="button" class="btn">Cancelar</button>-->
                                        </div>

                                    </form>

                            </div>
                            
                            <div class="tab-pane" id="tab7">
                                    
                                    <form class="form-horizontal" id="gravaProdutoTipoFrete" action="{$ACTIONS_DIR}produto.php" method="post"/>

                                        <input type="hidden" value="editaProdutoTipoFrete" name="acao" id="acao">

                                        <input type="hidden" value="{$valueProduto.ID_PRODUTO}" id="idProduto" name="idProduto">

                                        <div class="form-row row-fluid">
                                            <div class="span6">
                                                <div class="row-fluid">
                                                <table class="responsive table">
					                                <thead>
					                                  <tr>
					                                    <th>#</th>
					                                    <th>Tipo Frete</th>
					                                    <th>Ativo</th>
					                                  </tr>
					                                </thead>
					                                <tbody>
					                                 	{foreach $listaTipoFrete as $valorTipoFrete}
					                                 	<tr>
                                                            {if $valorTipoFrete.PROD_ID_PRODUTO}
                                                            	<td>{$valorTipoFrete.ID_TIPO_FRETE}</td>
                                                            	<td>{$valorTipoFrete.DESCRICAO_FRETE}</td>
                                                            	<td><input type="checkbox" name="tipoFrete[]" checked="checked" value="{$valorTipoFrete.ID_TIPO_FRETE}" /></td>
                                                            {else}
                                                            	<td>{$valorTipoFrete.ID_TIPO_FRETE}</td>
                                                            	<td>{$valorTipoFrete.DESCRICAO_FRETE}</td>
                                                            	<td><input type="checkbox" name="tipoFrete[]" value="{$valorTipoFrete.ID_TIPO_FRETE}" /></td>
                                                            {/if}
                                                            </tr>
                                                        {/foreach} 
					                                </tbody>
					                            </table>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-actions">
                                           <button type="submit" class="btn btn-info">Salvar</button>
                                           <!--<button type="button" class="btn">Cancelar</button>-->
                                        </div>
                                    </form>
                                </div>



                                <div class="tab-pane" id="tab8">
                                    
                                    <div class="row-fluid">

                                        <div class="span12">

                                            <form action="actions/upload.php" id="uploadImagem" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="acao" value="uploadImagem">
                                                <div class="form-row row-fluid">
                                                    <div class="span9">
                                                        <div class="row-fluid">
                                                            <label class="form-label span3" for="normal">Combina&ccedil;&atilde;o</label>
                                                            <div class="span8 controls">   
                                                                <select name="combinacaoImagem[]" class="nostyle" multiple="multiple" style="width:300px; height:{count($listaCombinacao1)*20}px;">
                                                                    {foreach $listaCombinacao1 as $key1 => $valueCombinacao1}
                                                                    <option value="{$key1}">
                                                                        {$count=count($listaCombinacao2.$key1)}
                                                                        {foreach $listaCombinacao2.$key1 as $valueCombinacao2}
                                                                            {$valueCombinacao2}
                                                                            {if $valueCombinacao2@iteration neq $count}
                                                                            /
                                                                            {/if}
                                                                        {/foreach}   
                                                                    </option>    
                                                                {/foreach}
                                                                </select>
                                                            </div> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row row-fluid">
                                                    <div class="span9">
                                                        <div class="row-fluid">
                                                            <label class="form-label span3" for="normal">Imagens</label>
                                                            <input type="file" name="myfile[]" multiple>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- <div class="progress">
                                                    <div class="bar"></div>
                                                    <div class="percent"></div>
                                                </div>
                                                -->
                                                <div id="status"></div> 
                                                
                                                
                                                <div class="form-actions">
                                                   <button type="submit" class="btn btn-info">Salvar</button>
                                                   <!--<button type="button" class="btn">Cancelar</button>-->
                                                </div>
                                            </form>

                                            <div class="row-fluid">

                                                    <div class="span12">
                                                        <span class="right">Deixe 0 (zero) na imagem que deve ser a principal</span>
                                                        <table class="responsive table">
                                                            <thead>
                                                              <tr>
                                                                <th>Atributo</th>
                                                                <th>Refer&ecirc;ncia</th>
                                                                <th>Imagem</th>
                                                                <th>A&ccedil;&atilde;o</th>
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                              {foreach $listaEstoqueProduto as $key => $valorListaEstoqueProduto}
                                                              <tr>
                                                                <td>{$codigoUnico = $valorListaEstoqueProduto.ID_PRODUTO_COMBINACAO}
                                                                    {$count = count($listaCombinacao2.$codigoUnico)}
                                                                    {foreach $listaCombinacao2.$codigoUnico as $valueCombinacao2}
                                                                        {$valueCombinacao2}
                                                                        {if $valueCombinacao2@iteration neq $count}
                                                                        /
                                                                        {/if}
                                                                    {/foreach}
                                                                </td>
                                                                <td>{$valorListaEstoqueProduto.REFERENCIA}</td>
                                                                <td>
                                                                    <table class="sem-estilo" cellpadding="0" cellspacing="0">
                                                                        <tr>
                                                                            {foreach $listaImagemEstoque.$key as $imagem => $ordem}
                                                                            <td><img src="{$urlImagem}{if $imagem}{$imagem}{else}SEM_IMAGEM.JPG{/if}" class="img-polaroid" /></td>
                                                                            {/foreach}
                                                                        </tr>
                                                                        <tr>
                                                                            {foreach $listaImagemEstoque.$key as $imagem => $ordem}
                                                                            <td>
                                                                                <input type="text" class="span4 center ordenaImagem" maxlength="2" name="ordemImagem{$codigoUnico}" id="{$imagem}" value="{$ordem}">
                                                                            </td>
                                                                            {/foreach}
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                                <td>
                                                                    <button class="btn btn-info btn-mini" onClick="javascript: fnOrdenaImagem({$codigoUnico});">Ordenar</button>
                                                                </td>
                                                                
                                                              {/foreach}
                                                            </tbody>

                                                        </table>
                                                        

                                                    </div><!-- End .span6 -->   

                                                </div>

                                                <hr>

                                            <!-- <form action="actions/produto.php" id="uploadArquivo" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="acao" value="uploadArquivo">
                                                <input type="hidden" value="{$valueProduto.ID_PRODUTO}" name="idProdutoCorrente">
                                                <div class="form-row row-fluid">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span3" for="required">Manual</label>
                                                            <input class="span8" name="arquivoDownload" type="file" />
                                                        </div>
                                                    </div>
                                                </div>
                                                {if $valueProduto.ARQUIVO_DOWNLOAD}
                                                <div class="form-row row-fluid {$valueProduto.ID_PRODUTO}">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span3" for="required"></label>
                                                            <a href="../manuais/{$valueProduto.ARQUIVO_DOWNLOAD}" title="Download" class="tip"><span>{$valueProduto.ARQUIVO_DOWNLOAD}</span></a> <a href="javascript:excluirArquivoDownload({$valueProduto.ID_PRODUTO});" title="Excluir" class="tip"><span class="icon12 icon-remove"></span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                {/if}
                                                
                                                <div class="form-actions">
                                                   <button type="submit" class="btn btn-info">Salvar</button>
                                                   
                                                </div>
                                            </form> -->


                                        </div><!-- End .span12 -->

                                    </div><!-- End .row-fluid -->
                                                    
                                </div>


                                <div class="tab-pane" id="tab9">

                                    <div class="row-fluid">

                                        <div class="span12">
                                            
                                            <div class="box">

                                                <div class="title">

                                                    <h4>
                                                        <!-- <span class="icon16 brocco-icon-grid"></span> -->
                                                        <span>Compre Junto</span>
                                                        <form class="box-form right" action="" />
                                                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                                                <span class="icon16 iconic-icon-cog"></span>
                                                                <span class="caret"></span>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a href="compre-junto-cadastra">
                                                                        <span class="icon-pencil"></span> Novo
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </form>
                                                       
                                                    </h4>
                                                    <!-- <a href="#" class="minimize">Minimize</a> -->
                                                </div>
                                                <div class="content noPad">
                                                    <table class="responsive table table-bordered" id="checkAll">
                                                        <thead>
                                                          <tr>
                                                            <th>#</th>
                                                            <th>Descri&ccedil;&atilde;o</th>
                                                            <th>Desconto</th>
                                                            <th>Ativo</th>
                                                            <th>A&ccedil;&otilde;es</th>
                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                                          {foreach $listaProdutoCompreJunto as $valueListaCompreJunto}
                                                          <tr id="tr{$valueListaCompreJunto.ID_PRODUTO_COMPRE_JUNTO}">
                                                            <td>{$valueListaCompreJunto.ID_PRODUTO_COMPRE_JUNTO}</td>
                                                            <td>{$valueListaCompreJunto.DESCRICAO}</td>
                                                            <td>
                                                                {if $valueListaCompreJunto.TIPO_DESCONTO eq 'P'}
                                                                    {$valueListaCompreJunto.VALOR_DESCONTO|number_format}%
                                                                {else if $valueListaCompreJunto.TIPO_DESCONTO eq 'V'}
                                                                    R$ {$valueListaCompreJunto.VALOR_DESCONTO|number_format:2:",":"."}
                                                                {/if}
                                                            </td>
                                                            <td>
                                                                {if $valueListaCompreJunto.ATIVO eq 'S'}
                                                                    <span class="icon-ok"></span>
                                                                {else}
                                                                    <span class="icon-remove"></span>
                                                                {/if}
                                                            </td>
                                                            <td>
                                                                <div class="controls center">
                                                                    <a href="compre-junto-cadastra?idCompreJunto={$valueListaCompreJunto.ID_PRODUTO_COMPRE_JUNTO}" title="Editar" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                                                    <a href="javascript:fnExcluirCompreJunto({$valueListaCompreJunto.ID_PRODUTO_COMPRE_JUNTO});" title="Excluir" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
                                                                </div>
                                                            </td>
                                                          </tr>
                                                          {/foreach}
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div><!-- End .box -->

                                        </div><!-- End .span6 -->       

                                    </div>                            

                                </div><!-- End tab9 -->
                                
                        </div>
                    </div>
                </div><!-- End .span12 -->    
            </div>
               
    			<!-- Page end here -->
    				
               
            </div><!-- End contentwrapper -->
        </div><!-- End #content -->
    
    </div><!-- End #wrapper -->


