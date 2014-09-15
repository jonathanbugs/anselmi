<?php /* Smarty version Smarty-3.1.10, created on 2013-10-09 17:32:14
         compiled from "templates\relatorio_pedido.tpl" */ ?>
<?php /*%%SmartyHeaderCode:226235255bd4e183ec1-90364419%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b6bd0d2cf68da3942bf857962dc4337e47a6c87e' => 
    array (
      0 => 'templates\\relatorio_pedido.tpl',
      1 => 1381155234,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '226235255bd4e183ec1-90364419',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ACTIONS_DIR' => 0,
    'pedidos' => 0,
    'p' => 0,
    'passada' => 0,
    'hoje' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_5255bd4e1d0858_94500332',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5255bd4e1d0858_94500332')) {function content_5255bd4e1d0858_94500332($_smarty_tpl) {?>	<div id="wrapper">

		<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


		<!--Body content-->
		<div id="content" class="clearfix">
			<div class="contentwrapper"><!--Content wrapper-->

				<?php echo $_smarty_tpl->getSubTemplate ("heading.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


				<!-- Build page from here: Usual with <div class="row-fluid"></div> -->
				<form class="form-horizontal" id="exportaArquivo" action="<?php echo $_smarty_tpl->tpl_vars['ACTIONS_DIR']->value;?>
relatorio_pedido.php" method="post" />
					<input value="exportaArquivo" name="acao" type="hidden" />
					
					<div class="form-row row-fluid">
						<div class="span12">
							<div class="row-fluid">
								<label class="form-label span4" for="checkboxes">Situa&ccedil;&atilde;o do Pedido</label>
								<div class="span8 controls">
									<select name="situacaoPedido[]" id="situacaoPedido" class="nostyle" multiple="multiple" style="height: 150px;">
										<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pedidos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['p']->value['ID_PEDIDO_ITEM_SITUACAO'];?>
" selected="selected"><?php echo $_smarty_tpl->tpl_vars['p']->value['DESCRICAO_PEDIDO_ITEM_SITUACAO'];?>
</option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="form-row row-fluid">
						<div class="span12">
							<div class="row-fluid">
								<label class="form-label span4" for="checkboxes">Data</label>
								<div class="span8 controls">
									<span class="span5"><input class="span12 datepicker" name="dataDe" id="dataDe" value="<?php echo $_smarty_tpl->tpl_vars['passada']->value;?>
" /></span>
									<span class="span2" style="text-align: center; line-height: 30px;">At&eacute;:</span>
									<span class="span5"><input class="span12 datepicker" name="dataAte" id="dataAte" value="<?php echo $_smarty_tpl->tpl_vars['hoje']->value;?>
" /></span>
								</div>
							</div>
						</div>
					</div>

					<div class="form-actions">
						<button type="submit" class="btn btn-info">Exportar</button>
						<!--<button type="button" class="btn">Cancel</button>-->
					</div>
				</form>

				<div id="retorno"></div>
				<!-- Page end here -->

			</div><!-- End contentwrapper -->
		</div><!-- End #content -->

	</div><!-- End #wrapper -->
<?php }} ?>