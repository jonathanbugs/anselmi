<?php /* Smarty version Smarty-3.1.10, created on 2014-05-12 18:17:00
         compiled from "templates\lista_casamento_cadastra.tpl" */ ?>
<?php /*%%SmartyHeaderCode:906553713a4c669cc8-03313009%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea54fff5e3049e55b74506685cac8dfb7ddf7b0e' => 
    array (
      0 => 'templates\\lista_casamento_cadastra.tpl',
      1 => 1389963045,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '906553713a4c669cc8-03313009',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ACTIONS_DIR' => 0,
    'idListaCasamento' => 0,
    'ativo' => 0,
    'despachado' => 0,
    'nomeConjuge1' => 0,
    'emailConjuge1' => 0,
    'nomeMaeConjuge1' => 0,
    'nomePaiConjuge1' => 0,
    'nomeConjuge2' => 0,
    'emailConjuge2' => 0,
    'nomeMaeConjuge2' => 0,
    'nomePaiConjuge2' => 0,
    'enderecoEntrega' => 0,
    'valorListaListaCasamento' => 0,
    'url' => 0,
    'listaProduto' => 0,
    'valorProduto' => 0,
    'listaCasamentoPedido' => 0,
    'valueListaCasamentoPedido' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_53713a4c879428_75790427',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53713a4c879428_75790427')) {function content_53713a4c879428_75790427($_smarty_tpl) {?><div id="wrapper">

    <?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


    <!--Body content-->
    <div id="content" class="clearfix">
        <div class="contentwrapper"><!--Content wrapper-->

            <?php echo $_smarty_tpl->getSubTemplate ("heading.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


            <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

                
            <div class="row-fluid">

                <div class="span6">

                    <div class="box" id="dadosListaCasamento">

                        <div class="title">

                            <h4>
                                <span class="icon16 brocco-icon-grid"></span>
                                <span>Dados do Casamento</span>
                            </h4>
                            
                        </div>
                        <div class="content">
                           
                            
                            <form class="form-horizontal" id="cadastrarDadosListaCasamento" action="<?php echo $_smarty_tpl->tpl_vars['ACTIONS_DIR']->value;?>
lista_casamento.php" method="post"/>

                            <?php if (!isset($_smarty_tpl->tpl_vars['idListaCasamento']->value)){?>    
                                <input type="hidden" name="acao" value="cadastrarDadosListaCasamento">
                            <?php }else{ ?>
                                <input type="hidden" name="acao" value="editarDadosListaCasamento">
                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">ID Lista de Casamento</label>
                                            <input class="span2" id="idListaCasamento" type="text" name="idListaCasamento" readonly value="<?php echo $_smarty_tpl->tpl_vars['idListaCasamento']->value;?>
" />
                                        </div>
                                    </div>
                                </div>
                            <?php }?>


                                
                                                                
                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="normal">Ativo</label>
                                                <?php if ($_smarty_tpl->tpl_vars['ativo']->value=='S'){?>
                                                <input type="checkbox" name="listaCasamentoAtivo" value="S" checked="checked">
                                                <?php }else{ ?>
                                                <input type="checkbox" name="listaCasamentoAtivo" value="S">
                                                <?php }?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="normal">Despachado</label>
                                                <?php if ($_smarty_tpl->tpl_vars['despachado']->value=='S'){?>
                                                <input type="checkbox" name="listaCasamentoDespachado" value="S" checked="checked">
                                                <?php }else{ ?>
                                                <input type="checkbox" name="listaCasamentoDespachado" value="S">
                                                <?php }?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">Nome C&ocirc;njuge 1</label>
                                            <input class="span8" id="nomeConjuge1" type="text" name="nomeConjuge1" required="required" value="<?php echo $_smarty_tpl->tpl_vars['nomeConjuge1']->value;?>
" />
                                        </div>
                                    </div>
                                </div>

                                 <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">E-mail C&ocirc;njuge 1</label>
                                            <input class="span8" id="emailConjuge1" name="emailConjuge1" type="text" required="required" value="<?php echo $_smarty_tpl->tpl_vars['emailConjuge1']->value;?>
"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">M&atilde;e C&ocirc;njuge 1</label>
                                            <input class="span8" id="maeConjuge1" type="text" name="maeConjuge1" required="required" value="<?php echo $_smarty_tpl->tpl_vars['nomeMaeConjuge1']->value;?>
"/>
                                        </div>
                                    </div>
                                </div>

                               

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">Pai C&ocirc;njuge 1</label>
                                            <input class="span8" id="paiConjuge1" type="text" name="paiConjuge1" required="required" value="<?php echo $_smarty_tpl->tpl_vars['nomePaiConjuge1']->value;?>
" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">Nome C&ocirc;njuge 2</label>
                                            <input class="span8" id="nomeConjuge2" type="text" name="nomeConjuge2" required="required" value="<?php echo $_smarty_tpl->tpl_vars['nomeConjuge2']->value;?>
" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">E-mail C&ocirc;njuge 2</label>
                                            <input class="span8" id="emailConjuge2" name="emailConjuge2" type="text" required="required" value="<?php echo $_smarty_tpl->tpl_vars['emailConjuge2']->value;?>
"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">M&atilde;e C&ocirc;njuge 2</label>
                                            <input class="span8" id="maeConjuge2" type="text" name="maeConjuge2" required="required" value="<?php echo $_smarty_tpl->tpl_vars['nomeMaeConjuge2']->value;?>
"/>
                                        </div>
                                    </div>
                                </div>

                                

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">Pai C&ocirc;njuge 2</label>
                                            <input class="span8" id="paiConjuge2" type="text" name="paiConjuge2" required="required" value="<?php echo $_smarty_tpl->tpl_vars['nomePaiConjuge2']->value;?>
"/>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="normal">Data da Entrega</label>
                                            <input class="span8 mask" id="mask-date" type="text" name="dataEvento" required="required" value="<?php echo $_smarty_tpl->tpl_vars['enderecoEntrega']->value[0]['DATA_EVENTO'];?>
"/>
                                            <span class="help-block blue span8">99/99/9999</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">Local da Cerim&ocirc;nia</label>
                                            <input class="span8" id="localCerimonia" type="text" name="localCerimonia" required="required" value="<?php echo $_smarty_tpl->tpl_vars['valorListaListaCasamento']->value['LOCAL_CERIMONIA'];?>
"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">Endere&ccedil;o da Cerim&ocirc;nia</label>
                                            <input class="span8" id="enderecoCerimonia" type="text" name="enderecoCerimonia" required="required" value="<?php echo $_smarty_tpl->tpl_vars['valorListaListaCasamento']->value['ENDERECO_CERIMONIA'];?>
"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">Hora da Cerim&ocirc;nia</label>
                                            <input class="span8 mask-hour" id="horaCerimonia" type="text" name="horaCerimonia" required="required" value="<?php echo $_smarty_tpl->tpl_vars['valorListaListaCasamento']->value['HORA_CERIMONIA'];?>
"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">Local da Festa</label>
                                            <input class="span8" id="localFesta" type="text" name="localFesta" required="required" value="<?php echo $_smarty_tpl->tpl_vars['valorListaListaCasamento']->value['LOCAL_FESTA'];?>
"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">Endere&ccedil;o da Festa</label>
                                            <input class="span8" id="enderecoFesta" type="text" name="enderecoFesta" required="required" value="<?php echo $_smarty_tpl->tpl_vars['valorListaListaCasamento']->value['ENDERECO_FESTA'];?>
"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">Hora da Festa</label>
                                            <input class="span8 mask-hour" id="horaFesta" type="text" name="horaFesta" required="required" value="<?php echo $_smarty_tpl->tpl_vars['valorListaListaCasamento']->value['HORA_FESTA'];?>
"/>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">URL Amig&aacute;vel</label>
                                            <input onkeyup="this.value = Trim( this.value )" class="span8" id="urlAmigavel" type="text" name="urlAmigavel" required="required" value="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"/>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="textarea">Foto de Capa</label>
                                            <input type="file" name="fotoCapa" id="fotoCapa" />
                                        </div>
                                    </div>  
                                </div> -->
                                
                                <div class="form-actions">
                                   <button type="submit" class="btn btn-info">Salvar</button>
                                   <!--<button type="button" class="btn">Cancelar</button>-->
                                </div>
                                <div id="teste"></div>
                                                                        
                            </form>
                         
                        </div>

                    </div><!-- End .box -->

                </div>

                <div class="span6">

                    <div class="box">

                        <div class="title">

                            <h4>
                                <span class="icon16 brocco-icon-grid"></span>
                                <span>Endere&ccedil;o de Entrega</span>
                            </h4>
                            
                        </div>
                        <div class="content">
                           
                            <form class="form-horizontal" id="cadastrarEnderecoListaCasamento" action="<?php echo $_smarty_tpl->tpl_vars['ACTIONS_DIR']->value;?>
lista_casamento.php" method="post"/>

                            <?php if (!isset($_smarty_tpl->tpl_vars['idListaCasamento']->value)){?>    
                                <input type="hidden" name="acao" value="cadastrarEnderecoListaCasamento">
                            <?php }else{ ?>
                                <input type="hidden" name="acao" value="editarEnderecoListaCasamento">
                            <?php }?>

                                 <input class="span8" id="tipoEnderecoListaCasamento" type="hidden" name="tipoEnderecoListaCasamento" value="<?php echo $_smarty_tpl->tpl_vars['enderecoEntrega']->value[0]['TIPO_ENDERECO'];?>
"/>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">ID Lista de Casamento</label>
                                            <input class="span2" id="idListaCasamento" type="text" name="idListaCasamento" readonly value="<?php echo $_smarty_tpl->tpl_vars['idListaCasamento']->value;?>
" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">Nome de Contato</label>
                                            <input class="span8" id="nomeContatoListaCasamento" type="text" name="nomeContatoListaCasamento" required="required" value="<?php echo $_smarty_tpl->tpl_vars['enderecoEntrega']->value[0]['NOME_CONTATO'];?>
"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="normal">CEP</label>
                                            <input class="span5" id="cepEnderecoListaCasamento" type="text" name="cepEnderecoListaCasamento" required="required" value="<?php echo $_smarty_tpl->tpl_vars['enderecoEntrega']->value[0]['CEP_ID_CEP'];?>
"/>
                                            <span class="help-block blue span8">99999-999</span>
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="required">Endere&ccedil;o</label>
                                            <input class="span6" id="ruaEnderecoListaCasamento" type="text" name="ruaEnderecoListaCasamento" required="required" value="<?php echo $_smarty_tpl->tpl_vars['enderecoEntrega']->value[0]['ENDERECO'];?>
"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="normal">N&uacute;mero</label>
                                            <input class="span3" id="numeroEnderecoListaCasamento" type="text" name="numeroEnderecoListaCasamento" required="required" value="<?php echo $_smarty_tpl->tpl_vars['enderecoEntrega']->value[0]['NUMERO'];?>
"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="normal">Complemento</label>
                                            <input class="span8" id="complementoEnderecoListaCasamento" type="text" name="complementoEnderecoListaCasamento" value="<?php echo $_smarty_tpl->tpl_vars['enderecoEntrega']->value[0]['COMPLEMENTO'];?>
"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="normal">Bairro</label>
                                            <input class="span8" id="bairroEnderecoListaCasamento" type="text" name="bairroEnderecoListaCasamento" required="required" value="<?php echo $_smarty_tpl->tpl_vars['enderecoEntrega']->value[0]['BAIRRO'];?>
"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="normal">Cidade</label>
                                            <input class="span1" id="idMunicipioEnderecoListaCasamento" type="hidden" name="idMunicipioEnderecoListaCasamento" required="required" value="<?php echo $_smarty_tpl->tpl_vars['valorListaListaCasamento']->value['MUNI_ID_MUNICIPIO'];?>
"/>
                                            <input class="span8" id="municipioEnderecoListaCasamento" type="text" name="municipioEnderecoListaCasamento" required="required" readonly="readonly" value="<?php echo $_smarty_tpl->tpl_vars['enderecoEntrega']->value[0]['MUNICIPIO'];?>
"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="normal">Estado</label>
                                            <input class="span2" id="estadoEnderecoListaCasamento" type="text" name="estadoEnderecoListaCasamento" required="required" readonly="readonly" value="<?php echo $_smarty_tpl->tpl_vars['enderecoEntrega']->value[0]['ESTADO'];?>
"/>
                                        </div>
                                    </div>
                                </div>

                                <!--<div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="normal">Pa&iacute;s</label>
                                            <input class="span5" id="paisEnderecoListaCasamento" type="text" name="paisEnderecoListaCasamento" required="required" readonly="readonly"/>
                                        </div>
                                    </div>
                                </div>-->

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="normal">Refer&ecirc;ncia</label>
                                            <input class="span8" id="referenciaEnderecoListaCasamento" type="text" name="referenciaEnderecoListaCasamento" value="<?php echo $_smarty_tpl->tpl_vars['enderecoEntrega']->value[0]['REFERENCIA'];?>
"/>
                                        </div>
                                    </div>
                                </div>

                                <hr />

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="normal">Telefone Fixo</label>
                                            
                                            <input class="span5" id="telefoneFixoContatoListaCasamento" type="text" name="telefoneFixoContatoListaCasamento" required="required" maxlength="9" value="<?php echo $_smarty_tpl->tpl_vars['enderecoEntrega']->value[0]['TELEFONE_PRINCIPAL'];?>
"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <label class="form-label span4" for="normal">Telefone Celular</label>
                                            
                                            <input class="span5" id="telefoneCelularContatoListaCasamento" type="text" name="telefoneCelularContatoListaCasamento" maxlength="9" value="<?php echo $_smarty_tpl->tpl_vars['enderecoEntrega']->value[0]['CELULAR'];?>
"/>
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
                </div>
           
            </div>

            <div class="row-fluid">

                <div class="span12">

                    <div class="box gradient" id="produtoListaCasamento">

                        <div class="title">
                            <h4>
                                <span>Produtos da Lista de Casamento</span>
                                
                            </h4>
                        </div>
                        <div class="content noPad clearfix" id="tabelaListaProduto">

                            
                            
                            <form class="form-horizontal" id="cadastrarProdutoListaCasamento" action="<?php echo $_smarty_tpl->tpl_vars['ACTIONS_DIR']->value;?>
lista_casamento.php" method="post"/>

                            <?php if (!isset($_smarty_tpl->tpl_vars['idListaCasamento']->value)){?>    
                                <input type="hidden" name="acao" value="cadastrarProdutoListaCasamento">
                            <?php }else{ ?>
                                <input type="hidden" name="acao" value="editarProdutoListaCasamento">
                            <?php }?>

                            
                            <input class="span2" id="idListaCasamento" type="text" name="idListaCasamento" readonly value="<?php echo $_smarty_tpl->tpl_vars['idListaCasamento']->value;?>
"/>

                            <table cellpadding="0" cellspacing="0" border="0" class="responsive dynamicTableListaCasamento display table table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>#</th>
                                        <th>Descri&ccedil;&atilde;o Venda</th>
                                        <th>Refer&ecirc;ncia</th>
                                        <th>Ativo</th>
                                        <th>Pedido</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  $_smarty_tpl->tpl_vars['valorProduto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorProduto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaProduto']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorProduto']->key => $_smarty_tpl->tpl_vars['valorProduto']->value){
$_smarty_tpl->tpl_vars['valorProduto']->_loop = true;
?>
                                    <tr class="odd gradeX" id="<?php echo $_smarty_tpl->tpl_vars['valorProduto']->value['ID_PRODUTO'];?>
">
                                        <td><?php echo $_smarty_tpl->tpl_vars['valorProduto']->value['ID_LISTA_CASA_PROD_ORDEM'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['valorProduto']->value['ID_PRODUTO'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['valorProduto']->value['DESCRICAO_VENDA'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['valorProduto']->value['REFERENCIA'];?>
</td>
                                        <td class="center">
                                            <?php if (isset($_smarty_tpl->tpl_vars['valorProduto']->value['ID_LISTA_CASAMENTO_PRODUTO'])&&$_smarty_tpl->tpl_vars['valorProduto']->value['ATIVO']=='S'){?>
                                            <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['valorProduto']->value['ID_PRODUTO'];?>
" name="idProdutoListaCasamento" checked="checked">
                                            <?php }else{ ?>
                                            <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['valorProduto']->value['ID_PRODUTO'];?>
" name="idProdutoListaCasamento">
                                            <?php }?>
                                        </td>
                                        <td>
                                            <?php if ($_smarty_tpl->tpl_vars['valorProduto']->value['ID_LISTA_CASAMENTO_PRODUTO']){?>
                                            <?php  $_smarty_tpl->tpl_vars['valueListaCasamentoPedido'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueListaCasamentoPedido']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaCasamentoPedido']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueListaCasamentoPedido']->key => $_smarty_tpl->tpl_vars['valueListaCasamentoPedido']->value){
$_smarty_tpl->tpl_vars['valueListaCasamentoPedido']->_loop = true;
?>
                                                <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['valueListaCasamentoPedido']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
                                                <?php echo print_r($_smarty_tpl->tpl_vars['value']->value);?>

                                                    <a href="pedido-visualiza&idPedido=<?php echo $_smarty_tpl->tpl_vars['valorProduto']->value['ID_PEDIDO'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['NUMERO_PEDIDO'];?>
</a>
                                                <?php } ?>
                                            <?php } ?>
                                            <?php }?>
                                        </td>
                                        
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="7">
                                            <div class="form-actions">
                                               <button type="submit" class="btn btn-info">Salvar</button>
                                               <!--<button type="button" class="btn">Cancelar</button>-->
                                            </div>
                                            <div id="teste"></div>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </form>

                        </div>

                    </div><!-- End .box -->



                </div><!-- End .span12 -->

            </div><!-- End .row-fluid -->

           
            <!-- Page end here -->
                
           
        </div><!-- End contentwrapper -->
    </div><!-- End #content -->

</div><!-- End #wrapper -->

   

<?php }} ?>