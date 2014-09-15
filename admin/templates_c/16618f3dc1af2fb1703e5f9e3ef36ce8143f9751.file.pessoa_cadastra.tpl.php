<?php /* Smarty version Smarty-3.1.10, created on 2014-06-10 16:19:02
         compiled from "templates\pessoa_cadastra.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2378553975a26c55877-77524076%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '16618f3dc1af2fb1703e5f9e3ef36ce8143f9751' => 
    array (
      0 => 'templates\\pessoa_cadastra.tpl',
      1 => 1402426180,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2378553975a26c55877-77524076',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ACTIONS_DIR' => 0,
    'pessoaSituacao' => 0,
    'valorPessoaSituacao' => 0,
    'pessoaTipoCategoria' => 0,
    'valorPessoaCategoria' => 0,
    'pessoaConceito' => 0,
    'valorPessoaConceito' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_53975a26cea4f8_76620771',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53975a26cea4f8_76620771')) {function content_53975a26cea4f8_76620771($_smarty_tpl) {?>    <div id="wrapper">

        <?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <?php echo $_smarty_tpl->getSubTemplate ("heading.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


                <!-- Build page from here: Usual with <div class="row-fluid"></div> -->


                <!--cadastro de pessoa-->
                    <div class="row-fluid">

                        <div class="span12">

                            <div class="box">

                                <div class="title">

                                    <h4>
                                        <span class="icon16 brocco-icon-grid"></span>
                                        <span>Cadastro de Pessoa</span>
                                    </h4>
                                    
                                </div>
                                <div class="content">
                                   
                                    <form class="form-horizontal" id="cadastroPessoa" action="<?php echo $_smarty_tpl->tpl_vars['ACTIONS_DIR']->value;?>
pessoa.php" method="post"/>
                                        
                                        <input type="hidden" name="acao" value="cadastrarPessoa">
                                        
                                        <!--<div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="required">ID Pessoa</label>
                                                    <input class="span2" id="idPessoa" type="text" name="idPessoa" readonly />
                                                </div>
                                            </div>
                                        </div>-->

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="normal">Tipo Pessoa</label>
                                                    <div class="left marginT5 marginR10">
                                                        <input type="radio" name="tipoPessoa" id="tipoPessoaF" value="F" checked="checked" />
                                                        F&iacute;sica
                                                    </div>
                                                    <div class="left marginT5 marginR10">
                                                        <input type="radio" name="tipoPessoa" id="tipoPessoaJ" value="J" />
                                                        Jur&iacute;dica
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="normal">Situa&ccedil;&atilde;o Pessoa</label>
                                                    <div class="span4 controls">
                                                        <select id="pessoaSituacao" name="pessoaSituacao" required="required">
                                                            <?php  $_smarty_tpl->tpl_vars['valorPessoaSituacao'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorPessoaSituacao']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pessoaSituacao']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorPessoaSituacao']->key => $_smarty_tpl->tpl_vars['valorPessoaSituacao']->value){
$_smarty_tpl->tpl_vars['valorPessoaSituacao']->_loop = true;
?>
                                                                <option value="<?php echo $_smarty_tpl->tpl_vars['valorPessoaSituacao']->value['ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['valorPessoaSituacao']->value['DESCRICAO'];?>
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
                                                    <label class="form-label span4" for="normal">Categoria Pessoa</label>
                                                    <div class="span4 controls">
                                                        <select id="pessoaCategoria" name="pessoaCategoria" required="required" >
                                                            <option value="" selected="selected">-Selecione-</option>
                                                            <?php  $_smarty_tpl->tpl_vars['valorPessoaCategoria'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorPessoaCategoria']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pessoaTipoCategoria']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorPessoaCategoria']->key => $_smarty_tpl->tpl_vars['valorPessoaCategoria']->value){
$_smarty_tpl->tpl_vars['valorPessoaCategoria']->_loop = true;
?>
                                                                <option value="<?php echo $_smarty_tpl->tpl_vars['valorPessoaCategoria']->value['ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['valorPessoaCategoria']->value['DESCRICAO'];?>
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
                                                    <label class="form-label span4" for="normal">Conceito Pessoa</label>
                                                    <div class="span4 controls">
                                                        <select id="pessoaConceito" name="pessoaConceito" required="required" >
                                                            <option value="" selected="selected">-Selecione-</option>
                                                            <?php  $_smarty_tpl->tpl_vars['valorPessoaConceito'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorPessoaConceito']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pessoaConceito']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorPessoaConceito']->key => $_smarty_tpl->tpl_vars['valorPessoaConceito']->value){
$_smarty_tpl->tpl_vars['valorPessoaConceito']->_loop = true;
?>
                                                                <option value="<?php echo $_smarty_tpl->tpl_vars['valorPessoaConceito']->value['ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['valorPessoaConceito']->value['DESCRICAO'];?>
</option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-row row-fluid divPessoaFisica">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="required">Nome</label>
                                                    <input class="span8" id="nomePessoa" type="text" name="nomePessoa" required="required" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid divPessoaJuridica">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="required">Raz&atilde;o Social</label>
                                                    <input class="span8" id="razaoSocialPessoa" type="text" name="razaoSocialPessoa" required="required" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid divPessoaJuridica">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="required">Nome Fantasia</label>
                                                    <input class="span8" id="nomeFantasiaPessoa" type="text" name="nomeFantasiaPessoa" required="required" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid divPessoaFisica">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="normal">Sobrenome</label>
                                                    <input class="span8" id="sobrenomePessoa" type="text" name="sobrenomePessoa" required="required" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid divPessoaFisica">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="normal">Apelido</label>
                                                    <input class="span8" id="apelidoPessoa" type="text" name="apelidoPessoa" required="required" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid divPessoaFisica">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="normal">CPF</label>
                                                    <input class="span8" id="mask-cpf" type="text" name="cpfPessoa" required="required"/>
                                                    <span class="help-block blue span8">999.999.999-99</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid divPessoaJuridica">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="normal">CNPJ</label>
                                                    <input class="span8" id="mask-cnpj" type="text" name="cnpjPessoa" required="required"/>
                                                    <span class="help-block blue span8">99.999.999/9999-99</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid divPessoaFisica">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="normal">RG</label>
                                                    <input class="span8" id="rgPessoa" type="text" name="rgPessoa" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid divPessoaJuridica">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="normal">IE</label>
                                                    <input class="span8" id="iePessoa" type="text" name="iePessoa" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid divPessoaFisica">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="normal">Sexo</label>
                                                    <div class="span4 controls">
                                                        <select id="sexoPessoa" name="sexoPessoa">
                                                            <option value="F">FEMININO</option>
                                                            <option value="M">MASCULINO</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid divPessoaFisica">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="normal">Data Nascimento</label>
                                                    <input class="span8 mask" id="mask-date" type="text" name="nascimentoPessoa" required="required"/>
                                                    <span class="help-block blue span8">99/99/9999</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid divPessoaJuridica">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="required">Nome Contato</label>
                                                    <input class="span8" id="nomeContatoPessoa" type="text" name="nomeContatoPessoa" required="required" />
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="required">E-mail</label>
                                                    <input class="span8" id="emailPessoa" name="emailPessoa" type="text" required="required"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="required">Confirma E-mail</label>
                                                    <input class="span8" id="confirmaEmailPessoa" name="confirmaEmailPessoa" type="text" required="required"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="required">Senha</label>
                                                    <input class="span4" id="senhaPessoa" name="senhaPessoa" type="text" required="required"/> 
                                                    <span class="btn">Gerar Senha</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="required">Confirma Senha</label>
                                                    <input class="span4" id="confirmaSenhaPessoa" name="confirmaSenhaPessoa" type="password" required="required"/>
                                                </div>
                                            </div>
                                        </div>

                                        <hr />

                                        <div class="form-row row-fluid divPessoaJuridica">
                                            <div class="span12">
                                                <label class="form-label span4" for="normal"></label>
                                                <div class="row-fluid">
                                                    <font color="red";>IMPORTANTE! MERCADORIAS VENDIDAS PARA PESSOAS JUR&Iacute;DICAS, SOMENTE PODER&Atilde;O SER ENTREGUES NO ENDERE&Ccedil;O QUE CONSTA NO CNPJ</font>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="normal">CEP</label>
                                                    <input class="span5" id="cepEnderecoPessoa" type="text" name="cepEnderecoPessoa" required="required" />
                                                    <span class="help-block blue span8">99999-999</span>
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

                                        <hr />

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="normal">Telefone Fixo</label>
                                                    
                                                    <input class="span5" id="telefoneFixoContatoPessoa" type="text" name="telefoneFixoContatoPessoa" required="required" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="normal">Telefone Celular</label>
                                                    
                                                    <input class="span5" id="telefoneCelularContatoPessoa" type="text" name="telefoneCelularContatoPessoa" />
                                                </div>
                                            </div>
                                        </div>

                                        <hr />

                                        <div class="form-row row-fluid">
                                            <label class="form-label span4" for="checkboxes">Newsletter</label>
                                            <div class="left marginT5 marginR10">
                                                <div id="uniform-inlineCheckbox1" class="checker">
                                                <span class="">
                                                    <input id="newsletter" name="newsletter" class="styled" type="checkbox" checked="checked" value="S" style="opacity: 0;">
                                                </span>
                                            </div>
                                            Receber
                                            </div>
                                        </div>

                                        <hr />

                                        <div class="form-row row-fluid">
                                            <label class="form-label span4" for="checkboxes">Enviar e-mail de confirma&ccedil;&atilde;o de cadastro</label>
                                            <div class="left marginT5 marginR10">
                                                <div id="uniform-inlineCheckbox1">
                                                <span class="">
                                                    <input id="emailConfirmaCadastro" name="emailConfirmaCadastro" class="styled" type="checkbox" value="S" style="opacity: 0;">
                                                </span>
                                            </div>
                                            </div>
                                        </div>

										<div class="form-actions">
                                           <button type="submit" class="btn btn-info right">Salvar</button>
                                           <!--<button type="button" class="btn">Cancelar</button>-->
                                        </div>
                                        <div id="teste"></div>
                                                                                
                                    </form>
                                 
                                </div>

                            </div><!-- End .box -->

                   
                    </div><!-- End .row-fluid -->

               
    			<!-- Page end here -->
    				
               
            </div><!-- End contentwrapper -->
        </div><!-- End #content -->
    
    </div><!-- End #wrapper -->

   <?php }} ?>