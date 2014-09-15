<div id="wrapper">

    {include file="sidebar.tpl"}

    <!--Body content-->
    <div id="content" class="clearfix">
        <div class="contentwrapper"><!--Content wrapper-->

            {include file="heading.tpl"}
            <div id="teste"></div>
            <!-- Build page from here: Usual with <div class="row-fluid"></div> -->
            <div class="row-fluid">

                <div class="span12">

                    <div class="box gradient">

                        <div class="title">
                            <h4>
                                <span>Banners</span>
                                <form class="box-form right" action="">
                                    <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown">
                                        <span class="icon16 iconic-icon-cog"></span>
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="banner-cadastra">
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
                                        <th>Legenda</th>
                                        <th>Imagem</th>
                                        <th>Data Inicial</th>
                                        <th>Data Final</th>
                                        <th>Ativo</th>
                                        <th>A&ccedil;&otilde;es</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {foreach $listaBanner as $valueBanner}
                                    <tr>
                                        <td>{$valueBanner.ID_BANNER}</td>
                                        <td>{$valueBanner.LEGENDA}</td>
                                        <td><img src="{$valueBanner.IMAGEM}" width="100" border="0"></td>
                                        <td>{$valueBanner.DATA_INICIAL}</td>
                                        <td>{$valueBanner.DATA_FINAL}</td>
                                        <td>{if $valueBanner.ATIVO eq 'S'}<span class="icon-ok"></span>{else}<span class="icon-remove"></span>{/if}</td>
                                        <td>
                                            <div class="controls center">
                                                <a href="banner-cadastra?idBanner={$valueBanner.ID_BANNER}" class="tip" title="Editar"><span class="icon-pencil"></span></a>
                                                <a href="{$valueBanner.LINK}" title="Link Banner" class="tip" target="_blank"><span class="icon-share"></span></a>
                                            </div>
                                        </td>
                                    </tr>
                                    {/foreach}
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



