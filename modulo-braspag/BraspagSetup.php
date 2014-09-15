<?php

/**
 * BraspagSetup
 * Contains settings to Braspag class
 *
 * @author Robson Morais (r.morais@isharelife.com.br)
 * @link http://www.isharelife.com.br/
 * @version $ID$
 * @package opensource
 * @copyright Copyright © 2010-2012 iShareLife
 * @license Apache License, Version 2.0
 *
 */

class BraspagSetup {

	const URL_TRANSACTION_HOMOLOGATION = "https://homologacao.pagador.com.br/webservice/pagadorTransaction.asmx?wsdl";
	const URL_ORDER_HOMOLOGATION = "https://homologacao.pagador.com.br/pagador/webservice/pedido.asmx?wsdl";
	const URL_JUSTCLICK_HOMOLOGATION = "https://homologacao.braspag.com.br/services/testenvironment/cartaoprotegido.asmx?wsdl";

	const URL_TRANSACTION = "https://www.pagador.com.br/webservice/pagadorTransaction.asmx?wsdl";
	const URL_ORDER = "https://query.pagador.com.br/webservices/pagador/pedido.asmx?wsdl";
	const URL_JUSTCLICK = "https://cartaoprotegido.braspag.com.br/services/v2/cartaoprotegido.asmx?wsdl";

	const MERCHANT_ID = '{AA1A1111-111A-1111-1AA1-A1A1111A111A}';
	const MERCHANT_KEY = '{AA1A1111-111A-1111-1AA1-A1A1111A111A}';

	const VERSION = '1.0';
}
