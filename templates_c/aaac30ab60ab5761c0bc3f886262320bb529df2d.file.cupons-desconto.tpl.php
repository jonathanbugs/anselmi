<?php /* Smarty version Smarty-3.1.10, created on 2013-12-16 09:10:32
         compiled from "templates\cupons-desconto.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1005252aedfa8351db2-99101022%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aaac30ab60ab5761c0bc3f886262320bb529df2d' => 
    array (
      0 => 'templates\\cupons-desconto.tpl',
      1 => 1381340590,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1005252aedfa8351db2-99101022',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'listaCupons' => 0,
    'valueCupons' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_52aedfa8418895_97958159',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52aedfa8418895_97958159')) {function content_52aedfa8418895_97958159($_smarty_tpl) {?><div class="container">
	<div id="produtosContent" class="clearfix">
		<div class="navegacaoContent">
			<h2 class="tituloPagina">Outros Servi&ccedil;os</h2>
		</div>

		<!-- SIDEBAR CONTA -->
		<?php echo $_smarty_tpl->getSubTemplate ("../templates/includes/_sidebar_conta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


		<div class="servicosContent">
			<span class="titulo">Cupons de Desconto</span>
			<span class="txtIntroServicos">Digite o c&oacute;digo do cupom no carrinho de compras para receber seu desconto.</span>

			<div class="blocoServicos">
				<div class="tabelaServicos tabelaLista tabelaServicos">
					<div class="tabelaTitulos clearfix">
						<div class="table tableTitulo table1">
							<div class="tableCell">C&oacute;digo do Cupom</div>
						</div>
						<div class="table tableTitulo table2">
							<div class="tableCell">Valor do Desconto</div>
						</div>
						<div class="table tableTitulo table3">
							<div class="tableCell">Validade do Cupom</div>
						</div>
					</div>


					<!-- LISTAGEM DE BOLETOS -->
					<?php  $_smarty_tpl->tpl_vars['valueCupons'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueCupons']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaCupons']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueCupons']->key => $_smarty_tpl->tpl_vars['valueCupons']->value){
$_smarty_tpl->tpl_vars['valueCupons']->_loop = true;
?>
					<div class="tabelaListas tabelaLista clearfix">
						<div class="table tableInfos table1">
							<div class="tableCell"><?php echo $_smarty_tpl->tpl_vars['valueCupons']->value['CUPOM_PROMOCIONAL'];?>
</div>
						</div>
						<div class="table tableInfos table2">
							<div class="tableCell">
								<?php if ($_smarty_tpl->tpl_vars['valueCupons']->value['TIPO_DESCONTO']=='P'){?>
									<?php if (number_format($_smarty_tpl->tpl_vars['valueCupons']->value['VALOR_DESCONTO'])>0){?>
										<?php echo number_format($_smarty_tpl->tpl_vars['valueCupons']->value['VALOR_DESCONTO']);?>
%
									<?php }?>
								<?php }else{ ?>
									<?php if (number_format($_smarty_tpl->tpl_vars['valueCupons']->value['VALOR_DESCONTO'],2,",",".")>0){?>
										R$ <?php echo number_format($_smarty_tpl->tpl_vars['valueCupons']->value['VALOR_DESCONTO'],2,",",".");?>

									<?php }?>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['valueCupons']->value['FRETE_GRATIS']=='S'){?>
									+ Frete Gr&aacute;tis
								<?php }?>
							</div>
						</div>
						<div class="table tableInfos table3">
							<!-- SE O CUPOM ESTIVER PARA VENCER COLOCAR A CLASSE "txtVencer" COMO ABAIXO -->
							<div class="tableCell <?php if ($_smarty_tpl->tpl_vars['valueCupons']->value['DIAS_VENCIMENTO']<10&&$_smarty_tpl->tpl_vars['valueCupons']->value['DIAS_VENCIMENTO']>0){?>txtVencer<?php }elseif($_smarty_tpl->tpl_vars['valueCupons']->value['VENCIDO']=='S'){?>txtVenceu<?php }?>"><?php if ($_smarty_tpl->tpl_vars['valueCupons']->value['VENCIDO']=='S'){?>Venceu em<?php }?> <?php echo $_smarty_tpl->tpl_vars['valueCupons']->value['DATA_FINAL_VALIDADE'];?>

								<?php if ($_smarty_tpl->tpl_vars['valueCupons']->value['DIAS_VENCIMENTO']<10&&$_smarty_tpl->tpl_vars['valueCupons']->value['DIAS_VENCIMENTO']>0){?>
									<br>
									Vence em <?php echo $_smarty_tpl->tpl_vars['valueCupons']->value['DIAS_VENCIMENTO'];?>
 dias
								<?php }?>
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