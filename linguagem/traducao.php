<?php

# TRADUÇÃO #
if ( isset($_COOKIE[PROJETO.'_linguagem']) && !empty($_COOKIE[PROJETO.'_linguagem']) ){
	$idioma = $_COOKIE[PROJETO.'_linguagem'];
} else {
	$idioma = 'pt';
	setcookie(PROJETO.'_linguagem', $idioma, '0', '/');
}
//$idioma = 'en';
//require('en.php');

if ( !isset($idioma) ) {
	require('pt.php');
} elseif ($idioma != 'pt') {
	require($idioma.'.php');
} else {
	require('pt.php');
}

$smarty->registerPlugin('modifier', 'trad', 'trad');
function trad($string){
	global $_LANG;
	return utf8_decode($_LANG[$string]);
}
?>
