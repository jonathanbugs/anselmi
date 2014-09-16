<?php /* Smarty version Smarty-3.1.10, created on 2014-09-16 08:48:20
         compiled from "templates/capa-lojas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:576389933541823846d45a5-02690731%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd946196284b8a3809ef6601a2a31cf8b8631de38' => 
    array (
      0 => 'templates/capa-lojas.tpl',
      1 => 1410867410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '576389933541823846d45a5-02690731',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'IMG_DIR' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_541823846f26b4_28282576',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541823846f26b4_28282576')) {function content_541823846f26b4_28282576($_smarty_tpl) {?><!-- TOPO -->
<?php echo $_smarty_tpl->getSubTemplate ('_topo2.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="container">
	<div class="conteudoCapa clearfix">
		<div class="blocoBanners">
			<a href="javascript:;" class="banner">
				<img src="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
paris_film.jpg" alt="Paris Film" />
			</a>
			<a href="javascript:;" class="banner">
				<img src="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
fashion.jpg" alt="Fashion" />
			</a>
		</div>
		<div class="blocoBanners blocoBannersDireita">
			<a href="javascript:;" class="banner">
				<img src="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
juliana_paes_capa.jpg" alt="Juliana Paes" />
			</a>
		</div>
	</div>
	<div class="conteudoCapa clearfix">
		<div class="blocoBanners blocoBannerClube">
			<div class="conteudoBanner clearfix">
				<div class="blocoLogo">
					<img src="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
logos/clube_anselmi2.png" alt="Clube Anselmi" />
				</div>

				<div class="blocoOpcoes">
					<p>
						O Clube ANSELMI &eacute; destinado para lojistas que queiram comprar nossos produtos e revender.
					</p>

					<ul class="opcoes">
						<li>
							<a href="javascript:;">fazer login</a>
						</li>
						<li>
							<a href="javascript:;">cadastrar-se</a>
						</li>
					</ul>
				</div>
			</div>
		</div>	
	</div>
</div>

<!-- RODAPE -->
<?php echo $_smarty_tpl->getSubTemplate ('_rodape2.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>