<?php
require_once CLASS_DIR.'menu.class.php';
$Menu = new Menu();
require_once CLASS_DIR.'produto.class.php';
$Produto = new Produto();

$menuTopoNivel1 = $Menu->fnMenu(1, null, null, 6);

$menuTopo = '<ul class="categoriasUl">';

foreach ($menuTopoNivel1 as $valueMenuTopoNivel1) {
	
	if($valueMenuTopoNivel1['ID_CATEGORIA'] == ID_CATEGORIA_PADRAO_1){
		$subMenuBlocoUl = "subMenuBlocoUlUtilidades";
		$subMenuBlocosUlFirst = "subMenuBlocosUlFirst";
	} else if($valueMenuTopoNivel1['ID_CATEGORIA'] == ID_CATEGORIA_PADRAO_2){
		$subMenuBlocoUl = "subMenuBlocoFerramentas";
		$subMenuBlocosUlFirst = "subMenuBlocosUlFirst";
	} else {
		$subMenuBlocoUl = "subMenuBlocoUlEletrodomesticos";
		$subMenuBlocosUlFirst = "";
	}

	$menuTopo .= '<li class="categoriasLi">
					<a href="/'.$valueMenuTopoNivel1['URL_AMIGAVEL'].'/" class="categoriasLink">'.fnPrimeiraMaiuscula($valueMenuTopoNivel1['DESCRICAO_CATEGORIA']).'</a>
					<ul class="subMenuUl '.$subMenuBlocoUl.' clearfix">
					<li>
					';
	
	$menuTopoNivel2 = $Menu->fnMenu(null,$valueMenuTopoNivel1['ID_CATEGORIA']);
 //print_r($menuTopoNivel2);
	if($valueMenuTopoNivel1['ID_CATEGORIA'] != ID_CATEGORIA_PADRAO_1 and $valueMenuTopoNivel1['ID_CATEGORIA'] != ID_CATEGORIA_PADRAO_2){
		$menuTopo .= '<ul class="subMenuBlocosUl ">';
	} 

	$i=0;
	foreach ($menuTopoNivel2 as $valueMenuTopoNivel2) {
		
		$i++;
		
		if($valueMenuTopoNivel1['ID_CATEGORIA'] == ID_CATEGORIA_PADRAO_1 or $valueMenuTopoNivel1['ID_CATEGORIA'] == ID_CATEGORIA_PADRAO_2){
			
			if($i <= 5){
				$menuTopo .= '<ul class="subMenuBlocosUl subMenuBlocosUlFirst">';
			} else {
				$menuTopo .= '<ul>';
			}
			
		}
				
		$menuTopoNivel3 = $Menu->fnMenu(null,$valueMenuTopoNivel2['ID_CATEGORIA']);

		if($menuTopoNivel3 or $valueMenuTopoNivel2['URL_AMIGAVEL'] == '8916-bar' or $valueMenuTopoNivel2['URL_AMIGAVEL'] == '8918-cafe'){
			$classNivel2 = "subMenuCategoriasLink2 subMenuCategoriasLinkFirst";
			$span = fnPrimeiraMaiuscula($valueMenuTopoNivel2['DESCRICAO_CATEGORIA']);
		} else {
			$classNivel2 = "subMenuCategoriasLink";
			$span = '<span> - '.fnPrimeiraMaiuscula($valueMenuTopoNivel2['DESCRICAO_CATEGORIA']).'</span>';
		}

		
		$menuTopo .= '
						<li class="subMenucategoriaFilha">
						<a class="'.$classNivel2.'" href="/'.$valueMenuTopoNivel1['URL_AMIGAVEL'].'/'.$valueMenuTopoNivel2['URL_AMIGAVEL'].'/">
						'.$span.'
						</a>
						</li>
			 			';
		
		
		foreach ($menuTopoNivel3 as $valueMenuTopoNivel3) {
			$menuTopo .= '<li class="subMenucategoriaFilha">
								<a class="subMenuCategoriasLink" href="/'.$valueMenuTopoNivel1['URL_AMIGAVEL'].'/'.$valueMenuTopoNivel2['URL_AMIGAVEL'].'/'.$valueMenuTopoNivel3['URL_AMIGAVEL'].'/">
									<span> - '.fnPrimeiraMaiuscula($valueMenuTopoNivel3['DESCRICAO_CATEGORIA']).'</span>
								</a>
							 </li>';
		}

		if($valueMenuTopoNivel1['ID_CATEGORIA'] == ID_CATEGORIA_PADRAO_1 or $valueMenuTopoNivel1['ID_CATEGORIA'] == ID_CATEGORIA_PADRAO_2){
			
			$menuTopo .= '</ul>';
			
		}

	}

	if($valueMenuTopoNivel1['ID_CATEGORIA'] != ID_CATEGORIA_PADRAO_1 and $valueMenuTopoNivel1['ID_CATEGORIA'] != ID_CATEGORIA_PADRAO_2){
		$menuTopo .= '</ul>';
	}	
		
	$menuTopo .= '</li></ul></li>';
}

$produtoPromoDia = $Produto->fnProdutoSite(URL_AMIGAVEL_PROMO_DIA);
$valueProdutoPromoDia = $produtoPromoDia[0];


$menuTopo .= '<li class="categoriasLi categoriasLiOfertas">
						<a class="categoriasLink" href="javascript:;">Ofertas</a>
						<div class="bannerOfertaDia">
							<a class="ofertaDiaLink" href="/'.$valueProdutoPromoDia['URL_AMIGAVEL'].'.html">
								<img alt="" src="'.MIDIA_DIR.'/produtos/detalhe/'.$valueProdutoPromoDia['IMAGEM_PRINCIPAL'].'">
							</a>
							<div class="descricaoOfertaDia">
								<a class="ofertaDiaLink" href="/'.$valueProdutoPromoDia['URL_AMIGAVEL'].'.html">
									<span class="produtoTitulo">
										'.$valueProdutoPromoDia['DESCRICAO_VENDA'].'
									</span>
									<div class="valoresOfertaDia">
										<span class="valorDe">De R$ '.fnFormataPreco($valueProdutoPromoDia['PRECO_VENDA']).'</span>
										<span class="parcelas">Por R$</span>
										<span class="valorPor">'.fnFormataPreco($valueProdutoPromoDia['PRECO_PROMOCIONAL']).'</span>
									</div>
								</a>
								<a class="btConfira" href="/'.$valueProdutoPromoDia['URL_AMIGAVEL'].'.html">CONFIRA</a>
								<span class="outrasOfertas"><a href="/produtos/&ofertas=S">+ veja outras ofertas</a></span>
							</div>
						</div>
					</li></ul>';

$smarty->assign('menuTopo',$menuTopo);

/*$menuTopo4 = '<ul class="categoriasUl">
<li class="categoriasLi">
						<a class="categoriasLink" href="javascript:;">Util. Dom&eacute;sticas</a>
						
						<ul class="subMenuUl subMenuBlocoUlUtilidades clearfix">
							<li>
								<!-- CASO HOUVER NECESSIDADE DE DUAS COLUNAS ADICIONAR A CLASSE "subMenuBlocosUlFirst" COMO ABAIXO -->
								<ul class="subMenuBlocosUl subMenuBlocosUlFirst">
									<li class="subMenucategoriaFilha">
										<a class="subMenuCategoriasLink2 subMenuCategoriasLinkFirst" href="javascript:;">Cozinha</a>
									</li>
									<li class="subMenucategoriaFilha">
										<a class="subMenuCategoriasLink" href="javascript:;">
											<span>Assadeiras e Formas</span>
										</a>
									</li>
									<li class="subMenucategoriaFilha">
										<a class="subMenuCategoriasLink" href="javascript:;">
											<span>Baixelas e Travessas</span>
										</a>
									</li>
									<li class="subMenucategoriaFilha">
										<a class="subMenuCategoriasLink" href="javascript:;">
											<span>Chaleiras</span>
										</a>
									</li>
									<li class="subMenucategoriaFilha">
										<a class="subMenuCategoriasLink" href="javascript:;">
											<span>Facas e Canivetes</span>
										</a>
									</li>
									<li class="subMenucategoriaFilha">
										<a class="subMenuCategoriasLink" href="javascript:;">
											<span>Faqueiros</span>
										</a>
									</li>
									<li class="subMenucategoriaFilha">
										<a class="subMenuCategoriasLink" href="javascript:;">
											<span>Panelas</span>
										</a>
									</li>
									<li class="subMenucategoriaFilha">
										<a class="subMenuCategoriasLink" href="javascript:;">
											<span>Talheres</span>
										</a>
									</li>
									<li class="subMenucategoriaFilha">
										<a class="subMenuCategoriasLink" href="javascript:;">
											<span>Lixeira</span>
										</a>
									</li>
									<li class="subMenucategoriaFilha">
										<a class="subMenuCategoriasLink" href="javascript:;">
											<span>Tesoura</span>
										</a>
									</li>
									<li class="subMenucategoriaFilha">
										<a class="subMenuCategoriasLink" href="javascript:;">
											<span>Utens&iacute;lios e Acess&oacute;rios</span>
										</a>
									</li>
								</ul>
								<ul class="subMenuBlocosUl">
									<li class="subMenucategoriaFilha">
										<a class="subMenuCategoriasLink2 subMenuCategoriasLinkFirst" href="javascript:;">Bar</a>
									</li>
									<li class="subMenucategoriaFilha">
										<a class="subMenuCategoriasLink2 subMenuCategoriasLinkFirst" href="javascript:;">Caf&eacute;</a>
									</li>
									<li class="subMenucategoriaFilha">
										<a class="subMenuCategoriasLink2 subMenuCategoriasLinkFirst" href="javascript:;">Churrasco</a>
									</li>
									<li class="subMenucategoriaFilha">
										<a class="subMenuCategoriasLink" href="javascript:;">
											<span>Acess&oacute;rios</span>
										</a>
									</li>
									<li class="subMenucategoriaFilha">
										<a class="subMenuCategoriasLink" href="javascript:;">
											<span>Carros para servir</span>
										</a>
									</li>
									<li class="subMenucategoriaFilha">
										<a class="subMenuCategoriasLink" href="javascript:;">
											<span>Conjuntos</span>
										</a>
									</li>
									<li class="subMenucategoriaFilha">
										<a class="subMenuCategoriasLink" href="javascript:;">
											<span>Espetos</span>
										</a>
									</li>
									<li class="subMenucategoriaFilha">
										<a class="subMenuCategoriasLink" href="javascript:;">
											<span>T&aacute;buas e Pranchas</span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="categoriasLi categoriasLiOfertas">
						<a class="categoriasLink" href="javascript:;">Ofertas</a>
					</li>
					</ul>';*/
?>