<?php
#config loja
if(isset($subdominio)) $subdominio = $subdominio;
$idsLojas = array('malhastaudt'=>3, 'www'=>1);
//define("ID_LOJA", $idsLojas[$subdominio]);
define('ID_LOJA', 1);
define("IP_USUARIO", $_SERVER["REMOTE_ADDR"]);
if(isset($_SESSION["sessionNome"])){
	$usuarioLogado = $_SESSION["sessionNome"];
} else {
	$usuarioLogado = null;
}
define("USUARIO_LOGADO", $usuarioLogado);
define("SENHA_PADRAO", "2a215f0e53e4df91282da6ec7bf7bbef");

#parametro loja
require_once("parametro_loja_".ID_LOJA.".php");


#mensagens
define("EMAIL_JA_CADASTRADO", "E-mail j&aacute; consta em nossos cadastros!");
define("CPF_JA_CADASTRADO", "CPF j&aacute; consta em nossos cadastros!");
define("ERRO_GRAVAR_PESSOA", "Erro ao gravar os dados! Verifique os dados e tente novamente.");
define("ERRO_GRAVAR_PESSOA_ENDERECO", "Erro ao gravar o endere&ccedil;o! Verifique os dados e tente novamente.");
define("ERRO_GRAVAR_PESSOA_CONTATO", "Erro ao gravar os dados de contato! Verifique os dados e tente novamente.");
define("CADASTRO_REALIZADO", "Cadastro realizado com sucesso!");
define("CEP_NAO_ENCONTRADO", "O CEP &eacute; inv&aacute;lido ou n&atilde;o foi encontrado na base de dados.");
define("EDITADO_COM_SUCESSO", "Dados editados com sucesso!");
define("ERRO_AO_EDITAR", "Erro ao editar, verifique os dados e tente novamente!");
define("SENHA_ENVIADA_SUCESSO", "Senha enviada com sucesso!");
define("ERRO_ENVIAR_SENHA", "Erro ao enviar a senha!");
define("ERRO_AO_GRAVAR", "Erro ao gravar, verifique os dados e tente novamente.");
define("ERRO_AO_EXCLUIR", "N&atilde;o &eacute; poss&iacute;vel excluir.");
define("EXCLUIDO", "Exclu&iacute;do com sucesso!");
define("PRECO_PRODUTO_NAO_INFORMADO", "Informe os valores corretamente!");
define("NOVO_CALCULO_FRETE", "Frete calculado com sucesso!");
define("ERRO_CALCULO_FRETE", "N&atilde;o foi poss&iacute;vel calcular o frete!");
define("PEDIDO_EXPORTADO", "Pedidos exportados com sucesso!");
define("CLIENTE_EXPORTADO", "Clientes exportados com sucesso!");
define("PEDIDO_NAO_EXPORTADO", "Pedidos n&atilde;o foram exportados!");
define("CLIENTE_NAO_EXPORTADO", "Clientes n&atilde;o foram exportados!");
define("FALTOU_SELECIONAR_PRODUTO", "Selecione os produtos antes de salvar");
define("ERRO_AO_GRAVAR_VERIFIQUE", "Erro ao gravar! Verifique os dados e tente novamente.");
define("EMAIL_CONJUGE1_CADASTRO_PESSOA", "E-mail do C&ocirc;njuge 1 n&atilde;o tem cadastro na loja!");

if(isset($_COOKIE["cod_temp_cliente"]) and $_COOKIE["cod_temp_cliente"] != ""){
	define("COD_TEMP_CLIENTE", $_COOKIE["cod_temp_cliente"]);
} else {
	setcookie("cod_temp_cliente", session_id(), time()+60*60*24*30);
	define("COD_TEMP_CLIENTE", session_id());
}


?>