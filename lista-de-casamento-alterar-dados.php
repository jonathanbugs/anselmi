<?php
$paginaTit = 'Lista de Casamento Alterar Dados';
$navegacao = 'Lista de Casamento Alterar Dados';
$menu = 'lista-de-casamento-alterar-dados';

if(!$_SESSION['sessionMinhaIdListaCasamento']){
	header('Location:/lista-de-casamento');
}

$idListaCasamento = sqlvalue($_SESSION['sessionMinhaIdListaCasamento'], false);

$query = "SELECT
				LICA.URL
			   ,LICA.CONJUGE1
			   ,LICA.EMAIL_CONJUGE1
			   ,LICA.NOME_PAI_CONJUGE1
			   ,LICA.NOME_MAE_CONJUGE1
			   ,LICA.CONJUGE2
			   ,LICA.EMAIL_CONJUGE2
			   ,LICA.NOME_PAI_CONJUGE2
			   ,LICA.NOME_MAE_CONJUGE2
			   ,LICA.FOTO_CAPA
			   ,LICA.MENSAGEM
			   ,LCEN.NOME_CONTATO
			   ,LCEN.TIPO_ENDERECO
			   ,CONVERT(CHAR, LCEN.DATA_EVENTO, 103) DATA_EVENTO
			   ,LCEN.HORA_EVENTO
			   ,LCEN.LOCAL_EVENTO
			   ,LCEN.ENDERECO
			   ,LCEN.NUMERO
			   ,LCEN.COMPLEMENTO
			   ,LCEN.BAIRRO
			   ,LCEN.MUNICIPIO
			   ,LCEN.CEP_ID_CEP
			   ,LCEN.ESTADO
			   ,LCEN.REFERENCIA
			   ,LCEN.TELEFONE_PRINCIPAL
			   ,LCEN.CELULAR
			   ,LICA.ID_LISTA_CASAMENTO
			FROM
				e_LISTA_CASAMENTO LICA,
				e_LISTA_CASAMENTO_ENDERECO LCEN
			WHERE
				LICA.ID_LISTA_CASAMENTO = LCEN.LICA_ID_LISTA_CASAMENTO
			AND LICA.ATIVO = 'S'
			AND LICA.ID_LISTA_CASAMENTO = ".$idListaCasamento."";

$result = $mysqli->ConsultarSQL($query);

foreach ($result as $key => $value) {
   	if($value['TIPO_ENDERECO'] == 'CERIMONIA'){
   		$enderecoCerimonia = array($value);
   	} elseif($value['TIPO_ENDERECO'] == 'RECEPCAO'){
   		$enderecoRecepcao = array($value);
   	} elseif($value['TIPO_ENDERECO'] == 'ENTREGA'){
   		$enderecoEntrega = array($value);
   	}
}

$idListaCasamento = $result[0]['ID_LISTA_CASAMENTO'];
$url = $result[0]['URL'];
$conjuge1 = ucwords(strtolower($result[0]['CONJUGE1']));
$emailConjuge1 = $result[0]['EMAIL_CONJUGE1'];
$nomePaiConjuge1 = $result[0]['NOME_PAI_CONJUGE1'];
$nomeMaeConjuge1 = $result[0]['NOME_MAE_CONJUGE1'];
$conjuge2 = ucwords(strtolower($result[0]['CONJUGE2']));
$emailConjuge2 = $result[0]['EMAIL_CONJUGE2'];
$nomePaiConjuge2 = $result[0]['NOME_PAI_CONJUGE2'];
$nomeMaeConjuge2 = $result[0]['NOME_MAE_CONJUGE2'];
$fotoCapa = $result[0]['FOTO_CAPA'];
$mensagem = $result[0]['MENSAGEM'];

$smarty->assign('idListaCasamento', $idListaCasamento);
$smarty->assign('url', $url);
$smarty->assign('nomeConjuge1', $conjuge1);
$smarty->assign('emailConjuge1', $emailConjuge1);
$smarty->assign('nomePaiConjuge1', $nomePaiConjuge1);
$smarty->assign('nomeMaeConjuge1', $nomeMaeConjuge1);
$smarty->assign('nomeConjuge2', $conjuge2);
$smarty->assign('emailConjuge2', $emailConjuge2);
$smarty->assign('nomePaiConjuge2', $nomePaiConjuge2);
$smarty->assign('nomeMaeConjuge2', $nomeMaeConjuge2);
$smarty->assign('fotoCapa', $fotoCapa);
$smarty->assign('mensagem', $mensagem);
$smarty->assign('enderecoEntrega', $enderecoEntrega);
$smarty->assign('enderecoRecepcao', $enderecoRecepcao);
$smarty->assign('enderecoCerimonia', $enderecoCerimonia);


// $smarty->append('css_files', CSS_DIR.$sessao.'.css');
// $smarty->append('js_files', JS_DIR.$sessao.'.js');
?>
