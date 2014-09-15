<section class="sessaoListaCasamento">
	<div id="blocoLogo">
		<img class="logo" src="../lista-casamento/img/logo_menor.png" alt="Lista de Casamento Comlines">
		<a class="btVoltar" href="/lc/{$url}">Voltar para a lista</a>
	</div>
	<div id="blocoImagem">
		{if $fotoCapa}
		<img class="imagemNoivos" src="../lista-casamento/fotos/{$fotoCapa}" alt="Noivos">
		{/if}
	</div>
	<div id="blocoNomes">
		<span class="nome">{$nomeConjuge1}</span>
		<span class="divisor">&</span>
		<span class="nome">{$nomeConjuge2}</span>
	</div>
</section>