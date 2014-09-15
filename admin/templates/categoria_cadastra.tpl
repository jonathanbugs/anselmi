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
                                    <span>Categoria</span>
                                    
                                </h4>
                                
                            </div>

                            <div class="content">

                                {foreach $visualizaCategoriaProduto as $valueCategoriaProduto}{/foreach}
                            
                                <form class="form-horizontal" id="cadastroCategoria" action="{$ACTIONS_DIR}categoria.php" method="post"/>
                                            
                                    {if $valueCategoriaProduto.ID_CATEGORIA}
                                    <input type="hidden" name="acao" value="editarCategoria">
                                    {else}
                                    <input type="hidden" name="acao" value="cadastrarCategoria">
                                    {/if}
                                    

                                    <div class="form-row row-fluid">
                                        <div class="span9">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">ID Categoria</label>
                                                <input class="span2" id="idCategoria" type="text" name="idCategoria" readonly="readonly" value="{$valueCategoriaProduto.ID_CATEGORIA}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span9">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Descri&ccedil;&atilde;o Categoria</label>
                                                <input class="span8" id="descricaoCategoria" type="text" name="descricaoCategoria" required="required" value="{$valueCategoriaProduto.DESCRICAO_CATEGORIA}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span9">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Ativo</label>
                                                <input id="ativo" type="checkbox" name="ativo" value="S" {if $valueCategoriaProduto.ATIVO eq 'S'}checked="checked"{/if} />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span9">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Ordem</label>
                                                <input class="span2" id="ordem" type="text" name="ordem" value="{$valueCategoriaProduto.ORDEM}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span9">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Meta Title</label>
                                                <input class="span8" id="metaTitle" type="text" name="metaTitle" value="{$valueCategoriaProduto.META_TITLE}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span9">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Meta Description</label>
                                                <input class="span8" id="metaDescription" type="text" name="metaDescription" value="{$valueCategoriaProduto.META_DESCRIPTION}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span9">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Meta Keywords</label>
                                                <input class="span8" id="metaKeywords" type="text" name="metaKeywords" value="{$valueCategoriaProduto.META_KEYWORDS}"  />
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="form-row row-fluid">
                                            <div class="span3">
                                                <label class="form-label span12" for="required">Categorias</label>
                                            </div>
                                            <div class="span8">    
                                                <div class="row-fluid">
                                                    <ul><li><input type="radio" name="categoria[]" value="I" {if $valueCategoriaProduto.CATEGORIA_INICIAL eq 'S'}checked="checked"{/if}> Categoria Principal</li></ul>
                                                   {$listaCategoria}
                                                </div>
                                            </div>
                                    </div>

                                    <div class="form-actions">
                                       <button type="submit" class="btn btn-info">Salvar</button>
                                       <!--<button type="button" class="btn">Cancelar</button>-->
                                    </div>
                                    <div id="teste"></div>

                                </form>

                            </div>

                        </div><!-- End .box -->

                    </div><!-- End .span6 -->

                </div><!-- End .row-fluid -->

           
            <!-- Page end here -->
                
           
        </div><!-- End contentwrapper -->
    </div><!-- End #content -->

</div><!-- End #wrapper -->

   

