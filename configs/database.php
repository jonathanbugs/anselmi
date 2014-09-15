<?php
if($_SERVER['HTTP_HOST']=='127.0.0.1' or $_SERVER['HTTP_HOST']=='localhost:8888' or preg_match('/^192.168./', $_SERVER['HTTP_HOST']) ){

	define('DB_HOST', 'bm8.webservidor.net');
	define('DB_BASE', 'sprdgt_anselmi');
	define('DB_USER', 'sprdgt_master');
	define('DB_PASS', '@master2014');
	
} else {

	define('DB_HOST', 'bm8.webservidor.net');
	define('DB_BASE', 'sprdgt_anselmi');
	define('DB_USER', 'sprdgt_master');
	define('DB_PASS', '@master2014');
	
}
?>

