<?php /* Smarty version Smarty-3.1.10, created on 2014-06-13 08:54:59
         compiled from "templates\categoria_lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26216539ae693c678e4-28199673%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e43433649cfce7440afc1d11cad563bcf54bebf5' => 
    array (
      0 => 'templates\\categoria_lista.tpl',
      1 => 1401194874,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26216539ae693c678e4-28199673',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'visualizaCategoriaProduto' => 0,
    'valorCategoriaProduto' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_539ae693cc38a3_07125438',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_539ae693cc38a3_07125438')) {function content_539ae693cc38a3_07125438($_smarty_tpl) {?><div id="wrapper">

    <?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


    <!--Body content-->
    <div id="content" class="clearfix">
        <div class="contentwrapper"><!--Content wrapper-->

            <?php echo $_smarty_tpl->getSubTemplate ("heading.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


            <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

                
                <div class="row-fluid">

                    <div class="span12">
                        
                        <div class="box">

                            <div class="title">

                                <h4>
                                    <span><?php if ($_smarty_tpl->tpl_vars['visualizaCategoriaProduto']->value[0]['CATEGORIA_MAE']){?>Subcategoria de <?php echo $_smarty_tpl->tpl_vars['visualizaCategoriaProduto']->value[0]['CATEGORIA_MAE'];?>
<?php }else{ ?>Categoria<?php }?></span>
                                    <form class="box-form right" action="">
                                        <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown">
                                            <span class="icon16 iconic-icon-cog"></span>
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="categoria-cadastra">
                                                    <span class="icon-pencil"></span> Novo
                                                </a>
                                            </li>
                                        </ul>
                                    </form>
                                </h4>
                                
                            </div>
                            <div class="content noPad">
                                <table class="responsive table table-bordered" id="descricaoCategoriaProdutoTable">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Descri&ccedil;&atilde;o</th>
                                        <th>Ativo</th>
                                        <th>A&ccedil;&otilde;es</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      
                                      
                                        <?php  $_smarty_tpl->tpl_vars['valorCategoriaProduto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorCategoriaProduto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['visualizaCategoriaProduto']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorCategoriaProduto']->key => $_smarty_tpl->tpl_vars['valorCategoriaProduto']->value){
$_smarty_tpl->tpl_vars['valorCategoriaProduto']->_loop = true;
?>
                                      <tr id="trdescricaoCategoriaProduto<?php echo $_smarty_tpl->tpl_vars['valorCategoriaProduto']->value['ID'];?>
">
                                        <td><?php echo $_smarty_tpl->tpl_vars['valorCategoriaProduto']->value['ID_CATEGORIA'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['valorCategoriaProduto']->value['DESCRICAO_CATEGORIA'];?>
</td>
                                        <td>
                                            
                                            <input type="checkbox" <?php if ($_smarty_tpl->tpl_vars['valorCategoriaProduto']->value['ATIVO']=='S'){?>checked="checked"<?php }?> id="<?php echo $_smarty_tpl->tpl_vars['valorCategoriaProduto']->value['ID_CATEGORIA'];?>
" name="categoriaAtiva">
                                            
                                        </td>
                                        <td>
                                            <div class="controls center">
                                                <a href="categoria-cadastra?idCategoria=<?php echo $_smarty_tpl->tpl_vars['valorCategoriaProduto']->value['ID_CATEGORIA'];?>
" title="Editar" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                                <a href="categoria-lista?idCategoria=<?php echo $_smarty_tpl->tpl_vars['valorCategoriaProduto']->value['ID_CATEGORIA'];?>
" title="Listar Subcategorias" class="tip"><span class="icon12 brocco-icon-list"></span></a>

                                            </div>
                                            
                                        </td>
                                      </tr>
                                      <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                        </div><!-- End .box -->

                    </div><!-- End .span6 -->

                </div><!-- End .row-fluid -->

           
            <!-- Page end here -->
                
           
        </div><!-- End contentwrapper -->
    </div><!-- End #content -->

</div><!-- End #wrapper -->

   

<?php }} ?>