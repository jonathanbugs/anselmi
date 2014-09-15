<?php
function smarty_modifier_valor_parcelado($valor,$lista=true) {

    $nroParcelasPadrao = NUMERO_MAXIMO_PARCELAS;
    $valorParcelaMinima = VALOR_PARCELA_MINIMA;

    for ($i = 1; $i <= $nroParcelasPadrao; $i++) {
    	$valorParcela = $valor/$i;
        if($valorParcela > $valorParcelaMinima) {
            $nroParcelas = $i;
        }
    }

   
    if($nroParcelas == 0) {
        $nroParcelas = 1;
    }

    $valorFinalParcelado = ($valor/$nroParcelas);

    if($lista){
        $retorno = '<span class="produtoParcelado"><span class="produtoVezes">'.$nroParcelas.'x R$ </span>'.number_format($valorFinalParcelado, 2, ',', '.').' <span class="produtoJuros">sem juros</span></span>';
    } else {
        $retorno = '<span class="valorParcela">'.$nroParcelas.' x R$ <strong>'.number_format($valorFinalParcelado, 2, ',', '.').'</strong> sem juros</span>';
    }
    
    return $retorno;


}

?>