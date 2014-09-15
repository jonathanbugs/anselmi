    <div id="wrapper">

        {include file="sidebar.tpl"}

        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                {include file="heading.tpl"}

                <!-- Build page from here: Usual with <div class="row-fluid"></div> -->


                    <div class="row-fluid">

                        <div class="span12">

                            <div class="box gradient">

                                <div class="title">
                                    <h4>
                                        <span>Lista de Casamento</span>
                                        <form class="box-form right" action="">
                                            <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown">
                                                <span class="icon16 iconic-icon-cog"></span>
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="lista-casamento-cadastra">
                                                        <span class="icon-pencil"></span> Novo
                                                    </a>
                                                </li>
                                            </ul>
                                        </form>
                                    </h4>
                                </div>
                                <div class="content noPad clearfix" id="tabelalistaCasamento">
                                    <table cellpadding="0" cellspacing="0" border="0" class="responsive dynamicTable display table table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Data Entrega</th>
                                                <th>Noivos</th>
                                                <th>Vendas</th>
                                                <th>Ativo</th>
                                                <th>Situa&ccedil;&atilde;o</th>
                                                <th>A&ccedil;&otilde;es</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {foreach $listaCasamento as $valorListaCasamento}
                                            <tr class="odd gradeX" id="{$valorListaCasamento.ID_LISTA_CASAMENTO}" {if $valorListaCasamento.SITUACAO eq 'D'}style="background-color:#7FFA6F"{else if $valorListaCasamento.SITUACAO eq 'F'}style="background-color:#F6FD3B"{/if}>
                                                <td>{$valorListaCasamento.ID_LISTA_CASAMENTO}</td>
                                                <td>{$valorListaCasamento.DATA_EVENTO}</td>
                                                <td>{$valorListaCasamento.CONJUGE1} | {$valorListaCasamento.CONJUGE2}</td>
                                                <td class="center">
                                                    {foreach $countProdutosVendidos[$valorListaCasamento.ID_LISTA_CASAMENTO] as $value}
                                                        {$value.1}/{$value.0}
                                                    {/foreach}
                                                </td>
                                                <td class="center">
                                                    {if $valorListaCasamento.ATIVO eq 'S' }
                                                        <span class="iconic-icon-check-alt"></span>
                                                    {else}
                                                        <span class="iconic-icon-x-altx-alt"></span>
                                                    {/if}
                                                </td>
                                                <td class="center">
                                                    {if $valorListaCasamento.SITUACAO eq 'A'}
                                                        Aberto
                                                    {else if $valorListaCasamento.SITUACAO eq 'D'}
                                                        Despachado
                                                    {else}
                                                        Fechado
                                                    {/if}
                                                </td>
                                                <td>
                                                    
                                                    <div class="controls center">
                                                        <a href="../emails/imprime-lista-casamento.php?idListaCasamento={$valorListaCasamento.ID_LISTA_CASAMENTO}" title="Imprimir" class="tip" target="_blank"><span class="icon12 icon-print"></span></a>
                                                        <a href="lista-casamento-cadastra?idListaCasamento={$valorListaCasamento.ID_LISTA_CASAMENTO}" title="Editar" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            {/foreach}
                                        </tbody>
                                        <!--<tfoot>
                                            <tr>
                                                <th>Rendering engine</th>
                                                <th>Browser</th>
                                                <th>Platform(s)</th>
                                                <th>Engine version</th>
                                                <th>CSS grade</th>
                                            </tr>
                                        </tfoot>-->
                                    </table>
                                </div>

                            </div><!-- End .box -->

                        </div><!-- End .span12 -->

                    </div><!-- End .row-fluid -->
               
                
                
                

               
    			<!-- Page end here -->
    				
               
            </div><!-- End contentwrapper -->
        </div><!-- End #content -->
    
    </div><!-- End #wrapper -->

   