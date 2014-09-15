<?php /* Smarty version Smarty-3.1.10, created on 2014-08-11 14:32:37
         compiled from "templates/sidebar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:133514902753e8b7e573ccc9-46872912%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b7a7e1abae026b8613ea32fa42cffea37211cd0' => 
    array (
      0 => 'templates/sidebar.tpl',
      1 => 1407501474,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '133514902753e8b7e573ccc9-46872912',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ID_LOJA' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_53e8b7e574d257_52369453',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53e8b7e574d257_52369453')) {function content_53e8b7e574d257_52369453($_smarty_tpl) {?><!--Responsive navigation button-->
<div class="resBtn">
    <a href="#"><span class="icon16 minia-icon-list-3"></span></a>
</div>

<!--Sidebar collapse button-->
<div class="collapseBtn">
     <a href="#" class="tipR" title="Esconder Menu"><span class="icon12 minia-icon-layout"></span></a>
</div>

<!--Sidebar background-->
<div id="sidebarbg"></div>
<!--Sidebar content-->
<div id="sidebar">

    <div class="shortcuts" style="height:41px;">

    </div><!-- End search -->

    <div class="sidenav">

        <div class="sidebar-widget" style="margin: -1px 0 0 0;">
            <h5 class="title" style="margin-bottom:0">Navega&ccedil;&atilde;o</h5>
        </div><!-- End .sidenav-widget -->

        <div class="mainnav">
            <ul>

                <li><a href="./"><span class="icon16 icomoon-icon-stats-up"></span>Painel Inicial</a></li>

                <li>
                    <a href="#"><span class="icon16 icomoon-icon-user"></span>Pessoa</a>
                    <ul class="sub">
                        <li><a href="pessoa-lista"><span class="icon16 icomoon-icon-paper"></span>Lista Pessoa</a></li>
                        <li><a href="pessoa-cadastra"><span class="icon16 icomoon-icon-paper"></span>Cadastra Pessoa</a></li>
                        <!-- <li><a href="pessoa-tabelas"><span class="icon16 icomoon-icon-paper"></span>Tabelas Pessoa</a></li>-->
                    </ul>
                </li>

                <?php if ($_smarty_tpl->tpl_vars['ID_LOJA']->value==1){?>
                <li>
                    <a href="#"><span class="icon16 minia-icon-list-4"></span>Produto</a>
                    <ul class="sub">
                        <li><a href="produto-lista"><span class="icon16 icomoon-icon-paper"></span>Lista Produto</a></li>
                        <!-- <li><a href="produto-do-dia"><span class="icon16 icomoon-icon-paper"></span>Produto do Dia</a></li> -->
                        <li><a href="produto-cadastra"><span class="icon16 icomoon-icon-paper"></span>Cadastra Produto</a></li>
                        <li><a href="categoria-lista"><span class="icon16 icomoon-icon-paper"></span>Categoria Produto</a></li>
                        <!-- <li><a href="marca-cadastra"><span class="icon16 icomoon-icon-paper"></span>Marca Produto</a></li> -->
                        <li><a href="linha-cadastra"><span class="icon16 icomoon-icon-paper"></span>N&iacute;vel Auxiliar</a></li>
                        <li><a href="atributo-cadastra"><span class="icon16 icomoon-icon-paper"></span>Atributos</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#"><span class="icon16 icomoon-icon-calculate"></span>Promo&ccedil;&atilde;o</a>
                    <ul class="sub">
                        <li><a href="promocao"><span class="icon16 icomoon-icon-paper"></span>Lista Promo Produto</a></li>
                        <li><a href="produto-promocao"><span class="icon16 icomoon-icon-paper"></span>Nova Promo Produto</a></li>
                        <li><a href="carrinho-promocao-lista"><span class="icon16 icomoon-icon-paper"></span>Lista Promo Carrinho</a></li>
                        <li><a href="carrinho-promocao"><span class="icon16 icomoon-icon-paper"></span>Nova Promo Carrinho</a></li>
                    </ul>
                </li>
                <?php }?>

                <li>
                    <a href="#"><span class="icon16 icomoon-icon-basket"></span>Pedido</a>
                    <ul class="sub">
                        <!-- <li><a href="pedido-cadastra"><span class="icon16 icomoon-icon-paper"></span>Novo Pedido</a></li> -->
                        <li><a href="pedido-lista"><span class="icon16 icomoon-icon-paper"></span>Lista Pedido</a></li>
                        <?php if ($_smarty_tpl->tpl_vars['ID_LOJA']->value==1){?>
                        <li><a href="pedido-atendimento"><span class="icon16 icomoon-icon-paper"></span>Atendimento Pedido</a></li>
                        <li><a href="pedido-despacho"><span class="icon16 icomoon-icon-paper"></span>Despacho de Pedido</a></li>
                        <?php }?>
                        <!-- <li><a href="#"><span class="icon16 icomoon-icon-tag"></span>Moip</a></li> -->
                        <!-- <li><a href="exportacao-pedido"><span class="icon16 icomoon-icon-upload-2"></span>Exporta&ccedil;&atilde;o</a></li> -->
                    </ul>
                </li>

                <li>
                    <a href="#"><span class="icon16 minia-icon-list-3"></span>Relat&oacute;rios</a>
                    <ul class="sub">
                        <li><a href="produto-estoque"><span class="icon16 icomoon-icon-paper"></span>Estoque Produto</a></li>
                        <!-- <li><a href="lista-casamento-cadastra"><span class="icon16 icomoon-icon-paper"></span>Nova Lista</a></li> -->
                    </ul>
                </li>

                <li>
                    <a href="#"><span class="icon16 entypo-icon-images"></span>Banners</a>
                    <ul class="sub">
                        <li><a href="banner-cadastra"><span class="icon16 icomoon-icon-paper"></span>Cadastra Banner</a></li>
                        <li><a href="banner-lista"><span class="icon16 icomoon-icon-paper"></span>Lista Banner</a></li>
                    </ul>
                </li>

                <!-- <li>
                    <a href="#"><span class="icon16 brocco-icon-heart"></span>Lista de Casamento</a>
                    <ul class="sub">
                        <li><a href="lista-casamento-lista"><span class="icon16 icomoon-icon-paper"></span>Lista Casamento</a></li>
                        <li><a href="lista-casamento-cadastra"><span class="icon16 icomoon-icon-paper"></span>Nova Lista</a></li>
                    </ul>
                </li> -->
                <?php if ($_smarty_tpl->tpl_vars['ID_LOJA']->value==1){?>
                <li><a href="importacao"><span class="icon16 icomoon-icon-upload-2"></span>Importa&ccedil;&atilde;o</a></li>
                <?php }?>
            </ul>
        </div>
    </div><!-- End sidenav -->


    <!-- <div class="sidebar-widget">
        <h5 class="title">Pedidos</h5>
        <div class="content">
            <div class="rightnow">
                <ul class="unstyled">
                    <li><span class="number">201</span><span class="icon16 icomoon-icon-tag"></span>Aprovados</li>
                    <li><span class="number">201</span><span class="icon16 icomoon-icon-tag"></span>Em An&aacute;lise</li>
                    <li><span class="number">201</span><span class="icon16 icomoon-icon-tag"></span>Faturados</li>
                </ul>
            </div>
        </div>-->

    </div><!-- End .sidenav-widget -->

</div><!-- End #sidebar -->
<?php }} ?>