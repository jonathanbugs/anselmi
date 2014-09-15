<?php
function smarty_modifier_mascara_telefone($string)
{
     $qtd = strlen($string);
     $telefone = substr($string,0,2)." ".substr($string,2,$qtd);
     return $telefone;
}
?>