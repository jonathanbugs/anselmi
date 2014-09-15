<?php
require_once(PHP_ROOT.'/'.CLASS_DIR.'/produto.class.php');
$Produto = new Produto($mysqli);

require_once(PHP_ROOT.'/'.CLASS_DIR.'/compre_junto.class.php');
$CompreJunto = new CompreJunto($mysqli);

$smarty->assign('titulo_pagina','Cadastra Produto');

/*produto*/
if(isset($_GET["idProduto"])){
    
    $idProduto = sqlvalue($_GET["idProduto"], false);
    $produto = $Produto->fnProduto($idProduto);
    $smarty->assign('produto',$produto);

    /**/
    $queryCategoriaProduto = "SELECT CATE_ID_CATEGORIA FROM e_PRODUTO_CATEGORIA WHERE PROD_ID_PRODUTO = ".$idProduto."";
    $rowCategoriaProduto = $mysqli->ConsultarSQL($queryCategoriaProduto);
    $arrayCategoriaProduto = "";
    foreach($rowCategoriaProduto as $value){
        $arrayCategoriaProduto[] .= $value["CATE_ID_CATEGORIA"];
    }
    //printr($arrayCategoriaProduto);
    /**/

    /**/
    $produtoPreco = $Produto->fnProdutoPreco($idProduto);

    foreach ($produtoPreco as $value) {
        if($value['TPVE_ID_TABELA_PRECO_VENDA'] == 1){
            $precoVenda = $value['VALOR'];
            $precoVendaDataInicial = $value['DATA_INICIAL_VALIDADE'];
        } elseif($value['TPVE_ID_TABELA_PRECO_VENDA'] == 2){
            $precoPromocional = $value['VALOR'];
            $precoPromocionalDataInicial = $value['DATA_INICIAL_VALIDADE'];
            $precoPromocionalDataFinal = $value['DATA_FINAL_VALIDADE'];
        }
    }

    $smarty->assign('precoVenda', $precoVenda);
    $smarty->assign('precoVendaDataInicial', $precoVendaDataInicial);
    $smarty->assign('precoPromocional', $precoPromocional);
    $smarty->assign('precoPromocionalDataInicial', $precoPromocionalDataInicial);
    $smarty->assign('precoPromocionalDataFinal', $precoPromocionalDataFinal);
    $smarty->assign('markup', $produtoPreco[0]['MARKUP']);

    $produtoPrecoTodos = $Produto->fnProdutoPrecoTodos($idProduto);
    $smarty->assign('produtoPrecoTodos', $produtoPrecoTodos);
    $smarty->assign('dataAtual', date('d/m/Y').'');
    /**/

    /**/
    $queryNivelAuxProduto = "SELECT
                                    NIAU.DESCRICAO_NIVEL_AUXILIAR,
                                    NIAU.ID_NIVEL_AUXILIAR,
                                    NAVA.VALOR,
                                    NAVA.ID_NIVEL_AUX_VALOR
                                FROM
                                    e_NIVEL_AUXILIAR NIAU,
                                    e_NIVEL_AUXILIAR_VALOR NAVA,
                                    e_PRODUTO_NIVEL_AUXILIAR_VALOR PNAV
                                WHERE
                                    NIAU.ID_NIVEL_AUXILIAR = NAVA.NIAU_ID_NIVEL_AUX
                                AND NAVA.ID_NIVEL_AUX_VALOR = PNAV.NAVA_ID_NIVEL_AUX_VALOR
                                AND PNAV.PROD_ID_PRODUTO = ".$idProduto."
                                ORDER BY 
                                    NIAU.ID_NIVEL_AUXILIAR,
                                    NAVA.VALOR";
    $resultNivelAuxProduto = $mysqli->ConsultarSQL($queryNivelAuxProduto);
    foreach ($resultNivelAuxProduto as $value) {
        $arrayNivelAuxProduto[$value['DESCRICAO_NIVEL_AUXILIAR']][] = $value;
    }
    $smarty->assign('listaNivelAuxProduto', $arrayNivelAuxProduto);
    /**/
}
/**/

$dataAtual = date('d/m/Y');
$smarty->assign('dataAtual',$dataAtual);

/*produto situacao*/
$queryProdutoSituacao = "SELECT ID_PRODUTO_SITUACAO, DESCRICAO_SITUACAO FROM e_PRODUTO_SITUACAO";
$produtoSituacao = $mysqli->ConsultarSQL($queryProdutoSituacao);
$smarty->assign('produtoSituacao',$produtoSituacao);
/**/

/*nivel aux produto*/
$queryNivelAux = "SELECT
                        NIAU.DESCRICAO_NIVEL_AUXILIAR,
                        NIAU.ID_NIVEL_AUXILIAR,
                        NAVA.VALOR,
                        NAVA.ID_NIVEL_AUX_VALOR
                    FROM
                        e_NIVEL_AUXILIAR NIAU,
                        e_NIVEL_AUXILIAR_VALOR NAVA
                    WHERE
                        NIAU.ID_NIVEL_AUXILIAR = NAVA.NIAU_ID_NIVEL_AUX
                    ORDER BY 
                        NIAU.ID_NIVEL_AUXILIAR,
                        NAVA.VALOR";
$nivelAux = $mysqli->ConsultarSQL($queryNivelAux);
foreach ($nivelAux as $value) {
    $arrayNivelAux[$value['DESCRICAO_NIVEL_AUXILIAR']][] = $value;
}
$smarty->assign('listaNivelAux',$arrayNivelAux);
/**/


/*fabricante*/
$queryPessoaFabricante = "SELECT ID_PESSOA, CASE TIPO WHEN 'F' THEN concat(NOME,' ',SOBRENOME) ELSE NOME_FANTASIA END NOME FROM e_PESSOA WHERE PETC_ID_PESSOA_TIPO_CATEGORIA = ".ID_PESSOA_FABRICANTE;
$pessoaFabricante = $mysqli->ConsultarSQL($queryPessoaFabricante);
$smarty->assign('pessoaFabricante',$pessoaFabricante);
/**/

/*atributos*/
$listaAtributo = $Produto->fnAtributo();
$smarty->assign('listaAtributo',$listaAtributo);
/**/

/*atributo produto*/
$listaAtributoProduto = $Produto->fnAtributoProduto();
$smarty->assign('listaAtributoProduto',$listaAtributoProduto);
/**/

/*combinacao produto*/
if(isset($_GET["idProduto"])){

    $idProduto = sqlvalue($_GET["idProduto"], false);

    $queryCombinacaoProduto = "SELECT
                                    PRCO.REFERENCIA,
                                    PRCO.ID_PRODUTO_COMBINACAO CODIGO_UNICO,
                                    PCAV.ATVA_ID_ATRIBUTO_VALOR,
                                    ATVA.VALOR,
                                    PRCO.PRECO_VENDA,
                                    ATRI.DESCRICAO_ATRIBUTO,
                                    PRCO.PRODUTO_PRINCIPAL
                                FROM
                                    e_PRODUTO PROD,
                                    e_PRODUTO_COMBINACAO PRCO,
                                    e_PRODUTO_COMBINACAO_ATRIBUTO_VALOR PCAV,
                                    e_ATRIBUTO_VALOR ATVA,
                                    e_ATRIBUTO ATRI
                                WHERE
                                    PROD.ID_PRODUTO = ".$idProduto."
                                AND PRCO.PROD_ID_PRODUTO = PROD.ID_PRODUTO
                                AND PRCO.ID_PRODUTO_COMBINACAO = PCAV.PRCO_ID_PRODUTO_COMBINACAO
                                AND PCAV.ATVA_ID_ATRIBUTO_VALOR = ATVA.ID_ATRIBUTO_VALOR
                                AND ATVA.ATRI_ID_ATRIBUTO = ATRI.ID_ATRIBUTO";

    $resultCombinacaoProduto = $mysqli->ConsultarSQL($queryCombinacaoProduto);

    if(count($resultCombinacaoProduto) > 0){
        foreach ($resultCombinacaoProduto as $valueCombinacaoProduto) {
            $arrayCombinacao1[$valueCombinacaoProduto['CODIGO_UNICO']]['REFERENCIA'] = $valueCombinacaoProduto['REFERENCIA'];
            $arrayCombinacao1[$valueCombinacaoProduto['CODIGO_UNICO']]['CODIGO_UNICO'] = $valueCombinacaoProduto['CODIGO_UNICO'];
            $arrayCombinacao1[$valueCombinacaoProduto['CODIGO_UNICO']]['PRECO_VENDA'] = $valueCombinacaoProduto['PRECO_VENDA'];
            $arrayCombinacao2[$valueCombinacaoProduto['CODIGO_UNICO']][] = $valueCombinacaoProduto['VALOR'];
        }

        $arrayCombinacao1 = array_map('array_unique', $arrayCombinacao1);
    }

    $smarty->assign('listaCombinacao2', $arrayCombinacao2);
    $smarty->assign('listaCombinacao1', $arrayCombinacao1);
}
/**/

/*estoque/imagem produto*/
if(isset($_GET["idProduto"])){
    
    $idProduto = sqlvalue($_GET["idProduto"], false);
    
    $listaEstoqueProduto = $Produto->fnEstoqueProduto($idProduto);

    foreach ($listaEstoqueProduto as $valueEstoqueProduto) {
        $listaImagemEstoque[$valueEstoqueProduto['ID_PRODUTO_COMBINACAO']][$valueEstoqueProduto['IMAGEM']] = $valueEstoqueProduto['ORDEM'];
        $listaEstoqueProduto_[$valueEstoqueProduto['ID_PRODUTO_COMBINACAO']] = $valueEstoqueProduto;
    }

    $urlImagem = 'http://'.$_SERVER['HTTP_HOST'].'/midia/produtos/carrinho-de-compras/';
    $smarty->assign('listaImagemEstoque', $listaImagemEstoque);
    $smarty->assign('urlImagem', $urlImagem);
    $smarty->assign('listaEstoqueProduto',$listaEstoqueProduto_);
}
/**/

/**/
$queryOperacaoDeposito = "SELECT
                                OPDE.ID_OPERACAO_DEPOSITO ID,
                                OPDE.DESCRICAO_OPERACAO_DEPOSITO DESCRICAO,
                                OPDE.TIPO_OPERACAO_DEPOSITO TIPO,
                                'OPDE' TABELA
                            FROM
                                e_OPERACAO_DEPOSITO OPDE

                            UNION

                            SELECT
                                DEPO.ID_DEPOSITO ID,
                                DEPO.DESCRICAO_DEPOSITO DESCRICAO,
                                NULL TIPO,
                                'DEPO' TABELA
                            FROM
                                e_DEPOSITO DEPO";

$consultaOperacaoDeposito = $mysqli->ConsultarSQL($queryOperacaoDeposito);

foreach($consultaOperacaoDeposito as $valorOperacaoDeposito){
    if($valorOperacaoDeposito["TABELA"] == "OPDE"){
        $listaOperacaoDeposito[] = $valorOperacaoDeposito;
    }elseif($valorOperacaoDeposito["TABELA"] == "DEPO"){
        $listaDeposito[] = $valorOperacaoDeposito;
    }
}

$smarty->assign('listaOperacaoDeposito', $listaOperacaoDeposito);
$smarty->assign('listaDeposito', $listaDeposito);
/**/

/**/
$listaCategoria = escreveCategoriaInfinita("<ul>","",0,$arrayCategoriaProduto, $mysqli);
$smarty->assign('listaCategoria',$listaCategoria);

function escreveCategoriaInfinita($codUl,$tabs,$cateIdCategoria, $arrayCategoriaProduto=NULL, $mysqli){
    
    $queryCate = $mysqli->ExecutarSQL("SELECT ID_CATEGORIA, DESCRICAO_CATEGORIA FROM e_CATEGORIA WHERE ifnull(CATE_ID_CATEGORIA,0)=$cateIdCategoria ORDER BY ORDEM");
    
    $retorno = $codUl;

    if($queryCate==true){
        while($linha = $queryCate->fetch_array()){
            
            if(@in_array($linha['ID_CATEGORIA'], $arrayCategoriaProduto)){
                $retorno .= $tabs."<li><input type='checkbox' name='categoria[]' checked='checked' value='".$linha['ID_CATEGORIA']."'>".$linha['DESCRICAO_CATEGORIA'];
            } else {
                $retorno .= $tabs."<li><input type='checkbox' name='categoria[]' value='".$linha['ID_CATEGORIA']."'>".$linha['DESCRICAO_CATEGORIA'];
            }
            	//testando se tem filhos
                $querySub = $mysqli->ExecutarSQL("SELECT ID_CATEGORIA, DESCRICAO_CATEGORIA FROM e_CATEGORIA WHERE ifnull(CATE_ID_CATEGORIA,0)=$linha[ID_CATEGORIA] ORDER BY ORDEM");
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

/*tipo frete*/
if(isset($_GET["idProduto"])){
	$where = " AND PTFR.PROD_ID_PRODUTO = ".$idProduto." ";
} else {
	$where = "";
}
$queryTipoFrete = "SELECT 
						TIFR.ID_TIPO_FRETE,
						TIFR.DESCRICAO_FRETE,
						PTFR.PROD_ID_PRODUTO
					FROM
						e_TIPO_FRETE TIFR LEFT JOIN e_PRODUTO_TIPO_FRETE PTFR
												 ON PTFR.TIFR_ID_TIPO_FRETE = TIFR.ID_TIPO_FRETE
												 ".$where."";

$listaTipoFrete = $mysqli->ConsultarSQL($queryTipoFrete);
$smarty->assign('listaTipoFrete', $listaTipoFrete);
/**/

/**/
$listaProdutoCompreJunto = $CompreJunto->fnCompreJunto($idProduto);
$smarty->assign('listaProdutoCompreJunto', $listaProdutoCompreJunto);
/**/



#plugins
$smarty->append('js_files', PLUGINS_DIR.'form/jquery.form.js');

#JS
$smarty->append('js_files', JS_DIR.'produto.js');

#CSS
$smarty->append('css_files', CSS_DIR.'produto.css');
?>

