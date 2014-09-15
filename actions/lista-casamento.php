<?php
require_once '../configs/config.php';
require_once('../classes/class.upload.php');

$acao = null;
if(isset($_POST['acao'])){
	$acao = $_POST['acao'];
}

switch ($acao) {
	
	case 'buscaListaCasamento':
		
		$nomeConjuge1 = $_POST['conjuge1'];
		$nomeConjuge2 = $_POST['conjuge2'];

		$where1 = "";
		if($nomeConjuge1){
			$where1 = "(CONJUGE1 LIKE '%".$nomeConjuge1."%' OR CONJUGE2 LIKE '%".$nomeConjuge1."%')";
		}
		$where2 = "";
		if($nomeConjuge2){
			$where2 = "(CONJUGE2 LIKE '%".$nomeConjuge2."%' OR CONJUGE1 LIKE '%".$nomeConjuge2."%')";
		}

		if($nomeConjuge1 and $nomeConjuge2){
			$or = " OR ";
		}

		$query = "SELECT
						LICA.CONJUGE1,
						LICA.CONJUGE2,
						LICA.URL,
						CASE WHEN LICA.ATIVO = 'N' THEN 'F' ELSE 'A' END SITUACAO
					FROM
						e_LISTA_CASAMENTO LICA LEFT JOIN e_LISTA_CASAMENTO_ENDERECO LCEN
													  ON LICA.ID_LISTA_CASAMENTO = LCEN.LICA_ID_LISTA_CASAMENTO
													 AND LCEN.TIPO_ENDERECO = 'ENTREGA'
					WHERE
						(".$where1."	
					".$or."
					".$where2.")";

		$result = $mysqli->ConsultarSQL($query);

		if(count($result) > 0){
			foreach ($result as $key => $value) {
				if($value['SITUACAO'] == 'A') {
					$listasCasamentoEncontradas .= '<li><a href="/lc/'.$value['URL'].'">'.$value['CONJUGE1'].'<br>'.$value['CONJUGE2'].'</a></li>';
				} else {
					$listasCasamentoEncontradas .= '<li>'.$value['CONJUGE1'].'<br>'.$value['CONJUGE2'].' - Finalizado</li>';
				}
			}
		} else {
			$listasCasamentoEncontradas = 'Nenhuma lista encontrada';
		}

		echo '<span class="titulo">Listas encontradas</span><ul>'.$listasCasamentoEncontradas.'</ul>';

		break;

	case 'cadastraListaCasamento':

		$idPessoa = sqlvalue($_SESSION['sessionIdPessoa'], false);
		$nome1 = sqlvalue($_POST['nome1'], true);
	    $emailNome1 = sqlvalue($_POST['emailNome1'], true);
	    $nomePai1 = sqlvalue($_POST['nomePai1'], true);
	    $nomeMae1 = sqlvalue($_POST['nomeMae1'], true);
	    $nome2 = sqlvalue($_POST['nome2'], true);
	    $emailNome2 = sqlvalue($_POST['emailNome2'], true);
	    $nomePai2 = sqlvalue($_POST['nomePai2'], true);
	    $nomeMae2 = sqlvalue($_POST['nomeMae2'], true);
	    $mensagem = sqlvalue($_POST['mensagem'], true);

	    $foto = $_FILES["fotoCasal"];

	    $extensao = $foto["type"];
	    if(!$extensao){
	    	$extensao = 'image/'.strtolower(end(explode(".", $foto['name'])));
		}

	    $setImagem = "NULL";

	    if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $extensao)){ $error[1] = "O arquivo não é uma imagem."; }

	    if (count($error) == 0) {
	    	preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
	    	$nome_imagem = md5(uniqid(time())) . "." . $ext[1]; 
	    	$caminho_imagem = "../lista-casamento/fotos/temp/" . $nome_imagem;
	    	$upload = @move_uploaded_file($foto["tmp_name"], $caminho_imagem);

	    	if($upload){
	    		$nome_imagem = sqlvalue($nome_imagem, true);
	    		$setImagem = $nome_imagem;
	    	}

	    	$handle = new Upload($caminho_imagem);
        	$upload = $handle->uploaded;

        	if ($upload) {

                $handle->file_max_size = '4096000';

                $handle->image_ratio_crop      = true;
                $handle->image_resize          = true;
                $handle->image_ratio_fill      = true;
                $handle->image_y               = 203;
                $handle->image_x               = 275;
                $handle->image_background_color = '#ffffff';
                $handle->file_overwrite = true;
                Process($handle, '../lista-casamento/fotos/');

                $handle->Clean();
            }
	    }

	    $arrayEnderecos = array('CERIMONIA' => array(
			    'data' => formataDataInsert($_POST['dataCerimonia']),
			    'foneDados1' => NULL,
			    'foneDados3' => NULL,
			    'nome' => NULL,
			    'hora' => $_POST['horaCerimonia'],
			    'local' => $_POST['localCerimonia'],
			    'cep' => trataInsertCep($_POST['cepCerimonia']),
			    'rua' => $_POST['ruaCerimonia'],
			    'numero' => $_POST['numeroCerimonia'],
			    'complemento' => $_POST['complementoCerimonia'],
			    'bairro' => $_POST['bairroCerimonia'],
			    'estado' => $_POST['estadoCerimonia'],
			    'cidade' => $_POST['cidadeCerimonia']
			),
	    	 'RECEPCAO' => array(
	    		'data' => formataDataInsert($_POST['dataRecepcao']),
	    		'foneDados1' => NULL,
			    'foneDados3' => NULL,
			    'nome' => NULL,
			    'hora' => $_POST['horaRecepcao'],
			    'local' => $_POST['localRecepcao'],
			    'cep' => trataInsertCep($_POST['cepRecepcao']),
			    'rua' => $_POST['ruaRecepcao'],
			    'numero' => $_POST['numeroRecepcao'],
			    'complemento' => $_POST['complementoRecepcao'],
			    'bairro' => $_POST['bairroRecepcao'],
			    'estado' => $_POST['estadoRecepcao'],
			    'cidade' => $_POST['cidadeRecepcao']
	    	),
	    	 'ENTREGA' => array(
	    		'data' => formataDataInsert($_POST['dataEntrega']),
			    'foneDados1' => trataInsertTelefone($_POST['foneDados1']),
			    'foneDados3' => trataInsertTelefone($_POST['foneDados3']),
			    'nome' => $_POST['nomeDados'],
			    'hora' => NULL,
			    'local' => NULL,
			    'cep' => trataInsertCep($_POST['cepDados']),
			    'rua' => $_POST['ruaDados'],
			    'numero' => $_POST['numeroDados'],
			    'complemento' => $_POST['complementoDados'],
			    'bairro' => $_POST['bairroDados'],
			    'estado' => $_POST['estadoDados'],
			    'cidade' => $_POST['cidadeDados'],
			    'referencia' => $_POST['referenciaDados']
	    	)
		);

	    $url = sqlvalue(fnTrataUrlAmigavel($nome1." e ".$nome2), true);

		$queryListaCasamento = "INSERT INTO e_LISTA_CASAMENTO
								           (URL
								           ,PESS_ID_PESSOA
								           ,CONJUGE1
								           ,EMAIL_CONJUGE1
								           ,NOME_PAI_CONJUGE1
								           ,NOME_MAE_CONJUGE1
								           ,CONJUGE2
								           ,EMAIL_CONJUGE2
								           ,NOME_PAI_CONJUGE2
								           ,NOME_MAE_CONJUGE2
								           ,FOTO_CAPA
								           ,MENSAGEM
								           ,USUARIO_INSERT)
								     VALUES
								           (fn_trata_caracter_especial(".$url.")
								           ,".$idPessoa."
								           ,".$nome1."
								           ,".$emailNome1."
								           ,".$nomePai1."
								           ,".$nomeMae1."
								           ,".$nome2."
								           ,".$emailNome2."
								           ,".$nomePai2."
								           ,".$nomeMae2."
								           ,".$setImagem."
								           ,".$mensagem."
								           ,'actions/lista-casamento.php');
								SELECT IDENT_CURRENT('e_LISTA_CASAMENTO') AS 'ID_LISTA_CASAMENTO';";

		$resultListaCasamento = $mysqli->ConsultarSQL($queryListaCasamento);

		$idListaCasamento = $resultListaCasamento[0]['ID_LISTA_CASAMENTO'];
		
		foreach ($arrayEnderecos as $key => $value) {

			$queryListaCasamentoEndereco .= "INSERT INTO e_LISTA_CASAMENTO_ENDERECO
											           (LICA_ID_LISTA_CASAMENTO
											           ,NOME_CONTATO
											           ,TIPO_ENDERECO
											           ,DATA_EVENTO
											           ,HORA_EVENTO
											           ,LOCAL_EVENTO
											           ,ENDERECO
											           ,NUMERO
											           ,COMPLEMENTO
											           ,BAIRRO
											           ,MUNICIPIO
											           ,CEP_ID_CEP
											           ,ESTADO
											           ,REFERENCIA
											           ,TELEFONE_PRINCIPAL
											           ,CELULAR
											           ,USUARIO_INSERT)
											     VALUES
											           (".$idListaCasamento."
											           ,".sqlvalue($value['nome'], true)."
											           ,".sqlvalue($key, true)."
											           ,".sqlvalue($value['data'], true)."
											           ,".sqlvalue($value['hora'], true)."
											           ,".sqlvalue($value['local'], true)."
											           ,".sqlvalue($value['rua'], true)."
											           ,".sqlvalue($value['numero'], true)."
											           ,".sqlvalue($value['complemento'], true)."
											           ,".sqlvalue($value['bairro'], true)."
											           ,".sqlvalue($value['cidade'], true)."
											           ,".sqlvalue($value['cep'], true)."
											           ,".sqlvalue($value['estado'], true)."
											           ,".sqlvalue($value['referencia'], true)."
											           ,".sqlvalue($value['foneDados1'], true)."
											           ,".sqlvalue($value['foneDados3'], true)."
											           ,'actions/lista-casamento.php');
														";
		}
		$queryListaCasamentoEndereco .= "SELECT @@ROWCOUNT NRO_LINHAS";
		$result = $mysqli->ConsultarSQL($queryListaCasamentoEndereco);

		$nroLinhas = $result[0]['NRO_LINHAS'];

		if($nroLinhas > 0){
			$_SESSION['sessionIdListaCasamento'] = $idListaCasamento;
			$_SESSION['sessionMinhaIdListaCasamento'] = $idListaCasamento;
			$retorno = '{"retorno": "sucesso", "redireciona": "lista-de-casamento-sucesso"}';
		} else {
			$retorno = '{"retorno": "erro"}';
		}

		echo $retorno;

		break;

	case 'editaListaCasamento':

		$idListaCasamento = sqlvalue($_POST['idListaCasamento'], false);
		$nome1 = sqlvalue($_POST['nome1'], true);
	    $emailNome1 = sqlvalue($_POST['emailNome1'], true);
	    $nomePai1 = sqlvalue($_POST['nomePai1'], true);
	    $nomeMae1 = sqlvalue($_POST['nomeMae1'], true);
	    $nome2 = sqlvalue($_POST['nome2'], true);
	    $emailNome2 = sqlvalue($_POST['emailNome2'], true);
	    $nomePai2 = sqlvalue($_POST['nomePai2'], true);
	    $nomeMae2 = sqlvalue($_POST['nomeMae2'], true);
	    $mensagem = sqlvalue($_POST['mensagem'], true);

	    $foto = $_FILES["fotoCasal"];

	    $extensao = $foto["type"];
	    if(!$extensao){
	    	$extensao = 'image/'.strtolower(end(explode(".", $foto['name'])));
		}

	    $setImagem = "";

	    if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp|jpg)$/", $extensao)){ $error[1] = "O arquivo não é uma imagem."; }

	    if (count($error) == 0) {
	    	preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
	    	$nome_imagem = md5(uniqid(time())) . "." . $ext[1]; 
	    	$caminho_imagem = "../lista-casamento/fotos/temp/" . $nome_imagem;

	    	$upload = @move_uploaded_file($foto["tmp_name"], $caminho_imagem);

	    	if($upload){
	    		$nome_imagem = sqlvalue($nome_imagem, true);
	    		$setImagem = ",FOTO_CAPA = ".$nome_imagem;
	    	}

	    	$handle = new Upload($caminho_imagem);
        	$upload = $handle->uploaded;

        	if ($upload) {

                $handle->file_max_size = '4096000';

                $handle->image_ratio_crop      = true;
                $handle->image_resize          = true;
                $handle->image_ratio_fill      = true;
                $handle->image_y               = 203;
                $handle->image_x               = 275;
                $handle->image_background_color = '#ffffff';
                $handle->file_overwrite = true;
                Process($handle, '../lista-casamento/fotos/');

                $handle->Clean();
            }
	    }

	    $arrayEnderecos = array('CERIMONIA' => array(
			    'data' => formataDataInsert($_POST['dataCerimonia']),
			    'foneDados1' => NULL,
			    'foneDados3' => NULL,
			    'nome' => NULL,
			    'hora' => $_POST['horaCerimonia'],
			    'local' => $_POST['localCerimonia'],
			    'cep' => trataInsertCep($_POST['cepCerimonia']),
			    'rua' => $_POST['ruaCerimonia'],
			    'numero' => $_POST['numeroCerimonia'],
			    'complemento' => $_POST['complementoCerimonia'],
			    'bairro' => $_POST['bairroCerimonia'],
			    'estado' => $_POST['estadoCerimonia'],
			    'cidade' => $_POST['cidadeCerimonia']
			),
	    	 'RECEPCAO' => array(
	    		'data' => formataDataInsert($_POST['dataRecepcao']),
	    		'foneDados1' => NULL,
			    'foneDados3' => NULL,
			    'nome' => NULL,
			    'hora' => $_POST['horaRecepcao'],
			    'local' => $_POST['localRecepcao'],
			    'cep' => trataInsertCep($_POST['cepRecepcao']),
			    'rua' => $_POST['ruaRecepcao'],
			    'numero' => $_POST['numeroRecepcao'],
			    'complemento' => $_POST['complementoRecepcao'],
			    'bairro' => $_POST['bairroRecepcao'],
			    'estado' => $_POST['estadoRecepcao'],
			    'cidade' => $_POST['cidadeRecepcao']
	    	),
	    	 'ENTREGA' => array(
	    		'data' => formataDataInsert($_POST['dataEntrega']),
			    'foneDados1' => trataInsertTelefone($_POST['foneDados1']),
			    'foneDados3' => trataInsertTelefone($_POST['foneDados3']),
			    'nome' => $_POST['nomeDados'],
			    'hora' => NULL,
			    'local' => NULL,
			    'cep' => trataInsertCep($_POST['cepDados']),
			    'rua' => $_POST['ruaDados'],
			    'numero' => $_POST['numeroDados'],
			    'complemento' => $_POST['complementoDados'],
			    'bairro' => $_POST['bairroDados'],
			    'estado' => $_POST['estadoDados'],
			    'cidade' => $_POST['cidadeDados'],
			    'referencia' => $_POST['referenciaDados']
	    	)
		);

	    $url = sqlvalue(fnTrataUrlAmigavel($nome1." e ".$nome2), true);

		$queryListaCasamento = "UPDATE e_LISTA_CASAMENTO
							        SET URL = fn_trata_caracter_especial(".$url.")
							           ,CONJUGE1 = ".$nome1."
							           ,EMAIL_CONJUGE1 = ".$emailNome1."
							           ,NOME_PAI_CONJUGE1 = ".$nomePai1."
							           ,NOME_MAE_CONJUGE1 = ".$nomeMae1."
							           ,CONJUGE2 = ".$nome2."
							           ,EMAIL_CONJUGE2 = ".$emailNome2."
							           ,NOME_PAI_CONJUGE2 = ".$nomePai2."
							           ,NOME_MAE_CONJUGE2 = ".$nomeMae2."
							           ".$setImagem."
							           ,MENSAGEM = ".$mensagem."
							           ,DATA_UPDATE = now()
							           ,USUARIO_UPDATE = 'actions/lista-casamento.php'
							     WHERE ID_LISTA_CASAMENTO = ".$idListaCasamento."";

		$resultListaCasamento = $mysqli->ConsultarSQL($queryListaCasamento);
		
		foreach ($arrayEnderecos as $key => $value) {

			$queryListaCasamentoEndereco .= "UPDATE e_LISTA_CASAMENTO_ENDERECO
											        SET 
											           NOME_CONTATO = ".sqlvalue($value['nome'], true)."
											           ,DATA_EVENTO = ".sqlvalue($value['data'], true)."
											           ,HORA_EVENTO = ".sqlvalue($value['hora'], true)."
											           ,LOCAL_EVENTO = ".sqlvalue($value['local'], true)."
											           ,ENDERECO = ".sqlvalue($value['rua'], true)."
											           ,NUMERO = ".sqlvalue($value['numero'], true)."
											           ,COMPLEMENTO = ".sqlvalue($value['complemento'], true)."
											           ,BAIRRO = ".sqlvalue($value['bairro'], true)."
											           ,MUNICIPIO = ".sqlvalue($value['cidade'], true)."
											           ,CEP_ID_CEP = ".sqlvalue($value['cep'], true)."
											           ,ESTADO = ".sqlvalue($value['estado'], true)."
											           ,REFERENCIA = ".sqlvalue($value['referencia'], true)."
											           ,TELEFONE_PRINCIPAL = ".sqlvalue($value['foneDados1'], true)."
											           ,CELULAR = ".sqlvalue($value['foneDados3'], true)."
											           ,DATA_UPDATE = now()
											           ,USUARIO_UPDATE = 'actions/lista-casamento.php'
											    WHERE TIPO_ENDERECO = ".sqlvalue($key, true)."
											    AND LICA_ID_LISTA_CASAMENTO = ".$idListaCasamento.";
											    ";
		}

		$queryListaCasamentoEndereco .= "SELECT @@ROWCOUNT NRO_LINHAS";
		$result = $mysqli->ConsultarSQL($queryListaCasamentoEndereco);

		$nroLinhas = $result[0]['NRO_LINHAS'];

		if($nroLinhas > 0){
			$retorno = '{"retorno": "sucesso", "atualiza": "S"}';
		} else {
			$retorno = '{"retorno": "erro"}';
		}

		echo $retorno;

		break;

	case 'enviarEmailListaCasamento':

		$idListaCasamento = $_POST['idListaCasamento'];
		$emails = $_POST['emails'];

		$enviaEmail = enviaEmail('divulgaListaCasamento', $idListaCasamento, $emails);

		if($enviaEmail){
			$retorno = '{"retorno": "sucesso"}';
		} else {
			$retorno = '{"retorno": "erro"}';	
		}

		echo $retorno;

		break;

	case 'adicionaProduto':

		$idPessoa = sqlvalue($_POST['idPessoa'], false);
		$idProduto = sqlvalue($_POST['idProduto'], false);

		$queryIdListaCasamento = "SELECT TOP 1 ID_LISTA_CASAMENTO FROM e_LISTA_CASAMENTO WHERE PESS_ID_PESSOA = ".$idPessoa." AND ATIVO = 'S'";
		$resultIdListaCasamento = $mysqli->ConsultarSQL($queryIdListaCasamento);
		$idListaCasamento = sqlvalue($resultIdListaCasamento[0]['ID_LISTA_CASAMENTO'], false);

		if($idListaCasamento){
			
			$queryAdicionaProduto = "IF NOT EXISTS (SELECT 1 FROM e_LISTA_CASAMENTO_PRODUTO WHERE PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR = ".$idProduto." AND LICA_ID_LISTA_CASAMENTO = ".$idListaCasamento.")
										BEGIN
										INSERT INTO e_LISTA_CASAMENTO_PRODUTO
									           (LICA_ID_LISTA_CASAMENTO
									           ,PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR
									           ,QTD_SOLICITADA
									           ,USUARIO_INSERT)
									     VALUES
									           (".$idListaCasamento."
									           ,".$idProduto."
									           ,1
									           ,'actions/lista-casamento.php');
										SELECT @@ROWCOUNT NRO_LINHAS
										END
										ELSE
										BEGIN
										SELECT 'S' EXISTE
										END
									";
			
			$resultAdicionaProduto = $mysqli->ConsultarSQL($queryAdicionaProduto);

			if($resultAdicionaProduto[0]['EXISTE'] == 'S'){
				$retorno = '{"retorno": "existe"}';
			} elseif($resultAdicionaProduto[0]['NRO_LINHAS'] > 0){	
				$retorno = '{"retorno": "sucesso"}';
			} else {
				$retorno = '{"retorno": "erro"}';
			}

		} else {
			$retorno = '{"retorno": "naoexiste"}';
		}

		echo $retorno;

		break;

	case 'exluirListaCasamento':

		$idListaCasamento = $_POST['idListaCasamento'];

		$query = "UPDATE e_LISTA_CASAMENTO SET ATIVO = 'N' WHERE ID_LISTA_CASAMENTO = ".$idListaCasamento."";

		$result = $mysqli->ExecutarSQL($query);

		if($result){
			$retorno = '{"retorno": "sucesso"}';
		} else {
			$retorno = '{"retorno": "erro"}';	
		}

		echo $retorno;

		break;

	case 'sairListaCasamento':
		$_SESSION['sessionIdListaCasamento'] = '';
		echo '{"retorno": "sucesso"}';
		break;

	case 'removeProdutoListaCasamento':
		
		$idProduto = sqlvalue($_POST['idProduto'], false);
		$idListaCasamento = sqlvalue($_SESSION['sessionMinhaIdListaCasamento'], true);
		
		$query = "UPDATE e_LISTA_CASAMENTO_PRODUTO SET ATIVO = 'N', DATA_UPDATE = now(), USUARIO_UPDATE = 'actions/lista-casamento.php'
					WHERE PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR = ".$idProduto." AND LICA_ID_LISTA_CASAMENTO = ".$idListaCasamento."";
		
		if($mysqli->ExecutarSQL($query)){
			$retorno = '{"retorno": "sucesso"}';
		} else {
			$retorno = '{"retorno": "sucesso"}';
		}
		
		echo $retorno;
		
		break;

	case 'gravaMensagemListaCasamento':
		
		$idPedido = sqlvalue($_POST['idPedido'], false);
		$mensagem = sqlvalue($_POST['mensagem'], true);
		
		$query = "UPDATE e_PEDIDO SET MENSAGEM_LISTA_CASAMENTO = ".$mensagem." WHERE ID_PEDIDO = ".$idPedido.";
					SELECT @@ROWCOUNT LINHAS;";

		$row = $mysqli->ConsultarSQL($query);

		if($row[0]['LINHAS'] > 0){
			$retorno = '{"retorno": "sucesso"}';
		} else {
			$retorno = '{"retorno": "erro"}';
		}

		echo $retorno;

		break;

	case 'alteraQuantidadeProduto':
		
		$idProduto = sqlvalue($_POST['idProduto'], false);
		$quantidade = sqlvalue($_POST['quantidade'], false);
		$idListaCasamento = sqlvalue($_SESSION['sessionMinhaIdListaCasamento'], true);
		
		echo $query = "UPDATE e_LISTA_CASAMENTO_PRODUTO SET QTD_SOLICITADA = ".$quantidade." 
					WHERE PCAV_ID_PRODUTO_COMBINACAO_ATRIBUTO_VALOR = ".$idProduto."
					AND LICA_ID_LISTA_CASAMENTO = ".$idListaCasamento."";

		if($mysqli->ExecutarSQL($query)){
			$retorno = '{"retorno": "sucesso"}';
		} else {
			$retorno = '{"retorno": "erro"}';
		}
		
		echo $retorno;

		break;
	
	default:
		# code...
		break;
}

function Process(&$handle, $dir_pics) {
    $handle->Process($dir_pics);
}

?>