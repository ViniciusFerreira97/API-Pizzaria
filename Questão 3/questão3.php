<?php
function menorValor($string){
    $regex = '/[escala: ]([0-9]).*[ ]/m';
    preg_match_all($regex, $string, $dados);
    $escala = (float) $dados[0][0];
    $semEscala = (float) $dados[0][1];
    if($escala < $semEscala)
        return $escala;
    return $semEscala;
}
?>