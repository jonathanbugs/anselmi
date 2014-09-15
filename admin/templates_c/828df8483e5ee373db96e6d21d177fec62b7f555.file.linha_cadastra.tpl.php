<?php /* Smarty version Smarty-3.1.10, created on 2014-06-13 09:13:02
         compiled from "templates\linha_cadastra.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24174539aeace0f9c64-00094014%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '828df8483e5ee373db96e6d21d177fec62b7f555' => 
    array (
      0 => 'templates\\linha_cadastra.tpl',
      1 => 1400700211,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24174539aeace0f9c64-00094014',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'listaNivelAux' => 0,
    'valueNivelAux' => 0,
    'visualizaLinhaProduto' => 0,
    'valueLinhaProduto' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_539aeace1a98c5_19632654',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_539aeace1a98c5_19632654')) {function content_539aeace1a98c5_19632654($_smarty_tpl) {?><div id="wrapper">

    <?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


    <!--Body content-->
    <div id="content" class="clearfix">
        <div class="contentwrapper"><!--Content wrapper-->

            <?php echo $_smarty_tpl->getSubTemplate ("heading.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


            <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

                
                <div class="row-fluid">

                    <div class="span12">
                        
                        <div class="box">

                            <div class="title">

                                <h4>
                                    <span>N&iacute;vel Auxiliar Produto</span>
                                    <form class="box-form right" action="">
                                        <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown">
                                            <span class="icon16 iconic-icon-cog"></span>
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="javascript: iconeCadastrarLinha('Linha');">
                                                    <span class="icon-pencil"></span> Novo
                                                </a>
                                            </li>
                                        </ul>
                                    </form>
                                </h4>
                                <a href="#" class="minimize">Minimize</a>
                            </div>
                            <div class="content noPad">
                                <table class="responsive table table-bordered" id="LinhaTable">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Tipo</th>
                                        <th>Descri&ccedil;&atilde;o</th>
                                        <th>Ordem</th>
                                        <th>Exibe no Menu</th>
                                        <th>A&ccedil;&otilde;es</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr id="novaLinha" class="display-none">
                                        <td></td>
                                        <td>
                                            <select id="tipoLinha" name="tipoLinha">
                                                <?php  $_smarty_tpl->tpl_vars['valueNivelAux'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueNivelAux']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaNivelAux']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueNivelAux']->key => $_smarty_tpl->tpl_vars['valueNivelAux']->value){
$_smarty_tpl->tpl_vars['valueNivelAux']->_loop = true;
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['valueNivelAux']->value['ID_NIVEL_AUXILIAR'];?>
">
                                                        <?php echo $_smarty_tpl->tpl_vars['valueNivelAux']->value['DESCRICAO_NIVEL_AUXILIAR'];?>

                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td><input class="span12" id="descricaoLinha" type="text" name="descricaoLinha" /></td>
                                        <td><input class="span4" id="ordemLinha" type="text" name="ordemLinha" value="10" /></td>
                                        <td><input id="exibeMenuLinha" type="checkbox" checked="checked" name="exibeMenuLinha" /></td>
                                        <td><div class="controls center"><a href="javascript: iconeAcaoCadastrar('Linha')" title="Salvar" class="tip"><span class="icon12 icon-hdd"></span></a></div></td>
                                      </tr>
                                      
                                        <?php  $_smarty_tpl->tpl_vars['valueLinhaProduto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueLinhaProduto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['visualizaLinhaProduto']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueLinhaProduto']->key => $_smarty_tpl->tpl_vars['valueLinhaProduto']->value){
$_smarty_tpl->tpl_vars['valueLinhaProduto']->_loop = true;
?>
                                      <tr id="trdescricaoLinha<?php echo $_smarty_tpl->tpl_vars['valueLinhaProduto']->value['ID_NIVEL_AUX_VALOR'];?>
">

                                        <td><?php echo $_smarty_tpl->tpl_vars['valueLinhaProduto']->value['ID_NIVEL_AUX_VALOR'];?>
</td>

                                        <td>
                                            <select id="tipoLinha<?php echo $_smarty_tpl->tpl_vars['valueLinhaProduto']->value['ID_NIVEL_AUX_VALOR'];?>
" name="tipoLinha<?php echo $_smarty_tpl->tpl_vars['valueLinhaProduto']->value['ID_NIVEL_AUX_VALOR'];?>
">
                                                <?php  $_smarty_tpl->tpl_vars['valueNivelAux'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueNivelAux']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaNivelAux']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueNivelAux']->key => $_smarty_tpl->tpl_vars['valueNivelAux']->value){
$_smarty_tpl->tpl_vars['valueNivelAux']->_loop = true;
?>
                                                    <option <?php if ($_smarty_tpl->tpl_vars['valueNivelAux']->value['ID_NIVEL_AUXILIAR']==$_smarty_tpl->tpl_vars['valueLinhaProduto']->value['ID_NIVEL_AUXILIAR']){?>selected="selected"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['valueNivelAux']->value['ID_NIVEL_AUXILIAR'];?>
">
                                                        <?php echo $_smarty_tpl->tpl_vars['valueNivelAux']->value['DESCRICAO_NIVEL_AUXILIAR'];?>

                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </td>

                                        <td><input class="span12" id="descricaoLinha<?php echo $_smarty_tpl->tpl_vars['valueLinhaProduto']->value['ID_NIVEL_AUX_VALOR'];?>
" type="text" name="descricaoLinha<?php echo $_smarty_tpl->tpl_vars['valueLinhaProduto']->value['ID_NIVEL_AUX_VALOR'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['valueLinhaProduto']->value['DESC_PRODUTO_NIVEL_AUXILIAR'];?>
"/></td>
                                        
                                        <td><input class="span4" id="ordemLinha<?php echo $_smarty_tpl->tpl_vars['valueLinhaProduto']->value['ID_NIVEL_AUX_VALOR'];?>
" type="text" name="ordemLinha<?php echo $_smarty_tpl->tpl_vars['valueLinhaProduto']->value['ID_NIVEL_AUX_VALOR'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['valueLinhaProduto']->value['ORDEM'];?>
"/></td>
                                        
                                        <td><input id="exibeMenuLinha<?php echo $_smarty_tpl->tpl_vars['valueLinhaProduto']->value['ID_NIVEL_AUX_VALOR'];?>
" type="checkbox" value="S" <?php if ($_smarty_tpl->tpl_vars['valueLinhaProduto']->value['EXIBE_MENU']=='S'){?>checked="checked"<?php }?> name="exibeMenuLinha<?php echo $_smarty_tpl->tpl_vars['valueLinhaProduto']->value['ID_NIVEL_AUX_VALOR'];?>
"/></td>
                                        
                                        <td>
                                            <div class="controls center">
                                                <a href="javascript: iconeAcaoEditar(<?php echo $_smarty_tpl->tpl_vars['valueLinhaProduto']->value['ID_NIVEL_AUX_VALOR'];?>
, 'Linha')" title="Editar" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                                <a href="javascript: iconeAcaoRemover(<?php echo $_smarty_tpl->tpl_vars['valueLinhaProduto']->value['ID_NIVEL_AUX_VALOR'];?>
, 'Linha')" title="Remover" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
                                            </div>
                                        </td>
                                      </tr>
                                      <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                        </div><!-- End .box -->

                    </div><!-- End .span6 -->

                </div><!-- End .row-fluid -->

           
            <!-- Page end here -->
                
           
        </div><!-- End contentwrapper -->
    </div><!-- End #content -->

</div><!-- End #wrapper -->

   

<?php }} ?>