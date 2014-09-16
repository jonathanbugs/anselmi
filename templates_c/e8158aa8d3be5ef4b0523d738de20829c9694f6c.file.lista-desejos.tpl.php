<?php /* Smarty version Smarty-3.1.10, created on 2014-09-16 11:45:32
         compiled from "templates/lista-desejos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:40499484854184d0c3eae55-62777599%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8158aa8d3be5ef4b0523d738de20829c9694f6c' => 
    array (
      0 => 'templates/lista-desejos.tpl',
      1 => 1406203476,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40499484854184d0c3eae55-62777599',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'listaCategoriaDesejo' => 0,
    'LINK' => 0,
    'key' => 0,
    'value' => 0,
    'countProdutoDesejo' => 0,
    'listaProdutoDesejo' => 0,
    'MIDIA_DIR' => 0,
    'valueProdutoSite' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_54184d0c4c1778_45626139',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54184d0c4c1778_45626139')) {function content_54184d0c4c1778_45626139($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_valor_parcelado')) include '/Applications/MAMP/htdocs/anselmi/smarty/plugins/modifier.valor_parcelado.php';
?><div class="container">
	<div id="produtosContent" class="clearfix">
		<div class="navegacaoContent">
			<h2 class="tituloPagina">Lista de Desejos</h2>
		</div>

		
		<div id="loadProdutoDesejos">
		<!-- SIDEBAR CATEGORIAS -->
		<div class="sidebarCategorias">
			<ul class="categoriasUl categoriasUlListaDesejos">
				<li class="categoriasLi categoriaMae">
					<a href="javascript:;" class="categoriasLink">Categorias</a>
				</li>
				<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['listaCategoriaDesejo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['value']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
 $_smarty_tpl->tpl_vars['value']->iteration++;
?>
				<li class="categoriaFilha">
					<a class="categoriasLink categoriasLinkFirst" href="<?php echo $_smarty_tpl->tpl_vars['LINK']->value;?>
lista-desejos/&idcate=<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
						<span><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</span>
					</a>
				</li>
				<?php } ?>
			</ul>
		</div>

		<div class="produtosListagem produtosListagemFull clearfix">
			<div class="auxiliarFiltros">
				<div class="contentAuxiliarFiltros">
					<div class="boxTipoLista">
						<span class="visualizandoTxt">Mostrando <span>1</span> - <span><?php echo $_smarty_tpl->tpl_vars['countProdutoDesejo']->value;?>
</span> de <span><?php echo $_smarty_tpl->tpl_vars['countProdutoDesejo']->value;?>
</span> em <span>1</span> p&aacute;ginas</span>
					</div>

				<!-- PAGINACAO ANTES DA LISTAGEM 
					<div class="contentPaginacao contentPaginacaoFiltro table">
						<ul class="paginacaoUl clearfix">
							<li class="paginacaoLi">
								<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros paginacaoLinksNumerosSetas">
									&lt;
								</a>
							</li>
							<li class="paginacaoLi">
								<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros">1</a>
							</li>
							<li class="paginacaoLi">
								<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros">2</a>
							</li>
							<li class="paginacaoLi">
								<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros paginacaoLinksAtivo">3</a>
							</li>
							<li class="paginacaoLi">
								<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros">4</a>
							</li>
							<li class="paginacaoLi">
								<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros">5</a>
							</li>
							<li class="paginacaoLi">
								<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros paginacaoLinksNumerosSetas paginacaoLinksNumerosLast">
									&gt;
								</a>
							</li>
						</ul>
					</div>-->
				</div>
			</div>
			<ul class="produtoUl clearfix">
				<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaProdutoDesejo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['value']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['value']->iteration++;
?>
				<li class="produtoLi clearfix <?php if ($_smarty_tpl->tpl_vars['value']->iteration==1){?>produtoLiFirst<?php }?>" id="li-<?php echo $_smarty_tpl->tpl_vars['value']->value['ID_PRODUTO_DESEJO'];?>
">
					<div class="produtoImagem">
						<img src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/listagem/<?php echo $_smarty_tpl->tpl_vars['value']->value['IMAGEM'];?>
" alt="" />
					</div>
					<div class="produtoInformacoes">
						<span class="produtoTitulo"><?php echo $_smarty_tpl->tpl_vars['value']->value['DESCRICAO_VENDA'];?>
</span>
						<span class="produtoValor">
							<?php if ($_smarty_tpl->tpl_vars['valueProdutoSite']->value['PRECO_PROMOCIONAL']>0){?>
							<span class="produtoValorAntigo">De R$ <?php echo number_format($_smarty_tpl->tpl_vars['value']->value['PRECO_VENDA'],2,",",".");?>
</span>
							por R$ <?php echo number_format($_smarty_tpl->tpl_vars['value']->value['PRECO_PROMOCIONAL'],2,",",".");?>

							<?php }else{ ?>
							R$ <?php echo number_format($_smarty_tpl->tpl_vars['value']->value['PRECO_VENDA'],2,",",".");?>

							<?php }?>
						</span>
						<span class="produtoValorParcelado">
							<?php echo smarty_modifier_valor_parcelado($_smarty_tpl->tpl_vars['value']->value['PRECO_VENDA']);?>

						</span>
						<!--<span class="produtoValorVista">ou R$ 889,90 no boleto</span>-->
						<div class="produtoBts">
							<!--<a href="javascript:;" class="produtoBt produtoBtAdcionar">Adicionar a lista de casamento</a>-->
							<a href="javascript:removerProdutoDesejo(<?php echo $_smarty_tpl->tpl_vars['value']->value['ID_PRODUTO_DESEJO'];?>
);" class="produtoBt produtoBtRemover">Remover produto da lista</a>
						</div>
					</div>
					<div class="produtoOpcoes">
						<a href="javascript:fnComprarProduto(<?php echo $_smarty_tpl->tpl_vars['value']->value['PRCO_ID_PRODUTO_COMBINACAO'];?>
, 'true');" class="btOpces btOpcesComprar">
							Comprar <span class="icone"></span>
						</a>
						<a href="javascript:fnComprarProduto(<?php echo $_smarty_tpl->tpl_vars['value']->value['PRCO_ID_PRODUTO_COMBINACAO'];?>
, 'false');" class="btOpces btOpcesAdicionar">
							Adicionar ao Carrinho e continuar comprando
						</a>
					</div>
				</li>
				<?php } ?>				
			</ul>

			<!-- PAGINACAO DEPOIS DA LISTAGEM 
			<div class="contentPaginacao contentPaginacaoFull table">
				<ul class="paginacaoUl clearfix">
					<li class="paginacaoLi">
						<a href="javascript:;" class="paginacaoLinks paginacaoLinksNormal paginacaoLinksNormalFirst">primeira</a>
					</li>
					<li class="paginacaoLi">
						<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros paginacaoLinksNumerosSetas">&lt;</a>
					</li>
					<li class="paginacaoLi">
						<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros">1</a>
					</li>
					<li class="paginacaoLi">
						<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros paginacaoLinksAtivo">2</a>
					</li>
					<li class="paginacaoLi">
						<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros">3</a>
					</li>
					<li class="paginacaoLi">
						<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros">4</a>
					</li>
					<li class="paginacaoLi">
						<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros">5</a>
					</li>
					<li class="paginacaoLi">
						<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros">6</a>
					</li>
					<li class="paginacaoLi">
						<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros">7</a>
					</li>
					<li class="paginacaoLi">
						<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros">8</a>
					</li>
					<li class="paginacaoLi">
						<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros">9</a>
					</li>
					<li class="paginacaoLi">
						<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros">10</a>
					</li>
					<li class="paginacaoLi">
						<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros">11</a>
					</li>
					<li class="paginacaoLi">
						<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros">12</a>
					</li>
					<li class="paginacaoLi">
						<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros">13</a>
					</li>
					<li class="paginacaoLi">
						<a href="javascript:;" class="paginacaoLinks paginacaoLinksNumeros paginacaoLinksNumerosSetas paginacaoLinksNumerosLast">&gt;</a>
					</li>
					<li class="paginacaoLi">
						<a href="javascript:;" class="paginacaoLinks paginacaoLinksNormal paginacaoLinksNormalLast">&uacute;ltima</a>
					</li>
				</ul>
			</div>-->
			<!--<span class="visualizandoTxtRodape">
				Mostrando <span>34</span> - <span>96</span> de <span>349</span> em <span>13</span> p&aacute;ginas
			</span>-->
		</div>
		</div>
	</div>
</div>
<?php }} ?>