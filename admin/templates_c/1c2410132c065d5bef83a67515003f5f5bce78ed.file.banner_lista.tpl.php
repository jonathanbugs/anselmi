<?php /* Smarty version Smarty-3.1.10, created on 2014-07-22 16:17:47
         compiled from "templates/banner_lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17743145753ce728bbefe68-55827995%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c2410132c065d5bef83a67515003f5f5bce78ed' => 
    array (
      0 => 'templates/banner_lista.tpl',
      1 => 1405457207,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17743145753ce728bbefe68-55827995',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'listaBanner' => 0,
    'valueBanner' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_53ce728bc7eae3_64166520',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ce728bc7eae3_64166520')) {function content_53ce728bc7eae3_64166520($_smarty_tpl) {?><div id="wrapper">

    <?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


    <!--Body content-->
    <div id="content" class="clearfix">
        <div class="contentwrapper"><!--Content wrapper-->

            <?php echo $_smarty_tpl->getSubTemplate ("heading.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <div id="teste"></div>
            <!-- Build page from here: Usual with <div class="row-fluid"></div> -->
            <div class="row-fluid">

                <div class="span12">

                    <div class="box gradient">

                        <div class="title">
                            <h4>
                                <span>Banners</span>
                                <form class="box-form right" action="">
                                    <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown">
                                        <span class="icon16 iconic-icon-cog"></span>
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="banner-cadastra">
                                                <span class="icon-pencil"></span> Novo
                                            </a>
                                        </li>
                                    </ul>
                                </form>
                            </h4>
                        </div>
                        <div class="content noPad clearfix" id="tabelalistaCasamento">
                            <table cellpadding="0" cellspacing="0" border="0" class="responsive dynamicTable display table table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Legenda</th>
                                        <th>Imagem</th>
                                        <th>Data Inicial</th>
                                        <th>Data Final</th>
                                        <th>Ativo</th>
                                        <th>A&ccedil;&otilde;es</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  $_smarty_tpl->tpl_vars['valueBanner'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueBanner']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaBanner']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueBanner']->key => $_smarty_tpl->tpl_vars['valueBanner']->value){
$_smarty_tpl->tpl_vars['valueBanner']->_loop = true;
?>
                                    <tr>
                                        <td><?php echo $_smarty_tpl->tpl_vars['valueBanner']->value['ID_BANNER'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['valueBanner']->value['LEGENDA'];?>
</td>
                                        <td><img src="<?php echo $_smarty_tpl->tpl_vars['valueBanner']->value['IMAGEM'];?>
" width="100" border="0"></td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['valueBanner']->value['DATA_INICIAL'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['valueBanner']->value['DATA_FINAL'];?>
</td>
                                        <td><?php if ($_smarty_tpl->tpl_vars['valueBanner']->value['ATIVO']=='S'){?><span class="icon-ok"></span><?php }else{ ?><span class="icon-remove"></span><?php }?></td>
                                        <td>
                                            <div class="controls center">
                                                <a href="banner-cadastra?idBanner=<?php echo $_smarty_tpl->tpl_vars['valueBanner']->value['ID_BANNER'];?>
" class="tip" title="Editar"><span class="icon-pencil"></span></a>
                                                <a href="<?php echo $_smarty_tpl->tpl_vars['valueBanner']->value['LINK'];?>
" title="Link Banner" class="tip" target="_blank"><span class="icon-share"></span></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                    </table>
                                </div>

                            </div><!-- End .box -->

                        </div><!-- End .span12 -->

                    </div><!-- End .row-fluid -->


                    <!-- Page end here -->


                </div><!-- End contentwrapper -->
            </div><!-- End #content -->

        </div><!-- End #wrapper -->



<?php }} ?>