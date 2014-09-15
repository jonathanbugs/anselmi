<?php
$menuSidebar = '';

$idCategoriaVisitando = $getCategorias[count($getCategorias)-1]['ID_CATEGORIA'];

if($idProdutoCombinacaoAtributoValor){
	$filtroIdsProdutos = $idProdutoCombinacaoAtributoValor;
}

$linkAdicional = '';
if($_GET['ofertas']){
	$linkAdicional = '&ofertas=S';
}

//$menuSidebarNivel1 = $Menu->_fnMenu(1, null, $getCategorias,null,$filtroOfertas,$filtroIdsProdutos);
//$menuSidebarNivel1 = $Menu->_fnMenu(1, null, $getCategorias,null,$filtroOfertas,$filtroIdsProdutos);
if($sessao == 'inicial' or count($resultCategorias) == 0){
	$menuSidebarNivel1 = $menuTopoNivel1;
} else {
	$menuSidebarNivel1 = $Menu->_fnMenu(1, null, $getCategorias,null,$filtroOfertas,$filtroIdsProdutos);
}

$arrayCategoria = array();
$arrayCategoria2 = array();
$arrayCategoria3 = array();
foreach ($menuSidebarNivel1 as $value) {
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
	array_push($arrayCategoria3, array(
			'ID_CATE3' => $value['ID_CATE3'],
			'DESC_CATE3' => $value['DESC_CATE3'],
			'URL_CATE3' => $value['URL_CATE3'],
			'CATE_ID_CATE3' => $value['CATE_ID_CATE3']
		)
	);
}

$arrayCategoria = array_map("unserialize", array_unique(array_map("serialize", $arrayCategoria)));
$arrayCategoria2 = array_map("unserialize", array_unique(array_map("serialize", $arrayCategoria2)));
$arrayCategoria3 = array_map("unserialize", array_unique(array_map("serialize", $arrayCategoria3)));

$_arrayCategoria3 = array();
foreach ($arrayCategoria3 as $value) {
	$_arrayCategoria3[$value['CATE_ID_CATE3']][] = $value;
}

foreach ($arrayCategoria as $valueMenuSidebarNivel1) { 

	if($valueMenuSidebarNivel1['ID_CATE1'] == $idCategoriaVisitando){
		$classCategoriaVisitando = 'categoriaVisitando';
	} else {
		$classCategoriaVisitando = '';
	}

	$menuSidebar .= '<ul class="categoriasUl">
						<li class="categoriasLi categoriaMae">
							<a href="'.ROOT_DIR.$valueMenuSidebarNivel1['URL_CATE1'].'/'.$linkAdicional.'" class="categoriasLink '.$classCategoriaVisitando.'">'.fnPrimeiraMaiuscula($valueMenuSidebarNivel1['DESC_CATE1']).'</a>
					 	</li>
					 ';
	
	//$menuSidebarNivel2 = $Menu->fnMenu(null,$valueMenuSidebarNivel1['ID_CATE1'],NULL,NULL,$filtroOfertas,$filtroIdsProdutos);
	
	$i=0;
	foreach ($arrayCategoria2 as $valueMenuSidebarNivel2) {

		if($valueMenuSidebarNivel2['CATE_ID_CATE2'] == $valueMenuSidebarNivel1['ID_CATE1']){

			if($valueMenuSidebarNivel2['ID_CATE2'] == $idCategoriaVisitando){
				$classCategoriaVisitando = 'categoriaVisitando';
			} else {
				$classCategoriaVisitando = '';
			}
			
			//$menuSidebarNivel3 = $Menu->fnMenu(null,$valueMenuSidebarNivel2['ID_CATE2'],NULL,NULL,$filtroOfertas,$filtroIdsProdutos);

			if($_arrayCategoria3[$valueMenuSidebarNivel2['ID_CATE2']] or $valueMenuSidebarNivel2['URL_CATE2'] == '8918-cafe' or $valueMenuSidebarNivel2['URL_CATE2'] == '8916-bar'){
				$classNivel2 = "categoriasLink2 categoriasLinkFirst";
			} else {
				if($i == 0) { $classNivel2 = "categoriasLink categoriasLinkFirst"; } else { $classNivel2 = "categoriasLink"; $i=0; }
			}
			$i++;

			$menuSidebar .= '<li class="categoriaFilha">
								<a class="'.$classNivel2.' '.$classCategoriaVisitando.'" href="'.ROOT_DIR.$valueMenuSidebarNivel1['URL_CATE1'].'/'.$valueMenuSidebarNivel2['URL_CATE2'].'/'.$linkAdicional.'">
									<span>'.fnPrimeiraMaiuscula($valueMenuSidebarNivel2['DESC_CATE2']).'</span>
								</a>
							 </li>';
			
			
			foreach ($_arrayCategoria3[$valueMenuSidebarNivel2['ID_CATE2']] as $valueMenuSidebarNivel3) {

				if($valueMenuSidebarNivel3['ID_CATE3'] == $idCategoriaVisitando){
					$classCategoriaVisitando = 'categoriaVisitando';
				} else {
					$classCategoriaVisitando = '';
				}
				if($valueMenuSidebarNivel3['CATE_ID_CATE3'] == $valueMenuSidebarNivel2['ID_CATE2']){
					$menuSidebar .= '<li class="categoriaFilha">
										<a class="categoriasLink '.$classCategoriaVisitando.'" href="'.ROOT_DIR.$valueMenuSidebarNivel1['URL_CATE1'].'/'.$valueMenuSidebarNivel2['URL_CATE2'].'/'.$valueMenuSidebarNivel3['URL_CATE3'].'/'.$linkAdicional.'">
											<span>'.fnPrimeiraMaiuscula($valueMenuSidebarNivel3['DESC_CATE3']).'</span>
										</a>
									 </li>';
				}
			}
		}
		
	}
	
	$menuSidebar .= '</ul>';
}
?>