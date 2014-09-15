<?php /* Smarty version Smarty-3.1.10, created on 2014-08-07 21:16:24
         compiled from "templates/pessoa_visualiza.tpl" */ ?>
<?php /*%%SmartyHeaderCode:153521922453e3d088190475-61675325%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8cce7be5b507dad3c7739c3fe1210d27701ab96' => 
    array (
      0 => 'templates/pessoa_visualiza.tpl',
      1 => 1407335201,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '153521922453e3d088190475-61675325',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'idPessoa' => 0,
    'visualizaDadosPessoa' => 0,
    'valorDadosPessoa' => 0,
    'ACTIONS_DIR' => 0,
    'categoriaPessoa' => 0,
    'valorCategoriaPessoa' => 0,
    'conceitoPessoa' => 0,
    'valorConceitoPessoa' => 0,
    'visualizaEnderecoPessoa' => 0,
    'valorEnderecoPessoa' => 0,
    'listaOcorrencia' => 0,
    'valueOcorrencia' => 0,
    'listaPedidoPessoa' => 0,
    'valorPedidoPessoa' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_53e3d08833a679_79739355',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53e3d08833a679_79739355')) {function content_53e3d08833a679_79739355($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_mascara_cpf_cnpj')) include '/Applications/XAMPP/xamppfiles/htdocs/www/lojas/anselmi/smarty/plugins/modifier.mascara_cpf_cnpj.php';
if (!is_callable('smarty_modifier_mascara_telefone')) include '/Applications/XAMPP/xamppfiles/htdocs/www/lojas/anselmi/smarty/plugins/modifier.mascara_telefone.php';
?>    <div id="wrapper">

        <?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <?php echo $_smarty_tpl->getSubTemplate ("heading.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


                <!-- Build page from here: Usual with <div class="row-fluid"></div> -->


                <!--cadastro de pessoa-->
                    <div class="row-fluid">

                        <div class="span6">

                            <div class="box">
                                <div class="title">
                                    <h4>
                                        <span>Dados Pessoa</span>
                                        <form class="box-form right" action="">
                                            <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown">
                                                <span class="icon16 iconic-icon-cog"></span>
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="javascript: iconeEditar('DadosPessoa');">
                                                        <span class="icon-pencil"></span> Editar
                                                    </a>
                                                </li>
                                                <!-- <li>
                                                    <a href="javascript: enviarNovaSenha(<?php echo $_smarty_tpl->tpl_vars['idPessoa']->value;?>
);">
                                                        <span class="icon-envelope"></span> Reenviar Senha
                                                    </a>
                                                </li> -->
                                            </ul>
                                        </form>
                                    </h4>
                                </div>
                                <div class="content">
                                    <dl class="dl-horizontal" id="dlVerDadosPessoa">
                                        <?php  $_smarty_tpl->tpl_vars['valorDadosPessoa'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorDadosPessoa']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['visualizaDadosPessoa']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorDadosPessoa']->key => $_smarty_tpl->tpl_vars['valorDadosPessoa']->value){
$_smarty_tpl->tpl_vars['valorDadosPessoa']->_loop = true;
?>
                                        <?php if ($_smarty_tpl->tpl_vars['valorDadosPessoa']->value['TIPO']=="F"){?>
                                            <dt>Categoria:</dt>
                                            <dd><?php echo $_smarty_tpl->tpl_vars['valorDadosPessoa']->value['DESCRICAO_TIPO_CATEGORIA'];?>
&nbsp;</dd>
                                            <dt>Nome:</dt>
                                            <dd><?php echo $_smarty_tpl->tpl_vars['valorDadosPessoa']->value['NOME'];?>
&nbsp;</dd>
                                            <dt>Sobrenome:</dt>
                                            <dd><?php echo $_smarty_tpl->tpl_vars['valorDadosPessoa']->value['SOBRENOME'];?>
&nbsp;</dd>
                                            <dt>Apelido:</dt>
                                            <dd><?php echo $_smarty_tpl->tpl_vars['valorDadosPessoa']->value['APELIDO'];?>
&nbsp;</dd>
                                            <dt>CPF:</dt>
                                            <dd><?php echo smarty_modifier_mascara_cpf_cnpj($_smarty_tpl->tpl_vars['valorDadosPessoa']->value['CPF']);?>
&nbsp;</dd>
                                            <dt>RG:</dt>
                                            <dd><?php echo $_smarty_tpl->tpl_vars['valorDadosPessoa']->value['RG'];?>
&nbsp;</dd>
                                            <dt>Data Nascimento:</dt>
                                            <dd><?php echo $_smarty_tpl->tpl_vars['valorDadosPessoa']->value['DATA_NASCIMENTO'];?>
&nbsp;</dd>
                                            
                                            <?php if ($_smarty_tpl->tpl_vars['valorDadosPessoa']->value['SEXO']=="F"){?>
                                                <dt>Sexo:</dt>
                                                <dd>Feminino&nbsp;</dd>
                                            <?php }elseif($_smarty_tpl->tpl_vars['valorDadosPessoa']->value['SEXO']=="M"){?>
                                                <dt>Sexo:</dt>
                                                <dd>Masculino&nbsp;</dd>
                                            <?php }else{ ?>
                                                <dt></dt>
                                                <dd></dd>
                                            <?php }?>
                                            
                                            <dt>Tipo Pessoa:</dt>
                                            <dd>F&iacute;sica&nbsp;</dd>
                                            <dt>IP:</dt>
                                            <dd><?php echo $_smarty_tpl->tpl_vars['valorDadosPessoa']->value['IP'];?>
&nbsp;</dd>
                                            <dt>Conceito:</dt>
                                            <dd><?php echo $_smarty_tpl->tpl_vars['valorDadosPessoa']->value['CONCEITO'];?>
&nbsp;</dd>
                                            <dt>E-mail:</dt>
                                            <dd><?php echo $_smarty_tpl->tpl_vars['valorDadosPessoa']->value['EMAIL'];?>
&nbsp;</dd>
                                            <dt>Telefone:</dt>
                                            <dd><?php echo smarty_modifier_mascara_telefone($_smarty_tpl->tpl_vars['valorDadosPessoa']->value['TELEFONE']);?>
&nbsp;</dd>
                                            <dt>Celular:</dt>
                                            <dd><?php echo smarty_modifier_mascara_telefone($_smarty_tpl->tpl_vars['valorDadosPessoa']->value['CELULAR']);?>
&nbsp;</dd>
                                        <?php }else{ ?>
                                            <dt>Raz&atilde;o Social:</dt>
                                            <dd><?php echo $_smarty_tpl->tpl_vars['valorDadosPessoa']->value['NOME'];?>
&nbsp;</dd>
                                            <dt>Nome Fantasia:</dt>
                                            <dd><?php echo $_smarty_tpl->tpl_vars['valorDadosPessoa']->value['NOME_FANTASIA'];?>
&nbsp;</dd>
                                            <dt>CNPJ:</dt>
                                            <dd><?php echo smarty_modifier_mascara_cpf_cnpj($_smarty_tpl->tpl_vars['valorDadosPessoa']->value['CNPJ']);?>
&nbsp;</dd>
                                            <dt>Tipo Pessoa:</dt>
                                            <dd>Jur&iacute;dica&nbsp;</dd>
                                            <dt>IE:</dt>
                                            <dd><?php echo $_smarty_tpl->tpl_vars['valorDadosPessoa']->value['IE'];?>
&nbsp;</dd>
                                            <dt>IP:</dt>
                                            <dd><?php echo $_smarty_tpl->tpl_vars['valorDadosPessoa']->value['IP'];?>
&nbsp;</dd>
                                            <dt>Nome Contato:</dt>
                                            <dd><?php echo $_smarty_tpl->tpl_vars['valorDadosPessoa']->value['NOME_CONTATO'];?>
&nbsp;</dd>
                                            <dt>Conceito:</dt>
                                            <dd><?php echo $_smarty_tpl->tpl_vars['valorDadosPessoa']->value['CONCEITO'];?>
&nbsp;</dd>
                                            <dt>E-mail:</dt>
                                            <dd><?php echo $_smarty_tpl->tpl_vars['valorDadosPessoa']->value['EMAIL'];?>
&nbsp;</dd>
                                            <dt>Telefone:</dt>
                                            <dd><?php echo smarty_modifier_mascara_telefone($_smarty_tpl->tpl_vars['valorDadosPessoa']->value['TELEFONE']);?>
&nbsp;</dd>
                                            <dt>Celular:</dt>
                                            <dd><?php echo smarty_modifier_mascara_telefone($_smarty_tpl->tpl_vars['valorDadosPessoa']->value['CELULAR']);?>
&nbsp;</dd>
                                        <?php }?>
                                        
                                        <?php } ?>
                                    </dl>
                                    <dl class="dl-horizontal" id="dlEditaDadosPessoa">
                                        <?php  $_smarty_tpl->tpl_vars['valorDadosPessoa'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorDadosPessoa']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['visualizaDadosPessoa']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorDadosPessoa']->key => $_smarty_tpl->tpl_vars['valorDadosPessoa']->value){
$_smarty_tpl->tpl_vars['valorDadosPessoa']->_loop = true;
?>
                                            <form class="form-horizontal" id="editaPessoa" action="<?php echo $_smarty_tpl->tpl_vars['ACTIONS_DIR']->value;?>
pessoa.php" method="post"/>
                                        
                                                <input type="hidden" name="acao" value="editarPessoa">
                                                
                                                <div class="form-row row-fluid">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="required">ID Pessoa</label>
                                                            <input class="span2" id="idPessoa" type="text" name="idPessoa" value="<?php echo $_smarty_tpl->tpl_vars['valorDadosPessoa']->value['ID_PESSOA'];?>
" readonly />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">Tipo Pessoa</label>
                                                            <div class="left marginT5 marginR10">
                                                                <?php if ($_smarty_tpl->tpl_vars['valorDadosPessoa']->value['TIPO']=="F"){?>
                                                                    <input type="radio" name="tipoPessoa" id="tipoPessoaF" value="F" checked="checked" />
                                                                    F&iacute;sica
                                                                <?php }else{ ?>
                                                                    <input type="radio" name="tipoPessoa" id="tipoPessoaJ" value="J" checked="checked" />
                                                                    Jur&iacute;dica
                                                                <?php }?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-row row-fluid">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">Categoria</label>
                                                            <div class="span4 controls">
                                                                <select id="categoriaPessoa" name="categoriaPessoa">
                                                                    <?php  $_smarty_tpl->tpl_vars['valorCategoriaPessoa'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorCategoriaPessoa']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categoriaPessoa']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorCategoriaPessoa']->key => $_smarty_tpl->tpl_vars['valorCategoriaPessoa']->value){
$_smarty_tpl->tpl_vars['valorCategoriaPessoa']->_loop = true;
?>
                                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['valorCategoriaPessoa']->value['ID_PESSOA_TIPO_CATEGORIA'];?>
" <?php if ($_smarty_tpl->tpl_vars['valorDadosPessoa']->value['ID_PESSOA_TIPO_CATEGORIA']==$_smarty_tpl->tpl_vars['valorCategoriaPessoa']->value['ID_PESSOA_TIPO_CATEGORIA']){?> selected="selected" <?php }else{ ?> <?php }?> ><?php echo $_smarty_tpl->tpl_vars['valorCategoriaPessoa']->value['DESCRICAO_TIPO_CATEGORIA'];?>
</option>
                                                                    <?php } ?>    
                                                                </select>
                                                         </div>
                                                        </div>
                                                    </div>
                                                </div>                                                

                                                <div class="form-row row-fluid">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">Conceito</label>
                                                            <div class="span4 controls">
                                                                <select id="conceitoPessoa" name="conceitoPessoa">
                                                                    <?php  $_smarty_tpl->tpl_vars['valorConceitoPessoa'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorConceitoPessoa']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['conceitoPessoa']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorConceitoPessoa']->key => $_smarty_tpl->tpl_vars['valorConceitoPessoa']->value){
$_smarty_tpl->tpl_vars['valorConceitoPessoa']->_loop = true;
?>
                                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['valorConceitoPessoa']->value['ID_PESSOA_CONCEITO'];?>
" <?php if ($_smarty_tpl->tpl_vars['valorDadosPessoa']->value['PECO_ID_PESSOA_CONCEITO']==$_smarty_tpl->tpl_vars['valorConceitoPessoa']->value['ID_PESSOA_CONCEITO']){?> selected="selected" <?php }else{ ?> <?php }?> ><?php echo $_smarty_tpl->tpl_vars['valorConceitoPessoa']->value['DESCRICAO'];?>
</option>
                                                                    <?php } ?>    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid divPessoaJuridica">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="required">Raz&atilde;o Social</label>
                                                            <input class="span8" id="razaoSocialPessoa" type="text" name="razaoSocialPessoa" value="<?php echo $_smarty_tpl->tpl_vars['valorDadosPessoa']->value['NOME'];?>
" required="required" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid divPessoaJuridica">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="required">Nome Fantasia</label>
                                                            <input class="span8" id="nomeFantasiaPessoa" type="text" name="nomeFantasiaPessoa" value="<?php echo $_smarty_tpl->tpl_vars['valorDadosPessoa']->value['NOME_FANTASIA'];?>
" required="required" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid divPessoaJuridica">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">CNPJ</label>
                                                            <input class="span8" id="mask-cnpj" type="text" name="cnpjPessoa" value="<?php echo $_smarty_tpl->tpl_vars['valorDadosPessoa']->value['CNPJ'];?>
" required="required"/>
                                                            <span class="help-block blue span8">99.999.999/9999-99</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid divPessoaJuridica">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">IE</label>
                                                            <input class="span8" id="iePessoa" type="text" name="iePessoa" value="<?php echo $_smarty_tpl->tpl_vars['valorDadosPessoa']->value['IE'];?>
" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid divPessoaJuridica">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="required">Nome Contato</label>
                                                            <input class="span8" id="nomeContatoPessoa" type="text" name="nomeContatoPessoa" value="<?php echo $_smarty_tpl->tpl_vars['valorDadosPessoa']->value['NOME_CONTATO'];?>
" required="required" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid divPessoaFisica">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="required">Nome</label>
                                                            <input class="span8" id="nomePessoa" type="text" name="nomePessoa" value="<?php echo $_smarty_tpl->tpl_vars['valorDadosPessoa']->value['NOME'];?>
" required="required" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid divPessoaFisica">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">Sobrenome</label>
                                                            <input class="span8" id="sobrenomePessoa" type="text" name="sobrenomePessoa" value="<?php echo $_smarty_tpl->tpl_vars['valorDadosPessoa']->value['SOBRENOME'];?>
" required="required" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid divPessoaFisica">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">Apelido</label>
                                                            <input class="span8" id="apelidoPessoa" type="text" name="apelidoPessoa" value="<?php echo $_smarty_tpl->tpl_vars['valorDadosPessoa']->value['APELIDO'];?>
" required="required" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid divPessoaFisica">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">CPF</label>
                                                            <input class="span8" id="mask-cpf" type="text" name="cpfPessoa" value="<?php echo $_smarty_tpl->tpl_vars['valorDadosPessoa']->value['CPF'];?>
" required="required"/>
                                                            <span class="help-block blue span8">999.999.999-99</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid divPessoaFisica">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">RG</label>
                                                            <input class="span8" id="rgPessoa" type="text" value="<?php echo $_smarty_tpl->tpl_vars['valorDadosPessoa']->value['RG'];?>
" name="rgPessoa" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid divPessoaFisica">
                                                    <div>
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">Sexo</label>
                                                            <select id="sexoPessoa" name="sexoPessoa">
                                                                <?php if ($_smarty_tpl->tpl_vars['valorDadosPessoa']->value['SEXO']=="F"){?>
                                                                    <option value="F" selected="selected">FEMININO</option>
                                                                    <option value="M">MASCULINO</option>
                                                                <?php }else{ ?>
                                                                    <option value="F">FEMININO</option>
                                                                    <option value="M" selected="selected">MASCULINO</option>
                                                                <?php }?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid divPessoaFisica">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">Data Nascimento</label>
                                                            <input class="span8 mask" id="mask-date" type="text" name="nascimentoPessoa" value="<?php echo $_smarty_tpl->tpl_vars['valorDadosPessoa']->value['DATA_NASCIMENTO'];?>
" required="required"/>
                                                            <span class="help-block blue span8">99/99/9999</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-row row-fluid">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="required">E-mail</label>
                                                            <input class="span8" id="emailPessoa" name="emailPessoa" type="text" value="<?php echo $_smarty_tpl->tpl_vars['valorDadosPessoa']->value['EMAIL'];?>
" required="required"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                 <div class="form-row row-fluid">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="required">Senha</label>
                                                            <input class="span8" id="senhaPessoa" name="senhaPessoa" type="text" value=""/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <hr />

                                                <div class="form-row row-fluid">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">Telefone Fixo</label>
                                                            <input class="span5" id="telefoneFixoContatoPessoa" type="text" name="telefoneFixoContatoPessoa" value="<?php echo $_smarty_tpl->tpl_vars['valorDadosPessoa']->value['TELEFONE'];?>
" required="required" maxlength="12"; />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">Telefone Celular</label>
                                                            <input class="span5" id="telefoneCelularContatoPessoa" type="text" name="telefoneCelularContatoPessoa" value="<?php echo $_smarty_tpl->tpl_vars['valorDadosPessoa']->value['CELULAR'];?>
" maxlength="9";/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-actions">
                                                   <button type="submit" class="btn btn-info">Salvar</button>
                                                   <button type="button" class="btn btn-danger" onclick="javascript: btnCancelaEditar('DadosPessoa');">Cancelar</button>
                                                </div>
                                                                                                                                        
                                            </form>
                                            
                                        <?php } ?>

                                    </dl>
                                </div>
                            </div>

                        </div><!-- End .span4 -->
<!-- <div id="teste">123</div> -->
                        <div class="span6">

                            <div class="box">
                                <div class="title">
                                    <h4>
                                        <span>Endere&ccedil;o Pessoa</span>
                                        <form class="box-form right" action="">
                                            <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown">
                                                <span class="icon16 iconic-icon-cog"></span>
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <?php  $_smarty_tpl->tpl_vars['valorEnderecoPessoa'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['visualizaEnderecoPessoa']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->key => $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value){
$_smarty_tpl->tpl_vars['valorEnderecoPessoa']->_loop = true;
?>
                                                <li>
                                                    <a href="javascript: iconeEditarEndereco(<?php echo $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value['ID_PESSOA_ENDERECO'];?>
);">
                                                        <span class="icon-pencil"></span> <?php echo $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value['APELIDO_ENDERECO'];?>

                                                    </a>
                                                </li>
                                                <?php } ?>
                                                <li>
                                                    <a href="javascript: iconeNovoEndereco();">
                                                        <span class="icon-file"></span> Novo Endere&ccedil;o
                                                    </a>
                                                </li>
                                            </ul>
                                        </form>
                                    </h4>
                                </div>
                                <div class="content">
                                    <dl class="dl-horizontal" id="divEndereco">
                                        <dt>Endere&ccedil;o:</dt>
                                        <?php  $_smarty_tpl->tpl_vars['valorEnderecoPessoa'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['visualizaEnderecoPessoa']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->key => $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value){
$_smarty_tpl->tpl_vars['valorEnderecoPessoa']->_loop = true;
?>
                                            <dd>
                                                <p><strong><?php echo $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value['APELIDO_ENDERECO'];?>
</strong></p>
                                                <?php echo $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value['ENDERECO'];?>
, 
                                                <?php echo $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value['NUMERO'];?>

                                                <?php if ($_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value['COMPLEMENTO']==''){?>
                                                    <br />
                                                <?php }else{ ?>
                                                    - <?php echo $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value['COMPLEMENTO'];?>
<br />
                                                <?php }?>
                                                Bairro: <?php echo $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value['BAIRRO'];?>
<br />
                                                <?php echo $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value['MUNICIPIO'];?>
, <?php echo $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value['UF'];?>
<br />
                                                <?php echo $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value['CEP'];?>
<br />
                                                <?php echo $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value['REFERENCIA'];?>

                                            </dd>
                                            <input type="hidden" name="peEnIdPessoa<?php echo $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value['ID_PESSOA_ENDERECO'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value['PESS_ID_PESSOA'];?>
"/>
                                            <input type="hidden" name="apelidoEndereco<?php echo $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value['ID_PESSOA_ENDERECO'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value['APELIDO_ENDERECO'];?>
"/>
                                            <input type="hidden" name="endereco<?php echo $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value['ID_PESSOA_ENDERECO'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value['ENDERECO'];?>
"/>
                                            <input type="hidden" name="numero<?php echo $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value['ID_PESSOA_ENDERECO'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value['NUMERO'];?>
"/>
                                            <input type="hidden" name="complemento<?php echo $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value['ID_PESSOA_ENDERECO'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value['COMPLEMENTO'];?>
"/>
                                            <input type="hidden" name="bairro<?php echo $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value['ID_PESSOA_ENDERECO'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value['BAIRRO'];?>
"/>
                                            <input type="hidden" name="nomeMunicipio<?php echo $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value['ID_PESSOA_ENDERECO'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value['MUNICIPIO'];?>
"/>
                                            <input type="hidden" name="estado<?php echo $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value['ID_PESSOA_ENDERECO'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value['UF'];?>
"/>
                                            <input type="hidden" name="pais<?php echo $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value['ID_PESSOA_ENDERECO'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value['PAIS'];?>
"/>
                                            <input type="hidden" name="cep<?php echo $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value['ID_PESSOA_ENDERECO'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value['CEP'];?>
"/>
                                            <input type="hidden" name="referencia<?php echo $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value['ID_PESSOA_ENDERECO'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['valorEnderecoPessoa']->value['REFERENCIA'];?>
"/>
                                            <hr />
                                        <?php } ?>
                                    </dl>

                                    <div id="formEditaEndereco">
                                        <form class="form-horizontal" id="editaPessoaEndereco" action="<?php echo $_smarty_tpl->tpl_vars['ACTIONS_DIR']->value;?>
pessoa.php" method="post"/>

                                        <input type="hidden" name="acao" value="editarEnderecoPessoa">
                                        
                                            <div class="form-row row-fluid divPessoaJuridica">
                                                <div class="span12">
                                                    <font color="red">IMPORTANTE! MERCADORIAS VENDIDAS PARA PESSOAS JUR&Iacute;DICAS, SOMENTE PODER&Atilde;O SER ENTREGUES NO ENDERE&Ccedil;O QUE CONSTA NO CNPJ</font>
                                                </div>
                                            </div>

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">ID Pessoa</label>
                                                        <input class="span2" id="peEnIdPessoa" type="text" name="peEnIdPessoa" required="required" readonly="readonly"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">ID Endere&ccedil;o</label>
                                                        <input class="span2" id="idEnderecoPessoa" type="text" name="idEnderecoPessoa" required="required" readonly="readonly"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">CEP</label>
                                                        <input class="span5" id="cepEnderecoPessoa" type="text" name="cepEnderecoPessoa" required="required"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--<div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="required">Tipo Logradouro</label>
                                                        <input class="span3" id="tipoLogradouroEnderecoPessoa" type="text" name="tipoLogradouroEnderecoPessoa" required="required" placeholder="Rua, Avenida ..."/>
                                                    </div>
                                                </div>
                                            </div>-->

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="required">Endere&ccedil;o</label>
                                                        <input class="span6" id="ruaEnderecoPessoa" type="text" name="ruaEnderecoPessoa" required="required"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">N&uacute;mero</label>
                                                        <input class="span3" id="numeroEnderecoPessoa" type="text" name="numeroEnderecoPessoa" required="required"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">Complemento</label>
                                                        <input class="span8" id="complementoEnderecoPessoa" type="text" name="complementoEnderecoPessoa" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">Bairro</label>
                                                        <input class="span8" id="bairroEnderecoPessoa" type="text" name="bairroEnderecoPessoa" required="required"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">Cidade</label>
                                                        <input class="span1" id="idMunicipioEnderecoPessoa" type="hidden" name="idMunicipioEnderecoPessoa" required="required"/>
                                                        <input class="span8" id="municipioEnderecoPessoa" type="text" name="municipioEnderecoPessoa" required="required" readonly="readonly"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">Estado</label>
                                                        <input class="span2" id="estadoEnderecoPessoa" type="text" name="estadoEnderecoPessoa" required="required" readonly="readonly"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">Pa&iacute;s</label>
                                                        <input class="span5" id="paisEnderecoPessoa" type="text" name="paisEnderecoPessoa" required="required" readonly="readonly"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">Refer&ecirc;ncia</label>
                                                        <input class="span8" id="referenciaEnderecoPessoa" type="text" name="referenciaEnderecoPessoa" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">Apelido do Endere&ccedil;o</label>
                                                        <input class="span8" id="apelidoEnderecoPessoa" type="text" name="apelidoEnderecoPessoa" required="required" maxlength="20"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-actions">
                                               <button type="submit" class="btn btn-info">Salvar</button>
                                               <button type="button" class="btn btn-danger" onclick="javascript: btnCancelaEditar('EnderecoPessoa');">Cancelar</button>
                                            </div>

                                        </form>
                                        

                                    </div>

                                    <div id="formNovoEndereco">
                                        <form class="form-horizontal" id="cadastraPessoaEndereco" action="<?php echo $_smarty_tpl->tpl_vars['ACTIONS_DIR']->value;?>
pessoa.php" method="post"/>

                                        <input type="hidden" name="acao" value="cadastrarPessoaEndereco">
                                        
                                            <div class="form-row row-fluid divPessoaJuridica">
                                                <div class="span12">
                                                    <font color="red">IMPORTANTE! MERCADORIAS VENDIDAS PARA PESSOAS JUR&Iacute;DICAS, SOMENTE PODER&Atilde;O SER ENTREGUES NO ENDERE&Ccedil;O QUE CONSTA NO CNPJ</font>
                                                </div>
                                            </div>

                                            <input class="span2" id="peEnIdPessoa" type="hidden" name="peEnIdPessoa" value="<?php echo $_smarty_tpl->tpl_vars['valorDadosPessoa']->value['ID_PESSOA'];?>
"/>

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">CEP</label>
                                                        <input class="span5" id="cepEnderecoPessoa" type="text" name="cepEnderecoPessoa" required="required"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--<div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="required">Tipo Logradouro</label>
                                                        <input class="span3" id="tipoLogradouroEnderecoPessoa" type="text" name="tipoLogradouroEnderecoPessoa" required="required" placeholder="Rua, Avenida ..."/>
                                                    </div>
                                                </div>
                                            </div>-->

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="required">Endere&ccedil;o</label>
                                                        <input class="span6" id="ruaEnderecoPessoa" type="text" name="ruaEnderecoPessoa" required="required"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">N&uacute;mero</label>
                                                        <input class="span3" id="numeroEnderecoPessoa" type="text" name="numeroEnderecoPessoa" required="required"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">Complemento</label>
                                                        <input class="span8" id="complementoEnderecoPessoa" type="text" name="complementoEnderecoPessoa" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">Bairro</label>
                                                        <input class="span8" id="bairroEnderecoPessoa" type="text" name="bairroEnderecoPessoa" required="required"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">Cidade</label>
                                                        <input class="span1" id="idMunicipioEnderecoPessoa" type="hidden" name="idMunicipioEnderecoPessoa" required="required"/>
                                                        <input class="span8" id="municipioEnderecoPessoa" type="text" name="municipioEnderecoPessoa" required="required" readonly="readonly"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">Estado</label>
                                                        <input class="span2" id="estadoEnderecoPessoa" type="text" name="estadoEnderecoPessoa" required="required" readonly="readonly"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">Pa&iacute;s</label>
                                                        <input class="span5" id="paisEnderecoPessoa" type="text" name="paisEnderecoPessoa" required="required" readonly="readonly"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">Refer&ecirc;ncia</label>
                                                        <input class="span8" id="referenciaEnderecoPessoa" type="text" name="referenciaEnderecoPessoa" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                        <label class="form-label span4" for="normal">Apelido do Endere&ccedil;o</label>
                                                        <input class="span8" id="apelidoEnderecoPessoa" type="text" name="apelidoEnderecoPessoa" required="required" maxlength="20"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-actions">
                                               <button type="submit" class="btn btn-info">Salvar</button>
                                               <button type="button" class="btn btn-danger" onclick="javascript: btnCancelaEditar('EnderecoPessoa');">Cancelar</button>
                                            </div>

                                        </form>
                                        

                                    </div>

                                </div>
                            </div>

                        </div><!-- End .span4 -->

                    </div><!-- End .row-fluid -->


                    <div class="row-fluid">

                        <div class="span12">

                            <div class="box">

                                <div class="title">

                                    <h4>
                                        <span>Ocorr&ecirc;ncias</span>
                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                <div class="content">
                                    <form class="form-horizontal" method="post" id="formCadastraOcorrencia" action="<?php echo $_smarty_tpl->tpl_vars['ACTIONS_DIR']->value;?>
pessoa.php" />

                                    <input type="hidden" value="cadastraOcorrenciaPessoa" name="acao">
                                    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['idPessoa']->value;?>
" name="idPessoa">

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <textarea class="span12 limit" id="ocorrenciaPessoa" name="ocorrenciaPessoa" rows="3"></textarea>
                                                    <div class="form-actions">
                                                       <button type="submit" class="btn btn-info">Salvar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>


                                    </form>
                                    <div id="historicoOcorrenciaPessoa">
                                        <dl class="dl-horizontal">
                                        <?php  $_smarty_tpl->tpl_vars['valueOcorrencia'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valueOcorrencia']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaOcorrencia']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valueOcorrencia']->key => $_smarty_tpl->tpl_vars['valueOcorrencia']->value){
$_smarty_tpl->tpl_vars['valueOcorrencia']->_loop = true;
?>
                                            <dt>
                                                <?php echo $_smarty_tpl->tpl_vars['valueOcorrencia']->value['DATA'];?>

                                            </dt>
                                            <dd>
                                                <?php if ($_smarty_tpl->tpl_vars['valueOcorrencia']->value['PEDI_ID_PEDIDO']){?>
                                                    <strong>Pedido <?php echo $_smarty_tpl->tpl_vars['valueOcorrencia']->value['PEDI_ID_PEDIDO'];?>
: </strong>
                                                <?php }?>
                                                <?php echo $_smarty_tpl->tpl_vars['valueOcorrencia']->value['DESCRICAO'];?>
&nbsp;</dd>
                                        <?php } ?>
                                    </dl>
                                    </div>
                                </div>

                            </div><!-- End .box -->

                        </div><!-- End .span6 -->   

                    </div>

                    
                    <div class="row-fluid">

                        <div class="span12">

                            <div class="box">

                                <div class="title">

                                    <h4>
                                        <span>Pedidos Pessoa</span>
                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                <div class="content noPad">
                                    <table class="responsive table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Pedido</th>
                                            <th>Data Emiss&atilde;o</th>
                                            <th>Estimativa de Entrega</th>
                                            <th>Frete</th>
                                            <th>Valor Pedido</th>
                                            <th>Forma de Pagamento</th>
                                            <th>Situa&ccedil;&atilde;o do Pedido</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php  $_smarty_tpl->tpl_vars['valorPedidoPessoa'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorPedidoPessoa']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaPedidoPessoa']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorPedidoPessoa']->key => $_smarty_tpl->tpl_vars['valorPedidoPessoa']->value){
$_smarty_tpl->tpl_vars['valorPedidoPessoa']->_loop = true;
?>
                                          <tr class="trPedidoPessoa" id="<?php echo $_smarty_tpl->tpl_vars['valorPedidoPessoa']->value['ID_PEDIDO'];?>
">
                                            <td><?php echo $_smarty_tpl->tpl_vars['valorPedidoPessoa']->value['NUMERO_PEDIDO'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['valorPedidoPessoa']->value['DATA_EMISSAO'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['valorPedidoPessoa']->value['PRAZO_ENTREGA_DIAS'];?>
 Dias (<?php echo $_smarty_tpl->tpl_vars['valorPedidoPessoa']->value['ETA'];?>
)</td>
                                            <td><?php echo number_format($_smarty_tpl->tpl_vars['valorPedidoPessoa']->value['VALOR_FRETE'],2,",",".");?>
 - <?php echo $_smarty_tpl->tpl_vars['valorPedidoPessoa']->value['DESCRICAO_FRETE'];?>
</td>
                                            <td><?php echo number_format($_smarty_tpl->tpl_vars['valorPedidoPessoa']->value['VALOR_TOTAL_PAGAMENTO'],2,",",".");?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['valorPedidoPessoa']->value['NUMERO_PARCELAS'];?>
x <?php echo $_smarty_tpl->tpl_vars['valorPedidoPessoa']->value['DESCRICAO_FORMA_PAGAMENTO'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['valorPedidoPessoa']->value['DESCRICAO_PEDIDO_ITEM_SITUACAO'];?>
</td>
                                          </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div><!-- End .box -->

                        </div><!-- End .span4 -->

                        

                    </div><!-- End .row-fluid -->

               
    			<!-- Page end here -->
    				
               
            </div><!-- End contentwrapper -->
        </div><!-- End #content -->
    
    </div><!-- End #wrapper -->

   <?php }} ?>