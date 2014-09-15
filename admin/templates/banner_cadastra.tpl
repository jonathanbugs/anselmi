<div id="wrapper">

    {include file="sidebar.tpl"}

    <!--Body content-->
    <div id="content" class="clearfix">
        <div class="contentwrapper"><!--Content wrapper-->

            {include file="heading.tpl"}
            <div id="teste"></div>
            <!-- Build page from here: Usual with <div class="row-fluid"></div> -->
            <form class="form-horizontal" id="cadastraBanner" action="{$ACTIONS_DIR}banner.php" method="post"/>
                <div class="row-fluid">

                    <div class="span12">

                        <div class="box">

                            <div class="title">

                                <h4>
                                    <span class="icon16 brocco-icon-grid"></span>
                                    <span>Cadastra Banner</span>
                                </h4>
                                
                            </div>
                            <div class="content">

                                    {if $idBanner}
                                        <input type="hidden" name="acao" value="cadastraBanner">
                                    {else}
                                        <input type="hidden" name="acao" value="editarBanner">
                                    {/if}

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Legenda</label>
                                                <input class="span8" id="legenda" type="text" name="legenda" value="{$legenda}" required="required"/>
                                            </div>
                                        </div>
                                    </div>                       
                               
                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Imagem</label>
                                                <input class="span8" id="imagem" type="file" name="imagem"  />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Link</label>
                                                <input value="{$link}" class="span8" id="link" type="text" name="link" />
                                            </div>
                                        </div>
                                    </div>  

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Data Inicial</label>
                                                <input value="{$dataInicial}" class="span4 mask-date" id="dataInicial" type="text" name="dataInicial" required="required" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Data Final</label>
                                                <input value="{$dataFinal}" class="span4 mask-date" id="dataFinal" type="text" name="dataFinal" required="required" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Ativo</label>
                                                {if $ativo eq 'S' or !$ativo}
                                                <input id="ativo" type="checkbox" name="ativo" checked="checked" />
                                                {else}
                                                <input id="ativo" type="checkbox" name="ativo" />
                                                {/if}
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-actions">
                                       <button type="submit" class="btn btn-info">Salvar</button>
                                       <!--<button type="button" class="btn">Cancelar</button>-->
                                    </div>
                                    <!--<div id="teste">123</div>  -->

                            </div>

                        </div><!-- End .box -->

                    </div>
                

                    
                </div>

                </form>

                
            <!-- Page end here -->
                
           
        </div><!-- End contentwrapper -->
    </div><!-- End #content -->

</div><!-- End #wrapper -->

   

