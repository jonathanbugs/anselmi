<?php /* Smarty version Smarty-3.1.10, created on 2014-06-11 15:16:17
         compiled from "templates\carrinho_promocao.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2248253989cf1037b26-95499089%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd45106e16b1001d765a9e0f08f690ffd6b08613e' => 
    array (
      0 => 'templates\\carrinho_promocao.tpl',
      1 => 1402435905,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2248253989cf1037b26-95499089',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'listaPromocaoCarrinho' => 0,
    'valorListaPromocaoCarrinho' => 0,
    'ACTIONS_DIR' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_53989cf110b6f0_02452885',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53989cf110b6f0_02452885')) {function content_53989cf110b6f0_02452885($_smarty_tpl) {?><div id="wrapper">

    <?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


    <!--Body content-->
    <div id="content" class="clearfix">
        <div class="contentwrapper"><!--Content wrapper-->

            <?php echo $_smarty_tpl->getSubTemplate ("heading.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


            <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

                <?php  $_smarty_tpl->tpl_vars['valorListaPromocaoCarrinho'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorListaPromocaoCarrinho']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaPromocaoCarrinho']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorListaPromocaoCarrinho']->key => $_smarty_tpl->tpl_vars['valorListaPromocaoCarrinho']->value){
$_smarty_tpl->tpl_vars['valorListaPromocaoCarrinho']->_loop = true;
?><?php } ?>

                <?php if ($_smarty_tpl->tpl_vars['valorListaPromocaoCarrinho']->value['ID_PROMOCAO_CARRINHO']){?>

                <form class="form-horizontal" id="editaPromocaoCarrinho" action="<?php echo $_smarty_tpl->tpl_vars['ACTIONS_DIR']->value;?>
promocao.php" method="post"/>
                
                <div class="row-fluid">

                    <div class="span9">

                        <div class="box">

                            <div class="title">

                                <h4>
                                    <span class="icon16 brocco-icon-grid"></span>
                                    <span>Cadastra Promo&ccedil;&atilde;o Carrinho</span>
                                </h4>
                                
                            </div>
                            <div class="content">
                               
                                    <input type="hidden" name="acao" value="editaPromocaoCarrinho">

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">ID Promo&ccedil;&atilde;o</label>
                                                <input class="span2" id="idPromocaoCarrinho" type="text" name="idPromocaoCarrinho" value="<?php echo $_smarty_tpl->tpl_vars['valorListaPromocaoCarrinho']->value['ID_PROMOCAO_CARRINHO'];?>
" readonly required="required" />
                                            </div>
                                        </div>
                                    </div>                       
                                    

                                    
                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Descri&ccedil;&atilde;o</label>
                                                <input class="span8" id="descricaoPromocao" type="text" name="descricaoPromocao" required="required" value="<?php echo $_smarty_tpl->tpl_vars['valorListaPromocaoCarrinho']->value['DESCRICAO_PROMOCAO'];?>
" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Cupom Promocional</label>
                                                <input class="span8" id="cupomPromocional" type="text" name="cupomPromocional"  value="<?php echo $_smarty_tpl->tpl_vars['valorListaPromocaoCarrinho']->value['CUPOM_PROMOCIONAL'];?>
" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">E-mail Cliente Contemplado</label>
                                                <input class="span8" id="emailClienteContemplado" type="text" name="emailClienteContemplado" value="<?php echo $_smarty_tpl->tpl_vars['valorListaPromocaoCarrinho']->value['EMAIL_CLIENTE_CONTEMPLADO'];?>
" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Data Inicial</label>
                                                <input class="span4 mask-date" id="dataInicialValidade" type="text" name="dataInicialValidade" value="<?php echo $_smarty_tpl->tpl_vars['valorListaPromocaoCarrinho']->value['DATA_INICIAL_VALIDADE'];?>
" required="required" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Data Final</label>
                                                <input class="span4 mask-date" id="dataFinalValidade" type="text" name="dataFinalValidade" value="<?php echo $_smarty_tpl->tpl_vars['valorListaPromocaoCarrinho']->value['DATA_FINAL_VALIDADE'];?>
" required="required" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Tipo Promo&ccedil;&atilde;o</label>
                                                <div class="span8 controls">
                                                    <select id="tipoDesconto" name="tipoDesconto" required="required">
                                                        <?php if ($_smarty_tpl->tpl_vars['valorListaPromocaoCarrinho']->value['TIPO_DESCONTO']=='P'){?>
                                                        <option value="P" selected="selected">PERCENTUAL</option>
                                                        <option value="V">VALOR</option>
                                                        <?php }else{ ?>
                                                        <option value="V" selected="selected">VALOR</option>
                                                        <option value="P">PERCENTUAL</option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Valor Desconto</label>
                                                <input class="span4 mask-moeda-real" id="valorDesconto" type="text" name="valorDesconto"  value="<?php echo number_format($_smarty_tpl->tpl_vars['valorListaPromocaoCarrinho']->value['VALOR_DESCONTO'],2,",",".");?>
" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Valor M&iacute;nimo Compra</label>
                                                <input class="span4 mask-moeda-real" id="valorMinimoCompra" type="text" name="valorMinimoCompra" required="required" value="<?php echo number_format($_smarty_tpl->tpl_vars['valorListaPromocaoCarrinho']->value['VALOR_MINIMO_COMPRA'],2,",",".");?>
" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Promo&ccedil;&atilde;o Ativa</label>
                                                <?php if ($_smarty_tpl->tpl_vars['valorListaPromocaoCarrinho']->value['PROMOCAO_ATIVA']=='S'){?>
                                                <input id="promocaoAtiva" type="checkbox" name="promocaoAtiva" value="S" checked="checked" />
                                                <?php }else{ ?>
                                                <input id="promocaoAtiva" type="checkbox" name="promocaoAtiva" value="S" />
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Utiliza&ccedil;&atilde;o &Uacute;nica</label>
                                                <?php if ($_smarty_tpl->tpl_vars['valorListaPromocaoCarrinho']->value['UTILIZACAO_UNICA']=='S'){?>
                                                <input id="utilizacaoUnica" type="checkbox" name="utilizacaoUnica" value="S" checked="checked" />
                                                <?php }else{ ?>
                                                <input id="utilizacaoUnica" type="checkbox" name="utilizacaoUnica" value="S" />
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Quantidade Produto Carrinho</label>
                                                <input class="span1" id="quantidadeProdutoCarrinho" type="text" name="quantidadeProdutoCarrinho" value="<?php echo $_smarty_tpl->tpl_vars['valorListaPromocaoCarrinho']->value['QUANTIDADE_PROMOCAO_CARRINHO'];?>
" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Frete Gr&aacute;tis</label>
                                                <?php if ($_smarty_tpl->tpl_vars['valorListaPromocaoCarrinho']->value['FRETE_GRATIS']=='S'){?>
                                                <input id="freteGratis" type="checkbox" name="freteGratis" value="S" checked="checked" />
                                                <?php }else{ ?>
                                                <input id="freteGratis" type="checkbox" name="freteGratis" value="S" />
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Pacote Presente Gr&aacute;tis</label>
                                                <?php if ($_smarty_tpl->tpl_vars['valorListaPromocaoCarrinho']->value['PACOTE_PRESENTE_GRATIS']=='S'){?>
                                                <input id="pacotePresenteGratis" type="checkbox" name="pacotePresenteGratis" value="S" checked="checked" />
                                                <?php }else{ ?>
                                                <input id="pacotePresenteGratis" type="checkbox" name="pacotePresenteGratis" value="S" />
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>-->

                                    <div class="form-actions">
                                       <button type="submit" class="btn btn-info">Salvar</button>
                                       <!--<button type="button" class="btn">Cancelar</button>-->
                                    </div>
                                    <div id="teste">123</div>  

                            </div>

                        </div><!-- End .box -->

                    </div>
                

                </div>

                </form>

                <?php }else{ ?>

                <form class="form-horizontal" id="cadastraPromocaoCarrinho" action="<?php echo $_smarty_tpl->tpl_vars['ACTIONS_DIR']->value;?>
promocao.php" method="post"/>
                
                <div class="row-fluid">

                    <div class="span9">

                        <div class="box">

                            <div class="title">

                                <h4>
                                    <span class="icon16 brocco-icon-grid"></span>
                                    <span>Cadastra Promo&ccedil;&atilde;o Carrinho</span>
                                </h4>
                                
                            </div>
                            <div class="content">
                               
                                    <input type="hidden" name="acao" value="cadastraPromocaoCarrinho">

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Descri&ccedil;&atilde;o</label>
                                                <input class="span8" id="descricaoPromocao" type="text" name="descricaoPromocao" required="required" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Cupom Promocional</label>
                                                <input class="span8" id="cupomPromocional" type="text" name="cupomPromocional" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">E-mail Cliente Contemplado</label>
                                                <input class="span8" id="emailClienteContemplado" type="text" name="emailClienteContemplado"  />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Data Inicial</label>
                                                <input class="span4 mask-date" id="dataInicialValidade" type="text" name="dataInicialValidade"  required="required" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Data Final</label>
                                                <input class="span4 mask-date" id="dataFinalValidade" type="text" name="dataFinalValidade"  required="required" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Tipo Promo&ccedil;&atilde;o</label>
                                                <div class="span8 controls">
                                                    <select id="tipoDesconto" name="tipoDesconto" required="required">
                                                        <option value="P" checked="checked">PERCENTUAL</option>
                                                        <option value="V">VALOR</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Valor Desconto</label>
                                                <input class="span4 mask-moeda-real" id="valorDesconto" type="text" name="valorDesconto"  />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Valor M&iacute;nimo Compra</label>
                                                <input class="span4 mask-moeda-real" id="valorMinimoCompra" type="text" name="valorMinimoCompra" required="required"  />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Promo&ccedil;&atilde;o Ativa</label>
                                                <input id="promocaoAtiva" type="checkbox" name="promocaoAtiva" value="S" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Utiliza&ccedil;&atilde;o &Uacute;nica</label>
                                                <input id="utilizacaoUnica" type="checkbox" name="utilizacaoUnica" value="S" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Quantidade Produto Carrinho</label>
                                                <input class="span1" id="quantidadeProdutoCarrinho" type="text" name="quantidadeProdutoCarrinho"  />
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

                                    <!-- <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Pacote Presente Gr&aacute;tis</label>
                                                <input id="pacotePresenteGratis" type="checkbox" name="pacotePresenteGratis" value="S" />
                                            </div>
                                        </div>
                                    </div>-->

                                    <div class="form-actions">
                                       <button type="submit" class="btn btn-info">Salvar</button>
                                       <!--<button type="button" class="btn">Cancelar</button>-->
                                    </div>
                                    <div id="teste">123</div>  

                            </div>

                        </div><!-- End .box -->

                    </div>
                

                    
                </div>

                </form>
                <?php }?>
            <!-- Page end here -->
                
           
        </div><!-- End contentwrapper -->
    </div><!-- End #content -->

</div><!-- End #wrapper -->

   

<?php }} ?>