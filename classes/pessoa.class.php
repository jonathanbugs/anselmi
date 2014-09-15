<?php

class Pessoa {

	private $mysqli;

	public function __construct($mysqli){
		$this->mysqli = $mysqli;
	}

	public function fnPessoa($filtro=false) {
		
		$where = "";
		if(isset($filtro)){
			$where = "WHERE (NOME+' '+SOBRENOME LIKE '%".$filtro."%' OR CPF LIKE '%".$filtro."%' OR CNPJ LIKE '%".$filtro."%' OR EMAIL LIKE '%".$filtro."%')";	
		}
		
		$query = "SELECT
						PESS.ID_PESSOA,
						IFNULL(CASE PESS.TIPO WHEN 'F' THEN PESS.NOME+' '+PESS.SOBRENOME ELSE IFNULL(PESS.NOME_FANTASIA,'CC') END, 'XXXXXX') NOME,
						IFNULL(CASE PESS.TIPO WHEN 'F' THEN PESS.CPF ELSE PESS.CNPJ END, '99999999') CPF,
						PESS.EMAIL,
						CASE PESS.TIPO WHEN 'F' THEN 'F&Iacute;SICA' ELSE 'JUR&Iacute;DICA' END TIPO,
						CASE PESS.APELIDO WHEN NULL THEN NULL ELSE '('+PESS.APELIDO+')' END APELIDO,
						PESS.NEWSLETTER,
						CONVERT(CHAR,PESS.DATA_NASCIMENTO, 103) DATA_NASCIMENTO
					FROM
						e_PESSOA PESS
						".$where."
					ORDER BY
						PESS.ID_PESSOA DESC";
		
        $retorno = $this->mysqli->ConsultarSQL($query);
        	
        return $retorno;

    }
    
    public function fnEnderecoPessoa($idPessoa=null, $principal=null){
    	
    	$where = "";
    	$top = "";
    	if(isset($idPessoa)){
    		$idPessoa = sqlvalue($idPessoa, false);
    		$where .= "AND PEEN.PESS_ID_PESSOA = ".$idPessoa."";
    	} else {
    		$where .= "";
    	}
    	if(isset($principal)){
    		$where .= " AND IFNULL(PEEN.ENDERECO_PRINCIPAL, 'S') = 'S' ";
    		$top = " limit 1 ";
    	} else {
    		$where .= "";
    	}
    	
    	$query = "SELECT
						PEEN.ID_PESSOA_ENDERECO,
						PEEN.APELIDO_ENDERECO,
						PEEN.ENDERECO,
						PEEN.NUMERO,
						PEEN.COMPLEMENTO,
						PEEN.BAIRRO,
						PEEN.MUNICIPIO NOME_MUNICIPIO,
						PEEN.UF UNFE_ID_ESTADO,
						PEEN.CEP CEP_ID_CEP,
						PEEN.ENDERECO_PRINCIPAL,
						PEEN.TIPO_ENDERECO,
						PEEN.REFERENCIA
					FROM
						e_PESSOA_ENDERECO PEEN
					WHERE
						1=1
						".$where."
						".$top."";
    	
    	$retorno = $this->mysqli->ConsultarSQL($query);
    	
    	//printr($query);
    	
    	return $retorno;
    	
    }

    public function fnPessoaDados($idPessoa){

    	$idPessoa = sqlvalue($idPessoa, false);

    	$query = "SELECT 
						PESS.TIPO,
						PESS.NOME,
						PESS.SOBRENOME,
						PESS.NOME_FANTASIA,
						PESS.APELIDO,
						PESS.SEXO,
						IFNULL(PESS.CNPJ, PESS.CPF) CPF,
						PESS.IE,
						date_format(PESS.DATA_NASCIMENTO, '%d/%m/%Y') DATA_NASCIMENTO,
						PESS.NEWSLETTER,
						PECO.DESCRICAO TELEFONE1,
						PECO2.DESCRICAO CELULAR,
						PESS.EMAIL,
						PESS.NOME_CONTATO,
						PESS.ID_PESSOA
					FROM
						e_PESSOA PESS LEFT JOIN e_PESSOA_CONTATO PECO
											 ON PESS.ID_PESSOA = PECO.PESS_ID_PESSOA
											AND PECO.TICO_ID_TIPO_CONTATO = 1
									  LEFT JOIN e_PESSOA_CONTATO PECO2
											 ON PESS.ID_PESSOA = PECO2.PESS_ID_PESSOA
											AND PECO2.TICO_ID_TIPO_CONTATO = 2
					WHERE
						PESS.ID_PESSOA = ".$idPessoa."";

    	$retorno = $this->mysqli->ConsultarSQL($query);
    	
    	return $retorno;

    }
    

}

?>