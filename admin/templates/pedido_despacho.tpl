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
                                        <span>Lista Pedido</span>
                                        <!--<form class="box-form right" action="">
                                            <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown">
                                                <span class="icon16 iconic-icon-cog"></span>
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="pessoa-cadastra">
                                                        <span class="icon-pencil"></span> Novo
                                                    </a>
                                                </li>
                                            </ul>
                                        </form>-->
                                    </h4>
                                </div>
                                <div class="content noPad clearfix">
	                                
									<div class="form-row row-fluid">
                                            <div class="span6">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="normal">ID Pedido</label>
                                                    <input type="text" name="idPedidoDespacho" id="idPedidoDespacho" class="span6">
                                                </div>
                                            </div>
                                        </div>
                                        
                               <div class="form-row row-fluid">
                               		<div class="span12">
                                        
		                               <form class="form-horizontal" id="despacharPedido" action="{$ACTIONS_DIR}pedido.php" method="post"/> 
						
										<input type="hidden" value="despacharPedido" name="acao" id="acao">
		                                
		                                    <table class="responsive table table-bordered" id="pedidoItemManutencao" width="100%">
		                                        <thead>
		                                            <tr>
		                                                <th>#</th>
		                                                <th>Pedido</th>
		                                                <th>Data Emiss&atilde;o</th>
		                                                <th>Cliente</th>
		                                                <th>E-mail</th>
		                                                <th>Situa&ccedil;&atilde;o do Pedido</th>
		                                                <th>Cod Rastreamento</th>
		                                                
		                                          </tr>
		                                        </thead>
		                                        <tbody>
		                                            {foreach $listaPedido as $valorPedido}
		                                              <tr id="tr{$valorPedido.NUMERO_PEDIDO}">
		                                                <td><input type="checkbox" readonly="readonly" class="nostyle" value="{$valorPedido.ID_PEDIDO}" name="idPedido[]" id="idPedido{$valorPedido.NUMERO_PEDIDO}"></td>
		                                                <td>{$valorPedido.NUMERO_PEDIDO}</td>
		                                                <td>{$valorPedido.DATA_EMISSAO}</td>
		                                                <td>{$valorPedido.NOME}</td>
		                                                <td>{$valorPedido.EMAIL}</td>
		                                                <td>{$valorPedido.DESCRICAO_PEDIDO_ITEM_SITUACAO}</td>
		                                                <td><input type="text" class="span12 codRastreamento" name="codRastreamento[{$valorPedido.ID_PEDIDO}]" id="codRastreamento{$valorPedido.NUMERO_PEDIDO}"></td>
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
		                                    
		                                    <div class="form-row row-fluid">
		                                    	<div class="span6">
		                                        	<div class="row-fluid">
		                                            	<label class="form-label span6" for="normal">Pedidos não encontrados</label>
		                                                <input type="text" readonly="readonly" name="pedidoNaoEncontrados" id="pedidoNaoEncontrados" class="span6">
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="form-actions">
			                                   <button type="submit" class="btn btn-info">Salvar</button>
			                                   <!--<button type="button" class="btn">Cancelar</button>-->
			                                </div>
		                                    
		                                    </form>
		                                 </div>
		                              </div>
		                                    
                                    
                                    
                                </div>

                            </div><!-- End .box -->

                        </div><!-- End .span12 -->

                    </div><!-- End .row-fluid -->
               
               <div id="teste"></div>
                
                

               
    			<!-- Page end here -->
    				
               
            </div><!-- End contentwrapper -->
        </div><!-- End #content -->
    
    </div><!-- End #wrapper -->

   