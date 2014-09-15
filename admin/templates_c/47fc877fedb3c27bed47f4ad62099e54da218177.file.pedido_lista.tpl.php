<?php /* Smarty version Smarty-3.1.10, created on 2014-08-08 18:37:30
         compiled from "templates/pedido_lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:213037253553e4fcca6421c4-13185998%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47fc877fedb3c27bed47f4ad62099e54da218177' => 
    array (
      0 => 'templates/pedido_lista.tpl',
      1 => 1404748039,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213037253553e4fcca6421c4-13185998',
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
  'unifunc' => 'content_53e4fcca65e822_89544496',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53e4fcca65e822_89544496')) {function content_53e4fcca65e822_89544496($_smarty_tpl) {?>	<div id="wrapper">

		<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


		<!--Body content-->
		<div id="content" class="clearfix">
			<div class="contentwrapper"><!--Content wrapper-->

				<?php echo $_smarty_tpl->getSubTemplate ("heading.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


				<!-- Build page from here: Usual with <div class="row-fluid"></div> -->


					<div class="row-fluid">

						<div class="span12">

							<div class="box gradient">

								<div class="title">
									<h4>
										<span>Lista Pedido</span>
										<a class="btn btn-mini modal-toggle box-form right" href="#exportaArquivo">
											<span class="icon16 icomoon-icon-file-excel"></span>
											Exportar
										</a>
									</h4>
								</div>
								<div class="content noPad clearfix" id="tabelaListaPedido">
									<table id="tableListaPedido" cellpadding="0" cellspacing="0" border="0" class="responsive display table table-bordered" width="100%">
										<thead>
											<tr>
												<th>#</th>
												<th>Pedido</th>
												<th>Data Emiss&atilde;o</th>
												<th>Cliente</th>
												<th>CPF/CNPJ</th>
												<th>E-mail</th>
												<th>Valor Pedido</th>
												<th>Forma de Pagamento</th>
												<th>Situa&ccedil;&atilde;o do Pedido</th>
												<!-- <th>Lista Casamento</th> -->
												<th>A&ccedil;&atilde;o</th>
										  </tr>
										</thead>
										<tbody>
											<tr></tr>
										</tbody>
										<!--<tfoot>
											<tr>
												<th>Rendering engine</th>
												<th>Browser</th>
												<th>Platform(s)</th>
												<th>Engine version</th>
												<th>CSS grade</th>
											</tr>
										</tfoot>-->
									</table>
								</div>

							</div><!-- End .box -->

						</div><!-- End .span12 -->

					</div><!-- End .row-fluid -->






				<!-- Page end here -->


			</div><!-- End contentwrapper -->
		</div><!-- End #content -->

	</div><!-- End #wrapper -->


<form class="form-horizontal dialog" id="exportaArquivo" action="<?php echo $_smarty_tpl->tpl_vars['ACTIONS_DIR']->value;?>
relatorio_pedido.php" method="post" title="Exportar Pedidos" />
	<input value="exportaArquivo" name="acao" type="hidden" />
	<div class="form-row row-fluid">
		<div class="span12">
			<div class="row-fluid">
				<label class="form-label span4" for="busca">Busca</label>
				<div class="span8 controls">
					<input class="span12" name="busca" id="busca" value="" />
				</div>
			</div>
		</div>
	</div>
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
</form>
<?php }} ?>