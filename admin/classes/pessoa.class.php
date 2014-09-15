<?php

class Pessoa {

	public function fnPessoa() {
		
		$query = "SELECT
				PESS.ID_PESSOA,
				CASE PESS.TIPO WHEN 'F' THEN PESS.NOME+' '+PESS.SOBRENOME ELSE PESS.NOME_FANTASIA END NOME,
				CASE PESS.TIPO WHEN 'F' THEN PESS.CPF ELSE PESS.CNPJ END CPF,
				PESS.EMAIL,
				CASE PESS.TIPO WHEN 'F' THEN 'F&Iacute;SICA' ELSE 'JUR&Iacute;DICA' END TIPO,
				CASE PESS.APELIDO WHEN NULL THEN NULL ELSE '('+PESS.APELIDO+')' END APELIDO,
				PESS.NEWSLETTER,
				CONVERT(CHAR,PESS.DATA_NASCIMENTO, 103) DATA_NASCIMENTO
			FROM
				e_PESSOA PESS
			ORDER BY
				PESS.ID_PESSOA DESC";

        $retorno = $mysqli->ConsultarSQL($query);
			
        return $retorno;

    }
    
    public function fnEnderecoPessoa($idPessoa=null){
    	
    	if(isset($idPessoa)){
    		$idPessoa = sqlvalue($idPessoa, false);
    		$where = "AND PEEN.PESS_ID_PESSOA = ".$idPessoa."";
    	} else {
    		$where = "";
    	}
    	
    	$query = "SELECT
						PEEN.ID_PESSOA_ENDERECO,
						PEEN.APELIDO_ENDERECO,
						PEEN.ENDERECO,
						PEEN.NUMERO,
						PEEN.COMPLEMENTO,
						PEEN.BAIRRO,
						MUNI.NOME_MUNICIPIO,
						MUNI.UNFE_ID_ESTADO,
						PEEN.CEP_ID_CEP
					FROM
						e_PESSOA_ENDERECO PEEN,
						e_MUNICIPIO MUNI
					WHERE
						PEEN.MUNI_ID_MUNICIPIO = MUNI.ID_MUNICIPIO
						".$where."";
    	
    	$retorno = $mysqli->ConsultarSQL($query);
    	
    	//printr($query);
    	
    	return $retorno;
    	
    }
    

}

?>