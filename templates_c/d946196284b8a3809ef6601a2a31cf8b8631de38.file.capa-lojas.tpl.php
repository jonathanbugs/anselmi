<?php /* Smarty version Smarty-3.1.10, created on 2014-09-15 11:39:16
         compiled from "templates/capa-lojas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5768473205416fa142db9e7-19885407%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd946196284b8a3809ef6601a2a31cf8b8631de38' => 
    array (
      0 => 'templates/capa-lojas.tpl',
      1 => 1410791828,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5768473205416fa142db9e7-19885407',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'IMG_DIR' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_5416fa142f9155_25277058',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5416fa142f9155_25277058')) {function content_5416fa142f9155_25277058($_smarty_tpl) {?><!-- TOPO CAPA -->
<header id="topoCapa">
	<div class="container clearfix">
		<div class="logo">
			<a href="javascript:;">
				<img src="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
logos/clube_anselmi.png" alt="Clube Anselmi" />
			</a>
		</div>

		<div class="logoAnselmi">
			<a href="javascript:;">
				<img src="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
logos/logo.png" alt="Anselmi" />
			</a>
		</div>

		<ul class="blocoLinks clearfix">
			<li>
				<a href="javascript:;">entrar</a>
			</li>
			<li>
				<a href="javascript:;">cadastre-se</a>
			</li>
		</ul>
	</div>
</header>

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

<div class="blocoContatos">
	<div class="container clearfix">
		<ul class="social">
			<li>
				<a class="facebook" href="javascript:;">Facebook</a>
			</li>
			<li>
				<a class="instagram" href="javascript:;">instagram</a>
			</li>
			<li>
				<a class="vimeo" href="javascript:;">Vimeo</a>
			</li>
		</ul>

		<ul class="duvidas">
			<li class="titulo">D&uacute;vidas?</li>
			<li>
				<a class="fone" href="tel:5426283444">(54) 2628-3444</a>
			</li>
			<li>
				<a href="mailto:comercial@anselmi.com.br">comercial@anselmi.com.br</a>
			</li>
		</ul>
	</div>
</div>

<div class="blocoInformacoes">
	<div class="container clearfix">
		<ul class="pagamentosClube">
			<li class="visa"></li>
			<li class="mastercard"></li>
			<li class="pagseguro"></li>
			<li class="verisign"></li>
		</ul>
		<ul class="informacoes">
			<li>Malharia Anselmi Ltda.</li>
			<li>Av. Pedro Grendene, 50 - Volta Grande - Farroupilha - RS</li>
			<li>CNPJ 90.005.307/0001-78 - <a href="mailto:comercial@anselmi.com.br">comercial@anselmi.com.br</a></li>
		</ul>
	</div>
</div>

<footer id="rodapeCapa">
	<a class="logoSPR ir" href="http://www.spr.com.br" target="_blank">SPR</a>
</footer>

<?php }} ?>