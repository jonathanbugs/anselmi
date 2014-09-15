<?php /* Smarty version Smarty-3.1.10, created on 2014-09-15 11:57:17
         compiled from "templates/cupons-desconto.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6002550165416fe4dcd1c71-19137812%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c31cf3103d610787e39de73c4a2856176b240fb2' => 
    array (
      0 => 'templates/cupons-desconto.tpl',
      1 => 1400586468,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6002550165416fe4dcd1c71-19137812',
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
  'unifunc' => 'content_5416fe4dd76196_66618420',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5416fe4dd76196_66618420')) {function content_5416fe4dd76196_66618420($_smarty_tpl) {?><div class="container">
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
				<div class="tabelaServicos tabelaLista tabelaColunas3">
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

					<!-- <div class="tabelaListas tabelaLista clearfix">
						<div class="table tableInfos table1">
							<div class="tableCell">cupom 0294833748</div>
						</div>
						<div class="table tableInfos table2">
							<div class="tableCell">
								20%
								R$ 20,00
								+ Frete Gr&aacute;tis
							</div>
						</div>
						<div class="table tableInfos table3">
							SE O CUPOM ESTIVER PARA VENCER COLOCAR A CLASSE "txtVencer" COMO ABAIXO 
							<div class="tableCell txtVencer">
								Venceu em 20/01/2014
									<br>
									Vence em 20 dias
								
							</div>
						</div>
					</div> -->


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