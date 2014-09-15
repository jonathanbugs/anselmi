<?php

function ConectarBanco() {
	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_BASE);
	if (mysqli_connect_errno()) echo 'N&atilde;o foi poss&iacute;vel conectar o banco de dados.';
	return $conn;
}

class DB {

	private $conn;

	public function __construct($conn){
		$this->conn = $conn;
	}

	public function FecharBanco() {
		mysqli_close($this->conn);
	}

	public function ExecutarSQL($sql) {
		$colecao = $this->conn->query($sql);
		return $colecao;
	}

	public function ExecutarMultiSQL($sql) {
		$colecao = false;
		if ($this->conn->multi_query($sql)) {
			do {
		 		$colecao = true;  
			} while ($this->conn->next_result());
		}
		return $colecao;
	}

	public function InsertId(){
		return $this->conn->insert_id;
	}

	public function Consultar($dados) {
		$colecaoNova = array();
		if($dados){
			while($colecao = $dados->fetch_array()) {
				array_push($colecaoNova,$colecao);
			}
		}
		return $colecaoNova;
	}

	public function ConsultarSQL($sql){
		$colecao = $this->ExecutarSQL($sql);
		$colecaoNova = $this->Consultar($colecao);
		return $colecaoNova;
	}

	public function NumeroLinhas($result){
		$colecao = @mysqli_num_rows($result);
		return $colecao;
	}

	public function LinhasAfetadas(){
		return $this->conn->affected_rows;
	}

	public function DataAtualBanco() {
		$dataatual = $mysqli->ExecutarSQL("SELECT CURDATE()");
		$dataatual = Consultar($dataatual);
		return $dataatual[0][0];
	}

	public function DiaAtualBanco() {
		$dataatual = DataAtualBanco();
		return (int) $dataatual[8].$dataatual[9];
	}

	public function MesAtualBanco() {
		$dataatual = DataAtualBanco();
		return (int) $dataatual[5].$dataatual[6];
	}

	public function AnoAtualBanco() {
		$dataatual = DataAtualBanco();
		return (int) $dataatual[0].$dataatual[1].$dataatual[2].$dataatual[3];
	}

	public function HoraAtualBanco() {
		$horaatual = $mysqli->ExecutarSQL("SELECT CURTIME()");
		$horaatual = Consultar($horaatual);
		return $horaatual[0][0];
	}

} //fim class DB


function UltimoDiaMes($mes, $ano) {
	$mes = (int) $mes;
	$ano = (int) $ano;
	if(empty($mes) || $mes < 1 || $mes > 12)
		return null;
	if(empty($ano) || $ano < 1901 || $ano > 2099)
		return null;
	$mes = str_pad($mes, 2, "0", STR_PAD_LEFT);
	$ano = str_pad($ano, 4, "0", STR_PAD_LEFT);
	$ultimoDiaMes = $mysqli->ExecutarSQL("SELECT LAST_DAY('$ano-$mes-01')");
	$ultimoDiaMes = Consultar($ultimoDiaMes);
	$ultimoDiaMes = $ultimoDiaMes[0][0];
	return (int) $ultimoDiaMes[8].$ultimoDiaMes[9];
}

function Data($string, $format = '%d/%m/%Y', $default_date = '', $formatter='auto') {
	if ($string != '') {
		$timestamp = smarty_make_timestamp($string);
	} elseif ($default_date != '') {
		$timestamp = smarty_make_timestamp($default_date);
	} else {
		return;
	}
	if($formatter=='strftime'||($formatter=='auto'&&strpos($format,'%')!==false)) {
		if (DS == '\\') {
			$_win_from = array('%D', '%h', '%n', '%r', '%R', '%t', '%T');
			$_win_to = array('%m/%d/%y', '%b', "\n", '%I:%M:%S %p', '%H:%M', "\t", '%H:%M:%S');
			if (strpos($format, '%e') !== false) {
				$_win_from[] = '%e';
				$_win_to[] = sprintf('%\' 2d', date('j', $timestamp));
			}
			if (strpos($format, '%l') !== false) {
				$_win_from[] = '%l';
				$_win_to[] = sprintf('%\' 2d', date('h', $timestamp));
			}
			$format = str_replace($_win_from, $_win_to, $format);
		}
		return strftime($format, $timestamp);
	} else {
		return date($format, $timestamp);
	}
}

function smarty_make_timestamp($string) {
	if(empty($string)) {
		return time();
	} elseif ($string instanceof DateTime) {
		return $string->getTimestamp();
	} elseif (preg_match('/^\d{14}$/', $string)) {
		// it is mysql timestamp format of YYYYMMDDHHMMSS?
		return mktime(substr($string, 8, 2),substr($string, 10, 2),substr($string, 12, 2),
					substr($string, 4, 2),substr($string, 6, 2),substr($string, 0, 4));
	} elseif (is_numeric($string)) {
		// it is a numeric string, we handle it as timestamp
		return (int)$string;
	} else {
		// strtotime should handle it
		$time = strtotime($string);
		if ($time == -1 || $time === false) {
			// strtotime() was not able to parse $string, use "now":
			return time();
		}
		return $time;
	}
}

function Truncate($string, $length = 80, $etc = '...', $break_words = false, $middle = false) {
	if ($length == 0)
		return '';

	if (is_callable('mb_strlen')) {
		if (mb_detect_encoding($string, 'UTF-8, ISO-8859-1') === 'UTF-8') {
			// $string has utf-8 encoding
			if (mb_strlen($string) > $length) {
				$length -= min($length, mb_strlen($etc));
				if (!$break_words && !$middle) {
					$string = preg_replace('/\s+?(\S+)?$/u', '', mb_substr($string, 0, $length + 1));
				}
				if (!$middle) {
					return mb_substr($string, 0, $length) . $etc;
				} else {
					return mb_substr($string, 0, $length / 2) . $etc . mb_substr($string, - $length / 2);
				}
			} else {
				return $string;
			}
		}
	}

	if (strlen($string) > $length) {
		$length -= min($length, strlen($etc));
		if (!$break_words && !$middle) {
			$string = preg_replace('/\s+?(\S+)?$/', '', substr($string, 0, $length + 1));
		}
		if (!$middle) {
			return substr($string, 0, $length) . $etc;
		} else {
			return substr($string, 0, $length / 2) . $etc . substr($string, - $length / 2);
		}
	} else {
		return $string;
	}
}

function EvitarInjecao($dado) {
	$colecaoProibida = array(
		"=", "+", "{", "}", "/",
		"\\", "\"", "'", "?", "<", ">",
		"delete", "DELETE", "update", "UPDATE",
		"insert", "INSERT", "select", "SELECT",
		"0=0", "1=1", ";", "drop", "DROP",
		"show tables", "SHOW TABLES", "where",
		"WHERE", "or=", "OR=", "or =",
		"OR =", "and=", "and =", "AND=",
		"AND ="
	);
	$dado = str_replace($colecaoProibida, "", $dado);
	return $dado;
}

function TentativaInjecao($dado) {
	$colecaoProibida = array(
		"=", "+", "{", "}", "/",
		"\\", "\"", "'", "?", "<", ">",
		"delete", "DELETE", "update", "UPDATE",
		"insert", "INSERT", "select", "SELECT",
		"0=0", "1=1", ";", "drop", "DROP",
		"show tables", "SHOW TABLES", "where",
		"WHERE", "or=", "OR=", "or =",
		"OR =", "and=", "and =", "AND=",
		"AND ="
	);
	if(in_array($dado,$colecaoProibida)){
		return true;
	} else {
		return false;
	}
}

function RandomString($length = 10, $letters = '1234567890QWERTYUIOPASDFGHJKLZXCVBNM[]?@<>.') {
	$s = '';
	$lettersLength = strlen($letters)-1;
	for($i = 0 ; $i < $length ; $i++){
		$s .= $letters[rand(0,$lettersLength)];
	}
	return $s;
}

function RemoveAcentos($str, $enc = 'ISO-8859-1'){
	$acentos = array(
		'A' => '/&Agrave;|&Aacute;|&Acirc;|&Atilde;|&Auml;|&Aring;/',
		'a' => '/&agrave;|&aacute;|&acirc;|&atilde;|&auml;|&aring;/',
		'C' => '/&Ccedil;/',
		'c' => '/&ccedil;/',
		'E' => '/&Egrave;|&Eacute;|&Ecirc;|&Euml;/',
		'e' => '/&egrave;|&eacute;|&ecirc;|&euml;/',
		'I' => '/&Igrave;|&Iacute;|&Icirc;|&Iuml;/',
		'i' => '/&igrave;|&iacute;|&icirc;|&iuml;/',
		'N' => '/&Ntilde;/',
		'n' => '/&ntilde;/',
		'O' => '/&Ograve;|&Oacute;|&Ocirc;|&Otilde;|&Ouml;/',
		'o' => '/&ograve;|&oacute;|&ocirc;|&otilde;|&ouml;/',
		'U' => '/&Ugrave;|&Uacute;|&Ucirc;|&Uuml;/',
		'u' => '/&ugrave;|&uacute;|&ucirc;|&uuml;/',
		'Y' => '/&Yacute;/',
		'y' => '/&yacute;|&yuml;/',
		'a.' => '/&ordf;/',
		'o.' => '/&ordm;/'
	);
	return strtolower(preg_replace($acentos, array_keys($acentos), htmlentities($str, ENT_NOQUOTES, $enc)));
}

function OrderArray ($array, $index, $order='asc', $natsort=FALSE, $case_sensitive=FALSE) {
	if(is_array($array) && count($array)>0) {
		foreach(array_keys($array) as $key) $temp[$key]=$array[$key][$index];
		if(!$natsort) ($order=='asc')? asort($temp) : arsort($temp);
		else {
			($case_sensitive)? natsort($temp) : natcasesort($temp);
			if($order!='asc') $temp=array_reverse($temp,TRUE);
		}
		foreach(array_keys($temp) as $key) (is_numeric($key))? $sorted[]=$array[$key] : $sorted[$key]=$array[$key];
		return $sorted;
	}
	return $array;
}

function printr	($arr){
	print "<pre>";
	print_r($arr);
	print "</pre>";
}

function ShuffleArray($list) {
	if (!is_array($list)) return $list;
	$keys = array_keys($list);
	shuffle($keys);
	$random = array();
	foreach ($keys as $key)
		$random[$key] = $list[$key];
	return $random;
}

function formataDataInsert($data) {
	$data = str_replace("/", "", $data);
    $ano = substr ( $data, 4, 4 );
    $mes = substr ( $data, 2, 2 );
    $dia = substr ( $data, 0, 2 );
    return $ano . '-' . $mes . '-' . $dia;
}

function formataPrecoInsert($valor) {
	$valor = str_replace(".", "", $valor);
	$valor = str_replace(",", ".", $valor);
    return $valor;
}

function formataValorInsert($valor) {
	$valor = str_replace(".", "", $valor);
	$valor = str_replace(",", ".", $valor);
    return $valor;
}

function trataCpf($cpf){
	$cpf = str_replace(".", "", $cpf);
	$cpf = str_replace("-", "", $cpf);
	return $cpf;
}

function trataCnpj($cnpj){
	$cnpj = str_replace(".", "", $cnpj);
	$cnpj = str_replace("/", "", $cnpj);
	$cnpj = str_replace("-", "", $cnpj);
	return $cnpj;
}

function arrayMap($func, $arr){
  $ret = array();
  foreach ($arr as $key => $val){
      $ret[$key] = (is_array($val) ? arrayMap($func, $val) : $func($val));
  }
  return $ret;
}

function trataPost($post){
	$post = arrayMap('utf8_decode', $post);
	$post = arrayMap('trataPostVazio', $post);
	//$post = arrayMap('htmlspecialchars', $post);
	$post = arrayMap('strip_tags', $post);
	return $post;
}


function trataPostVazio($post){
	if($post===""){
  		$post = NULL;
  	} else {
  		$post = $post;
  	}
	return $post;
}

function sqlvalue($val, $quote) {
    if ($quote) {
        $tmp = sqlstr($val);
    } else {
        $tmp = $val;
    }
    if ($tmp === "") {
        $tmp = "NULL";
    } elseif ($quote) {
        $tmp = "'".$tmp."'";
    //return str_replace("'", "\'", $tmp);
    }
    return $tmp;
}

function sqlstr($val) {
    $val = str_replace("'", "''", $val);
    $val = str_replace("  ", " ", $val);
    return $val;
}

function formataCpf($cpf){
	$cpf1 = substr($cpf, 0, 2);
	$cpf2 = substr($cpf, 2, 4);
	$cpf3 = substr($cpf, 4, 6);
	$cpf4 = substr($cpf, 6, 8);
	return $cpf1.".".$cpf2.".".$cpf3."-".$cpf4;
}

function combinacao( $txt, $termos, $i ){
	$texto = '';
	if ( $i >= count( $termos ) )
	{
		$texto .= trim( $txt ) . "\n";
	}
    else
    {
		foreach ( $termos[$i] as $termo )
		{
			$texto .= combinacao( $txt . $termo . '##', $termos, $i + 1 );
		}
    }
    return $texto;
}

function strleft($s1, $s2) {
	return substr($s1, 0, strpos($s1, $s2));
}

function UrlAtual(){
	/*$location = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	$ultimo = substr($location, -1);
	if($ultimo == '/'){
		$location = substr($location, 0, -1);
	}
	$location = str_replace('/', '%2F', $location);
	return $location;*/
	$dominio= $_SERVER['HTTP_HOST'];
	 $url = "http://" . $dominio. $_SERVER['REQUEST_URI'];
	 return $url;
	
}

function ValidarUsuario($url, $mysqli, $subdominio){

	$login = EvitarInjecao( $_SESSION['login'] );
	$senha = EvitarInjecao( md5($_SESSION['senha']) );
	$subdominio = sqlvalue($subdominio, true);

	if(!empty($login) and !empty($senha)){
		$sql = " select PESS.NOME, PESS.EMAIL 
				from e_PESSOA PESS, e_LOJA LOJA, e_PESSOA_LOJA PELO 
			   where PESS.EMAIL = '".$login."' and LOJA.ID_LOJA = PELO.LOJA_ID_LOJA 
			   and PESS.ID_PESSOA = PELO.PESS_ID_PESSOA 
			   and LOJA.URL = ".$subdominio." and PESS.SENHA = '".$senha."' 
			   and PESS.PETC_ID_PESSOA_TIPO_CATEGORIA IN (2,4); ";
		$user = $mysqli->ConsultarSQL($sql);
		if( count($user) > 0 ){
			$user = $user[0];
			$_SESSION["sessionNome"] = RemoveAcentos($user["NOME"]);
		} else {
			//printr(BASE_DIR.'login/index.php?redirect='.$url);
			header('Location: '.BASE_DIR.'login/index.php?redirect='.$url);
		}
	} else {
		$_SESSION["sessionNome"] = '';
		$_SESSION['login'] = '';
		$_SESSION['senha'] = '';
		//printr(BASE_DIR.'login/index.php?redirect='.$url);
		header('Location: '.BASE_DIR.'login/index.php?redirect='.$url);
	}
}

function ValidarCliente($url, $redireciona=false, $pagina='logar', $mysqli){

	$login = EvitarInjecao( $_SESSION['login'] );
	$senha = EvitarInjecao( $_SESSION['senha'] );

	if(!empty($login) and !empty($senha)){
		$sql = "select NOME, EMAIL, ID_PESSOA, LICA.ID_LISTA_CASAMENTO from e_PESSOA LEFT JOIN e_LISTA_CASAMENTO LICA
													ON LICA.PESS_ID_PESSOA = ID_PESSOA 
													AND LICA.ATIVO = 'S'
				where EMAIL = '".$login."' and (SENHA = '".$senha."' OR '".SENHA_PADRAO."' = '".$senha."') 
				-- and PESI_ID_PESSOA_SITUACAO = 1";
		$user = $mysqli->ConsultarSQL($sql);
		//printr($user);
		if( count($user) > 0 ){
			$user = $user[0];
			$_SESSION["sessionNome"] = $user["NOME"];
			$_SESSION["sessionIdPessoa"] = $user["ID_PESSOA"];
			$_SESSION["sessionMinhaIdListaCasamento"] = $user["ID_LISTA_CASAMENTO"];
			$_SESSION["sessionErroLogar"] = "";
			
			if($redireciona) { header('Location: '.$url); }
		} else {
			//printr(BASE_DIR.'logar/&redirect='.$url);
			$_SESSION["sessionErroLogar"] = "S";
			header('Location: '.BASE_DIR.$pagina.'/?redirect='.$url);
		}
	} else {
		$_SESSION["sessionNome"] = '';
		$_SESSION['login'] = '';
		$_SESSION['senha'] = '';
		$_SESSION['sessionIdPessoa'] = '';
		$_SESSION["sessionMinhaIdListaCasamento"] = '';
		//printr(BASE_DIR.'logar/?redirect='.$url);
		$_SESSION["sessionErroLogar"] = "";
		header('Location: '.BASE_DIR.$pagina.'/?redirect='.$url);
	}
}

function fnFormataCpfCnpj($string){
     $qtd = strlen($string);
     if($qtd == 11)
     {
          $n_cpf = substr($string,0,3).".".substr($string,3,3).".".substr($string,6,3)."-".substr($string,9,2);
          return $n_cpf;
     }
     elseif($qtd == 14)
     {
          $n_cnpj = substr($string,0,2).".".substr($string,2,3).".".substr($string,5,3)."/".substr($string,8,4)."-".substr($string,12,2);
          return $n_cnpj;
     }
     else
     {
          return false;
     }
}

function fnFormataPreco($valor){

	$valor = number_format($valor, 2, ",", ".");
	return $valor;
}

function fnPrimeiraMaiuscula($string){
	
	$string = mb_strtolower($string, 'ISO-8859-1');
	//$string = strtr($string, "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÚÞß","àáâãäåæçèéêëìíîïðñòóôõö÷øùüúþÿ");

	$arrayString = explode(' ', $string);
	
	$retorno = '';
	foreach ($arrayString as $value) {
		if(strlen($value) >= 3){
			$retorno .= ucwords($value).' ';
		} else {
			$retorno .= $value.' ';
		}
	}
	
	return $retorno;
}

function fnNroParcelas($valor){
	
	$nroParcelas = NUMERO_MAXIMO_PARCELAS;
	$valorParcelaMinima = VALOR_PARCELA_MINIMA;

	for($iParcela=1; $iParcela<=$nroParcelas; $iParcela++) {
		$valorParcela = $valor/$iParcela;
		if($valorParcela < $valorParcelaMinima) {
			if($iParcela == 1) {
				$nroParcelas = $iParcela;
			} else {
				$nroParcelas = $iParcela-1;
			}
			break;
		}
	}
	
	return $nroParcelas;
		
}

function fnFormataCep($cep){
	$cep1 = substr($cep, 0, 5);
	$cep2 = substr($cep, 5, 3);
	return $cep1.'-'.$cep2;
}

function trataInsertCep($cep){
	$cep = str_replace('-', '', $cep);
	return $cep;
}

function trataInsertTelefone($telefone){
	$telefone = str_replace('(', '', $telefone);
	$telefone = str_replace(')', '', $telefone);
	$telefone = str_replace(' ', '', $telefone);
	$telefone = str_replace('-', '', $telefone);
	return $telefone;
}

function fnFormataTelefone($telefone){

	if(strlen($telefone) == 10){
		$ddd = substr($telefone, 0, 2);
		$telefone1 = substr($telefone, 2, 4);
		$telefone2 = substr($telefone, 6, 4);
		$retorno = '('.$ddd.')'.$telefone1.'-'.$telefone2;
	} elseif(strlen($telefone) >= 11){
		$ddd = substr($telefone, 0, 2);
		$telefone1 = substr($telefone, 2, 4);
		$telefone2 = substr($telefone, 6, 5);
		$retorno = '('.$ddd.')'.$telefone1.'-'.$telefone2;
	} else {
		$retorno = $telefone;
	}
	return $retorno;

}

function removeCharSpecial($string){

	$string = trim(preg_replace('/[^\w\d_ ]/si', '', $string));
	return $string;

}

function get_include_contents($filename, $variablesToMakeLocal) {
    extract($variablesToMakeLocal);
    if (is_file($filename)) {
        ob_start();
        include $filename;
        return ob_get_clean();
    }
    return false;
}

require dirname(__FILE__).'/class.phpmailer.php';

function enviaEmail($tipoEmail, $nomePessoa, $emailPessoa, $novaSenha=null, $idPedido=null, $despacho=null, $cupomDesconto=null){
	
	
	if($tipoEmail == 'novaSenha'){
		
		$mensagem = $_SERVER['DOCUMENT_ROOT'].'/emails/nova-senha.php';
		$assunto = utf8_decode('Solicitação de nova senha');

		$_POST['nomePessoa'] = $nomePessoa;
		$_POST['novaSenha'] = $novaSenha;
		
	} else if($tipoEmail == 'situacaoPedido'){

		$mensagem = $_SERVER['DOCUMENT_ROOT'].'/emails/pedido-realizado.php';
		$assunto = utf8_decode('Acompanhamento de Pedido');

		$_POST['idPedido'] = $idPedido;
		$_POST['despacho'] = $despacho;

	} else if($tipoEmail == 'cupomDesconto'){

		$mensagem = $_SERVER['DOCUMENT_ROOT'].'/emails/cupom-desconto.php';
		$assunto = utf8_decode('Cupom Desconto');

		$_POST['cupomDesconto'] = $cupomDesconto;

	} else if($tipoEmail == 'divulgaListaCasamento'){

		$query = "SELECT 
						LICA.CONJUGE1+' & '+LICA.CONJUGE2 NOIVOS,
						LICA.URL,
						LICA.FOTO_CAPA
					FROM
						e_LISTA_CASAMENTO LICA
					WHERE
						LICA.ID_LISTA_CASAMENTO = ".$nomePessoa."";
		$valueQuery = $mysqli->ConsultarSQL($query);

		$mensagem = $_SERVER['DOCUMENT_ROOT'].'/emails/lista-casamento-email-divulgar.php';
		$assunto = utf8_decode('Lista de Casamento de '.$valueQuery[0]['NOIVOS']);

		$_POST['nomeNoivos'] = $valueQuery[0]['NOIVOS'];
		$_POST['urlListaCasamento'] = $valueQuery[0]['URL'];
		$_POST['fotoCapa'] = $valueQuery[0]['FOTO_CAPA'];

	}


	$html = get_include_contents($mensagem, $_POST);

	//printr($html);


	//Create a new PHPMailer instance
	$mail = new PHPMailer();
	//Tell PHPMailer to use SMTP
	$mail->IsSMTP();
	//Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
	$mail->SMTPDebug  = 0;
	//Ask for HTML-friendly debug output
	$mail->Debugoutput = 'html';
	//Set the hostname of the mail server
	$mail->Host       = 'smtp.gmail.com';
	//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
	$mail->Port       = 587;
	//Set the encryption system to use - ssl (deprecated) or tls
	$mail->SMTPSecure = 'tls';
	//Whether to use SMTP authentication
	$mail->SMTPAuth   = true;
	//Username to use for SMTP authentication - use full email address for gmail
	$mail->Username   = "comunicacao@comlines.com.br";
	//Password to use for SMTP authentication
	$mail->Password   = "sprcomlines";
	//Set who the message is to be sent from
	$mail->SetFrom('atendimento@comlines.com.br', 'Atendimento Comlines');
	//Set an alternative reply-to address
	$mail->AddReplyTo('atendimento@comlines.com.br','Atendimento Comlines');
	//Set the subject line
	$mail->Subject = 'Atendimento Comlines - '.$assunto;
	//Read an HTML message body from an external file, convert referenced images to embedded, convert HTML into a basic plain-text alternative body
	$mail->MsgHTML($html, dirname(__FILE__));
	//Replace the plain text body with one created manually
	$mail->AltBody = $assunto;
	//Attach an image file
	//$mail->AddAttachment('images/phpmailer_mini.gif');
	//Set who the message is to be sent to
	if($tipoEmail != 'divulgaListaCasamento'){
		$mail->AddAddress($emailPessoa, $nomePessoa);
		
	} else {
		$emailPessoa = explode(',', $emailPessoa);
		foreach ($emailPessoa as $value) {
			$mail->AddAddress($value, '');
		}
	}
	if($mail->Send()){
		return true;
	} else {
		return false;
	}
	$mail->ClearAddresses();
	
}

function fnCapturaUrlOrigem(){
	if(isset($_GET['utm_medium'])){
		$urlOrigem = $_GET['utm_medium'];
		$utm = stripos($_SERVER['REQUEST_URI'], 'utm_medium');
		if($utm){
			setcookie('urlOrigem', $_COOKIE['urlOrigem'].'|'.$urlOrigem, time()+(3600*24*360));
		}
	}
}

function fnGeraProdutoSite($idLoja, $mysqli){

	$query = "SELECT
					PRLO.NOME_PARAMETRO,
					PRLO.VALOR_PARAMETRO
				FROM
					E_PARAMETRO_LOJA PRLO
				WHERE
					LOJA_ID_LOJA = ".$idLoja."";

	$result = $mysqli->ExecutarSQL($query);

	$define = "<?php \r\n /*Data: ".date("d/m/Y H:i:s")."*/ \r\n";
	while($row = @mysqli_fetch_array($result)){
		$define .= "define('".$row['NOME_PARAMETRO']."', '".$row['VALOR_PARAMETRO']."');\r\n";
	}
	$diretorio = "../../configs/";
	$fp = @fopen($diretorio."parametro_loja_".$idLoja.".php", "w+");
	$escreve = @fwrite($fp, $define."?>");
	@fclose($fp);

}


function fnTrataUrlAmigavel($str){
	$str = RemoveAcentos($str);
	$str = preg_replace("/[^a-zA-Z0-9\s]/", "", $str);
	$str = str_replace(" ", "-", $str);
	return $str;
}

function geraXmlProdutoDia(){
	$query = "SELECT VALOR_PARAMETRO FROM e_PARAMETRO_LOJA 
				WHERE NOME_PARAMETRO = 'URL_AMIGAVEL_PROMO_DIA' AND LOJA_ID_LOJA = ".ID_LOJA."";
	$resultQuery = $mysqli->ConsultarSQL($query);
	$urlAmigavelProdutoDia = $resultQuery[0]['VALOR_PARAMETRO'];

	require_once PHP_ROOT.'/'.CLASS_DIR.'produto.class.php';
	$Produto = new Produto();

	$produtoPromoDia = $Produto->fnProdutoSite($urlAmigavelProdutoDia);
	$valueProdutoPromoDia = $produtoPromoDia[0];

	#versao do encoding xml
	$dom = new DOMDocument("1.0", "ISO-8859-1");

	#retirar os espacos em branco
	$dom->preserveWhiteSpace = false;

	#gerar o codigo
	$dom->formatOutput = true;

	#criando o nó principal (root)
	$root = $dom->createElement("produtos");

	#nó filho (produto)
	$produto = $dom->createElement("produto");

	#setanto nomes e atributos dos elementos xml (nós)
	$descricaoVenda = $dom->createElement("descricao_venda", $valueProdutoPromoDia['DESCRICAO_VENDA']);
    $referencia = $dom->createElement("referencia", $valueProdutoPromoDia['REFERENCIA']);
    $imagem = $dom->createElement("imagem", $valueProdutoPromoDia['IMAGEM_PRINCIPAL']);
    $urlAmigavel = $dom->createElement("url_amigavel", $valueProdutoPromoDia['URL_AMIGAVEL']);
    $precoVenda = $dom->createElement("preco_venda", $valueProdutoPromoDia['PRECO_VENDA']);
    $precoPromocional = $dom->createElement("preco_promocional", $valueProdutoPromoDia['PRECO_PROMOCIONAL']);

	#adiciona os nós (informacaoes do produto) em produto
	$produto->appendChild($descricaoVenda);
    $produto->appendChild($referencia);
    $produto->appendChild($imagem);
    $produto->appendChild($urlAmigavel);
    $produto->appendChild($precoVenda);
    $produto->appendChild($precoPromocional);
	
	#adiciona o nó produto em (root) produtos
	$root->appendChild($produto);
	$dom->appendChild($root);

	# Para salvar o arquivo, descomente a linha
	$dom->save("../../xml/produto_do_dia.xml");

	#cabeçalho da página
	//header("Content-Type: text/xml");
	# imprime o xml na tela
	//print $dom->saveXML();
}

?>
