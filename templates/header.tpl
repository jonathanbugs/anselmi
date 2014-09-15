<!DOCTYPE HTML>
<!-- ESCOLHA DA COR PARA A SESSÃO DESIGN COLLECTION -->
<html dir="ltr" lang="pt-br" class="no-js" {if $sessao eq 'design-collection'} style="background-color: #211f20"{/if}>

<head>
<meta charset="ISO-8859-1">
<meta name="viewport" content="width=980px" />
<meta name="description" content="{$description}" />
<meta name="keywords" content="{$keywords}" />
<meta name="google-site-verification" content="ponD8rbb8we_LhKJwSTk3cb8NE3UY6h9fRIORlWklsw" />


<!--Facebook Tags -->
<meta property="og:title" content="{$tituloFinal}" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{$urlAtual}" />
<meta property="og:image" content="{$ogImage}" />
<meta property="og:site_name" content="Comlines Distribuidor Tramontina" />
<meta property="fb:admins" content="1043210651" />
<meta property="fb:page_id" content="148110291992692" />
<!--Facebook Tags -->

<link rel="shortcut icon" href="/favicon.ico" />

<title>{$tituloFinal}</title>


{foreach $css_files as $css_uri}
	<link href="{$css_uri}" rel="stylesheet" type="text/css" media="screen" />
{/foreach}
	<link href="{$CSS_DIR}jquery.jscrollpane.css" rel="stylesheet" type="text/css" media="screen" />
	<!--link href="{$CSS_DIR}resolucao1024.css" rel="stylesheet" type="text/css" media="screen" /-->
	<script type="text/javascript">var $BASE_DIR = '{$BASE_DIR}', $CLIENTE = '{$CLIENTE}'; </script>
{$scriptPre}
{foreach $js_files as $js_uri}
	<script type="text/javascript" src="{$js_uri}" charset="utf-8"></script>
{/foreach}
{$scriptExtra}
</head>

	{if $sessao eq 'design-collection'}
		<!-- IMAGEM DE BG SESSAO DESIGN COLLECTION -->
		<body class="imgBg imgBgDesign" style="background-image: url('{$MIDIA_DIR}backgrounds/bg_design.png')">
	{else if $sessao eq 'lista-de-casamento' or $sessao eq 'lista-de-casamento-formulario' or $sessao eq 'lista-de-casamento-alterar-dados' or $sessao eq 'lista-de-casamento-excluir' or $sessao eq 'lista-de-casamento-divulgar-lista' or $sessao eq 'lista-de-casamento-editar-produtos' or $sessao eq 'lista-de-casamento-produtos' or $sessao eq 'lista-de-casamento-detalhe-produto' or $sessao eq 'lista-de-casamento-sucesso' or $idListaCasamento > 0}
		<body class="bgListaCasamento">
	{else}
		<!-- IMAGEM DE BG -->
		<!--<body class="imgBg" style="background: url('{$MIDIA_DIR}backgrounds/BG_site.png') repeat">-->
		<body class="imgBg">
	{/if}

	{include file="../erro-js.php"}

	{if $navegador}
		{include file="../erro-navegador.php"}
	{/if}

	<div id="loader">
		<img src="img/backgrounds/loader_actions.gif">
	</div>

	<div id="bgModal"></div>

	<div id="wrapper">
		{include file='_topo.tpl'}

		{if $sessao eq 'design-collection'}
		<div class="topoBannerDesign">
			<!-- BANNER DESIGN COLLECTION -->
			<div class="imgBgDesign" style="background-image: url('{$MIDIA_DIR}backgrounds/banner_design.png')"></div>
		</div>
		{/if}

		<div id="content">
