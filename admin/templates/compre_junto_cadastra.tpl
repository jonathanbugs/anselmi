<div id="wrapper">

    {include file="sidebar.tpl"}

    <!--Body content-->
    <div id="content" class="clearfix">
        <div class="contentwrapper"><!--Content wrapper-->

            {include file="heading.tpl"}

            <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

                {foreach $listaCompreJunto as $valorCompreJunto}{/foreach}

                

                <form class="form-horizontal" id="cadastraCompreJunto" action="{$ACTIONS_DIR}compre_junto.php" method="post"/>
                <div class="row-fluid">

                    <div class="span12">

                        <div class="box">

                            <div class="title">

                                <h4>
                                    <span class="icon16 brocco-icon-grid"></span>
                                    <span>Cadastra Compre Junto</span>
                                </h4>
                                
                            </div>
                            <div class="content">
                               
                                
                                    {if $valorCompreJunto.ID_PRODUTO_COMPRE_JUNTO }
                                    <input type="hidden" name="acao" value="editaCompreJunto">
                                    {else}
                                    <input type="hidden" name="acao" value="cadastraCompreJunto">
                                    {/if}
                                    

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">ID Compre Junto</label>
                                                <input class="span2" id="idCompreJunto" type="text" name="idCompreJunto" value="{$valorCompreJunto.ID_PRODUTO_COMPRE_JUNTO}" readonly />
                                            </div>
                                        </div>
                                    </div>                       
                                    

                                    
                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="required">Descri&ccedil;&atilde;o</label>
                                                <input class="span8" id="descricaoCompreJunto" type="text" name="descricaoCompreJunto" required="required" value="{$valorCompreJunto.DESCRICAO}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4">Tipo Desconto</label>
                                                <div class="span4 controls">
                                                    <select id="tipoDesconto" name="tipoDesconto">
                                                        {if $valorCompreJunto.TIPO_DESCONTO eq 'P'}
                                                        <option value="P" checked>PERCENTUAL</option>
                                                        <option value="V">VALOR</option>
                                                        <option value="">SEM DESCONTO</option>
                                                        {elseif $valorCompreJunto.TIPO_DESCONTO eq 'V'}
                                                        <option value="V" checked>VALOR</option>
                                                        <option value="P">PERCENTUAL</option>
                                                        <option value="">SEM DESCONTO</option>
                                                        {else}
                                                        <option value="" checked>SEM DESCONTO</option>
                                                        <option value="P">PERCENTUAL</option>
                                                        <option value="V">VALOR</option>
                                                        {/if}
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4">Valor Desconto</label>
                                                <input class="span4 mask-moeda-real" id="valorDesconto" type="text" name="valorDesconto" value="{$valorCompreJunto.VALOR_DESCONTO|number_format:2:",":"."}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <label class="form-label span4" for="normal">Ativo</label>
                                                {if $valorCompreJunto.ATIVO eq 'S'}
                                                <input id="ativaCompreJunto" type="checkbox" name="ativaCompreJunto" value="S" checked="checked" />
                                                {else}
                                                <input id="ativaCompreJunto" type="checkbox" name="ativaCompreJunto" value="S" />
                                                {/if}
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-actions">
                                       <button type="submit" class="btn btn-info">Salvar</button>
                                       <!--<button type="button" class="btn">Cancelar</button>-->
                                    </div>
                                    <div id="teste"></div>  

                            </div>

                        </div><!-- End .box -->

                    </div>

                    </form>

                    <div class="row-fluid">

                        <div class="span12">

                            <div class="box gradient">

                                <div class="title">
                                    <h4>
                                        <span>Lista Produto</span>
                                        
                                    </h4>
                                </div>
                                <div class="content noPad" id="tabelaListaProdutoCombinacao">
                                    <table id="tableListaProdutoCombinacao" cellpadding="0" cellspacing="0" border="0" class="responsive display table table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <!--<th>ID</th>-->
                                                <th>Imagem</th>
                                                <th>Descri&ccedil;&atilde;o Venda</th>
                                                <th>Refer&ecirc;ncia</th>
                                                <th>Situa&ccedil;&atilde;o</th>
                                                <th>Adicionar</th>
                                                <th>For&ccedil;a</th>
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
                

                    <!--<div class="span6">



                        <div class="box">

                            <div class="title">

                                <h4>
                                    <span class="icon16 brocco-icon-grid"></span>
                                    <span>Compre Junto Produto</span>
                                </h4>
                                
                            </div>
                            <div class="content">


                                <div class="form-actions">
                                       <button type="submit" class="btn btn-info">Salvar</button>
                                       <button type="button" class="btn">Cancelar</button>
                                    </div>
                                    <div id="teste">123</div>

                            </div>
                        </div>
 
                    </div>-->
                </div>

                

               
            <!-- Page end here -->
                
           
        </div><!-- End contentwrapper -->
    </div><!-- End #content -->

</div><!-- End #wrapper -->

   

