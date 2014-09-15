<?php
session_start();

### Configuracoes do Banco
require_once('../configs/database.php');
require_once('../configs/parametro_loja_1.php');

### Classes PHP
require_once('../classes/funcoes.php');
$conn = ConectarBanco();
$mysqli = new DB($conn);

$idPedido = sqlvalue($_POST['idPedido'], false);
if($_POST['nroParcelas']){
  $nroParcelas = $_POST['nroParcelas'];
} else {
  $nroParcelas = 1;
}

$formaPagamento = sqlvalue($_POST['formaPagamento'], true);

$arrayFopaDesconto = array('Itau', 'Bradesco', 'BancoDoBrasil', 'BoletoBancario', 'Banrisul');
if(in_array($_POST['formaPagamento'], $arrayFopaDesconto)){
  $descontoAVista = DESCONTO_FORMA_PAGAMENTO_BOLETO;
  $nroParcelas = sqlvalue(1, true);
} else {
  $descontoAVista = 0;
  $nroParcelas = sqlvalue($nroParcelas, true);
}

$queryValorTotalPedido = "SELECT 
                          SUM((((PEIT.PRECO_UNITARIO_VENDA+IFNULL(PEIT.VALOR_PACOTE_PRESENTE,0))*PEIT.QUANTIDADE)-IFNULL(PEIT.VALOR_DESCONTO,0))) VALOR_TOTAL_PEDIDO
                        FROM
                          e_PEDIDO_ITEM PEIT
                        WHERE
                          PEDI_ID_PEDIDO = ".$idPedido."";
$resultValorTotalPedido = $mysqli->ConsultarSQL($queryValorTotalPedido);
$valorTotalPedido = $resultValorTotalPedido[0]['VALOR_TOTAL_PEDIDO'];

$queryCalculaDesconto = "UPDATE e_PEDIDO_ITEM 
                          SET VALOR_DESCONTO_ADICIONAL = round((ROUND((".$valorTotalPedido."*".$descontoAVista.")/100,2)/".$valorTotalPedido.")*(((PRECO_UNITARIO_VENDA+IFNULL(VALOR_PACOTE_PRESENTE,0))*QUANTIDADE)-IFNULL(VALOR_DESCONTO,0)),2)
                        WHERE
                          PEDI_ID_PEDIDO = ".$idPedido."";
$mysqli->ExecutarSQL($queryCalculaDesconto);

$queryFormaPagamento = "SELECT 
                            DESCRICAO_FORMA_PAGAMENTO
                          FROM 
                            e_PEDIDO_PAGAMENTO,
                            e_FORMA_PAGAMENTO 
                          WHERE
                            PEDI_ID_PEDIDO = ".$idPedido."
                          AND FOPA_ID_FORMA_PAGAMENTO = ID_FORMA_PAGAMENTO
                          LIMIT 1";
$resultFormaPagamento = $mysqli->ConsultarSQL($queryFormaPagamento);
$formaPagamentoAnterior = $resultFormaPagamento[0]['DESCRICAO_FORMA_PAGAMENTO'];

$query = "SELECT
            PEDI.ID_PEDIDO,
            PESS.NOME,
            PESS.SOBRENOME,
            PESS.EMAIL,
            PESS.ID_PESSOA,
            PEEN.ENDERECO,
            PEEN.NUMERO,
            IFNULL(PEEN.COMPLEMENTO, ' ') COMPLEMENTO,
            PEEN. MUNICIPIO NOME_MUNICIPIO,
            PEEN.BAIRRO,
            PEEN.UF UNFE_ID_ESTADO,
            'BRA' PAIS,
            PEEN.CEP,
            CASE WHEN PECO.DESCRICAO IS NULL THEN '5155555555'
            ELSE PECO.DESCRICAO
            END TELEFONE,
            ROUND((SUM((PEIT.PRECO_UNITARIO_VENDA+IFNULL(PEIT.VALOR_PACOTE_PRESENTE,0))*PEIT.QUANTIDADE)-SUM(IFNULL(PEIT.VALOR_DESCONTO,0)+IFNULL(PEIT.VALOR_DESCONTO_ADICIONAL,0)))+IFNULL(PEDI.VALOR_FRETE,0),2) VALOR_PAGAMENTO
          FROM
            e_PEDIDO PEDI,
            e_PESSOA PESS LEFT JOIN e_PESSOA_CONTATO PECO
                       ON PECO.TICO_ID_TIPO_CONTATO = 1
                      AND PECO.PESS_ID_PESSOA = PESS.ID_PESSOA,
            e_PEDIDO_ENDERECO PEEN,
            e_PEDIDO_ITEM PEIT
          WHERE
            PEDI.PESS_ID_PESSOA = PESS.ID_PESSOA
          AND PEDI.ID_PEDIDO = PEEN.PEDI_ID_PEDIDO
          AND PEDI.ID_PEDIDO = ".$idPedido."
          -- AND IFNULL(PEEN.ENDERECO_PRINCIPAL,'S') = 'S'
          AND PEDI.ID_PEDIDO = PEIT.PEDI_ID_PEDIDO
          GROUP BY
            PEDI.ID_PEDIDO,
            PESS.NOME,
            PESS.SOBRENOME,
            PESS.EMAIL,
            PESS.ID_PESSOA,
            PEEN.ENDERECO,
            PEEN.NUMERO,
            PEEN.COMPLEMENTO,
            PEEN.MUNICIPIO,
            PEEN.BAIRRO,
            PEEN.UF,
            PEEN.CEP,
            PECO.DESCRICAO,
            PEDI.VALOR_FRETE
            LIMIT 1";

$result = $mysqli->ConsultarSQL($query);
$row = $result[0];

$name = $row['NOME'].' '.$row['SOBRENOME'];
$email = $row['EMAIL'];
$payerId = $row['ID_PESSOA'];
$address = $row['ENDERECO'];
$number = $row['NUMERO'];
$complement = $row['COMPLEMENTO'];
$city = $row['NOME_MUNICIPIO'];
$neighborhood = $row['BAIRRO'];
$state = $row['UNFE_ID_ESTADO'];
$country = $row['PAIS'];
$zipCode = $row['CEP'];
if(strlen($row['TELEFONE']) < 10){
  $phone = fnFormataTelefone(str_pad($row['TELEFONE'], 10, '0', STR_PAD_LEFT));
} else {
  $phone = fnFormataTelefone($row['TELEFONE']);
}
$valorPagamento = $row['VALOR_PAGAMENTO'];

if($_SESSION['sessionValorPagamento'] != $valorPagamento or $_SESSION['sessionIdPedido'] != $idPedido or $formaPagamentoAnterior != $formaPagamento){

  $mysqli->ExecutarSQL("UPDATE e_PEDIDO_PAGAMENTO SET ATIVO = 'N', USUARIO_UPDATE = 'modulo-moip/moip.php', DATA_UPDATE = now() 
                            WHERE PEDI_ID_PEDIDO = ".$idPedido." 
                            AND IFNULL(TRANSACAO_AUTORIZADA, 'N') = 'N'");

  $queryPedidoPagamento = "INSERT INTO e_PEDIDO_PAGAMENTO
                                       (FOPA_ID_FORMA_PAGAMENTO
                                       ,PEDI_ID_PEDIDO
                                       ,ATIVO
                                       ,VALOR_TOTAL_PAGAMENTO
                                       ,NUMERO_PARCELAS
                                       ,TIPO_LANCAMENTO
                                       ,USUARIO_INSERT
                                       ,DATA_INSERT)
                                 (SELECT
                                       FOPA.ID_FORMA_PAGAMENTO
                                       ,PEDI.ID_PEDIDO
                                       ,'S'
                                       ,ROUND((SUM((PEIT.PRECO_UNITARIO_VENDA+IFNULL(PEIT.VALOR_PACOTE_PRESENTE,0))*PEIT.QUANTIDADE)-SUM(IFNULL(PEIT.VALOR_DESCONTO,0)+IFNULL(PEIT.VALOR_DESCONTO_ADICIONAL,0)))+IFNULL(PEDI.VALOR_FRETE,0),2) VALOR_PAGAMENTO
                                       ,".$nroParcelas."
                                       ,'P'
                                       ,'modulo-moip/moip.php'
                                       ,now()
                              FROM
                                e_PEDIDO PEDI,
                                e_FORMA_PAGAMENTO FOPA,
                                e_PEDIDO_ITEM PEIT
                              WHERE
                                PEDI.ID_PEDIDO = ".$idPedido."
                              AND FOPA.DESCRICAO_FORMA_PAGAMENTO = ".$formaPagamento."
                              AND PEDI.ID_PEDIDO = PEIT.PEDI_ID_PEDIDO
                              GROUP BY
                                FOPA.ID_FORMA_PAGAMENTO
                                   ,PEDI.ID_PEDIDO
                                   ,PEDI.VALOR_FRETE)";
//printr($queryPedidoPagamento);
  $resultPedidoPagamento = $mysqli->ExecutarSQL($queryPedidoPagamento);
  $idPedidoPagamento = $mysqli->InsertId();

  if($idPedidoPagamento){
    $mysqli->ExecutarSQL("UPDATE e_PEDIDO SET NUMERO_PEDIDO = '".$idPedido."-".$idPedidoPagamento."' WHERE ID_PEDIDO = ".$idPedido."");
  }

}


if($_SESSION['sessionValorPagamento'] != $valorPagamento or $_SESSION['sessionIdPedido'] != $idPedido or $formaPagamentoAnterior != $formaPagamento){
  
  include_once "autoload.inc.php";

  $moip = new Moip();
  $moip->setEnvironment();
  $moip->setCredential(array(
      'key' => 'S1GYRB2AWMYLYDIKMUIZJSGHYNSFXSCEGKJQ1BCY',
      'token' => 'II222XFJJEAKQCBE6E9RKNGGJ355AOIP'
  ));

  $moip->setUniqueID($idPedido."-".$idPedidoPagamento);
  $moip->setValue($valorPagamento);
  $moip->setReason('Pagamento Pedido: '.$idPedido."-".$idPedidoPagamento);
  $moip->setReceiver('comlinestramontina');

  $moip->setPayer(array('name' => $name,
      'email' => $email,
      'payerId' => $payerId,
      'billingAddress' => array('address' => $address,
          'number' => $number,
          'complement' => $complement,
          'city' => $city,
          'neighborhood' => $neighborhood,
          'state' => $state,
          'country' => $country,
          'zipCode' => $zipCode,
          'phone' => $phone)));

  $moip->addParcel('1', '12');
  $moip->validate('Identification');

  $moip->send();

  // print_r($moip->getAnswer());
  // print_r($moip->getXML());

  if($moip->getAnswer()->token){
    $retorno = '{ "cod": "sucesso", "token": "'.$moip->getAnswer()->token.'" }';
    $_SESSION['sessionValorPagamento'] = $valorPagamento;
    $_SESSION['sessionToken'] = $moip->getAnswer()->token;
  } else {
    $retorno = '{ "cod": "erro" }';
  }

} else {

}

if($_SESSION['sessionToken']){
  $retorno = '{ "cod": "sucesso", "token": "'.$_SESSION['sessionToken'].'" }';
} else {
  $retorno = '{ "cod": "erro" }';
}

echo $retorno;

?>