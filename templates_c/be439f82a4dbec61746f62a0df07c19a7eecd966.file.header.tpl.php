<?php /* Smarty version Smarty-3.1.10, created on 2014-09-17 17:15:35
         compiled from "templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13122168155419ebe75d3334-06702372%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be439f82a4dbec61746f62a0df07c19a7eecd966' => 
    array (
      0 => 'templates/header.tpl',
      1 => 1410737525,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13122168155419ebe75d3334-06702372',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sessao' => 1,
    'description' => 0,
    'keywords' => 0,
    'tituloFinal' => 1,
    'urlAtual' => 0,
    'ogImage' => 0,
    'css_files' => 1,
    'css_uri' => 1,
    'CSS_DIR' => 0,
    'BASE_DIR' => 0,
    'CLIENTE' => 0,
    'scriptPre' => 1,
    'js_files' => 1,
    'js_uri' => 1,
    'scriptExtra' => 1,
    'MIDIA_DIR' => 1,
    'idListaCasamento' => 1,
    'navegador' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_5419ebe76e0ae1_06465198',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5419ebe76e0ae1_06465198')) {function content_5419ebe76e0ae1_06465198($_smarty_tpl) {?><!DOCTYPE HTML>
<!-- ESCOLHA DA COR PARA A SESSÃO DESIGN COLLECTION -->
<html dir="ltr" lang="pt-br" class="no-js" <?php if ($_smarty_tpl->tpl_vars['sessao']->value=='design-collection'){?> style="background-color: #211f20"<?php }?>>

<head>
<meta charset="ISO-8859-1">
<meta name="viewport" content="width=980px" />
<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
" />
<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
" />
<meta name="google-site-verification" content="ponD8rbb8we_LhKJwSTk3cb8NE3UY6h9fRIORlWklsw" />


<!--Facebook Tags -->
<meta property="og:title" content="<?php echo $_smarty_tpl->tpl_vars['tituloFinal']->value;?>
" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo $_smarty_tpl->tpl_vars['urlAtual']->value;?>
" />
<meta property="og:image" content="<?php echo $_smarty_tpl->tpl_vars['ogImage']->value;?>
" />
<meta property="og:site_name" content="Comlines Distribuidor Tramontina" />
<meta property="fb:admins" content="1043210651" />
<meta property="fb:page_id" content="148110291992692" />
<!--Facebook Tags -->

<link rel="shortcut icon" href="/favicon.ico" />

<title><?php echo $_smarty_tpl->tpl_vars['tituloFinal']->value;?>
</title>


<?php  $_smarty_tpl->tpl_vars['css_uri'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['css_uri']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['css_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['css_uri']->key => $_smarty_tpl->tpl_vars['css_uri']->value){
$_smarty_tpl->tpl_vars['css_uri']->_loop = true;
?>
	<link href="<?php echo $_smarty_tpl->tpl_vars['css_uri']->value;?>
" rel="stylesheet" type="text/css" media="screen" />
<?php } ?>
	<link href="<?php echo $_smarty_tpl->tpl_vars['CSS_DIR']->value;?>
jquery.jscrollpane.css" rel="stylesheet" type="text/css" media="screen" />
	<!--link href="<?php echo $_smarty_tpl->tpl_vars['CSS_DIR']->value;?>
resolucao1024.css" rel="stylesheet" type="text/css" media="screen" /-->
	<script type="text/javascript">var $BASE_DIR = '<?php echo $_smarty_tpl->tpl_vars['BASE_DIR']->value;?>
', $CLIENTE = '<?php echo $_smarty_tpl->tpl_vars['CLIENTE']->value;?>
'; </script>
<?php echo $_smarty_tpl->tpl_vars['scriptPre']->value;?>

<?php  $_smarty_tpl->tpl_vars['js_uri'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js_uri']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['js_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['js_uri']->key => $_smarty_tpl->tpl_vars['js_uri']->value){
$_smarty_tpl->tpl_vars['js_uri']->_loop = true;
?>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_uri']->value;?>
" charset="utf-8"></script>
<?php } ?>
<?php echo $_smarty_tpl->tpl_vars['scriptExtra']->value;?>

</head>

	<?php if ($_smarty_tpl->tpl_vars['sessao']->value=='design-collection'){?>
		<!-- IMAGEM DE BG SESSAO DESIGN COLLECTION -->
		<body class="imgBg imgBgDesign" style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
backgrounds/bg_design.png')">
	<?php }elseif($_smarty_tpl->tpl_vars['sessao']->value=='lista-de-casamento'||$_smarty_tpl->tpl_vars['sessao']->value=='lista-de-casamento-formulario'||$_smarty_tpl->tpl_vars['sessao']->value=='lista-de-casamento-alterar-dados'||$_smarty_tpl->tpl_vars['sessao']->value=='lista-de-casamento-excluir'||$_smarty_tpl->tpl_vars['sessao']->value=='lista-de-casamento-divulgar-lista'||$_smarty_tpl->tpl_vars['sessao']->value=='lista-de-casamento-editar-produtos'||$_smarty_tpl->tpl_vars['sessao']->value=='lista-de-casamento-produtos'||$_smarty_tpl->tpl_vars['sessao']->value=='lista-de-casamento-detalhe-produto'||$_smarty_tpl->tpl_vars['sessao']->value=='lista-de-casamento-sucesso'||$_smarty_tpl->tpl_vars['idListaCasamento']->value>0){?>
		<body class="bgListaCasamento">
	<?php }else{ ?>
		<!-- IMAGEM DE BG -->
		<!--<body class="imgBg" style="background: url('<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
backgrounds/BG_site.png') repeat">-->
		<body class="imgBg">
	<?php }?>

	<?php echo $_smarty_tpl->getSubTemplate ("../erro-js.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<?php if ($_smarty_tpl->tpl_vars['navegador']->value){?>
		<?php echo $_smarty_tpl->getSubTemplate ("../erro-navegador.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<?php }?>

	<div id="loader">
		<img src="img/backgrounds/loader_actions.gif">
	</div>

	<div id="bgModal"></div>

	<div id="wrapper">
		<?php echo $_smarty_tpl->getSubTemplate ('_topo.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


		<?php if ($_smarty_tpl->tpl_vars['sessao']->value=='design-collection'){?>
		<div class="topoBannerDesign">
			<!-- BANNER DESIGN COLLECTION -->
			<div class="imgBgDesign" style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['MIDIA_DIR']->value;?>
backgrounds/banner_design.png')"></div>
		</div>
		<?php }?>

		<div id="content">
<?php }} ?>