<?php /* Smarty version Smarty-3.1.10, created on 2014-09-16 18:22:26
         compiled from "templates/produto-detalhe.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10166577205418aa12489945-00797111%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3bbc19a77421d7c093499f3ca9f6698999e0d8cb' => 
    array (
      0 => 'templates/produto-detalhe.tpl',
      1 => 1406201970,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10166577205418aa12489945-00797111',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'idListaCasamento' => 0,
    'BASE_DIR' => 0,
    'navegacaoCategoria' => 0,
    'countCategorias' => 0,
    'valueNavegacaoCategoria' => 0,
    'tituloCategoria' => 0,
    'tipoPromocao' => 0,
    'valorPromocao' => 0,
    'lancamento' => 0,
    'zoomImagem' => 0,
    'MIDIA_DIR' => 0,
    'imagemPrincipal' => 0,
    'countImagensProduto' => 0,
    'listaImagensProduto' => 0,
    'valueImagensProduto' => 0,
    'descricaoVenda' => 0,
    'referencia' => 0,
    'idProdutoNivelAuxiliar' => 0,
    'urlAmigavelPnaux' => 0,
    'descricaoProdutoNivelAuxiliar' => 0,
    'precoPromocional' => 0,
    'valorEconomize' => 0,
    'precoVenda' => 0,
    'arrayAtributos' => 0,
    'valueCor' => 0,
    'idCor' => 0,
    'valueAtributo' => 0,
    'parcelamento' => 0,
    'colunasParcelamento' => 0,
    'foo' => 0,
    'precoFinalVenda' => 0,
    'descontoBoleto' => 0,
    'precoNoBoleto' => 0,
    'saldo' => 0,
    'idProdutoCombinacao' => 0,
    'idPessoa' => 0,
    'urlAmigavel' => 0,
    'LINK' => 0,
    'urlAtual' => 0,
    'listaProdutoSite' => 0,
    'descricaoCurta' => 0,
    'descricaoLonga' => 0,
    'qtdSolicitadaListaCasamento' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_5418aa127269a9_44013813',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5418aa127269a9_44013813')) {function content_5418aa127269a9_44013813($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_valor_parcelado')) include '/Applications/MAMP/htdocs/anselmi/smarty/plugins/modifier.valor_parcelado.php';
?><!-- JS FACEBOOK LIKE BUTTON 
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1&appId=168311620023539";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
-->
<?php if ($_smarty_tpl->tpl_vars['idListaCasamento']->value){?>
	<link rel="stylesheet" href="../lista-casamento/css/template.css"/>
	<link rel="stylesheet" href="../lista-casamento/css/lista-de-casamento-detalhe-produto.css"/>
	<?php echo $_smarty_tpl->getSubTemplate ("../lista-casamento/includes/topo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?>
<div class="container">
	<div id="produtosContent" class="clearfix">
		
		<!-- NAVEGACAO -->
		<div class="navegacaoContent">
			<ul class="navegacaoUl clearfix">
				<li class="navegacaoLi">
					<a class="navegacaoLink" href="<?php echo $_smarty_tpl->tpl_vars['BASE_DIR']->value;?>
">Inicial</a>
					<?php if (!$_smarty_tpl->tpl_vars['idListaCasamento']->value){?>
					<?php  $_smarty_tpl->tpl_vars['valueNavegacaoCategoria'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueNavegacaoCategoria']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['navegacaoCategoria']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['valueNavegacaoCategoria']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['valueNavegacaoCategoria']->key => $_smarty_tpl->tpl_vars['valueNavegacaoCategoria']->value){
$_smarty_tpl->tpl_vars['valueNavegacaoCategoria']->_loop = true;
 $_smarty_tpl->tpl_vars['valueNavegacaoCategoria']->iteration++;
?>
						<?php if ($_smarty_tpl->tpl_vars['valueNavegacaoCategoria']->iteration==$_smarty_tpl->tpl_vars['countCategorias']->value){?>
						<?php break 1?>
						<?php }?>
						/ <a class="navegacaoLink" href="<?php echo $_smarty_tpl->tpl_vars['valueNavegacaoCategoria']->value['URL_AMIGAVEL'];?>
"><?php echo $_smarty_tpl->tpl_vars['valueNavegacaoCategoria']->value['DESCRICAO_CATEGORIA'];?>
</a>
					<?php } ?>
					<?php }?>
				</li>
			</ul>
			<span class="tituloCategoria"><?php echo $_smarty_tpl->tpl_vars['tituloCategoria']->value;?>
</span>
		</div>

		<!-- DETALHE DO PRODUTO -->
		<div id="infoPrincipalProduto" class="clearfix">

			<!-- GALERIA PRODUTO -->
			<div id="galeriaProduto">
				<span class="boxProdutoSelo">
					<?php if ($_smarty_tpl->tpl_vars['tipoPromocao']->value=='P'&&$_smarty_tpl->tpl_vars['valorPromocao']->value>0){?>
					<span class="produtoSelo produtoSeloPorcentagem"><?php echo number_format($_smarty_tpl->tpl_vars['valorPromocao']->value);?>
% off</span>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['lancamento']->value=='S'){?>
					<span class="produtoSelo produtoSeloNovo">Novo</span>
					<?php }?>
				</span>
				<div class="imagemAmpliada">
					<a class="<?php echo $_smarty_tpl->tpl_vars['zoomImagem']->value;?>
" href="<?php if ($_smarty_tpl->tpl_vars['zoomImagem']->value!=''){?><?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/original/<?php echo $_smarty_tpl->tpl_vars['imagemPrincipal']->value;?>
<?php }else{ ?>javascript:;<?php }?>" title="titulo">
						<img src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/detalhe/<?php echo $_smarty_tpl->tpl_vars['imagemPrincipal']->value;?>
" alt="" />
					</a>
				</div>
				<?php if ($_smarty_tpl->tpl_vars['countImagensProduto']->value>1){?>
				<div class="thumbsGaleria">
					<ul class="thumbsGaleriaUl">
						<?php  $_smarty_tpl->tpl_vars['valueImagensProduto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueImagensProduto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaImagensProduto']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueImagensProduto']->key => $_smarty_tpl->tpl_vars['valueImagensProduto']->value){
$_smarty_tpl->tpl_vars['valueImagensProduto']->_loop = true;
?>
						<li>
							<a href="javascript:;" title="" data-tipo="foto"  data-src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/detalhe/<?php echo $_smarty_tpl->tpl_vars['valueImagensProduto']->value['IMAGEM'];?>
" data-zoom="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/original/<?php echo $_smarty_tpl->tpl_vars['valueImagensProduto']->value['IMAGEM'];?>
">
								<img src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/carrinho-de-compras/<?php echo $_smarty_tpl->tpl_vars['valueImagensProduto']->value['IMAGEM'];?>
" width="76px" height="76px" alt="" />
							</a>
						</li>
						<?php } ?>
						<!--<li>
							<a href="javascript:;" title="" data-tipo="video" data-src="http://www.youtube.com/embed/z540gKVqypY">
								<img src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/detalhe/thumb-produto.jpg" alt="" />
								<span class="iconPlayer ir">Assistir V&iacute;deo</span>
							</a>
						</li>-->
						
					</ul>
				</div>
				<?php }?>
			</div>

			<div id="infosProduto">
				<div class="infoGeralProduto">
					<h2 class="tituloProduto"><?php echo $_smarty_tpl->tpl_vars['descricaoVenda']->value;?>
</h2>
					<span class="referenciaProduto">REF: <?php echo $_smarty_tpl->tpl_vars['referencia']->value;?>
</span>
					<?php if ($_smarty_tpl->tpl_vars['idProdutoNivelAuxiliar']->value){?>
					<a class="linkLinha" href="/<?php echo $_smarty_tpl->tpl_vars['urlAmigavelPnaux']->value;?>
">+ LINHA <?php echo $_smarty_tpl->tpl_vars['descricaoProdutoNivelAuxiliar']->value;?>
</a>
					<?php }?>
					<a class="linkMaisDetalhes" href="javascript:scrollAnimate('#infosDetalhadasProduto', 2000);" title="+ ver mais detalhes sobre este produto">+ ver mais detalhes sobre este produto</a>
					
					<div class="mediaAvaliacaoProduto clearfix" style="display:none;">
						<ul class="mediaAvaliacaoProdutoUl">
							<li class="ir ok">1</li>
							<li class="ir ok">2</li>
							<li class="ir ok">3</li>
							<li class="ir ok">4</li>
							<li class="ir">5</li>
						</ul>

						<ul class="ResumoMediaAvaliacao">
							<li class="ResumoMediaAvaliacaoLi">
								<a href="javascript:;" class="btResumoMediaAvaliacao"></a>

								<div class="dropDownResumoMediaAvaliacao">
									<span class="tituloTotalAvaliacoes">Total de 13 avalia&ccedil;&otilde;es</span>

									<ul>
										<li>
											<span class="qtdeEstrelas">5 estrelas</span>
											<span class="barraEstrelas">
												<span style="width: 80px"></span>
											</span>
											<span class="qtdeAvaliacoes">(1)</span>
										</li>
										<li>
											<span class="qtdeEstrelas">4 estrelas</span>
											<span class="barraEstrelas">
												<span style="width: 30px"></span>
											</span>
											<span class="qtdeAvaliacoes">(1)</span>
										</li>
										<li>
											<span class="qtdeEstrelas">3 estrelas</span>
											<span class="barraEstrelas">
												<span style="width: 10px"></span>
											</span>
											<span class="qtdeAvaliacoes">(1)</span>
										</li>
										<li>
											<span class="qtdeEstrelas">2 estrelas</span>
											<span class="barraEstrelas">
												<span style="width: 5px"></span>
											</span>
											<span class="qtdeAvaliacoes">(1)</span>
										</li>
										<li>
											<span class="qtdeEstrelas">1 estrelas</span>
											<span class="barraEstrelas">
												<span style="width: 20px"></span>
											</span>
											<span class="qtdeAvaliacoes">(1)</span>
										</li>
									</ul>

									<a class="linkTodasAvaliacoes" href="javascript:;" title="+ Veja todas as avalia&ccedil;&otilde;es">+ Veja todas as avalia&ccedil;&otilde;es</a>
								</div>
							</li>
						</ul>					
					</div>

					<!--<a class="linkAvaliarProduto linkModal" href="#modalAvalieProduto" title="Avaliar este produto">Avaliar este produto</a>-->
					
					<?php if ($_smarty_tpl->tpl_vars['precoPromocional']->value>0){?>
					<span class="valorEconomia">Economize R$ <?php echo number_format($_smarty_tpl->tpl_vars['valorEconomize']->value,2,",",".");?>
</span>
					<?php }?>
					<span class="valorDePor">
						<?php if ($_smarty_tpl->tpl_vars['precoPromocional']->value>0){?>
							<del>De R$ <?php echo number_format($_smarty_tpl->tpl_vars['precoVenda']->value,2,",",".");?>
</del> 
							<ins>por R$ <?php echo number_format($_smarty_tpl->tpl_vars['precoPromocional']->value,2,",",".");?>
</ins>
						<?php }else{ ?>
							<ins>R$ <?php echo number_format($_smarty_tpl->tpl_vars['precoVenda']->value,2,",",".");?>
</ins>
						<?php }?>
					</span>

					<br><br>
					Cores:<br>
					<select name="corProduto" id="corProduto" onchange="location = this.options[this.selectedIndex].value;">
					<?php  $_smarty_tpl->tpl_vars['valueCor'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueCor']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrayAtributos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueCor']->key => $_smarty_tpl->tpl_vars['valueCor']->value){
$_smarty_tpl->tpl_vars['valueCor']->_loop = true;
?>
						<option <?php if ($_smarty_tpl->tpl_vars['valueCor']->value[0]['ID_COR']==$_smarty_tpl->tpl_vars['idCor']->value){?>selected="selected"<?php }?> value="/<?php echo $_smarty_tpl->tpl_vars['valueCor']->value[0]['URL_AMIGAVEL'];?>
-<?php echo $_smarty_tpl->tpl_vars['valueCor']->value[0]['URL_ATRIBUTO'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['valueCor']->value[0]['VALOR_COR'];?>
</option>
					<?php } ?>
					</select>
					<br><br>
					<?php echo $_smarty_tpl->tpl_vars['arrayAtributos']->value[$_smarty_tpl->tpl_vars['idCor']->value][0]['DESCRICAO_ATRIBUTO'];?>
:<br>
					<?php  $_smarty_tpl->tpl_vars['valueAtributo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueAtributo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrayAtributos']->value[$_smarty_tpl->tpl_vars['idCor']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueAtributo']->key => $_smarty_tpl->tpl_vars['valueAtributo']->value){
$_smarty_tpl->tpl_vars['valueAtributo']->_loop = true;
?>
						<a href="#<?php echo $_smarty_tpl->tpl_vars['valueAtributo']->value['VALOR_ATRIBUTO'];?>
" onClick="document.getElementById('idProdutoComprar').value=<?php echo $_smarty_tpl->tpl_vars['valueAtributo']->value['PRCO_ID_PRODUTO_COMBINACAO'];?>
"><?php echo $_smarty_tpl->tpl_vars['valueAtributo']->value['VALOR_ATRIBUTO'];?>
</a>
					<?php } ?>
					<br><br>

					<?php if ($_smarty_tpl->tpl_vars['precoPromocional']->value>0){?>
						<?php echo smarty_modifier_valor_parcelado($_smarty_tpl->tpl_vars['precoPromocional']->value,false);?>

					<?php }else{ ?>
						<?php echo smarty_modifier_valor_parcelado($_smarty_tpl->tpl_vars['precoVenda']->value,false);?>

					<?php }?>

					<div class="opcoesParcelamento">
						<ul>
							<li>
								<a class="btOpcoesParcelas" href="javascript:;" title="Outras op&ccedil;&otilde;es de parcelamento">
									<span>Outras op&ccedil;&otilde;es de parcelamento</span>
								</a>
								
								<div>								
									<span class="tt">Nos cart&otilde;es:</span>
									<ul class="listaParcelamento">
										<li class="ir visa">Visa</li>
										<li class="ir masterCard">Master Card</li>
										<li class="ir dinersClubInternational">Diners Club International</li>
										<li class="ir americanExpress">American Express</li>
										<li class="ir hipercard">Hipercard</li>
									</ul>

									<span class="tt">em:</span>
									<ul class="listaParcelaseValores clearfix">
										
										<li class="col col1">
											<ul>
												<?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int)min(ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? $_smarty_tpl->tpl_vars['parcelamento']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['parcelamento']->value)+1)/abs($_smarty_tpl->tpl_vars['foo']->step)),$_smarty_tpl->tpl_vars['colunasParcelamento']->value);
if ($_smarty_tpl->tpl_vars['foo']->total > 0){
for ($_smarty_tpl->tpl_vars['foo']->value = 1, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++){
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?>
													<li><?php if ($_smarty_tpl->tpl_vars['foo']->value<10){?>0<?php }?><?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
x de R$ <?php echo number_format(($_smarty_tpl->tpl_vars['precoFinalVenda']->value/$_smarty_tpl->tpl_vars['foo']->value),2,",",".");?>
 sem juros</li>
												<?php }} ?>
											</ul>	
										</li>
										<?php if ($_smarty_tpl->tpl_vars['colunasParcelamento']->value>1){?>
											<li class="col col2">
												<ul>
													<?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int)min(ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? $_smarty_tpl->tpl_vars['parcelamento']->value+1 - ($_smarty_tpl->tpl_vars['colunasParcelamento']->value+1) : $_smarty_tpl->tpl_vars['colunasParcelamento']->value+1-($_smarty_tpl->tpl_vars['parcelamento']->value)+1)/abs($_smarty_tpl->tpl_vars['foo']->step)),12);
if ($_smarty_tpl->tpl_vars['foo']->total > 0){
for ($_smarty_tpl->tpl_vars['foo']->value = $_smarty_tpl->tpl_vars['colunasParcelamento']->value+1, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++){
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?>
														<li><?php if ($_smarty_tpl->tpl_vars['foo']->value<10){?>0<?php }?><?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
x de R$ <?php echo number_format(($_smarty_tpl->tpl_vars['precoFinalVenda']->value/$_smarty_tpl->tpl_vars['foo']->value),2,",",".");?>
 sem juros</li>
													<?php }} ?>
												</ul>	
											</li>
										<?php }?>
									</ul>
								</div>
							</li>
						</ul>
					</div>
					
					<?php if ($_smarty_tpl->tpl_vars['descontoBoleto']->value>0){?>
					<span class="valorVista">
						<strong>ou R$ <?php echo number_format($_smarty_tpl->tpl_vars['precoNoBoleto']->value,2,",",".");?>
</strong>
						<span>no boleto ou transfer&ecirc;ncia banc&aacute;ria</span>
						<span>(<?php echo $_smarty_tpl->tpl_vars['descontoBoleto']->value;?>
% de desconto)</span>
					</span>
					<?php }?>
				

				</div>
				<div class="acoesProduto">
					<div id="armored_website_02">
					    <param id="aw_preload" value="true" />
					</div>
					<script type="text/javascript" src="//selo.siteblindado.com/aw.js"></script>
					
					<span class="linkCompraSegura linkModal" title="Compra 100% segura Comlines">Compra 100% segura Comlines</span>

					<!-- <a class="linkCompraSegura linkModal" href="#modalCompraSegura" title="Compra 100% segura Comlines">Compra 100% segura Comlines</a> -->

					<?php if ($_smarty_tpl->tpl_vars['saldo']->value>0){?><span class="disponibilidadeProduto">Dispon&iacute;vel para envio imediato</span><?php }?>

					<?php if ($_smarty_tpl->tpl_vars['saldo']->value==1){?><span class="restamPoucos">Resta apenas <?php echo $_smarty_tpl->tpl_vars['saldo']->value;?>
 item.</span><?php }elseif($_smarty_tpl->tpl_vars['saldo']->value<=5&&$_smarty_tpl->tpl_vars['saldo']->value>0){?><span class="restamPoucos">Restam apenas <?php echo $_smarty_tpl->tpl_vars['saldo']->value;?>
 itens.</span><?php }?>
					
					<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['idProdutoCombinacao']->value;?>
" name="idProdutoComprar" id="idProdutoComprar" />

					<a class="btComprar" href="javascript:fnComprarProduto($('#idProdutoComprar').val(), 'true');" title="Comprar">Comprar</a>
					<a class="btAdicionarCarrinho" href="javascript:fnComprarProduto($('#idProdutoComprar').val(), 'false');" title="">Adicionar ao Carrinho e continuar comprando</a>
					
					<ul class="AdicionarListasUl">
						<li>
							<a class="btAdicionarListaCasamento" href="javascript:fnAdicionaListaCasamento('<?php echo $_smarty_tpl->tpl_vars['idPessoa']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['idProdutoCombinacao']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['urlAmigavel']->value;?>
');" title="Adicionar a lista de casamento">Adicionar a lista de casamento</a>
						</li>
						<li>
							<a class="btAdicionarListaDesejos" href="<?php echo $_smarty_tpl->tpl_vars['LINK']->value;?>
lista-desejos&addProduto=true&idProduto=<?php echo $_smarty_tpl->tpl_vars['idProdutoCombinacao']->value;?>
" title="Adicionar a lista de desejos">Adicionar a lista de desejos</a>
						</li>
					</ul>
				</div>
				

				<div class="consultaPrazoEntrega" style="display:none;">
					<div class="blocoConsulta">
						<span class="tituloConsultePrazoEntrega">Consulte a previs&atilde;o de entrega e valor do frete:</span>

						<form id="formConsultaPrazoEntrega" method="" action="">
							<input type="text" id="iptConsultaCep" name="iptConsultaCep" maxlength="8" />
							<input type="button" id="btConsultar" value="Calcular" /> 
							<a class="linkNaoSabeCep linkModal" target="_blank" href="http://www.buscacep.correios.com.br/" title="N&atilde;o sabe seu CEP?">N&atilde;o sabe seu CEP?</a><!--#modalConsultarCep-->
						</form>
					</div>
					<div class="blocoConsultaLoader"><img src="../img/backgrounds/loader_actions.gif"></div>
					<div class="blocoResultadoConsulta">
						
						<!--<span class="statusProdutoCep">Produto em estoque</span>-->
					</div>
				</div>
			</div>
		</div>

		<div id="compartilheProduto">
			<span class="tituloCompartilhe">Gostou? Compartilhe!</span>

			<ul class="btsRedesSociais">
				<li>
					<div class="fb-like" data-href="<?php echo $_smarty_tpl->tpl_vars['urlAtual']->value;?>
" data-width="450" data-layout="button_count" data-show-faces="true" data-send="true"></div>
				</li>
				<li class="twitter">
					<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://loja.comlines.com.br">Tweet</a>
					<script>!function(d,s,id){ var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){ js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
				</li>

				<!-- <li>
					<a href="//pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" ><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" /></a>
					<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
				</li> -->

				<!--<li>
					<a class="btEnvieAmigo linkModal" href="#modalEnviarAmigo" title=""><span>Envie para um amigo</span></a>
				</li>-->
			</ul>
		</div>

		<?php if (count($_smarty_tpl->tpl_vars['listaProdutoSite']->value)>0){?>
		<div id="moduloCompreJunto">
			<span class="tituloModulo">Aproveite e Compre Junto</span>
			
			<a class="ir btModuloSlideAnterior" href="javascript:;" title="slide anterior">slide anterior</a>
			<a class="ir btModuloSlideProximo" href="javascript:;" title="pr&oacute;ximo slide">pr&oacute;ximo slide</a>

			
			<div class="slideCompreJunto">
				<?php echo $_smarty_tpl->getSubTemplate ("../templates/includes/_produtos.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			</div>

		</div>
		<?php }?>

		<div id="infosDetalhadasProduto">
			<ul class="menuAbasProduto">
				<li class="selected">
					<a href="javascript:;" title="Detalhes sobre o Produto">
						Detalhes sobre o Produto
					</a>
				</li>
				<li>
					<a href="javascript:;" title="Detalhes sobre o Produto">
						Descri&ccedil;&atilde;o Geral / Orienta&ccedil;&otilde;es
					</a>
				</li>
				<!--<li>
					<a href="javascript:;" title="Avalia&ccedil;&otilde;es deste produto">
						Avalia&ccedil;&otilde;es deste produto
					</a>
				</li>-->
			</ul>

			<div class="conteudoAbasProduto">
				<div class="aba aba1 cmsLoja">
					<?php echo $_smarty_tpl->tpl_vars['descricaoCurta']->value;?>

					<br><br>*as imagens s&atilde;o meramente ilustrativas e n&atilde;o se referem ao tamanho e quantidade do produto.
				</div>
				<?php if ($_smarty_tpl->tpl_vars['descricaoLonga']->value){?>
				<div class="aba aba2 cmsLoja">
					<?php echo $_smarty_tpl->tpl_vars['descricaoLonga']->value;?>

				</div>
				<?php }?>
				<!--
				<div class="aba aba3">
					<div class="topo-aba3">
						<div class="avaliacaoGeral">
							<span class="titulo">Avalia&ccedil;&atilde;o Geral</span>
							<ul class="mediaGeral">
								<li class="ir ok">1</li>
								<li class="ir ok">2</li>
								<li class="ir ok">3</li>
								<li class="ir">4</li>
								<li class="ir">5</li>
							</ul>
							<span class="totalAvaliacoes">Total de 8 Avalia&ccedil;&otilde;es</span>
						</div>

						<div class="avalieProduto">
							<span class="titulo">J&aacute; tem este produto?</span>
							<span class="chamada">Compartilhe sua opini&atilde;o com a gente.</span>
							<a href="#modalAvalieProduto" class="btAvaliarProduto linkModal" title="Avaliar Produto">Avaliar Produto</a>
						</div>
					</div>

					<div class="detalheAvaliacoes">
						<ul>
							<li class="detalheAvaliacao clearfix">
								<ul class="avaliacao">
									<li class="ir ok">1</li>
									<li class="ir ok">2</li>
									<li class="ir ok">3</li>
									<li class="ir">4</li>
									<li class="ir">5</li>
								</ul>

								<div class="descricaoAvaliacao">
									<span class="tituloAvaliacao">Excelente modelagem, tecido de qualidade!</span>
									<p>Excelente modelagem, tecido de qualidade! N&atilde;o tenho do que reclamar, esta camiseta supriu todas minhas espectativas.</p>
								
									<div class="UtilidadeInfo">
										<span class="tituloInformacaoUtil">Esta informa&ccedil;&atilde;o foi &uacute;til?</span>
										<a class="util" href="javascript:;" title="Sim">Sim(42)</a>
										<a class="inutil" href="javascript:;" title="N&atilde;o">N&atilde;o</a> 
									</div>
								</div>
							</li>							
							<li class="detalheAvaliacao clearfix">
								<ul class="avaliacao">
									<li class="ir ok">1</li>
									<li class="ir ok">2</li>
									<li class="ir ok">3</li>
									<li class="ir">4</li>
									<li class="ir">5</li>
								</ul>

								<div class="descricaoAvaliacao">
									<span class="tituloAvaliacao">Excelente modelagem, tecido de qualidade!</span>
									<p>Excelente modelagem, tecido de qualidade! N&atilde;o tenho do que reclamar, esta camiseta supriu todas minhas espectativas.</p>
								
									<div class="UtilidadeInfo">
										<span class="tituloInformacaoUtil">Esta informa&ccedil;&atilde;o foi &uacute;til?</span>
										<a class="util" href="javascript:;" title="Sim">Sim(42)</a>
										<a class="inutil" href="javascript:;" title="N&atilde;o">N&atilde;o</a> 
									</div>
								</div>
							</li>
							<li class="detalheAvaliacao clearfix">
								<ul class="avaliacao">
									<li class="ir ok">1</li>
									<li class="ir ok">2</li>
									<li class="ir ok">3</li>
									<li class="ir">4</li>
									<li class="ir">5</li>
								</ul>

								<div class="descricaoAvaliacao">
									<span class="tituloAvaliacao">Excelente modelagem, tecido de qualidade!</span>
									<p>Excelente modelagem, tecido de qualidade! N&atilde;o tenho do que reclamar, esta camiseta supriu todas minhas espectativas.</p>
								
									<div class="UtilidadeInfo">
										<span class="tituloInformacaoUtil">Esta informa&ccedil;&atilde;o foi &uacute;til?</span>
										<a class="util" href="javascript:;" title="Sim">Sim(42)</a>
										<a class="inutil" href="javascript:;" title="N&atilde;o">N&atilde;o</a> 
									</div>
								</div>
							</li>
							<li class="detalheAvaliacao clearfix">
								<ul class="avaliacao">
									<li class="ir ok">1</li>
									<li class="ir ok">2</li>
									<li class="ir ok">3</li>
									<li class="ir">4</li>
									<li class="ir">5</li>
								</ul>

								<div class="descricaoAvaliacao">
									<span class="tituloAvaliacao">Excelente modelagem, tecido de qualidade!</span>
									<p>Excelente modelagem, tecido de qualidade! N&atilde;o tenho do que reclamar, esta camiseta supriu todas minhas espectativas.</p>
								
									<div class="UtilidadeInfo">
										<span class="tituloInformacaoUtil">Esta informa&ccedil;&atilde;o foi &uacute;til?</span>
										<a class="util" href="javascript:;" title="Sim">Sim(42)</a>
										<a class="inutil" href="javascript:;" title="N&atilde;o">N&atilde;o</a> 
									</div>
								</div>
							</li>
							<li class="detalheAvaliacao clearfix">
								<ul class="avaliacao">
									<li class="ir ok">1</li>
									<li class="ir ok">2</li>
									<li class="ir ok">3</li>
									<li class="ir">4</li>
									<li class="ir">5</li>
								</ul>

								<div class="descricaoAvaliacao">
									<span class="tituloAvaliacao">Excelente modelagem, tecido de qualidade!</span>
									<p>Excelente modelagem, tecido de qualidade! N&atilde;o tenho do que reclamar, esta camiseta supriu todas minhas espectativas.</p>
								
									<div class="UtilidadeInfo">
										<span class="tituloInformacaoUtil">Esta informa&ccedil;&atilde;o foi &uacute;til?</span>
										<a class="util" href="javascript:;" title="Sim">Sim(42)</a>
										<a class="inutil" href="javascript:;" title="N&atilde;o">N&atilde;o</a> 
									</div>
								</div>
							</li>
						</ul>
					</div>

				</div>-->

			</div>
			<a href="javascript:;" class="btVoltarTopo" title="voltar ao topo">Voltar ao topo</a>
		</div>
	</div>
</div>


<!-- MODAL - FEEDBACK AVALIACAO ENVIADA -->
<div id="modalFeedbackAvaliacao" class="modal">
	<span class="ttModal">Obrigado pela sua opini&atilde;o!</span>
	<p>
		Sua avalia&ccedil;&atilde;o passar&aacute; por uma aprova&ccedil;&atilde;o. <br/>
		Caso seja aceita, pode levar de 3 a 5 dias &uacute;teis para aparecer no site.
	</p>
</div>

<!-- MODAL - AVALIE ESTE PRODUTO -->
<div id="modalAvalieProduto" class="modal">
	<div class="divModal">
		<span class="ttModal">Avalie este produto</span>
		<p>
			Diga o que voc&ecirc; achou deste produto e ajude outras pessoas a fazerem a escolha certa.
		</p>
		
		<form id="formAvalieProduto" action="" method="">
			<ul class="ulForm">
				<li>
					<span class="ttCampo">Sua avalia&ccedil;&atilde;o</span>
					<ul class="avalieNotas">
						<li><a href="javascript:;" class="ir">1</a></li>
						<li><a href="javascript:;" class="ir">2</a></li>
						<li><a href="javascript:;" class="ir">3</a></li>
						<li><a href="javascript:;" class="ir">4</a></li>
						<li><a href="javascript:;" class="ir">5</a></li>
					</ul>
				</li>

				<li>
					<label class="ttCampo" for="iptTituloAvaliacao">T&iacute;tulo</label>
					<input type="text" name="iptTituloAvaliacao" id="iptTituloAvaliacao" />
				</li>

				<li>
					<label class="ttCampo" for="txtAreaAvaliacao">Avalia&ccedil;&atilde;o</label>
					<textarea type="text" name="txtAreaAvaliacao" id="txtAreaAvaliacao"></textarea>

				</li>

				<li>
					<label id="labelConcordoAvaliacao">
						<input type="checkbox" name="checkConcordoAvaliacao" id="checkConcordoAvaliacao" />
						<span class="ttConcordoAvaliacao">concordo com a pol&iacute;tica de avalia&ccedil;&atilde;o</span>
					</label>
				</li>

				<li class="last">
					<input type="submit" id="btSubmit" value="Enviar Avalia&ccedil;&atilde;o" />
				</li>
			</ul>
		</form>
	</div>
	<div class="msgSucessoModal">
		<span class="ttModal">Obrigado pela sua opini&atilde;o!</span>
		<p>
			Sua avalia&ccedil;&atilde;o passar&aacute; por uma aprova&ccedil;&atilde;o. <br/>
			Caso seja aceita, pode levar de 3 a 5 dias &uacute;teis para aparecer no site.
		</p>
	</div>

</div>

<!-- MODAL - ENVIAR AMIGO-->
<div id="modalEnviarAmigo" class="modal">
		<span class="ttModal">Enviar para um amigo</span>
		<p>Achou este produto a cara do seu amigo? Ent&atilde;o envie o link para ele conhecer o produto.</p>

		<form id="formEnviarAmigo" action="" method="">
			<ul class="ulForm ulFormInfosAmigo">
				<li>
					<label for="iptNomeAmigo">Nome do amigo</label>
					<input type="text" name="iptNomeAmigo" id="iptNomeAmigo" />
				</li>
				<li>
					<label for="iptEmailAmigo">E-mail do amigo</label>
					<input type="text" name="iptEmailAmigo" id="iptEmailAmigo" />
				</li>
				<li class="liMensagemAmigo">
					<label for="textAreaMensagemAmigo">Mensagem</label>
					<textarea id="textAreaMensagem"></textarea>
				</li>
			</ul>

			<ul class="ulFormSuasInfos">
				<li>
					<label for="iptSeuNome">Seu nome</label>
					<input type="text" name="iptSeuNome" id="iptSeuNome" />
				</li>
				<li>
					<label for="iptSeuEmail">Seu e-mail</label>
					<input type="text" name="iptSeuEmail" id="iptSeuEmail" />
				</li>
			</ul>

			<input type="submit" id="btEnviarAmigo" value="Enviar" />
		</form>
</div>

<!-- MODAL - CONSULTAR CEP-->
<div id="modalConsultarCep" class="modal">
	<span class="ttModal">Consulta de CEP</span>

	<div class="blocoConsulta">
		<div class="erroCepNaoEncontrado divErroForm">
			<span class="ttErro">CEP n&atilde;o encontrado. Tente Outro Endere&ccedil;o!</span>
			<p>
				N&atilde;o encontramos nenhum CEP referente ao endere&ccedil;o: <br/>
				Rua Juiz de Fora, S&atilde;o Leopoldo / RS
			</p>
		</div>

		<p>Para saber seu CEP,  informe seu endere&ccedil;o:</p>

		<form id="formConsultaCep" action="" method="">
			<ul class="ulForm">
				<li>
					<label for="iptRua">Endere&ccedil;o:<label>

					<div class="divSelectRua divSelectPersonalizado">
						<select id="selectRua" name="selectRua">
							<option>Rua</option>
						</select>
					</div>

					<input type="text" name="iptRua" id="iptRua" />
				</li>
				
				<li>
					<label for="iptCidade">Cidade:</label>
					<input type="text" name="iptCidade" id="iptCidade" />
				</li>
				
				<li>
					<label for="selectEstado">Estado:</label>
					<div class="divSelectEstado divSelectPersonalizado">
						<select id="selectEstado" name="selectEstado">
							<option>Selecione</option>
						</select>
					</div>
				</li>
				
				<li class="liBotaoConsulta">
					<input type="submit" id="btConsultarCep" value="Consultar CEP" />
				</li>
			</ul>
		</form>

	</div>

	<div class="blocoResultadoConsulta">
		<p>O CEP referente ao endereço informado é:</p>
		<div class="resultadoCep">
			<span class="cep">93145-210</span>
			<span class="endereco">Rua Juíz de Fora, São Leopoldo / RS</span>
		</div>

		<a class="btCalcularEntregaCep" title="Calcular" href="javascript:;">Calcular frete com este CEP</a>

		<a class="btConsultarOutroCep" title="Consultar outro CEP" href="javascript:;">Consultar outro CEP</a>	
	</div>
</div>

<!-- MODAL - COMPRA SEGURA -->
<div id="modalCompraSegura" class="modal">
	<span class="ttModal">Compra 100% Segura Comlines</span>
</div>
<!-- <a href="#modalListaCasamento" class="linkModal">asasas</a> -->

<!-- MODAL LISTA CASAMENTO -->
<div id="modalListaCasamento">
	<div id="modalContent">
		<a id="modalFechar" class="ir" href="javascript:fnFechaModalListaCasamento('N');">
			Fechar Modal
			<span class="icone"></span>
		</a>

		<span class="modalTitulo">
			<span>Produto adicionado a lista<br>
			de casamento com sucesso!</span>
		</span>
		<div class="modalProduto table">
			<div class="table-cell">
				<img class="produtoImagem" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/listagem/<?php echo $_smarty_tpl->tpl_vars['imagemPrincipal']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['descricaoVenda']->value;?>
" />
				<div class="produtoInformacoes">
					<span class="produtoTitulo"><?php echo $_smarty_tpl->tpl_vars['descricaoVenda']->value;?>
</span>
					<span class="produtoValor">
						<?php if ($_smarty_tpl->tpl_vars['precoPromocional']->value>0){?>
							R$ <?php echo number_format($_smarty_tpl->tpl_vars['precoPromocional']->value,2,",",".");?>

						<?php }else{ ?>
							R$ <?php echo number_format($_smarty_tpl->tpl_vars['precoVenda']->value,2,",",".");?>

						<?php }?>

						<div class="centerQuantidade clearfix">
							<a class="tdQuantidadeBt btRemoverQuantidade" id="btRemoverQuantidade" href="javascript:;">
								<span class="icone"></span>
							</a>
							<input type="text" name="iptQtdeProduto" class="iptQtdeProduto" id="iptQtdeProduto" value="<?php echo number_format($_smarty_tpl->tpl_vars['qtdSolicitadaListaCasamento']->value);?>
" />
							<a class="tdQuantidadeBt btAddQuantidade" id="btAddQuantidade" href="javascript:;">
								<span class="icone"></span>
							</a>
						</div>
					
					</span>
				</div>
				<a title="Close" class="modalBt modalBtContinuar" href="javascript:fnFechaModalListaCasamento('<?php echo $_smarty_tpl->tpl_vars['valueNavegacaoCategoria']->value['URL_AMIGAVEL'];?>
');">Adicionar mais produtos
					<span class="btIcone"></span>
				</a>
				<a class="modalBt modalBtIr" href="/lista-de-casamento-editar-produtos/">
					Ir para a Lista
					<span class="btIcone"></span>
				</a>
			</div>
		</div>
	</div>
</div>

<?php }} ?>