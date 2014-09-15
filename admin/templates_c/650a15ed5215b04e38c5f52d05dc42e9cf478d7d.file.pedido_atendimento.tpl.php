<?php /* Smarty version Smarty-3.1.10, created on 2014-08-06 14:11:20
         compiled from "templates/pedido_atendimento.tpl" */ ?>
<?php /*%%SmartyHeaderCode:104484041653e21b689f92c9-93959617%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '650a15ed5215b04e38c5f52d05dc42e9cf478d7d' => 
    array (
      0 => 'templates/pedido_atendimento.tpl',
      1 => 1404756507,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104484041653e21b689f92c9-93959617',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ACTIONS_DIR' => 0,
    'listaPedido' => 0,
    'arrayPedidos' => 0,
    'value' => 0,
    'idSituacaoPedidoProdIndisponivel' => 0,
    'idSituacaoPedidoAtendido' => 0,
    'idSituacaoPedidoAprovadoCredito' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_53e21b68a611a9_86704000',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53e21b68a611a9_86704000')) {function content_53e21b68a611a9_86704000($_smarty_tpl) {?>    <div id="wrapper">

        <?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <?php echo $_smarty_tpl->getSubTemplate ("heading.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


                <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

					<form class="form-horizontal" id="atenderPedido" action="<?php echo $_smarty_tpl->tpl_vars['ACTIONS_DIR']->value;?>
pedido.php" method="post"/> 
                    
                    <input type="hidden" value="atenderPedido" id="acao" name="acao">
                    
                    <div class="row-fluid">

                        <div class="span12">

                            <div class="box gradient">

                                <div class="title">
                                    <h4>
                                        <span>Pedidos</span>
                                        <!--<form class="box-form right" action="">
                                            <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown">
                                                <span class="icon16 iconic-icon-cog"></span>
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="pessoa-cadastra">
                                                        <span class="icon-pencil"></span> Novo
                                                    </a>
                                                </li>
                                            </ul>
                                        </form>-->
                                    </h4>
                                </div>
                                <div class="content noPad clearfix" id="tabelaListaPedido" style="padding:5px;">
                                   
                                            <?php  $_smarty_tpl->tpl_vars['arrayPedidos'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['arrayPedidos']->_loop = false;
 $_smarty_tpl->tpl_vars['idPedido'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['listaPedido']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['arrayPedidos']->key => $_smarty_tpl->tpl_vars['arrayPedidos']->value){
$_smarty_tpl->tpl_vars['arrayPedidos']->_loop = true;
 $_smarty_tpl->tpl_vars['idPedido']->value = $_smarty_tpl->tpl_vars['arrayPedidos']->key;
?>
                                             <br>
												<h5><strong>PEDIDO:</strong> <?php echo $_smarty_tpl->tpl_vars['arrayPedidos']->value[0]['NUMERO_PEDIDO'];?>
 | <strong>DATA EMISS&Atilde;O:</strong> <?php echo $_smarty_tpl->tpl_vars['arrayPedidos']->value[0]['DATA_EMISSAO'];?>
</h5>
												
								
												<table class="responsive table table-bordered" id="pedidoItemManutencao">
                                        <thead>
													<tr>
													<th>Item Pedido</th>
													<th>Situa&ccedil;&atilde;o</th>
													<th>Descri&ccedil;&atilde;o Produto</th>
													<th>Pre&ccedil;o Unit&aacute;rio</th>
													<th>Quantidade</th>
													<th>Qtd Atendido</th>
													<th>A&ccedil;&atilde;o</th>
													</tr>
													</thead>
													<tbody>
													<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrayPedidos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
														<tr>
															<td><?php echo $_smarty_tpl->tpl_vars['value']->value['ID_PEDIDO_ITEM'];?>
</td>
															<td>
																<select class="idSituacaoPedidoItem nostyle span12" id="idSituacaoPedidoItem<?php echo $_smarty_tpl->tpl_vars['value']->value['ID_PEDIDO_ITEM'];?>
" name="idSituacaoPedidoItem[<?php echo $_smarty_tpl->tpl_vars['value']->value['ID_PEDIDO_ITEM'];?>
]">
																	<?php if ($_smarty_tpl->tpl_vars['value']->value['ID_PEDIDO_ITEM_SITUACAO']==$_smarty_tpl->tpl_vars['idSituacaoPedidoProdIndisponivel']->value){?>
																		<option selected="selected" value="<?php echo $_smarty_tpl->tpl_vars['idSituacaoPedidoProdIndisponivel']->value;?>
">AGUARDANDO ESTOQUE</option>
																		<option value="<?php echo $_smarty_tpl->tpl_vars['idSituacaoPedidoAtendido']->value;?>
">ATENDIDO</option>
																	<?php }elseif($_smarty_tpl->tpl_vars['value']->value['ID_PEDIDO_ITEM_SITUACAO']==$_smarty_tpl->tpl_vars['idSituacaoPedidoAtendido']->value){?>
																		<option selected="selected" value="<?php echo $_smarty_tpl->tpl_vars['idSituacaoPedidoAtendido']->value;?>
">ATENDIDO</option>
																		<option value="<?php echo $_smarty_tpl->tpl_vars['idSituacaoPedidoProdIndisponivel']->value;?>
">AGUARDANDO ESTOQUE</option>
																	<?php }else{ ?>
																		<option selected="selected" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['ID_PEDIDO_ITEM_SITUACAO'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['DESCRICAO_PEDIDO_ITEM_SITUACAO'];?>
</option>
																		<option value="<?php echo $_smarty_tpl->tpl_vars['idSituacaoPedidoProdIndisponivel']->value;?>
">AGUARDANDO ESTOQUE</option>
																		<option value="<?php echo $_smarty_tpl->tpl_vars['idSituacaoPedidoAtendido']->value;?>
">ATENDIDO</option>
																	<?php }?>
																</select>
															</td>
															<td><?php echo $_smarty_tpl->tpl_vars['value']->value['REFERENCIA'];?>
 <?php echo $_smarty_tpl->tpl_vars['value']->value['DESCRICAO_VENDA'];?>
<br><?php echo $_smarty_tpl->tpl_vars['value']->value['ATRIBUTO'];?>
</td>
															<td><?php echo number_format($_smarty_tpl->tpl_vars['value']->value['PRECO_UNITARIO_VENDA'],2,",",".");?>
</td>
															<td><input id="qtdPedidoItem<?php echo $_smarty_tpl->tpl_vars['value']->value['ID_PEDIDO_ITEM'];?>
" type="text" value="<?php echo number_format($_smarty_tpl->tpl_vars['value']->value['QUANTIDADE']);?>
" readonly="readonly" class="span4"></td>
															<td><input id="qtdAtendido<?php echo $_smarty_tpl->tpl_vars['value']->value['ID_PEDIDO_ITEM'];?>
" name="qtdAtendido[<?php echo $_smarty_tpl->tpl_vars['value']->value['ID_PEDIDO_ITEM'];?>
]" type="text" value="<?php echo number_format($_smarty_tpl->tpl_vars['value']->value['QUANTIDADE_ATENDIDO']);?>
" class="span4"></td>
															<td><button type="button" class="btn btn-info btn-mini atenderPedido" id="atenderPedido<?php echo $_smarty_tpl->tpl_vars['value']->value['ID_PEDIDO_ITEM'];?>
">Atender</button></td>
														</tr>
													<?php } ?>
													</tbody>
												</table>
											
											<?php } ?>
											
											
											<div class="form-actions">
			                                   <button type="submit" class="btn btn-info">Salvar</button>
			                                   <!--<button type="button" class="btn">Cancelar</button>-->
			                                </div>
			                                 
                                      
                                </div>

                            </div><!-- End .box -->

                        </div><!-- End .span12 -->

                    </div><!-- End .row-fluid -->
               
                <!--<div id="teste">123</div>-->
                
                </form>

               
    			<!-- Page end here -->
    				
               
            </div><!-- End contentwrapper -->
        </div><!-- End #content -->
    
    </div><!-- End #wrapper -->

<script>
	idSituacaoPedidoAprovadoCredito = <?php echo $_smarty_tpl->tpl_vars['idSituacaoPedidoAprovadoCredito']->value;?>
;
	idSituacaoPedidoAtendido = <?php echo $_smarty_tpl->tpl_vars['idSituacaoPedidoAtendido']->value;?>
;
</script>
   <?php }} ?>