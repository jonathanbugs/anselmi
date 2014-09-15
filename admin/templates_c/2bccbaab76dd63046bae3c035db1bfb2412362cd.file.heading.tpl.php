<?php /* Smarty version Smarty-3.1.10, created on 2014-06-13 18:03:28
         compiled from "templates\heading.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11461539b67207cfdf0-98439089%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2bccbaab76dd63046bae3c035db1bfb2412362cd' => 
    array (
      0 => 'templates\\heading.tpl',
      1 => 1377794349,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11461539b67207cfdf0-98439089',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'titulo_pagina' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_539b67207dcca0_94607012',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_539b67207dcca0_94607012')) {function content_539b67207dcca0_94607012($_smarty_tpl) {?><div class="heading">

    <h3><?php echo $_smarty_tpl->tpl_vars['titulo_pagina']->value;?>
</h3>                    

    <div class="resBtnSearch">
        <a href="#"><span class="icon16 brocco-icon-search"></span></a>
    </div>

    <!--<div class="search">

        <form id="searchform" action="search.html" />
            <input type="text" id="tipue_search_input" class="top-search" placeholder="Busca ..." />
            <input type="submit" id="tipue_search_button" class="search-btn" value="" />
        </form>

    </div>End search -->
    
    <ul class="breadcrumb">
        <!--<li>Voc&ecirc; est&aacute; aqui:</li>-->
        <li>
            <a href="dashboard.html" class="tip" title="voltar ao painel">
                <span class="icon16 icomoon-icon-screen"></span>
            </a> 
            <span class="divider">
                <span class="icon16 icomoon-icon-arrow-right"></span>
            </span>
        </li>
        <li class="active"><?php echo $_smarty_tpl->tpl_vars['titulo_pagina']->value;?>
</li>
    </ul>

</div><!-- End .heading--><?php }} ?>