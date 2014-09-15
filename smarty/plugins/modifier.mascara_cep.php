<?php
function smarty_modifier_mascara_cep($string)
{
     $cep = substr($string,0,5)."-".substr($string,5,8);
     return $cep;
}
?>