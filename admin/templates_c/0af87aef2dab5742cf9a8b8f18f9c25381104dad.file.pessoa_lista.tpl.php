<?php /* Smarty version Smarty-3.1.10, created on 2014-06-10 14:42:08
         compiled from "templates\pessoa_lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3162853974370aa1722-13016386%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0af87aef2dab5742cf9a8b8f18f9c25381104dad' => 
    array (
      0 => 'templates\\pessoa_lista.tpl',
      1 => 1377794349,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3162853974370aa1722-13016386',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_53974370aeee35_60255487',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53974370aeee35_60255487')) {function content_53974370aeee35_60255487($_smarty_tpl) {?>    <div id="wrapper">

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
                                        <span>Lista Pessoa</span>
                                        <form class="box-form right" action="">
                                            <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown">
                                                <span class="icon16 iconic-icon-cog"></span>
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="pessoa-cadastra">
                                                        <span class="icon-pencil"></span> Novo
                                                    </a>
                                                </li>
                                            </ul>
                                        </form>
                                    </h4>
                                </div>
                                <div class="content noPad clearfix" id="tabelaListaPessoa">
                                    <table cellpadding="0" cellspacing="0" border="0" class="responsive display table table-bordered" width="100%" id="tableListaPessoa">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nome Pessoa</th>
                                                <th>Anivers&aacute;rio</th>
                                                <th>CPF/CNPJ</th>
                                                <th>E-mail</th>
                                                <th>Tipo</th>
                                                <th>Categoria</th>
                                                <th>News</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr></tr>
                                        </tbody>
                                        
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