<div id="wrapper">

    {include file="sidebar.tpl"}

    <!--Body content-->
    <div id="content" class="clearfix">
        <div class="contentwrapper"><!--Content wrapper-->

            {include file="heading.tpl"}

            <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

         <form class="form-horizontal" id="cadastrarPedido" action="{$ACTIONS_DIR}pedido.php" method="post"/>

         <input type="hidden" name="acao" value="cadastrarPedido">

                
            <div class="row-fluid">

                <div class="span6">

                    <div class="box">

                        <div class="title">

                            <h4>
                                <!-- <span class="icon16 brocco-icon-grid"></span> -->
                                <span>Dados Pedido</span>
                            </h4>
                            
                        </div>
                        <div class="content">
                        
                        <div class="form-row row-fluid">
                            <div class="span11">
                                <div class="row-fluid">
                                    <label class="form-label span4" for="required">Nome Pessoa</label>
                                    <input type="hidden" id="idPessoa" name="idPessoa" style="width:300px" class="input-xlarge" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span4" for="required">Endere&ccedil;o Entrega</label>
                                    <select name="enderecoEntrega" id="enderecoEntrega">
                                        <option value="0" selected="selected">Selecione</option>
                                    </select>
                                    <div class="margin padding right" id="load-endereco-entrega"><img alt="" src="images/loaders/horizontal/063.gif"></img></div>
                                </div>
                            </div>
                        </div> 
                        
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span4" for="required">Tipo Frete</label>
                                    <select name="tipoFreteCadastra" id="tipoFreteCadastra">
                                    {foreach $listaTipoFrete as $valorTipoFrete}
                                        <option value="{$valorTipoFrete.ID_TIPO_FRETE}">{$valorTipoFrete.ID_TIPO_FRETE} - {$valorTipoFrete.DESCRICAO_FRETE}</option>
                                    {/foreach}
                                    </select>
                                </div>
                            </div>
                        </div>                           
                        
                        </div>
 
                    </div><!-- End .box -->

                </div>
                
                <div class="span6">

                    <div class="box">

                                <div class="title">
                                    <h4>
                                        
                                        <span>Forma de Pagamento</span>
                                    </h4>
                                </div>

                                <div class="content">
                                     
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span6" for="required">Parcelas</label>
                                                    <select id="nroParcelas" name="nroParcelas">
                                                        {foreach $listaNroParcelas as $valorNroParcelas}
                                                        <option value="{$valorNroParcelas}">{$valorNroParcelas}x</option>
                                                        {/foreach}
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                       <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span6" for="required">Forma de Pagamento</label>
                                                    <select id="formaPagamento" name="formaPagamento">
                                                        {foreach $listaTipoFormaPagamento as $keyTipoFormaPagamento => $valorTipoFormaPagamento}
                                                            <optgroup label="{$keyTipoFormaPagamento}">
                                                            {foreach $valorTipoFormaPagamento as $idFormaPagamento => $formaPagamento}
                                                                <option value="{$idFormaPagamento}">{$formaPagamento}</option>
                                                            {/foreach}
                                                            </optgroup>
                                                        {/foreach}
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span6" for="required">Tipo Lan&ccedil;amento</label>
                                                    <select id="tipoLancamento" name="tipoLancamento">
                                                        <option value="P">Pagamento</option>
                                                        <option value="E">Estorno</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                </div>

                            </div><!-- End .box -->

                </div>

            </div>

            <div class="row-fluid">

                <div class="span12">

                    <div class="box gradient">

                        <div class="title">
                            <h4>
                                <span>Produtos</span>
                                
                            </h4>
                        </div>
                        <div class="content noPad clearfix" id="tabelaListaProduto">
                        
                        	<input type="text" value="" id="idsProdutos" name="idsProdutos">
                             
                            <table id="tableListaProduto" cellpadding="0" cellspacing="0" border="0" class="responsive display table table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Descri&ccedil;&atilde;o Venda</th>
                                        <th>Refer&ecirc;ncia</th>
                                        <th>Adicionar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr></tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="7">
                                            <div class="form-actions">
                                               <button type="submit" class="btn btn-info">Salvar</button>
                                               <!--<button type="button" class="btn">Cancelar</button>-->
                                            </div>
                                            <div id="teste">123</div>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>


                        </div>

                    </div><!-- End .box -->



                </div><!-- End .span12 -->

            </div><!-- End .row-fluid -->

        </form>

           
            <!-- Page end here -->
                
           
        </div><!-- End contentwrapper -->
    </div><!-- End #content -->

</div><!-- End #wrapper -->

   

