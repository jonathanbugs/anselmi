<?php /* Smarty version Smarty-3.1.10, created on 2014-04-15 15:39:22
         compiled from "templates\produto_do_dia.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19343534d7cda0ac9a6-55943236%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e03ff87ddc025caadeb582b2667e2c86fb593c9' => 
    array (
      0 => 'templates\\produto_do_dia.tpl',
      1 => 1397508056,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19343534d7cda0ac9a6-55943236',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ACTIONS_DIR' => 0,
    'produtoPromoDia' => 0,
    'valueProdutoPromoDia' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_534d7cda127d78_70121520',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_534d7cda127d78_70121520')) {function content_534d7cda127d78_70121520($_smarty_tpl) {?>    <div id="wrapper">

        <?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <?php echo $_smarty_tpl->getSubTemplate ("heading.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


                <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

                <form class="form-horizontal" id="produtoDoDia" enctype="multipart/form-data" action="<?php echo $_smarty_tpl->tpl_vars['ACTIONS_DIR']->value;?>
produto.php" method="post" />

                <input value="gravaProdutoDoDia" name="acao" type="hidden">
                <div id="teste"></div>
                                
                <div class="form-row row-fluid">
                    <div class="span6">
                        <div class="row-fluid">
                            <label class="form-label span4" for="textarea">Refer&ecirc;ncia</label>
                            <input type="text" name="referencia" id="referencia" class="span4" /> <button type="submit" class="btn btn-info">Salvar</button>
                        </div>
                        
                    </div>
                    <br>
                    <br>
                    <br>

                    <div class="row-fluid">
                        <div class="span12" id="tabelaProdutoDoDia">
                            <table class="responsive table">
                                <thead>
                                  <tr>
                                    <th>Foto</th>
                                    <th>Refer&ecirc;ncia</th>
                                    <th>Descri&ccedil;&atilde;o</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php  $_smarty_tpl->tpl_vars['valueProdutoPromoDia'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueProdutoPromoDia']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['produtoPromoDia']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueProdutoPromoDia']->key => $_smarty_tpl->tpl_vars['valueProdutoPromoDia']->value){
$_smarty_tpl->tpl_vars['valueProdutoPromoDia']->_loop = true;
?>  
                                  <tr>
                                    <td>
                                        <a href="../<?php echo $_smarty_tpl->tpl_vars['valueProdutoPromoDia']->value['URL_AMIGAVEL'];?>
.html" target="_blank">
                                            <img alt="" src="../midia/produtos/carrinho/<?php echo $_smarty_tpl->tpl_vars['valueProdutoPromoDia']->value['IMAGEM_PRINCIPAL'];?>
">
                                        </a>
                                    </td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['valueProdutoPromoDia']->value['REFERENCIA'];?>
</td>
                                    <td>
                                        <a href="../<?php echo $_smarty_tpl->tpl_vars['valueProdutoPromoDia']->value['URL_AMIGAVEL'];?>
.html" target="_blank">
                                            <?php echo $_smarty_tpl->tpl_vars['valueProdutoPromoDia']->value['DESCRICAO_VENDA'];?>
<br>
                                            De R$ <?php echo number_format($_smarty_tpl->tpl_vars['valueProdutoPromoDia']->value['PRECO_VENDA'],2,",",".");?>
<br>
                                            Por R$ <?php echo number_format($_smarty_tpl->tpl_vars['valueProdutoPromoDia']->value['PRECO_PROMOCIONAL'],2,",",".");?>

                                        </a>
                                    </td>
                                  </tr>
                                  <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                

                </form> 

    			<!-- Page end here -->

                
                    
            </div><!-- End contentwrapper -->
        </div><!-- End #content -->
    
    </div><!-- End #wrapper -->

   <?php }} ?>