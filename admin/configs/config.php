<?php
session_start();
header("Content-Type: text/html; charset=ISO-8859-1",true);
// ini_set('display_errors',1);
// ini_set('display_startup_erros',1);
// error_reporting(E_ALL);

### Configuracoes do Projeto
define('PROJETO','admin');
define('CLIENTE','Admin');

### Configuracoes de Meta Tags do Site
$title = '';
$subtag = '';
$subtitle = '';
$description = '';
$keywords = '';
$analytics = '';

//if(PROJETO == ''){ die('Verifique o arquivo config.php e preencha corretamente as informa&ccedil;&otilde;es.'); }

### Configuracoes de Diretorio
if($_SERVER['HTTP_HOST']=='127.0.0.1' or $_SERVER['HTTP_HOST']=='localhost:8888' or preg_match('/^192.168./', $_SERVER['HTTP_HOST']) ){
	define('ROOT','/'.PROJETO.'/');
	define('ROOT_DIR','http://'.$_SERVER['HTTP_HOST'].ROOT.'');
	define('BASE_DIR','http://'.$_SERVER['HTTP_HOST'].ROOT.'');
} else {
	define('ROOT','/'.PROJETO.'/');
	define('ROOT_DIR','http://'.$_SERVER['HTTP_HOST'].ROOT.'');
	define('BASE_DIR','http://'.$_SERVER['HTTP_HOST'].ROOT.'');
}

define('JS_DIR',BASE_DIR.'js/');
define('PLUGINS_DIR',BASE_DIR.'plugins/');
define('IMG_DIR',BASE_DIR.'img/');
define('CSS_DIR',BASE_DIR.'css/');
define('TPL_DIR',BASE_DIR.'templates/');
define('MIDIA_DIR',BASE_DIR.'midia/');
define('PHP_ROOT', dirname(dirname(dirname(__FILE__))));
define('CLASS_DIR','classes/');
define('ACTIONS_DIR',BASE_DIR.'actions/');

### Configuracoes do Smarty
//require_once(PHP_ROOT.'/smarty/Smarty.class.php');
require_once(PHP_ROOT.'/smarty/Smarty.class.php');
$smarty = new Smarty;
$smarty->template_dir = 'templates/';
$smarty->compile_dir = 'templates_c/';
$smarty->config_dir = 'configs/';
$smarty->cache_dir = 'cache/';
/*if($_SERVER['HTTP_HOST']=='127.0.0.1' or $_SERVER['HTTP_HOST']=='localhost:8888' or preg_match("/^192.168./", $_SERVER['HTTP_HOST']) ){*/
	$smarty->caching = false;
	$smarty->cache_lifetime = 3600;
	$smarty->force_compile = true;
	$smarty->compile_check = true;
	$smarty->debugging = false;
/*} else {
	$smarty->caching = true;
	$smarty->cache_lifetime = 3600;
	$smarty->force_compile = false;
	$smarty->compile_check = false;
	$smarty->debugging = false;
}*/

## Configuracoes de projeto Smarty
$smarty->assign('PROJETO',PROJETO);
$smarty->assign('CLIENTE',CLIENTE);

### Configuracoes de diretorio Smarty
$smarty->assign('ROOT_DIR',ROOT_DIR);
$smarty->assign('BASE_DIR',BASE_DIR);
$smarty->assign('JS_DIR',JS_DIR);
$smarty->assign('IMG_DIR',IMG_DIR);
$smarty->assign('CSS_DIR',CSS_DIR);
$smarty->assign('TPL_DIR',TPL_DIR);
$smarty->assign('MIDIA_DIR',MIDIA_DIR);
$smarty->assign('ACTIONS_DIR',ACTIONS_DIR);
$smarty->assign('dataAtual', date('d/m/Y'));

### Configuracoes do Banco
require_once(PHP_ROOT.'/configs/database.php');

### Classes PHP
require_once(PHP_ROOT.'/classes/funcoes.php');
$conn = ConectarBanco();
$mysqli = new DB($conn);
// require_once(PHP_ROOT.'/linguagem/traducao.php');

$subdominio = $_SERVER['HTTP_HOST'];
$subdominio = explode('.', $subdominio);
$subdominio = $subdominio[0];

$_POST = trataPost($_POST);

### Assigns
$smarty->assign('title',$title);
$smarty->assign('subtag',$subtag);
$smarty->assign('subtitle',$subtitle);
$smarty->assign('description',$description);
#$smarty->assign('subject',$subject);
#$smarty->assign('abstract',$abstract);
$smarty->assign('keywords',$keywords);
#$smarty->assign('charset',$charset);
$smarty->assign('analytics',$analytics);
#$smarty->assign('redes_sociais', $redes_sociais);
#$smarty->assign('css_files', $css_files, true);
#$smarty->assign('js_files', $js_files, true);
#$smarty->assign('scriptPre',$scriptPre, true);
#$smarty->assign('scriptExtra',$scriptExtra, true);
#$smarty->assign('scriptRodape',$scriptRodape, true);
#$smarty->assign('contato',$contato);

### Navegador
$navegador = false;
if(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 6.0') || strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 7.0') || strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 8.0')){
	$navegador = true;
} 
$smarty->assign('navegador',$navegador);

require_once(PHP_ROOT.'/configs/constantes.php');

$smarty->assign('ID_LOJA', ID_LOJA);


?>
