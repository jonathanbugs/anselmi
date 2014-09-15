<?php
set_time_limit(0);

require('../../configs/config.php');

$query = "SELECT
				DISTINCT
				PEDI.ID_PEDIDO,
				PESS.EMAIL,
				PESS.NOME
			FROM
				e_PEDIDO PEDI,
				e_PEDIDO_ITEM PEIT,
				e_PESSOA PESS
			WHERE
				PEDI.ID_PEDIDO = PEIT.PEDI_ID_PEDIDO
			AND PEIT.SPIT_ID_SITUACAO_PEDIDO_ITEM = ".ID_SITUACAO_PEDIDO_DESPACHADO."
			AND PEIT.AVISADO_DESPACHO = 'N'
			AND PEDI.PESS_ID_PESSOA = PESS.ID_PESSOA";

$result = $mysqli->ConsultarSQL($query);

foreach ($result as $value) {
	$idPedido = $value['ID_PEDIDO'];
	$nomePessoa = $value['NOME'];
	$emailPessoa = $value['EMAIL'];
	
	$enviaEmail = enviaEmail('situacaoPedido', $nomePessoa, $emailPessoa, null, $idPedido);

	// if($enviaEmail){
	// 	$query = "UPDATE e_PEDIDO_ITEM SET AVISADO_DESPACHO = 'S' 
	// 			  WHERE PEDI_ID_PEDIDO = ".$idPedido." 
	// 			  AND SPIT_ID_SITUACAO_PEDIDO_ITEM = ".ID_SITUACAO_PEDIDO_DESPACHADO."";
	// 	$mysqli->ExecutarSQL($query);
	// }
}

?>