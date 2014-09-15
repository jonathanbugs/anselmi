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
                                        <span>Lista Produto</span>
                                        <form class="box-form right" action="actions/exportar_excel.php" name="geraPlanilha" target="_blank" method="post">
                                            <input type="hidden" name="exportar" value="S">
                                            <input type="hidden" name="relatorio" value="lista-pedido">
                                            <a class="btn btn-mini dropdown-toggle" style="padding:2px;" href="javascript: document.geraPlanilha.submit();" data-toggle="dropdown">
                                                <span class="icon16 icomoon-icon-file-excel" title="Download Planilha"></span>
                                                <!-- <span class="caret"></span> -->
                                            </a>
                                            <!-- <ul class="dropdown-menu">
                                                <li>
                                                    <a href="pessoa-cadastra">
                                                        <span class="icon-pencil"></span> Novo
                                                    </a>
                                                </li>
                                            </ul> -->
                                        </form>
                                        <form class="box-form right" action="">
                                            <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown">
                                                <span class="icon16 iconic-icon-cog"></span>
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="produto-cadastra">
                                                        <span class="icon-pencil"></span> Novo
                                                    </a>
                                                </li>
                                            </ul>
                                        </form>
                                    </h4>
                                </div>
                                <div class="content noPad" id="tabelaListaProduto">
                                    <table id="tableListaProduto" cellpadding="0" cellspacing="0" border="0" class="responsive display table table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Imagem</th>
                                                <th>Descri&ccedil;&atilde;o Venda</th>
                                                <th>Atributo</th>
                                                <th>Refer&ecirc;ncia</th>
                                                <th>Situa&ccedil;&atilde;o</th>
                                                <th>Lan&ccedil;amento</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr></tr>
                                        </tbody>

                                    </table>
                                </div>

                            </div><!-- End .box -->

                        </div><!-- End .span12 -->

                    </div><!-- End .row-fluid -->






    			<!-- Page end here -->


            </div><!-- End contentwrapper -->
        </div><!-- End #content -->

    </div><!-- End #wrapper -->


