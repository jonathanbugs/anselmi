<?php
require_once(PHP_ROOT.'/'.CLASS_DIR.'/pessoa.class.php');
require_once(PHP_ROOT.'/'.CLASS_DIR.'/produto.class.php');
require_once(PHP_ROOT.'/'.CLASS_DIR.'/pedido.class.php');

$Pessoa = new Pessoa($mysqli);
$Produto = new Produto($mysqli);
$Pedido = new Pedido($mysqli);

$smarty->assign('titulo_pagina','Cadastra Pedido');

/**/
$listaPessoa = $Pessoa->fnPessoa();
$smarty->assign('listaPessoa',$listaPessoa);
/**/

/**/
$listaTipoFrete = $Pedido->fnTipoFrete();
$smarty->assign('listaTipoFrete',$listaTipoFrete);
/**/

/**/
$nroParcelas = $Pedido->fnNroParcelas();
$smarty->assign('listaNroParcelas',$nroParcelas);
/**/


/**/
$listaFormaPagamento = $Pedido->fnFormaPagamento();
while($rowFormaPagamento = @mssql_fetch_array($listaFormaPagamento)){
	$listaTipoFormaPagamento[$rowFormaPagamento["TIPO_FORMA_PAGAMENTO"]][$rowFormaPagamento["ID_FORMA_PAGAMENTO"]] = $rowFormaPagamento["DESCRICAO_FORMA_PAGAMENTO"];
}

$smarty->assign('listaTipoFormaPagamento',$listaTipoFormaPagamento);
/**/

#plugins
$smarty->append('js_files', PLUGINS_DIR.'form/jquery.form.js');

#JS
$smarty->append('js_files', JS_DIR.'pedido.js');

#CSS
$smarty->append('css_files', CSS_DIR.'pedido.css');
?>