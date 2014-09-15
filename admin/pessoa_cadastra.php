<?php
$smarty->assign('titulo_pagina','Cadastra Pessoa');

$queryDadosPessoa = "SELECT 
							PECO.ID_PESSOA_CONCEITO ID, 
							PECO.DESCRICAO DESCRICAO,
							'PECO' TABELA 
						FROM 
							e_PESSOA_CONCEITO PECO
						UNION
						SELECT 
							PESI.ID_PESSOA_SITUACAO ID, 
							PESI.DESCRICAO_SITUACAO DESCRICAO,
							'PESI' TABELA 
						FROM 
							e_PESSOA_SITUACAO PESI
						UNION
						SELECT 
							PETC.ID_PESSOA_TIPO_CATEGORIA ID, 
							PETC.DESCRICAO_TIPO_CATEGORIA DESCRICAO,
							'PETC' TABELA 
						FROM 
							e_PESSOA_TIPO_CATEGORIA PETC";

$pessoaDadosPessoa = $mysqli->ConsultarSQL($queryDadosPessoa);

foreach($pessoaDadosPessoa as $valorDadosPessoa){
	if($valorDadosPessoa["TABELA"] == "PECO"){
		$pessoaConceito[] = $valorDadosPessoa;
	}elseif($valorDadosPessoa["TABELA"] == "PESI"){
		$pessoaSituacao[] = $valorDadosPessoa;
	}elseif($valorDadosPessoa["TABELA"] == "PETC"){
		$pessoaTipoCategoria[] = $valorDadosPessoa;
	}
}

$smarty->assign('pessoaConceito', $pessoaConceito);
$smarty->assign('pessoaSituacao', $pessoaSituacao);
$smarty->assign('pessoaTipoCategoria', $pessoaTipoCategoria);


#plugins
$smarty->append('js_files', PLUGINS_DIR.'form/jquery.form.js');

#JS
$smarty->append('js_files', JS_DIR.'pessoa.js');

#CSS
$smarty->append('css_files', '');
?>