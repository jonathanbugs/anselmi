<?php
$smarty->assign('titulo_pagina','Cadastra Promo&ccedil;&atilde;o');

/**/
if(isset($_REQUEST["idPromocao"])){
	
	$idPromocao = sqlvalue($_REQUEST["idPromocao"], false);
	
	$queryPromocao = "SELECT 
							PROM.ID_PROMOCAO,
							PROM.NOME_PROMOCAO,
							date_format(PROM.DATA_INICIAL,'%d/%m/%Y') AS DATA_INICIAL,
							date_format(PROM.DATA_FINAL,'%d/%m/%Y') AS DATA_FINAL,
							PROM.OBS,
							PROM.TIPO_PROMOCAO,
							PROM.VALOR,
							PROM.PROMOCAO_ATIVA,
							PROM.FRETE_GRATIS
						FROM
							e_PROMOCAO PROM
						WHERE
							PROM.ID_PROMOCAO = ".$idPromocao."";

	$listaPromocao = $mysqli->ConsultarSQL($queryPromocao);
	
	$smarty->assign('listaPromocao', $listaPromocao);

	/**/
	$queryCategoriaPromocao = "SELECT CATE_ID_CATEGORIA, PROD_ID_PRODUTO FROM e_PRODUTO_PROMOCAO WHERE PROM_ID_PROMOCAO = ".$idPromocao."";
	$rowCategoriaPromocao = $mysqli->ConsultarSQL($queryCategoriaPromocao);
	$arrayCategoriaPromocao = "";
	$arrayProdutoPromocao = "";
	foreach($rowCategoriaPromocao as $value){
		$arrayCategoriaPromocao[] .= $value["CATE_ID_CATEGORIA"];
		$arrayProdutoPromocao[] .= $value["PROD_ID_PRODUTO"];
	}
	
	$smarty->assign('stringCategoriaPromocao', implode(',', $arrayCategoriaPromocao));
	$smarty->assign('stringProdutoPromocao', implode(',', $arrayProdutoPromocao));
	/**/

	
} 
/**/


/*
$listaCategoria = escreveCategoriaInfinita("<ul>","",0,$arrayCategoriaPromocao, $mysqli);
$smarty->assign('listaCategoria',$listaCategoria);

function escreveCategoriaInfinita($codUl,$tabs,$cateIdCategoria, $arrayCategoriaPromocao=NULL, $mysqli){
    
    $queryCate = $mysqli->ExecutarSQL("SELECT ID_CATEGORIA, DESCRICAO_CATEGORIA FROM e_CATEGORIA WHERE ifnull(CATE_ID_CATEGORIA,0)=$cateIdCategoria ORDER BY ORDEM");
    
    $retorno = $codUl;

    if($queryCate==true){
        while($linha = $queryCate->fetch_array()){
            
            if(@in_array($linha['ID_CATEGORIA'], $arrayCategoriaPromocao)){
                $retorno .= $tabs."<li><input type='checkbox' name='categoria[]' checked='checked' value='".$linha['ID_CATEGORIA']."'>".$linha['DESCRICAO_CATEGORIA'];
            } else {
                $retorno .= $tabs."<li><input type='checkbox' name='categoria[]' value='".$linha['ID_CATEGORIA']."'>".$linha['DESCRICAO_CATEGORIA'];
            }
            	//testando se tem filhos
                $querySub = $mysqli->ExecutarSQL("SELECT ID_CATEGORIA, DESCRICAO_CATEGORIA FROM e_CATEGORIA WHERE ifnull(CATE_ID_CATEGORIA,0)=$linha[ID_CATEGORIA] ORDER BY ORDEM");
                if($mysqli->NumeroLinhas($querySub)>0){
                    $retorno .= $tabs.escreveCategoriaInfinita("<ul>",$tabs,$linha['ID_CATEGORIA'], $arrayCategoriaPromocao, $mysqli).$tabs;
                }
            //fim filhos
            $retorno .= "</li>";
        }
        $queryCate->free_result();
    }
    $retorno .= $tabs."</ul>";
    return $retorno;
}
/*/

#plugins
$smarty->append('js_files', PLUGINS_DIR.'form/jquery.form.js');

#JS
$smarty->append('js_files', JS_DIR.'promocao.js');

#CSS
$smarty->append('css_files', CSS_DIR.'promocao.css');
?>