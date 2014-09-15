<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);


require('../configs/config.php');
header('Content-Type: text/html; charset=utf-8');

if(isset($_POST['acao'])){
	$acao = $_POST['acao'];
} else { $acao = ''; }

switch ($acao) {
	case 'exportaArquivo':

		$tipoArquivo = $_POST["tipoArquivo"];

		switch ($tipoArquivo) {
			case 'cliente':

				$query = "SELECT
								PESS.ID_PESSOA CODIGO,
								PESS.NOME NOME,
							    PESS.NOME_FANTASIA FANTASIA,
								PESS.TIPO TIPO_PESSOA,
								IFNULL(PESS.CPF, PESS.CNPJ)CPF_CNPJ,
								CONVERT(char(10), PESS.DATA_INSERT, 103) DATA_INC,
								date_format(PESS.DATA_NASCIMENTO, '%d/%m/%Y') DATA_NASC,
								'COD_SIEGER' ESTADO,
								PEEN.ENDERECO ENDERECO_LOG,
								PEEN.NUMERO ENDERECO_NUM,
								PEEN.COMPLEMENTO ENDERECO_COMPL,
								PEEN.BAIRRO ENDERECO_BAIRRO,
								MUNI.NOME_MUNICIPIO ENDERECO_MUNICIPIO,
								MUNI.UNFE_ID_ESTADO ENDERECO_UF,
								PEEN.CEP_ID_CEP ENDERECO_CEP,
								PAIS.NOME_PAIS ENDERECO_PAIS,
								PECO.DESCRICAO TELEFONE1,
								PECO3.DESCRICAO TELEFONE2,
								PECO2.DESCRICAO CELULAR,
								PESS.NOME_CONTATO CONTATO,
								PESS.IE INSCRICAO_ESTADUAL,
								PESS.EMAIL EMAIL,
								PEEN.ENDERECO ENTREGA_LOG,
								PEEN.NUMERO ENTREGA_NUM,
								PEEN.COMPLEMENTO ENTREGA_COMPL,
								PEEN.BAIRRO ENTREGA_BAIRRO,
								MUNI.NOME_MUNICIPIO ENTREGA_MUNICIPIO,
								MUNI.UNFE_ID_ESTADO ENTREGA_UF,
								PEEN.CEP_ID_CEP ENTREGA_CEP,
								PAIS.NOME_PAIS ENTREGA_PAIS
							FROM
								e_PESSOA PESS LEFT JOIN e_PESSOA_CONTATO PECO
													 ON PESS.ID_PESSOA = PECO.PESS_ID_PESSOA
													AND PECO.TICO_ID_TIPO_CONTATO = 1
											  LEFT JOIN e_PESSOA_CONTATO PECO2
													 ON PESS.ID_PESSOA = PECO2.PESS_ID_PESSOA
													AND PECO2.TICO_ID_TIPO_CONTATO = 2
											LEFT JOIN e_PESSOA_CONTATO PECO3
													 ON PESS.ID_PESSOA = PECO3.PESS_ID_PESSOA
													AND PECO3.TICO_ID_TIPO_CONTATO = 3,
								e_PESSOA_ENDERECO PEEN,
								e_MUNICIPIO MUNI,
								e_PAIS PAIS
							WHERE
								PESS.ID_PESSOA = PEEN.PESS_ID_PESSOA
							AND IFNULL(PEEN.ENDERECO_PRINCIPAL, 'N') = 'S'
							AND PEEN.MUNI_ID_MUNICIPIO = MUNI.ID_MUNICIPIO
							AND PAIS.ID_PAIS = MUNI.UNFE_PAIS_COD_PAIS
							AND EXISTS (SELECT 1 FROM e_PEDIDO PEDI WHERE PEDI.PESS_ID_PESSOA = PESS.ID_PESSOA 
			AND fn_situacao_pedido(PEDI.ID_PEDIDO) = 5)
							
							UNION
							
							SELECT
								PESS.ID_PESSOA CODIGO,
								PESS.NOME NOME,
							    PESS.NOME_FANTASIA FANTASIA,
								PESS.TIPO TIPO_PESSOA,
								IFNULL(PESS.CPF, PESS.CNPJ)CPF_CNPJ,
								CONVERT(char(10), PESS.DATA_INSERT, 103) DATA_INC,
								date_format(PESS.DATA_NASCIMENTO, '%d/%m/%Y') DATA_NASC,
								'COD_SIEGER' ESTADO,
								PEEN.ENDERECO ENDERECO_LOG,
								PEEN.NUMERO ENDERECO_NUM,
								PEEN.COMPLEMENTO ENDERECO_COMPL,
								PEEN.BAIRRO ENDERECO_BAIRRO,
								MUNI.NOME_MUNICIPIO ENDERECO_MUNICIPIO,
								MUNI.UNFE_ID_ESTADO ENDERECO_UF,
								PEEN.CEP_ID_CEP ENDERECO_CEP,
								PAIS.NOME_PAIS ENDERECO_PAIS,
								PECO.DESCRICAO TELEFONE1,
								PECO3.DESCRICAO TELEFONE2,
								PECO2.DESCRICAO CELULAR,
								PESS.NOME_CONTATO CONTATO,
								PESS.IE INSCRICAO_ESTADUAL,
								PESS.EMAIL EMAIL,
								PEEN.ENDERECO ENTREGA_LOG,
								PEEN.NUMERO ENTREGA_NUM,
								PEEN.COMPLEMENTO ENTREGA_COMPL,
								PEEN.BAIRRO ENTREGA_BAIRRO,
								MUNI.NOME_MUNICIPIO ENTREGA_MUNICIPIO,
								MUNI.UNFE_ID_ESTADO ENTREGA_UF,
								PEEN.CEP_ID_CEP ENTREGA_CEP,
								PAIS.NOME_PAIS ENTREGA_PAIS
							FROM
								e_PESSOA PESS LEFT JOIN e_PESSOA_CONTATO PECO
													 ON PESS.ID_PESSOA = PECO.PESS_ID_PESSOA
													AND PECO.TICO_ID_TIPO_CONTATO = 1
											  LEFT JOIN e_PESSOA_CONTATO PECO2
													 ON PESS.ID_PESSOA = PECO2.PESS_ID_PESSOA
													AND PECO2.TICO_ID_TIPO_CONTATO = 2
											LEFT JOIN e_PESSOA_CONTATO PECO3
													 ON PESS.ID_PESSOA = PECO3.PESS_ID_PESSOA
													AND PECO3.TICO_ID_TIPO_CONTATO = 3,
								e_PESSOA_ENDERECO PEEN,
								e_MUNICIPIO MUNI,
								e_PAIS PAIS
							WHERE
								PESS.ID_PESSOA = PEEN.PESS_ID_PESSOA
							AND IFNULL(PEEN.ENDERECO_PRINCIPAL, 'N') = 'N'
							AND PEEN.MUNI_ID_MUNICIPIO = MUNI.ID_MUNICIPIO
							AND PAIS.ID_PAIS = MUNI.UNFE_PAIS_COD_PAIS
							AND EXISTS (SELECT 1 FROM e_PEDIDO PEDI WHERE PEDI.PESS_ID_PESSOA = PESS.ID_PESSOA 
			AND fn_situacao_pedido(PEDI.ID_PEDIDO) = 5)";

				$resultCliente = $mysqli->ExecutarSQL($query);
				
				$pastaArquivo = "../exportacao/";
				$arquivo = "Clientes_".date("YmdHis").".txt";

				$nomeArquivo = $pastaArquivo.$arquivo;

				$fp = @fopen($nomeArquivo, "x");

				while($rowCliente = @mssql_fetch_array($resultCliente)){

					$escreve = @fwrite($fp, 
											$rowCliente["CODIGO"].";".
											$rowCliente["NOME"].";".
										    $rowCliente["FANTASIA"].";".
											$rowCliente["TIPO_PESSOA"].";".
											$rowCliente["CPF_CNPJ"].";".
											$rowCliente["DATA_INC"].";".
											$rowCliente["DATA_NASC"].";".
											$rowCliente["ESTADO"].";".
											$rowCliente["ENDERECO_LOG"].";".
											$rowCliente["ENDERECO_NUM"].";".
											$rowCliente["ENDERECO_COMPL"].";".
											$rowCliente["ENDERECO_BAIRRO"].";".
											$rowCliente["ENDERECO_MUNICIPIO"].";".
											$rowCliente["ENDERECO_UF"].";".
											$rowCliente["ENDERECO_CEP"].";".
											$rowCliente["ENDERECO_PAIS"].";".
											$rowCliente["TELEFONE1"].";".
											$rowCliente["TELEFONE2"].";".
											$rowCliente["CELULAR"].";".
											$rowCliente["CONTATO"].";".
											$rowCliente["INSCRICAO_ESTADUAL"].";".
											$rowCliente["EMAIL"].";".
											$rowCliente["ENTREGA_LOG"].";".
											$rowCliente["ENTREGA_NUM"].";".
											$rowCliente["ENTREGA_COMPL"].";".
											$rowCliente["ENTREGA_BAIRRO"].";".
											$rowCliente["ENTREGA_MUNICIPIO"].";".
											$rowCliente["ENTREGA_UF"].";".
											$rowCliente["ENTREGA_CEP"].";".
											$rowCliente["ENTREGA_PAIS."].";".
									"\r\n");

				}
				//printr($query);
				if(@file_exists($nomeArquivo)){
					$retorno = '{ "cod": "sucesso", "mensagem": "'.CLIENTE_EXPORTADO.'", "nomeArquivo": "'.BASE_DIR.'exportacao/download.php?arquivo='.$arquivo.'" }';
				} else {
					$retorno = '{ "cod": "erro", "mensagem": "'.CLIENTE_NAO_EXPORTADO.'" }';
				}
				
				
				@fclose($fp);

				echo $retorno;

				break;

				
			case 'pedido':

				$query = "SELECT 
								PEDI.ID_PEDIDO COD_PEDIDO,
								IFNULL(PESS.CPF, PESS.CNPJ) CNPJ_CPF,
								CONVERT(char(10), PEDI.DATA_EMISSAO, 103) DATA_PEDIDO,
								'DATA_MOIP' DATA_APROVACAO,
								'COD_SIGER' METODO_PAGTO,
								MAX(PEPA.NUMERO_PARCELAS) PARCELAS,
								PEIT.ID_PEDIDO_ITEM SEQUENCIA_ITEM,
								PROD.ID_PRODUTO_INTEGRACAO PRODUTO,
								PEIT.QUANTIDADE QUANTIDADE,
								PEIT.PRECO_UNITARIO_VENDA VALOR_UNITARIO,
								'' DATA_ENTREGA,
								PEDI.TIFR_ID_TIPO_FRETE COD_TRANSPORT,
								CASE IFNULL(PEDI.FRETE_GRATIS,'N') WHEN 'S' THEN 0 ELSE PEDI.VALOR_FRETE END VALOR_FRETE,
								PEEN.ENDERECO ENTREGA_LOG,
								PEEN.NUMERO ENTREGA_NUM,
								PEEN.BAIRRO ENTREGA_BAIRRO,
								MUNI.NOME_MUNICIPIO ENTREGA_MUNICIPIO,
								MUNI.UNFE_ID_ESTADO ENTREGA_UF,
								PEEN.CEP_ID_CEP ENTREGA_CEP,
								IFNULL(REPR.NOME, '') REPRESENTANTE,
								PEIT.VALOR_DESCONTO VALOR_DESCONTO,
								PEEN.COMPLEMENTO COMPL_END_ENTREGA
							FROM
								e_PEDIDO PEDI,
								e_PEDIDO_ITEM PEIT,
								e_PESSOA PESS,
								e_PEDIDO_PAGAMENTO PEPA,
								e_FORMA_PAGAMENTO FOPA,
								e_PRODUTO_COMBINACAO_ATRIBUTO_VALOR PCAV,
								e_PRODUTO_COMBINACAO PRCO,
								e_PRODUTO PROD LEFT JOIN e_PESSOA REPR
													  ON PROD.PESS_ID_PESSOA_FABRICANTE = REPR.ID_PESSOA,
								e_PEDIDO_ENDERECO PEEN,
								e_MUNICIPIO MUNI
							WHERE
								fn_situacao_pedido(PEDI.ID_PEDIDO) = 5
							AND PEDI.PESS_ID_PESSOA = PESS.ID_PESSOA
							AND PEDI.ID_PEDIDO = PEPA.PEDI_ID_PEDIDO
							AND PEPA.ATIVO = 'S'
							AND PEPA.TRANSACAO_AUTORIZADA = 'S'	
							AND PEPA.FOPA_ID_FORMA_PAGAMENTO = FOPA.ID_FORMA_PAGAMENTO
							AND PEIT.PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR = PCAV.ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR
							AND PCAV.PRCO_ID_PRODUTO_COMBINACAO = PRCO.ID_PRODUTO_COMBINACAO
							AND PRCO.PROD_ID_PRODUTO = PROD.ID_PRODUTO
							AND PEDI.ID_PEDIDO = PEEN.PEDI_ID_PEDIDO
							AND PEEN.MUNI_ID_MUNICIPIO = MUNI.ID_MUNICIPIO
							AND PEDI.ID_PEDIDO = PEIT.PEDI_ID_PEDIDO
							GROUP BY
								PEDI.ID_PEDIDO,
								IFNULL(PESS.CPF, PESS.CNPJ),
								PEDI.DATA_EMISSAO,
								PEIT.ID_PEDIDO_ITEM,
								PROD.ID_PRODUTO_INTEGRACAO,
								PEIT.QUANTIDADE,
								PEIT.PRECO_UNITARIO_VENDA,
								PEDI.TIFR_ID_TIPO_FRETE,
								CASE IFNULL(PEDI.FRETE_GRATIS,'N') WHEN 'S' THEN 0 ELSE PEDI.VALOR_FRETE END,
								PEEN.ENDERECO,
								PEEN.NUMERO,
								PEEN.BAIRRO,
								MUNI.NOME_MUNICIPIO,
								MUNI.UNFE_ID_ESTADO,
								PEEN.CEP_ID_CEP,
								IFNULL(REPR.NOME, ''),
								PEIT.VALOR_DESCONTO,
								PEEN.COMPLEMENTO";

				$resultPedido = $mysqli->ExecutarSQL($query);
				
				$pastaArquivo = "../exportacao/";
				$arquivo = "Pedido_".date("YmdHis").".txt";

				$nomeArquivo = $pastaArquivo.$arquivo;

				$fp = @fopen($nomeArquivo, "x");

				while($rowPedido = @mssql_fetch_array($resultPedido)){

					$escreve = @fwrite($fp, 
											$rowPedido["COD_PEDIDO"].";".
											$rowPedido["CNPJ_CPF"].";".
											$rowPedido["DATA_PEDIDO"].";".
											$rowPedido["DATA_APROVACAO"].";".
											$rowPedido["METODO_PAGTO"].";".
											$rowPedido["PARCELAS"].";".
											$rowPedido["SEQUENCIA_ITEM"].";".
											$rowPedido["PRODUTO"].";".
											$rowPedido["QUANTIDADE"].";".
											$rowPedido["VALOR_UNITARIO"].";".
											$rowPedido["DATA_ENTREGA"].";".
											$rowPedido["COD_TRANSPORT"].";".
											$rowPedido["VALOR_FRETE"].";".
											$rowPedido["ENTREGA_LOG"].";".
											$rowPedido["ENTREGA_NUM"].";".
											$rowPedido["ENTREGA_BAIRRO"].";".
											$rowPedido["ENTREGA_MUNICIPIO"].";".
											$rowPedido["ENTREGA_UF"].";".
											$rowPedido["ENTREGA_CEP"].";".
											$rowPedido["REPRESENTANTE"].";".
											$rowPedido["VALOR_DESCONTO"].";".
											$rowPedido["COMPL_END_ENTREGA"].";".
									"\r\n");

				}
				
				if(@file_exists($nomeArquivo)){
					$retorno = '{ "cod": "sucesso", "mensagem": "'.PEDIDO_EXPORTADO.'", "nomeArquivo": "'.BASE_DIR.'exportacao/download.php?arquivo='.$arquivo.'" }';
				} else {
					$retorno = '{ "cod": "erro", "mensagem": "'.PEDIDO_NAO_EXPORTADO.'" }';
				}
				
				@fclose($fp);
				
				echo $retorno;

				break;
		}



		break;

	default:
		# code...
		break;
}




?>