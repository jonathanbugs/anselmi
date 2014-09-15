<?php
require_once(PHP_ROOT.'/'.CLASS_DIR.'/pedido.class.php');
$Pedido = new Pedido($mysqli);

$smarty->assign('titulo_pagina','Visualiza Pessoa');

if(isset($_REQUEST["idPessoa"])) $idPessoa = $_REQUEST["idPessoa"]; 

if(ID_LOJA <> 1){
	$whereIdLoja = "AND PESS.LOJA_ID_LOJA = ".ID_LOJA."";
} else {
	$whereIdLoja = "";
}

/**/
$query = "SELECT 
				PESS.ID_PESSOA,
				PESS.NOME,
				PESS.SOBRENOME,
				PESS.APELIDO,
				PESS.NOME_FANTASIA,
				PESS.CPF,
				PESS.CNPJ,
				PESS.RG,
				PESS.EMAIL,
				date_format(PESS.DATA_NASCIMENTO, '%d/%m/%Y') DATA_NASCIMENTO,
				PESS.SEXO,
				PESS.TIPO,
				PESS.IE,
				PESS.IP,
				PESS.NOME_CONTATO,
				PECO.DESCRICAO CONCEITO,
				PESS.PECO_ID_PESSOA_CONCEITO,
				PECON.DESCRICAO TELEFONE,
				PECON2.DESCRICAO CELULAR,
				PETC.DESCRICAO_TIPO_CATEGORIA,
				PETC.ID_PESSOA_TIPO_CATEGORIA
			FROM
				e_PESSOA PESS LEFT JOIN e_PESSOA_CONTATO PECON
									 ON PECON.PESS_ID_PESSOA = PESS.ID_PESSOA
									 AND PECON.TICO_ID_TIPO_CONTATO = 1
							  LEFT JOIN e_PESSOA_CONTATO PECON2
									 ON PECON2.PESS_ID_PESSOA = PESS.ID_PESSOA
									 AND PECON2.TICO_ID_TIPO_CONTATO = 2,
				e_PESSOA_CONCEITO PECO,
				e_PESSOA_TIPO_CATEGORIA PETC
			WHERE
				PESS.ID_PESSOA = ".$idPessoa."
			".$whereIdLoja."
			AND PESS.PECO_ID_PESSOA_CONCEITO = PECO.ID_PESSOA_CONCEITO
			AND PESS.PETC_ID_PESSOA_TIPO_CATEGORIA = PETC.ID_PESSOA_TIPO_CATEGORIA";

$visualizaDadosPessoa = $mysqli->ConsultarSQL($query);
$smarty->assign('idPessoa', $visualizaDadosPessoa[0]["ID_PESSOA"]);
$smarty->assign('visualizaDadosPessoa',$visualizaDadosPessoa);

$idPessoa = $visualizaDadosPessoa[0]['ID_PESSOA'];

/**/
$queryEndereco = "SELECT 
						PEEN.APELIDO_ENDERECO,
						PEEN.ENDERECO,
						PEEN.NUMERO,
						PEEN.COMPLEMENTO,
						PEEN.BAIRRO,
						PEEN.MUNICIPIO,
						PEEN.UF,
						PEEN.CEP,
						PEEN.REFERENCIA,
						PEEN.UF,
						PEEN.PAIS,
						PEEN.ID_PESSOA_ENDERECO,
						PEEN.PESS_ID_PESSOA
					FROM
						e_PESSOA_ENDERECO PEEN
					WHERE
						PEEN.PESS_ID_PESSOA = ".$idPessoa."";

$visualizaEnderecoPessoa = $mysqli->ConsultarSQL($queryEndereco);
$smarty->assign('visualizaEnderecoPessoa',$visualizaEnderecoPessoa);

/**/
$queryConceitoPessoa = "SELECT PECO.ID_PESSOA_CONCEITO, PECO.DESCRICAO FROM e_PESSOA_CONCEITO PECO";
$conceitoPessoa = $mysqli->ConsultarSQL($queryConceitoPessoa);
$smarty->assign('conceitoPessoa',$conceitoPessoa);
/**/

/**/
$queryCategoriaPessoa = "SELECT ID_PESSOA_TIPO_CATEGORIA, DESCRICAO_TIPO_CATEGORIA FROM e_PESSOA_TIPO_CATEGORIA";
$categoriaPessoa = $mysqli->ConsultarSQL($queryCategoriaPessoa);
$smarty->assign('categoriaPessoa',$categoriaPessoa);
/**/

/**/
$listaPedidoPessoa = $Pedido->fnPedido($idPessoa);
$smarty->assign('listaPedidoPessoa',$listaPedidoPessoa);
/**/


/*ocorrencias*/
$queryOcorrencia = "SELECT ID_OCOCRRENCIA
					      ,PESS_ID_PESSOA
					      ,PEDI_ID_PEDIDO
					      ,DESCRICAO
					      ,date_format(DATA,'%d/%m/%Y %H:%i:%s') DATA
					  FROM e_OCORRENCIA
					  WHERE PESS_ID_PESSOA = ".$idPessoa."";
$listaOcorrencia = $mysqli->ConsultarSQL($queryOcorrencia);
$smarty->assign('listaOcorrencia', $listaOcorrencia);
/**/

#plugins
$smarty->append('js_files', PLUGINS_DIR.'form/jquery.form.js');

#JS
$smarty->append('js_files', JS_DIR.'pessoa.js');

#CSS
$smarty->append('css_files', CSS_DIR.'pessoa.css');

?>