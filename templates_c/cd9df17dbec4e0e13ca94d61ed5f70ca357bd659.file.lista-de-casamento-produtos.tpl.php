<?php /* Smarty version Smarty-3.1.10, created on 2014-04-16 13:54:46
         compiled from "templates\lista-de-casamento-produtos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:371534eb5d6296e65-64087405%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd9df17dbec4e0e13ca94d61ed5f70ca357bd659' => 
    array (
      0 => 'templates\\lista-de-casamento-produtos.tpl',
      1 => 1389023750,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '371534eb5d6296e65-64087405',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'fotoCapa' => 0,
    'nomeConjuge1' => 0,
    'nomeConjuge2' => 0,
    'mensagem' => 0,
    'enderecoCerimonia' => 0,
    'valueCerimonia' => 0,
    'enderecoRecepcao' => 0,
    'valueRecepcao' => 0,
    'BASE_DIR' => 0,
    'navegacaoCategoria' => 0,
    'countCategorias' => 0,
    'valueNavegacaoCategoria' => 0,
    'listaCasamentoVencida' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_534eb5d63cda85_62424131',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_534eb5d63cda85_62424131')) {function content_534eb5d63cda85_62424131($_smarty_tpl) {?><!-- <!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Lista de Casamento Lista de Produtos</title>
 -->
		<link rel="stylesheet" href="../lista-casamento/css/template.css"/>
		<link rel="stylesheet" href="../lista-casamento/css/lista-de-casamento-produtos.css"/>
<!-- 	</head>
	<body class="bgListaCasamento">
		<div id="wrapper">
 -->			<div class="containerGeral">
				<header id="topo"></header>
			
				<section id="sessaoListaCasamentoProdutos" class="sessaoListaCasamento">
					
					<div id="blocoLogo">
						<img class="logo" src="../lista-casamento/img/logo_produtos.png" alt="Lista de Casamento Comlines">
						<?php if ($_smarty_tpl->tpl_vars['fotoCapa']->value){?>
						<img class="imagemNoivos" src="../lista-casamento/fotos/<?php echo $_smarty_tpl->tpl_vars['fotoCapa']->value;?>
" alt="Noivos">
						<?php }?>
					</div>
					<div id="blocoCerinomina">
						<div id="blocoNomes">
							<span class="nome"><?php echo $_smarty_tpl->tpl_vars['nomeConjuge1']->value;?>
</span>
							<span class="divisor">&</span>
							<span class="nome"><?php echo $_smarty_tpl->tpl_vars['nomeConjuge2']->value;?>
</span>
						</div>

						<span class="linha"></span>
						<p class="cerimoniaTexto">
							<span><?php echo $_smarty_tpl->tpl_vars['mensagem']->value;?>
</span>
						</p>
						<span class="linha"></span>

						<ul id="cermoniaInformacoesUl">
							<li class="cermoniaInformacoesLi">
								<div class="infomacoes">
									<span class="informacoesTitulo">CERIM&Ocirc;NIA</span>
									<?php  $_smarty_tpl->tpl_vars['valueCerimonia'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueCerimonia']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['enderecoCerimonia']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueCerimonia']->key => $_smarty_tpl->tpl_vars['valueCerimonia']->value){
$_smarty_tpl->tpl_vars['valueCerimonia']->_loop = true;
?><?php } ?>
									<?php if ($_smarty_tpl->tpl_vars['valueCerimonia']->value['DATA_EVENTO']){?>
									<p class="informacoesDescricao">
										<span>Dia <?php echo $_smarty_tpl->tpl_vars['valueCerimonia']->value['DATA_EVENTO'];?>
 - <?php echo $_smarty_tpl->tpl_vars['valueCerimonia']->value['HORA_EVENTO'];?>
 horas</span>
										<span><?php echo $_smarty_tpl->tpl_vars['valueCerimonia']->value['LOCAL_EVENTO'];?>
, <?php echo $_smarty_tpl->tpl_vars['valueCerimonia']->value['ENDERECO'];?>
, <?php echo $_smarty_tpl->tpl_vars['valueCerimonia']->value['NUMERO'];?>
</span>
										<span><?php echo $_smarty_tpl->tpl_vars['valueCerimonia']->value['MUNICIPIO'];?>
 - <?php echo $_smarty_tpl->tpl_vars['valueCerimonia']->value['ESTADO'];?>
</span>
									</p>
									<?php }?>
								</div>
							</li>
							<li class="cermoniaInformacoesLi cermoniaInformacoesLiRecepcao">
								<div class="infomacoes">
									<span class="informacoesTitulo">RECEP&Ccedil;&Atilde;O</span>
									<?php  $_smarty_tpl->tpl_vars['valueRecepcao'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueRecepcao']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['enderecoRecepcao']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueRecepcao']->key => $_smarty_tpl->tpl_vars['valueRecepcao']->value){
$_smarty_tpl->tpl_vars['valueRecepcao']->_loop = true;
?><?php } ?>
									<?php if ($_smarty_tpl->tpl_vars['valueRecepcao']->value['DATA_EVENTO']){?>
									<p class="informacoesDescricao">
										<span>Dia <?php echo $_smarty_tpl->tpl_vars['valueRecepcao']->value['DATA_EVENTO'];?>
 - <?php echo $_smarty_tpl->tpl_vars['valueRecepcao']->value['HORA_EVENTO'];?>
 horas</span>
										<span><?php echo $_smarty_tpl->tpl_vars['valueRecepcao']->value['LOCAL_EVENTO'];?>
, <?php echo $_smarty_tpl->tpl_vars['valueRecepcao']->value['ENDERECO'];?>
, <?php echo $_smarty_tpl->tpl_vars['valueRecepcao']->value['NUMERO'];?>
</span>
										<span><?php echo $_smarty_tpl->tpl_vars['valueRecepcao']->value['MUNICIPIO'];?>
 - <?php echo $_smarty_tpl->tpl_vars['valueRecepcao']->value['ESTADO'];?>
</span>
									</p>
									<?php }?>
								</div>
							</li>
						</ul>
					</div>
				</section>

				<section id="conteudoLista">
					<div class="container">
						<div id="produtosContent" class="clearfix">
							<div class="navegacaoContent">
								<ul class="navegacaoUl clearfix">
									<li class="navegacaoLi">
										<a class="navegacaoLink" href="<?php echo $_smarty_tpl->tpl_vars['BASE_DIR']->value;?>
">Inicial</a>
										<?php  $_smarty_tpl->tpl_vars['valueNavegacaoCategoria'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueNavegacaoCategoria']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['navegacaoCategoria']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['valueNavegacaoCategoria']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['valueNavegacaoCategoria']->key => $_smarty_tpl->tpl_vars['valueNavegacaoCategoria']->value){
$_smarty_tpl->tpl_vars['valueNavegacaoCategoria']->_loop = true;
 $_smarty_tpl->tpl_vars['valueNavegacaoCategoria']->iteration++;
?>
											<?php if ($_smarty_tpl->tpl_vars['valueNavegacaoCategoria']->iteration==$_smarty_tpl->tpl_vars['countCategorias']->value){?>
											<?php break 1?>
											<?php }?>
											/ <a class="navegacaoLink" href="<?php echo $_smarty_tpl->tpl_vars['valueNavegacaoCategoria']->value['URL_AMIGAVEL'];?>
"><?php echo $_smarty_tpl->tpl_vars['valueNavegacaoCategoria']->value['DESCRICAO_CATEGORIA'];?>
</a>
										<?php } ?>
									</li>
								</ul>
								<h2 class="tituloCategoria">Lista de Casamento</h2>
							</div>


							<!-- SIDEBAR CATEGORIAS -->
							<!-- <div class="sidebarCategorias"> -->
								

								<!-- SIDEBAR COM FILTROS --> 
								
								
								<div class="sidebarBanners">
									<ul class="bannersUl">
										<li class="bannersLi">
											<a href="/lista-de-casamento/"><img src="../../lista-casamento/img/banner_lista_casamento.png" border="0"></a>
										</li>
									</ul>
								</div>
								
							<!-- </div> -->

							<?php if ($_smarty_tpl->tpl_vars['listaCasamentoVencida']->value=='S'){?>
								A Lista de Casamento de <?php echo $_smarty_tpl->tpl_vars['nomeConjuge1']->value;?>
 & <?php echo $_smarty_tpl->tpl_vars['nomeConjuge2']->value;?>
 est&aacute; finalizada!
							<?php }else{ ?>
								<?php echo $_smarty_tpl->getSubTemplate ("../templates/includes/_produtos.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

							<?php }?>
						</div>
					</div>
				</section>
			</div>
		<!-- </div> -->
	<!-- </body>
</html>
  --><?php }} ?>