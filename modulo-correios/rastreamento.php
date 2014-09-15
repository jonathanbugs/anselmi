<?php
$url = 'http://websro.correios.com.br/sro_bin/sroii_xml.eventos';
$fields = array(
						'Usuario' => '08132828',
						'Senha' => '02804744',
						'Tipo' => 'L',
						'Resultado' => 'T',
						'Objeto' => 'SQ458226057BR'
				);

foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');

$ch = curl_init();

curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

$result = curl_exec($ch);

curl_close($ch);
?>