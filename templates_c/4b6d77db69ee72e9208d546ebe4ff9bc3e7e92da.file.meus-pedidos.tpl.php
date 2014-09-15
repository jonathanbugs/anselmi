<?php /* Smarty version Smarty-3.1.10, created on 2014-09-15 12:02:39
         compiled from "templates/meus-pedidos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7144951945416ff8f6d15a3-10164198%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b6d77db69ee72e9208d546ebe4ff9bc3e7e92da' => 
    array (
      0 => 'templates/meus-pedidos.tpl',
      1 => 1395684736,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7144951945416ff8f6d15a3-10164198',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pedido' => 0,
    'valuePedido' => 0,
    'listaStatusPedido' => 0,
    'subtotalPedido' => 0,
    'valueItemPedido' => 0,
    'descontoPedido' => 0,
    'MIDIA_DIR' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_5416ff8fa94ab2_33104067',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5416ff8fa94ab2_33104067')) {function content_5416ff8fa94ab2_33104067($_smarty_tpl) {?><div class="container">
	<div id="produtosContent" class="clearfix">
		<div class="navegacaoContent">
			<h2 class="tituloPagina">Meus Pedidos</h2>
		</div>

		<!-- SIDEBAR CONTA -->
		<?php echo $_smarty_tpl->getSubTemplate ("../templates/includes/_sidebar_conta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


		<div class="meusPedidosContent">
			<span class="titulo">Todos os pedidos</span><br>
			<!--<div class="filtroPedidos">
				<form action="javascript:;" method="get" name="pedidoForm" class="pedidoForm clearfix" lang="pt">
					<span class="txtIntro">
						Buscar por
					</span>
					<div class="holder holderTipoBusca">
						<div class="relativeBusca">
							<label for="numero" class="checked">
								<input type="radio" id="numero" name="buscaPedido" value="numero" checked="checked" />
								n&uacute;mero do pedido
							</label>
						</div>
						<div class="relativeBusca">
							<label for="periodo">
								<input type="radio" id="periodo" name="buscaPedido" value="periodo" />
								por per&iacute;odo
							</label>
						</div>
					</div>
					<div class="holderBusca">
						<label class="label" for="buscaPedido">Digite o n&uacute;mero do pedido</label>
						<input class="input" type="text" id="buscaPedido" name="buscaPedido" />
						<button type="submit" class="btSubmit"><span class="icone"></span></button>
					</div>
				</form>
			</div>-->	

			<div class="blocoServicos">
				<div class="tabelaServicos">
					<div class="tabelaTitulos clearfix">
						<div class="table tableTitulo table1">
							<div class="tableCell">N&uacute;mero do Pedido</div>
						</div>
						<div class="table tableTitulo table2">
							<div class="tableCell">Data</div>
						</div>
						<div class="table tableTitulo table3">
							<div class="tableCell">Status</div>
						</div>
						<div class="table tableTitulo table4">
							<div class="tableCell"></div>
						</div>
					</div>


					<!-- LISTAGEM DE PEDIDOS -->


					<!-- PEDIDO 1 -->
					<?php  $_smarty_tpl->tpl_vars['valuePedido'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valuePedido']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pedido']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valuePedido']->key => $_smarty_tpl->tpl_vars['valuePedido']->value){
$_smarty_tpl->tpl_vars['valuePedido']->_loop = true;
?>
					<div class="tabelaListas clearfix">
						<div class="table tableInfos table1">
							<div class="tableCell"><?php echo $_smarty_tpl->tpl_vars['valuePedido']->value[0]['NUMERO_PEDIDO'];?>
</div>
						</div>
						<div class="table tableInfos table2">
							<div class="tableCell"><?php echo $_smarty_tpl->tpl_vars['valuePedido']->value[0]['DATA_EMISSAO'];?>
</div>
						</div>
						<div class="table tableInfos table3">
							<div class="tableCell"><?php echo $_smarty_tpl->tpl_vars['valuePedido']->value[0]['DESCRICAO_SITUACAO_CLIENTE'];?>
<?php if ($_smarty_tpl->tpl_vars['valuePedido']->value[0]['DESCRICAO_SITUACAO_CLIENTE']=='DESPACHADO'){?><br>Rastreamento do pedido: <a href="http://websro.correios.com.br/sro_bin/txect01$.QueryList?P_LINGUA=001&P_TIPO=001&P_COD_UNI=<?php echo $_smarty_tpl->tpl_vars['listaStatusPedido']->value[$_smarty_tpl->tpl_vars['valuePedido']->value[0]['ID_PEDIDO']][3]['COD_RASTREAMENTO'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['listaStatusPedido']->value[$_smarty_tpl->tpl_vars['valuePedido']->value[0]['ID_PEDIDO']][3]['COD_RASTREAMENTO'];?>
</a><?php }?></div>
						</div>
						<div class="table tableInfos table4">
							<div class="tableCell">
								<a class="btVerMais" href="javascript:;"><span class="icon"></span></a>
							</div>
						</div>
					</div>

					<div class="pedidoAberto clearfix">
						<div class="pedidoInfos">
							<table class="pedidoTable">
								<tr class="pedidoTableTr">
									<td class="pedidoTableTd"><span class="pedidoTableTdTitulo">N&uacute;mero do Pedido</span></td>
									<td class="pedidoTableTd"><span class="pedidoTableTdTitulo">Data</span></td>
									<td class="pedidoTableTd"><span class="pedidoTableTdTitulo">Status</span></td>
								</tr>
								<tr class="pedidoTableTr">
									<td class="pedidoTableTd"><?php echo $_smarty_tpl->tpl_vars['valuePedido']->value[0]['NUMERO_PEDIDO'];?>
</td>
									<td class="pedidoTableTd"><?php echo $_smarty_tpl->tpl_vars['valuePedido']->value[0]['DATA_EMISSAO'];?>
</td>
									<td class="pedidoTableTd"><?php echo $_smarty_tpl->tpl_vars['valuePedido']->value[0]['DESCRICAO_SITUACAO_CLIENTE'];?>
</td>
								</tr>
							</table> 
							<a class="btFecharPedido" href="javascript:;"><span class="icon"></span></a>
						</div>

						<div class="pedidoStatus">
							<span class="tituloBloco tituloBlocoStatus">Status</span>
							<div class="status">
								<ul class="statusUl clearfix">
									<li class="statusLi">
										<span class="iconStatus <?php if ($_smarty_tpl->tpl_vars['listaStatusPedido']->value[$_smarty_tpl->tpl_vars['valuePedido']->value[0]['ID_PEDIDO']][2]['ID_SITUACAO']==2){?>iconStatusConcluido<?php }?>"></span>
										<span class="tituloStatus">
											<span class="statusTxt">Pedido recebido</span>
											<span class="dataStatus"><?php echo $_smarty_tpl->tpl_vars['listaStatusPedido']->value[$_smarty_tpl->tpl_vars['valuePedido']->value[0]['ID_PEDIDO']][2]['DATA'];?>
</span>
										</span>
									</li>

									<li class="statusLi"><span class="statusLinha statusLinhaAtiva"></span></li>

									<li class="statusLi">
										<span class="iconStatus <?php if ($_smarty_tpl->tpl_vars['listaStatusPedido']->value[$_smarty_tpl->tpl_vars['valuePedido']->value[0]['ID_PEDIDO']][3]['ID_SITUACAO']==3){?>iconStatusConcluido<?php }elseif($_smarty_tpl->tpl_vars['listaStatusPedido']->value[$_smarty_tpl->tpl_vars['valuePedido']->value[0]['ID_PEDIDO']][4]['ID_SITUACAO']==4){?>iconStatusErro<?php }elseif($_smarty_tpl->tpl_vars['listaStatusPedido']->value[$_smarty_tpl->tpl_vars['valuePedido']->value[0]['ID_PEDIDO']][7]['ID_SITUACAO']==7){?>iconStatusErro<?php }?>"></span>
										<span class="tituloStatus">
											<span class="statusTxt"><?php if ($_smarty_tpl->tpl_vars['listaStatusPedido']->value[$_smarty_tpl->tpl_vars['valuePedido']->value[0]['ID_PEDIDO']][3]['ID_SITUACAO']==3){?>Pagamento Aprovado<?php }elseif($_smarty_tpl->tpl_vars['listaStatusPedido']->value[$_smarty_tpl->tpl_vars['valuePedido']->value[0]['ID_PEDIDO']][4]['ID_SITUACAO']==4){?>Pagamento Negado<?php }elseif($_smarty_tpl->tpl_vars['listaStatusPedido']->value[$_smarty_tpl->tpl_vars['valuePedido']->value[0]['ID_PEDIDO']][7]['ID_SITUACAO']==7){?>Cancelado<?php }else{ ?>Pagamento Aprovado<?php }?></span>
											<span class="dataStatus"><?php if ($_smarty_tpl->tpl_vars['listaStatusPedido']->value[$_smarty_tpl->tpl_vars['valuePedido']->value[0]['ID_PEDIDO']][3]['ID_SITUACAO']==3){?><?php echo $_smarty_tpl->tpl_vars['listaStatusPedido']->value[$_smarty_tpl->tpl_vars['valuePedido']->value[0]['ID_PEDIDO']][3]['DATA'];?>
<?php }elseif($_smarty_tpl->tpl_vars['listaStatusPedido']->value[$_smarty_tpl->tpl_vars['valuePedido']->value[0]['ID_PEDIDO']][4]['ID_SITUACAO']==4){?><?php echo $_smarty_tpl->tpl_vars['listaStatusPedido']->value[$_smarty_tpl->tpl_vars['valuePedido']->value[0]['ID_PEDIDO']][4]['DATA'];?>
<?php }elseif($_smarty_tpl->tpl_vars['listaStatusPedido']->value[$_smarty_tpl->tpl_vars['valuePedido']->value[0]['ID_PEDIDO']][7]['ID_SITUACAO']==7){?><?php echo $_smarty_tpl->tpl_vars['listaStatusPedido']->value[$_smarty_tpl->tpl_vars['valuePedido']->value[0]['ID_PEDIDO']][7]['DATA'];?>
<?php }?></span>
										</span>
									</li>

									<li class="statusLi"><span class="statusLinha statusLinhaAtiva"></span></li>

									<li class="statusLi">
										
										<span class="iconStatus <?php if ($_smarty_tpl->tpl_vars['listaStatusPedido']->value[$_smarty_tpl->tpl_vars['valuePedido']->value[0]['ID_PEDIDO']][5]['ID_SITUACAO']==5){?>iconStatusConcluido<?php }?>"></span>
										<span class="tituloStatus">
											<span class="statusTxt">Preparando para envio</span>
											<span class="dataStatus"><?php echo $_smarty_tpl->tpl_vars['listaStatusPedido']->value[$_smarty_tpl->tpl_vars['valuePedido']->value[0]['ID_PEDIDO']][5]['DATA'];?>
</span>
										</span>
									</li>

									<li class="statusLi"><span class="statusLinha statusLinhaAtiva"></span></li>

									<li class="statusLi">
										<span class="iconStatus <?php if ($_smarty_tpl->tpl_vars['listaStatusPedido']->value[$_smarty_tpl->tpl_vars['valuePedido']->value[0]['ID_PEDIDO']][10]['ID_SITUACAO']==10){?>iconStatusConcluido<?php }?>"></span>
										<span class="tituloStatus">
											<span class="statusTxt">Despacho</span>
											<!--<span class="dataStatus">Data estimada</span>-->
											<span class="dataStatus"><?php echo $_smarty_tpl->tpl_vars['listaStatusPedido']->value[$_smarty_tpl->tpl_vars['valuePedido']->value[0]['ID_PEDIDO']][10]['DATA'];?>
</span>
										</span>
									</li>

									<!--<li class="statusLi"><span class="statusLinha"></span></li>

									<li class="statusLi">
										<span class="iconStatus"></span>
										<span class="tituloStatus">
											<span class="statusTxt">Em transporte</span>
											<span class="dataStatus">Data estimada</span>
											<span class="dataStatus">15/12/2013</span>
										</span>
									</li>

									<li class="statusLi"><span class="statusLinha"></span></li>
								
									<li class="statusLi">
										<span class="iconStatus <?php if ($_smarty_tpl->tpl_vars['listaStatusPedido']->value[$_smarty_tpl->tpl_vars['valuePedido']->value[0]['ID_PEDIDO']][16]['ID_SITUACAO']==16){?>iconStatusConcluido<?php }?>"></span>
										<span class="tituloStatus">
											<span class="statusTxt">Pedido entregue</span>
											<?php if ($_smarty_tpl->tpl_vars['listaStatusPedido']->value[$_smarty_tpl->tpl_vars['valuePedido']->value[0]['ID_PEDIDO']][10]['ID_SITUACAO']==10&&$_smarty_tpl->tpl_vars['listaStatusPedido']->value[$_smarty_tpl->tpl_vars['valuePedido']->value[0]['ID_PEDIDO']][16]['ID_SITUACAO']!=16){?>
											<span class="dataStatus">Data estimada</span>
											<?php }?>
											<span class="dataStatus"><?php echo $_smarty_tpl->tpl_vars['listaStatusPedido']->value[$_smarty_tpl->tpl_vars['valuePedido']->value[0]['ID_PEDIDO']][16]['DATA'];?>
</span>
										</span>
									</li>
								-->
								</ul>
							</div>
						</div>

						<div class="pedidoLeft">
							<div class="pedidoBlocos pedidoCarrinho">
								<span class="tituloBloco tituloBlocoCarrinho">Carrinho de Compras</span>

								<ul class="pedidosCarrinhoUl">
									<?php $_smarty_tpl->tpl_vars['subtotalPedido'] = new Smarty_variable(0, null, 0);?>
									<?php $_smarty_tpl->tpl_vars['descontoPedido'] = new Smarty_variable(0, null, 0);?>
									<?php  $_smarty_tpl->tpl_vars['valueItemPedido'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueItemPedido']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['valuePedido']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueItemPedido']->key => $_smarty_tpl->tpl_vars['valueItemPedido']->value){
$_smarty_tpl->tpl_vars['valueItemPedido']->_loop = true;
?>
									<?php $_smarty_tpl->tpl_vars['subtotalPedido'] = new Smarty_variable($_smarty_tpl->tpl_vars['subtotalPedido']->value+($_smarty_tpl->tpl_vars['valueItemPedido']->value['PRECO_UNITARIO_VENDA']*$_smarty_tpl->tpl_vars['valueItemPedido']->value['QUANTIDADE']), null, 0);?>
									<?php $_smarty_tpl->tpl_vars['descontoPedido'] = new Smarty_variable($_smarty_tpl->tpl_vars['descontoPedido']->value+$_smarty_tpl->tpl_vars['valueItemPedido']->value['VALOR_DESCONTO'], null, 0);?>
									<li class="pedidosCarrinhoLi">
										<!--<a class="pedidosCarrinhoLink" href="javascript:;">-->
											<img class="carrinhoImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/carrinho/<?php echo $_smarty_tpl->tpl_vars['valueItemPedido']->value['IMAGEM'];?>
" alt="" />
											<span class="carrinhoProdutoTitulo"><?php echo $_smarty_tpl->tpl_vars['valueItemPedido']->value['DESCRICAO_VENDA'];?>
</span>
											<span class="carrinhoProdutoQuantidade">Qtde: <?php echo number_format($_smarty_tpl->tpl_vars['valueItemPedido']->value['QUANTIDADE']);?>
</span>
											<span class="carrinhoProdutoValor">R$ <?php echo number_format($_smarty_tpl->tpl_vars['valueItemPedido']->value['PRECO_UNITARIO_VENDA'],2,",",".");?>
</span>
										<!--</a>-->
									</li>
									<?php } ?>
									<li class="subTotalLi">
										<div class="tableCell">
											<div class="contentBlocos">
												<span class="subTotalBloco">
													<span class="subTotalTxt">Sub-Total</span>
													<span class="subTotalTxt">Desconto</span>
													<span class="subTotalTxt">Frete</span>
												</span>
												<span class="subTotalBloco">
													<span class="subTotalTxt">R$ <?php echo number_format($_smarty_tpl->tpl_vars['subtotalPedido']->value,2,",",".");?>
</span>
													<span class="subTotalTxt">R$ <?php echo number_format($_smarty_tpl->tpl_vars['descontoPedido']->value,2,",",".");?>
</span>
													<span class="subTotalTxt">R$ <?php echo number_format($_smarty_tpl->tpl_vars['valuePedido']->value[0]['VALOR_FRETE'],2,",",".");?>
</span>
												</span>
											</div>
										</div>
									</li>

									<li class="totalLi">
										<div class="tableCell">
											<div class="contentBlocos">
												<span class="subTotalBloco">
													<span class="subTotalTxt">Total</span>
												</span>
												<span class="subTotalBloco">
													<span class="subTotalTxt">R$ <?php echo number_format((($_smarty_tpl->tpl_vars['subtotalPedido']->value-$_smarty_tpl->tpl_vars['descontoPedido']->value)+$_smarty_tpl->tpl_vars['valuePedido']->value[0]['VALOR_FRETE']),2,",",".");?>
</span>
												</span>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>

						<div class="pedidoRight">
							<div class="pedidoBlocos pedidoEntrega">
								<span class="tituloBloco tituloBlocoEntrega">Entrega</span>
								<?php if ($_smarty_tpl->tpl_vars['valuePedido']->value[0]['LICA_ID_LISTA_CASAMENTO']){?>
									O pedido ser&aacute; entregue diretamente aos noivos em uma data determinada por eles.
								<?php }else{ ?>
								<div class="entregaBloco entregaBlocoLimite">
									<span class="titulo"><?php echo $_smarty_tpl->tpl_vars['valuePedido']->value[0]['APELIDO_ENDERECO'];?>
</span>
									<span class="descricao">
										<?php echo $_smarty_tpl->tpl_vars['valuePedido']->value[0]['ENDERECO'];?>
, <?php echo $_smarty_tpl->tpl_vars['valuePedido']->value[0]['NUMERO'];?>
 <?php echo $_smarty_tpl->tpl_vars['valuePedido']->value[0]['COMPLEMENTO'];?>
<br/>
										<?php echo $_smarty_tpl->tpl_vars['valuePedido']->value[0]['BAIRRO'];?>
, <?php echo $_smarty_tpl->tpl_vars['valuePedido']->value[0]['NOME_MUNICIPIO'];?>
/<?php echo $_smarty_tpl->tpl_vars['valuePedido']->value[0]['UF'];?>

										<br/>
										CEP.: <?php echo $_smarty_tpl->tpl_vars['valuePedido']->value[0]['CEP'];?>

									</span>
								</div>
								<div class="entregaBloco entregaBlocoLimite">
									<span class="titulo">Tipo de Entrega</span>
									<span class="descricao">
										<span class="descricaoBold"><?php echo $_smarty_tpl->tpl_vars['valuePedido']->value[0]['DESCRICAO_FRETE'];?>
</span>
									</span>
								</div>
								<div class="entregaBloco entregaBlocoLast">
									<span class="titulo">Previs&atilde;o de Entrega</span>
									<span class="descricao">
										<span class="descricaoBold"><?php echo $_smarty_tpl->tpl_vars['valuePedido']->value[0]['PRAZO_ENTREGA_DIAS'];?>
 <?php if ($_smarty_tpl->tpl_vars['valuePedido']->value[0]['PRAZO_ENTREGA_DIAS']>1){?>dias &uacute;teis<?php }else{ ?>dia &uacute;til<?php }?></span>
										* Previs&atilde;o v&aacute;lida somente ap&oacute;s o despacho do pedido.
									</span>
								</div>
								<?php }?>
							</div>
							<div class="pedidoBlocos pedidoPagamento">
								<span class="tituloBloco tituloBlocoPagamento">Forma de Pagamento</span>
								<span class="txtIntro">Voc&ecirc; optou por pagar por <?php echo $_smarty_tpl->tpl_vars['valuePedido']->value[0]['TIPO_FORMA_PAGAMENTO'];?>
.</span>
								<!--span class="txtIntro">Voc&ecirc; optou por pagar no Boleto Banc&aacute;rio.</span-->
								<!--span class="txtIntro">Voc&ecirc; optou por Transferência Online</span-->

								<div class="pagamentoContent clearfix">
									<div class="pagamentoBloco">
										<!--<span class="tituloBlocos">Cart&atilde;o Utilizado</span>-->
										<!--
										PASSAR A FORMA DE PAGAMENTO ESCOLHIDA
										EX: 
										visa
										visa_electron
										mastercard
										diners
										american
										hipercard

										itau
										bradesco
										banco-do-brasil
										banrisul
										-->
										<!--<img class="imgPagamento imgPagamento_<?php echo $_smarty_tpl->tpl_vars['valuePedido']->value[0]['DESCRICAO_FORMA_PAGAMENTO'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
" alt=""/>-->
									</div>

									<div class="pagamentoBloco">
										<span class="tituloBlocos">Valor total da Compra</span>
										<span class="valorTotal">R$ <?php echo number_format((($_smarty_tpl->tpl_vars['subtotalPedido']->value-$_smarty_tpl->tpl_vars['descontoPedido']->value)+$_smarty_tpl->tpl_vars['valuePedido']->value[0]['VALOR_FRETE']),2,",",".");?>
</span>
										<span class="valorVezes">em <?php echo $_smarty_tpl->tpl_vars['valuePedido']->value[0]['NUMERO_PARCELAS'];?>
x de R$ <?php echo number_format(((($_smarty_tpl->tpl_vars['subtotalPedido']->value-$_smarty_tpl->tpl_vars['descontoPedido']->value)+$_smarty_tpl->tpl_vars['valuePedido']->value[0]['VALOR_FRETE'])/$_smarty_tpl->tpl_vars['valuePedido']->value[0]['NUMERO_PARCELAS']),2,",",".");?>
</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>

				</div>
			</div>	
		</div>
	</div>
</div>
<?php }} ?>