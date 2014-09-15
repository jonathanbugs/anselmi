<?php /* Smarty version Smarty-3.1.10, created on 2014-06-13 14:55:09
         compiled from "templates\inicial.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22557539b3afdef32b9-53997300%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5cb5409a16d26b24dcb2d304dc5290ff51157def' => 
    array (
      0 => 'templates\\inicial.tpl',
      1 => 1393265039,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22557539b3afdef32b9-53997300',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sessao' => 1,
    'MIDIA_DIR' => 1,
    'menuSidebar' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_539b3afdf0e8d3_43129223',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_539b3afdf0e8d3_43129223')) {function content_539b3afdf0e8d3_43129223($_smarty_tpl) {?><div class="container">
	<?php if ($_smarty_tpl->tpl_vars['sessao']->value=='inicial'){?>
	<div class="boxNews">
		<div class="boxNewsContent">
			<div class="table tableNews">
				<div class="tableCell">
					<form action="../actions/cadastro.php" method="post" name="newsForm" id="newsForm" class="newsForm clearfix" lang="pt">
						<input type="hidden" name="acao" value="cadastraNewsletter">
						<span class="receba">
							Receba ofertas por e-mail:
						</span>
						<div class="holder">
							<label class="label" for="nome">Nome</label>
							<input class="input" type="text" id="nome" name="nome" req='s' />
							<span id="erroFormNews"></span>
							<div id="teste"></div>
							<!-- ERRO FORMULARIO 
							<span class="erro">
								<span class="erroIcon"></span>
								<span class="txtErro">Preencha o nome</span>
							</span>-->
						</div>
						<div class="holder">
							<label class="label" for="email">Email</label>
							<input class="input" type="text" id="email" name="email" req='s' />
						
							<!-- ERRO FORMULARIO 
							<span class="erro">
								<span class="erroIcon"></span>
								<span class="txtErro">Preencha o e-mail</span>
							</span>-->
						</div>
						<div class="holder holderSexo">
							<div class="relativeSexo">
								<label for="feminino" class="checked">
									<input type="radio" id="feminino" name="sexo" value="F" checked="checked"/>
									Feminino
								</label>
							</div>
							<div class="relativeSexo">
								<label for="masculino">
									<input type="radio" id="masculino" name="sexo" value="M" />
									Masculino
								</label>
							</div>

							<!-- ERRO FORMULARIO 
							<span class="erro">
								<span class="erroIcon"></span>
								<span class="txtErro">Selecione uma op&ccedil;&atilde;o</span>
							</span>-->
						</div>
						<button type="submit" class="btSubmit">OK</button>
					</form>
				</div>
			</div>

			<a href="/lista-de-casamento" class="linkSeloListaCasamento">
				<img src="<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
/banners/laterais/banner_pequeno_noivas.jpg" alt="" />
			</a>
		</div>
	</div>
	<?php }?>

	<div id="produtosContent" class="clearfix">

		<!-- SIDEBAR CATEGORIAS -->
		<div class="sidebarCategorias">
			<?php echo $_smarty_tpl->tpl_vars['menuSidebar']->value;?>

		</div>

		<!--LISTAGEM DE PRODUTO -->
		<?php echo $_smarty_tpl->getSubTemplate ("../templates/includes/_produtos.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
</div>
<?php }} ?>