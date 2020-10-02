<?php

// função anônima - não tem nome
$dizimo = function (int $valor){
    $res = $valor * 0.1;
    return $res;
};

echo '1- Anônimo: ' . $dizimo(90) . '<br><br>';

// só funciona para PHP 7.4

$dizimo2 = fn (int $valor) => $valor * 0.1;

echo '2- Flecha: ' . $dizimo2(90) . '<br><br>';

$somar = fn (int $n1, int $n2 = 0) => $n1 = $n2;
echo '3- Soma = ' . $somar(3, 6);