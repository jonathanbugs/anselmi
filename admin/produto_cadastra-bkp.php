<?php
$smarty->assign('titulo_pagina','Cadastra Produto');

$queryProdutoSituacao = "SELECT ID_PRODUTO_SITUACAO, DESCRICAO_SITUACAO FROM e_PRODUTO_SITUACAO";
$produtoSituacao = $mysqli->ConsultarSQL($queryProdutoSituacao);
$smarty->assign('produtoSituacao',$produtoSituacao);

$queryPessoaFabricante = "SELECT ID_PESSOA, NOME FROM e_PESSOA";
$pessoaFabricante = $mysqli->ConsultarSQL($queryPessoaFabricante);
$smarty->assign('pessoaFabricante',$pessoaFabricante);

/**/
$queryAtributo = "SELECT 
						ATRI.ID_ATRIBUTO,
						ATRI.DESCRICAO_ATRIBUTO
					FROM
						e_ATRIBUTO ATRI
					WHERE
						EXISTS (SELECT 1 FROM e_ATRIBUTO_VALOR ATVA WHERE ATRI.ID_ATRIBUTO = ATVA.ATRI_ID_ATRIBUTO)";

$listaAtributo = $mysqli->ConsultarSQL($queryAtributo);

$smarty->assign('listaAtributo',$listaAtributo);
/**/
/**/
$queryAtributoProduto = "SELECT 
							ATVA.ID_ATRIBUTO_VALOR,
							ATVA.VALOR,
							ATVA.ATRI_ID_ATRIBUTO
						FROM
							e_ATRIBUTO_VALOR ATVA";

$listaAtributoProduto = $mysqli->ConsultarSQL($queryAtributoProduto);

$smarty->assign('listaAtributoProduto',$listaAtributoProduto);
/**/

/**/
$queryCategoria = $mysqli->ExecutarSQL("SELECT ID_CATEGORIA, DESCRICAO_CATEGORIA, IFNULL(CATE_ID_CATEGORIA,0) CATE_ID_CATEGORIA FROM E_CATEGORIA");

while($rowCategoria = mssql_fetch_object($queryCategoria)){
	$arrayCategorias[$rowCategoria->CATE_ID_CATEGORIA][$rowCategoria->ID_CATEGORIA] = array("ID_CATEGORIA" => $rowCategoria->ID_CATEGORIA, "DESCRICAO_CATEGORIA" => $rowCategoria->DESCRICAO_CATEGORIA);
}

//print_r($arrayCategorias);
echo imprimeCategoriaInfinita($arrayCategorias);
$listaCategoria = $arrayCategorias;
$smarty->assign('listaCategoria',$listaCategoria);
/**/


function imprimeCategoriaInfinita( array $CateTotal , $idPai = 0, $nivel = 0 )
{
    
    $abreUl = str_repeat( "\t" , $nivel ).'<ul>';
    
    foreach( $CateTotal[$idPai] as $idCate => $CateItem)
    {
    
        $abreLi = str_repeat( "\t" , $nivel + 1 ).'<li><input type="checkbox" name="categoria[]" value="'.$CateItem['ID_CATEGORIA'].'">'.$CateItem['DESCRICAO_CATEGORIA'].'</a>';

        if( isset( $CateTotal[$idCate] ) ) imprimeCategoriaInfinita( $CateTotal , $idCate , $nivel + 2);

        $fechaLi = str_repeat( "\t" , $nivel + 1 ).'</li>';
    }
   
   $fechaUl = str_repeat( "\t" , $nivel ).'</ul>';
    
    return $abreUl.$abreLi.$fechaLi.$fechaUl;
}

#plugins
$smarty->append('js_files', PLUGINS_DIR.'form/jquery.form.js');

#JS
$smarty->append('js_files', JS_DIR.'produto.js');

#CSS
$smarty->append('css_files', '');
?>

