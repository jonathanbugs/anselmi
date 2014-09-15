<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Lista de Casamento Comlines</title>
</head>
<body style="background: #FFF url('http://www2.lojaspr.com.br/lista-casamento/img/bg_news.jpg') no-repeat top center; width: 590px; margin: 0 auto; color: #545454; font-family: arial, sans-serif; font-size: 12px; text-align: center">
	
	<table style="width: 322px; margin: 0 auto; border=0" align="center">
		<tr>
			<td style="text-align: center">
				<img src="http://www2.lojaspr.com.br/lista-casamento/img/topo_email.jpg" alt="Comlines" style="margin-top: 30px; display: inline-block">
			</td>
		</tr>

		<tr>
			<td style="text-align: center">
				<img src="http://www2.lojaspr.com.br/lista-casamento/img/logo_email.png" alt="Lista de Noivos Comlines" style="margin-top: 70px; display: inline-block;">
			</td>
		</tr>
		
		<tr>
			<td style="text-align: center">
				<img src="http://www2.lojaspr.com.br/lista-casamento/fotos/<?=$_POST['fotoCapa']?>" alt="Noivos" style="margin-top: 43px; display: inline-block">
			</td>
		</tr>

		<tr>
			<td style="text-align: center">
				<span style="font-size: 19px; display: block; margin-top: 30px; font-weight: bold">
					<span style="display: block"><?=$_POST['nomeNoivos']?></span>
				</span>
			</td>
		</tr>

		<tr>
			<td style="text-align: center">
				<p style="line-height: 18px;">
					<span>v&atilde;o se casar em breve e querem que voc&ecirc; conhe&ccedil;a o site</span>
					<span>que criaram na <a style="color: #545454; font-size: 12px; text-decoration: none" href="http://www2.lojaspr.com.br" target="_blank">comlines.com.br.</a></span>
				</p>
				<p style="line-height: 18px;">
					<span>L&aacute;, voc&ecirc; encontra informa&ccedil;&otilde;es sobre o casamento e a</span>
					<span>lista de presentes do casal, onde &eacute; poss&iacute;vel realizar a</span>
					<span>compra dos produtos diretamente pelo site.</span>
				</p>
			</td>
		</tr>

		<tr>
			<td style="text-align: center">
				<a href="http://www2.lojaspr.com.br/lc/<?=$_POST['urlListaCasamento']?>" target="_blank">
					<img src="http://www2.lojaspr.com.br/lista-casamento/img/bt_email.jpg" alt="Entrar no Site" style="margin: 15px 0 60px; display: inline-block">
				</a>
			</td>
		</tr>
	</table>

	<table style="border-top: 1px solid #d3d3d3; width: 529px; margin: 0 auto 40px; border=0" align="center">
		<tr>
			<td style="text-align: center">
				<p style="line-height: 25px;">
					<a style="color: #545454; font-size: 12px; text-decoration: none; display: block" href="http://www2.lojaspr.com.br/lc/<?=$_POST['urlListaCasamento']?>" target="_blank">www2.lojaspr.com.br/lc/<?=$_POST['urlListaCasamento']?>
					</a>
					<a style="color: #545454; font-size: 12px; text-decoration: none; display: block" href="http://www2.lojaspr.com.br" target="_blank">www2.lojaspr.com.br
					</a>
				</p>
			</td>
		</tr>
	</table>
</body>
</html>