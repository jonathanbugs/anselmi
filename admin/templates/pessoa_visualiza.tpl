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
                                                    <a href="javascript: enviarNovaSenha({$idPessoa});">
                                                        <span class="icon-envelope"></span> Reenviar Senha
                                                    </a>
                                                </li> -->
                                            </ul>
                                        </form>
                                    </h4>
                                </div>
                                <div class="content">
                                    <dl class="dl-horizontal" id="dlVerDadosPessoa">
                                        {foreach $visualizaDadosPessoa as $valorDadosPessoa}
                                        {if $valorDadosPessoa.TIPO eq "F"}
                                            <dt>Categoria:</dt>
                                            <dd>{$valorDadosPessoa.DESCRICAO_TIPO_CATEGORIA}&nbsp;</dd>
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
                                                            <div class="left marginT5 marginR10">
                                                                {if $valorDadosPessoa.TIPO eq "F"}
                                                                    <input type="radio" name="tipoPessoa" id="tipoPessoaF" value="F" checked="checked" />
                                                                    F&iacute;sica
                                                                {else}
                                                                    <input type="radio" name="tipoPessoa" id="tipoPessoaJ" value="J" checked="checked" />
                                                                    Jur&iacute;dica
                                                                {/if}
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
                                                                    {foreach $categoriaPessoa as $valorCategoriaPessoa}
                                                                        <option value="{$valorCategoriaPessoa.ID_PESSOA_TIPO_CATEGORIA}" {if $valorDadosPessoa.ID_PESSOA_TIPO_CATEGORIA eq $valorCategoriaPessoa.ID_PESSOA_TIPO_CATEGORIA} selected="selected" {else} {/if} >{$valorCategoriaPessoa.DESCRICAO_TIPO_CATEGORIA}</option>
                                                                    {/foreach}    
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
                                                                    {foreach $conceitoPessoa as $valorConceitoPessoa}
                                                                        <option value="{$valorConceitoPessoa.ID_PESSOA_CONCEITO}" {if $valorDadosPessoa.PECO_ID_PESSOA_CONCEITO eq $valorConceitoPessoa.ID_PESSOA_CONCEITO} selected="selected" {else} {/if} >{$valorConceitoPessoa.DESCRICAO}</option>
                                                                    {/foreach}    
                                                                </select>
                                                            </div>
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
                                                            <input class="span5" id="telefoneFixoContatoPessoa" type="text" name="telefoneFixoContatoPessoa" value="{$valorDadosPessoa.TELEFONE}" required="required" maxlength="12"; />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row row-fluid">
                                                    <div class="span12">
                                                        <div class="row-fluid">
                                                            <label class="form-label span4" for="normal">Telefone Celular</label>
                                                            <input class="span5" id="telefoneCelularContatoPessoa" type="text" name="telefoneCelularContatoPessoa" value="{$valorDadosPessoa.CELULAR}" maxlength="9";/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-actions">
                                                   <button type="submit" class="btn btn-info">Salvar</button>
                                                   <button type="button" class="btn btn-danger" onclick="javascript: btnCancelaEditar('DadosPessoa');">Cancelar</button>
                                                </div>
                                                                                                                                        
                                            </form>
                                            
                                        {/foreach}

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
                                                {foreach $visualizaEnderecoPessoa as $valorEnderecoPessoa}
                                                <li>
                                                    <a href="javascript: iconeEditarEndereco({$valorEnderecoPessoa.ID_PESSOA_ENDERECO});">
                                                        <span class="icon-pencil"></span> {$valorEnderecoPessoa.APELIDO_ENDERECO}
                                                    </a>
                                                </li>
                                                {/foreach}
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
                                        {foreach $visualizaEnderecoPessoa as $valorEnderecoPessoa}
                                            <dd>
                                                <p><strong>{$valorEnderecoPessoa.APELIDO_ENDERECO}</strong></p>
                                                {$valorEnderecoPessoa.ENDERECO}, 
                                                {$valorEnderecoPessoa.NUMERO}
                                                {if $valorEnderecoPessoa.COMPLEMENTO eq ""}
                                                    <br />
                                                {else}
                                                    - {$valorEnderecoPessoa.COMPLEMENTO}<br />
                                                {/if}
                                                Bairro: {$valorEnderecoPessoa.BAIRRO}<br />
                                                {$valorEnderecoPessoa.MUNICIPIO}, {$valorEnderecoPessoa.UF}<br />
                                                {$valorEnderecoPessoa.CEP}<br />
                                                {$valorEnderecoPessoa.REFERENCIA}
                                            </dd>
                                            <input type="hidden" name="peEnIdPessoa{$valorEnderecoPessoa.ID_PESSOA_ENDERECO}" value="{$valorEnderecoPessoa.PESS_ID_PESSOA}"/>
                                            <input type="hidden" name="apelidoEndereco{$valorEnderecoPessoa.ID_PESSOA_ENDERECO}" value="{$valorEnderecoPessoa.APELIDO_ENDERECO}"/>
                                            <input type="hidden" name="endereco{$valorEnderecoPessoa.ID_PESSOA_ENDERECO}" value="{$valorEnderecoPessoa.ENDERECO}"/>
                                            <input type="hidden" name="numero{$valorEnderecoPessoa.ID_PESSOA_ENDERECO}" value="{$valorEnderecoPessoa.NUMERO}"/>
                                            <input type="hidden" name="complemento{$valorEnderecoPessoa.ID_PESSOA_ENDERECO}" value="{$valorEnderecoPessoa.COMPLEMENTO}"/>
                                            <input type="hidden" name="bairro{$valorEnderecoPessoa.ID_PESSOA_ENDERECO}" value="{$valorEnderecoPessoa.BAIRRO}"/>
                                            <input type="hidden" name="nomeMunicipio{$valorEnderecoPessoa.ID_PESSOA_ENDERECO}" value="{$valorEnderecoPessoa.MUNICIPIO}"/>
                                            <input type="hidden" name="estado{$valorEnderecoPessoa.ID_PESSOA_ENDERECO}" value="{$valorEnderecoPessoa.UF}"/>
                                            <input type="hidden" name="pais{$valorEnderecoPessoa.ID_PESSOA_ENDERECO}" value="{$valorEnderecoPessoa.PAIS}"/>
                                            <input type="hidden" name="cep{$valorEnderecoPessoa.ID_PESSOA_ENDERECO}" value="{$valorEnderecoPessoa.CEP}"/>
                                            <input type="hidden" name="referencia{$valorEnderecoPessoa.ID_PESSOA_ENDERECO}" value="{$valorEnderecoPessoa.REFERENCIA}"/>
                                            <hr />
                                        {/foreach}
                                    </dl>

                                    <div id="formEditaEndereco">
                                        <form class="form-horizontal" id="editaPessoaEndereco" action="{$ACTIONS_DIR}pessoa.php" method="post"/>

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
                                        <form class="form-horizontal" id="cadastraPessoaEndereco" action="{$ACTIONS_DIR}pessoa.php" method="post"/>

                                        <input type="hidden" name="acao" value="cadastrarPessoaEndereco">
                                        
                                            <div class="form-row row-fluid divPessoaJuridica">
                                                <div class="span12">
                                                    <font color="red">IMPORTANTE! MERCADORIAS VENDIDAS PARA PESSOAS JUR&Iacute;DICAS, SOMENTE PODER&Atilde;O SER ENTREGUES NO ENDERE&Ccedil;O QUE CONSTA NO CNPJ</font>
                                                </div>
                                            </div>

                                            <input class="span2" id="peEnIdPessoa" type="hidden" name="peEnIdPessoa" value="{$valorDadosPessoa.ID_PESSOA}"/>

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
                                    <form class="form-horizontal" method="post" id="formCadastraOcorrencia" action="{$ACTIONS_DIR}pessoa.php" />

                                    <input type="hidden" value="cadastraOcorrenciaPessoa" name="acao">
                                    <input type="hidden" value="{$idPessoa}" name="idPessoa">

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
                                        {foreach $listaOcorrencia as $valueOcorrencia}
                                            <dt>
                                                {$valueOcorrencia.DATA}
                                            </dt>
                                            <dd>
                                                {if $valueOcorrencia.PEDI_ID_PEDIDO}
                                                    <strong>Pedido {$valueOcorrencia.PEDI_ID_PEDIDO}: </strong>
                                                {/if}
                                                {$valueOcorrencia.DESCRICAO}&nbsp;</dd>
                                        {/foreach}
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
                                          {foreach $listaPedidoPessoa as $valorPedidoPessoa}
                                          <tr class="trPedidoPessoa" id="{$valorPedidoPessoa.ID_PEDIDO}">
                                            <td>{$valorPedidoPessoa.NUMERO_PEDIDO}</td>
                                            <td>{$valorPedidoPessoa.DATA_EMISSAO}</td>
                                            <td>{$valorPedidoPessoa.PRAZO_ENTREGA_DIAS} Dias ({$valorPedidoPessoa.ETA})</td>
                                            <td>{$valorPedidoPessoa.VALOR_FRETE|number_format:2:",":"."} - {$valorPedidoPessoa.DESCRICAO_FRETE}</td>
                                            <td>{$valorPedidoPessoa.VALOR_TOTAL_PAGAMENTO|number_format:2:",":"."}</td>
                                            <td>{$valorPedidoPessoa.NUMERO_PARCELAS}x {$valorPedidoPessoa.DESCRICAO_FORMA_PAGAMENTO}</td>
                                            <td>{$valorPedidoPessoa.DESCRICAO_PEDIDO_ITEM_SITUACAO}</td>
                                          </tr>
                                          {/foreach}
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

   