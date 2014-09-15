<?php /* Smarty version Smarty-3.1.10, created on 2014-01-09 16:52:57
         compiled from "templates\lista-de-casamento-editar-produtos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:106652cef0093b8fa4-74044035%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '508def20621a763dbe4179bb1a3a7ec7ae89ea89' => 
    array (
      0 => 'templates\\lista-de-casamento-editar-produtos.tpl',
      1 => 1389203961,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '106652cef0093b8fa4-74044035',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'listaProdutoSite' => 0,
    'value' => 0,
    'MIDIA_DIR' => 0,
    'valueProdutoSite' => 0,
    'produtoQuantidade' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_52cef0094a3de4_36116240',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52cef0094a3de4_36116240')) {function content_52cef0094a3de4_36116240($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_valor_parcelado')) include 'C:\\wamp\\www\\lojas\\comlines\\smarty\\plugins\\modifier.valor_parcelado.php';
?><!-- <!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Divulgar Lista de Casamento Divulgar Lista</title> -->

		<link rel="stylesheet" href="../lista-casamento/css/template.css"/>
		<link rel="stylesheet" href="../lista-casamento/css/lista-de-casamento-divulgar-lista.css"/>
		
		<link href="../lista-casamento/css/jquery.tagit.css" rel="stylesheet" type="text/css">
		<link href="../lista-casamento/css/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
	<!-- </head>
	<body class="bgListaCasamento">
		<div id="wrapper"> -->
			<div class="containerGeral">
				<header id="topo"></header>
			
				<?php echo $_smarty_tpl->getSubTemplate ("../lista-casamento/includes/topo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

				
				<section id="conteudoLista">
					<div id="produtosContent" class="clearfix">
						<div class="sidebarCategorias">
							<?php echo $_smarty_tpl->getSubTemplate ("../lista-casamento/includes/_sidebar_lista_casamento.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

						</div>
						<div class="produtosListagem produtosListagemFull clearfix">
							<h2 class="tituloPagina">Editar Produtos</h2>
							<section class="sessao sessaoEnvie">
								<ul class="produtoUl clearfix">
									<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaProdutoSite']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['value']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['value']->iteration++;
?>
									<li class="produtoLi clearfix <?php if ($_smarty_tpl->tpl_vars['value']->iteration==1){?>produtoLiFirst<?php }?>" id="li-<?php echo $_smarty_tpl->tpl_vars['value']->value['PCAV_ID_PRODUTO_COMBINACAO_ATR'];?>
">
										<div class="produtoImagem">
											<img src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/listagem/<?php echo $_smarty_tpl->tpl_vars['value']->value['IMAGEM_PRINCIPAL'];?>
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
												<a href="javascript:removerProdutoListaCasamento(<?php echo $_smarty_tpl->tpl_vars['value']->value['PCAV_ID_PRODUTO_COMBINACAO_ATR'];?>
);" class="produtoBt produtoBtRemover">Remover produto da lista</a>
											</div>
											
										</div>

										<div class="produtoOpcoes">
											<a href="javascript:fnComprarProduto(<?php echo $_smarty_tpl->tpl_vars['value']->value['PCAV_ID_PRODUTO_COMBINACAO_ATR'];?>
, 'true');" class="btOpces btOpcesComprar">
												Comprar <span class="icone"></span>
											</a>
											<a href="javascript:fnComprarProduto(<?php echo $_smarty_tpl->tpl_vars['value']->value['PCAV_ID_PRODUTO_COMBINACAO_ATR'];?>
, 'false');" class="btOpces btOpcesAdicionar">
												Adicionar ao Carrinho e continuar comprando
											</a>
										</div>
										<div class="produtoQuantidade">
											<div class="centerQuantidade clearfix">
												<a class="tdQuantidadeBt btRemoverQuantidade" id="btRemoverQuantidade-<?php echo $_smarty_tpl->tpl_vars['value']->value['PCAV_ID_PRODUTO_COMBINACAO_ATR'];?>
" href="javascript:;">
													<span class="icone"></span>
												</a>
												<input type="text" name="iptQtdeProduto" class="iptQtdeProduto" id="iptQtdeProduto-<?php echo $_smarty_tpl->tpl_vars['value']->value['PCAV_ID_PRODUTO_COMBINACAO_ATR'];?>
" value="<?php echo number_format($_smarty_tpl->tpl_vars['produtoQuantidade']->value[$_smarty_tpl->tpl_vars['value']->value['PCAV_ID_PRODUTO_COMBINACAO_ATR']]['QTD_SOLICITADA']);?>
" />
												<a class="tdQuantidadeBt btAddQuantidade" id="btAddQuantidade-<?php echo $_smarty_tpl->tpl_vars['value']->value['PCAV_ID_PRODUTO_COMBINACAO_ATR'];?>
" href="javascript:;">
													<span class="icone"></span>
												</a>
											</div>
											<div class="produtoVendido"><?php echo number_format($_smarty_tpl->tpl_vars['produtoQuantidade']->value[$_smarty_tpl->tpl_vars['value']->value['PCAV_ID_PRODUTO_COMBINACAO_ATR']]['QTD_VENDIDA']);?>
 vendido(s)</div>
										</div>
									</li>
									<?php } ?>				
								</ul>
							</section>
						</div>
					</div>
				</section>
			</div>
			<script type="text/javascript" src="../lista-casamento/js/funcoes.js"></script>
			<script type="text/javascript" src="../lista-casamento/js/lista-de-casamento-produto-editar.js"></script>
			
		<!-- </div>

	
		
	</body>
</html>
 --><?php }} ?>