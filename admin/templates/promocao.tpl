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
                                    <span>Promo&ccedil;&atilde;o</span>
                                    <form class="box-form right" action="">
                                        <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown">
                                            <span class="icon16 iconic-icon-cog"></span>
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="produto_promocao">
                                                    <span class="icon-pencil"></span> Novo
                                                </a>
                                            </li>
                                        </ul>
                                    </form>
                                </h4>
                                <a href="#" class="minimize">Minimize</a>
                            </div>
                            <div class="content noPad">
                                <table class="responsive table table-bordered" id="tabelaPromocao">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Descri&ccedil;&atilde;o</th>
                                        <th>Data Inicial Validade</th>
                                        <th>Data Final Validade</th>
                                        <th>Tipo</th>
                                        <th>Valor</th>
                                        <th>Ativo</th>
                                        <th>Frete Gr&aacute;tis</th>
                                        <th>Observa&ccedil;&otilde;es</th>
                                        <th>A&ccedil;&otilde;es</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                     
                                      
                                        {foreach $promocao as $valorPromocao}
                                          <tr>
                                            <td>{$valorPromocao.ID_PROMOCAO}</td>
                                            <td>{$valorPromocao.NOME_PROMOCAO}</td>
                                            <td>{$valorPromocao.DATA_INICIAL}</td>
                                            <td>{$valorPromocao.DATA_FINAL}</td>
                                            <td>
                                                {if $valorPromocao.TIPO_PROMOCAO eq 'P'}
                                                    PERCENTUAL
                                                {else}
                                                    VALOR
                                                {/if}
                                            </td>
                                            <td>{$valorPromocao.VALOR|number_format:2:",":"."}</td>
                                            <td>
                                                {if $valorPromocao.PROMOCAO_ATIVA eq 'S' }
                                                    <input type="checkbox" checked="checked" value="S" id="ativaPromocao{$valorPromocao.ID_PROMOCAO}">
                                                {else}
                                                    <input type="checkbox" value="N" id="ativaPromocao{$valorPromocao.ID_PROMOCAO}">
                                                {/if}
                                            </td>
                                            <td>
                                                {if $valorPromocao.FRETE_GRATIS eq 'S' }
                                                    <input type="checkbox" checked="checked" value="S" id="freteGratis{$valorPromocao.ID_PROMOCAO}">
                                                {else}
                                                    <input type="checkbox" value="N" id="freteGratis{$valorPromocao.ID_PROMOCAO}">
                                                {/if}
                                            </td>
                                            <td>{$valorPromocao.OBS}</td>
                                            <td>
                                                <div class="controls center">
                                                    <a href="produto_promocao?idPromocao={$valorPromocao.ID_PROMOCAO}" title="Editar" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
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

   

