<?php /* Smarty version Smarty-3.1.10, created on 2014-06-13 08:54:39
         compiled from "templates\categoria_cadastra.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16751539ae67fd6ab76-94559972%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b5ec9589cc538ba76962806a10fa46ba42478be5' => 
    array (
      0 => 'templates\\categoria_cadastra.tpl',
      1 => 1377794338,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16751539ae67fd6ab76-94559972',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'visualizaCategoriaProduto' => 0,
    'ACTIONS_DIR' => 0,
    'valueCategoriaProduto' => 0,
    'listaCategoria' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_539ae67fe02f40_11222171',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_539ae67fe02f40_11222171')) {function content_539ae67fe02f40_11222171($_smarty_tpl) {?><div id="wrapper">

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
                                    <span>Categoria</span>
                                    
                                </h4>
                                
                            </div>

                            <div class="content">

                                <?php  $_smarty_tpl->tpl_vars['valueCategoriaProduto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueCategoriaProduto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['visualizaCategoriaProduto']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueCategoriaProduto']->key => $_smarty_tpl->tpl_vars['valueCategoriaProduto']->value){
$_smarty_tpl->tpl_vars['valueCategoriaProduto']->_loop = true;
?><?php } ?>
                            
                                <form class="form-horizontal" id="cadastroCategoria" action="<?php echo $_smarty_tpl->tpl_vars['ACTIONS_DIR']->value;?>
categoria.php" method="post"/>
                                            
                                    <?php if ($_smarty_tpl->tpl_vars['valueCategoriaProduto']->value['ID_CATEGORIA']){?>
                                    <input type="hidden" name="acao" value="editarCategoria">
                                    <?php }else{ ?>
                                    <input type="hidden" name="acao" value="cadastrarCategoria">
                                    <?php }?>
                                    

                                    <div class="form-row row-fluid">
                                        <div class="span9">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">ID Categoria</label>
                                                <input class="span2" id="idCategoria" type="text" name="idCategoria" readonly="readonly" value="<?php echo $_smarty_tpl->tpl_vars['valueCategoriaProduto']->value['ID_CATEGORIA'];?>
" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span9">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Descri&ccedil;&atilde;o Categoria</label>
                                                <input class="span8" id="descricaoCategoria" type="text" name="descricaoCategoria" required="required" value="<?php echo $_smarty_tpl->tpl_vars['valueCategoriaProduto']->value['DESCRICAO_CATEGORIA'];?>
" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span9">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Ativo</label>
                                                <input id="ativo" type="checkbox" name="ativo" value="S" <?php if ($_smarty_tpl->tpl_vars['valueCategoriaProduto']->value['ATIVO']=='S'){?>checked="checked"<?php }?> />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span9">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Ordem</label>
                                                <input class="span2" id="ordem" type="text" name="ordem" value="<?php echo $_smarty_tpl->tpl_vars['valueCategoriaProduto']->value['ORDEM'];?>
" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span9">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Meta Title</label>
                                                <input class="span8" id="metaTitle" type="text" name="metaTitle" value="<?php echo $_smarty_tpl->tpl_vars['valueCategoriaProduto']->value['META_TITLE'];?>
" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span9">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Meta Description</label>
                                                <input class="span8" id="metaDescription" type="text" name="metaDescription" value="<?php echo $_smarty_tpl->tpl_vars['valueCategoriaProduto']->value['META_DESCRIPTION'];?>
" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span9">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Meta Keywords</label>
                                                <input class="span8" id="metaKeywords" type="text" name="metaKeywords" value="<?php echo $_smarty_tpl->tpl_vars['valueCategoriaProduto']->value['META_KEYWORDS'];?>
"  />
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="form-row row-fluid">
                                            <div class="span3">
                                                <label class="form-label span12" for="required">Categorias</label>
                                            </div>
                                            <div class="span8">    
                                                <div class="row-fluid">
                                                    <ul><li><input type="radio" name="categoria[]" value="I" <?php if ($_smarty_tpl->tpl_vars['valueCategoriaProduto']->value['CATEGORIA_INICIAL']=='S'){?>checked="checked"<?php }?>> Categoria Principal</li></ul>
                                                   <?php echo $_smarty_tpl->tpl_vars['listaCategoria']->value;?>

                                                </div>
                                            </div>
                                    </div>

                                    <div class="form-actions">
                                       <button type="submit" class="btn btn-info">Salvar</button>
                                       <!--<button type="button" class="btn">Cancelar</button>-->
                                    </div>
                                    <div id="teste"></div>

                                </form>

                            </div>

                        </div><!-- End .box -->

                    </div><!-- End .span6 -->

                </div><!-- End .row-fluid -->

           
            <!-- Page end here -->
                
           
        </div><!-- End contentwrapper -->
    </div><!-- End #content -->

</div><!-- End #wrapper -->

   

<?php }} ?>