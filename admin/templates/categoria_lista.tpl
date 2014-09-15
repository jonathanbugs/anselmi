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
                                    <span>{if $visualizaCategoriaProduto[0].CATEGORIA_MAE}Subcategoria de {$visualizaCategoriaProduto[0].CATEGORIA_MAE}{else}Categoria{/if}</span>
                                    <form class="box-form right" action="">
                                        <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown">
                                            <span class="icon16 iconic-icon-cog"></span>
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="categoria-cadastra">
                                                    <span class="icon-pencil"></span> Novo
                                                </a>
                                            </li>
                                        </ul>
                                    </form>
                                </h4>
                                
                            </div>
                            <div class="content noPad">
                                <table class="responsive table table-bordered" id="descricaoCategoriaProdutoTable">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Descri&ccedil;&atilde;o</th>
                                        <th>Ativo</th>
                                        <th>A&ccedil;&otilde;es</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      
                                      
                                        {foreach $visualizaCategoriaProduto as $valorCategoriaProduto}
                                      <tr id="trdescricaoCategoriaProduto{$valorCategoriaProduto.ID}">
                                        <td>{$valorCategoriaProduto.ID_CATEGORIA}</td>
                                        <td>{$valorCategoriaProduto.DESCRICAO_CATEGORIA}</td>
                                        <td>
                                            
                                            <input type="checkbox" {if $valorCategoriaProduto.ATIVO eq 'S'}checked="checked"{/if} id="{$valorCategoriaProduto.ID_CATEGORIA}" name="categoriaAtiva">
                                            
                                        </td>
                                        <td>
                                            <div class="controls center">
                                                <a href="categoria-cadastra?idCategoria={$valorCategoriaProduto.ID_CATEGORIA}" title="Editar" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                                <a href="categoria-lista?idCategoria={$valorCategoriaProduto.ID_CATEGORIA}" title="Listar Subcategorias" class="tip"><span class="icon12 brocco-icon-list"></span></a>

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

   

