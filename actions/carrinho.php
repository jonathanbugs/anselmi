<?php
require_once '../configs/config.php';

$acao = null;
if(isset($_POST['acao'])){
	$acao = $_POST['acao'];
}

$idPessoaLogada = $_SESSION['sessionIdPessoa'];

switch ($acao) {
	case 'gravaProduto':
		
		$idProduto = sqlvalue($_POST['idProduto'], false);
		$codTempCliente = sqlvalue(COD_TEMP_CLIENTE, true);
		$idLoja = sqlvalue(ID_LOJA, false);
		$idPessoa = sqlvalue($idPessoaLogada, true);

		$urlOrigem = sqlvalue($_COOKIE['urlOrigem'], true);

		if($idPessoaLogada){
			//$where = "OR CARR.PESS_ID_PESSOA = ".$idPessoa."";
			$where = "";
		}

		$idListaCasamento = sqlvalue(null, true);
		$whereListaCasamento = "";
		if($_SESSION['sessionIdListaCasamento']){
			$idListaCasamento = sqlvalue($_SESSION['sessionIdListaCasamento'], false);
			$whereListaCasamento = " AND CARR.LICA_ID_LISTA_CASAMENTO = ".$idListaCasamento." ";
		} 
		
		$queryValida = "SELECT 1 
						 FROM e_CARRINHO CARR
						WHERE CARR.PRCO_ID_PRODUTO_COMBINACAO = ".$idProduto."
						  AND CARR.DATA_DELETE IS NULL
						  AND IFNULL(CARR.FINALIZADO, 'N') = 'N'
						  AND (CARR.COD_TEMP_CLIENTE = ".$codTempCliente." ".$where.")
						  AND CARR.LOJA_ID_LOJA = ".ID_LOJA."
						  ".$whereListaCasamento."";

		$resultValida = $mysqli->ConsultarSQL($queryValida);

		if(count($resultValida) > 0){	
			$retorno = '{"retorno": "existe"}';
		} else {						
			$query = "INSERT INTO e_CARRINHO
							   (LOJA_ID_LOJA
							   ,PESS_ID_PESSOA
							   ,COD_TEMP_CLIENTE
							   ,PRCO_ID_PRODUTO_COMBINACAO
							   ,QUANTIDADE
							   ,PRECO_UNITARIO_VENDA
							   ,URL_ORIGEM
							   ,LICA_ID_LISTA_CASAMENTO
							   ,DATA_INSERT
							   ,USUARIO_INSERT)
							SELECT
								".$idLoja.",
								".$idPessoa.",
								".$codTempCliente.",
								".$idProduto.",
								1,
                           		CASE ifnull(TPSI.PRECO_PROMOCIONAL,0) WHEN 0 
                           			THEN TPSI.PRECO_VENDA ELSE TPSI.PRECO_PROMOCIONAL END,
								".$urlOrigem.",
								".$idListaCasamento.",
								now(),
								'actions/carrinho.php'
							FROM
								".TABELA_PRODUTO_SITE." TPSI
							WHERE
								TPSI.PRCO_ID_PRODUTO_COMBINACAO = ".$idProduto."
				";
			//printr($query);
			$row = $mysqli->ExecutarSQL($query);

			$linhasAfetadas = $mysqli->LinhasAfetadas();

			require_once CLASS_DIR.'/'.'carrinho.class.php';
			$Carrinho = new Carrinho($mysqli);

			if($_SESSION['sessionIdListaCasamento']){
				$whereListaCasamento = " AND CARR.LICA_ID_LISTA_CASAMENTO = ".$idListaCasamento." ";
			} else {
				$whereListaCasamento = " AND CARR.LICA_ID_LISTA_CASAMENTO IS NULL ";
			}
			$Carrinho->fnCarrinhoTopo(NULL, $whereListaCasamento);

			if($linhasAfetadas > 0){
				$retorno = '{"retorno": "sucesso"}';
			} else {
				$retorno = '{"retorno": "erro"}';
			}

		}
		
		echo $retorno;
		break;

	case 'adicionaPacotePresente':

		$idCarrinho = sqlvalue($_POST['idCarrinho'], false);
		$pacotePresente = sqlvalue($_POST['pacotePresente'], true);
		if ($_POST['pacotePresente'] == 'S') {
			$valorPacotePresente = VALOR_PACOTE_PRESENTE;
		} else {
			$valorPacotePresente = 'NULL';
		}

		$query = "UPDATE e_CARRINHO SET VALOR_PACOTE_PRESENTE = ".$valorPacotePresente.", PACOTE_PRESENTE = ".$pacotePresente."
				  WHERE ID_CARRINHO = ".$idCarrinho."";

		$result = $mysqli->ExecutarSQL($query);

		if($result){
			$retorno = '{"retorno": "sucesso"}';
		} else {
			$retorno = '{"retorno": "erro"}';	
		}

		echo $retorno;

		break;

	case 'calculaFrete':

		require_once CLASS_DIR.'frete.class.php';
		$Frete = new Frete($mysqli);

		$cepDestino = $_POST['cep'];
		$paginaConsulta = $_POST['paginaConsulta'];
		$idPessoaLogada = $_SESSION['sessionIdPessoaLogada'];
		if(!$idPessoaLogada){
			$idPessoaLogada = 0;
		}

		if($paginaConsulta == 'carrinho'){

			$query = "SELECT
							SUM(TPSI.PESO_KG) PESO_KG,
							SUM(TPSI.ALTURA_CM) ALTURA,
							SUM(TPSI.LARGURA_CM) LARGURA,
							SUM(TPSI.PROFUNDIDADE_CM) PROFUNDIDADE,
							SUM(ROUND((TPSI.ALTURA_CM*TPSI.LARGURA_CM*TPSI.PROFUNDIDADE_CM)/6000,3)) PESO_CUBICO,
							SUM(((CARR.PRECO_UNITARIO_VENDA+IFNULL(CARR.VALOR_PACOTE_PRESENTE,0))*CARR.QUANTIDADE)-IFNULL(CARR.VALOR_DESCONTO,0)) PRECO_VENDA,
							PTFR.TIFR_ID_TIPO_FRETE
						FROM
							e_CARRINHO CARR,
							".TABELA_PRODUTO_SITE." TPSI,
							e_PRODUTO_TIPO_FRETE PTFR
						WHERE
							CARR.PRCO_ID_PRODUTO_COMBINACAO = TPSI.PRCO_ID_PRODUTO_COMBINACAO
						AND CARR.DATA_DELETE IS NULL
						AND CARR.FINALIZADO = 'N'
						AND (CARR.COD_TEMP_CLIENTE = '".COD_TEMP_CLIENTE."' OR CARR.PESS_ID_PESSOA = ".$idPessoaLogada.")
						AND TPSI.PROD_ID_PRODUTO = PTFR.PROD_ID_PRODUTO
						AND CARR.LOJA_ID_LOJA = ".ID_LOJA."
						GROUP BY
							PTFR.TIFR_ID_TIPO_FRETE";

			$result = $mysqli->ConsultarSQL($query);
			$row = $result[0];

			$arrayTipoFrete = array();
			foreach ($result as $value) {
				$arrayTipoFrete[] = $value['TIFR_ID_TIPO_FRETE'];
			}
			
			if(in_array(ID_TIPO_FRETE_TRANSP_PADRAO, $arrayTipoFrete)){
				$tipoFrete = array(ID_TIPO_FRETE_TRANSP_PADRAO);
			} else {
				$tipoFrete = $arrayTipoFrete;	
			}

			$retornoFrete = $Frete->fnCalculaFrete($cepDestino, $row['PESO_KG'], $row['PESO_CUBICO'], $row['ALTURA'], $row['LARGURA'], $row['PROFUNDIDADE'], $tipoFrete, $row['PRECO_VENDA']);

			echo '<ul class="ulResultadoFrete">
					<li class="ulResultadoFreteFirst">
						<span class="txtBold">CEP 93145-210</span>
						<a href="javascript:;" id="linkConsultarCep" title="Consultar outro CEP">(Consultar outro CEP)</a>
					</li>';
			foreach ($retornoFrete as $value) {
				echo '<li>
						<span class="txtBold">R$ '.number_format($value['Valor'], 2, ',', '.').'</span>
						<span> Em at&eacute; '.$value['PrazoEntrega'].' dias &uacute;teis</span>
					 </li>';
			}
			echo '</ul>';

		} elseif($paginaConsulta == 'produto-detalhe'){

		} else {
			$retorno = 'Não foi possível calcular o frete';
		}

		break;

	case 'removeProdutoCarrinho':

		$idCarrinho = sqlvalue($_POST['idCarrinho'], false);
		$result = $mysqli->ExecutarSQL("UPDATE e_CARRINHO SET DATA_DELETE = now() WHERE ID_CARRINHO = ".$idCarrinho."");

		require_once CLASS_DIR.'/'.'carrinho.class.php';
		$Carrinho = new Carrinho($mysqli);

		if($_SESSION['sessionIdListaCasamento']){
			$whereListaCasamento = " AND CARR.LICA_ID_LISTA_CASAMENTO = ".$idListaCasamento." ";
		} else {
			$whereListaCasamento = " AND CARR.LICA_ID_LISTA_CASAMENTO IS NULL ";
		}
		$Carrinho->fnCarrinhoTopo(NULL, $whereListaCasamento);

		if($result){
			$retorno = '{"retorno": "sucesso"}';
		} else {
			$retorno = '{"retorno": "erro"}';
		}

		echo $retorno;

		break;

	case 'alteraQuantidadeProdutoCarrinho':

		$idCarrinho = sqlvalue($_POST['idCarrinho'], false);
		$quantidade = sqlvalue($_POST['quantidade'], false);

		$querySaldo = "SELECT 
							fn_saldo_disponivel_produto(CARR.PRCO_ID_PRODUTO_COMBINACAO, now()) SALDO
						FROM
							e_CARRINHO CARR
						WHERE
							CARR.ID_CARRINHO = ".$idCarrinho."";

		if($_SESSION['sessionIdListaCasamento']){
			$querySaldo = "SELECT 
								IFNULL(LCPR.QTD_SOLICITADA,0)-IFNULL(LCPR.QTD_VENDIDA,0) SALDO
							FROM
								e_CARRINHO CARR,
								e_LISTA_CASAMENTO_PRODUTO LCPR
							WHERE
								CARR.ID_CARRINHO = ".$idCarrinho."
							AND CARR.PRCO_ID_PRODUTO_COMBINACAO = LCPR.PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR
							AND LCPR.LICA_ID_LISTA_CASAMENTO = CARR.LICA_ID_LISTA_CASAMENTO";
		}
		
		
		$rowSaldo = $mysqli->ConsultarSQL($querySaldo);
		$saldoProduto = number_format($rowSaldo[0]['SALDO']);

		if($saldoProduto >= $quantidade){
			$result = $mysqli->ExecutarSQL("UPDATE e_CARRINHO SET QUANTIDADE = ".$quantidade." WHERE ID_CARRINHO = ".$idCarrinho."");

			if($result){
				$retorno = '{"retorno": "sucesso"}';
			} else {
				$retorno = '{"retorno": "erro"}';
			}
		} else {
			$retorno = '{"retorno": "saldoIndisponivel", "saldo": "'.$saldoProduto.'"}';
		}

		require_once CLASS_DIR.'/'.'carrinho.class.php';
		$Carrinho = new Carrinho($mysqli);

		if($_SESSION['sessionIdListaCasamento']){
			$whereListaCasamento = " AND CARR.LICA_ID_LISTA_CASAMENTO = ".$idListaCasamento." ";
		} else {
			$whereListaCasamento = " AND CARR.LICA_ID_LISTA_CASAMENTO IS NULL ";
		}
		$Carrinho->fnCarrinhoTopo(NULL, $whereListaCasamento);

		echo $retorno;

		break;

	case 'finalizaCarrinho':

		$idPessoaLogada = $_SESSION['sessionIdPessoaLogada'];
		
		if($idPessoaLogada){
			$where = "OR PESS_ID_PESSOA = ".$idPessoa."";
		}

		if($_SESSION['sessionIdListaCasamento']){
			$idListaCasamento = sqlvalue($_SESSION['sessionIdListaCasamento'], false);
			$whereListaCasamento = " AND CARR.LICA_ID_LISTA_CASAMENTO = ".$idListaCasamento." ";
		} else {
			$whereListaCasamento = " AND CARR.LICA_ID_LISTA_CASAMENTO IS NULL ";
		}


		$queryCarrinho = "SELECT
							TPSI.DESCRICAO_VENDA,
							TPSI.REFERENCIA,
							CARR.PRECO_UNITARIO_VENDA+IFNULL(CARR.VALOR_PACOTE_PRESENTE,0) PRECO_UNITARIO_VENDA,
							CARR.QUANTIDADE,
							TPSI.URL_AMIGAVEL,
							TPSI.IMAGEM_PRINCIPAL,
							TPSI.PRCO_ID_PRODUTO_COMBINACAO ID_PRODUTO_ATRIBUTO_VALOR,
							CARR.ID_CARRINHO,
							CARR.PACOTE_PRESENTE,
							CARR.VALOR_PACOTE_PRESENTE,
							CASE IFNULL(CARR.LICA_ID_LISTA_CASAMENTO,0) WHEN 0 
							THEN fn_saldo_disponivel_produto(CARR.PRCO_ID_PRODUTO_COMBINACAO, now())
							ELSE IFNULL(LCPR.QTD_SOLICITADA,0)-IFNULL(LCPR.QTD_VENDIDA,0) END SALDO
						FROM
							e_CARRINHO CARR LEFT JOIN e_LISTA_CASAMENTO_PRODUTO LCPR
												   ON CARR.LICA_ID_LISTA_CASAMENTO = LCPR.LICA_ID_LISTA_CASAMENTO
												  AND CARR.PRCO_ID_PRODUTO_COMBINACAO = LCPR.PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR,
							".TABELA_PRODUTO_SITE." TPSI
						WHERE
							CARR.PRCO_ID_PRODUTO_COMBINACAO = TPSI.PRCO_ID_PRODUTO_COMBINACAO
						AND CARR.DATA_DELETE IS NULL
						AND CARR.FINALIZADO = 'N'
						AND (CARR.COD_TEMP_CLIENTE = '".COD_TEMP_CLIENTE."' ".$where.")
						AND CARR.LOJA_ID_LOJA = ".ID_LOJA."
						".$whereListaCasamento."
						ORDER BY
							CARR.ID_CARRINHO DESC";

		$listaProdutoCarrinho = $mysqli->ConsultarSQL($queryCarrinho);

		$saldos = array();
		foreach ($listaProdutoCarrinho as $value) {
			$saldos[] = $value['SALDO'];
		}
		//printr($queryCarrinho);
		if(in_array(0, $saldos)){
			$retorno = '{"retorno": "erro"}';
		} else {	
			foreach ($listaProdutoCarrinho as $value) {
				$queryInsertReserva .= "
										INSERT INTO e_PRODUTO_COMBINACAO_ESTOQUE
										           (PRCO_ID_PRODUTO_COMBINACAO
										           ,QUANTIDADE
										           ,OPDE_ID_OPERACAO_DEPOSITO
										           ,DEPO_ID_DEPOSITO
										           ,CARR_ID_CARRINHO
										           ,PEIT_ID_PEDIDO_ITEM
										           ,USUARIO_INSERT)
										     
										     SELECT
													".$value['ID_PRODUTO_ATRIBUTO_VALOR']."
										           ,".$value['QUANTIDADE']."
										           ,".ID_OPERACAO_DEPOSITO_SAIDA_RESERVA_PEDIDO."
										           ,DEPO.ID_DEPOSITO
										           ,".$value['ID_CARRINHO']."
										           ,NULL
										           ,'actions/carrinho.php'

												FROM
													e_PRODUTO_COMBINACAO_ESTOQUE PCES,
													e_OPERACAO_DEPOSITO OPDE,
													e_DEPOSITO DEPO
												WHERE
													PCES.OPDE_ID_OPERACAO_DEPOSITO = OPDE.ID_OPERACAO_DEPOSITO
												AND PCES.DEPO_ID_DEPOSITO = DEPO.ID_DEPOSITO
												AND fn_saldo_disponivel_produto(PCES.PRCO_ID_PRODUTO_COMBINACAO, now()) > 0
												AND PCES.PRCO_ID_PRODUTO_COMBINACAO = ".$value['ID_PRODUTO_ATRIBUTO_VALOR']."
												GROUP BY
													DEPO.ID_DEPOSITO;
										";	
			}

			$result = $mysqli->ExecutarMultiSQL($queryInsertReserva);

			if($result){
				$retorno = '{"retorno": "sucesso"}';	
			} else {
				$retorno = '{"retorno": "erro"}';	
			}
			
		}

		echo $retorno;

		break;
	
	default:
		$retorno = '{"retorno": "erro"}';
		echo $retorno;
		break;
}

?>