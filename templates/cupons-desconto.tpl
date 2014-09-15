<div class="container">
	<div id="produtosContent" class="clearfix">
		<div class="navegacaoContent">
			<h2 class="tituloPagina">Outros Servi&ccedil;os</h2>
		</div>

		<!-- SIDEBAR CONTA -->
		{include file="../templates/includes/_sidebar_conta.tpl"}

		<div class="servicosContent">
			<span class="titulo">Cupons de Desconto</span>
			<span class="txtIntroServicos">Digite o c&oacute;digo do cupom no carrinho de compras para receber seu desconto.</span>

			<div class="blocoServicos">
				<div class="tabelaServicos tabelaLista tabelaColunas3">
					<div class="tabelaTitulos clearfix">
						<div class="table tableTitulo table1">
							<div class="tableCell">C&oacute;digo do Cupom</div>
						</div>
						<div class="table tableTitulo table2">
							<div class="tableCell">Valor do Desconto</div>
						</div>
						<div class="table tableTitulo table3">
							<div class="tableCell">Validade do Cupom</div>
						</div>
					</div>

					<!-- <div class="tabelaListas tabelaLista clearfix">
						<div class="table tableInfos table1">
							<div class="tableCell">cupom 0294833748</div>
						</div>
						<div class="table tableInfos table2">
							<div class="tableCell">
								20%
								R$ 20,00
								+ Frete Gr&aacute;tis
							</div>
						</div>
						<div class="table tableInfos table3">
							SE O CUPOM ESTIVER PARA VENCER COLOCAR A CLASSE "txtVencer" COMO ABAIXO 
							<div class="tableCell txtVencer">
								Venceu em 20/01/2014
									<br>
									Vence em 20 dias
								
							</div>
						</div>
					</div> -->


					<!-- LISTAGEM DE BOLETOS -->
					{foreach $listaCupons as $valueCupons}
					<div class="tabelaListas tabelaLista clearfix">
						<div class="table tableInfos table1">
							<div class="tableCell">{$valueCupons.CUPOM_PROMOCIONAL}</div>
						</div>
						<div class="table tableInfos table2">
							<div class="tableCell">
								{if $valueCupons.TIPO_DESCONTO eq 'P'}
									{if $valueCupons.VALOR_DESCONTO|number_format > 0}
										{$valueCupons.VALOR_DESCONTO|number_format}%
									{/if}
								{else}
									{if $valueCupons.VALOR_DESCONTO|number_format:2:",":"." > 0}
										R$ {$valueCupons.VALOR_DESCONTO|number_format:2:",":"."}
									{/if}
								{/if}
								{if $valueCupons.FRETE_GRATIS eq 'S'}
									+ Frete Gr&aacute;tis
								{/if}
							</div>
						</div>
						<div class="table tableInfos table3">
							<!-- SE O CUPOM ESTIVER PARA VENCER COLOCAR A CLASSE "txtVencer" COMO ABAIXO -->
							<div class="tableCell {if $valueCupons.DIAS_VENCIMENTO < 10 and $valueCupons.DIAS_VENCIMENTO > 0}txtVencer{else if $valueCupons.VENCIDO eq 'S'}txtVenceu{/if}">{if $valueCupons.VENCIDO eq 'S'}Venceu em{/if} {$valueCupons.DATA_FINAL_VALIDADE}
								{if $valueCupons.DIAS_VENCIMENTO < 10 and $valueCupons.DIAS_VENCIMENTO > 0}
									<br>
									Vence em {$valueCupons.DIAS_VENCIMENTO} dias
								{/if}
							</div>
						</div>
					</div>
					{/foreach}

					
				</div>
			</div>	
		</div>
	</div>
</div>
