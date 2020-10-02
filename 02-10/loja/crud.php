<?php

session_start();

# conecta com o BD
$server = 'localhost';
$user = 'root';
$psw = '';
$dbase = 'loja';
$db = mysqli_connect($server, $user, $psw, $dbase);

# inicializa variáveis
$nome = "";
$descricao = "";
$id = 0;
$update = false;

# adiciona produto
if (isset($_POST['adiciona'])) {
    
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    mysqli_query($db, "INSERT INTO produtos (nome, descricao) VALUES ('$nome', '$descricao')");

    # grava mensagem na sessão
    $_SESSION['message'] = "Produto adicionado!";
    header('location: produtos.php');
}

# altera produto
if (isset($_POST['altera'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    mysqli_query($db, "UPDATE produtos SET nome = '$nome', descricao = '$descricao' WHERE id = $id");

    # grava mensagem na sessão
    $_SESSION['message'] = "Produto alterado!";
    header('location: produtos.php');
}

# remove produto
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($db, "DELETE FROM produtos WHERE id = $id");

    # grava mensagem na sessão
    $_SESSION['message'] = "Produto removido!";
    header('location: produtos.php');
}