<?php

$pnome = 'TADS ';
$snome = 'UEPA';
$idade = 10;

$nomeCompleto = $pnome . $snome;
echo '1- ' . $nomeCompleto . "<br>";

$tripla = $pnome . " " . $snome;
echo '2- ' . $tripla . "<br>";

$messagem = "$pnome $snome tem $idade anos";
echo '3- ' . $messagem . "<br>";

$x = '3';
$y = 4;

$w = $x . $y; // concatena
echo '4- '. $w . "<br>";
$w = $x + $y; // soma
echo '5- '. $w . "<br>";

$nomeCompleto3 = $pnome;
$nomeCompleto3 .= $snome;
echo '6- ' . $nomeCompleto3 . "<br>";