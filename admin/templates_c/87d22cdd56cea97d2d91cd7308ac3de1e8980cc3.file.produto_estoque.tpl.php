<?php /* Smarty version Smarty-3.1.10, created on 2014-08-07 21:37:37
         compiled from "templates/produto_estoque.tpl" */ ?>
<?php /*%%SmartyHeaderCode:79542088353e3d5810661c9-54665303%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87d22cdd56cea97d2d91cd7308ac3de1e8980cc3' => 
    array (
      0 => 'templates/produto_estoque.tpl',
      1 => 1393425290,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '79542088353e3d5810661c9-54665303',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ACTIONS_DIR' => 0,
    'qtdFiltro' => 0,
    'listaProdutoEstoque' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_53e3d581085802_28237262',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53e3d581085802_28237262')) {function content_53e3d581085802_28237262($_smarty_tpl) {?>    <div id="wrapper">

        <?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <?php echo $_smarty_tpl->getSubTemplate ("heading.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


                <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

                <form class="form-horizontal" id="importaArquivo" enctype="multipart/form-data" action="<?php echo $_smarty_tpl->tpl_vars['ACTIONS_DIR']->value;?>
importacao.php" method="post" />

                <input value="importaArquivo" name="acao" type="hidden">
                
                <div class="form-row row-fluid">
                    <div class="span12">
                        <div class="row-fluid">
                            <label class="form-label span4" for="checkboxes">Quantidade Produto <= </label>
                            <div class="span8 controls">   
                                <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['qtdFiltro']->value;?>
" name="qtdEstoque" id="qtdEstoque" class="span1">
                                <span class="btn btn-info" id="gerarRelatorio">Gerar</span>
                            </div> 
                        </div>
                    </div> 
                </div>
                
                </form> 

                <div class="span10" id="conteudoImprimir">
                    <span class="entypo-icon-printer right" id="imprimirRelatorio"></span>
                    <div class="page-header">
                        <h4>Estoque de Produtos</h4>
                    </div>
                    <table class="responsive table table-condensed">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Descri&ccedil;&atilde;o Venda</th>
                            <th>Refer&ecirc;ncia</th>
                            <th>Atributo</th>
                            <th>Quantidade</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaProdutoEstoque']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
                          <tr class="linhaProdutoEstoque" id="<?php echo $_smarty_tpl->tpl_vars['value']->value['ID_PRODUTO'];?>
">
                            <td><?php echo $_smarty_tpl->tpl_vars['value']->value['ID_PRODUTO'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['value']->value['DESCRICAO_VENDA'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['value']->value['REFERENCIA'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['value']->value['ATRIBUTO'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['value']->value['SALDO'];?>
</td>
                          </tr>
                          <?php } ?>
                        </tbody>
                    </table>

                </div><!-- End .span6 -->              
                <!-- Page end here -->
                    
               
            </div><!-- End contentwrapper -->
        </div><!-- End #content -->
    
    </div><!-- End #wrapper -->

   <?php }} ?>