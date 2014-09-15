<div id="wrapper">

    {include file="sidebar.tpl"}

    <!--Body content-->
    <div id="content" class="clearfix">
        <div class="contentwrapper"><!--Content wrapper-->

            {include file="heading.tpl"}

            <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

                
            <div class="row-fluid">

                <div class="span6">

                    <div class="box" id="dadosListaCasamento">

                        <div class="title">

                            <h4>
                                <span class="icon16 brocco-icon-grid"></span>
                                <span>Dados do Casamento</span>
                            </h4>
                            
                        </div>
                        <div class="content">
                           
                            
                            <form class="form-horizontal" id="cadastrarDadosListaCasamento" action="{$ACTIONS_DIR}lista_casamento.php" method="post"/>

                            {if !isset($idListaCasamento)}    
                                <input type="hidden" name="acao" value="cadastrarDadosListaCasamento">
                            {else}
                                <input type="hidden" name="acao" value="editarDadosListaCasamento">
                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">ID Lista de Casamento</label>
                                            <input class="span2" id="idListaCasamento" type="text" name="idListaCasamento" readonly value="{$idListaCasamento}" />
                                        </div>
                                    </div>
                                </div>
                            {/if}


                                
                                                                
                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="normal">Ativo</label>
                                                {if $ativo eq 'S'}
                                                <input type="checkbox" name="listaCasamentoAtivo" value="S" checked="checked">
                                                {else}
                                                <input type="checkbox" name="listaCasamentoAtivo" value="S">
                                                {/if}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="normal">Despachado</label>
                                                {if $despachado eq 'S'}
                                                <input type="checkbox" name="listaCasamentoDespachado" value="S" checked="checked">
                                                {else}
                                                <input type="checkbox" name="listaCasamentoDespachado" value="S">
                                                {/if}
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">Nome C&ocirc;njuge 1</label>
                                            <input class="span8" id="nomeConjuge1" type="text" name="nomeConjuge1" required="required" value="{$nomeConjuge1}" />
                                        </div>
                                    </div>
                                </div>

                                 <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">E-mail C&ocirc;njuge 1</label>
                                            <input class="span8" id="emailConjuge1" name="emailConjuge1" type="text" required="required" value="{$emailConjuge1}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">M&atilde;e C&ocirc;njuge 1</label>
                                            <input class="span8" id="maeConjuge1" type="text" name="maeConjuge1" required="required" value="{$nomeMaeConjuge1}"/>
                                        </div>
                                    </div>
                                </div>

                               

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">Pai C&ocirc;njuge 1</label>
                                            <input class="span8" id="paiConjuge1" type="text" name="paiConjuge1" required="required" value="{$nomePaiConjuge1}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">Nome C&ocirc;njuge 2</label>
                                            <input class="span8" id="nomeConjuge2" type="text" name="nomeConjuge2" required="required" value="{$nomeConjuge2}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">E-mail C&ocirc;njuge 2</label>
                                            <input class="span8" id="emailConjuge2" name="emailConjuge2" type="text" required="required" value="{$emailConjuge2}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">M&atilde;e C&ocirc;njuge 2</label>
                                            <input class="span8" id="maeConjuge2" type="text" name="maeConjuge2" required="required" value="{$nomeMaeConjuge2}"/>
                                        </div>
                                    </div>
                                </div>

                                

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">Pai C&ocirc;njuge 2</label>
                                            <input class="span8" id="paiConjuge2" type="text" name="paiConjuge2" required="required" value="{$nomePaiConjuge2}"/>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="normal">Data da Entrega</label>
                                            <input class="span8 mask" id="mask-date" type="text" name="dataEvento" required="required" value="{$enderecoEntrega[0].DATA_EVENTO}"/>
                                            <span class="help-block blue span8">99/99/9999</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">Local da Cerim&ocirc;nia</label>
                                            <input class="span8" id="localCerimonia" type="text" name="localCerimonia" required="required" value="{$valorListaListaCasamento.LOCAL_CERIMONIA}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">Endere&ccedil;o da Cerim&ocirc;nia</label>
                                            <input class="span8" id="enderecoCerimonia" type="text" name="enderecoCerimonia" required="required" value="{$valorListaListaCasamento.ENDERECO_CERIMONIA}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">Hora da Cerim&ocirc;nia</label>
                                            <input class="span8 mask-hour" id="horaCerimonia" type="text" name="horaCerimonia" required="required" value="{$valorListaListaCasamento.HORA_CERIMONIA}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">Local da Festa</label>
                                            <input class="span8" id="localFesta" type="text" name="localFesta" required="required" value="{$valorListaListaCasamento.LOCAL_FESTA}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">Endere&ccedil;o da Festa</label>
                                            <input class="span8" id="enderecoFesta" type="text" name="enderecoFesta" required="required" value="{$valorListaListaCasamento.ENDERECO_FESTA}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">Hora da Festa</label>
                                            <input class="span8 mask-hour" id="horaFesta" type="text" name="horaFesta" required="required" value="{$valorListaListaCasamento.HORA_FESTA}"/>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">URL Amig&aacute;vel</label>
                                            <input onkeyup="this.value = Trim( this.value )" class="span8" id="urlAmigavel" type="text" name="urlAmigavel" required="required" value="{$url}"/>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="textarea">Foto de Capa</label>
                                            <input type="file" name="fotoCapa" id="fotoCapa" />
                                        </div>
                                    </div>  
                                </div> -->
                                
                                <div class="form-actions">
                                   <button type="submit" class="btn btn-info">Salvar</button>
                                   <!--<button type="button" class="btn">Cancelar</button>-->
                                </div>
                                <div id="teste"></div>
                                                                        
                            </form>
                         
                        </div>

                    </div><!-- End .box -->

                </div>

                <div class="span6">

                    <div class="box">

                        <div class="title">

                            <h4>
                                <span class="icon16 brocco-icon-grid"></span>
                                <span>Endere&ccedil;o de Entrega</span>
                            </h4>
                            
                        </div>
                        <div class="content">
                           
                            <form class="form-horizontal" id="cadastrarEnderecoListaCasamento" action="{$ACTIONS_DIR}lista_casamento.php" method="post"/>

                            {if !isset($idListaCasamento)}    
                                <input type="hidden" name="acao" value="cadastrarEnderecoListaCasamento">
                            {else}
                                <input type="hidden" name="acao" value="editarEnderecoListaCasamento">
                            {/if}

                                 <input class="span8" id="tipoEnderecoListaCasamento" type="hidden" name="tipoEnderecoListaCasamento" value="{$enderecoEntrega[0].TIPO_ENDERECO}"/>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">ID Lista de Casamento</label>
                                            <input class="span2" id="idListaCasamento" type="text" name="idListaCasamento" readonly value="{$idListaCasamento}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">Nome de Contato</label>
                                            <input class="span8" id="nomeContatoListaCasamento" type="text" name="nomeContatoListaCasamento" required="required" value="{$enderecoEntrega[0].NOME_CONTATO}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="normal">CEP</label>
                                            <input class="span5" id="cepEnderecoListaCasamento" type="text" name="cepEnderecoListaCasamento" required="required" value="{$enderecoEntrega[0].CEP_ID_CEP}"/>
                                            <span class="help-block blue span8">99999-999</span>
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">Endere&ccedil;o</label>
                                            <input class="span6" id="ruaEnderecoListaCasamento" type="text" name="ruaEnderecoListaCasamento" required="required" value="{$enderecoEntrega[0].ENDERECO}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="normal">N&uacute;mero</label>
                                            <input class="span3" id="numeroEnderecoListaCasamento" type="text" name="numeroEnderecoListaCasamento" required="required" value="{$enderecoEntrega[0].NUMERO}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="normal">Complemento</label>
                                            <input class="span8" id="complementoEnderecoListaCasamento" type="text" name="complementoEnderecoListaCasamento" value="{$enderecoEntrega[0].COMPLEMENTO}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="normal">Bairro</label>
                                            <input class="span8" id="bairroEnderecoListaCasamento" type="text" name="bairroEnderecoListaCasamento" required="required" value="{$enderecoEntrega[0].BAIRRO}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="normal">Cidade</label>
                                            <input class="span1" id="idMunicipioEnderecoListaCasamento" type="hidden" name="idMunicipioEnderecoListaCasamento" required="required" value="{$valorListaListaCasamento.MUNI_ID_MUNICIPIO}"/>
                                            <input class="span8" id="municipioEnderecoListaCasamento" type="text" name="municipioEnderecoListaCasamento" required="required" readonly="readonly" value="{$enderecoEntrega[0].MUNICIPIO}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="normal">Estado</label>
                                            <input class="span2" id="estadoEnderecoListaCasamento" type="text" name="estadoEnderecoListaCasamento" required="required" readonly="readonly" value="{$enderecoEntrega[0].ESTADO}"/>
                                        </div>
                                    </div>
                                </div>

                                <!--<div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="normal">Pa&iacute;s</label>
                                            <input class="span5" id="paisEnderecoListaCasamento" type="text" name="paisEnderecoListaCasamento" required="required" readonly="readonly"/>
                                        </div>
                                    </div>
                                </div>-->

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="normal">Refer&ecirc;ncia</label>
                                            <input class="span8" id="referenciaEnderecoListaCasamento" type="text" name="referenciaEnderecoListaCasamento" value="{$enderecoEntrega[0].REFERENCIA}"/>
                                        </div>
                                    </div>
                                </div>

                                <hr />

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="normal">Telefone Fixo</label>
                                            
                                            <input class="span5" id="telefoneFixoContatoListaCasamento" type="text" name="telefoneFixoContatoListaCasamento" required="required" maxlength="9" value="{$enderecoEntrega[0].TELEFONE_PRINCIPAL}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="normal">Telefone Celular</label>
                                            
                                            <input class="span5" id="telefoneCelularContatoListaCasamento" type="text" name="telefoneCelularContatoListaCasamento" maxlength="9" value="{$enderecoEntrega[0].CELULAR}"/>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-actions">
                                   <button type="submit" class="btn btn-info">Salvar</button>
                                   <!--<button type="button" class="btn">Cancelar</button>-->
                                </div>
                                <div id="teste"></div>
                                                                        
                            </form>
                         
                        </div>

                    </div><!-- End .box -->
                </div>
           
            </div>

            <div class="row-fluid">

                <div class="span12">

                    <div class="box gradient" id="produtoListaCasamento">

                        <div class="title">
                            <h4>
                                <span>Produtos da Lista de Casamento</span>
                                
                            </h4>
                        </div>
                        <div class="content noPad clearfix" id="tabelaListaProduto">

                            
                            
                            <form class="form-horizontal" id="cadastrarProdutoListaCasamento" action="{$ACTIONS_DIR}lista_casamento.php" method="post"/>

                            {if !isset($idListaCasamento)}    
                                <input type="hidden" name="acao" value="cadastrarProdutoListaCasamento">
                            {else}
                                <input type="hidden" name="acao" value="editarProdutoListaCasamento">
                            {/if}

                            
                            <input class="span2" id="idListaCasamento" type="text" name="idListaCasamento" readonly value="{$idListaCasamento}"/>

                            <table cellpadding="0" cellspacing="0" border="0" class="responsive dynamicTableListaCasamento display table table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>#</th>
                                        <th>Descri&ccedil;&atilde;o Venda</th>
                                        <th>Refer&ecirc;ncia</th>
                                        <th>Ativo</th>
                                        <th>Pedido</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {foreach $listaProduto as $valorProduto}
                                    <tr class="odd gradeX" id="{$valorProduto.ID_PRODUTO}">
                                        <td>{$valorProduto.ID_LISTA_CASA_PROD_ORDEM}</td>
                                        <td>{$valorProduto.ID_PRODUTO}</td>
                                        <td>{$valorProduto.DESCRICAO_VENDA}</td>
                                        <td>{$valorProduto.REFERENCIA}</td>
                                        <td class="center">
                                            {if isset($valorProduto.ID_LISTA_CASAMENTO_PRODUTO) and $valorProduto.ATIVO eq 'S'}
                                            <input type="checkbox" value="{$valorProduto.ID_PRODUTO}" name="idProdutoListaCasamento" checked="checked">
                                            {else}
                                            <input type="checkbox" value="{$valorProduto.ID_PRODUTO}" name="idProdutoListaCasamento">
                                            {/if}
                                        </td>
                                        <td>
                                            {if $valorProduto.ID_LISTA_CASAMENTO_PRODUTO}
                                            {foreach $listaCasamentoPedido as $valueListaCasamentoPedido}
                                                {foreach $valueListaCasamentoPedido as $value}
                                                {$value|print_r}
                                                    <a href="pedido-visualiza&idPedido={$valorProduto.ID_PEDIDO}">{$value.NUMERO_PEDIDO}</a>
                                                {/foreach}
                                            {/foreach}
                                            {/if}
                                        </td>
                                        
                                    </tr>
                                    {/foreach}
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="7">
                                            <div class="form-actions">
                                               <button type="submit" class="btn btn-info">Salvar</button>
                                               <!--<button type="button" class="btn">Cancelar</button>-->
                                            </div>
                                            <div id="teste"></div>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </form>

                        </div>

                    </div><!-- End .box -->



                </div><!-- End .span12 -->

            </div><!-- End .row-fluid -->

           
            <!-- Page end here -->
                
           
        </div><!-- End contentwrapper -->
    </div><!-- End #content -->

</div><!-- End #wrapper -->

   

