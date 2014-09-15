<?
ini_set('display_errors', 1);
ini_set('log_errors', 1);
error_reporting(E_ALL);

set_time_limit(0);

require('configs/config.php');

if(TABELA_PRODUTO_SITE == 'e_TABELA_PRODUTO_SITE_2'){
	$tabelaAtualiza = 'e_TABELA_PRODUTO_SITE_1';
} else {
	$tabelaAtualiza = 'e_TABELA_PRODUTO_SITE_2';
}

$queryDelete = "DELETE FROM ".$tabelaAtualiza.";";
$mysqli->ExecutarSQL($queryDelete);

$queryInsert = "INSERT INTO ".$tabelaAtualiza."
				           (PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR
				           ,PROD_ID_PRODUTO
				           ,PRCO_ID_PRODUTO_COMBINACAO
				           ,DESCRICAO_VENDA
				           ,REFERENCIA
				           ,DESCRICAO_LONGA
				           ,DESCRICAO_CURTA
				           ,PRECO_VENDA
				           ,PRECO_PROMOCIONAL
				           ,TIPO_PROMOCAO
				           ,VALOR_PROMOCAO
				           ,DATA_INICIAL_VALIDADE_PROMO
				           ,DATA_FINAL_VALIDADE_PROMO
				           ,FRETE_GRATIS
				           /*,CATE_ID_CATEGORIA
				           ,DESCRICAO_CATEGORIA*/
				           ,DATA_INICIAL_LANCAMENTO
				           ,DATA_FINAL_LANCAMENTO
				           ,PNAU_ID_PRODUTO_NIVEL_AUXILIAR
				           ,DESCRICAO_PRODUTO_NIVEL_AUXILIAR
				           ,URL_AMIGAVEL_PNAUX
				           ,TAGS
				           ,URL_AMIGAVEL
				           ,META_TITLE
				           ,META_DESCRIPTION
				           ,META_KEYWORDS
				           ,VIDEO
				           ,IMAGEM_PRINCIPAL
				           ,PESO_KG
				           ,ALTURA_CM
				           ,LARGURA_CM
				           ,PROFUNDIDADE_CM)
				     
				     SELECT 
				            PCAV.ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR
				           ,PROD.ID_PRODUTO
				           ,PRCO.ID_PRODUTO_COMBINACAO
				           ,PROD.NOME
				           ,PROD.REFERENCIA
				           ,PROD.DESCRICAO_LONGA
				           ,PROD.DESCRICAO_CURTA
				           ,fn_valor_venda_produto(PROD.ID_PRODUTO, 1, now()) PRECO_VENDA
				           ,fn_valor_venda_produto(PROD.ID_PRODUTO, 2, now()) PRECO_PROMOCIONAL
				           ,(SELECT TIPO_PROMOCAO FROM fn_produto_promocao_ativa(PROD.ID_PRODUTO, 1, now())) TIPO_PROMOCAO
				           ,(SELECT VALOR FROM fn_produto_promocao_ativa(PROD.ID_PRODUTO, 1, now())) VALOR_PROMOCAO
				           ,(SELECT DATA_INICIAL FROM fn_produto_promocao_ativa(PROD.ID_PRODUTO, 1, now())) DATA_INICIAL_PROMO
				           ,(SELECT DATA_FINAL FROM fn_produto_promocao_ativa(PROD.ID_PRODUTO, 1, now())) DATA_FINAL_PROMO
				           ,(SELECT FRETE_GRATIS FROM fn_produto_promocao_ativa(PROD.ID_PRODUTO, 1, now())) FRETE_GRATIS
				           ,PROD.DATA_INICIAL_LANCAMENTO
				           ,PROD.DATA_FINAL_LANCAMENTO
				           ,PROD.PNAU_ID_PRODUTO_NIVEL_AUXILIAR
				           ,PNAU.DESCRICAO_PRODUTO_NIVEL_AUXILIAR
				           ,PNAU.URL_AMIGAVEL
				           ,PROD.TAGS
				           ,PROD.URL_AMIGAVEL
				           ,PROD.META_TITLE
				           ,PROD.META_DESCRIPTION
				           ,PROD.META_KEYWORDS
				           ,PROD.VIDEO
				           ,PCIM.IMAGEM IMAGEM_PRINCIPAL
				           ,PROD.PESO_KG
				           ,PROD.ALTURA_CM
				           ,PROD.LARGURA_CM
				           ,PROD.PROFUNDIDADE_CM
				           
					FROM
						e_PRODUTO PROD LEFT JOIN e_PRODUTO_NIVEL_AUXILIAR PNAU
											  ON PROD.PNAU_ID_PRODUTO_NIVEL_AUXILIAR = PNAU.ID_PRODUTO_NIVEL_AUXILIAR,
						e_PRODUTO_COMBINACAO PRCO,
						e_PRODUTO_COMBINACAO_ATRIBUTO_VALOR PCAV LEFT JOIN e_PRODUTO_COMBINACAO_IMAGEM PCIM
																		ON PCIM.PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR = PCAV.ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR
																	   AND PCIM.PRINCIPAL = 'S'
						
					WHERE
						PROD.ID_PRODUTO = PRCO.PROD_ID_PRODUTO
					AND PRCO.ID_PRODUTO_COMBINACAO = PCAV.PRCO_ID_PRODUTO_COMBINACAO
					AND fn_saldo_disponivel_produto(PCAV.ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR, now()) > 0
					AND fn_valor_venda_produto(PROD.ID_PRODUTO, 1, now()) > 0.01
					AND PROD.PRSI_ID_PRODUTO_SITUACAO = 1";

$mysqli->ExecutarSQL($queryInsert);

$queryUpdate = "UPDATE ".$tabelaAtualiza." 
		SET URL_AMIGAVEL = RTRIM(LTRIM(LOWER(REFERENCIA)))+'-'+LOWER(fn_trata_caracter_especial(DESCRICAO_VENDA))
		,IMAGEM_PRINCIPAL = REPLACE(IMAGEM_PRINCIPAL, '.jpg', '.JPG');
		
		UPDATE
		".$tabelaAtualiza."
		SET PRECO_PROMOCIONAL = CASE 
				WHEN TIPO_PROMOCAO = 'V' THEN PRECO_VENDA-VALOR_PROMOCAO
				WHEN TIPO_PROMOCAO = 'P' THEN ROUND((PRECO_VENDA-((PRECO_VENDA*VALOR_PROMOCAO)/100)),2)
			END
		WHERE
			VALOR_PROMOCAO > 0;

		IF EXISTS (SELECT 1 FROM ".$tabelaAtualiza.")
		BEGIN
			UPDATE E_PARAMETRO_LOJA SET VALOR_PARAMETRO = '".$tabelaAtualiza."' 
			WHERE NOME_PARAMETRO = 'TABELA_PRODUTO_SITE' AND LOJA_ID_LOJA = ".ID_LOJA."
		END;";

$mysqli->ExecutarSQL($queryUpdate);

$queryVisualizacoes = "SELECT COUNT(C.PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR) QTD, 
							  C.PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR ID_PRODUTO
						 FROM e_CARRINHO C
					 GROUP BY C.PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR";

$resultVisualizacoes = $mysqli->ConsultarSQL($queryVisualizacoes);

$update = '';
foreach ($resultVisualizacoes as $value) {
	$update .= "UPDATE ".$tabelaAtualiza." SET VISUALIZACOES = ".$value['QTD']." 
		  WHERE PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR = ".$value['ID_PRODUTO'].";
		  ";
}
$mysqli->ExecutarSQL($update);

?>