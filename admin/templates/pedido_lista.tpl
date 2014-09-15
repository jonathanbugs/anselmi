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
										<a class="btn btn-mini modal-toggle box-form right" href="#exportaArquivo">
											<span class="icon16 icomoon-icon-file-excel"></span>
											Exportar
										</a>
									</h4>
								</div>
								<div class="content noPad clearfix" id="tabelaListaPedido">
									<table id="tableListaPedido" cellpadding="0" cellspacing="0" border="0" class="responsive display table table-bordered" width="100%">
										<thead>
											<tr>
												<th>#</th>
												<th>Pedido</th>
												<th>Data Emiss&atilde;o</th>
												<th>Cliente</th>
												<th>CPF/CNPJ</th>
												<th>E-mail</th>
												<th>Valor Pedido</th>
												<th>Forma de Pagamento</th>
												<th>Situa&ccedil;&atilde;o do Pedido</th>
												<!-- <th>Lista Casamento</th> -->
												<th>A&ccedil;&atilde;o</th>
										  </tr>
										</thead>
										<tbody>
											<tr></tr>
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


<form class="form-horizontal dialog" id="exportaArquivo" action="{$ACTIONS_DIR}relatorio_pedido.php" method="post" title="Exportar Pedidos" />
	<input value="exportaArquivo" name="acao" type="hidden" />
	<div class="form-row row-fluid">
		<div class="span12">
			<div class="row-fluid">
				<label class="form-label span4" for="busca">Busca</label>
				<div class="span8 controls">
					<input class="span12" name="busca" id="busca" value="" />
				</div>
			</div>
		</div>
	</div>
	<div class="form-row row-fluid">
		<div class="span12">
			<div class="row-fluid">
				<label class="form-label span4" for="checkboxes">Situa&ccedil;&atilde;o do Pedido</label>
				<div class="span8 controls">
					<select name="situacaoPedido[]" id="situacaoPedido" class="nostyle" multiple="multiple" style="height: 150px;">
						{foreach $pedidos as $p}
						<option value="{$p.ID_PEDIDO_ITEM_SITUACAO}" selected="selected">{$p.DESCRICAO_PEDIDO_ITEM_SITUACAO}</option>
						{/foreach}
					</select>
				</div>
			</div>
		</div>
	</div>
	<div class="form-row row-fluid">
		<div class="span12">
			<div class="row-fluid">
				<label class="form-label span4" for="checkboxes">Data</label>
				<div class="span8 controls">
					<span class="span5"><input class="span12 datepicker" name="dataDe" id="dataDe" value="{$passada}" /></span>
					<span class="span2" style="text-align: center; line-height: 30px;">At&eacute;:</span>
					<span class="span5"><input class="span12 datepicker" name="dataAte" id="dataAte" value="{$hoje}" /></span>
				</div>
			</div>
		</div>
	</div>
</form>
