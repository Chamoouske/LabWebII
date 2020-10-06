<?php

$dsn = 'mysql:host=localhost;dbname=vendas';
$usuario = 'root';
$senha = '';

# tenta executar um comando
try {
    $conexao = new PDO($dsn, $usuario, $senha);

    # definição do comando SQL desejado
    $query = 'SELECT * FROM usuario';

    # método que executa o comando SQL no objeto conectado no BD
    $stmt = $conexao->query($query);

    # método que retorna todos os registros obtidos do comando SQL
    $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //echo '<pre>';
    //print_r($lista);
    //echo '</pre>';

    foreach ($lista as $key => $registro) {
        echo($registro['nome']);
        echo '<hr>';
    }

    # captura e trata o erro que possa ocorrer
} catch (PDOException $e) {
    echo 'Cod. Erro: ' . $e->getCode() . "<br>" . 'Messagem: ' . $e->getMessage();
}