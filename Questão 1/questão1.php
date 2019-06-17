<?php

function funcaoSegundoGrau($a, $b, $c)
{
    $delta = pow(2, $b) - (4 * $a * $c);
    $x = [];
    $x[0] = (-$b + sqrt($delta)) / (2 * $a);
    $x[1] = (-$b - sqrt($delta)) / (2 * $a);
    return x;
}
?>