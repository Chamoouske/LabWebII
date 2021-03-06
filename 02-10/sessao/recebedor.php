<?php

session_start();

$nome   = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$idade  = filter_input(INPUT_POST, 'idade', FILTER_VALIDATE_INT);
$email  = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if ($nome && $email && $idade) {

    echo 'NOME: ' . $nome . "<br>";
    echo ' IDADE: ' . $idade . "<br>";
    echo ' E-MAIL: ' . $email;
} else {
    // grava array do tipo chave-valor: [aviso] => 'Preencha os itens corretamente'
    $_SESSION['aviso'] = 'Preencha os ítens corretamente!<br>';

    header("Location: index.php");
    exit;
}