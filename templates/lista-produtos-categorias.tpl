<div class="container">
	<div id="produtosContent" class="clearfix">
		<div class="navegacaoContent">
			<ul class="navegacaoUl clearfix">
				<li class="navegacaoLi">
					<a class="navegacaoLink" href="{$BASE_DIR}">Inicial</a>
					{foreach $navegacaoCategoria as $valueNavegacaoCategoria}
						{if $valueNavegacaoCategoria@iteration eq $countCategorias}
						{break}
						{/if}
						/ <a class="navegacaoLink" href="{$valueNavegacaoCategoria.URL_AMIGAVEL}">{$valueNavegacaoCategoria.DESCRICAO_CATEGORIA}</a>
					{/foreach}
				</li>
			</ul>
			<h2 class="tituloCategoria">{$tituloCategoria}</h2>
		</div>


		<!-- SIDEBAR CATEGORIAS -->
		<div class="sidebarCategorias">
			{$menuSidebar}
			
			<!-- SIDEBAR COM FILTROS --> 
			{*include file="../templates/includes/_sidebar_filtros.tpl"*}
			
		</div>


		{include file="../templates/includes/_produtos.tpl"}
	</div>
</div>
