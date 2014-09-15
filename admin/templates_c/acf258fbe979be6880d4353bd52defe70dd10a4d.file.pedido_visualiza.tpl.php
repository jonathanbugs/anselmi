<?php /* Smarty version Smarty-3.1.10, created on 2014-05-05 09:36:34
         compiled from "templates\pedido_visualiza.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1244536785d2742e19-26874660%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'acf258fbe979be6880d4353bd52defe70dd10a4d' => 
    array (
      0 => 'templates\\pedido_visualiza.tpl',
      1 => 1399293033,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1244536785d2742e19-26874660',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'idPessoa' => 0,
    'visualizaPedido' => 0,
    'urlAtual' => 0,
    'valorPedido' => 0,
    'ACTIONS_DIR' => 0,
    'listaCupomPromocional' => 0,
    'valorCupomPromocional' => 0,
    'listaTipoFrete' => 0,
    'valorTipoFrete' => 0,
    'idListaCasamento' => 0,
    'casalListaCasamento' => 0,
    'mensagemListaCasamento' => 0,
    'listaPedidoEndereco' => 0,
    'valorPedidoEndereco' => 0,
    'codRastreamento' => 0,
    'valorCodRastreamento' => 0,
    'historicoSituacaoPedido' => 0,
    'valueHistoricoSituacaoPedido' => 0,
    'listaNroParcelas' => 0,
    'valorNroParcelas' => 0,
    'listaTipoFormaPagamento' => 0,
    'keyTipoFormaPagamento' => 0,
    'valorTipoFormaPagamento' => 0,
    'idFormaPagamento' => 0,
    'formaPagamento' => 0,
    'listaOcorrencia' => 0,
    'valueOcorrencia' => 0,
    'visualizaPedidoPagamento' => 0,
    'valorPedidoPagamento' => 0,
    'listaEstoqueProduto' => 0,
    'valorListaEstoqueProduto' => 0,
    'visualizaPedidoItem' => 0,
    'valorPedidoItem' => 0,
    'listaSituacaoPedido' => 0,
    'valorSituacaoPedido' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_536785d2bd1e12_74508780',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536785d2bd1e12_74508780')) {function content_536785d2bd1e12_74508780($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_mascara_telefone')) include 'C:\\wamp\\www\\lojas\\comlines\\smarty\\plugins\\modifier.mascara_telefone.php';
if (!is_callable('smarty_modifier_mascara_cep')) include 'C:\\wamp\\www\\lojas\\comlines\\smarty\\plugins\\modifier.mascara_cep.php';
?>    <div id="wrapper">

        <?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <?php echo $_smarty_tpl->getSubTemplate ("heading.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


                <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

                <!--cadastro de pessoa-->
                    <div class="row-fluid">

                        <div class="span6">

                            <div class="box">
                                
                                <div class="title">
                                    <h4>
                                        <span>Pedido</span>

                                        <!--<form class="box-form right" action="">
                                            <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown">
                                                <span class="icon16 iconic-icon-cog"></span>
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="javascript: iconeEditar('DadosPessoa');">
                                                        <span class="icon-pencil"></span> Editar
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript: enviarNovaSenha(<?php echo $_smarty_tpl->tpl_vars['idPessoa']->value;?>
);">
                                                        <span class="icon-envelope"></span> Reenviar Senha
                                                    </a>
                                                </li>
                                            </ul>
                                        </form>-->
                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                <div class="content">

                                    

                                    <dl class="dl-horizontal" id="dlEditaPedido">
                                        <?php  $_smarty_tpl->tpl_vars['valorPedido'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorPedido']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['visualizaPedido']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorPedido']->key => $_smarty_tpl->tpl_vars['valorPedido']->value){
$_smarty_tpl->tpl_vars['valorPedido']->_loop = true;
?>

                                        <div class="clearfix">

                                           
                                            <div class="print">
                                                <a href="<?php echo $_smarty_tpl->tpl_vars['urlAtual']->value;?>
/emails/imprime-pedido.php?idPedido=<?php echo $_smarty_tpl->tpl_vars['valorPedido']->value['ID_PEDIDO'];?>
" class="tip" title="Imprimir Pedido" onClick="window.open(this.href, this.target); return false;" target="_blank"><span class="icon24 entypo-icon-printer"></span></a>
                                            </div>
                                           

                                        </div>
                                            <form class="form-horizontal" id="editarPedido" action="<?php echo $_smarty_tpl->tpl_vars['ACTIONS_DIR']->value;?>
pedido.php" method="post">
                                        
                                                <input type="hidden" name="acao" value="editarPedido">
                                                <input type="hidden" name="idPedido" id="idPedido" value="<?php echo $_smarty_tpl->tpl_vars['valorPedido']->value['ID_PEDIDO'];?>
">
                                                
                                                <div class="form-row row-fluid">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4">Nro Pedido</label>
                                                            <div class="valor-label"><?php echo $_smarty_tpl->tpl_vars['valorPedido']->value['NUMERO_PEDIDO'];?>
</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">Data Emiss&atilde;o</label>
                                                            <div class="valor-label"><?php echo $_smarty_tpl->tpl_vars['valorPedido']->value['DATA_EMISSAO'];?>
</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">Cliente</label>
                                                            <div class="valor-label"><?php echo $_smarty_tpl->tpl_vars['valorPedido']->value['NOME'];?>
 <a href="pessoa-visualiza&idPessoa=<?php echo $_smarty_tpl->tpl_vars['valorPedido']->value['ID_PESSOA'];?>
"><span class="icon-circle-arrow-right"></span></a></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">Email Cliente</label>
                                                            <div class="valor-label"><?php echo $_smarty_tpl->tpl_vars['valorPedido']->value['EMAIL'];?>
</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">Telefones Cliente</label>
                                                            <div class="valor-label"><?php echo smarty_modifier_mascara_telefone($_smarty_tpl->tpl_vars['valorPedido']->value['TELEFONE1']);?>
<br>
                                                            <div class="valor-label"><?php echo smarty_modifier_mascara_telefone($_smarty_tpl->tpl_vars['valorPedido']->value['CELULAR']);?>
<br>
                                                            <div class="valor-label"><?php echo smarty_modifier_mascara_telefone($_smarty_tpl->tpl_vars['valorPedido']->value['TELEFONE2']);?>
</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="required">Cupom</label>
                                                            <select name="cupomPromocional" id="cupomPromocional" class="nostyle span6">
	                                                            <option value="0">Sem Cupom</option>
	                                                            <?php  $_smarty_tpl->tpl_vars['valorCupomPromocional'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorCupomPromocional']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaCupomPromocional']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorCupomPromocional']->key => $_smarty_tpl->tpl_vars['valorCupomPromocional']->value){
$_smarty_tpl->tpl_vars['valorCupomPromocional']->_loop = true;
?>
		                                                            <?php if ($_smarty_tpl->tpl_vars['valorPedido']->value['PRCA_ID_PROMOCAO_CARRINHO']==$_smarty_tpl->tpl_vars['valorCupomPromocional']->value['ID_PROMOCAO_CARRINHO']){?>
		                                                            	<option selected="selected" value="<?php echo $_smarty_tpl->tpl_vars['valorCupomPromocional']->value['ID_PROMOCAO_CARRINHO'];?>
"><?php echo $_smarty_tpl->tpl_vars['valorCupomPromocional']->value['CUPOM_PROMOCIONAL'];?>
 | <?php echo number_format($_smarty_tpl->tpl_vars['valorCupomPromocional']->value['VALOR_DESCONTO'],2,",",".");?>
 | <?php echo $_smarty_tpl->tpl_vars['valorCupomPromocional']->value['TIPO_DESCONTO'];?>
</option>
		                                                            <?php }else{ ?>
		                                                            	<option value="<?php echo $_smarty_tpl->tpl_vars['valorCupomPromocional']->value['ID_PROMOCAO_CARRINHO'];?>
"><?php echo $_smarty_tpl->tpl_vars['valorCupomPromocional']->value['CUPOM_PROMOCIONAL'];?>
 | <?php echo number_format($_smarty_tpl->tpl_vars['valorCupomPromocional']->value['VALOR_DESCONTO'],2,",",".");?>
 | <?php echo $_smarty_tpl->tpl_vars['valorCupomPromocional']->value['TIPO_DESCONTO'];?>
</option>
		                                                            <?php }?>
		                                                        <?php } ?>
															</select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="required">Tipo Frete</label>
                                                            <select name="tipoFrete" id="tipoFrete">
                                                            <?php  $_smarty_tpl->tpl_vars['valorTipoFrete'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorTipoFrete']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaTipoFrete']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorTipoFrete']->key => $_smarty_tpl->tpl_vars['valorTipoFrete']->value){
$_smarty_tpl->tpl_vars['valorTipoFrete']->_loop = true;
?>
                                                            	<?php if ($_smarty_tpl->tpl_vars['valorTipoFrete']->value['ID_TIPO_FRETE']==$_smarty_tpl->tpl_vars['valorPedido']->value['TIFR_ID_TIPO_FRETE']){?>
                                                                        <option selected="selected" value="<?php echo $_smarty_tpl->tpl_vars['valorTipoFrete']->value['ID_TIPO_FRETE'];?>
"><?php echo $_smarty_tpl->tpl_vars['valorTipoFrete']->value['ID_TIPO_FRETE'];?>
 - <?php echo $_smarty_tpl->tpl_vars['valorTipoFrete']->value['DESCRICAO_FRETE'];?>
</option>
                                                                    <?php }else{ ?>
                                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['valorTipoFrete']->value['ID_TIPO_FRETE'];?>
"><?php echo $_smarty_tpl->tpl_vars['valorTipoFrete']->value['ID_TIPO_FRETE'];?>
 - <?php echo $_smarty_tpl->tpl_vars['valorTipoFrete']->value['DESCRICAO_FRETE'];?>
</option>
                                                                    <?php }?>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">Valor Frete</label>
                                                            <input class="span3 mask-moeda-real" type="text" value="<?php echo number_format($_smarty_tpl->tpl_vars['valorPedido']->value['VALOR_FRETE'],2,",",".");?>
" id="valorFrete" name="valorFrete" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">Frete Gr&aacute;tis</label>
                                                                <div class="valor-label">
                                                                <?php if ($_smarty_tpl->tpl_vars['valorPedido']->value['FRETE_GRATIS']=='N'){?>
                                                                    <input type="checkbox" id="freteGratis" name="freteGratis">
                                                                <?php }else{ ?>
                                                                    <input type="checkbox" checked="checked" id="freteGratis" name="freteGratis">
                                                                <?php }?>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="required">Situa&ccedil;&atilde;o Pedido</label>
                                                            <div class="valor-label"><?php echo $_smarty_tpl->tpl_vars['valorPedido']->value['DESCRICAO_PEDIDO_ITEM_SITUACAO'];?>
</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- <div class="form-actions">
                                                   <button type="submit" class="btn btn-info">Salvar</button>
                                                   <button type="button" class="btn btn-danger" onclick="javascript: btnCancelaEditar('DadosPessoa');">Cancelar</button>
                                                </div> -->
                                                                                                                                        
                                            </form>
                                            
                                        <?php } ?>

                                        
                                    </dl>

                                </div>
                            </div>

                        </div><!-- End .span4 -->

                        <?php if ($_smarty_tpl->tpl_vars['idListaCasamento']->value){?>    
                        <div class="span6">

                            <div class="box">
                                <div class="title">
                                    <h4>
                                        <span>Lista Casamento</span>

                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                            
                                <div class="content">
                                
                                    <dl class="dl-horizontal" id="divEndereco">
                                        <dt>Lista de Casamento:</dt>
                                        <dd><?php echo $_smarty_tpl->tpl_vars['idListaCasamento']->value;?>
 <a href="lista-casamento-cadastra&idListaCasamento=<?php echo $_smarty_tpl->tpl_vars['idListaCasamento']->value;?>
"><span class="icon-circle-arrow-right"></span></a></dd>
                                        <dt>Casal:</dt>
                                        <dd><?php echo $_smarty_tpl->tpl_vars['casalListaCasamento']->value;?>
</dd>
                                        <dt>Mensagem:</dt>
                                        <dd><?php echo $_smarty_tpl->tpl_vars['mensagemListaCasamento']->value;?>
</dd>
                                    </dl>
                                </div>
                            </div>
                                                 
                        </div>
                        <?php }?>

                        <div class="span6">

                            <div class="box">
                                <div class="title">
                                    <h4>
                                        <span>Endere&ccedil;o Pedido</span>

                                        <form class="box-form right" action="">
                                            <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown">
                                                <span class="icon16 iconic-icon-cog"></span>
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="javascript:void(0);" id="novo-pedido-endereco">
                                                        <span class="icon-file"></span> Novo
                                                    </a>
                                                </li>
                                            </ul>
                                        </form>
                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                
                                
                                
                                <div class="content">
                                
                                	<dl class="dl-horizontal" id="divEndereco">
                                        <dt>Endere&ccedil;o:</dt>
                                        <?php  $_smarty_tpl->tpl_vars['valorPedidoEndereco'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorPedidoEndereco']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaPedidoEndereco']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorPedidoEndereco']->key => $_smarty_tpl->tpl_vars['valorPedidoEndereco']->value){
$_smarty_tpl->tpl_vars['valorPedidoEndereco']->_loop = true;
?>
                                            <dd>
                                                <p><strong><?php echo $_smarty_tpl->tpl_vars['valorPedidoEndereco']->value['APELIDO'];?>
</strong></p>
                                                <?php if ($_smarty_tpl->tpl_vars['valorPedidoEndereco']->value['APELIDO_ENDERECO']!=''){?>
                                                	<?php echo $_smarty_tpl->tpl_vars['valorPedidoEndereco']->value['APELIDO_ENDERECO'];?>
<br />
                                                <?php }?>
                                                <?php echo $_smarty_tpl->tpl_vars['valorPedidoEndereco']->value['ENDERECO'];?>
, 
                                                <?php echo $_smarty_tpl->tpl_vars['valorPedidoEndereco']->value['NUMERO'];?>

                                                <?php if ($_smarty_tpl->tpl_vars['valorPedidoEndereco']->value['COMPLEMENTO']==''){?>
                                                    <br />
                                                <?php }else{ ?>
                                                    - <?php echo $_smarty_tpl->tpl_vars['valorPedidoEndereco']->value['COMPLEMENTO'];?>
<br />
                                                <?php }?>
                                                Bairro: <?php echo $_smarty_tpl->tpl_vars['valorPedidoEndereco']->value['BAIRRO'];?>
<br />
                                                <?php echo $_smarty_tpl->tpl_vars['valorPedidoEndereco']->value['NOME_MUNICIPIO'];?>
, <?php echo $_smarty_tpl->tpl_vars['valorPedidoEndereco']->value['UNFE_ID_ESTADO'];?>
<br />
                                                <?php echo smarty_modifier_mascara_cep($_smarty_tpl->tpl_vars['valorPedidoEndereco']->value['CEP_ID_CEP']);?>
<br />
                                                <?php echo $_smarty_tpl->tpl_vars['valorPedidoEndereco']->value['REFERENCIA'];?>

                                            </dd>
                                            
                                            <hr />
                                        <?php } ?>
                                            <dt><p><strong>Cod Rastreamento:</strong></p></dt>
                                            <dd>
                                                <?php  $_smarty_tpl->tpl_vars['valorCodRastreamento'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorCodRastreamento']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['codRastreamento']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorCodRastreamento']->key => $_smarty_tpl->tpl_vars['valorCodRastreamento']->value){
$_smarty_tpl->tpl_vars['valorCodRastreamento']->_loop = true;
?>
                                                    <?php echo $_smarty_tpl->tpl_vars['valorCodRastreamento']->value;?>
<br>
                                                <?php } ?>
                                            </dd>
                                    </dl>
                                    
                                    <div id="formEditaEndereco">
                                        <form class="form-horizontal" id="editaPessoaEndereco" action="<?php echo $_smarty_tpl->tpl_vars['ACTIONS_DIR']->value;?>
pessoa.php" method="post"/>

                                        <input type="hidden" name="acao" value="editarEnderecoPessoa">
                                        
                                            
                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">CEP</label>
                                                        <input class="span5" id="cepEnderecoPessoa" type="text" name="cepEnderecoPessoa" required="required"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--<div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="required">Tipo Logradouro</label>
                                                        <input class="span3" id="tipoLogradouroEnderecoPessoa" type="text" name="tipoLogradouroEnderecoPessoa" required="required" placeholder="Rua, Avenida ..."/>
                                                    </div>
                                                </div>
                                            </div>-->

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="required">Endere&ccedil;o</label>
                                                        <input class="span6" id="ruaEnderecoPessoa" type="text" name="ruaEnderecoPessoa" required="required"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">N&uacute;mero</label>
                                                        <input class="span3" id="numeroEnderecoPessoa" type="text" name="numeroEnderecoPessoa" required="required"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">Complemento</label>
                                                        <input class="span8" id="complementoEnderecoPessoa" type="text" name="complementoEnderecoPessoa" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">Bairro</label>
                                                        <input class="span8" id="bairroEnderecoPessoa" type="text" name="bairroEnderecoPessoa" required="required"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">Cidade</label>
                                                        <input class="span1" id="idMunicipioEnderecoPessoa" type="hidden" name="idMunicipioEnderecoPessoa" required="required"/>
                                                        <input class="span8" id="municipioEnderecoPessoa" type="text" name="municipioEnderecoPessoa" required="required" readonly="readonly"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">Estado</label>
                                                        <input class="span2" id="estadoEnderecoPessoa" type="text" name="estadoEnderecoPessoa" required="required" readonly="readonly"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--
                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">Pa&iacute;s</label>
                                                        <input class="span5" id="paisEnderecoPessoa" type="text" name="paisEnderecoPessoa" required="required" readonly="readonly"/>
                                                    </div>
                                                </div>
                                            </div>
                                            -->
                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">Refer&ecirc;ncia</label>
                                                        <input class="span8" id="referenciaEnderecoPessoa" type="text" name="referenciaEnderecoPessoa" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">Apelido do Endere&ccedil;o</label>
                                                        <input class="span8" id="apelidoEnderecoPessoa" type="text" name="apelidoEnderecoPessoa" required="required" maxlength="20"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-actions">
                                               <button type="submit" class="btn btn-info">Salvar</button>
                                               <button type="button" class="btn btn-danger" onclick="javascript: btnCancelaEditar('EnderecoPessoa');">Cancelar</button>
                                            </div>

                                        </form>
                                        <!--<div id="teste">123</div>-->

                                    </div>

                                    

                                </div>
                            </div>

                        </div><!-- End .span4 -->

                        <div class="span6">

                            <div class="box">
                                <div class="title">
                                    <h4>
                                        <span>Hist&oacute;rico Situa&ccedil;&atilde;o Pedido</span>

                                        
                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                
                                
                                
                                <div class="content">
                                
                                    <dl class="dl-horizontal" id="divEndereco">
                                        <?php  $_smarty_tpl->tpl_vars['valueHistoricoSituacaoPedido'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueHistoricoSituacaoPedido']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['historicoSituacaoPedido']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueHistoricoSituacaoPedido']->key => $_smarty_tpl->tpl_vars['valueHistoricoSituacaoPedido']->value){
$_smarty_tpl->tpl_vars['valueHistoricoSituacaoPedido']->_loop = true;
?>
                                            <?php echo $_smarty_tpl->tpl_vars['valueHistoricoSituacaoPedido']->value['DESCRICAO_PEDIDO_ITEM_SITUACAO'];?>
 - <?php echo $_smarty_tpl->tpl_vars['valueHistoricoSituacaoPedido']->value['DATA'];?>

                                            <br />
                                        <?php } ?>
                                            
                                    </dl>
                                    
                                </div>
                            </div>

                        </div><!-- End .span4 -->

                        </div><!-- End .row-fluid -->

                        <div class="row-fluid">

                        <div class="span4 form-pedido-pagamento" style="display:none;">

                            <div class="box gradient">

                                <div class="title">
                                    <h4>
                                        
                                        <span>Novo Pagamento</span>
                                    </h4>
                                    <span class="minia-icon-close"></span>
                                </div>
                                <div class="content">
                                     
                                     <form class="form-horizontal" id="cadastrarPedidoPagamento" action="<?php echo $_smarty_tpl->tpl_vars['ACTIONS_DIR']->value;?>
pedido.php" method="post"/>
                                     
                                     <input value="cadastrarPedidoPagamento" name="acao" type="hidden">

                                     <input type="hidden" name="idPedido" id="idPedido" value="<?php echo $_smarty_tpl->tpl_vars['valorPedido']->value['ID_PEDIDO'];?>
">

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span6" for="required">Parcelas</label>
                                                    <select id="nroParcelas" name="nroParcelas">
                                                        <?php  $_smarty_tpl->tpl_vars['valorNroParcelas'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorNroParcelas']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaNroParcelas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorNroParcelas']->key => $_smarty_tpl->tpl_vars['valorNroParcelas']->value){
$_smarty_tpl->tpl_vars['valorNroParcelas']->_loop = true;
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['valorNroParcelas']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['valorNroParcelas']->value;?>
x</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                       <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span6" for="required">Forma de Pagamento</label>
                                                    <select id="formaPagamento" name="formaPagamento">
                                                        <?php  $_smarty_tpl->tpl_vars['valorTipoFormaPagamento'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorTipoFormaPagamento']->_loop = false;
 $_smarty_tpl->tpl_vars['keyTipoFormaPagamento'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['listaTipoFormaPagamento']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorTipoFormaPagamento']->key => $_smarty_tpl->tpl_vars['valorTipoFormaPagamento']->value){
$_smarty_tpl->tpl_vars['valorTipoFormaPagamento']->_loop = true;
 $_smarty_tpl->tpl_vars['keyTipoFormaPagamento']->value = $_smarty_tpl->tpl_vars['valorTipoFormaPagamento']->key;
?>
                                                            <optgroup label="<?php echo $_smarty_tpl->tpl_vars['keyTipoFormaPagamento']->value;?>
">
                                                            <?php  $_smarty_tpl->tpl_vars['formaPagamento'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['formaPagamento']->_loop = false;
 $_smarty_tpl->tpl_vars['idFormaPagamento'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['valorTipoFormaPagamento']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['formaPagamento']->key => $_smarty_tpl->tpl_vars['formaPagamento']->value){
$_smarty_tpl->tpl_vars['formaPagamento']->_loop = true;
 $_smarty_tpl->tpl_vars['idFormaPagamento']->value = $_smarty_tpl->tpl_vars['formaPagamento']->key;
?>
                                                                <option value="<?php echo $_smarty_tpl->tpl_vars['idFormaPagamento']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['formaPagamento']->value;?>
</option>
                                                            <?php } ?>
                                                            </optgroup>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span6" for="required">Tipo Lan&ccedil;amento</label>
                                                    <select id="tipoLancamento" name="tipoLancamento">
                                                        <option value="P">Pagamento</option>
                                                        <option value="E">Estorno</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span6" for="required">Valor</label>
                                                    <input type="text" id="valorPagamento" name="valorPagamento" class="span3 mask-moeda-real" required="required">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12 controls">
                                                <button type="submit" class="btn btn-info">Salvar</button>
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>

                            </div><!-- End .box -->

                            </div><!-- End .span4 -->
                        </div>

                        <div class="row-fluid">

                            <div class="span12">

                                <div class="box">

                                    <div class="title">

                                        <h4>
                                            <span>Ocorr&ecirc;ncias</span>
                                        </h4>
                                        <a href="#" class="minimize">Minimize</a>
                                    </div>
                                    <div class="content">
                                        <form class="form-horizontal" method="post" id="formCadastraOcorrencia" action="<?php echo $_smarty_tpl->tpl_vars['ACTIONS_DIR']->value;?>
pedido.php" />

                                        <input type="hidden" value="cadastraOcorrenciaPedido" name="acao">
                                        <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['valorPedido']->value['ID_PESSOA'];?>
" name="idPessoa">
                                        <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['valorPedido']->value['ID_PEDIDO'];?>
" name="idPedido">

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <textarea class="span12 limit" id="ocorrenciaPedido" name="ocorrenciaPedido" rows="3"></textarea>
                                                        <div class="form-actions">
                                                           <button type="submit" class="btn btn-info">Salvar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>


                                        </form>
                                        <div id="historicoOcorrenciaPessoa">
                                            <dl class="dl-horizontal">
                                            <?php  $_smarty_tpl->tpl_vars['valueOcorrencia'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueOcorrencia']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaOcorrencia']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueOcorrencia']->key => $_smarty_tpl->tpl_vars['valueOcorrencia']->value){
$_smarty_tpl->tpl_vars['valueOcorrencia']->_loop = true;
?>
                                                <dt>
                                                    <?php echo $_smarty_tpl->tpl_vars['valueOcorrencia']->value['DATA'];?>

                                                </dt>
                                                <dd><?php echo $_smarty_tpl->tpl_vars['valueOcorrencia']->value['DESCRICAO'];?>
&nbsp;</dd>
                                            <?php } ?>
                                        </dl>
                                        </div>
                                    </div>

                                </div><!-- End .box -->

                            </div><!-- End .span6 -->   

                        </div>

                        <div class="row-fluid">



                        <div class="span12">

                            <div class="box">

                                <div class="title">

                                    <h4>
                                        
                                        <span>Pedido Pagamento</span>

                                        <form class="box-form right" action="">
                                            <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown">
                                                <span class="icon16 iconic-icon-cog"></span>
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="javascript:void(0);" id="novo-pagamento">
                                                        <span class="icon-file"></span> Novo
                                                    </a>
                                                </li>
                                            </ul>
                                        </form>

                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                <div class="content noPad">
                                    <table class="responsive table table-bordered" id="pedidoPagamentoTable">
                                        <thead>
                                          <tr>
                                            <th>#</th>
                                            <th>Parcelas</th>
                                            <th>Forma Pagamento</th>
                                            <th>Data Autoriza&ccedil;&atilde;o</th>
                                            <th>Lan&ccedil;amento</th>
                                            <th>Valor Total</th>
                                            <th>Transa&ccedil;&atilde;o Autorizada</th>
                                            <th>Ativo</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php  $_smarty_tpl->tpl_vars['valorPedidoPagamento'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorPedidoPagamento']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['visualizaPedidoPagamento']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorPedidoPagamento']->key => $_smarty_tpl->tpl_vars['valorPedidoPagamento']->value){
$_smarty_tpl->tpl_vars['valorPedidoPagamento']->_loop = true;
?>
                                          <tr id="tr<?php echo $_smarty_tpl->tpl_vars['valorPedidoPagamento']->value['ID_PEDIDO_PAGAMENTO'];?>
" <?php if ($_smarty_tpl->tpl_vars['valorPedidoPagamento']->value['ATIVO']=='S'){?> class="ativo" <?php }else{ ?> class="inativo" <?php }?>>
                                            <td><?php echo $_smarty_tpl->tpl_vars['valorPedidoPagamento']->value['ID_PEDIDO_PAGAMENTO'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['valorPedidoPagamento']->value['NUMERO_PARCELAS'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['valorPedidoPagamento']->value['DESCRICAO_FORMA_PAGAMENTO'];?>
</td>
                                            <td id="retorno<?php echo $_smarty_tpl->tpl_vars['valorPedidoPagamento']->value['ID_PEDIDO_PAGAMENTO'];?>
"><?php echo $_smarty_tpl->tpl_vars['valorPedidoPagamento']->value['DATA_AUTORIZACAO'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['valorPedidoPagamento']->value['TIPO_LANCAMENTO'];?>
</td>
                                            <td><?php echo number_format($_smarty_tpl->tpl_vars['valorPedidoPagamento']->value['VALOR_TOTAL_PAGAMENTO'],2,",",".");?>
</td>
                                            <td>
                                                <?php if ($_smarty_tpl->tpl_vars['valorPedidoPagamento']->value['TRANSACAO_AUTORIZADA']=='S'){?>
                                                    <input type="checkbox" class="checkbox-acao" value="<?php echo $_smarty_tpl->tpl_vars['valorPedidoPagamento']->value['ID_PEDIDO_PAGAMENTO'];?>
" checked="checked" name="transacaoAutorizada" id="transacaoAutorizada">
                                                <?php }else{ ?>
                                                    <input type="checkbox" class="checkbox-acao" value="<?php echo $_smarty_tpl->tpl_vars['valorPedidoPagamento']->value['ID_PEDIDO_PAGAMENTO'];?>
" name="transacaoAutorizada" id="transacaoAutorizada">
                                                <?php }?>
                                            </td>
                                            <td>
                                                <?php if ($_smarty_tpl->tpl_vars['valorPedidoPagamento']->value['ATIVO']=='S'){?>
                                                    <input type="checkbox" class="checkbox-acao" value="<?php echo $_smarty_tpl->tpl_vars['valorPedidoPagamento']->value['ID_PEDIDO_PAGAMENTO'];?>
" checked="checked" name="pedidoPagamentoAtivo" id="pedidoPagamentoAtivo">
                                                <?php }else{ ?>
                                                    <input type="checkbox" class="checkbox-acao" value="<?php echo $_smarty_tpl->tpl_vars['valorPedidoPagamento']->value['ID_PEDIDO_PAGAMENTO'];?>
" name="pedidoPagamentoAtivo" id="pedidoPagamentoAtivo">
                                                <?php }?>
                                            </td>
                                          </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div><!-- End .box -->

                        </div><!-- End .span4 -->

                        

                    </div><!-- End .row-fluid --> 


                    <!--<div class="row-fluid">

                        <div class="span6 form-produto-pedido" style="display:none;">

                            <div class="box gradient">

                                <div class="title">
                                    <h4>
                                        
                                        <span>Novo Produto</span>
                                    </h4>
                                    <span class="minia-icon-close"></span>
                                </div>
                                <div class="content">
                                     
                                     <form class="form-horizontal" id="cadastrarProdutoPedido" action="<?php echo $_smarty_tpl->tpl_vars['ACTIONS_DIR']->value;?>
pedido.php" method="post"/>
                                     
                                     <input value="cadastrarProdutoPedido" name="acao" type="hidden">

                                     <input type="hidden" name="idPedido" id="idPedido" value="<?php echo $_smarty_tpl->tpl_vars['valorPedido']->value['ID_PEDIDO'];?>
">

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span3" for="required">Produto</label>
                                                    <select name="listaEstoqueProduto" id="select2" class="nostyle span8">
                                                        <?php  $_smarty_tpl->tpl_vars['valorListaEstoqueProduto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorListaEstoqueProduto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaEstoqueProduto']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorListaEstoqueProduto']->key => $_smarty_tpl->tpl_vars['valorListaEstoqueProduto']->value){
$_smarty_tpl->tpl_vars['valorListaEstoqueProduto']->_loop = true;
?>  
                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['valorListaEstoqueProduto']->value['ID_PRODUTO'];?>
|<?php echo $_smarty_tpl->tpl_vars['valorListaEstoqueProduto']->value['ID_ATRIBUTO'];?>
">
                                                                <?php echo $_smarty_tpl->tpl_vars['valorListaEstoqueProduto']->value['REFERENCIA'];?>
 - <?php echo $_smarty_tpl->tpl_vars['valorListaEstoqueProduto']->value['DESCRICAO_VENDA'];?>

                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12 controls">
                                                <button type="submit" class="btn btn-info">Salvar</button>
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>

                            </div>

                            </div>
                        </div>-->

                    <!--<div id="teste">123</div>-->
                    <div class="row-fluid">

                        <div class="span12">

                            <div class="box">

                                <div class="title">

                                    <h4>
                                        
                                        <span>Produto Pedido</span>
                                        <!--<form class="box-form right" action="">
                                            <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown">
                                                <span class="icon16 iconic-icon-cog"></span>
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="javascript:void(0);" id="novo-produto">
                                                        <span class="icon-file"></span> Novo
                                                    </a>
                                                </li>
                                                
                                            </ul>
                                        </form>-->
                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                <div class="content noPad">
                                    <table class="responsive table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>#</th>
                                            <th>Imagem</th>
                                            <th>Refer&ecirc;ncia</th>
                                            <th>Produto</th>
                                            <th>Pre&ccedil;o Unit&aacute;rio</th>
                                            <th>Presente</th>
                                            <th>Valor Desconto</th>
                                            <th>Qtd</th>
                                            <th>Situa&ccedil;&atilde;o Item Pedido</th>
                                            <th>A&ccedil;&atilde;o</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php  $_smarty_tpl->tpl_vars['valorPedidoItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorPedidoItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['visualizaPedidoItem']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorPedidoItem']->key => $_smarty_tpl->tpl_vars['valorPedidoItem']->value){
$_smarty_tpl->tpl_vars['valorPedidoItem']->_loop = true;
?>
                                              <tr>
                                                <td><?php echo $_smarty_tpl->tpl_vars['valorPedidoItem']->value['ID_PRODUTO_INTEGRACAO'];?>
</td>
                                                <td><img src="../midia/produtos/carrinho/<?php echo $_smarty_tpl->tpl_vars['valorPedidoItem']->value['IMAGEM'];?>
"></td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['valorPedidoItem']->value['REFERENCIA'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['valorPedidoItem']->value['DESCRICAO_VENDA'];?>
</td>
                                                <td><?php echo number_format($_smarty_tpl->tpl_vars['valorPedidoItem']->value['PRECO_UNITARIO'],2,",",".");?>
</td>
                                                <td>
                                                    <?php if ($_smarty_tpl->tpl_vars['valorPedidoItem']->value['PACOTE_PRESENTE']=='N'){?>
                                                        <input type="checkbox" id="pacotePresente<?php echo $_smarty_tpl->tpl_vars['valorPedidoItem']->value['ID_PEDIDO_ITEM'];?>
">
                                                    <?php }else{ ?>
                                                        <input type="checkbox" id="pacotePresente<?php echo $_smarty_tpl->tpl_vars['valorPedidoItem']->value['ID_PEDIDO_ITEM'];?>
" checked="checked">
                                                    <?php }?>
                                                </td>

                                                <td><input class="span8 mask-moeda-real" type="text" value="<?php echo number_format($_smarty_tpl->tpl_vars['valorPedidoItem']->value['VALOR_DESCONTO'],2,",",".");?>
" name="valorDescontoPedidoItem" id="valorDescontoPedidoItem<?php echo $_smarty_tpl->tpl_vars['valorPedidoItem']->value['ID_PEDIDO_ITEM'];?>
"></td>

                                                <td><input class="span4" type="text" value="<?php echo $_smarty_tpl->tpl_vars['valorPedidoItem']->value['QUANTIDADE'];?>
" id="quantidadeItem<?php echo $_smarty_tpl->tpl_vars['valorPedidoItem']->value['ID_PEDIDO_ITEM'];?>
" name="quantidadeItem"></td>

                                                <td>
                                                    <select name="situacaoItemPedido" id="situacaoItemPedido<?php echo $_smarty_tpl->tpl_vars['valorPedidoItem']->value['ID_PEDIDO_ITEM'];?>
">
                                                        <?php  $_smarty_tpl->tpl_vars['valorSituacaoPedido'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorSituacaoPedido']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaSituacaoPedido']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorSituacaoPedido']->key => $_smarty_tpl->tpl_vars['valorSituacaoPedido']->value){
$_smarty_tpl->tpl_vars['valorSituacaoPedido']->_loop = true;
?>
                                                            <?php if ($_smarty_tpl->tpl_vars['valorPedidoItem']->value['SPIT_ID_SITUACAO_PEDIDO_ITEM']==$_smarty_tpl->tpl_vars['valorSituacaoPedido']->value['ID_PEDIDO_ITEM_SITUACAO']){?>
                                                                <option selected="selected" value="<?php echo $_smarty_tpl->tpl_vars['valorSituacaoPedido']->value['ID_PEDIDO_ITEM_SITUACAO'];?>
"><?php echo $_smarty_tpl->tpl_vars['valorSituacaoPedido']->value['DESCRICAO_PEDIDO_ITEM_SITUACAO'];?>
</option>
                                                            <?php }else{ ?>
                                                                <option value="<?php echo $_smarty_tpl->tpl_vars['valorSituacaoPedido']->value['ID_PEDIDO_ITEM_SITUACAO'];?>
"><?php echo $_smarty_tpl->tpl_vars['valorSituacaoPedido']->value['DESCRICAO_PEDIDO_ITEM_SITUACAO'];?>
</option>
                                                            <?php }?>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                                <td><button class="btn btn-info btn-mini" onclick="editarPedidoItem(<?php echo $_smarty_tpl->tpl_vars['valorPedidoItem']->value['ID_PEDIDO_ITEM'];?>
)">Salvar</button></td>
                                              </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div><!-- End .box -->

                        </div><!-- End .span4 -->

                        

                    </div><!-- End .row-fluid -->

               
    			<!-- Page end here -->
    				
               
            </div><!-- End contentwrapper -->
        </div><!-- End #content -->
    
    </div><!-- End #wrapper -->

   <?php }} ?>