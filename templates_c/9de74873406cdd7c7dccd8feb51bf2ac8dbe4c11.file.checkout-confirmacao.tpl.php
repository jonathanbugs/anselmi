<?php /* Smarty version Smarty-3.1.10, created on 2014-05-09 09:55:55
         compiled from "templates\checkout-confirmacao.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29326536cd05b568f46-28338208%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9de74873406cdd7c7dccd8feb51bf2ac8dbe4c11' => 
    array (
      0 => 'templates\\checkout-confirmacao.tpl',
      1 => 1399640142,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29326536cd05b568f46-28338208',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'idListaCasamento' => 0,
    'numeroPedido' => 0,
    'situacaoMoip' => 0,
    'codMoip' => 0,
    'emailPessoa' => 0,
    'idPedido' => 0,
    'listaPedidoEndereco' => 0,
    'valuePedidoEntrega' => 0,
    'fretePedido' => 0,
    'prazoEntregaPedido' => 0,
    'listaPedidoPagamento' => 0,
    'valuePedidoPagamento' => 0,
    'listaPedido' => 0,
    'countPedidosItens' => 0,
    'MIDIA_DIR' => 0,
    'valuePedido' => 0,
    'subtotalPedido' => 0,
    'valorPedidoDesconto' => 0,
    'valorFretePedido' => 0,
    'totalPedidoFinal' => 0,
    'analytics' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_536cd05b82ad04_05736578',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536cd05b82ad04_05736578')) {function content_536cd05b82ad04_05736578($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['idListaCasamento']->value){?>
	<link rel="stylesheet" href="../lista-casamento/css/template.css"/>
	<link rel="stylesheet" href="../lista-casamento/css/lista-de-casamento-detalhe-produto.css"/>
	<?php echo $_smarty_tpl->getSubTemplate ("../lista-casamento/includes/topo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?>
<div class="container">
	<div id="produtosContent" class="clearfix">

		<!-- NAVEGACAO -->
		<?php echo $_smarty_tpl->getSubTemplate ("../templates/includes/_navegacao_checkout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



		<div class="pedidoConfirmacao">
			<div class="contentConfirmacao clearfix">
				<div class="dadosConfirmacao">
					<div class="circulo">
						<span class="icone"></span>
					</div>

					<div class="texto">
						<span class="sucessoTxt">Seu pedido <?php echo $_smarty_tpl->tpl_vars['numeroPedido']->value;?>
 foi realizado com sucesso.</span>
						<span class="confirmacaosTxt">
							Sua transa&ccedil;&atilde;o foi processada pelo Moip Pagamentos S/A.<br>
							A situa&ccedil;&atilde;o da transa&ccedil;&atilde;o &eacute;: <strong><?php echo $_smarty_tpl->tpl_vars['situacaoMoip']->value;?>
</strong> e o c&oacute;digo Moip &eacute; <strong><?php echo $_smarty_tpl->tpl_vars['codMoip']->value;?>
</strong>.<br>
							Caso tenha alguma d&uacute;vida referente a transa&ccedil;&atilde;o, entre em contato com o Moip.<br>
							Uma confirma&ccedil;&atilde;o de pedido foi enviada para o e-mail <?php echo $_smarty_tpl->tpl_vars['emailPessoa']->value;?>

						</span>
					</div>
				</div>

				<div class="confirmacaoOpcoes">
					<a href="/emails/imprime-pedido-checkout.php?idPedido=<?php echo $_smarty_tpl->tpl_vars['idPedido']->value;?>
" class="btConfirmacaoOpcoes btConfirmacaoOpcoesImprimir" onClick="window.open(this.href, this.target); return false;" target="_blank">
						Imprimir
						<span class="icone"></span>
					</a>
					<!--<a href="javascript:;" class="btConfirmacaoOpcoes btConfirmacaoOpcoesPdf">
						Salvar em PDF
						<span class="icone"></span>
					</a>-->
				</div>
			</div>
		</div>

		<div class="checkoutBlocoCenter">
			<center>
			<a href="https://www.ebitempresa.com.br/bitrate/pesquisa1.asp?empresa=196835">
			<img border="0" name="banner" src="https://www.ebitempresa.com.br/bitrate/banners/b196835.gif" alt="O que você achou desta loja?" width="468" height="60">
			</a>
			</center>
		</div>

		<?php if ($_smarty_tpl->tpl_vars['idListaCasamento']->value){?>
		<div class="checkoutBlocoCenter">
			<div class="checkoutBlocoMensagemListaCasamento checkoutBloco">
				<span class="checkoutBlocoTituloListaCasamento">Deixe uma mensagem para o casal</span>
				<textarea name="mensagemListaCasamento" id="mensagemListaCasamento" maxlenght="3000"></textarea>
				<input id="btCadastrar" type="submit" value="Salvar" onClick="javascript: gravaMensagemListaCasamento(<?php echo $_smarty_tpl->tpl_vars['idPedido']->value;?>
);" />
			</div>
		</div>
		<?php }?>

		<div class="checkoutBlocoLeft">
			<div class="checkoutBlocoEnvio checkoutBloco">
				<span class="checkoutBlocoTitulo">Entrega</span>
				
				<div class="pagamentoContent">
					<?php if ($_smarty_tpl->tpl_vars['idListaCasamento']->value){?>
						O pedido ser&aacute; entregue diretamente aos noivos em uma data determinada por eles.
					<?php }else{ ?>
					<div class="entregaBloco entregaBlocoLimite">
						<?php  $_smarty_tpl->tpl_vars['valuePedidoEntrega'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valuePedidoEntrega']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaPedidoEndereco']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valuePedidoEntrega']->key => $_smarty_tpl->tpl_vars['valuePedidoEntrega']->value){
$_smarty_tpl->tpl_vars['valuePedidoEntrega']->_loop = true;
?>
						<span class="titulo"><?php echo $_smarty_tpl->tpl_vars['valuePedidoEntrega']->value['APELIDO_ENDERECO'];?>
</span>
						<span class="descricao">
							<?php echo $_smarty_tpl->tpl_vars['valuePedidoEntrega']->value['ENDERECO'];?>
, <?php echo $_smarty_tpl->tpl_vars['valuePedidoEntrega']->value['NUMERO'];?>

							<?php if ($_smarty_tpl->tpl_vars['valuePedidoEntrega']->value['COMPLEMENTO']){?> - <?php echo $_smarty_tpl->tpl_vars['valuePedidoEntrega']->value['COMPLEMENTO'];?>
<?php }?><br>
							BAIRRO <?php echo $_smarty_tpl->tpl_vars['valuePedidoEntrega']->value['BAIRRO'];?>
<br>
							<?php echo $_smarty_tpl->tpl_vars['valuePedidoEntrega']->value['NOME_MUNICIPIO'];?>
/<?php echo $_smarty_tpl->tpl_vars['valuePedidoEntrega']->value['UF'];?>

							<br/>
							CEP.: <?php echo $_smarty_tpl->tpl_vars['valuePedidoEntrega']->value['CEP'];?>

						</span>
						<?php } ?>
					</div>
					<div class="entregaBloco entregaBlocoLimite">
						<span class="titulo">Tipo de Entrega</span>
						<span class="descricao">
							<span class="descricaoBold"><?php echo $_smarty_tpl->tpl_vars['fretePedido']->value;?>
</span>
						</span>
					</div>
					<div class="entregaBloco entregaBlocoLast">
						<span class="titulo">Previs&atilde;o de Entrega</span>
						<span class="descricao">
							<span class="descricaoBold"><?php echo $_smarty_tpl->tpl_vars['prazoEntregaPedido']->value;?>
 <?php if ($_smarty_tpl->tpl_vars['prazoEntregaPedido']->value>1){?>dias &uacute;teis<?php }else{ ?>dia &uacute;til<?php }?></span>
							*As previs&otilde;es de entrega s&atilde;o calculados a partir do primeiro dia &uacute;til seguinte ao da postagem.
						</span>
					</div>
					<?php }?>
				</div>
			</div>


			<div class="checkoutBlocoEntrega checkoutBloco">
				<span class="checkoutBlocoTitulo">Forma de Pagamento</span>
				
				<div class="pagamentoContent">
					<div class="pedidoBlocos pedidoPagamento">
						<?php  $_smarty_tpl->tpl_vars['valuePedidoPagamento'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valuePedidoPagamento']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaPedidoPagamento']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valuePedidoPagamento']->key => $_smarty_tpl->tpl_vars['valuePedidoPagamento']->value){
$_smarty_tpl->tpl_vars['valuePedidoPagamento']->_loop = true;
?>
						<span class="txtIntro">Voc&ecirc; optou por pagar com <?php echo $_smarty_tpl->tpl_vars['valuePedidoPagamento']->value['DESCRICAO'];?>
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
								<span class="imgPagamento imgPagamento_<?php echo $_smarty_tpl->tpl_vars['valuePedidoPagamento']->value['DESCRICAO_FORMA_PAGAMENTO'];?>
" ></span>
							</div>

							<div class="pagamentoBloco">
								<span class="tituloBlocos">Valor total da Compra</span>
								<span class="valorTotal">R$ <?php echo number_format($_smarty_tpl->tpl_vars['valuePedidoPagamento']->value['VALOR_TOTAL_PAGAMENTO'],2,",",".");?>
</span>
								<span class="valorVezes">em <?php if ($_smarty_tpl->tpl_vars['valuePedidoPagamento']->value['NUMERO_PARCELAS']<10){?>0<?php }?><?php echo $_smarty_tpl->tpl_vars['valuePedidoPagamento']->value['NUMERO_PARCELAS'];?>
x de R$ <?php echo number_format(($_smarty_tpl->tpl_vars['valuePedidoPagamento']->value['VALOR_TOTAL_PAGAMENTO']/$_smarty_tpl->tpl_vars['valuePedidoPagamento']->value['NUMERO_PARCELAS']),2,",",".");?>
</span>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>

		<div class="checkoutBlocoRight">
			<div class="checkoutBlocoCarrinho checkoutBloco">
				<span class="checkoutBlocoTitulo">Carrinho de Compras</span>
				<ul class="pedidosCarrinhoUl">
					<?php  $_smarty_tpl->tpl_vars['valuePedido'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valuePedido']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaPedido']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['valuePedido']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['valuePedido']->key => $_smarty_tpl->tpl_vars['valuePedido']->value){
$_smarty_tpl->tpl_vars['valuePedido']->_loop = true;
 $_smarty_tpl->tpl_vars['valuePedido']->iteration++;
?>
					<li class="pedidosCarrinhoLi <?php if ($_smarty_tpl->tpl_vars['valuePedido']->iteration==$_smarty_tpl->tpl_vars['countPedidosItens']->value){?>pedidosCarrinhoLast<?php }?>">
						<!--<a class="pedidosCarrinhoLink" href="javascript:;">-->
							<img class="carrinhoImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/carrinho/<?php echo $_smarty_tpl->tpl_vars['valuePedido']->value['IMAGEM'];?>
" alt="" />
							<span class="carrinhoProdutoTitulo"><?php echo $_smarty_tpl->tpl_vars['valuePedido']->value['DESCRICAO_VENDA'];?>
</span>
							<span class="carrinhoProdutoQuantidade">Qtde: <?php echo number_format($_smarty_tpl->tpl_vars['valuePedido']->value['QUANTIDADE']);?>
</span>
							<span class="carrinhoProdutoValor">R$ <?php echo number_format($_smarty_tpl->tpl_vars['valuePedido']->value['PRECO_UNITARIO_VENDA'],2,",",".");?>
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
									<span class="subTotalTxt">R$ <?php echo number_format($_smarty_tpl->tpl_vars['valorPedidoDesconto']->value,2,",",".");?>
</span>
									<span class="subTotalTxt">R$ <?php echo number_format($_smarty_tpl->tpl_vars['valorFretePedido']->value,2,",",".");?>
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
									<span class="subTotalTxt">R$ <?php echo number_format($_smarty_tpl->tpl_vars['totalPedidoFinal']->value,2,",",".");?>
</span>
								</span>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

var fb_param = {};
fb_param.pixel_id = '6010236710284';
fb_param.value = '<?php echo number_format($_smarty_tpl->tpl_vars['totalPedidoFinal']->value,2);?>
';
fb_param.currency = 'BRL';
(function(){
  var fpw = document.createElement('script');
  fpw.async = true;
  fpw.src = '//connect.facebook.net/en_US/fp.js';
  var ref = document.getElementsByTagName('script')[0];
  ref.parentNode.insertBefore(fpw, ref);
})();

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php echo $_smarty_tpl->tpl_vars['analytics']->value;?>
']);
  _gaq.push(['_trackPageview']);
  _gaq.push(['_addTrans',
    '<?php echo $_smarty_tpl->tpl_vars['numeroPedido']->value;?>
',           // transaction ID - required
    'Comlines Tramontina',  // affiliation or store name
    '<?php echo number_format($_smarty_tpl->tpl_vars['totalPedidoFinal']->value,2,".",'');?>
',          // total - required
    '',           // tax
    '<?php echo number_format($_smarty_tpl->tpl_vars['valorFretePedido']->value,2,".",'');?>
',              // shipping
    '<?php echo $_smarty_tpl->tpl_vars['valuePedidoEntrega']->value['NOME_MUNICIPIO'];?>
',       // city
    '<?php echo $_smarty_tpl->tpl_vars['valuePedidoEntrega']->value['UF'];?>
',     // state or province
    'BRA'             // country
  ]);

   // add item might be called for every item in the shopping cart
   // where your ecommerce engine loops through each item in the cart and
   // prints out _addItem for each
  <?php  $_smarty_tpl->tpl_vars['valuePedido'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valuePedido']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaPedido']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['valuePedido']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['valuePedido']->key => $_smarty_tpl->tpl_vars['valuePedido']->value){
$_smarty_tpl->tpl_vars['valuePedido']->_loop = true;
 $_smarty_tpl->tpl_vars['valuePedido']->iteration++;
?>
  _gaq.push(['_addItem',
    '<?php echo $_smarty_tpl->tpl_vars['valuePedido']->value['NUMERO_PEDIDO'];?>
',           // transaction ID - required
    '<?php echo $_smarty_tpl->tpl_vars['valuePedido']->value['REFERENCIA'];?>
',           // SKU/code - required
    '<?php echo $_smarty_tpl->tpl_vars['valuePedido']->value['DESCRICAO_VENDA'];?>
',        // product name
    '<?php echo $_smarty_tpl->tpl_vars['valuePedido']->value['CATEGORIA'];?>
',   // category or variation
    '<?php echo number_format($_smarty_tpl->tpl_vars['valuePedido']->value['PRECO_UNITARIO_VENDA'],2,".",'');?>
',          // unit price - required
    '<?php echo number_format($_smarty_tpl->tpl_vars['valuePedido']->value['QUANTIDADE']);?>
'               // quantity - required
  ]);
  <?php } ?>
  _gaq.push(['_trackTrans']); //submits transaction to the Analytics servers

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/offsite_event.php?id=6010236710284&amp;value=0&amp;currency=BRL" /></noscript>
<?php }} ?>