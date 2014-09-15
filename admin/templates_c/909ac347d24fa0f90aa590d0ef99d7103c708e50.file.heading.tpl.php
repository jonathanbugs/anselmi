<?php /* Smarty version Smarty-3.1.10, created on 2014-08-11 14:32:37
         compiled from "templates/heading.tpl" */ ?>
<?php /*%%SmartyHeaderCode:91838629053e8b7e5750837-24123760%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '909ac347d24fa0f90aa590d0ef99d7103c708e50' => 
    array (
      0 => 'templates/heading.tpl',
      1 => 1377794350,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '91838629053e8b7e5750837-24123760',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'titulo_pagina' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_53e8b7e5756786_91170298',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53e8b7e5756786_91170298')) {function content_53e8b7e5756786_91170298($_smarty_tpl) {?><div class="heading">

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