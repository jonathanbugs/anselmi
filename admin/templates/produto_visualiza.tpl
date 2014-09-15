    <div id="wrapper">

        {include file="sidebar.tpl"}

        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                {include file="heading.tpl"}

                <!-- Build page from here: Usual with <div class="row-fluid"></div> -->


                <!--cadastro de pessoa-->
                    <div class="row-fluid">

                        <div class="span6">

                            <div class="box">
                                <div class="title">
                                    <h4>
                                        <span>Produto</span>
                                        <form class="box-form right" action="">
                                            <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown">
                                                <span class="icon16 iconic-icon-cog"></span>
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="javascript: iconeEditar('Produto');">
                                                        <span class="icon-pencil"></span> Editar
                                                    </a>
                                                </li>
                                               
                                            </ul>
                                        </form>
                                    </h4>
                                </div>
                                <div class="content">
                                    <dl class="dl-horizontal" id="dlVerDadosPessoa">
                                        {foreach $visualizaDadosPessoa as $valorDadosPessoa}
                                        {if $valorDadosPessoa.TIPO eq "F"}
                                            <dt>Nome:</dt>
                                            <dd>{$valorDadosPessoa.NOME}&nbsp;</dd>
                                            <dt>Sobrenome:</dt>
                                            <dd>{$valorDadosPessoa.SOBRENOME}&nbsp;</dd>
                                            <dt>Apelido:</dt>
                                            <dd>{$valorDadosPessoa.APELIDO}&nbsp;</dd>
                                            <dt>CPF:</dt>
                                            <dd>{$valorDadosPessoa.CPF|mascara_cpf_cnpj}&nbsp;</dd>
                                            <dt>RG:</dt>
                                            <dd>{$valorDadosPessoa.RG}&nbsp;</dd>
                                            <dt>Data Nascimento:</dt>
                                            <dd>{$valorDadosPessoa.DATA_NASCIMENTO}&nbsp;</dd>
                                            
                                            {if $valorDadosPessoa.SEXO eq "F"}
                                                <dt>Sexo:</dt>
                                                <dd>Feminino&nbsp;</dd>
                                            {elseif $valorDadosPessoa.SEXO eq "M"}
                                                <dt>Sexo:</dt>
                                                <dd>Masculino&nbsp;</dd>
                                            {else}
                                                <dt></dt>
                                                <dd></dd>
                                            {/if}
                                            
                                            <dt>Tipo Pessoa:</dt>
                                            <dd>F&iacute;sica&nbsp;</dd>
                                            <dt>IP:</dt>
                                            <dd>{$valorDadosPessoa.IP}&nbsp;</dd>
                                            <dt>Conceito:</dt>
                                            <dd>{$valorDadosPessoa.CONCEITO}&nbsp;</dd>
                                            <dt>E-mail:</dt>
                                            <dd>{$valorDadosPessoa.EMAIL}&nbsp;</dd>
                                            <dt>Telefone:</dt>
                                            <dd>{$valorDadosPessoa.TELEFONE|mascara_telefone}&nbsp;</dd>
                                            <dt>Celular:</dt>
                                            <dd>{$valorDadosPessoa.CELULAR|mascara_telefone}&nbsp;</dd>
                                        {else}
                                            <dt>Raz&atilde;o Social:</dt>
                                            <dd>{$valorDadosPessoa.NOME}&nbsp;</dd>
                                            <dt>Nome Fantasia:</dt>
                                            <dd>{$valorDadosPessoa.NOME_FANTASIA}&nbsp;</dd>
                                            <dt>CNPJ:</dt>
                                            <dd>{$valorDadosPessoa.CNPJ|mascara_cpf_cnpj}&nbsp;</dd>
                                            <dt>Tipo Pessoa:</dt>
                                            <dd>Jur&iacute;dica&nbsp;</dd>
                                            <dt>IE:</dt>
                                            <dd>{$valorDadosPessoa.IE}&nbsp;</dd>
                                            <dt>IP:</dt>
                                            <dd>{$valorDadosPessoa.IP}&nbsp;</dd>
                                            <dt>Nome Contato:</dt>
                                            <dd>{$valorDadosPessoa.NOME_CONTATO}&nbsp;</dd>
                                            <dt>Conceito:</dt>
                                            <dd>{$valorDadosPessoa.CONCEITO}&nbsp;</dd>
                                            <dt>E-mail:</dt>
                                            <dd>{$valorDadosPessoa.EMAIL}&nbsp;</dd>
                                            <dt>Telefone:</dt>
                                            <dd>{$valorDadosPessoa.TELEFONE|mascara_telefone}&nbsp;</dd>
                                            <dt>Celular:</dt>
                                            <dd>{$valorDadosPessoa.CELULAR|mascara_telefone}&nbsp;</dd>
                                        {/if}
                                        
                                        {/foreach}
                                    </dl>
                                    <dl class="dl-horizontal" id="dlEditaDadosPessoa">
                                        {foreach $visualizaDadosPessoa as $valorDadosPessoa}
                                            <form class="form-horizontal" id="editaPessoa" action="{$ACTIONS_DIR}pessoa.php" method="post"/>
                                        
                                                <input type="hidden" name="acao" value="editarPessoa">
                                                
                                                <div class="form-row row-fluid">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="required">ID Pessoa</label>
                                                            <input class="span2" id="idPessoa" type="text" name="idPessoa" value="{$valorDadosPessoa.ID_PESSOA}" readonly />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">Tipo Pessoa</label>
                                                            <div class="left marginT5">
                                                                {if $valorDadosPessoa.TIPO eq "F"}
                                                                    <input type="radio" name="tipoPessoa" id="tipoPessoaF" value="F" checked="checked" />
                                                                    <label for="tipoPessoaF">Pessoa F&iacute;sica</label>
                                                                {else}
                                                                    <input type="radio" name="tipoPessoa" id="tipoPessoaJ" value="J" checked="checked" />
                                                                    <label for="tipoPessoaF">Pessoa Jur&iacute;dica</label>
                                                                {/if}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">Conceito</label>
                                                            <select id="conceitoPessoa" name="conceitoPessoa">
                                                                {foreach $conceitoPessoa as $valorConceitoPessoa}
                                                                    <option value="{$valorConceitoPessoa.ID_PESSOA_CONCEITO}" {if $valorDadosPessoa.PECO_ID_PESSOA_CONCEITO eq $valorConceitoPessoa.ID_PESSOA_CONCEITO} selected="selected" {else} {/if} >{$valorConceitoPessoa.DESCRICAO}</option>
                                                                {/foreach}    
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid divPessoaJuridica">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="required">Raz&atilde;o Social</label>
                                                            <input class="span8" id="razaoSocialPessoa" type="text" name="razaoSocialPessoa" value="{$valorDadosPessoa.NOME}" required="required" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid divPessoaJuridica">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="required">Nome Fantasia</label>
                                                            <input class="span8" id="nomeFantasiaPessoa" type="text" name="nomeFantasiaPessoa" value="{$valorDadosPessoa.NOME_FANTASIA}" required="required" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid divPessoaJuridica">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">CNPJ</label>
                                                            <input class="span8" id="mask-cnpj" type="text" name="cnpjPessoa" value="{$valorDadosPessoa.CNPJ}" required="required"/>
                                                            <span class="help-block blue span8">99.999.999/9999-99</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid divPessoaJuridica">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">IE</label>
                                                            <input class="span8" id="iePessoa" type="text" name="iePessoa" value="{$valorDadosPessoa.IE}" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid divPessoaJuridica">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="required">Nome Contato</label>
                                                            <input class="span8" id="nomeContatoPessoa" type="text" name="nomeContatoPessoa" value="{$valorDadosPessoa.NOME_CONTATO}" required="required" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid divPessoaFisica">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="required">Nome</label>
                                                            <input class="span8" id="nomePessoa" type="text" name="nomePessoa" value="{$valorDadosPessoa.NOME}" required="required" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid divPessoaFisica">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">Sobrenome</label>
                                                            <input class="span8" id="sobrenomePessoa" type="text" name="sobrenomePessoa" value="{$valorDadosPessoa.SOBRENOME}" required="required" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid divPessoaFisica">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">Apelido</label>
                                                            <input class="span8" id="apelidoPessoa" type="text" name="apelidoPessoa" value="{$valorDadosPessoa.APELIDO}" required="required" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid divPessoaFisica">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">CPF</label>
                                                            <input class="span8" id="mask-cpf" type="text" name="cpfPessoa" value="{$valorDadosPessoa.CPF}" required="required"/>
                                                            <span class="help-block blue span8">999.999.999-99</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid divPessoaFisica">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">RG</label>
                                                            <input class="span8" id="rgPessoa" type="text" value="{$valorDadosPessoa.RG}" name="rgPessoa" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid divPessoaFisica">
                                                    <div>
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">Sexo</label>
                                                            <select id="sexoPessoa" name="sexoPessoa">
                                                                {if $valorDadosPessoa.SEXO eq "F"}
                                                                    <option value="F" selected="selected">FEMININO</option>
                                                                    <option value="M">MASCULINO</option>
                                                                {else}
                                                                    <option value="F">FEMININO</option>
                                                                    <option value="M" selected="selected">MASCULINO</option>
                                                                {/if}
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid divPessoaFisica">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">Data Nascimento</label>
                                                            <input class="span8 mask" id="mask-date" type="text" name="nascimentoPessoa" value="{$valorDadosPessoa.DATA_NASCIMENTO}" required="required"/>
                                                            <span class="help-block blue span8">99/99/9999</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-row row-fluid">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="required">E-mail</label>
                                                            <input class="span8" id="emailPessoa" name="emailPessoa" type="text" value="{$valorDadosPessoa.EMAIL}" required="required"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <hr />

                                                <div class="form-row row-fluid">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">Telefone Fixo</label>
                                                            <input class="span1" id="mask-ddd" type="text" name="dddTelefoneFixoContatoPessoa" value="{$valorDadosPessoa.TELEFONE|trata_telefone:ddd}" placeholder="DDD" />
                                                            <input class="span5" id="telefoneFixoContatoPessoa" type="text" name="telefoneFixoContatoPessoa" value="{$valorDadosPessoa.TELEFONE|trata_telefone:telefone}" required="required" maxlength="9"; />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">Telefone Celular</label>
                                                            <input class="span1" id="mask-ddd1" type="text" name="dddTelefoneCelularContatoPessoa" placeholder="DDD" value="{$valorDadosPessoa.CELULAR|trata_telefone:ddd}"/>
                                                            <input class="span5" id="telefoneCelularContatoPessoa" type="text" name="telefoneCelularContatoPessoa" value="{$valorDadosPessoa.CELULAR|trata_telefone:telefone}" maxlength="9";/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-actions">
                                                   <button type="submit" class="btn btn-info">Salvar</button>
                                                   <button type="button" class="btn btn-danger" onclick="javascript: btnCancelaEditar('DadosPessoa');">Cancelar</button>
                                                </div>
                                                                                                                                        
                                            </form>
                                            
                                        {/foreach}

                                        <div id="teste">123</div>
                                    </dl>
                                </div>
                            </div>

                        </div><!-- End .span4 -->

                        

                    </div><!-- End .row-fluid -->    
                    
                    

               
    			<!-- Page end here -->
    				
               
            </div><!-- End contentwrapper -->
        </div><!-- End #content -->
    
    </div><!-- End #wrapper -->

   