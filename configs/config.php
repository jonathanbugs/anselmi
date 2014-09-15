<?php
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
ini_set('display_errors', 0);

// ini_set('display_errors',1);
// ini_set('display_startup_erros',1);
// error_reporting(E_ALL);

### Configuracoes do Projeto
define('PROJETO','anselmi');
define('CLIENTE','Anselmi');

### Configuracoes de Meta Tags do Site
$title = 'Anselmi';
$subtag = '';
$subtitle = '';
$description = '';
$keywords = '';
$analytics = null;
$google_conversion_id = null;
$assinaturaRodape = "COMLINE'S COMERCIAL LTDA / CNPJ: 02.804.744/0001-94 / Endere&ccedil;o: BR-116, 2451, Km 237 - Novo Hamburgo/RS";

### Redes Sociais
$redes_sociais = array(
//	facebook / twitter / youtube / flickr / gplus / orkut / pinterest
//	'nome_da_rede_social' => 'link_da_rede_social'
);

### Informacoes de Contato
$contato = array(
	'DDD' => '51',
	'Fone' => '5555-5555',
	'FoneLink' => '5155555555',
	'Fax' => '',
	'Email' => 'anselmi@anselmi.com.br',
	'Endereco' => '',
	'Rua' => '',
	'Bairro' => '',
	'Cidade' => '',
	'Estado' => '',
	'CEP' => ''
);

//if(PROJETO == ''){ die('Verifique o arquivo config.php e preencha corretamente as informa&ccedil;&otilde;es.'); }

if(isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == 'on'){
	$protocol = 'https';
	define('CDN', $protocol.'://'.$_SERVER['HTTP_HOST'].'/'.PROJETO.'/');
} else {
	$protocol = 'http';
	define('CDN', $protocol.'://'.$_SERVER['HTTP_HOST'].'/'.PROJETO.'/');
}

### Configuracoes de Diretorio
if($_SERVER['HTTP_HOST']=='localhost' or $_SERVER['HTTP_HOST']=='127.0.0.1' or $_SERVER['HTTP_HOST']=='localhost:8888' or preg_match('/^192.168./', $_SERVER['HTTP_HOST']) or preg_match('/^10.0./', $_SERVER['HTTP_HOST']) ){
	define('ROOT','/'.PROJETO.'/');
	define('ROOT_DIR',$protocol.'://'.$_SERVER['HTTP_HOST'].ROOT.'');
	define('BASE_DIR',$protocol.'://'.$_SERVER['HTTP_HOST'].ROOT.'');
} else {
	define('ROOT','/');
	define('ROOT_DIR',$protocol.'://'.$_SERVER['HTTP_HOST'].''.ROOT.'');
	define('BASE_DIR',$protocol.'://'.$_SERVER['HTTP_HOST'].''.ROOT.'');
}

define('JS_DIR',BASE_DIR.'js/');
define('IMG_DIR',CDN.'img/');//define('IMG_DIR',BASE_DIR.'img/');
define('CSS_DIR',BASE_DIR.'css/');
define('TPL_DIR',BASE_DIR.'templates/');
define('PHP_ROOT',dirname(dirname(__FILE__)));
define('MIDIA_ROOT',CDN.'midia/');//define('MIDIA_ROOT',PHP_ROOT.'/midia/');
define('MIDIA_DIR',CDN.'midia/');//define('MIDIA_DIR',ROOT_DIR.'midia/');
define('CLASS_DIR',PHP_ROOT.'/classes/');

$server = $_SERVER['SERVER_NAME']; 
$endereco = $_SERVER ['REQUEST_URI'];
$subdominio = explode('.', $server);
$subdominio = $subdominio[0];
define('SERVER_NAME', $protocol.'://'.$server.$endereco);

### Configuracoes do Smarty
if(!isset($ajax)){
		
	require_once(PHP_ROOT.'/smarty/Smarty.class.php');
	$smarty = new Smarty;
	$smarty->template_dir = 'templates/';
	$smarty->compile_dir = 'templates_c/';
	$smarty->config_dir = 'configs/';
	$smarty->cache_dir = 'cache/';
	$smarty->caching = false;
	$smarty->cache_lifetime = 3600;
	$smarty->force_compile = 1;
	$smarty->compile_check = true;
	$smarty->debugging = false;

	## Configuracoes de projeto Smarty
	$smarty->assign('PROJETO',PROJETO);
	$smarty->assign('CLIENTE',CLIENTE);

	### Configuracoes de diretorio Smarty
	$smarty->assign('LINK',ROOT);
	$smarty->assign('ROOT_DIR',ROOT_DIR);
	$smarty->assign('BASE_DIR',BASE_DIR);
	$smarty->assign('JS_DIR',JS_DIR);
	$smarty->assign('IMG_DIR',IMG_DIR);
	$smarty->assign('CSS_DIR',CSS_DIR);
	$smarty->assign('TPL_DIR',TPL_DIR);
	$smarty->assign('MIDIA_DIR',MIDIA_DIR);
	
	$smarty->assign('SERVER_NAME', SERVER_NAME);
	
	
}



### Configuracoes do Banco
require_once(PHP_ROOT.'/configs/database.php');

### Classes PHP
require_once(PHP_ROOT.'/classes/funcoes.php');
require_once(PHP_ROOT.'/classes/funcoes_projeto.php');
$conn = ConectarBanco();
$mysqli = new DB($conn);

// require_once(PHP_ROOT.'/linguagem/traducao.php');

### Arrays de Javascript e CSS
$css_files = array(
	CSS_DIR.'template.css?v=6'
);
$js_files = array(
	JS_DIR.'jquery.js',
	JS_DIR.'plugins.js',
	JS_DIR.'funcoes.js?v=6',
	JS_DIR.'jquery.cookie.js'
);
$scriptPre = '';
$scriptExtra = '';
$scriptRodape = '';


if(!isset($ajax)){
	$subject = '';
	$abstract  = '';
	$charset  = '';
	### Assigns
	$smarty->assign('title',$title);
	$smarty->assign('subtag',$subtag);
	$smarty->assign('subtitle',$subtitle);
	$smarty->assign('description',$description);
	$smarty->assign('subject',$subject);
	$smarty->assign('abstract',$abstract);
	$smarty->assign('keywords',$keywords);
	$smarty->assign('charset',$charset);
	$smarty->assign('analytics',$analytics);
	$smarty->assign('google_conversion_id', $google_conversion_id);
	$smarty->assign('assinaturaRodape', $assinaturaRodape);
	$smarty->assign('redes_sociais', $redes_sociais);
	$smarty->assign('css_files', $css_files, true);
	$smarty->assign('js_files', $js_files, true);
	$smarty->assign('scriptPre',$scriptPre, true);
	$smarty->assign('scriptExtra',$scriptExtra, true);
	$smarty->assign('scriptRodape',$scriptRodape, true);
	$smarty->assign('contato',$contato);
}

### Navegador
$navegador = false;
if(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 6.0') || strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 7.0') || strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 8.0')){
	$navegador = true;
}
if(!isset($ajax)){
	$smarty->assign('navegador',$navegador);
}

require_once(PHP_ROOT.'/configs/constantes.php');

$_POST = trataPost($_POST);
//$_GET = trataPost($_GET);
$_REQUEST = trataPost($_REQUEST);

?>
