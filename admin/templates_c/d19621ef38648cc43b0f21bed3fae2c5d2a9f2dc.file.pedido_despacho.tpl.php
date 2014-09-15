<?php /* Smarty version Smarty-3.1.10, created on 2013-12-11 17:34:29
         compiled from "templates\pedido_despacho.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1003252a8be4509c9c2-67526554%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd19621ef38648cc43b0f21bed3fae2c5d2a9f2dc' => 
    array (
      0 => 'templates\\pedido_despacho.tpl',
      1 => 1378406141,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1003252a8be4509c9c2-67526554',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ACTIONS_DIR' => 0,
    'listaPedido' => 0,
    'valorPedido' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_52a8be4516a0b5_85194287',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a8be4516a0b5_85194287')) {function content_52a8be4516a0b5_85194287($_smarty_tpl) {?>    <div id="wrapper">

        <?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <?php echo $_smarty_tpl->getSubTemplate ("heading.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


                <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

				

                    <div class="row-fluid">

                        <div class="span12">

                            <div class="box gradient">

                                <div class="title">
                                    <h4>
                                        <span>Lista Pedido</span>
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
                                <div class="content noPad clearfix">
	                                
									<div class="form-row row-fluid">
                                            <div class="span6">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="normal">ID Pedido</label>
                                                    <input type="text" name="idPedidoDespacho" id="idPedidoDespacho" class="span6">
                                                </div>
                                            </div>
                                        </div>
                                        
                               <div class="form-row row-fluid">
                               		<div class="span12">
                                        
		                               <form class="form-horizontal" id="despacharPedido" action="<?php echo $_smarty_tpl->tpl_vars['ACTIONS_DIR']->value;?>
pedido.php" method="post"/> 
						
										<input type="hidden" value="despacharPedido" name="acao" id="acao">
		                                
		                                    <table class="responsive table table-bordered" id="pedidoItemManutencao" width="100%">
		                                        <thead>
		                                            <tr>
		                                                <th>#</th>
		                                                <th>Pedido</th>
		                                                <th>Data Emiss&atilde;o</th>
		                                                <th>Cliente</th>
		                                                <th>E-mail</th>
		                                                <th>Situa&ccedil;&atilde;o do Pedido</th>
		                                                <th>Cod Rastreamento</th>
		                                                
		                                          </tr>
		                                        </thead>
		                                        <tbody>
		                                            <?php  $_smarty_tpl->tpl_vars['valorPedido'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorPedido']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaPedido']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorPedido']->key => $_smarty_tpl->tpl_vars['valorPedido']->value){
$_smarty_tpl->tpl_vars['valorPedido']->_loop = true;
?>
		                                              <tr id="tr<?php echo $_smarty_tpl->tpl_vars['valorPedido']->value['NUMERO_PEDIDO'];?>
">
		                                                <td><input type="checkbox" readonly="readonly" class="nostyle" value="<?php echo $_smarty_tpl->tpl_vars['valorPedido']->value['ID_PEDIDO'];?>
" name="idPedido[]" id="idPedido<?php echo $_smarty_tpl->tpl_vars['valorPedido']->value['NUMERO_PEDIDO'];?>
"></td>
		                                                <td><?php echo $_smarty_tpl->tpl_vars['valorPedido']->value['NUMERO_PEDIDO'];?>
</td>
		                                                <td><?php echo $_smarty_tpl->tpl_vars['valorPedido']->value['DATA_EMISSAO'];?>
</td>
		                                                <td><?php echo $_smarty_tpl->tpl_vars['valorPedido']->value['NOME'];?>
</td>
		                                                <td><?php echo $_smarty_tpl->tpl_vars['valorPedido']->value['EMAIL'];?>
</td>
		                                                <td><?php echo $_smarty_tpl->tpl_vars['valorPedido']->value['DESCRICAO_PEDIDO_ITEM_SITUACAO'];?>
</td>
		                                                <td><input type="text" class="span12 codRastreamento" name="codRastreamento[<?php echo $_smarty_tpl->tpl_vars['valorPedido']->value['ID_PEDIDO'];?>
]" id="codRastreamento<?php echo $_smarty_tpl->tpl_vars['valorPedido']->value['NUMERO_PEDIDO'];?>
"></td>
		                                              </tr>
		                                            <?php } ?>
		                                        </tbody>
		                                        <!--<tfoot>
		                                            <tr>
		                                                <th>Rendering engine</th>
		                                                <th>Browser</th>
		                                                <th>Platform(s)</th>
		                                                <th>Engine version</th>
		                                                <th>CSS grade</th>
		                                            </tr>
		                                        </tfoot>-->
		                                    </table>
		                                    
		                                    <div class="form-row row-fluid">
		                                    	<div class="span6">
		                                        	<div class="row-fluid">
		                                            	<label class="form-label span6" for="normal">Pedidos não encontrados</label>
		                                                <input type="text" readonly="readonly" name="pedidoNaoEncontrados" id="pedidoNaoEncontrados" class="span6">
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="form-actions">
			                                   <button type="submit" class="btn btn-info">Salvar</button>
			                                   <!--<button type="button" class="btn">Cancelar</button>-->
			                                </div>
		                                    
		                                    </form>
		                                 </div>
		                              </div>
		                                    
                                    
                                    
                                </div>

                            </div><!-- End .box -->

                        </div><!-- End .span12 -->

                    </div><!-- End .row-fluid -->
               
               <!-- <div id="teste">123</div> -->
                
                

               
    			<!-- Page end here -->
    				
               
            </div><!-- End contentwrapper -->
        </div><!-- End #content -->
    
    </div><!-- End #wrapper -->

   <?php }} ?>