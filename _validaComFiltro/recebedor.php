<?php

// verifica campo string - se estiver vazio grava false
$nome = filter_input(INPUT_POST, 'nome');
// verifica campo int - se inválido grava false
$idade = filter_input(INPUT_POST, 'idade', FILTER_VALIDATE_INT);
// verifica email - se inválido grava false
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if ($nome && $idade && $email) {
    echo 'NOME: ' . $nome . '<br>';
    echo 'IDADE: ' . $idade . '<br>';
    echo 'EMAIL: ' . $email . '<br>';
} else {
    header("Location: index.php");
    exit;
}
