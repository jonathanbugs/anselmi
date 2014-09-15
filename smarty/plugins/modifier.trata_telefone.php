<?php
function smarty_modifier_trata_telefone($string, $tipo)
{
     $qtd = strlen($string);
     if($tipo == "ddd"){
     	$telefone = substr($string,0,3);
     } elseif($tipo == "telefone") {
     	$telefone = substr($string,3,$qtd);
     } else {
     	$telefone = "";
     }
     return $telefone;
}
?>