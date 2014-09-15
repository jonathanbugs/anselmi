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
                                    <span>Marca</span>
                                    <form class="box-form right" action="">
                                        <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown">
                                            <span class="icon16 iconic-icon-cog"></span>
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="javascript: iconeCadastrarMarca('Marca');">
                                                    <span class="icon-pencil"></span> Novo
                                                </a>
                                            </li>
                                        </ul>
                                    </form>
                                </h4>
                                <a href="#" class="minimize">Minimize</a>
                            </div>
                            <div class="content noPad">
                                <table class="responsive table table-bordered" id="descricaoMarcaTable">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Descri&ccedil;&atilde;o Marca</th>
                                        <th>A&ccedil;&otilde;es</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr id="novaLinhaMarca" class="display-none">
                                        <td></td>
                                        <td><input class="span12" id="descricaoMarca" type="text" name="descricaoMarca" /></td>
                                        <td><div class="controls center"><a href="javascript: iconeAcaoCadastrar('descricaoMarca')" title="Salvar" class="tip"><span class="icon12 icon-hdd"></span></a></div></td>
                                      </tr>
                                      
                                        {foreach $visualizaMarcaProduto as $valueMarcaProduto}
                                      <tr id="trdescricaoMarca{$valueMarcaProduto.ID_MARCA}">
                                        <td>{$valueMarcaProduto.ID_MARCA}</td>
                                        <td><input class="span12" id="descricaoMarca{$valueMarcaProduto.ID_MARCA}" type="text" name="descricaoMarca{$valueMarcaProduto.ID_MARCA}" value="{$valueMarcaProduto.DESCRICAO_MARCA}"/></td>
                                        <td>
                                            <div class="controls center">
                                                <a href="javascript: iconeAcaoEditar({$valueMarcaProduto.ID_MARCA}, 'descricaoMarca')" title="Editar" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                                <a href="javascript: iconeAcaoRemover({$valueMarcaProduto.ID_MARCA}, 'descricaoMarca')" title="Remover" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
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

   

