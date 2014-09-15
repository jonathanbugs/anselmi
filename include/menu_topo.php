<?php
require_once CLASS_DIR.'menu.class.php';
$Menu = new Menu($mysqli);
require_once CLASS_DIR.'produto.class.php';
$Produto = new Produto($mysqli);

//include('array_menu_topo.php');
$menuTopoNivel1 = $Menu->_fnMenu(1, null, null, null);
//$menuTopoNivel1 = $menu;

$arrayCategoria = array();
$arrayCategoria2 = array();
$arrayCategoria3 = array();
foreach ($menuTopoNivel1 as $value) {
	array_push($arrayCategoria, array(
			'ID_CATE1' => $value['ID_CATE1'],
			'DESC_CATE1' => $value['DESC_CATE1'],
			'URL_CATE1' => $value['URL_CATE1'],
			'CATE_ID_CATE1' => $value['CATE_ID_CATE1']
		)
	);
	array_push($arrayCategoria2, array(
			'ID_CATE2' => $value['ID_CATE2'],
			'DESC_CATE2' => $value['DESC_CATE2'],
			'URL_CATE2' => $value['URL_CATE2'],
			'CATE_ID_CATE2' => $value['CATE_ID_CATE2']
		)
	);
	if($value['CATE_ID_CATE3']){
		array_push($arrayCategoria3, array(
				'ID_CATE3' => $value['ID_CATE3'],
				'DESC_CATE3' => $value['DESC_CATE3'],
				'URL_CATE3' => $value['URL_CATE3'],
				'CATE_ID_CATE3' => $value['CATE_ID_CATE3']
			)
		);
	}
}

$arrayCategoria = array_map("unserialize", array_unique(array_map("serialize", $arrayCategoria)));
$arrayCategoria2 = array_map("unserialize", array_unique(array_map("serialize", $arrayCategoria2)));
$arrayCategoria3 = array_map("unserialize", array_unique(array_map("serialize", $arrayCategoria3)));

$_arrayCategoria2 = array();
foreach ($arrayCategoria2 as $value) {
	$_arrayCategoria2[$value['CATE_ID_CATE2']][] = $value;
}
$_arrayCategoria3 = array();
foreach ($arrayCategoria3 as $value) {
	$_arrayCategoria3[$value['CATE_ID_CATE3']][] = $value;
}

$classLink = '';

$menuTopo = '<ul class="categoriasUl">
				<li class="categoriasLi categoriasLiTodos">
					<a class="categoriasLink" href="javascript:;">Todos os Departamentos</a>
					<ul>';
					foreach ($arrayCategoria as $valueMenuTopoNivel1) { 
						$menuTopo .= '<li>
							<a class="icone" href="'.ROOT_DIR.$valueMenuTopoNivel1['URL_CATE1'].'/">'.fnPrimeiraMaiuscula($valueMenuTopoNivel1['DESC_CATE1']).'</a> 
							';
							if(isset($_arrayCategoria2[$valueMenuTopoNivel1['ID_CATE1']][0]['ID_CATE2']) and $_arrayCategoria2[$valueMenuTopoNivel1['ID_CATE1']][0]['ID_CATE2'] > 0){
								$menuTopo .= '<ul>';
									foreach ($arrayCategoria2 as $valueMenuTopoNivel2) {
										if($valueMenuTopoNivel2['CATE_ID_CATE2'] == $valueMenuTopoNivel1['ID_CATE1']){
											if(isset($_arrayCategoria3[$valueMenuTopoNivel2['ID_CATE2']][0]['ID_CATE3']) and $_arrayCategoria3[$valueMenuTopoNivel2['ID_CATE2']][0]['ID_CATE3'] > 0){ $class = 'class="liSelecionado"'; $seta = ''; } else { $class = ''; $seta = ' - '; }
											$menuTopo .= '<li><a '.$class.' '.$classLink.' href="'.ROOT_DIR.$valueMenuTopoNivel1['URL_CATE1'].'/'.$valueMenuTopoNivel2['URL_CATE2'].'/">'.$seta.fnPrimeiraMaiuscula($valueMenuTopoNivel2['DESC_CATE2']).'</a>';
											if(isset($_arrayCategoria3[$valueMenuTopoNivel2['ID_CATE2']][0]['ID_CATE3']) and $_arrayCategoria3[$valueMenuTopoNivel2['ID_CATE2']][0]['ID_CATE3'] > 0){ $menuTopo .= '<ul>'; } 
											
											if(isset($_arrayCategoria3[$valueMenuTopoNivel2['ID_CATE2']])){
												foreach ($_arrayCategoria3[$valueMenuTopoNivel2['ID_CATE2']] as $valueMenuTopoNivel3) {
													if($valueMenuTopoNivel3['CATE_ID_CATE3'] > 0 and $valueMenuTopoNivel3['CATE_ID_CATE3'] == $valueMenuTopoNivel2['ID_CATE2']){
														$menuTopo .= '<li><a '.$classLink.' href="'.ROOT_DIR.$valueMenuTopoNivel1['URL_CATE1'].'/'.$valueMenuTopoNivel2['URL_CATE2'].'/'.$valueMenuTopoNivel3['URL_CATE3'].'/"> - '.fnPrimeiraMaiuscula($valueMenuTopoNivel3['DESC_CATE3']).'</a></li>';
													}
												}
											}
											
											if(isset($_arrayCategoria3[$valueMenuTopoNivel2['ID_CATE2']][0]['ID_CATE3']) and $_arrayCategoria3[$valueMenuTopoNivel2['ID_CATE2']][0]['ID_CATE3'] > 0){ $menuTopo .= '</ul>'; }
											$menuTopo .= '</li>';
										}
									}
								$menuTopo .= '</ul>';
							}
							$menuTopo .= ' 
						</li>
						';
					}
					$menuTopo .= '</ul>
				</li>
			';

$iBreak=0;
foreach ($arrayCategoria as $valueMenuTopoNivel1) {
	$iBreak++;
	if($iBreak == 6){
		break;
	}

	if($valueMenuTopoNivel1['ID_CATE1'] == ID_CATEGORIA_PADRAO_1){
		$subMenuBlocoUl = "subMenuBlocoUlUtilidades";
		$subMenuBlocosUlFirst = "subMenuBlocosUlFirst";
	} else if($valueMenuTopoNivel1['ID_CATE1'] == ID_CATEGORIA_PADRAO_2){
		$subMenuBlocoUl = "subMenuBlocoFerramentas";
		$subMenuBlocosUlFirst = "subMenuBlocosUlFirst";
	} else {
		$subMenuBlocoUl = "subMenuBlocoUlEletrodomesticos";
		$subMenuBlocosUlFirst = "";
	}

	$menuTopo .= '			
				<li class="categoriasLi">
					<a href="'.ROOT_DIR.$valueMenuTopoNivel1['URL_CATE1'].'/" class="categoriasLink">'.fnPrimeiraMaiuscula($valueMenuTopoNivel1['DESC_CATE1']).'</a>
					<ul class="subMenuUl '.$subMenuBlocoUl.' clearfix">
				<li>
				';
	
	//$menuTopoNivel2 = $Menu->fnMenu(null,$valueMenuTopoNivel1['ID_CATEGORIA']);
 //print_r($menuTopoNivel2);
	if($valueMenuTopoNivel1['ID_CATE1'] != ID_CATEGORIA_PADRAO_1 and $valueMenuTopoNivel1['ID_CATE1'] != ID_CATEGORIA_PADRAO_2){
		$menuTopo .= '<ul class="subMenuBlocosUl ">';
	} 

	$i=0;
	foreach ($arrayCategoria2 as $valueMenuTopoNivel2) {

		if($valueMenuTopoNivel2['CATE_ID_CATE2'] == $valueMenuTopoNivel1['ID_CATE1']){
			
			$i++;
			
			if($valueMenuTopoNivel1['ID_CATE1'] == ID_CATEGORIA_PADRAO_1 or $valueMenuTopoNivel1['ID_CATE1'] == ID_CATEGORIA_PADRAO_2){
				
				if($i <= 5){
					$menuTopo .= '<ul class="subMenuBlocosUl subMenuBlocosUlFirst">';
				} else {
					$menuTopo .= '<ul>';
				}
				
			}
					
			//$menuTopoNivel3 = $Menu->fnMenu(null,$valueMenuTopoNivel2['ID_CATEGORIA']);

			if(isset($_arrayCategoria3[$valueMenuTopoNivel2['ID_CATE2']]) or $valueMenuTopoNivel2['URL_CATE2'] == '8916-bar' or $valueMenuTopoNivel2['URL_CATE2'] == '8918-cafe'){
				$classNivel2 = "subMenuCategoriasLink2 subMenuCategoriasLinkFirst";
				$span = fnPrimeiraMaiuscula($valueMenuTopoNivel2['DESC_CATE2']);
			} else {
				$classNivel2 = "subMenuCategoriasLink";
				$span = '<span> - '.fnPrimeiraMaiuscula($valueMenuTopoNivel2['DESC_CATE2']).'</span>';
			}

			
			$menuTopo .= '
							<li class="subMenucategoriaFilha">
							<a class="'.$classNivel2.'" href="'.ROOT_DIR.$valueMenuTopoNivel1['URL_CATE1'].'/'.$valueMenuTopoNivel2['URL_CATE2'].'/">
							'.$span.'
							</a>
							</li>
				 			';
			
			if(isset($_arrayCategoria3[$valueMenuTopoNivel2['ID_CATE2']])){
				foreach ($_arrayCategoria3[$valueMenuTopoNivel2['ID_CATE2']] as $valueMenuTopoNivel3) {
					if($valueMenuTopoNivel3['CATE_ID_CATE3'] == $valueMenuTopoNivel2['ID_CATE2']){
					$menuTopo .= '<li class="subMenucategoriaFilha">
										<a class="subMenuCategoriasLink" href="'.ROOT_DIR.$valueMenuTopoNivel1['URL_CATE1'].'/'.$valueMenuTopoNivel2['URL_CATE2'].'/'.$valueMenuTopoNivel3['URL_CATE3'].'/">
											<span> - '.fnPrimeiraMaiuscula($valueMenuTopoNivel3['DESC_CATE3']).'</span>
										</a>
									 </li>';
					}
				}
			}

			if($valueMenuTopoNivel1['ID_CATE1'] == ID_CATEGORIA_PADRAO_1 or $valueMenuTopoNivel1['ID_CATE1'] == ID_CATEGORIA_PADRAO_2){
				
				$menuTopo .= '</ul>';
				
			}
		}

	}

	if($valueMenuTopoNivel1['ID_CATE1'] != ID_CATEGORIA_PADRAO_1 and $valueMenuTopoNivel1['ID_CATE1'] != ID_CATEGORIA_PADRAO_2){
		$menuTopo .= '</ul>';
	}	
		
	$menuTopo .= '</li></ul></li>';
}


//$produtoPromoDia = $Produto->fnProdutoSite(URL_AMIGAVEL_PROMO_DIA);
//$valueProdutoPromoDia = $produtoPromoDia[0];
$valueProdutoPromoDia = null;



$menuTopo .= '
				<li class="categoriasLi categoriasLiOfertas">
						<a class="categoriasLink" href="'.ROOT_DIR.'produtos/&ofertas=S">Ofertas</a>
				</li>
				</ul>
				<!--<div class="ofertaDia">
					<a class="categoriasLink" href="javascript:;">Oferta do dia</a>
					<div class="bannerOfertaDia">
						<a class="ofertaDiaLink" href="'.ROOT_DIR.$valueProdutoPromoDia['URL_AMIGAVEL'].'.html">
							<img alt="" src="https://www2.lojaspr.com.br/midia/produtos/detalhe/'.$valueProdutoPromoDia['IMAGEM_PRINCIPAL'].'">
						</a>
						<div class="descricaoOfertaDia">
							<a class="ofertaDiaLink" href="'.ROOT_DIR.$valueProdutoPromoDia['URL_AMIGAVEL'].'.html">
								<span class="produtoTitulo">
									'.$valueProdutoPromoDia['DESCRICAO_VENDA'].'
								</span>
								<div class="valoresOfertaDia">
									<span class="valorDe">De R$ '.fnFormataPreco($valueProdutoPromoDia['PRECO_VENDA']).'</span>
									<span class="parcelas">Por R$</span>
									<span class="valorPor">'.fnFormataPreco($valueProdutoPromoDia['PRECO_PROMOCIONAL']).'</span>
								</div>
							</a>
							<a class="btConfira" href="'.ROOT_DIR.$valueProdutoPromoDia['URL_AMIGAVEL'].'.html">CONFIRA</a>
						</div>
					</div>
				</div>-->
				';

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