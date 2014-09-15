    <div id="wrapper">

        {include file="sidebar.tpl"}

        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                {include file="heading.tpl"}

                <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

					<form class="form-horizontal" id="atenderPedido" action="{$ACTIONS_DIR}pedido.php" method="post"/> 
                    
                    <input type="hidden" value="atenderPedido" id="acao" name="acao">
                    
                    <div class="row-fluid">

                        <div class="span12">

                            <div class="box gradient">

                                <div class="title">
                                    <h4>
                                        <span>Pedidos</span>
                                        <!--<form class="box-form right" action="">
                                            <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown">
                                                <span class="icon16 iconic-icon-cog"></span>
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="pessoa-cadastra">
                                                        <span class="icon-pencil"></span> Novo
                                                    </a>
                                                </li>
                                            </ul>
                                        </form>-->
                                    </h4>
                                </div>
                                <div class="content noPad clearfix" id="tabelaListaPedido" style="padding:5px;">
                                   
                                            {foreach $listaPedido as $idPedido => $arrayPedidos}
                                             <br>
												<h5><strong>PEDIDO:</strong> {$arrayPedidos.0.NUMERO_PEDIDO} | <strong>DATA EMISS&Atilde;O:</strong> {$arrayPedidos.0.DATA_EMISSAO}</h5>
												
								
												<table class="responsive table table-bordered" id="pedidoItemManutencao">
                                        <thead>
													<tr>
													<th>Item Pedido</th>
													<th>Situa&ccedil;&atilde;o</th>
													<th>Descri&ccedil;&atilde;o Produto</th>
													<th>Pre&ccedil;o Unit&aacute;rio</th>
													<th>Quantidade</th>
													<th>Qtd Atendido</th>
													<th>A&ccedil;&atilde;o</th>
													</tr>
													</thead>
													<tbody>
													{foreach $arrayPedidos as $value}
														<tr>
															<td>{$value.ID_PEDIDO_ITEM}</td>
															<td>
																<select class="idSituacaoPedidoItem nostyle span12" id="idSituacaoPedidoItem{$value.ID_PEDIDO_ITEM}" name="idSituacaoPedidoItem[{$value.ID_PEDIDO_ITEM}]">
																	{if $value.ID_PEDIDO_ITEM_SITUACAO eq $idSituacaoPedidoProdIndisponivel}
																		<option selected="selected" value="{$idSituacaoPedidoProdIndisponivel}">AGUARDANDO ESTOQUE</option>
																		<option value="{$idSituacaoPedidoAtendido}">ATENDIDO</option>
																	{elseif $value.ID_PEDIDO_ITEM_SITUACAO eq $idSituacaoPedidoAtendido}
																		<option selected="selected" value="{$idSituacaoPedidoAtendido}">ATENDIDO</option>
																		<option value="{$idSituacaoPedidoProdIndisponivel}">AGUARDANDO ESTOQUE</option>
																	{else}
																		<option selected="selected" value="{$value.ID_PEDIDO_ITEM_SITUACAO}">{$value.DESCRICAO_PEDIDO_ITEM_SITUACAO}</option>
																		<option value="{$idSituacaoPedidoProdIndisponivel}">AGUARDANDO ESTOQUE</option>
																		<option value="{$idSituacaoPedidoAtendido}">ATENDIDO</option>
																	{/if}
																</select>
															</td>
															<td>{$value.REFERENCIA} {$value.DESCRICAO_VENDA}<br>{$value.ATRIBUTO}</td>
															<td>{$value.PRECO_UNITARIO_VENDA|number_format:2:",":"."}</td>
															<td><input id="qtdPedidoItem{$value.ID_PEDIDO_ITEM}" type="text" value="{$value.QUANTIDADE|number_format}" readonly="readonly" class="span4"></td>
															<td><input id="qtdAtendido{$value.ID_PEDIDO_ITEM}" name="qtdAtendido[{$value.ID_PEDIDO_ITEM}]" type="text" value="{$value.QUANTIDADE_ATENDIDO|number_format}" class="span4"></td>
															<td><button type="button" class="btn btn-info btn-mini atenderPedido" id="atenderPedido{$value.ID_PEDIDO_ITEM}">Atender</button></td>
														</tr>
													{/foreach}
													</tbody>
												</table>
											
											{/foreach}
											
											
											<div class="form-actions">
			                                   <button type="submit" class="btn btn-info">Salvar</button>
			                                   <!--<button type="button" class="btn">Cancelar</button>-->
			                                </div>
			                                 
                                      
                                </div>

                            </div><!-- End .box -->

                        </div><!-- End .span12 -->

                    </div><!-- End .row-fluid -->
               
                <!--<div id="teste">123</div>-->
                
                </form>

               
    			<!-- Page end here -->
    				
               
            </div><!-- End contentwrapper -->
        </div><!-- End #content -->
    
    </div><!-- End #wrapper -->

<script>
	idSituacaoPedidoAprovadoCredito = {$idSituacaoPedidoAprovadoCredito};
	idSituacaoPedidoAtendido = {$idSituacaoPedidoAtendido};
</script>
   