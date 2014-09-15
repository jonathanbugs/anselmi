<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

//Diretório onde você quer renomear os arquivos.
$dir = array("midia/produtos/carrinho-de-compras/", 
			 "midia/produtos/carrinho/",
			 "midia/produtos/listagem/",
			 "midia/produtos/detalhe/",
			 "midia/produtos/original/geradas/");
 

foreach ($dir as $value) {
	
	//Abre o diretório e guarda na variável ponteiro
	$ponteiro = opendir($value);
	 
	//Guarda o nome dos arquivos no array $itens.
	while ($nome_itens = readdir($ponteiro)) {
	    $itens[] = $nome_itens;
	}
	 
	//Instância um novo array ja com 2 posições padrões devido a estrutura do windows que considera o "." e o ".." como arquivos/diretorios.
	$novo_nome = array(".","..");
	 
	for($i =2;$i < count($itens);$i++){
	 
	    //Substitui o underline por espaço e guarda no array $novo_nome
	    $novo_nome[$i] = strtoupper(str_replace(' ', '-', $itens[$i]));
	 
	    //Efetivamente renomeia os arquivos.
	    rename($value.$itens[$i],$value.$novo_nome[$i]);
	}

	closedir();
}

?>
