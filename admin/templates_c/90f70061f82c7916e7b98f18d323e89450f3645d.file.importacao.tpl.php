<?php /* Smarty version Smarty-3.1.10, created on 2014-07-22 19:33:36
         compiled from "templates/importacao.tpl" */ ?>
<?php /*%%SmartyHeaderCode:88903147153cea070743e15-02552471%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90f70061f82c7916e7b98f18d323e89450f3645d' => 
    array (
      0 => 'templates/importacao.tpl',
      1 => 1380198338,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '88903147153cea070743e15-02552471',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ACTIONS_DIR' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_53cea070764712_77202859',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53cea070764712_77202859')) {function content_53cea070764712_77202859($_smarty_tpl) {?>    <div id="wrapper">

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
                            <label class="form-label span4" for="checkboxes">Tipo Arquivo</label>
                            <div class="span8 controls">   
                                <select name="tipoArquivo">
                                    <!-- <option value="cliente">Cliente</option> -->
                                    <option value="produto">Produto</option>
                                    <!--<option value="pedido">Pedido</option>-->
                                    <option value="preco">Pre&ccedil;o</option>
                                    <option value="imagem">Imagem Produto</option>
                                </select>
                            </div> 
                        </div>
                    </div> 
                </div>
                
                <div class="form-row row-fluid">
                        <div class="span12">
                            <div class="row-fluid">
                                <label class="form-label span4" for="textarea">Arquivo</label>
                                <input type="file" name="arquivo" id="arquivo" />
                            </div>
                        </div>  
                    </div>
                    
                    <div class="form-actions">
                       <button type="submit" class="btn btn-info">Importar</button>
                       <!--<button type="button" class="btn">Cancel</button>-->
                       <div id="loading" class="margin right">
                       		<img src="images/loaders/circular/017.gif" alt="" />
                       </div>
                    </div>
                                                            

                </form> 

                <div id="retorno"></div>              
    			<!-- Page end here -->
    				
               
            </div><!-- End contentwrapper -->
        </div><!-- End #content -->
    
    </div><!-- End #wrapper -->

   <?php }} ?>