<?php /* Smarty version Smarty-3.1.10, created on 2014-08-05 15:07:25
         compiled from "templates/produto_promocao.tpl" */ ?>
<?php /*%%SmartyHeaderCode:65677685153e0d70dd68795-93356020%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1f93d85d9fc1d277c48ffbd1212ee36d1e88c56' => 
    array (
      0 => 'templates/produto_promocao.tpl',
      1 => 1407181189,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65677685153e0d70dd68795-93356020',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'listaPromocao' => 0,
    'valorListaPromocao' => 0,
    'ACTIONS_DIR' => 0,
    'stringProdutoPromocao' => 0,
    'stringCategoriaPromocao' => 0,
    'listaCategoria' => 0,
    'listaProduto' => 0,
    'valorListaProduto' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_53e0d70de00f52_93676210',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53e0d70de00f52_93676210')) {function content_53e0d70de00f52_93676210($_smarty_tpl) {?><div id="wrapper">

    <?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


    <!--Body content-->
    <div id="content" class="clearfix">
        <div class="contentwrapper"><!--Content wrapper-->

            <?php echo $_smarty_tpl->getSubTemplate ("heading.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


            <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

            <?php  $_smarty_tpl->tpl_vars['valorListaPromocao'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorListaPromocao']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaPromocao']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorListaPromocao']->key => $_smarty_tpl->tpl_vars['valorListaPromocao']->value){
$_smarty_tpl->tpl_vars['valorListaPromocao']->_loop = true;
?><?php } ?>

            <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['valorListaPromocao']->value['ID_PROMOCAO'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1){?>

            <form class="form-horizontal" id="editaPromocao" action="<?php echo $_smarty_tpl->tpl_vars['ACTIONS_DIR']->value;?>
promocao.php" method="post"/>
            <div class="row-fluid">

                <div class="span12">

                    <div class="box">

                        <div class="title">

                            <h4>
                                <span class="icon16 brocco-icon-grid"></span>
                                <span>Cadastra Promo&ccedil;&atilde;o</span>
                            </h4>

                        </div>
                        <div class="content">



                            <input type="hidden" name="acao" value="editaPromocao">


                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="required">ID Promo&ccedil;&atilde;o</label>
                                        <input class="span2" id="idPromocao" type="text" name="idPromocao" value="<?php echo $_smarty_tpl->tpl_vars['valorListaPromocao']->value['ID_PROMOCAO'];?>
" readonly />
                                    </div>
                                </div>
                            </div>                       



                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="required">Descri&ccedil;&atilde;o</label>
                                        <input class="span8" id="nomePromocao" type="text" name="nomePromocao" required="required" value="<?php echo $_smarty_tpl->tpl_vars['valorListaPromocao']->value['NOME_PROMOCAO'];?>
" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="required">Data Inicial</label>
                                        <input class="span4 mask-date" id="dataInicialPromocao" type="text" name="dataInicialPromocao" value="<?php echo $_smarty_tpl->tpl_vars['valorListaPromocao']->value['DATA_INICIAL'];?>
" required="required" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="required">Data Final</label>
                                        <input class="span4 mask-date" id="dataFinalPromocao" type="text" name="dataFinalPromocao" value="<?php echo $_smarty_tpl->tpl_vars['valorListaPromocao']->value['DATA_FINAL'];?>
" required="required" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="normal">Tipo Promo&ccedil;&atilde;o</label>
                                        <div class="span8 controls">
                                            <select id="tipoPromocao" name="tipoPromocao" required="required">
                                                <?php if ($_smarty_tpl->tpl_vars['valorListaPromocao']->value['TIPO_PROMOCAO']=='P'){?>
                                                <option value="P" checked="checked">PERCENTUAL</option>
                                                <option value="V">VALOR</option>
                                                <?php }else{ ?>
                                                <option value="P">PERCENTUAL</option>
                                                <option value="V" checked="checked">VALOR</option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="normal">Valor</label>
                                        <input class="span4 mask-moeda-real" id="valorPromocao" type="text" name="valorPromocao"  value="<?php echo number_format($_smarty_tpl->tpl_vars['valorListaPromocao']->value['VALOR'],2,",",".");?>
" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="normal">Promo&ccedil;&atilde;o Ativa</label>
                                        <?php if ($_smarty_tpl->tpl_vars['valorListaPromocao']->value['PROMOCAO_ATIVA']=='S'){?>
                                        <input id="ativaPromocao" type="checkbox" name="ativaPromocao" value="S" checked="checked" />
                                        <?php }else{ ?>
                                        <input id="ativaPromocao" type="checkbox" name="ativaPromocao" value="S" />
                                        <?php }?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="normal">Frete Gr&aacute;tis</label>
                                        <?php if ($_smarty_tpl->tpl_vars['valorListaPromocao']->value['FRETE_GRATIS']=='S'){?>
                                        <input id="freteGratis" type="checkbox" name="freteGratis" value="S" checked="checked" />
                                        <?php }else{ ?>
                                        <input id="freteGratis" type="checkbox" name="freteGratis" value="S" />
                                        <?php }?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="normal">Observa&ccedil;&atilde;o</label>
                                        <input class="span8" id="obsPromocao" type="text" name="obsPromocao" value="<?php echo $_smarty_tpl->tpl_vars['valorListaPromocao']->value['OBS'];?>
" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="produtoPromocaoSelect">Produtos</label>
                                        <!-- <select class="nostyle" id="produtoPromocaoSelect" name="produtoPromocaoSelect[]" multiple>  
                                        </select> -->
                                        <input type="text" id="produtoPromocaoSelect" name="produtoPromocaoSelect" value="<?php echo $_smarty_tpl->tpl_vars['stringProdutoPromocao']->value;?>
"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="categoriaPromocaoSelect">Categorias</label>
                                        <!-- <select class="nostyle" id="categoriaPromocaoSelect" name="categoriaPromocaoSelect[]" multiple>  
                                        </select> -->
                                        <input type="text" id="categoriaPromocaoSelect" name="categoriaPromocaoSelect" value="<?php echo $_smarty_tpl->tpl_vars['stringCategoriaPromocao']->value;?>
"/>
                                    </div>
                                </div>
                            </div>

                            <!-- <hr />                                    
                            <div class="form-row row-fluid">
                                <div class="span6">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="normal">Categoria</label>

                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="row-fluid lista-categoria">

                                        <div><?php echo $_smarty_tpl->tpl_vars['listaCategoria']->value;?>
</div>
                                    </div>
                                </div>
                            </div> -->

                            <div class="form-actions">
                               <button type="submit" class="btn btn-info">Salvar</button>
                               <!--<button type="button" class="btn">Cancelar</button>-->
                           </div>
                           <div id="teste"></div>  

                       </div>

                   </div><!-- End .box -->

               </div>


                    <!--<div class="span6">



                        <div class="box">

                            <div class="title">

                                <h4>
                                    <span class="icon16 brocco-icon-grid"></span>
                                    <span>Promo&ccedil;&atilde;o Produto</span>
                                </h4>
                                
                            </div>
                            <div class="content">


                                <div class="form-actions">
                                       <button type="submit" class="btn btn-info">Salvar</button>
                                       <button type="button" class="btn">Cancelar</button>
                                    </div>
                                    <div id="teste">123</div>

                            </div>
                        </div>
 
                    </div>-->
                </div>

            </form>

            <?php }else{ ?>

            <form class="form-horizontal" id="cadastraPromocao" action="<?php echo $_smarty_tpl->tpl_vars['ACTIONS_DIR']->value;?>
promocao.php" method="post"/>
            <div class="row-fluid">

                <div class="span12">

                    <div class="box">

                        <div class="title">

                            <h4>
                                <span class="icon16 brocco-icon-grid"></span>
                                <span>Cadastra Promo&ccedil;&atilde;o</span>
                            </h4>

                        </div>
                        <div class="content">



                            <input type="hidden" name="acao" value="cadastraPromocao">


                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="required">Descri&ccedil;&atilde;o</label>
                                        <input class="span8" id="nomePromocao" type="text" name="nomePromocao" required="required" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="required">Data Inicial</label>
                                        <input class="span4 mask-date" id="dataInicialPromocao" type="text" name="dataInicialPromocao" required="required" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="required">Data Final</label>
                                        <input class="span4 mask-date" id="dataFinalPromocao" type="text" name="dataFinalPromocao" required="required" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="normal">Tipo Promo&ccedil;&atilde;o</label>
                                        <div class="span8 controls">
                                            <select id="tipoPromocao" name="tipoPromocao" required="required">
                                                <option value="P">PERCENTUAL</option>
                                                <option value="V">VALOR</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="normal">Valor</label>
                                        <input class="span4 mask-moeda-real" id="valorPromocao" type="text" name="valorPromocao"  />
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="normal">Promo&ccedil;&atilde;o Ativa</label>
                                        <input id="ativaPromocao" type="checkbox" name="ativaPromocao" value="S" checked="checked" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="normal">Frete Gr&aacute;tis</label>
                                        <input id="freteGratis" type="checkbox" name="freteGratis" value="S" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="normal">Observa&ccedil;&atilde;o</label>
                                        <input class="span8" id="obsPromocao" type="text" name="obsPromocao" />
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="produtoPromocaoSelect">Produtos</label>
                                        <!-- <select class="nostyle" id="produtoPromocaoSelect" name="produtoPromocaoSelect[]" multiple>  
                                        </select> -->
                                        <input type="hidden" id="produtoPromocaoSelect" name="produtoPromocaoSelect"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label class="form-label span4" for="categoriaPromocaoSelect">Categorias</label>
                                        <!-- <select class="nostyle" id="categoriaPromocaoSelect" name="categoriaPromocaoSelect[]" multiple>  
                                        </select> -->
                                        <input type="hidden" id="categoriaPromocaoSelect" name="categoriaPromocaoSelect"/>
                                    </div>
                                </div>
                            </div>

                                    <!-- <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="checkboxes">Produtos</label>
                                                <div class="span8 controls">   
                                                    <select name="idProdutos[]" id="select2" class="nostyle" style="width:100%;" multiple="multiple">
                                                            <?php  $_smarty_tpl->tpl_vars['valorListaProduto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorListaProduto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaProduto']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorListaProduto']->key => $_smarty_tpl->tpl_vars['valorListaProduto']->value){
$_smarty_tpl->tpl_vars['valorListaProduto']->_loop = true;
?>
                                                                <option value="<?php echo $_smarty_tpl->tpl_vars['valorListaProduto']->value['ID_PRODUTO'];?>
" /><?php echo $_smarty_tpl->tpl_vars['valorListaProduto']->value['REFERENCIA'];?>
 - <?php echo $_smarty_tpl->tpl_vars['valorListaProduto']->value['DESCRICAO_VENDA'];?>

                                                            <?php } ?>
                                                      </select>
                                                </div> 
                                            </div>
                                        </div> 
                                    </div>

                                    <hr /> -->
                                    <!-- <div class="form-row row-fluid">
                                        <div class="span6">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Categoria</label>
                                                
                                            </div>
                                        </div>
                                        <div class="span6">
                                            <div class="row-fluid lista-categoria">

                                                <div><?php echo $_smarty_tpl->tpl_vars['listaCategoria']->value;?>
</div>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="form-actions">
                                       <button type="submit" class="btn btn-info">Salvar</button>
                                       <!--<button type="button" class="btn">Cancelar</button>-->
                                   </div>
                                   <div id="teste"></div>  

                               </div>

                           </div><!-- End .box -->

                       </div>


                    <!--<div class="span6">



                        <div class="box">

                            <div class="title">

                                <h4>
                                    <span class="icon16 brocco-icon-grid"></span>
                                    <span>Promo&ccedil;&atilde;o Produto</span>
                                </h4>
                                
                            </div>
                            <div class="content">


                                <div class="form-actions">
                                       <button type="submit" class="btn btn-info">Salvar</button>
                                       <button type="button" class="btn">Cancelar</button>
                                    </div>
                                    <div id="teste">123</div>

                            </div>
                        </div>
 
                    </div>-->
                </div>

            </form>
            <?php }?>
            <!-- Page end here -->


        </div><!-- End contentwrapper -->
    </div><!-- End #content -->

</div><!-- End #wrapper -->


<?php }} ?>