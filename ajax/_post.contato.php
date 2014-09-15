<?php
require_once('../configs/config.php');
require_once('../classes/class.phpmailer.php');

$assuntoEmail = utf8_decode('Projeto - Contato pelo site');
$TO = array(
	'guilherme@sprdigital.com.br'
);
$CC = array(
);
$BCC = array(
	// 'guilherme@sprdigital.com.br'
);

$nome = trim($_POST['iptNome']);
$email = trim($_POST['iptEmail']);
$telefone = trim($_POST['iptTelefone']);
$assunto = trim($_POST['selAssunto']);
$mensagem = nl2br(trim($_POST['txtMensagem']));

$mensagemHTML = "
<strong>Assunto:</strong> $assunto<br />
<strong>Nome:</strong> $nome<br />
<strong>Email:</strong> $email<br />
<strong>Telefone:</strong> $telefone<br />
<br/>
____________________________________<br />
<br />$mensagem
";

// $mysqli->ExecutarSQL(" INSERT INTO _spr_site_contato SET
// 				Nome = '$nome',
// 				Email = '$email',
// 				Telefone = '$telefone',
// 				Assunto = '$assunto',
// 				Mensagem = '$mensagem'
// 			");

if($nome!==''){

	$mailer = new PHPMailer();
	$mailer->IsSMTP();
	$mailer->SMTPDebug = 0;
	$mailer->Port = 465;
	$mailer->Host = 'smtp.gmail.com';
	$mailer->SMTPSecure = "ssl";
	$mailer->SMTPAuth = true;
	$mailer->Username = 'contatositespr@gmail.com';
	$mailer->Password = 'teevo@2012';
	$mailer->SetFrom('contatositespr@gmail.com');
	$mailer->AddReplyTo($email);
	if(count($TO)>0){ foreach ($TO as $mail) {
		$mailer->AddAddress($mail);
	} }
	if(count($CC)>0){ foreach ($CC as $mail) {
		$mailer->AddCC($mail);
	} }
	if(count($BCC)>0){ foreach ($BCC as $mail) {
		$mailer->AddBCC($mail);
	} }
	$mailer->Subject = $assuntoEmail;
	$mailer->MsgHTML(utf8_decode($mensagemHTML));

	if($mailer->Send()){
		print(1);
	} else {
		echo $mailer->ErrorInfo;
	}

} else {
	print(0);
}

?>
