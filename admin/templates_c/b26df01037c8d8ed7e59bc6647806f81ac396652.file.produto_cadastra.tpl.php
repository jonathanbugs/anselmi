<?php /* Smarty version Smarty-3.1.10, created on 2014-06-13 09:35:52
         compiled from "templates\produto_cadastra.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10279539af02827c160-03860665%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b26df01037c8d8ed7e59bc6647806f81ac396652' => 
    array (
      0 => 'templates\\produto_cadastra.tpl',
      1 => 1402428242,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10279539af02827c160-03860665',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'produto' => 0,
    'ACTIONS_DIR' => 0,
    'valueProduto' => 0,
    'pessoaFabricante' => 0,
    'valorPessoaFabricante' => 0,
    'produtoSituacao' => 0,
    'valorProdutoSituacao' => 0,
    'listaNivelAux' => 0,
    'keyNivelAux' => 0,
    'valueNivelAux' => 0,
    'value' => 0,
    'listaNivelAuxProduto' => 0,
    'dataAtual' => 0,
    'listaCategoria' => 0,
    'listaAtributoProduto' => 0,
    'listaAtributo' => 0,
    'valorListaAtributo' => 0,
    'valorlistaAtributoProduto' => 0,
    'listaCombinacao1' => 0,
    'key1' => 0,
    'listaCombinacao2' => 0,
    'valueCombinacao2' => 0,
    'count' => 0,
    'valueCombinacao1' => 0,
    'listaOperacaoDeposito' => 0,
    'valorOperacaoDeposito' => 0,
    'listaDeposito' => 0,
    'valorDeposito' => 0,
    'listaEstoqueProduto' => 0,
    'key' => 0,
    'listaImagemEstoque' => 0,
    'urlImagem' => 0,
    'imagem' => 0,
    'valorListaEstoqueProduto' => 0,
    'codigoUnico' => 0,
    'listaTipoFrete' => 0,
    'valorTipoFrete' => 0,
    'ordem' => 0,
    'listaProdutoCompreJunto' => 0,
    'valueListaCompreJunto' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_539af0287cfc46_27480824',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_539af0287cfc46_27480824')) {function content_539af0287cfc46_27480824($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_capitalize')) include 'C:\\wamp\\www\\lojas\\lojapadrao\\smarty\\plugins\\modifier.capitalize.php';
?>   
            
    <div class="wrapper">

        <?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <?php echo $_smarty_tpl->getSubTemplate ("heading.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


                <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

                <div class="row-fluid"> 
                <!--cadastro de produto-->
                <div class="span12">                            

                    <div class="page-header">
                        <h4>Cadastro de Produto</h4>
                    </div>
                    
                    <?php  $_smarty_tpl->tpl_vars['valueProduto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueProduto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['produto']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueProduto']->key => $_smarty_tpl->tpl_vars['valueProduto']->value){
$_smarty_tpl->tpl_vars['valueProduto']->_loop = true;
?>
                    <?php } ?>

                    
                    <div style="margin-bottom: 20px;">
                        <div class="tabbable">
                            <ul id="myTab" class="nav nav-tabs pattern">
                                <li class="active"><a href="#tab1" data-toggle="tabProduto">Informa&ccedil;&otilde;es</a></li>
                                <!--<li class="inativo"><a href="#tab2" data-toggle="tabProduto">Pre&ccedil;os</a></li>-->
                                <li class="inativo"><a href="#tab3" data-toggle="tabProduto">SEO</a></li>
                                <li class="inativo"><a href="#tab4" data-toggle="tabProduto">Categorias</a></li>
                                <li class="inativo"><a href="#tab5" data-toggle="tabProduto">Combina&ccedil;&otilde;es</a></li>
                                <li class="inativo"><a href="#tab8" data-toggle="tabProduto">Upload Imagens/Manual</a></li>
                                <li class="inativo"><a href="#tab6" data-toggle="tabProduto">Estoque</a></li>
                                <li class="inativo"><a href="#tab7" data-toggle="tabProduto">Tipo Frete</a></li>
                                <li class="inativo"><a href="#tab9" data-toggle="tabProduto">Compre Junto</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <form class="form-horizontal" id="cadastroProduto" action="<?php echo $_smarty_tpl->tpl_vars['ACTIONS_DIR']->value;?>
produto.php" method="post"/>
                                        <?php if ($_smarty_tpl->tpl_vars['valueProduto']->value['ID_PRODUTO']){?>
                                            <input type="hidden" value="editarProduto" name="acao" id="acao">    
                                        <?php }else{ ?>
                                            <input type="hidden" value="cadastrarProduto" name="acao" id="acao">
                                        <?php }?>

                                        <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['valueProduto']->value['ID_PRODUTO'];?>
" id="idProduto" name="idProduto">

                                        
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="checkboxes">Fabricante</label>
                                                    <div class="span8 controls">   
                                                        
                                                        <select name="fabricanteProduto" id="fabricanteProduto" style="width:100%;">
                                                            
                                                            <?php  $_smarty_tpl->tpl_vars['valorPessoaFabricante'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorPessoaFabricante']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pessoaFabricante']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorPessoaFabricante']->key => $_smarty_tpl->tpl_vars['valorPessoaFabricante']->value){
$_smarty_tpl->tpl_vars['valorPessoaFabricante']->_loop = true;
?>
                                                                <option <?php if ($_smarty_tpl->tpl_vars['valueProduto']->value['PESS_ID_PESSOA_FABRICANTE']==$_smarty_tpl->tpl_vars['valorPessoaFabricante']->value['ID_PESSOA']){?>selected="selected"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['valorPessoaFabricante']->value['ID_PESSOA'];?>
"><?php echo $_smarty_tpl->tpl_vars['valorPessoaFabricante']->value['NOME'];?>
</option>
                                                            <?php } ?>    
                                                        </select>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div> 

                                        
                                          
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="normal">Situa&ccedil;&atilde;o</label>
                                                    <div class="span4 controls">
                                                        <select id="situacaoProduto" name="situacaoProduto"  >
                                                            
                                                            <?php  $_smarty_tpl->tpl_vars['valorProdutoSituacao'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorProdutoSituacao']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['produtoSituacao']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorProdutoSituacao']->key => $_smarty_tpl->tpl_vars['valorProdutoSituacao']->value){
$_smarty_tpl->tpl_vars['valorProdutoSituacao']->_loop = true;
?>
                                                                <?php if ($_smarty_tpl->tpl_vars['valueProduto']->value['PRSI_ID_PRODUTO_SITUACAO']==$_smarty_tpl->tpl_vars['valorProdutoSituacao']->value['ID_PRODUTO_SITUACAO']){?>
                                                                    <option selected="selected" value="<?php echo $_smarty_tpl->tpl_vars['valorProdutoSituacao']->value['ID_PRODUTO_SITUACAO'];?>
"><?php echo $_smarty_tpl->tpl_vars['valorProdutoSituacao']->value['DESCRICAO_SITUACAO'];?>
</option>
                                                                <?php }else{ ?>
                                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['valorProdutoSituacao']->value['ID_PRODUTO_SITUACAO'];?>
"><?php echo $_smarty_tpl->tpl_vars['valorProdutoSituacao']->value['DESCRICAO_SITUACAO'];?>
</option>
                                                                <?php }?>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="required">Descri&ccedil;&atilde;o Venda</label>
                                                    <input class="span8" id="nomeProduto" type="text" name="nomeProduto" value="<?php echo $_smarty_tpl->tpl_vars['valueProduto']->value['NOME'];?>
" maxlength="100" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="required">Refer&ecirc;ncia</label>
                                                    <input class="span3" id="referenciaProduto" type="text" name="referenciaProduto"  maxlength="50" value="<?php echo $_smarty_tpl->tpl_vars['valueProduto']->value['REFERENCIA'];?>
"   />
                                                </div>
                                            </div>
                                        </div>

                                        <!--<div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="required">EAN</label>
                                                    <input class="span8" id="codeanProduto" type="text" name="codeanProduto"  maxlength="50" value="<?php echo $_smarty_tpl->tpl_vars['valueProduto']->value['COD_EAN'];?>
"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="required">NCM</label>
                                                    <input class="span8" id="ncmProduto" type="text" name="ncmProduto"  maxlength="50" value="<?php echo $_smarty_tpl->tpl_vars['valueProduto']->value['NCM'];?>
"/>
                                                </div>
                                            </div>
                                        </div>-->

                                        

                                        <hr />

                                        <?php  $_smarty_tpl->tpl_vars['valueNivelAux'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueNivelAux']->_loop = false;
 $_smarty_tpl->tpl_vars['keyNivelAux'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['listaNivelAux']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueNivelAux']->key => $_smarty_tpl->tpl_vars['valueNivelAux']->value){
$_smarty_tpl->tpl_vars['valueNivelAux']->_loop = true;
 $_smarty_tpl->tpl_vars['keyNivelAux']->value = $_smarty_tpl->tpl_vars['valueNivelAux']->key;
?>
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="normal"><?php echo smarty_modifier_capitalize((mb_strtolower($_smarty_tpl->tpl_vars['keyNivelAux']->value, 'UTF-8')));?>
</label>
                                                    <div class="span4 controls">
                                                        <select name="nivelAuxProduto[]"  >
                                                            <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['valueNivelAux']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
                                                                <option <?php if ($_smarty_tpl->tpl_vars['value']->value['ID_NIVEL_AUX_VALOR']==$_smarty_tpl->tpl_vars['listaNivelAuxProduto']->value[$_smarty_tpl->tpl_vars['keyNivelAux']->value][0]['ID_NIVEL_AUX_VALOR']){?>selected="selected"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['value']->value['ID_NIVEL_AUX_VALOR'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['VALOR'];?>
</option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>

                                        
                                        <hr />

                                        
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="required">Pre&ccedil;o Venda</label>
                                                    <input class="span3 mask-moeda-real" id="precoVendaProduto" type="text" name="precoVendaProduto" value="<?php echo number_format($_smarty_tpl->tpl_vars['valueProduto']->value['PRECO_VENDA'],2,",",".");?>
"  />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="required">Data Inicial Validade</label>
                                                    <input class="span3 mask-data datepicker" id="precoVendaProdutoDataInicialValidade" type="text" name="precoVendaProdutoDataInicialValidade" value="<?php if ($_smarty_tpl->tpl_vars['valueProduto']->value['DATA_INICIAL_VALIDADE']){?><?php echo $_smarty_tpl->tpl_vars['valueProduto']->value['DATA_INICIAL_VALIDADE'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['dataAtual']->value;?>
<?php }?>"/>
                                                </div>
                                            </div>
                                        </div>

                                        <hr />

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="required">Peso (Kg)</label>
                                                    <input class="span3 mask-4-decimais" id="pesoProduto" type="text" name="pesoProduto"  value="<?php echo number_format($_smarty_tpl->tpl_vars['valueProduto']->value['PESO_KG'],4,",",".");?>
" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="required">Altura (cm)</label>
                                                    <input class="span3 mask-4-decimais" id="alturaProduto" type="text" name="alturaProduto" value="<?php echo number_format($_smarty_tpl->tpl_vars['valueProduto']->value['ALTURA_CM'],4,",",".");?>
" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="required">Largura (cm)</label>
                                                    <input class="span3 mask-4-decimais" id="larguraProduto" type="text" name="larguraProduto"  value="<?php echo number_format($_smarty_tpl->tpl_vars['valueProduto']->value['LARGURA_CM'],4,",",".");?>
" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="required">Profundidade (cm)</label>
                                                    <input class="span3 mask-4-decimais" id="profundidadeProduto" type="text" name="profundidadeProduto" value="<?php echo number_format($_smarty_tpl->tpl_vars['valueProduto']->value['PROFUNDIDADE_CM'],4,",",".");?>
"  />
                                                </div>
                                            </div>
                                        </div>

                                        <hr />

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3">Data Inicial Lan&ccedil;amento</label>
                                                    <input class="span3 datepicker" id="dataInicialLancamentoProduto" type="text" name="dataInicialLancamentoProduto" value="<?php echo $_smarty_tpl->tpl_vars['valueProduto']->value['DATA_INICIAL_LANCAMENTO'];?>
"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3">Data Final Lan&ccedil;amento</label>
                                                    <input class="span3 datepicker" id="dataFinalLancamentoProduto" type="text" name="dataFinalLancamentoProduto" value="<?php echo $_smarty_tpl->tpl_vars['valueProduto']->value['DATA_FINAL_LANCAMENTO'];?>
"/>
                                                </div>
                                            </div>
                                        </div>

                                        <hr />

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3">Descri&ccedil;&atilde;o Longa</label>
                                                    <div class="form-row">
                                                        <textarea   id="descricaoCurtaProduto" name="descricaoCurtaProduto" class="span8 limit" rows="3" ><?php echo $_smarty_tpl->tpl_vars['valueProduto']->value['DESCRICAO_CURTA'];?>
</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--<div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3">Descri&ccedil;&atilde;o Longa</label>
                                                    <div class="form-row">
                                                        <textarea   id="descricaoLongaProduto" name="descricaoLongaProduto" class="span8 limit" rows="5"><?php echo $_smarty_tpl->tpl_vars['valueProduto']->value['DESCRICAO_LONGA'];?>
</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>-->

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="required">Video</label>
                                                    <input class="span8" id="videoProduto" name="videoProduto" type="text" value="<?php if ($_smarty_tpl->tpl_vars['valueProduto']->value['VIDEO']){?>http://www.youtube.com/watch?v=<?php echo $_smarty_tpl->tpl_vars['valueProduto']->value['VIDEO'];?>
<?php }?>" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="required"></label>
                                                    <?php if ($_smarty_tpl->tpl_vars['valueProduto']->value['VIDEO']){?>
                                                    <iframe width="200" src="//www.youtube.com/embed/<?php echo $_smarty_tpl->tpl_vars['valueProduto']->value['VIDEO'];?>
" frameborder="0" allowfullscreen></iframe>
                                                    <?php }?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                           <button type="submit" class="btn btn-info">Salvar</button>
                                           <!--<button type="button" class="btn">Cancelar</button>-->
                                        </div>

                                    </form>
                                </div>
                                <div id="teste"></div>
                                <div class="tab-pane" id="tab2">

                                    <form class="form-horizontal" id="gravaPrecoProduto" action="<?php echo $_smarty_tpl->tpl_vars['ACTIONS_DIR']->value;?>
produto.php" method="post"/>

                                    <input type="hidden" value="gravaPrecoProduto" name="acao" id="acao">
                                    <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['valueProduto']->value['ID_PRODUTO'];?>
" name="idProdutoCorrente">


                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <label>Pre&ccedil;o Compra</label>
                                                        </td>
                                                        <td>
                                                            <label>Data Inicial Validade</label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input class="span12 mask-moeda-real" id="precoCompraProduto" type="text" name="precoCompraProduto" />
                                                        </td>
                                                        <td>                                                
                                                            <input class="span12 mask-data datepicker" id="precoCompraProdutoDataInicialValidade" type="text" name="precoCompraProdutoDataInicialValidade" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <label>Pre&ccedil;o Venda</label>
                                                        </td>
                                                        <td>
                                                            <label>Data Inicial Validade</label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input class="span12 mask-moeda-real" id="precoVendaProduto" type="text" name="precoVendaProduto" />
                                                        </td>
                                                        <td>                                                
                                                            <input class="span12 mask-data datepicker" id="precoVendaProdutoDataInicialValidade" type="text" name="precoVendaProdutoDataInicialValidade" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <label>Pre&ccedil;o Venda Promocional</label>
                                                        </td>
                                                        <td>
                                                            <label>Data Inicial Validade</label>
                                                        </td>
                                                        <td>
                                                            <label>Data Final Validade</label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input class="span12 mask-moeda-real" id="precoVendaPromocionalProduto" type="text" name="precoVendaPromocionalProduto" />
                                                        </td>
                                                        <td>                                                
                                                            <input class="span12 mask-data datepicker" id="precoVendaPromocionalProdutoDataInicialValidade" type="text" name="precoVendaPromocionalProdutoDataInicialValidade" />
                                                        </td>
                                                        <td>                                                
                                                            <input class="span12 mask-data datepicker" id="precoVendaPromocionalProdutoDataFinalValidade" type="text" name="precoVendaPromocionalProdutoDataFinalValidade" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                       <button type="submit" class="btn btn-info">Salvar</button>
                                       <!--<button type="button" class="btn">Cancelar</button>-->
                                    </div>

                                    </form>

                                    <div class="box">

                                        <div class="title">

                                            <h4>
                                                <span class="icon16 brocco-icon-grid"></span>
                                                <span>Pre&ccedil;os Produto</span>
                                            </h4>
                                            
                                        </div>
                                        <div class="content noPad">
                                            <table class="responsive table table-bordered">
                                                <thead>
                                                  <tr>
                                                    <th>#</th>
                                                    <th>Valor (R$)</th>
                                                    <th>Data Inicial Validade</th>
                                                    <th>Data Final Validade</th>
                                                    <th>A&ccedil;&otilde;es</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td>Pre&ccedil;o Compra</td>
                                                    <td>Mark</td>
                                                    <td>Otto</td>
                                                    <td>@mdo</td>
                                                    <td>
                                                        <div class="controls center">
                                                            <a href="#" title="Edit task" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                                            <a href="#" title="Remove task" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
                                                        </div>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td>Pre&ccedil;o Venda</td>
                                                    <td>Jacob</td>
                                                    <td>Thornton</td>
                                                    <td>@fat</td>
                                                    <td>
                                                        <div class="controls center">
                                                            <a href="#" title="Edit task" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                                            <a href="#" title="Remove task" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
                                                        </div>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td>Pre&ccedil;o Promocional</td>
                                                    <td>Larry</td>
                                                    <td>the Bird</td>
                                                    <td>@twitter</td>
                                                    <td>
                                                        <div class="controls center">
                                                            <a href="#" title="Edit task" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                                            <a href="#" title="Remove task" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
                                                        </div>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div><!-- End .box -->

                                </div>
                                
                                <div class="tab-pane" id="tab3">
                                    
                                    <form class="form-horizontal" id="gravaMetaProduto" action="<?php echo $_smarty_tpl->tpl_vars['ACTIONS_DIR']->value;?>
produto.php" method="post"/>

                                        <input type="hidden" value="editaMetaProduto" name="acao" id="acao">

                                        <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['valueProduto']->value['ID_PRODUTO'];?>
" id="idProduto" name="idProduto">

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3">Meta title</label>
                                                    <input class="span8" id="metaTitleProduto" type="text" name="metaTitleProduto" maxlength="70" value="<?php echo $_smarty_tpl->tpl_vars['valueProduto']->value['META_TITLE'];?>
" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3">Meta description</label>
                                                    <textarea   id="metaDescriptionProduto" name="metaDescriptionProduto" class="span8 limit" rows="2" ><?php echo $_smarty_tpl->tpl_vars['valueProduto']->value['META_DESCRIPTION'];?>
</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3">Meta keywords</label>
                                                    <input class="span8" id="metaKeywordsProduto" type="text" name="metaKeywordsProduto" maxlength="200" value="<?php echo $_smarty_tpl->tpl_vars['valueProduto']->value['META_KEYWORDS'];?>
" />
                                                </div>
                                            </div>
                                        </div>
                                        <!--<div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3">URL Amig&aacute;vel</label>
                                                    <input class="span8" id="urlAmigavelProduto" type="text" name="urlAmigavelProduto" maxlength="100" value="<?php echo $_smarty_tpl->tpl_vars['valueProduto']->value['URL_AMIGAVEL'];?>
" />
                                                </div>
                                            </div>
                                        </div>-->
                                        <!--<div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3">Tags</label>
                                                    <input class="span8" id="tagsProduto" type="text" name="tagsProduto" maxlength="100" />
                                                </div>
                                            </div>
                                        </div>-->
                                        <div class="form-actions">
                                           <button type="submit" class="btn btn-info">Salvar</button>
                                           <!--<button type="button" class="btn">Cancelar</button>-->
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane" id="tab4">
                                    <form class="form-horizontal" id="gravaCategoriaProduto" action="<?php echo $_smarty_tpl->tpl_vars['ACTIONS_DIR']->value;?>
produto.php" method="post"/>

                                    <input type="hidden" value="editarCategoriaProduto" name="acao" id="acao">
                                    
                                    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['valueProduto']->value['ID_PRODUTO'];?>
" id="idProduto" name="idProduto">
                                    
                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                
                                               <?php echo $_smarty_tpl->tpl_vars['listaCategoria']->value;?>

                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                       <button type="submit" class="btn btn-info">Salvar</button>
                                       <!--<button type="button" class="btn">Cancelar</button>-->
                                    </div>
                                    </form>
                                    
                                </div>

                                <div class="tab-pane" id="tab5">
                                    
                                    <form class="form-horizontal" id="gravaCombinacaoProduto" action="<?php echo $_smarty_tpl->tpl_vars['ACTIONS_DIR']->value;?>
produto.php" method="post"/>

                                        <input type="hidden" value="gravaCombinacaoProduto" name="acao" id="acao">
                                        <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['valueProduto']->value['ID_PRODUTO'];?>
" name="idProdutoCorrente">

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <div class="span8 controls">   
                                                        <select id="atributos" style="width:300px; height:<?php echo count($_smarty_tpl->tpl_vars['listaAtributoProduto']->value)*20;?>
px;" name="atributos[]" class="nostyle" multiple="multiple">
                                                            <?php  $_smarty_tpl->tpl_vars['valorListaAtributo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorListaAtributo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaAtributo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorListaAtributo']->key => $_smarty_tpl->tpl_vars['valorListaAtributo']->value){
$_smarty_tpl->tpl_vars['valorListaAtributo']->_loop = true;
?>
                                                               <optgroup label="<?php echo $_smarty_tpl->tpl_vars['valorListaAtributo']->value['DESCRICAO_ATRIBUTO'];?>
">
                                                                    <?php  $_smarty_tpl->tpl_vars['valorlistaAtributoProduto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorlistaAtributoProduto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaAtributoProduto']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorlistaAtributoProduto']->key => $_smarty_tpl->tpl_vars['valorlistaAtributoProduto']->value){
$_smarty_tpl->tpl_vars['valorlistaAtributoProduto']->_loop = true;
?>
                                                                        <?php if ($_smarty_tpl->tpl_vars['valorlistaAtributoProduto']->value['ATRI_ID_ATRIBUTO']==$_smarty_tpl->tpl_vars['valorListaAtributo']->value['ID_ATRIBUTO']){?>
                                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['valorListaAtributo']->value['ID_ATRIBUTO'];?>
.<?php echo $_smarty_tpl->tpl_vars['valorlistaAtributoProduto']->value['ID_ATRIBUTO_VALOR'];?>
"><?php echo $_smarty_tpl->tpl_vars['valorlistaAtributoProduto']->value['VALOR'];?>
</option>
                                                                        <?php }?>
                                                                    <?php } ?>
                                                               </option>
                                                            <?php } ?> 
                                                        </select>
                                                    </div> 
                                                </div>
                                            </div> 
                                        </div>

                                        <div class="form-actions">
                                           <button type="submit" class="btn btn-info">Salvar</button>
                                           <!--<button type="button" class="btn">Cancelar</button>-->
                                        </div>
                                        
                                    </form>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <table class="responsive table">
                                                <thead>
                                                  <tr>
                                                    <th>Combina&ccedil;&atilde;o</th>
                                                    <th class="span4">Refer&ecirc;ncia</th>
                                                    <th class="span4">Pre&ccedil;o Produto</th>
                                                    <th style="width: 50px;">A&ccedil;&otilde;es</th>
                                                  </tr>
                                                </thead>
                                                <?php  $_smarty_tpl->tpl_vars['valueCombinacao1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueCombinacao1']->_loop = false;
 $_smarty_tpl->tpl_vars['key1'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['listaCombinacao1']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueCombinacao1']->key => $_smarty_tpl->tpl_vars['valueCombinacao1']->value){
$_smarty_tpl->tpl_vars['valueCombinacao1']->_loop = true;
 $_smarty_tpl->tpl_vars['key1']->value = $_smarty_tpl->tpl_vars['valueCombinacao1']->key;
?>
                                                <tbody>
                                                  <tr>
                                                    <td>
                                                        <?php $_smarty_tpl->tpl_vars['count'] = new Smarty_variable(count($_smarty_tpl->tpl_vars['listaCombinacao2']->value[$_smarty_tpl->tpl_vars['key1']->value]), null, 0);?>
                                                        <?php  $_smarty_tpl->tpl_vars['valueCombinacao2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueCombinacao2']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaCombinacao2']->value[$_smarty_tpl->tpl_vars['key1']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['valueCombinacao2']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['valueCombinacao2']->key => $_smarty_tpl->tpl_vars['valueCombinacao2']->value){
$_smarty_tpl->tpl_vars['valueCombinacao2']->_loop = true;
 $_smarty_tpl->tpl_vars['valueCombinacao2']->iteration++;
?>
                                                            <?php echo $_smarty_tpl->tpl_vars['valueCombinacao2']->value;?>

                                                            <?php if ($_smarty_tpl->tpl_vars['valueCombinacao2']->iteration!=$_smarty_tpl->tpl_vars['count']->value){?>
                                                            /
                                                            <?php }?>
                                                        <?php } ?>   
                                                    </td>
                                                    <td><input class="span6" type="text" name="refeCombinacao<?php echo $_smarty_tpl->tpl_vars['valueCombinacao1']->value['CODIGO_UNICO'];?>
" id="refeCombinacao<?php echo $_smarty_tpl->tpl_vars['valueCombinacao1']->value['CODIGO_UNICO'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['valueCombinacao1']->value['REFERENCIA'];?>
"></td>
                                                    <td><input class="span6 mask-moeda-real" type="text" name="precoCombinacao<?php echo $_smarty_tpl->tpl_vars['valueCombinacao1']->value['CODIGO_UNICO'];?>
" id="precoCombinacao<?php echo $_smarty_tpl->tpl_vars['valueCombinacao1']->value['CODIGO_UNICO'];?>
" value="<?php echo number_format($_smarty_tpl->tpl_vars['valueCombinacao1']->value['PRECO_VENDA'],2,",",".");?>
"></td>
                                                    <td>
                                                        <a class="tip" href="javascript: editaCombinacao('<?php echo $_smarty_tpl->tpl_vars['valueCombinacao1']->value['CODIGO_UNICO'];?>
');" oldtitle="editar" title="editar" aria-describedby="ui-tooltip-13">
                                                            <span class="icon12 icomoon-icon-pencil "></span>
                                                        </a>
                                                        <a class="tip" href="javascript: removeCombinacao('<?php echo $_smarty_tpl->tpl_vars['valueCombinacao1']->value['CODIGO_UNICO'];?>
');" oldtitle="excluir" title="excluir" aria-describedby="ui-tooltip-13">
                                                            <span class="icon12 icon-remove"></span>
                                                        </a>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                                <?php } ?>
                                            </table>
                                        </div> 
                                    </div>


                                </div>

                                <div class="tab-pane" id="tab6">

                                    <form class="form-horizontal" id="gravaEstoqueProduto" action="<?php echo $_smarty_tpl->tpl_vars['ACTIONS_DIR']->value;?>
produto.php" method="post"/>

                                        <input type="hidden" value="editarEstoqueProduto" name="acao" id="acao">
                                        
                                        <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['valueProduto']->value['ID_PRODUTO'];?>
" id="idProduto" name="idProduto">

                                        <div class="form-row row-fluid">
                                            <div class="span9">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="normal">Opera&ccedil;&atilde;o Dep&oacute;sito</label>
                                                    <div class="span4 controls">
                                                       <select name="operacaoDeposito" id="operacaoDeposito">
                                                            <option value="" selected="selected">-Selecione-</option>
                                                            <?php  $_smarty_tpl->tpl_vars['valorOperacaoDeposito'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorOperacaoDeposito']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaOperacaoDeposito']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorOperacaoDeposito']->key => $_smarty_tpl->tpl_vars['valorOperacaoDeposito']->value){
$_smarty_tpl->tpl_vars['valorOperacaoDeposito']->_loop = true;
?>
                                                                <option value="<?php echo $_smarty_tpl->tpl_vars['valorOperacaoDeposito']->value['ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['valorOperacaoDeposito']->value['DESCRICAO'];?>
</option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span9">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="normal">Dep&oacute;sito</label>
                                                    <div class="span4 controls">
                                                        <select name="deposito" id="deposito" >
                                                            <option value="" selected="selected">-Selecione-</option>
                                                            <?php  $_smarty_tpl->tpl_vars['valorDeposito'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorDeposito']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaDeposito']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorDeposito']->key => $_smarty_tpl->tpl_vars['valorDeposito']->value){
$_smarty_tpl->tpl_vars['valorDeposito']->_loop = true;
?>
                                                                <option value="<?php echo $_smarty_tpl->tpl_vars['valorDeposito']->value['ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['valorDeposito']->value['DESCRICAO'];?>
</option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <br>
                                            
                                         <div class="row-fluid">

                                            <div class="span12">
                                                
                                                <table class="responsive table">
                                                    <thead>
                                                      <tr>
                                                        <th>Imagem</th>
                                                        <th>Atributo</th>
                                                        <th>Refer&ecirc;ncia</th>
                                                        <th>Saldo</th>
                                                        <th>Quantidade</th>
                                                        <!--<th style="width:10	px;">A&ccedil;&otilde;es</th>-->
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      <?php  $_smarty_tpl->tpl_vars['valorListaEstoqueProduto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorListaEstoqueProduto']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['listaEstoqueProduto']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorListaEstoqueProduto']->key => $_smarty_tpl->tpl_vars['valorListaEstoqueProduto']->value){
$_smarty_tpl->tpl_vars['valorListaEstoqueProduto']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['valorListaEstoqueProduto']->key;
?>
                                                      <tr>
                                                        <td>
                                                            <?php  $_smarty_tpl->tpl_vars['ordem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ordem']->_loop = false;
 $_smarty_tpl->tpl_vars['imagem'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['listaImagemEstoque']->value[$_smarty_tpl->tpl_vars['key']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ordem']->key => $_smarty_tpl->tpl_vars['ordem']->value){
$_smarty_tpl->tpl_vars['ordem']->_loop = true;
 $_smarty_tpl->tpl_vars['imagem']->value = $_smarty_tpl->tpl_vars['ordem']->key;
?>
                                                            <img src="<?php echo $_smarty_tpl->tpl_vars['urlImagem']->value;?>
<?php if ($_smarty_tpl->tpl_vars['imagem']->value){?><?php echo $_smarty_tpl->tpl_vars['imagem']->value;?>
<?php }else{ ?>SEM_IMAGEM.JPG<?php }?>" class="img-polaroid" />
                                                            <?php break 1?>
                                                            <?php } ?>
                                                        </td>
                                                        <td><?php $_smarty_tpl->tpl_vars['codigoUnico'] = new Smarty_variable($_smarty_tpl->tpl_vars['valorListaEstoqueProduto']->value['ID_PRODUTO_COMBINACAO'], null, 0);?>
                                                            <?php $_smarty_tpl->tpl_vars['count'] = new Smarty_variable(count($_smarty_tpl->tpl_vars['listaCombinacao2']->value[$_smarty_tpl->tpl_vars['codigoUnico']->value]), null, 0);?>
                                                            <?php  $_smarty_tpl->tpl_vars['valueCombinacao2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueCombinacao2']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaCombinacao2']->value[$_smarty_tpl->tpl_vars['codigoUnico']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['valueCombinacao2']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['valueCombinacao2']->key => $_smarty_tpl->tpl_vars['valueCombinacao2']->value){
$_smarty_tpl->tpl_vars['valueCombinacao2']->_loop = true;
 $_smarty_tpl->tpl_vars['valueCombinacao2']->iteration++;
?>
                                                                <?php echo $_smarty_tpl->tpl_vars['valueCombinacao2']->value;?>

                                                                <?php if ($_smarty_tpl->tpl_vars['valueCombinacao2']->iteration!=$_smarty_tpl->tpl_vars['count']->value){?>
                                                                /
                                                                <?php }?>
                                                            <?php } ?>
                                                        </td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['valorListaEstoqueProduto']->value['REFERENCIA'];?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['valorListaEstoqueProduto']->value['SALDO'];?>
</td>
                                                        <td>
                                                            <input id="quantidadeEstoque" name="quantidadeEstoque[<?php echo $_smarty_tpl->tpl_vars['valorListaEstoqueProduto']->value['ID_PRODUTO_COMBINACAO'];?>
]" type="text" class="span3">
                                                        </td>
                                                       <!-- <td>
                                                            
                                                                <a class="tip" href="#" oldtitle="salvar este" title="salvar este" aria-describedby="ui-tooltip-13">
                                                                    <span class="icon12 icomoon-icon-pencil"></span>
                                                                </a>
                                                                                                                                
                                                            
                                                        </td>-->
                                                      </tr>
                                                      
                                                      <?php } ?>
                                                    </tbody>

                                                </table>

                                            </div><!-- End .span6 -->   

                                        </div>

                                        <div class="form-actions">
                                           <button type="submit" class="btn btn-info">Salvar</button>
                                           <!--<button type="button" class="btn">Cancelar</button>-->
                                        </div>

                                    </form>

                            </div>
                            
                            <div class="tab-pane" id="tab7">
                                    
                                    <form class="form-horizontal" id="gravaProdutoTipoFrete" action="<?php echo $_smarty_tpl->tpl_vars['ACTIONS_DIR']->value;?>
produto.php" method="post"/>

                                        <input type="hidden" value="editaProdutoTipoFrete" name="acao" id="acao">

                                        <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['valueProduto']->value['ID_PRODUTO'];?>
" id="idProduto" name="idProduto">

                                        <div class="form-row row-fluid">
                                            <div class="span6">
                                                <div class="row-fluid">
                                                <table class="responsive table">
					                                <thead>
					                                  <tr>
					                                    <th>#</th>
					                                    <th>Tipo Frete</th>
					                                    <th>Ativo</th>
					                                  </tr>
					                                </thead>
					                                <tbody>
					                                 	<?php  $_smarty_tpl->tpl_vars['valorTipoFrete'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorTipoFrete']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaTipoFrete']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorTipoFrete']->key => $_smarty_tpl->tpl_vars['valorTipoFrete']->value){
$_smarty_tpl->tpl_vars['valorTipoFrete']->_loop = true;
?>
					                                 	<tr>
                                                            <?php if ($_smarty_tpl->tpl_vars['valorTipoFrete']->value['PROD_ID_PRODUTO']){?>
                                                            	<td><?php echo $_smarty_tpl->tpl_vars['valorTipoFrete']->value['ID_TIPO_FRETE'];?>
</td>
                                                            	<td><?php echo $_smarty_tpl->tpl_vars['valorTipoFrete']->value['DESCRICAO_FRETE'];?>
</td>
                                                            	<td><input type="checkbox" name="tipoFrete[]" checked="checked" value="<?php echo $_smarty_tpl->tpl_vars['valorTipoFrete']->value['ID_TIPO_FRETE'];?>
" /></td>
                                                            <?php }else{ ?>
                                                            	<td><?php echo $_smarty_tpl->tpl_vars['valorTipoFrete']->value['ID_TIPO_FRETE'];?>
</td>
                                                            	<td><?php echo $_smarty_tpl->tpl_vars['valorTipoFrete']->value['DESCRICAO_FRETE'];?>
</td>
                                                            	<td><input type="checkbox" name="tipoFrete[]" value="<?php echo $_smarty_tpl->tpl_vars['valorTipoFrete']->value['ID_TIPO_FRETE'];?>
" /></td>
                                                            <?php }?>
                                                            </tr>
                                                        <?php } ?> 
					                                </tbody>
					                            </table>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-actions">
                                           <button type="submit" class="btn btn-info">Salvar</button>
                                           <!--<button type="button" class="btn">Cancelar</button>-->
                                        </div>
                                    </form>
                                </div>



                                <div class="tab-pane" id="tab8">
                                    
                                    <div class="row-fluid">

                                        <div class="span12">

                                            <form action="actions/upload.php" id="uploadImagem" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="acao" value="uploadImagem">
                                                <div class="form-row row-fluid">
                                                    <div class="span9">
                                                        <div class="row-fluid">
                                                            <label class="form-label span3" for="normal">Combina&ccedil;&atilde;o</label>
                                                            <div class="span8 controls">   
                                                                <select name="combinacaoImagem[]" class="nostyle" multiple="multiple" style="width:300px; height:<?php echo count($_smarty_tpl->tpl_vars['listaCombinacao1']->value)*20;?>
px;">
                                                                    <?php  $_smarty_tpl->tpl_vars['valueCombinacao1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueCombinacao1']->_loop = false;
 $_smarty_tpl->tpl_vars['key1'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['listaCombinacao1']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueCombinacao1']->key => $_smarty_tpl->tpl_vars['valueCombinacao1']->value){
$_smarty_tpl->tpl_vars['valueCombinacao1']->_loop = true;
 $_smarty_tpl->tpl_vars['key1']->value = $_smarty_tpl->tpl_vars['valueCombinacao1']->key;
?>
                                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['key1']->value;?>
">
                                                                        <?php $_smarty_tpl->tpl_vars['count'] = new Smarty_variable(count($_smarty_tpl->tpl_vars['listaCombinacao2']->value[$_smarty_tpl->tpl_vars['key1']->value]), null, 0);?>
                                                                        <?php  $_smarty_tpl->tpl_vars['valueCombinacao2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueCombinacao2']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaCombinacao2']->value[$_smarty_tpl->tpl_vars['key1']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['valueCombinacao2']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['valueCombinacao2']->key => $_smarty_tpl->tpl_vars['valueCombinacao2']->value){
$_smarty_tpl->tpl_vars['valueCombinacao2']->_loop = true;
 $_smarty_tpl->tpl_vars['valueCombinacao2']->iteration++;
?>
                                                                            <?php echo $_smarty_tpl->tpl_vars['valueCombinacao2']->value;?>

                                                                            <?php if ($_smarty_tpl->tpl_vars['valueCombinacao2']->iteration!=$_smarty_tpl->tpl_vars['count']->value){?>
                                                                            /
                                                                            <?php }?>
                                                                        <?php } ?>   
                                                                    </option>    
                                                                <?php } ?>
                                                                </select>
                                                            </div> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row row-fluid">
                                                    <div class="span9">
                                                        <div class="row-fluid">
                                                            <label class="form-label span3" for="normal">Imagens</label>
                                                            <input type="file" name="myfile[]" multiple>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- <div class="progress">
                                                    <div class="bar"></div>
                                                    <div class="percent"></div>
                                                </div>
                                                -->
                                                <div id="status"></div> 
                                                
                                                
                                                <div class="form-actions">
                                                   <button type="submit" class="btn btn-info">Salvar</button>
                                                   <!--<button type="button" class="btn">Cancelar</button>-->
                                                </div>
                                            </form>

                                            <div class="row-fluid">

                                                    <div class="span12">
                                                        <span class="right">Deixe 0 (zero) na imagem que deve ser a principal</span>
                                                        <table class="responsive table">
                                                            <thead>
                                                              <tr>
                                                                <th>Atributo</th>
                                                                <th>Refer&ecirc;ncia</th>
                                                                <th>Imagem</th>
                                                                <th>A&ccedil;&atilde;o</th>
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                              <?php  $_smarty_tpl->tpl_vars['valorListaEstoqueProduto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorListaEstoqueProduto']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['listaEstoqueProduto']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorListaEstoqueProduto']->key => $_smarty_tpl->tpl_vars['valorListaEstoqueProduto']->value){
$_smarty_tpl->tpl_vars['valorListaEstoqueProduto']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['valorListaEstoqueProduto']->key;
?>
                                                              <tr>
                                                                <td><?php $_smarty_tpl->tpl_vars['codigoUnico'] = new Smarty_variable($_smarty_tpl->tpl_vars['valorListaEstoqueProduto']->value['ID_PRODUTO_COMBINACAO'], null, 0);?>
                                                                    <?php $_smarty_tpl->tpl_vars['count'] = new Smarty_variable(count($_smarty_tpl->tpl_vars['listaCombinacao2']->value[$_smarty_tpl->tpl_vars['codigoUnico']->value]), null, 0);?>
                                                                    <?php  $_smarty_tpl->tpl_vars['valueCombinacao2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueCombinacao2']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaCombinacao2']->value[$_smarty_tpl->tpl_vars['codigoUnico']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['valueCombinacao2']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['valueCombinacao2']->key => $_smarty_tpl->tpl_vars['valueCombinacao2']->value){
$_smarty_tpl->tpl_vars['valueCombinacao2']->_loop = true;
 $_smarty_tpl->tpl_vars['valueCombinacao2']->iteration++;
?>
                                                                        <?php echo $_smarty_tpl->tpl_vars['valueCombinacao2']->value;?>

                                                                        <?php if ($_smarty_tpl->tpl_vars['valueCombinacao2']->iteration!=$_smarty_tpl->tpl_vars['count']->value){?>
                                                                        /
                                                                        <?php }?>
                                                                    <?php } ?>
                                                                </td>
                                                                <td><?php echo $_smarty_tpl->tpl_vars['valorListaEstoqueProduto']->value['REFERENCIA'];?>
</td>
                                                                <td>
                                                                    <table class="sem-estilo" cellpadding="0" cellspacing="0">
                                                                        <tr>
                                                                            <?php  $_smarty_tpl->tpl_vars['ordem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ordem']->_loop = false;
 $_smarty_tpl->tpl_vars['imagem'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['listaImagemEstoque']->value[$_smarty_tpl->tpl_vars['key']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ordem']->key => $_smarty_tpl->tpl_vars['ordem']->value){
$_smarty_tpl->tpl_vars['ordem']->_loop = true;
 $_smarty_tpl->tpl_vars['imagem']->value = $_smarty_tpl->tpl_vars['ordem']->key;
?>
                                                                            <td><img src="<?php echo $_smarty_tpl->tpl_vars['urlImagem']->value;?>
<?php if ($_smarty_tpl->tpl_vars['imagem']->value){?><?php echo $_smarty_tpl->tpl_vars['imagem']->value;?>
<?php }else{ ?>SEM_IMAGEM.JPG<?php }?>" class="img-polaroid" /></td>
                                                                            <?php } ?>
                                                                        </tr>
                                                                        <tr>
                                                                            <?php  $_smarty_tpl->tpl_vars['ordem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ordem']->_loop = false;
 $_smarty_tpl->tpl_vars['imagem'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['listaImagemEstoque']->value[$_smarty_tpl->tpl_vars['key']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ordem']->key => $_smarty_tpl->tpl_vars['ordem']->value){
$_smarty_tpl->tpl_vars['ordem']->_loop = true;
 $_smarty_tpl->tpl_vars['imagem']->value = $_smarty_tpl->tpl_vars['ordem']->key;
?>
                                                                            <td>
                                                                                <input type="text" class="span4 center ordenaImagem" maxlength="2" name="ordemImagem<?php echo $_smarty_tpl->tpl_vars['codigoUnico']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['imagem']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['ordem']->value;?>
">
                                                                            </td>
                                                                            <?php } ?>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                                <td>
                                                                    <button class="btn btn-info btn-mini" onClick="javascript: fnOrdenaImagem(<?php echo $_smarty_tpl->tpl_vars['codigoUnico']->value;?>
);">Ordenar</button>
                                                                </td>
                                                                
                                                              <?php } ?>
                                                            </tbody>

                                                        </table>
                                                        

                                                    </div><!-- End .span6 -->   

                                                </div>

                                                <hr>

                                            <!-- <form action="actions/produto.php" id="uploadArquivo" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="acao" value="uploadArquivo">
                                                <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['valueProduto']->value['ID_PRODUTO'];?>
" name="idProdutoCorrente">
                                                <div class="form-row row-fluid">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span3" for="required">Manual</label>
                                                            <input class="span8" name="arquivoDownload" type="file" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php if ($_smarty_tpl->tpl_vars['valueProduto']->value['ARQUIVO_DOWNLOAD']){?>
                                                <div class="form-row row-fluid <?php echo $_smarty_tpl->tpl_vars['valueProduto']->value['ID_PRODUTO'];?>
">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span3" for="required"></label>
                                                            <a href="../manuais/<?php echo $_smarty_tpl->tpl_vars['valueProduto']->value['ARQUIVO_DOWNLOAD'];?>
" title="Download" class="tip"><span><?php echo $_smarty_tpl->tpl_vars['valueProduto']->value['ARQUIVO_DOWNLOAD'];?>
</span></a> <a href="javascript:excluirArquivoDownload(<?php echo $_smarty_tpl->tpl_vars['valueProduto']->value['ID_PRODUTO'];?>
);" title="Excluir" class="tip"><span class="icon12 icon-remove"></span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php }?>
                                                
                                                <div class="form-actions">
                                                   <button type="submit" class="btn btn-info">Salvar</button>
                                                   
                                                </div>
                                            </form> -->


                                        </div><!-- End .span12 -->

                                    </div><!-- End .row-fluid -->
                                                    
                                </div>


                                <div class="tab-pane" id="tab9">

                                    <div class="row-fluid">

                                        <div class="span12">
                                            
                                            <div class="box">

                                                <div class="title">

                                                    <h4>
                                                        <!-- <span class="icon16 brocco-icon-grid"></span> -->
                                                        <span>Compre Junto</span>
                                                        <form class="box-form right" action="" />
                                                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                                                <span class="icon16 iconic-icon-cog"></span>
                                                                <span class="caret"></span>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a href="compre-junto-cadastra">
                                                                        <span class="icon-pencil"></span> Novo
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </form>
                                                       
                                                    </h4>
                                                    <!-- <a href="#" class="minimize">Minimize</a> -->
                                                </div>
                                                <div class="content noPad">
                                                    <table class="responsive table table-bordered" id="checkAll">
                                                        <thead>
                                                          <tr>
                                                            <th>#</th>
                                                            <th>Descri&ccedil;&atilde;o</th>
                                                            <th>Desconto</th>
                                                            <th>Ativo</th>
                                                            <th>A&ccedil;&otilde;es</th>
                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                                          <?php  $_smarty_tpl->tpl_vars['valueListaCompreJunto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueListaCompreJunto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaProdutoCompreJunto']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueListaCompreJunto']->key => $_smarty_tpl->tpl_vars['valueListaCompreJunto']->value){
$_smarty_tpl->tpl_vars['valueListaCompreJunto']->_loop = true;
?>
                                                          <tr id="tr<?php echo $_smarty_tpl->tpl_vars['valueListaCompreJunto']->value['ID_PRODUTO_COMPRE_JUNTO'];?>
">
                                                            <td><?php echo $_smarty_tpl->tpl_vars['valueListaCompreJunto']->value['ID_PRODUTO_COMPRE_JUNTO'];?>
</td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['valueListaCompreJunto']->value['DESCRICAO'];?>
</td>
                                                            <td>
                                                                <?php if ($_smarty_tpl->tpl_vars['valueListaCompreJunto']->value['TIPO_DESCONTO']=='P'){?>
                                                                    <?php echo number_format($_smarty_tpl->tpl_vars['valueListaCompreJunto']->value['VALOR_DESCONTO']);?>
%
                                                                <?php }elseif($_smarty_tpl->tpl_vars['valueListaCompreJunto']->value['TIPO_DESCONTO']=='V'){?>
                                                                    R$ <?php echo number_format($_smarty_tpl->tpl_vars['valueListaCompreJunto']->value['VALOR_DESCONTO'],2,",",".");?>

                                                                <?php }?>
                                                            </td>
                                                            <td>
                                                                <?php if ($_smarty_tpl->tpl_vars['valueListaCompreJunto']->value['ATIVO']=='S'){?>
                                                                    <span class="icon-ok"></span>
                                                                <?php }else{ ?>
                                                                    <span class="icon-remove"></span>
                                                                <?php }?>
                                                            </td>
                                                            <td>
                                                                <div class="controls center">
                                                                    <a href="compre-junto-cadastra?idCompreJunto=<?php echo $_smarty_tpl->tpl_vars['valueListaCompreJunto']->value['ID_PRODUTO_COMPRE_JUNTO'];?>
" title="Editar" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                                                    <a href="javascript:fnExcluirCompreJunto(<?php echo $_smarty_tpl->tpl_vars['valueListaCompreJunto']->value['ID_PRODUTO_COMPRE_JUNTO'];?>
);" title="Excluir" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
                                                                </div>
                                                            </td>
                                                          </tr>
                                                          <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div><!-- End .box -->

                                        </div><!-- End .span6 -->       

                                    </div>                            

                                </div><!-- End tab9 -->
                                
                        </div>
                    </div>
                </div><!-- End .span12 -->    
            </div>
               
    			<!-- Page end here -->
    				
               
            </div><!-- End contentwrapper -->
        </div><!-- End #content -->
    
    </div><!-- End #wrapper -->


<?php }} ?>