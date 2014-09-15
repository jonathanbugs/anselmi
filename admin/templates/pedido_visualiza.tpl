    <div id="wrapper">

        {include file="sidebar.tpl"}

        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                {include file="heading.tpl"}

                <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

                <!--cadastro de pessoa-->
                    <div class="row-fluid">

                        <div class="span6">

                            <div class="box">
                                
                                <div class="title">
                                    <h4>
                                        <span>Pedido</span>

                                        <!--<form class="box-form right" action="">
                                            <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown">
                                                <span class="icon16 iconic-icon-cog"></span>
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="javascript: iconeEditar('DadosPessoa');">
                                                        <span class="icon-pencil"></span> Editar
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript: enviarNovaSenha({$idPessoa});">
                                                        <span class="icon-envelope"></span> Reenviar Senha
                                                    </a>
                                                </li>
                                            </ul>
                                        </form>-->
                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                <div class="content">

                                    

                                    <dl class="dl-horizontal" id="dlEditaPedido">
                                        {foreach $visualizaPedido as $valorPedido}

                                        <div class="clearfix">

                                           
                                            <div class="print">
                                                <a href="{$urlAtual}/emails/imprime-pedido.php?idPedido={$valorPedido.ID_PEDIDO}" class="tip" title="Imprimir Pedido" onClick="window.open(this.href, this.target); return false;" target="_blank"><span class="icon24 entypo-icon-printer"></span></a>
                                            </div>
                                           

                                        </div>
                                            <form class="form-horizontal" id="editarPedido" action="{$ACTIONS_DIR}pedido.php" method="post">
                                        
                                                <input type="hidden" name="acao" value="editarPedido">
                                                <input type="hidden" name="idPedido" id="idPedido" value="{$valorPedido.ID_PEDIDO}">
                                                
                                                <div class="form-row row-fluid">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4">Nro Pedido</label>
                                                            <div class="valor-label">{$valorPedido.NUMERO_PEDIDO}</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">Data Emiss&atilde;o</label>
                                                            <div class="valor-label">{$valorPedido.DATA_EMISSAO}</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">Cliente</label>
                                                            <div class="valor-label">{$valorPedido.NOME} {$valorPedido.SOBRENOME}<a href="pessoa-visualiza&idPessoa={$valorPedido.ID_PESSOA}"><span class="icon-circle-arrow-right"></span></a></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">Email Cliente</label>
                                                            <div class="valor-label">{$valorPedido.EMAIL}</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">Telefones Cliente</label>
                                                            <div class="valor-label">{$valorPedido.TELEFONE1|mascara_telefone}<br>
                                                            <div class="valor-label">{$valorPedido.CELULAR|mascara_telefone}<br>
                                                            <div class="valor-label">{$valorPedido.TELEFONE2|mascara_telefone}</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="required">Cupom</label>
                                                            <div class="span8 controls">
                                                                <select name="cupomPromocional" id="cupomPromocional">
    	                                                            <option value="0">Sem Cupom</option>
    	                                                            {foreach $listaCupomPromocional as $valorCupomPromocional}
    		                                                            {if $valorPedido.PRCA_ID_PROMOCAO_CARRINHO eq $valorCupomPromocional.ID_PROMOCAO_CARRINHO}
    		                                                            	<option selected="selected" value="{$valorCupomPromocional.ID_PROMOCAO_CARRINHO}">{$valorCupomPromocional.CUPOM_PROMOCIONAL} | {$valorCupomPromocional.VALOR_DESCONTO|number_format:2:",":"."} | {$valorCupomPromocional.TIPO_DESCONTO}</option>
    		                                                            {else}
    		                                                            	<option value="{$valorCupomPromocional.ID_PROMOCAO_CARRINHO}">{$valorCupomPromocional.CUPOM_PROMOCIONAL} | {$valorCupomPromocional.VALOR_DESCONTO|number_format:2:",":"."} | {$valorCupomPromocional.TIPO_DESCONTO}</option>
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
                                                            <label class="form-label span4" for="required">Tipo Frete</label>
                                                            <div class="span8 controls">
                                                                <select name="tipoFrete" id="tipoFrete">
                                                                {foreach $listaTipoFrete as $valorTipoFrete}
                                                                	{if $valorTipoFrete.ID_TIPO_FRETE eq $valorPedido.TIFR_ID_TIPO_FRETE}
                                                                            <option selected="selected" value="{$valorTipoFrete.ID_TIPO_FRETE}">{$valorTipoFrete.ID_TIPO_FRETE} - {$valorTipoFrete.DESCRICAO_FRETE}</option>
                                                                        {else}
                                                                            <option value="{$valorTipoFrete.ID_TIPO_FRETE}">{$valorTipoFrete.ID_TIPO_FRETE} - {$valorTipoFrete.DESCRICAO_FRETE}</option>
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
                                                            <label class="form-label span4" for="normal">Valor Frete</label>
                                                            <input class="span3 mask-moeda-real" type="text" value="{$valorPedido.VALOR_FRETE|number_format:2:",":"."}" id="valorFrete" name="valorFrete" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">Frete Gr&aacute;tis</label>
                                                                <div class="valor-label">
                                                                {if $valorPedido.FRETE_GRATIS eq 'N'}
                                                                    <input type="checkbox" id="freteGratis" name="freteGratis">
                                                                {else}
                                                                    <input type="checkbox" checked="checked" id="freteGratis" name="freteGratis">
                                                                {/if}
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="required">Situa&ccedil;&atilde;o Pedido</label>
                                                            <div class="valor-label">{$valorPedido.DESCRICAO_PEDIDO_ITEM_SITUACAO}</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- <div class="form-actions">
                                                   <button type="submit" class="btn btn-info">Salvar</button>
                                                   <button type="button" class="btn btn-danger" onclick="javascript: btnCancelaEditar('DadosPessoa');">Cancelar</button>
                                                </div> -->
                                                                                                                                        
                                            </form>
                                            
                                        {/foreach}

                                        
                                    </dl>

                                </div>
                            </div>

                        </div><!-- End .span4 -->

                        {if $idListaCasamento}    
                        <div class="span6">

                            <div class="box">
                                <div class="title">
                                    <h4>
                                        <span>Lista Casamento</span>

                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                            
                                <div class="content">
                                
                                    <dl class="dl-horizontal" id="divEndereco">
                                        <dt>Lista de Casamento:</dt>
                                        <dd>{$idListaCasamento} <a href="lista-casamento-cadastra&idListaCasamento={$idListaCasamento}"><span class="icon-circle-arrow-right"></span></a></dd>
                                        <dt>Casal:</dt>
                                        <dd>{$casalListaCasamento}</dd>
                                        <dt>Mensagem:</dt>
                                        <dd>{$mensagemListaCasamento}</dd>
                                    </dl>
                                </div>
                            </div>
                                                 
                        </div>
                        {/if}

                        <div class="span6">

                            <div class="box">
                                <div class="title">
                                    <h4>
                                        <span>Endere&ccedil;o Pedido</span>

                                        <form class="box-form right" action="">
                                            <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown">
                                                <span class="icon16 iconic-icon-cog"></span>
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="javascript:void(0);" id="novo-pedido-endereco">
                                                        <span class="icon-file"></span> Novo
                                                    </a>
                                                </li>
                                            </ul>
                                        </form>
                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                
                                
                                
                                <div class="content">
                                
                                	<dl class="dl-horizontal" id="divEndereco">
                                        <dt>Endere&ccedil;o:</dt>
                                        {foreach $listaPedidoEndereco as $valorPedidoEndereco}
                                            <dd>
                                                <p><strong>{$valorPedidoEndereco.APELIDO}</strong></p>
                                                {if $valorPedidoEndereco.APELIDO_ENDERECO neq ""}
                                                	{$valorPedidoEndereco.APELIDO_ENDERECO}<br />
                                                {/if}
                                                {$valorPedidoEndereco.ENDERECO}, 
                                                {$valorPedidoEndereco.NUMERO}
                                                {if $valorPedidoEndereco.COMPLEMENTO eq ""}
                                                    <br />
                                                {else}
                                                    - {$valorPedidoEndereco.COMPLEMENTO}<br />
                                                {/if}
                                                Bairro: {$valorPedidoEndereco.BAIRRO}<br />
                                                {$valorPedidoEndereco.NOME_MUNICIPIO}, {$valorPedidoEndereco.UNFE_ID_ESTADO}<br />
                                                {$valorPedidoEndereco.CEP_ID_CEP}<br />
                                                {$valorPedidoEndereco.REFERENCIA}
                                            </dd>
                                            
                                            <hr />
                                        {/foreach}
                                            <dt><p><strong>Cod Rastreamento:</strong></p></dt>
                                            <dd>
                                                {foreach $codRastreamento as $valorCodRastreamento}
                                                    {$valorCodRastreamento}<br>
                                                {/foreach}
                                            </dd>
                                    </dl>
                                    
                                    <div id="formEditaEndereco">
                                        <form class="form-horizontal" id="editaPessoaEndereco" action="{$ACTIONS_DIR}pessoa.php" method="post"/>

                                        <input type="hidden" name="acao" value="editarEnderecoPessoa">
                                        
                                            
                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">CEP</label>
                                                        <input class="span5" id="cepEnderecoPessoa" type="text" name="cepEnderecoPessoa" required="required"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--<div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="required">Tipo Logradouro</label>
                                                        <input class="span3" id="tipoLogradouroEnderecoPessoa" type="text" name="tipoLogradouroEnderecoPessoa" required="required" placeholder="Rua, Avenida ..."/>
                                                    </div>
                                                </div>
                                            </div>-->

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="required">Endere&ccedil;o</label>
                                                        <input class="span6" id="ruaEnderecoPessoa" type="text" name="ruaEnderecoPessoa" required="required"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">N&uacute;mero</label>
                                                        <input class="span3" id="numeroEnderecoPessoa" type="text" name="numeroEnderecoPessoa" required="required"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">Complemento</label>
                                                        <input class="span8" id="complementoEnderecoPessoa" type="text" name="complementoEnderecoPessoa" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">Bairro</label>
                                                        <input class="span8" id="bairroEnderecoPessoa" type="text" name="bairroEnderecoPessoa" required="required"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">Cidade</label>
                                                        <input class="span1" id="idMunicipioEnderecoPessoa" type="hidden" name="idMunicipioEnderecoPessoa" required="required"/>
                                                        <input class="span8" id="municipioEnderecoPessoa" type="text" name="municipioEnderecoPessoa" required="required" readonly="readonly"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">Estado</label>
                                                        <input class="span2" id="estadoEnderecoPessoa" type="text" name="estadoEnderecoPessoa" required="required" readonly="readonly"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--
                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">Pa&iacute;s</label>
                                                        <input class="span5" id="paisEnderecoPessoa" type="text" name="paisEnderecoPessoa" required="required" readonly="readonly"/>
                                                    </div>
                                                </div>
                                            </div>
                                            -->
                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">Refer&ecirc;ncia</label>
                                                        <input class="span8" id="referenciaEnderecoPessoa" type="text" name="referenciaEnderecoPessoa" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">Apelido do Endere&ccedil;o</label>
                                                        <input class="span8" id="apelidoEnderecoPessoa" type="text" name="apelidoEnderecoPessoa" required="required" maxlength="20"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-actions">
                                               <button type="submit" class="btn btn-info">Salvar</button>
                                               <button type="button" class="btn btn-danger" onclick="javascript: btnCancelaEditar('EnderecoPessoa');">Cancelar</button>
                                            </div>

                                        </form>
                                        <!--<div id="teste">123</div>-->

                                    </div>

                                    

                                </div>
                            </div>

                        </div><!-- End .span4 -->

                        <div class="span6">

                            <div class="box">
                                <div class="title">
                                    <h4>
                                        <span>Hist&oacute;rico Situa&ccedil;&atilde;o Pedido</span>

                                        
                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                
                                
                                
                                <div class="content">
                                
                                    <dl class="dl-horizontal" id="divEndereco">
                                        {foreach $historicoSituacaoPedido as $valueHistoricoSituacaoPedido}
                                            {$valueHistoricoSituacaoPedido.DESCRICAO_PEDIDO_ITEM_SITUACAO} - {$valueHistoricoSituacaoPedido.DATA}
                                            <br />
                                        {/foreach}
                                            
                                    </dl>
                                    
                                </div>
                            </div>

                        </div><!-- End .span4 -->

                        </div><!-- End .row-fluid -->



                        <div class="row-fluid">

                            <div class="span12">

                                <div class="box">

                                    <div class="title">

                                        <h4>
                                            <span>Ocorr&ecirc;ncias</span>
                                        </h4>
                                        <a href="#" class="minimize">Minimize</a>
                                    </div>
                                    <div class="content">
                                        <form class="form-horizontal" method="post" id="formCadastraOcorrencia" action="{$ACTIONS_DIR}pedido.php" />

                                        <input type="hidden" value="cadastraOcorrenciaPedido" name="acao">
                                        <input type="hidden" value="{$valorPedido.ID_PESSOA}" name="idPessoa">
                                        <input type="hidden" value="{$valorPedido.ID_PEDIDO}" name="idPedido">

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <textarea class="span12 limit" id="ocorrenciaPedido" name="ocorrenciaPedido" rows="3"></textarea>
                                                        <div class="form-actions">
                                                           <button type="submit" class="btn btn-info">Salvar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>


                                        </form>
                                        <div id="historicoOcorrenciaPessoa">
                                            <dl class="dl-horizontal">
                                            {foreach $listaOcorrencia as $valueOcorrencia}
                                                <dt>
                                                    {$valueOcorrencia.DATA}
                                                </dt>
                                                <dd>{$valueOcorrencia.DESCRICAO}&nbsp;</dd>
                                            {/foreach}
                                        </dl>
                                        </div>
                                    </div>

                                </div><!-- End .box -->

                            </div><!-- End .span6 -->   

                        </div>

                        <div class="row-fluid">

                        <div class="span4 form-pedido-pagamento" style="display:none;">

                            <div class="box gradient">

                                <div class="title">
                                    <h4>
                                        
                                        <span>Novo Pagamento</span>
                                    </h4>
                                    <span class="minia-icon-close"></span>
                                </div>
                                <div class="content">
                                     
                                     <form class="form-horizontal" id="cadastrarPedidoPagamento" action="{$ACTIONS_DIR}pedido.php" method="post"/>
                                     
                                     <input value="cadastrarPedidoPagamento" name="acao" type="hidden">

                                     <input type="hidden" name="idPedido" id="idPedido" value="{$valorPedido.ID_PEDIDO}">

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span6" for="required">Parcelas</label>
                                                    <div class="span4 controls">
                                                        <select id="nroParcelas" name="nroParcelas">
                                                            {foreach $listaNroParcelas as $valorNroParcelas}
                                                            <option value="{$valorNroParcelas}">{$valorNroParcelas}x</option>
                                                            {/foreach}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span6" for="required">Forma de Pagamento</label>
                                                    <div class="span6 controls">
                                                        <select id="formaPagamento" name="formaPagamento">
                                                            {foreach $listaTipoFormaPagamento as $keyTipoFormaPagamento => $valorTipoFormaPagamento}
                                                                <optgroup label="{$keyTipoFormaPagamento}">
                                                                {foreach $valorTipoFormaPagamento as $idFormaPagamento => $formaPagamento}
                                                                    <option value="{$idFormaPagamento}">{$formaPagamento}</option>
                                                                {/foreach}
                                                                </optgroup>
                                                            {/foreach}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span6" for="required">Tipo Lan&ccedil;amento</label>
                                                    <div class="span4 controls">
                                                        <select id="tipoLancamento" name="tipoLancamento">
                                                            <option value="P">Pagamento</option>
                                                            <option value="E">Estorno</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span6" for="required">Valor</label>
                                                    <input type="text" id="valorPagamento" name="valorPagamento" class="span3 mask-moeda-real" required="required">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12 controls">
                                                <button type="submit" class="btn btn-info">Salvar</button>
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>

                            </div><!-- End .box -->

                            </div><!-- End .span4 -->
                        </div>

                        <div class="row-fluid">



                        <div class="span12">

                            <div class="box">

                                <div class="title">

                                    <h4>
                                        
                                        <span>Pedido Pagamento</span>

                                        <form class="box-form right" action="">
                                            <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown">
                                                <span class="icon16 iconic-icon-cog"></span>
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="javascript:void(0);" id="novo-pagamento">
                                                        <span class="icon-file"></span> Novo
                                                    </a>
                                                </li>
                                            </ul>
                                        </form>

                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                <div class="content noPad">
                                    <table class="responsive table table-bordered" id="pedidoPagamentoTable">
                                        <thead>
                                          <tr>
                                            <th>#</th>
                                            <th>Parcelas</th>
                                            <th>Forma Pagamento</th>
                                            <th>Data Autoriza&ccedil;&atilde;o</th>
                                            <th>Lan&ccedil;amento</th>
                                            <th>Valor Total</th>
                                            <th>Transa&ccedil;&atilde;o Autorizada</th>
                                            <th>Ativo</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          {foreach $visualizaPedidoPagamento as $valorPedidoPagamento}
                                          <tr id="tr{$valorPedidoPagamento.ID_PEDIDO_PAGAMENTO}" {if $valorPedidoPagamento.ATIVO eq 'S'} class="ativo" {else} class="inativo" {/if}>
                                            <td>{$valorPedidoPagamento.ID_PEDIDO_PAGAMENTO}</td>
                                            <td>{$valorPedidoPagamento.NUMERO_PARCELAS}</td>
                                            <td>{$valorPedidoPagamento.DESCRICAO_FORMA_PAGAMENTO}</td>
                                            <td id="retorno{$valorPedidoPagamento.ID_PEDIDO_PAGAMENTO}">{$valorPedidoPagamento.DATA_AUTORIZACAO}</td>
                                            <td>{$valorPedidoPagamento.TIPO_LANCAMENTO}</td>
                                            <td>{$valorPedidoPagamento.VALOR_TOTAL_PAGAMENTO|number_format:2:",":"."}</td>
                                            <td>
                                                {if $valorPedidoPagamento.TRANSACAO_AUTORIZADA eq 'S'}
                                                    <input type="checkbox" class="checkbox-acao" value="{$valorPedidoPagamento.ID_PEDIDO_PAGAMENTO}" checked="checked" name="transacaoAutorizada" id="transacaoAutorizada">
                                                {else}
                                                    <input type="checkbox" class="checkbox-acao" value="{$valorPedidoPagamento.ID_PEDIDO_PAGAMENTO}" name="transacaoAutorizada" id="transacaoAutorizada">
                                                {/if}
                                            </td>
                                            <td>
                                                {if $valorPedidoPagamento.ATIVO eq 'S'}
                                                    <input type="checkbox" class="checkbox-acao" value="{$valorPedidoPagamento.ID_PEDIDO_PAGAMENTO}" checked="checked" name="pedidoPagamentoAtivo" id="pedidoPagamentoAtivo">
                                                {else}
                                                    <input type="checkbox" class="checkbox-acao" value="{$valorPedidoPagamento.ID_PEDIDO_PAGAMENTO}" name="pedidoPagamentoAtivo" id="pedidoPagamentoAtivo">
                                                {/if}
                                            </td>
                                          </tr>
                                          {/foreach}
                                        </tbody>
                                    </table>
                                </div>

                            </div><!-- End .box -->

                        </div><!-- End .span4 -->

                        

                    </div><!-- End .row-fluid --> 


                    <!--<div class="row-fluid">

                        <div class="span6 form-produto-pedido" style="display:none;">

                            <div class="box gradient">

                                <div class="title">
                                    <h4>
                                        
                                        <span>Novo Produto</span>
                                    </h4>
                                    <span class="minia-icon-close"></span>
                                </div>
                                <div class="content">
                                     
                                     <form class="form-horizontal" id="cadastrarProdutoPedido" action="{$ACTIONS_DIR}pedido.php" method="post"/>
                                     
                                     <input value="cadastrarProdutoPedido" name="acao" type="hidden">

                                     <input type="hidden" name="idPedido" id="idPedido" value="{$valorPedido.ID_PEDIDO}">

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="required">Produto</label>
                                                    <select name="listaEstoqueProduto" id="select2" class="nostyle span8">
                                                        {foreach $listaEstoqueProduto as $valorListaEstoqueProduto}  
                                                            <option value="{$valorListaEstoqueProduto.ID_PRODUTO}|{$valorListaEstoqueProduto.ID_ATRIBUTO}">
                                                                {$valorListaEstoqueProduto.REFERENCIA} - {$valorListaEstoqueProduto.DESCRICAO_VENDA}
                                                            </option>
                                                        {/foreach}
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12 controls">
                                                <button type="submit" class="btn btn-info">Salvar</button>
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>

                            </div>

                            </div>
                        </div>-->

                    <!--<div id="teste">123</div>-->
                    <div class="row-fluid">

                        <div class="span12">

                            <div class="box">

                                <div class="title">

                                    <h4>
                                        
                                        <span>Produto Pedido</span>
                                        <!--<form class="box-form right" action="">
                                            <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown">
                                                <span class="icon16 iconic-icon-cog"></span>
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="javascript:void(0);" id="novo-produto">
                                                        <span class="icon-file"></span> Novo
                                                    </a>
                                                </li>
                                                
                                            </ul>
                                        </form>-->
                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                <div class="content noPad">
                                    <table class="responsive table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Imagem</th>
                                            <th>Refer&ecirc;ncia</th>
                                            <th>Produto</th>
                                            <th>Atributo</th>
                                            <th>Pre&ccedil;o Unit&aacute;rio</th>
                                            <th>Presente</th>
                                            <th>Valor Desconto</th>
                                            <th>Qtd</th>
                                            <th>Situa&ccedil;&atilde;o Item Pedido</th>
                                            <th>A&ccedil;&atilde;o</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          {foreach $visualizaPedidoItem as $valorPedidoItem}
                                              <tr>
                                                <td><img src="../midia/produtos/carrinho/{$valorPedidoItem.IMAGEM}"></td>
                                                <td>{$valorPedidoItem.REFERENCIA}</td>
                                                <td>{$valorPedidoItem.DESCRICAO_VENDA}</td>
                                                <td>{$valorPedidoItem.ATRIBUTO}</td>
                                                <td>{$valorPedidoItem.PRECO_UNITARIO|number_format:2:",":"."}</td>
                                                <td>
                                                    {if $valorPedidoItem.PACOTE_PRESENTE eq 'N'}
                                                        <input type="checkbox" id="pacotePresente{$valorPedidoItem.ID_PEDIDO_ITEM}">
                                                    {else}
                                                        <input type="checkbox" id="pacotePresente{$valorPedidoItem.ID_PEDIDO_ITEM}" checked="checked">
                                                    {/if}
                                                </td>

                                                <td><input class="span6 mask-moeda-real" type="text" value="{$valorPedidoItem.VALOR_DESCONTO|number_format:2:",":"."}" name="valorDescontoPedidoItem" id="valorDescontoPedidoItem{$valorPedidoItem.ID_PEDIDO_ITEM}"></td>

                                                <td><input class="span4" type="text" value="{$valorPedidoItem.QUANTIDADE|number_format}" id="quantidadeItem{$valorPedidoItem.ID_PEDIDO_ITEM}" name="quantidadeItem"></td>

                                                <td>
                                                    <select name="situacaoItemPedido" id="situacaoItemPedido{$valorPedidoItem.ID_PEDIDO_ITEM}">
                                                        {foreach $listaSituacaoPedido as $valorSituacaoPedido}
                                                            {if $valorPedidoItem.SPIT_ID_SITUACAO_PEDIDO_ITEM eq $valorSituacaoPedido.ID_PEDIDO_ITEM_SITUACAO}
                                                                <option selected="selected" value="{$valorSituacaoPedido.ID_PEDIDO_ITEM_SITUACAO}">{$valorSituacaoPedido.DESCRICAO_PEDIDO_ITEM_SITUACAO}</option>
                                                            {else}
                                                                <option value="{$valorSituacaoPedido.ID_PEDIDO_ITEM_SITUACAO}">{$valorSituacaoPedido.DESCRICAO_PEDIDO_ITEM_SITUACAO}</option>
                                                            {/if}
                                                        {/foreach}
                                                    </select>
                                                </td>
                                                <td><button class="btn btn-info btn-mini" onclick="editarPedidoItem({$valorPedidoItem.ID_PEDIDO_ITEM})">Salvar</button></td>
                                              </tr>
                                          {/foreach}
                                        </tbody>
                                    </table>
                                </div>

                            </div><!-- End .box -->

                        </div><!-- End .span4 -->

                        

                    </div><!-- End .row-fluid -->

               
    			<!-- Page end here -->
    				
               
            </div><!-- End contentwrapper -->
        </div><!-- End #content -->
    
    </div><!-- End #wrapper -->

   