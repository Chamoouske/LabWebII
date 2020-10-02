<?php

$tipo = 'texto';

if ($tipo == 'foto') {
    echo 'Exibindo foto'."<br>";
}
if ($tipo == 'video') {
    echo 'Exibindo video'."<br>";
}
if ($tipo == 'texto') {
    echo 'Exibindo texto'."<br>";
}


switch ($tipo) {
    case 'foto':
        echo 'Exibindo FOTO' . "<br>";
        break;
    case 'video':
        echo 'Exibindo VIDEO' . "<br>";
        break;
    case 'texto':
        echo 'Exibindo TEXTO' . "<br>";
        break;
    default:
        echo 'Formato inválido';
        break;
}