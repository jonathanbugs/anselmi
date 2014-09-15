<?php /* Smarty version Smarty-3.1.10, created on 2014-05-13 10:33:26
         compiled from "templates\lista_casamento_lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:138553721f26911d42-26942449%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8804f8302c695d8d2dd280b23f9eb732211143ee' => 
    array (
      0 => 'templates\\lista_casamento_lista.tpl',
      1 => 1386876505,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '138553721f26911d42-26942449',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'listaCasamento' => 0,
    'valorListaCasamento' => 0,
    'countProdutosVendidos' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_53721f26adcda7_00644522',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53721f26adcda7_00644522')) {function content_53721f26adcda7_00644522($_smarty_tpl) {?>    <div id="wrapper">

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
                                        <span>Lista de Casamento</span>
                                        <form class="box-form right" action="">
                                            <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown">
                                                <span class="icon16 iconic-icon-cog"></span>
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="lista-casamento-cadastra">
                                                        <span class="icon-pencil"></span> Novo
                                                    </a>
                                                </li>
                                            </ul>
                                        </form>
                                    </h4>
                                </div>
                                <div class="content noPad clearfix" id="tabelalistaCasamento">
                                    <table cellpadding="0" cellspacing="0" border="0" class="responsive dynamicTable display table table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Data Entrega</th>
                                                <th>Noivos</th>
                                                <th>Vendas</th>
                                                <th>Ativo</th>
                                                <th>Situa&ccedil;&atilde;o</th>
                                                <th>A&ccedil;&otilde;es</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  $_smarty_tpl->tpl_vars['valorListaCasamento'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorListaCasamento']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaCasamento']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorListaCasamento']->key => $_smarty_tpl->tpl_vars['valorListaCasamento']->value){
$_smarty_tpl->tpl_vars['valorListaCasamento']->_loop = true;
?>
                                            <tr class="odd gradeX" id="<?php echo $_smarty_tpl->tpl_vars['valorListaCasamento']->value['ID_LISTA_CASAMENTO'];?>
" <?php if ($_smarty_tpl->tpl_vars['valorListaCasamento']->value['SITUACAO']=='D'){?>style="background-color:#7FFA6F"<?php }elseif($_smarty_tpl->tpl_vars['valorListaCasamento']->value['SITUACAO']=='F'){?>style="background-color:#F6FD3B"<?php }?>>
                                                <td><?php echo $_smarty_tpl->tpl_vars['valorListaCasamento']->value['ID_LISTA_CASAMENTO'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['valorListaCasamento']->value['DATA_EVENTO'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['valorListaCasamento']->value['CONJUGE1'];?>
 | <?php echo $_smarty_tpl->tpl_vars['valorListaCasamento']->value['CONJUGE2'];?>
</td>
                                                <td class="center">
                                                    <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['countProdutosVendidos']->value[$_smarty_tpl->tpl_vars['valorListaCasamento']->value['ID_LISTA_CASAMENTO']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
                                                        <?php echo $_smarty_tpl->tpl_vars['value']->value[1];?>
/<?php echo $_smarty_tpl->tpl_vars['value']->value[0];?>

                                                    <?php } ?>
                                                </td>
                                                <td class="center">
                                                    <?php if ($_smarty_tpl->tpl_vars['valorListaCasamento']->value['ATIVO']=='S'){?>
                                                        <span class="iconic-icon-check-alt"></span>
                                                    <?php }else{ ?>
                                                        <span class="iconic-icon-x-altx-alt"></span>
                                                    <?php }?>
                                                </td>
                                                <td class="center">
                                                    <?php if ($_smarty_tpl->tpl_vars['valorListaCasamento']->value['SITUACAO']=='A'){?>
                                                        Aberto
                                                    <?php }elseif($_smarty_tpl->tpl_vars['valorListaCasamento']->value['SITUACAO']=='D'){?>
                                                        Despachado
                                                    <?php }else{ ?>
                                                        Fechado
                                                    <?php }?>
                                                </td>
                                                <td>
                                                    
                                                    <div class="controls center">
                                                        <a href="../emails/imprime-lista-casamento.php?idListaCasamento=<?php echo $_smarty_tpl->tpl_vars['valorListaCasamento']->value['ID_LISTA_CASAMENTO'];?>
" title="Imprimir" class="tip" target="_blank"><span class="icon12 icon-print"></span></a>
                                                        <a href="lista-casamento-cadastra?idListaCasamento=<?php echo $_smarty_tpl->tpl_vars['valorListaCasamento']->value['ID_LISTA_CASAMENTO'];?>
" title="Editar" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                                    </div>
                                                </td>
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
                                </div>

                            </div><!-- End .box -->

                        </div><!-- End .span12 -->

                    </div><!-- End .row-fluid -->
               
                
                
                

               
    			<!-- Page end here -->
    				
               
            </div><!-- End contentwrapper -->
        </div><!-- End #content -->
    
    </div><!-- End #wrapper -->

   <?php }} ?>