<?php
require('../configs/config.php');
require_once('../../classes/class.upload.php');
set_time_limit(0);

if(isset($_POST['acao'])){
	$acao = $_POST['acao'];
} else { $acao = ''; }

switch ($acao) {
	
	case 'cadastraBanner':

		$legenda = sqlvalue($_POST['legenda'], true);
		$link = sqlvalue($_POST['link'], true);
		$dataInicial = sqlvalue(formataDataInsert($_POST['dataInicial']), true);
		$dataFinal = sqlvalue(formataDataInsert($_POST['dataFinal']), true);

		$chave = time();

		if(isset($_POST['ativo'])){
			$ativo = sqlvalue('S', true);	
		} else {
			$ativo = sqlvalue('N', true);
		}

		$arrayImagens = $_FILES['imagem'];

		$error = array();
		if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $arrayImagens["type"])) {
			$error[1] = "Arquivo em formato inv&aacute;lido! A imagem deve ser jpg, jpeg, bmp, gif ou png. Envie outro arquivo";
		}

		if (count($error) == 0) {

			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $arrayImagens["name"], $ext);

			$nomeImagem = str_replace($ext[0], '', $arrayImagens["name"]);

			$nomeImagem = $chave.'-'.fnTrataUrlAmigavel($legenda) . '.' . $ext[1];

			$caminho_imagem = "../../midia/banners/" . $nomeImagem;

		 	$upload_sucesso = move_uploaded_file($arrayImagens["tmp_name"], $caminho_imagem);

			$handle = new Upload($caminho_imagem);
			$upload = $handle->uploaded;

			if ($upload) {

				$handle->file_max_size = '2048000';

				$handle->image_resize          = true;
				$handle->image_ratio_fill      = true;
				$handle->image_y               = 297;
				$handle->image_x               = 980;
				$handle->image_background_color = '#ffffff';
				$handle->file_overwrite = true;
				Process($handle, '../../midia/banners/topo/');

				$handle->Clean();

			}

			$query = "INSERT INTO e_BANNER
									(LEGENDA,
										LINK,
										IMAGEM,
										DATA_INICIAL,
										DATA_FINAL,
										ATIVO,
										USUARIO_INSERT)
							VALUES
									(".$legenda.",
										".$link.",
										".sqlvalue($nomeImagem, true).",
										".$dataInicial.",
										".$dataFinal.",
										".$ativo.",
										'".USUARIO_LOGADO."');
									";

			$result = $mysqli->ExecutarSQL($query);

			if($mysqli->LinhasAfetadas() > 0){
				$idBanner = $mysqli->InsertId();
				$retorno = '{ "cod": "sucesso", "mensagem": "'.CADASTRO_REALIZADO.'", "redirect": "banner-cadastra?idBanner='.$idBanner.'" }';
			} else {
				$retorno = '{ "cod": "erro", "mensagem": "'.ERRO_AO_GRAVAR.'" }';
			}

		} else {
		 	$retorno = '{ "cod": "erro", "mensagem": "'.$error[1].'" }';
		}

		echo $retorno;

		break;

	default:
			# code...
	break;
}

function Process(&$handle, $dir_pics) {
            
    $handle->Process($dir_pics);

}

?>
