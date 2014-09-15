<div class="sidebarCategorias">
	<ul class="categoriasUl">
		<li class="categoriasLi categoriaMae">
			<a href="javascript:;" class="categoriasLink">Meus pedidos</a>
		</li>
		<li class="categoriaFilha">
			<a class="categoriasLink categoriasLinkFirst {if $linkAtivo eq 'meusPedidos'}categoriasLinkAtivo{/if}" href="meus-pedidos">
				<span>Todos os Pedidos</span>
			</a>
		</li>
		<!--<li class="categoriaFilha">
			<a class="categoriasLink" href="javascript:;">
				<span>Pedidos em Aberto</span>
			</a>
		</li>
		<li class="categoriaFilha">
			<a class="categoriasLink" href="javascript:;">
				<span>Pedidos Entregues</span>
			</a>
		</li>-->
	</ul>
	<ul class="categoriasUl">
		<li class="categoriasLi categoriaMae">
			<a href="javascript:;" class="categoriasLink">Meus Dados</a>
		</li>
		<li class="categoriaFilha">
			<a class="categoriasLink categoriasLinkFirst {if $linkAtivo eq 'alterarEmail'}categoriasLinkAtivo{/if}" href="{$LINK}alterar-email">
				<span>Alterar E-mail</span>
			</a>
		</li>
		<li class="categoriaFilha">
			<a class="categoriasLink {if $linkAtivo eq 'alterarSenha'}categoriasLinkAtivo{/if}" href="{$LINK}alterar-senha">
				<span>Alterar Senha</span>
			</a>
		</li>
		<li class="categoriaFilha">
			<a class="categoriasLink {if $linkAtivo eq 'alterarDadosCadastrais'}categoriasLinkAtivo{/if}" href="{$LINK}alterar-dados-cadastrais">
				<span>Alterar Dados Cadastrais</span>
			</a>
		</li>
		<li class="categoriaFilha">
			<a class="categoriasLink {if $linkAtivo eq 'enderecoEntrega'}categoriasLinkAtivo{/if}" href="{$LINK}endereco-de-entrega">
				<span>Endere&ccedil;o de Entrega</span>
			</a>
		</li>
	</ul>
	<ul class="categoriasUl">
		<li class="categoriasLi categoriaMae">
			<a href="javascript:;" class="categoriasLink">Outros Servi&ccedil;os</a>
		</li>
		<!-- <li class="categoriaFilha">
			<a class="categoriasLink categoriasLinkFirst categoriasLinkAtivo" href="javascript:;">
				<span>2&ordf; via de boleto</span>
			</a>
		</li> -->
		<li class="categoriaFilha">
			<a class="categoriasLink categoriasLinkFirst {if $linkAtivo eq 'cuponsDesconto'}categoriasLinkAtivo{/if}" href="{$LINK}cupons-desconto">
				<span>Cupons de Desconto</span>
			</a>
		</li>
		<!-- <li class="categoriaFilha">
			<a class="categoriasLink" href="javascript:;">
				<span>Central de Atendimento</span>
			</a>
		</li> -->
	</ul>
</div>