<?php

$dsn = 'mysql:host=localhost;dbname=vendas';

$usuario = 'root';
$senha = '';

# tenta executar um comando
try {
    $conexao = new PDO($dsn, $usuario, $senha);

    $query = 'CREATE TABLE usuario(
        id int not null primary key auto_increment,
        nome varchar(50) not null,
        email varchar(50) not null,
        senha varchar(100) not null
    )';
    $retorno = $conexao->exec($query);
    echo $retorno;

    # inclusão de registro na tabela
    /*$query = 'INSERT INTO usuario(nome, email, senha)
        VALUES ("TADS UEPA", "tads@uepa.br", "123"
    )';

    $retorno = $conexao->exec($query);
    echo $retorno;

    # exclusão dos registros
    /*$query = 'DELETE FROM usuario';

    $retorno = $conexao->exec($query);
    echo $retorno;*/

    # captura e trata o erro que possa ocorrer
} catch (PDOException $e) {
    echo 'Cod. Erro: ' . $e->getCode() . "<br>" . 'Messagem: ' . $e->getMessage();
}
