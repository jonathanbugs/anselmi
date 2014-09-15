<ul class="categoriasUl">
	<li class="categoriasLi categoriaMae">
		<a href="javascript:;" class="categoriasLink">Minha Lista</a>
	</li>
	<li class="categoriaFilha">
		<a href="/lista-de-casamento-editar-produtos/" class="categoriasLink categoriasLinkFirst {if $sessao eq 'lista-de-casamento-editar-produtos'}categoriasLinkAtivo{/if}">
			<span>Editar Produtos</span>
		</a>
	</li>
	<li class="categoriaFilha">
		<a href="/lista-de-casamento-divulgar-lista/" class="categoriasLink {if $sessao eq 'lista-de-casamento-divulgar-lista'}categoriasLinkAtivo{/if}">
			<span>Divulgar minha lista</span>
		</a>
	</li>
	<li class="categoriaFilha">
		<a href="/lista-de-casamento-alterar-dados/" class="categoriasLink {if $sessao eq 'lista-de-casamento-alterar-dados'}categoriasLinkAtivo{/if}">
			<span>Alterar meus dados</span>
		</a>
	</li>
	<li class="categoriaFilha">
		<a href="/lista-de-casamento-excluir/" class="categoriasLink {if $sessao eq 'lista-de-casamento-excluir'}categoriasLinkAtivo{/if}">
			<span>Excluir lista</span>
		</a>
	</li>
</ul>