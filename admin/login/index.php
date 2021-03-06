<?
session_start();
require_once('../../configs/database.php');
if(isset($_POST['login']) and isset($_POST['senha'])){
	$_SESSION['login'] = $_POST['login'];
	$_SESSION['senha'] = $_POST['senha'];
	if(isset($_POST['redirect'])){
		header('location: '.$_POST['redirect']);
	} else {
		header('location: ../');
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistema de Administração</title>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.input, .textarea').bind('keyup',function(){
			if($(this).val()==''){ $(this).prev().show(); }
		}).bind('keydown',function(){
			$(this).prev().hide();
		}).bind('change',function(){
			if ($(this).val()==''){ $(this).prev().show(); } else { $(this).prev().hide(); }
		}).bind('focusout',function(){
			$(this).prev().fadeTo(0,1);
			if ($(this).val()==''){ $(this).prev().show(); } else { $(this).prev().hide(); }
		}).bind('focusin',function(){
			if ($(this).val()==''){ $(this).prev().show(); $(this).prev().fadeTo(0,0.3); } else { $(this).prev().hide(); }
		}).each(function(){
			if ($(this).val()==''){ $(this).prev().show(); } else { $(this).prev().hide(); }
		});
	});
</script>
<style type="text/css">
	html { height:100%; overflow:auto; }
	body { height:100%; min-width:960px; min-height:555px; position:relative; padding:0; margin:0; font-family:Tahoma, Geneva, sans-serif; }
	#verde { height:400px; position:absolute; top:0; right:0; left:0; background:#c6d500 url('img/bg.png') no-repeat center top; }
	#preto { position:absolute; top:400px; right:0; bottom:0; left:0; background:#000000 url('img/preto.png') no-repeat center top; }
	#spr { width:266px; height:39px; background:url('img/spr.png') no-repeat; position:absolute; top:127px; left:50%; margin:0 0 0 -133px; z-index:15; }
	form { width:484px; height:248px; background:url('img/form.png') no-repeat; position:absolute; top:307px; left:50%; margin:0 0 0 -242px; z-index:10; }
	#cliente { width:166px; height:126px; position:absolute; top:31px; left:40px; }
		#cliente .logo { background:#ffffff url('img/comlines.jpg') no-repeat center center; position:absolute; top:11px; right:11px; bottom:11px; left:11px; border-radius:3px; }
		#cliente .mask { background:url('img/mask.png') no-repeat center center; position:absolute; top:0; right:0; bottom:0; left:0; }
	label { position:absolute; top:10px; left:15px; font-size:12px; color:#606060; line-height:16px; }
	input { width:188px; height:16px; padding:10px 15px; font-size:14px; color:#ffffff; line-height:16px; background:none; border:none; }
	.login { position:absolute; top:50px; left:215px; }
	.senha { position:absolute; top:100px; left:215px; }
		.senha input { width:150px; }
	button { width:41px; height:41px; padding:0; margin:0; border:none; background:none; position:absolute; top:98px; left:394px; cursor:pointer; }
	button:hover { background:url('img/hover.png') no-repeat center center; }
</style>
</head>

<body>
	<div id="verde"></div>
	<div id="preto"></div>
	<div id="spr"></div>
	<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
		<div id="cliente">
			<div class="logo"></div>
			<div class="mask"></div>
		</div>
		<div class="login">
			<label for="login">Usuário</label>
			<input type="text" class="input" name="login" id="login" value="" />
		</div>
		<div class="senha">
			<label for="senha">Senha</label>
			<input type="password" class="input" name="senha" id="senha" value="" />
		</div>
		<? if(isset($_GET['redirect'])){ echo '<input type="hidden" name="redirect" value="'.$_GET['redirect'].'" />'; } ?>
		<button type="submit"></button>
	</form>
</body>
</html>
