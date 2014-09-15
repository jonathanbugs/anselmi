<?php
if($_GET['arquivo']){
	
	$arquivo = $_GET['arquivo'];

	$tamanho = filesize($arquivo); // pega o tamanho do arquivo em bytes

	// enviar os cabeçalhos HTTP para o browser
	header("Content-Type: application/unknown"); 
	header("Content-Length: $tamanho");
	header("Content-Disposition: attachment; filename=$arquivo"); 

	// abrir e enviar o arquivo
	$fp = fopen("$arquivo", "r"); 
	fpassthru($fp); 
	fclose($fp);
}
?>