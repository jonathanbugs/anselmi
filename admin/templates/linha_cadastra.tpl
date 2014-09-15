<div id="wrapper">

    {include file="sidebar.tpl"}

    <!--Body content-->
    <div id="content" class="clearfix">
        <div class="contentwrapper"><!--Content wrapper-->

            {include file="heading.tpl"}

            <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

                
                <div class="row-fluid">

                    <div class="span12">
                        
                        <div class="box">

                            <div class="title">

                                <h4>
                                    <span>N&iacute;vel Auxiliar Produto</span>
                                    <form class="box-form right" action="">
                                        <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown">
                                            <span class="icon16 iconic-icon-cog"></span>
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="javascript: iconeCadastrarLinha('Linha');">
                                                    <span class="icon-pencil"></span> Novo
                                                </a>
                                            </li>
                                        </ul>
                                    </form>
                                </h4>
                                <a href="#" class="minimize">Minimize</a>
                            </div>
                            <div class="content noPad">
                                <table class="responsive table table-bordered" id="LinhaTable">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Tipo</th>
                                        <th>Descri&ccedil;&atilde;o</th>
                                        <th>Ordem</th>
                                        <th>Exibe no Menu</th>
                                        <th>A&ccedil;&otilde;es</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr id="novaLinha" class="display-none">
                                        <td></td>
                                        <td>
                                            <select id="tipoLinha" name="tipoLinha">
                                                {foreach $listaNivelAux as $valueNivelAux}
                                                    <option value="{$valueNivelAux.ID_NIVEL_AUXILIAR}">
                                                        {$valueNivelAux.DESCRICAO_NIVEL_AUXILIAR}
                                                    </option>
                                                {/foreach}
                                            </select>
                                        </td>
                                        <td><input class="span12" id="descricaoLinha" type="text" name="descricaoLinha" /></td>
                                        <td><input class="span4" id="ordemLinha" type="text" name="ordemLinha" value="10" /></td>
                                        <td><input id="exibeMenuLinha" type="checkbox" checked="checked" name="exibeMenuLinha" /></td>
                                        <td><div class="controls center"><a href="javascript: iconeAcaoCadastrar('Linha')" title="Salvar" class="tip"><span class="icon12 icon-hdd"></span></a></div></td>
                                      </tr>
                                      
                                        {foreach $visualizaLinhaProduto as $valueLinhaProduto}
                                      <tr id="trdescricaoLinha{$valueLinhaProduto.ID_NIVEL_AUX_VALOR}">

                                        <td>{$valueLinhaProduto.ID_NIVEL_AUX_VALOR}</td>

                                        <td>
                                            <select id="tipoLinha{$valueLinhaProduto.ID_NIVEL_AUX_VALOR}" name="tipoLinha{$valueLinhaProduto.ID_NIVEL_AUX_VALOR}">
                                                {foreach $listaNivelAux as $valueNivelAux}
                                                    <option {if $valueNivelAux.ID_NIVEL_AUXILIAR eq $valueLinhaProduto.ID_NIVEL_AUXILIAR}selected="selected"{/if} value="{$valueNivelAux.ID_NIVEL_AUXILIAR}">
                                                        {$valueNivelAux.DESCRICAO_NIVEL_AUXILIAR}
                                                    </option>
                                                {/foreach}
                                            </select>
                                        </td>

                                        <td><input class="span12" id="descricaoLinha{$valueLinhaProduto.ID_NIVEL_AUX_VALOR}" type="text" name="descricaoLinha{$valueLinhaProduto.ID_NIVEL_AUX_VALOR}" value="{$valueLinhaProduto.DESC_PRODUTO_NIVEL_AUXILIAR}"/></td>
                                        
                                        <td><input class="span4" id="ordemLinha{$valueLinhaProduto.ID_NIVEL_AUX_VALOR}" type="text" name="ordemLinha{$valueLinhaProduto.ID_NIVEL_AUX_VALOR}" value="{$valueLinhaProduto.ORDEM}"/></td>
                                        
                                        <td><input id="exibeMenuLinha{$valueLinhaProduto.ID_NIVEL_AUX_VALOR}" type="checkbox" value="S" {if $valueLinhaProduto.EXIBE_MENU eq 'S'}checked="checked"{/if} name="exibeMenuLinha{$valueLinhaProduto.ID_NIVEL_AUX_VALOR}"/></td>
                                        
                                        <td>
                                            <div class="controls center">
                                                <a href="javascript: iconeAcaoEditar({$valueLinhaProduto.ID_NIVEL_AUX_VALOR}, 'Linha')" title="Editar" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                                <a href="javascript: iconeAcaoRemover({$valueLinhaProduto.ID_NIVEL_AUX_VALOR}, 'Linha')" title="Remover" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
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

   

