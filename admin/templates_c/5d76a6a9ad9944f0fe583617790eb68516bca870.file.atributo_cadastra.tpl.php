<?php /* Smarty version Smarty-3.1.10, created on 2014-08-01 21:26:53
         compiled from "templates/atributo_cadastra.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13431347453dbe9fdcc3aa6-19269029%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d76a6a9ad9944f0fe583617790eb68516bca870' => 
    array (
      0 => 'templates/atributo_cadastra.tpl',
      1 => 1402586472,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13431347453dbe9fdcc3aa6-19269029',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'listaAtributoProduto' => 0,
    'valueAtributo' => 0,
    'listaAtributoValor' => 0,
    'valueAtributoValor' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_53dbe9fdd2f821_47271432',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53dbe9fdd2f821_47271432')) {function content_53dbe9fdd2f821_47271432($_smarty_tpl) {?><div id="wrapper">

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
                                    <span>Atributos</span>
                                    <form class="box-form right" action="">
                                        <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown">
                                            <span class="icon16 iconic-icon-cog"></span>
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="javascript: iconeCadastrarAtributo('Atributo');">
                                                    <span class="icon-pencil"></span> Novo
                                                </a>
                                            </li>
                                        </ul>
                                    </form>
                                </h4>
                                <a href="#" class="minimize">Minimize</a>
                            </div>
                            <div class="content noPad">
                                <table class="responsive table table-bordered" id="AtributoTable">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Atributo</th>
                                        <th>Valor</th>
                                        <th>Cor</th>
                                        <th>A&ccedil;&otilde;es</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr id="novaAtributo" class="display-none">
                                        <td></td>
                                        <td>
                                            <select id="tipoAtributo" name="tipoAtributo">
                                                <?php  $_smarty_tpl->tpl_vars['valueAtributo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueAtributo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaAtributoProduto']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueAtributo']->key => $_smarty_tpl->tpl_vars['valueAtributo']->value){
$_smarty_tpl->tpl_vars['valueAtributo']->_loop = true;
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['valueAtributo']->value['ID_ATRIBUTO'];?>
">
                                                        <?php echo $_smarty_tpl->tpl_vars['valueAtributo']->value['DESCRICAO_ATRIBUTO'];?>

                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td><input class="span12" id="descricaoAtributo" type="text" name="descricaoAtributo" /></td>
                                        <td>
                                            <input class="span12 hexadecimal" id="hexadecimalAtributo" type="text" name="hexadecimalAtributo" value="#ffffff"/><div class="picker" id="picker"></div>
                                        </td>
                                        <td><div class="controls center"><a href="javascript: iconeAcaoCadastrar('Atributo')" title="Salvar" class="tip"><span class="icon12 icon-hdd"></span></a></div></td>
                                      </tr>
                                      
                                    <?php  $_smarty_tpl->tpl_vars['valueAtributoValor'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueAtributoValor']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaAtributoValor']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueAtributoValor']->key => $_smarty_tpl->tpl_vars['valueAtributoValor']->value){
$_smarty_tpl->tpl_vars['valueAtributoValor']->_loop = true;
?>
                                      <tr id="trdescricaoAtributo<?php echo $_smarty_tpl->tpl_vars['valueAtributo']->value['ID_ATRIBUTO'];?>
">

                                        <td><?php echo $_smarty_tpl->tpl_vars['valueAtributoValor']->value['ID_ATRIBUTO_VALOR'];?>
</td>

                                        <td>
                                            <select id="tipoAtributo<?php echo $_smarty_tpl->tpl_vars['valueAtributoValor']->value['ID_ATRIBUTO_VALOR'];?>
" name="tipoAtributo<?php echo $_smarty_tpl->tpl_vars['valueAtributoValor']->value['ID_ATRIBUTO_VALOR'];?>
">
                                                <?php  $_smarty_tpl->tpl_vars['valueAtributo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueAtributo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaAtributoProduto']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueAtributo']->key => $_smarty_tpl->tpl_vars['valueAtributo']->value){
$_smarty_tpl->tpl_vars['valueAtributo']->_loop = true;
?>
                                                    <option <?php if ($_smarty_tpl->tpl_vars['valueAtributoValor']->value['ATRI_ID_ATRIBUTO']==$_smarty_tpl->tpl_vars['valueAtributo']->value['ID_ATRIBUTO']){?>selected="selected"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['valueAtributo']->value['ID_ATRIBUTO'];?>
">
                                                        <?php echo $_smarty_tpl->tpl_vars['valueAtributo']->value['DESCRICAO_ATRIBUTO'];?>

                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </td>

                                        <td><input class="span12" id="descricaoAtributo<?php echo $_smarty_tpl->tpl_vars['valueAtributoValor']->value['ID_ATRIBUTO_VALOR'];?>
" type="text" name="descricaoAtributo<?php echo $_smarty_tpl->tpl_vars['valueAtributoValor']->value['ID_ATRIBUTO_VALOR'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['valueAtributoValor']->value['VALOR'];?>
"/></td>
                                        
                                        <td>
                                            <input class="span12 hexadecimal" id="hexadecimalAtributo<?php echo $_smarty_tpl->tpl_vars['valueAtributoValor']->value['ID_ATRIBUTO_VALOR'];?>
" type="text" name="hexadecimalAtributo<?php echo $_smarty_tpl->tpl_vars['valueAtributoValor']->value['ID_ATRIBUTO_VALOR'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['valueAtributoValor']->value['HEXADECIMAL'];?>
"/><div class="picker" id="picker<?php echo $_smarty_tpl->tpl_vars['valueAtributoValor']->value['ID_ATRIBUTO_VALOR'];?>
"></div>
                                        </td>

                                        <td>
                                            <div class="controls center">
                                                <a href="javascript: iconeAcaoEditar(<?php echo $_smarty_tpl->tpl_vars['valueAtributoValor']->value['ID_ATRIBUTO_VALOR'];?>
, 'Atributo')" title="Editar" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                                <a href="javascript: iconeAcaoRemover(<?php echo $_smarty_tpl->tpl_vars['valueAtributoValor']->value['ID_ATRIBUTO_VALOR'];?>
, 'Atributo')" title="Remover" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
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