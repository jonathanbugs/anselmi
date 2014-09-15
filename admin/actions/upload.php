<?php
//error_reporting(E_ALL);

require_once('../../classes/class.upload.php');

ini_set("max_execution_time",0);

require('../configs/config.php');

set_time_limit(0);

if(isset($_POST['acao'])){
	$acao = $_POST['acao'];
} else { $acao = ''; }

switch ($acao) {

	case 'uploadImagem':

		$arrayImagens = $_FILES['myfile'];

		$combinacao = $_POST['combinacaoImagem'];

		$countImagens = count($arrayImagens['name']);

		$chave = md5(uniqid(time()));

		$query = "";

		for ($i=0; $i < $countImagens; $i++) { 

			if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $arrayImagens["type"][$i])){
				$error[1] = "Arquivo em formato inv&aacute;lido! A imagem deve ser jpg, jpeg, bmp, gif ou png. Envie outro arquivo";
			}

			if (count($error) == 0) {

				preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $arrayImagens["name"][$i], $ext);

				$nome_imagem = str_replace($ext[0], '', $arrayImagens["name"][$i]);

				$nome_imagem = $chave.'-'.fnTrataUrlAmigavel($nome_imagem) . '.' . $ext[1];

				$caminho_imagem = "../../midia/produtos/upload/" . $nome_imagem;

				$upload_sucesso = move_uploaded_file($arrayImagens["tmp_name"][$i], $caminho_imagem);

				$handle = new Upload($caminho_imagem);
            	$upload = $handle->uploaded;

            	if ($upload) {

	                $handle->file_max_size = '2048000';

	                $handle->image_resize          = true;
	                $handle->image_ratio_fill      = true;
	                $handle->image_y               = 60;
	                $handle->image_x               = 60;
	                $handle->image_background_color = '#ffffff';
	                $handle->file_overwrite = true;
	                Process($handle, '../../midia/produtos/carrinho/');
	                
	                $handle->image_resize          = true;
	                $handle->image_ratio_fill      = true;
	                $handle->image_y               = 76;
	                $handle->image_x               = 76;
	                $handle->image_background_color = '#ffffff';
	                $handle->file_overwrite = true;
	                Process($handle, '../../midia/produtos/carrinho-de-compras/');

	                $handle->image_resize          = true;
	                $handle->image_ratio_fill      = true;
	                $handle->image_y               = 175;
	                $handle->image_x               = 175;
	                $handle->image_background_color = '#ffffff';
	                $handle->file_overwrite = true;
	                Process($handle, '../../midia/produtos/listagem/');

	                $handle->image_resize          = true;
	                $handle->image_ratio_fill      = true;
	                $handle->image_y               = 398;
	                $handle->image_x               = 398;
	                $handle->image_background_color = '#ffffff';
	                $handle->file_overwrite = true;
	                Process($handle, '../../midia/produtos/detalhe/');

	                $handle->image_resize          = true;
	                $handle->image_ratio_fill      = true;
	                $handle->image_y               = 800;
	                $handle->image_x               = 800;
	                $handle->image_background_color = '#ffffff';
	                $handle->file_overwrite = true;
	                Process($handle, '../../midia/produtos/original/');

	                $handle->Clean();

	            }

				if($upload_sucesso){

					if($i == 0){
						$principal = 'S';
					} else {
						$principal = 'N';
					}

					foreach ($combinacao as $value) {
						$query .= "INSERT INTO e_PRODUTO_COMBINACAO_IMAGEM
									           (PRCO_ID_PRODUTO_COMBINACAO
									           ,IMAGEM
									           ,ORDEM
									           ,PRINCIPAL
									           ,CHAVE
									           ,DATA_INSERT
									           ,USUARIO_INSERT)
									     VALUES
									           (".$value."
									           ,'".$nome_imagem."'
									           ,".($i*10)."
									           ,'".$principal."'
									           ,'".$chave."'
									           ,now()
									           ,'".USUARIO_LOGADO."');
								";
					}


				} else {
					$error[3] = 'N&atilde;o foi poss&iacute;vel gravar imagens';
				}

			}

		}

		if($query){
			$combinacao = implode($combinacao, ',');
			$query .= "DELETE FROM e_PRODUTO_COMBINACAO_IMAGEM WHERE PRCO_ID_PRODUTO_COMBINACAO IN (".$combinacao.") AND CHAVE <> '".$chave."';";	
		} 

		$resultQuery = $mysqli->ExecutarMultiSQL($query);

		if(!$resultQuery){
			$error[2] = 'N&atilde;o foi poss&iacute;vel gravar imagens';
		}

		if (count($error) != 0) {
			foreach ($error as $erro) {
				echo $erro . "";
			}
		}

		break;
	
	default:
		# code...
		break;
}


function Process(&$handle, $dir_pics) {
            
    $handle->Process($dir_pics);

    //if ($handle->processed) {
        
        //echo '<img src="'.$dir_pics.'/' . $handle->file_dst_name . '" />';
        //echo $handle->processed;
        
    //}  else {
    	//echo $handle->error;
    //}

}

?>