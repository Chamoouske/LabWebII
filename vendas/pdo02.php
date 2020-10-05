<?php

$dsn = 'mysql:host=localhost;dbname=vendas';

$usuario = 'root';
$senha = '';

# tenta executar um comando
try {
    $conexao = new PDO($dsn, $usuario, $senha);

    

    # captura e trata o erro que possa ocorrer
} catch (PDOException $e) {
    echo 'Cod. Erro: ' . $e->getCode() . "<br>" . 'Messagem: ' . $e->getMessage();
}
