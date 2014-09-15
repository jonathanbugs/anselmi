<?php /* Smarty version Smarty-3.1.10, created on 2014-07-15 21:49:06
         compiled from "templates/cadastra_banner.tpl" */ ?>
<?php /*%%SmartyHeaderCode:81494391853c585b2b30df4-00919329%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '930f1c650a77155297a40b0f42542db04f9f3a20' => 
    array (
      0 => 'templates/cadastra_banner.tpl',
      1 => 1405452534,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '81494391853c585b2b30df4-00919329',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ACTIONS_DIR' => 0,
    'idBanner' => 0,
    'legenda' => 0,
    'link' => 0,
    'dataInicial' => 0,
    'dataFinal' => 0,
    'ativo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_53c585b2b62855_56031314',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53c585b2b62855_56031314')) {function content_53c585b2b62855_56031314($_smarty_tpl) {?><div id="wrapper">

    <?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


    <!--Body content-->
    <div id="content" class="clearfix">
        <div class="contentwrapper"><!--Content wrapper-->

            <?php echo $_smarty_tpl->getSubTemplate ("heading.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <div id="teste"></div>
            <!-- Build page from here: Usual with <div class="row-fluid"></div> -->
            <form class="form-horizontal" id="cadastraBanner" action="<?php echo $_smarty_tpl->tpl_vars['ACTIONS_DIR']->value;?>
banner.php" method="post"/>
                <div class="row-fluid">

                    <div class="span12">

                        <div class="box">

                            <div class="title">

                                <h4>
                                    <span class="icon16 brocco-icon-grid"></span>
                                    <span>Cadastra Banner</span>
                                </h4>
                                
                            </div>
                            <div class="content">

                                    <?php if ($_smarty_tpl->tpl_vars['idBanner']->value){?>
                                        <input type="hidden" name="acao" value="cadastraBanner">
                                    <?php }else{ ?>
                                        <input type="hidden" name="acao" value="editarBanner">
                                    <?php }?>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Legenda</label>
                                                <input class="span8" id="legenda" type="text" name="legenda" value="<?php echo $_smarty_tpl->tpl_vars['legenda']->value;?>
" required="required"/>
                                            </div>
                                        </div>
                                    </div>                       
                               
                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Imagem</label>
                                                <input class="span8" id="imagem" type="file" name="imagem"  />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Link</label>
                                                <input value="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
" class="span8" id="link" type="text" name="link" />
                                            </div>
                                        </div>
                                    </div>  

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Data Inicial</label>
                                                <input value="<?php echo $_smarty_tpl->tpl_vars['dataInicial']->value;?>
" class="span4 mask-date" id="dataInicial" type="text" name="dataInicial" required="required" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Data Final</label>
                                                <input value="<?php echo $_smarty_tpl->tpl_vars['dataFinal']->value;?>
" class="span4 mask-date" id="dataFinal" type="text" name="dataFinal" required="required" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Ativo</label>
                                                <?php if ($_smarty_tpl->tpl_vars['ativo']->value=='S'||!$_smarty_tpl->tpl_vars['ativo']->value){?>
                                                <input id="ativo" type="checkbox" name="ativo" checked="checked" />
                                                <?php }else{ ?>
                                                <input id="ativo" type="checkbox" name="ativo" />
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-actions">
                                       <button type="submit" class="btn btn-info">Salvar</button>
                                       <!--<button type="button" class="btn">Cancelar</button>-->
                                    </div>
                                    <!--<div id="teste">123</div>  -->

                            </div>

                        </div><!-- End .box -->

                    </div>
                

                    
                </div>

                </form>

                
            <!-- Page end here -->
                
           
        </div><!-- End contentwrapper -->
    </div><!-- End #content -->

</div><!-- End #wrapper -->

   

<?php }} ?>