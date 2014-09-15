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
                                    <span>Atributos</span>
                                    <form class="box-form right" action="">
                                        <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown">
                                            <span class="icon16 iconic-icon-cog"></span>
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="javascript: iconeCadastrarAtributo('Atributo');">
                                                    <span class="icon-pencil"></span> Novo
                                                </a>
                                            </li>
                                        </ul>
                                    </form>
                                </h4>
                                <a href="#" class="minimize">Minimize</a>
                            </div>
                            <div class="content noPad">
                                <table class="responsive table table-bordered" id="AtributoTable">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Atributo</th>
                                        <th>Valor</th>
                                        <th>Cor</th>
                                        <th>A&ccedil;&otilde;es</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr id="novaAtributo" class="display-none">
                                        <td></td>
                                        <td>
                                            <select id="tipoAtributo" name="tipoAtributo">
                                                {foreach $listaAtributoProduto as $valueAtributo}
                                                    <option value="{$valueAtributo.ID_ATRIBUTO}">
                                                        {$valueAtributo.DESCRICAO_ATRIBUTO}
                                                    </option>
                                                {/foreach}
                                            </select>
                                        </td>
                                        <td><input class="span12" id="descricaoAtributo" type="text" name="descricaoAtributo" /></td>
                                        <td>
                                            <input class="span12 hexadecimal" id="hexadecimalAtributo" type="text" name="hexadecimalAtributo" value="#ffffff"/><div class="picker" id="picker"></div>
                                        </td>
                                        <td><div class="controls center"><a href="javascript: iconeAcaoCadastrar('Atributo')" title="Salvar" class="tip"><span class="icon12 icon-hdd"></span></a></div></td>
                                      </tr>
                                      
                                    {foreach $listaAtributoValor as $valueAtributoValor}
                                      <tr id="trdescricaoAtributo{$valueAtributo.ID_ATRIBUTO}">

                                        <td>{$valueAtributoValor.ID_ATRIBUTO_VALOR}</td>

                                        <td>
                                            <select id="tipoAtributo{$valueAtributoValor.ID_ATRIBUTO_VALOR}" name="tipoAtributo{$valueAtributoValor.ID_ATRIBUTO_VALOR}">
                                                {foreach $listaAtributoProduto as $valueAtributo}
                                                    <option {if $valueAtributoValor.ATRI_ID_ATRIBUTO eq $valueAtributo.ID_ATRIBUTO}selected="selected"{/if} value="{$valueAtributo.ID_ATRIBUTO}">
                                                        {$valueAtributo.DESCRICAO_ATRIBUTO}
                                                    </option>
                                                {/foreach}
                                            </select>
                                        </td>

                                        <td><input class="span12" id="descricaoAtributo{$valueAtributoValor.ID_ATRIBUTO_VALOR}" type="text" name="descricaoAtributo{$valueAtributoValor.ID_ATRIBUTO_VALOR}" value="{$valueAtributoValor.VALOR}"/></td>
                                        
                                        <td>
                                            <input class="span12 hexadecimal" id="hexadecimalAtributo{$valueAtributoValor.ID_ATRIBUTO_VALOR}" type="text" name="hexadecimalAtributo{$valueAtributoValor.ID_ATRIBUTO_VALOR}" value="{$valueAtributoValor.HEXADECIMAL}"/><div class="picker" id="picker{$valueAtributoValor.ID_ATRIBUTO_VALOR}"></div>
                                        </td>

                                        <td>
                                            <div class="controls center">
                                                <a href="javascript: iconeAcaoEditar({$valueAtributoValor.ID_ATRIBUTO_VALOR}, 'Atributo')" title="Editar" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                                <a href="javascript: iconeAcaoRemover({$valueAtributoValor.ID_ATRIBUTO_VALOR}, 'Atributo')" title="Remover" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
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

   

