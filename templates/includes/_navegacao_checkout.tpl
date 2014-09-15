<div class="navegacaoContentCheckout">
	<ul class="checkoutOrdemUl">
		<!-- NO PASSO ATIVO COLOCAR AS CLASSES "numeroPassoAtivo e tituloPassoAtivo" COMO ABAIXO -->
		<li class="checkoutOrdemLi">
			<span class="numeroPasso {if $etapaPedido eq 1 || $etapaPedido eq 2 || $etapaPedido eq 3}numeroPassoAtivo{/if}">1</span>
			<span class="tituloPasso {if $etapaPedido eq 1 || $etapaPedido eq 2 || $etapaPedido eq 3}tituloPassoAtivo{/if}">dados pessoais</span>
		</li>

		<!-- NO PASSO ATIVO COLOCAR A CLASSE "checkoutLinhaAtiva" PARA A LINHA FICAR ATIVA COMO ABAIXO -->
		<span class="checkoutLinha checkoutLinha1 checkoutLinhaAtiva"></span>

		<li class="checkoutOrdemLi">
			<span class="numeroPasso {if $etapaPedido eq 3 || $etapaPedido eq 2}numeroPassoAtivo{/if}">2</span>
			<span class="tituloPasso {if $etapaPedido eq 3 || $etapaPedido eq 2}tituloPassoAtivo{/if}">pagamento e entrega</span>
		</li>

		<span class="checkoutLinha checkoutLinha2 {if $etapaPedido eq 3}checkoutLinhaAtiva{/if}"></span>

		<li class="checkoutOrdemLi checkoutOrdemLiLast">
			<span class="numeroPasso {if $etapaPedido eq 3}numeroPassoAtivo{/if}">3</span>
			<span class="tituloPasso {if $etapaPedido eq 3}tituloPassoAtivo{/if}">confirma&ccedil;&atilde;o</span>
		</li>
	</ul>
</div>
