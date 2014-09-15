<?php
function smarty_modifier_mascara_cpf_cnpj($string)
{
     $qtd = strlen($string);
     if($qtd == 11)
     {
          $n_cpf = substr($string,0,3).".".substr($string,3,3).".".substr($string,6,3)."-".substr($string,9,2);
          return $n_cpf;
     }
     elseif($qtd == 14)
     {
          $n_cnpj = substr($string,0,2).".".substr($string,2,3).".".substr($string,5,3)."/".substr($string,8,4)."-".substr($string,12,2);
          return $n_cnpj;
     }
     else
     {
          return false;
     }
}
?>