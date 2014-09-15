<?php /* Smarty version Smarty-3.1.10, created on 2014-06-11 17:04:42
         compiled from "templates\compre_junto_cadastra.tpl" */ ?>
<?php /*%%SmartyHeaderCode:243825398b65aed20b4-24080664%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0f34d036439a53c7bbe2f03b136a548209179bf2' => 
    array (
      0 => 'templates\\compre_junto_cadastra.tpl',
      1 => 1401450534,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '243825398b65aed20b4-24080664',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'listaCompreJunto' => 0,
    'ACTIONS_DIR' => 0,
    'valorCompreJunto' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_5398b65af421a2_88161167',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5398b65af421a2_88161167')) {function content_5398b65af421a2_88161167($_smarty_tpl) {?><div id="wrapper">

    <?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


    <!--Body content-->
    <div id="content" class="clearfix">
        <div class="contentwrapper"><!--Content wrapper-->

            <?php echo $_smarty_tpl->getSubTemplate ("heading.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


            <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

                <?php  $_smarty_tpl->tpl_vars['valorCompreJunto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorCompreJunto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaCompreJunto']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorCompreJunto']->key => $_smarty_tpl->tpl_vars['valorCompreJunto']->value){
$_smarty_tpl->tpl_vars['valorCompreJunto']->_loop = true;
?><?php } ?>

                

                <form class="form-horizontal" id="cadastraCompreJunto" action="<?php echo $_smarty_tpl->tpl_vars['ACTIONS_DIR']->value;?>
compre_junto.php" method="post"/>
                <div class="row-fluid">

                    <div class="span12">

                        <div class="box">

                            <div class="title">

                                <h4>
                                    <span class="icon16 brocco-icon-grid"></span>
                                    <span>Cadastra Compre Junto</span>
                                </h4>
                                
                            </div>
                            <div class="content">
                               
                                
                                    <?php if ($_smarty_tpl->tpl_vars['valorCompreJunto']->value['ID_PRODUTO_COMPRE_JUNTO']){?>
                                    <input type="hidden" name="acao" value="editaCompreJunto">
                                    <?php }else{ ?>
                                    <input type="hidden" name="acao" value="cadastraCompreJunto">
                                    <?php }?>
                                    

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">ID Compre Junto</label>
                                                <input class="span2" id="idCompreJunto" type="text" name="idCompreJunto" value="<?php echo $_smarty_tpl->tpl_vars['valorCompreJunto']->value['ID_PRODUTO_COMPRE_JUNTO'];?>
" readonly />
                                            </div>
                                        </div>
                                    </div>                       
                                    

                                    
                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Descri&ccedil;&atilde;o</label>
                                                <input class="span8" id="descricaoCompreJunto" type="text" name="descricaoCompreJunto" required="required" value="<?php echo $_smarty_tpl->tpl_vars['valorCompreJunto']->value['DESCRICAO'];?>
" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4">Tipo Desconto</label>
                                                <div class="span4 controls">
                                                    <select id="tipoDesconto" name="tipoDesconto">
                                                        <?php if ($_smarty_tpl->tpl_vars['valorCompreJunto']->value['TIPO_DESCONTO']=='P'){?>
                                                        <option value="P" checked>PERCENTUAL</option>
                                                        <option value="V">VALOR</option>
                                                        <option value="">SEM DESCONTO</option>
                                                        <?php }elseif($_smarty_tpl->tpl_vars['valorCompreJunto']->value['TIPO_DESCONTO']=='V'){?>
                                                        <option value="V" checked>VALOR</option>
                                                        <option value="P">PERCENTUAL</option>
                                                        <option value="">SEM DESCONTO</option>
                                                        <?php }else{ ?>
                                                        <option value="" checked>SEM DESCONTO</option>
                                                        <option value="P">PERCENTUAL</option>
                                                        <option value="V">VALOR</option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4">Valor Desconto</label>
                                                <input class="span4 mask-moeda-real" id="valorDesconto" type="text" name="valorDesconto" value="<?php echo number_format($_smarty_tpl->tpl_vars['valorCompreJunto']->value['VALOR_DESCONTO'],2,",",".");?>
" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Ativo</label>
                                                <?php if ($_smarty_tpl->tpl_vars['valorCompreJunto']->value['ATIVO']=='S'){?>
                                                <input id="ativaCompreJunto" type="checkbox" name="ativaCompreJunto" value="S" checked="checked" />
                                                <?php }else{ ?>
                                                <input id="ativaCompreJunto" type="checkbox" name="ativaCompreJunto" value="S" />
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-actions">
                                       <button type="submit" class="btn btn-info">Salvar</button>
                                       <!--<button type="button" class="btn">Cancelar</button>-->
                                    </div>
                                    <div id="teste"></div>  

                            </div>

                        </div><!-- End .box -->

                    </div>

                    </form>

                    <div class="row-fluid">

                        <div class="span12">

                            <div class="box gradient">

                                <div class="title">
                                    <h4>
                                        <span>Lista Produto</span>
                                        
                                    </h4>
                                </div>
                                <div class="content noPad" id="tabelaListaProdutoCombinacao">
                                    <table id="tableListaProdutoCombinacao" cellpadding="0" cellspacing="0" border="0" class="responsive display table table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <!--<th>ID</th>-->
                                                <th>Imagem</th>
                                                <th>Descri&ccedil;&atilde;o Venda</th>
                                                <th>Refer&ecirc;ncia</th>
                                                <th>Situa&ccedil;&atilde;o</th>
                                                <th>Adicionar</th>
                                                <th>For&ccedil;a</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr></tr>
                                        </tbody>
                                        
                                    </table>
                                </div>

                            </div><!-- End .box -->

                        </div><!-- End .span12 -->

                    </div><!-- End .row-fluid -->
                

                    <!--<div class="span6">



                        <div class="box">

                            <div class="title">

                                <h4>
                                    <span class="icon16 brocco-icon-grid"></span>
                                    <span>Compre Junto Produto</span>
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

                

               
            <!-- Page end here -->
                
           
        </div><!-- End contentwrapper -->
    </div><!-- End #content -->

</div><!-- End #wrapper -->

   

<?php }} ?>