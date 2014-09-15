<?php /* Smarty version Smarty-3.1.10, created on 2013-10-07 09:49:45
         compiled from "templates\exportacao_pedido.tpl" */ ?>
<?php /*%%SmartyHeaderCode:256465252ade935c411-13618178%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22a4daded78c7c455e494867f9a55bafd5ddfccd' => 
    array (
      0 => 'templates\\exportacao_pedido.tpl',
      1 => 1377794349,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '256465252ade935c411-13618178',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ACTIONS_DIR' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_5252ade93782f9_91906095',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5252ade93782f9_91906095')) {function content_5252ade93782f9_91906095($_smarty_tpl) {?>    <div id="wrapper">

        <?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <?php echo $_smarty_tpl->getSubTemplate ("heading.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


                <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

                <form class="form-horizontal" id="exportaArquivo" action="<?php echo $_smarty_tpl->tpl_vars['ACTIONS_DIR']->value;?>
exportacao.php" method="post" />

                <input value="exportaArquivo" name="acao" type="hidden">
                
                <div class="form-row row-fluid">
                    <div class="span12">
                        <div class="row-fluid">
                            <label class="form-label span4" for="checkboxes">Tipo de Arquivo</label>
                            <div class="span8 controls">   
                                <select name="tipoArquivo">
                                    <option value="cliente">Cliente</option>
                                    <option value="pedido">Pedido</option>
                                </select>
                            </div> 
                        </div>
                    </div> 
                </div>
                
                
                    
                    <div class="form-actions">
                       <button type="submit" class="btn btn-info">Exportar</button>
                       <!--<button type="button" class="btn">Cancel</button>-->
                    </div>
                                                            

                </form> 

                <div id="retorno"></div>              
    			<!-- Page end here -->
    				
               
            </div><!-- End contentwrapper -->
        </div><!-- End #content -->
    
    </div><!-- End #wrapper -->

   <?php }} ?>