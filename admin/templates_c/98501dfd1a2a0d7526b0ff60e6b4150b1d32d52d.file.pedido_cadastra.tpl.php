<?php /* Smarty version Smarty-3.1.10, created on 2014-07-07 19:18:05
         compiled from "templates/pedido_cadastra.tpl" */ ?>
<?php /*%%SmartyHeaderCode:59092497953bad64d92c7e8-24276430%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98501dfd1a2a0d7526b0ff60e6b4150b1d32d52d' => 
    array (
      0 => 'templates/pedido_cadastra.tpl',
      1 => 1377794350,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59092497953bad64d92c7e8-24276430',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ACTIONS_DIR' => 0,
    'listaTipoFrete' => 0,
    'valorTipoFrete' => 0,
    'listaNroParcelas' => 0,
    'valorNroParcelas' => 0,
    'listaTipoFormaPagamento' => 0,
    'keyTipoFormaPagamento' => 0,
    'valorTipoFormaPagamento' => 0,
    'idFormaPagamento' => 0,
    'formaPagamento' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_53bad64d9865b6_40369620',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53bad64d9865b6_40369620')) {function content_53bad64d9865b6_40369620($_smarty_tpl) {?><div id="wrapper">

    <?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


    <!--Body content-->
    <div id="content" class="clearfix">
        <div class="contentwrapper"><!--Content wrapper-->

            <?php echo $_smarty_tpl->getSubTemplate ("heading.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


            <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

         <form class="form-horizontal" id="cadastrarPedido" action="<?php echo $_smarty_tpl->tpl_vars['ACTIONS_DIR']->value;?>
pedido.php" method="post"/>

         <input type="hidden" name="acao" value="cadastrarPedido">

                
            <div class="row-fluid">

                <div class="span6">

                    <div class="box">

                        <div class="title">

                            <h4>
                                <!-- <span class="icon16 brocco-icon-grid"></span> -->
                                <span>Dados Pedido</span>
                            </h4>
                            
                        </div>
                        <div class="content">
                        
                        <div class="form-row row-fluid">
                            <div class="span11">
                                <div class="row-fluid">
                                    <label class="form-label span4" for="required">Nome Pessoa</label>
                                    <input type="hidden" id="idPessoa" name="idPessoa" style="width:300px" class="input-xlarge" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span4" for="required">Endere&ccedil;o Entrega</label>
                                    <select name="enderecoEntrega" id="enderecoEntrega">
                                        <option value="0" selected="selected">Selecione</option>
                                    </select>
                                    <div class="margin padding right" id="load-endereco-entrega"><img alt="" src="images/loaders/horizontal/063.gif"></img></div>
                                </div>
                            </div>
                        </div> 
                        
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span4" for="required">Tipo Frete</label>
                                    <select name="tipoFreteCadastra" id="tipoFreteCadastra">
                                    <?php  $_smarty_tpl->tpl_vars['valorTipoFrete'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorTipoFrete']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaTipoFrete']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorTipoFrete']->key => $_smarty_tpl->tpl_vars['valorTipoFrete']->value){
$_smarty_tpl->tpl_vars['valorTipoFrete']->_loop = true;
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['valorTipoFrete']->value['ID_TIPO_FRETE'];?>
"><?php echo $_smarty_tpl->tpl_vars['valorTipoFrete']->value['ID_TIPO_FRETE'];?>
 - <?php echo $_smarty_tpl->tpl_vars['valorTipoFrete']->value['DESCRICAO_FRETE'];?>
</option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>                           
                        
                        </div>
 
                    </div><!-- End .box -->

                </div>
                
                <div class="span6">

                    <div class="box">

                                <div class="title">
                                    <h4>
                                        
                                        <span>Forma de Pagamento</span>
                                    </h4>
                                </div>

                                <div class="content">
                                     
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

                                </div>

                            </div><!-- End .box -->

                </div>

            </div>

            <div class="row-fluid">

                <div class="span12">

                    <div class="box gradient">

                        <div class="title">
                            <h4>
                                <span>Produtos</span>
                                
                            </h4>
                        </div>
                        <div class="content noPad clearfix" id="tabelaListaProduto">
                        
                        	<input type="text" value="" id="idsProdutos" name="idsProdutos">
                             
                            <table id="tableListaProduto" cellpadding="0" cellspacing="0" border="0" class="responsive display table table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Descri&ccedil;&atilde;o Venda</th>
                                        <th>Refer&ecirc;ncia</th>
                                        <th>Adicionar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr></tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="7">
                                            <div class="form-actions">
                                               <button type="submit" class="btn btn-info">Salvar</button>
                                               <!--<button type="button" class="btn">Cancelar</button>-->
                                            </div>
                                            <div id="teste">123</div>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>


                        </div>

                    </div><!-- End .box -->



                </div><!-- End .span12 -->

            </div><!-- End .row-fluid -->

        </form>

           
            <!-- Page end here -->
                
           
        </div><!-- End contentwrapper -->
    </div><!-- End #content -->

</div><!-- End #wrapper -->

   

<?php }} ?>