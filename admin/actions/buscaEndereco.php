<?php
require('../configs/config.php');

if(isset($_POST['acao'])){
	$acao = $_POST['acao'];
} else { $acao = ''; }

//$acao = 'buscaEndereco';

switch ($acao) {
		case 'buscaEndereco':

			$cep = sqlvalue($_POST["cep"],true);
			$cepInicial = sqlvalue(substr($_POST["cep"], 0, -4), true);

			$query = "SELECT uf FROM cep_log_index WHERE cep5 = ".$cepInicial.";";
			$tabela = $mysqli->ConsultarSQL($query);

			$query = "SELECT
							tp_logradouro,
							logradouro,
							bairro,
							cidade
						FROM
							".$tabela[0]['uf']."
						WHERE
							cep = ".$cep.";";

			$resultQuery = $mysqli->ConsultarSQL($query);

			$rowQuery = $resultQuery[0];

			if($resultQuery){
				
				echo $retorno = '{ "cod": "sucesso", 
								   "mensagem": "", 
								   "tipoLogradouroEnderecoPessoa": "'.$rowQuery["tp_logradouro"].'", 
								   "ruaEnderecoPessoa": "'.$rowQuery["logradouro"].'", 
								   "bairroEnderecoPessoa": "'.$rowQuery["bairro"].'", 
								   "municipioEnderecoPessoa": "'.$rowQuery["cidade"].'", 
								   "estadoEnderecoPessoa": "'.strtoupper($tabela[0]['uf']).'", 
								   "paisEnderecoPessoa": "BR" 
								}';
			
			} else {
				$novoCep = buscaCepOnline($cep);
				if($novoCep['uf']){
					echo $retorno = '{ "cod": "sucesso", 
								   "mensagem": "", 
								   "tipoLogradouroEnderecoPessoa": "'.$novoCep["tipo_logradouro"].'", 
								   "ruaEnderecoPessoa": "'.$novoCep["logradouro"].'", 
								   "bairroEnderecoPessoa": "'.$novoCep["bairro"].'", 
								   "municipioEnderecoPessoa": "'.$novoCep["cidade"].'", 
								   "estadoEnderecoPessoa": "'.strtoupper($novoCep['uf']).'", 
								   "paisEnderecoPessoa": "BR" 
								}';		
				} else {
					echo $retorno = '{ "cod": "erro", "mensagem": "'.CEP_NAO_ENCONTRADO.'" }';
				}
			}

			break;
		
		default:
			echo $retorno = '{ "cod": "erro", "mensagem": "'.CEP_NAO_ENCONTRADO.'" }';
			break;
	}

function buscaCepOnline($cep){  
    $resultado = @file_get_contents('http://republicavirtual.com.br/web_cep.php?cep='.urlencode($cep).'&formato=query_string');  
    if(!$resultado){  
        $resultado = "&resultado=0&resultado_txt=erro+ao+buscar+cep";  
    }  
    parse_str($resultado, $retorno);   
    return $retorno;  
}  	

?>