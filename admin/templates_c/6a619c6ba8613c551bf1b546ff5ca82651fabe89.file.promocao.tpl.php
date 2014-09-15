<?php /* Smarty version Smarty-3.1.10, created on 2014-08-05 15:07:22
         compiled from "templates/promocao.tpl" */ ?>
<?php /*%%SmartyHeaderCode:91233423553e0d70ad8d2e8-64824631%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a619c6ba8613c551bf1b546ff5ca82651fabe89' => 
    array (
      0 => 'templates/promocao.tpl',
      1 => 1377794350,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '91233423553e0d70ad8d2e8-64824631',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'promocao' => 0,
    'valorPromocao' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_53e0d70adcfbb1_58598254',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53e0d70adcfbb1_58598254')) {function content_53e0d70adcfbb1_58598254($_smarty_tpl) {?><div id="wrapper">

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
                                    <span>Promo&ccedil;&atilde;o</span>
                                    <form class="box-form right" action="">
                                        <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown">
                                            <span class="icon16 iconic-icon-cog"></span>
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="produto_promocao">
                                                    <span class="icon-pencil"></span> Novo
                                                </a>
                                            </li>
                                        </ul>
                                    </form>
                                </h4>
                                <a href="#" class="minimize">Minimize</a>
                            </div>
                            <div class="content noPad">
                                <table class="responsive table table-bordered" id="tabelaPromocao">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Descri&ccedil;&atilde;o</th>
                                        <th>Data Inicial Validade</th>
                                        <th>Data Final Validade</th>
                                        <th>Tipo</th>
                                        <th>Valor</th>
                                        <th>Ativo</th>
                                        <th>Frete Gr&aacute;tis</th>
                                        <th>Observa&ccedil;&otilde;es</th>
                                        <th>A&ccedil;&otilde;es</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                     
                                      
                                        <?php  $_smarty_tpl->tpl_vars['valorPromocao'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorPromocao']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['promocao']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorPromocao']->key => $_smarty_tpl->tpl_vars['valorPromocao']->value){
$_smarty_tpl->tpl_vars['valorPromocao']->_loop = true;
?>
                                          <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['valorPromocao']->value['ID_PROMOCAO'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['valorPromocao']->value['NOME_PROMOCAO'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['valorPromocao']->value['DATA_INICIAL'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['valorPromocao']->value['DATA_FINAL'];?>
</td>
                                            <td>
                                                <?php if ($_smarty_tpl->tpl_vars['valorPromocao']->value['TIPO_PROMOCAO']=='P'){?>
                                                    PERCENTUAL
                                                <?php }else{ ?>
                                                    VALOR
                                                <?php }?>
                                            </td>
                                            <td><?php echo number_format($_smarty_tpl->tpl_vars['valorPromocao']->value['VALOR'],2,",",".");?>
</td>
                                            <td>
                                                <?php if ($_smarty_tpl->tpl_vars['valorPromocao']->value['PROMOCAO_ATIVA']=='S'){?>
                                                    <input type="checkbox" checked="checked" value="S" id="ativaPromocao<?php echo $_smarty_tpl->tpl_vars['valorPromocao']->value['ID_PROMOCAO'];?>
">
                                                <?php }else{ ?>
                                                    <input type="checkbox" value="N" id="ativaPromocao<?php echo $_smarty_tpl->tpl_vars['valorPromocao']->value['ID_PROMOCAO'];?>
">
                                                <?php }?>
                                            </td>
                                            <td>
                                                <?php if ($_smarty_tpl->tpl_vars['valorPromocao']->value['FRETE_GRATIS']=='S'){?>
                                                    <input type="checkbox" checked="checked" value="S" id="freteGratis<?php echo $_smarty_tpl->tpl_vars['valorPromocao']->value['ID_PROMOCAO'];?>
">
                                                <?php }else{ ?>
                                                    <input type="checkbox" value="N" id="freteGratis<?php echo $_smarty_tpl->tpl_vars['valorPromocao']->value['ID_PROMOCAO'];?>
">
                                                <?php }?>
                                            </td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['valorPromocao']->value['OBS'];?>
</td>
                                            <td>
                                                <div class="controls center">
                                                    <a href="produto_promocao?idPromocao=<?php echo $_smarty_tpl->tpl_vars['valorPromocao']->value['ID_PROMOCAO'];?>
" title="Editar" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
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