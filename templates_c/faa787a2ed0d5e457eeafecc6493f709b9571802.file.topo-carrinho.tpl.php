<?php /* Smarty version Smarty-3.1.10, created on 2014-05-21 11:44:39
         compiled from "templates\topo-carrinho.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12810537cbbd7ef2ee0-90771056%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'faa787a2ed0d5e457eeafecc6493f709b9571802' => 
    array (
      0 => 'templates\\topo-carrinho.tpl',
      1 => 1377794351,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12810537cbbd7ef2ee0-90771056',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'quantidadeTotalCarrinhoTopo' => 1,
    'listaProdutoCarrinhoTopo' => 1,
    'valueProdutoCarrinhoTopo' => 1,
    'MIDIA_DIR' => 1,
    'precoTotalVendaCarrinhoTopo' => 1,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_537cbbd8016569_07184045',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_537cbbd8016569_07184045')) {function content_537cbbd8016569_07184045($_smarty_tpl) {?><ul class="produtosCarrinhoUl" id="produtosCarrinhoUl">
	<li class="produtosCarrinhoLi">
		<a class="produtosCarrinhoLink" href="/carrinho">
			<span class="carrinhoIcon"></span>
			<span class="carrinhoTxt">Meu Carrinho</span>
			<span class="carrinhoItens">(<?php echo $_smarty_tpl->tpl_vars['quantidadeTotalCarrinhoTopo']->value;?>
 itens)</span>
		</a>
		<ul class="carrinhoUl">
			<li>
				<ul class="carrinhoItensUl scroll">
					<?php  $_smarty_tpl->tpl_vars['valueProdutoCarrinhoTopo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueProdutoCarrinhoTopo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaProdutoCarrinhoTopo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueProdutoCarrinhoTopo']->key => $_smarty_tpl->tpl_vars['valueProdutoCarrinhoTopo']->value){
$_smarty_tpl->tpl_vars['valueProdutoCarrinhoTopo']->_loop = true;
?>
					<li class="carrinhoLi">
						<a class="carrinhoLink" href="<?php echo $_smarty_tpl->tpl_vars['valueProdutoCarrinhoTopo']->value['URL_AMIGAVEL'];?>
.html">
							<img class="carrinhoImg" src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
produtos/carrinho/<?php echo $_smarty_tpl->tpl_vars['valueProdutoCarrinhoTopo']->value['IMAGEM_PRINCIPAL'];?>
" alt="" />
							<span class="carrinhoProdutoTitulo"><?php echo $_smarty_tpl->tpl_vars['valueProdutoCarrinhoTopo']->value['DESCRICAO_VENDA'];?>
</span>
							<span class="carrinhoProdutoQuantidade">Qtde: <?php echo number_format($_smarty_tpl->tpl_vars['valueProdutoCarrinhoTopo']->value['QUANTIDADE']);?>
</span>
							<span class="carrinhoProdutoValor">R$ <?php echo number_format($_smarty_tpl->tpl_vars['valueProdutoCarrinhoTopo']->value['PRECO_UNITARIO_VENDA'],2,",",".");?>
</span>
						</a>
					</li>
					<?php } ?>
					
				</ul>
			</li>
			<li class="finalizarCompraLi">
				<a href="/carrinho" class="finalizarBt">Finalizar Compra</a>
				<span class="finalizarCompraTotal">R$<?php echo number_format($_smarty_tpl->tpl_vars['precoTotalVendaCarrinhoTopo']->value,2,",",".");?>
</span>
			</li>
		</ul>
	</li>
</ul>


<?php }} ?>