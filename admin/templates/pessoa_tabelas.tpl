<div id="wrapper">

    {include file="sidebar.tpl"}

    <!--Body content-->
    <div id="content" class="clearfix">
        <div class="contentwrapper"><!--Content wrapper-->

            {include file="heading.tpl"}

            <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

                
                <div class="row-fluid">

                    <div class="span4">
                        
                        <div class="box">

                            <div class="title">

                                <h4>
                                    <span>Pessoa Conceito</span>
                                    <form class="box-form right" action="">
                                        <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown">
                                            <span class="icon16 iconic-icon-cog"></span>
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="javascript: iconeCadastrarTabelasPessoa('PessoaConceito');">
                                                    <span class="icon-pencil"></span> Novo
                                                </a>
                                            </li>
                                        </ul>
                                    </form>
                                </h4>
                                <a href="#" class="minimize">Minimize</a>
                            </div>
                            <div class="content noPad">
                                <table class="responsive table table-bordered" id="descricaoPessoaConceitoTable">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Descri&ccedil;&atilde;o</th>
                                        <th>A&ccedil;&otilde;es</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr id="novaLinhaPessoaConceito" class="display-none">
                                        <td></td>
                                        <td><input class="span12" id="descricaoPessoaConceito" type="text" name="descricaoPessoaConceito" /></td>
                                        <td><div class="controls center"><a href="javascript: iconeAcaoCadastrar('descricaoPessoaConceito')" title="Salvar" class="tip"><span class="icon12 icon-hdd"></span></a></div></td>
                                      </tr>
                                      
                                        {foreach $pessoaConceito as $valorPessoaConceito}
                                      <tr id="trdescricaoPessoaConceito{$valorPessoaConceito.ID}">
                                        <td>{$valorPessoaConceito.ID}</td>
                                        <td><input class="span12" id="descricaoPessoaConceito{$valorPessoaConceito.ID}" type="text" name="descricaoPessoaConceito{$valorPessoaConceito.ID}" value="{$valorPessoaConceito.DESCRICAO}"/></td>
                                        <td>
                                            <div class="controls center">
                                                <a href="javascript: iconeAcaoEditar({$valorPessoaConceito.ID}, 'descricaoPessoaConceito')" title="Editar" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                                <a href="javascript: iconeAcaoRemover({$valorPessoaConceito.ID}, 'descricaoPessoaConceito')" title="Remover" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
                                            </div>
                                        </td>
                                      </tr>
                                      {/foreach}
                                    </tbody>
                                </table>
                            </div>

                        </div><!-- End .box -->

                    </div><!-- End .span6 -->

                    <div class="span4">
                        
                        <div class="box">

                            <div class="title">

                                <h4>
                                    <span>Pessoa Situa&ccedil;&atilde;o</span>
                                    <form class="box-form right" action="">
                                        <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown">
                                            <span class="icon16 iconic-icon-cog"></span>
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="javascript: iconeCadastrarTabelasPessoa('PessoaSituacao');">
                                                    <span class="icon-pencil"></span> Novo
                                                </a>
                                            </li>
                                        </ul>
                                    </form>
                                </h4>
                                <a href="#" class="minimize">Minimize</a>
                            </div>
                            <div class="content noPad">
                                <table class="responsive table table-bordered" id="descricaoPessoaSituacaoTable">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Descri&ccedil;&atilde;o</th>
                                        <th>A&ccedil;&otilde;es</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr id="novaLinhaPessoaSituacao" class="display-none">
                                        <td></td>
                                        <td><input class="span12" id="descricaoPessoaSituacao" type="text" name="descricaoPessoaSituacao" /></td>
                                        <td><div class="controls center"><a href="javascript: iconeAcaoCadastrar('descricaoPessoaSituacao')" title="Salvar" class="tip"><span class="icon12 icon-hdd"></span></a></div></td>
                                      </tr>
                                        {foreach $pessoaSituacao as $valorPessoaSituacao}
                                      <tr id="trdescricaoPessoaSituacao{$valorPessoaSituacao.ID}">
                                        <td>{$valorPessoaSituacao.ID}</td>
                                        <td><input class="span12" id="descricaoPessoaSituacao{$valorPessoaSituacao.ID}" type="text" name="descricaoPessoaSituacao{$valorPessoaSituacao.ID}" value="{$valorPessoaSituacao.DESCRICAO}"/></td>
                                        <td>
                                            <div class="controls center">
                                                <a href="javascript: iconeAcaoEditar({$valorPessoaSituacao.ID}, 'descricaoPessoaSituacao')" title="Editar" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                                <a href="javascript: iconeAcaoRemover({$valorPessoaSituacao.ID}, 'descricaoPessoaSituacao')" title="Remover" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
                                            </div>
                                        </td>
                                      </tr>
                                      {/foreach}
                                    </tbody>
                                </table>
                            </div>

                        </div><!-- End .box -->

                    </div><!-- End .span6 -->

                    <div class="span4">
                        
                        <div class="box">

                            <div class="title">

                                <h4>
                                    <span>Pessoa Categoria</span>
                                    <form class="box-form right" action="">
                                        <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown">
                                            <span class="icon16 iconic-icon-cog"></span>
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="javascript: iconeCadastrarTabelasPessoa('PessoaCategoria');">
                                                    <span class="icon-pencil"></span> Novo
                                                </a>
                                            </li>
                                        </ul>
                                    </form>
                                </h4>
                                <a href="#" class="minimize">Minimize</a>
                            </div>
                            <div class="content noPad">
                                <table class="responsive table table-bordered" id="descricaoPessoaCategoriaTable">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Descri&ccedil;&atilde;o</th>
                                        <th>A&ccedil;&otilde;es</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr id="novaLinhaPessoaCategoria" class="display-none">
                                        <td></td>
                                        <td><input class="span12" id="descricaoPessoaCategoria" type="text" name="descricaoPessoaCategoria" /></td>
                                        <td><div class="controls center"><a href="javascript: iconeAcaoCadastrar('descricaoPessoaCategoria')" title="Salvar" class="tip"><span class="icon12 icon-hdd"></span></a></div></td>
                                      </tr>
                                      
                                        {foreach $pessoaTipoCategoria as $valorTipoCategoria}
                                      <tr id="trdescricaoPessoaCategoria{$valorTipoCategoria.ID}">
                                        <td>{$valorTipoCategoria.ID}</td>
                                        <td><input class="span12" id="descricaoPessoaCategoria{$valorTipoCategoria.ID}" type="text" name="descricaoPessoaCategoria{$valorTipoCategoria.ID}" value="{$valorTipoCategoria.DESCRICAO}"/></td>
                                        <td>
                                            <div class="controls center">
                                                <a href="javascript: iconeAcaoEditar({$valorTipoCategoria.ID}, 'descricaoPessoaCategoria')" title="Editar" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                                <a href="javascript: iconeAcaoRemover({$valorTipoCategoria.ID}, 'descricaoPessoaCategoria')" title="Remover" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
                                            </div>
                                        </td>
                                      </tr>
                                      {/foreach}
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

   

