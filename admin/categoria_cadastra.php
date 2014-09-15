<?php
$smarty->assign('titulo_pagina','Categoria Produto');

/**/
if($_GET['idCategoria']){
	$idCategoria = sqlvalue($_GET['idCategoria'], false);

	$query = "SELECT
					ID_CATEGORIA,
					DESCRICAO_CATEGORIA,
					CATE_ID_CATEGORIA,
					ATIVO,
					ORDEM,
					CATEGORIA_INICIAL,
					META_TITLE,
					META_DESCRIPTION,
					META_KEYWORDS
				FROM
					e_CATEGORIA
				WHERE
					ID_CATEGORIA = ".$idCategoria."";

	$visualizaCategoriaProduto = $mysqli->ConsultarSQL($query);

}

$smarty->assign('visualizaCategoriaProduto',$visualizaCategoriaProduto);

/**/

/**/
if(count($visualizaCategoriaProduto) > 0){
    foreach ($visualizaCategoriaProduto as $value) {
    	$arrayCategoriaProduto[] = $value['CATE_ID_CATEGORIA'];
    }
}

$listaCategoria = escreveCategoriaInfinita("<ul>","",0,$arrayCategoriaProduto, $mysqli);
$smarty->assign('listaCategoria',$listaCategoria);

function escreveCategoriaInfinita($codUl,$tabs,$cateIdCategoria, $arrayCategoriaProduto=NULL, $mysqli){
    
    global $idCategoria;
    if($idCategoria){
    	$where = " AND ID_CATEGORIA <> ".$idCategoria." ";
    }

    $queryCate = $mysqli->ExecutarSQL("SELECT ID_CATEGORIA, DESCRICAO_CATEGORIA FROM e_CATEGORIA WHERE IFNULL(CATE_ID_CATEGORIA,0)=$cateIdCategoria ".$where." ORDER BY ORDEM");
    
    $retorno = $codUl;

    if($queryCate==true){
        while($linha = $queryCate->fetch_array()){
            
            if(in_array($linha['ID_CATEGORIA'], $arrayCategoriaProduto)){
                $retorno .= $tabs."<li><input type='radio' name='categoria[]' checked='checked' value='".$linha['ID_CATEGORIA']."'>".$linha['DESCRICAO_CATEGORIA'];
            } else {
                $retorno .= $tabs."<li><input type='radio' name='categoria[]' value='".$linha['ID_CATEGORIA']."'>".$linha['DESCRICAO_CATEGORIA'];
            }
            	//testando se tem filhos
                $querySub = $mysqli->ExecutarSQL("SELECT ID_CATEGORIA, DESCRICAO_CATEGORIA FROM e_CATEGORIA WHERE IFNULL(CATE_ID_CATEGORIA,0)=$linha[ID_CATEGORIA] ".$where." ORDER BY ORDEM");
                if($mysqli->NumeroLinhas($querySub)>0){
                    $retorno .= $tabs.escreveCategoriaInfinita("<ul>",$tabs,$linha['ID_CATEGORIA'], $arrayCategoriaProduto, $mysqli).$tabs;
                }
            //fim filhos
            $retorno .= "</li>";
        }
        $queryCate->free_result();
    } 
    $retorno .= $tabs."</ul>";
    return $retorno;
}
/**/


#plugins
$smarty->append('js_files', PLUGINS_DIR.'form/jquery.form.js');

#JS
$smarty->append('js_files', JS_DIR.'categoria.js');

#CSS
#$smarty->append('css_files', CSS_DIR.'categoria.css');

?>