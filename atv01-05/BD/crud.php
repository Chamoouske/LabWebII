<?php

session_start();
include('conexao.php');

# inicializa variáveis
$nome = "";
$descricao = "";
$qtdEstoque = null;
$precoUnitario = null;
$ptoReposicao = null;
$id = 0;
$update = false;

# adiciona produto
if (isset($_POST['adiciona'])) {
    
    # filtros para não passar caracteres que não sejam adequados aos campos
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
    $qtdEstoque = filter_input(INPUT_POST, 'qtdEstoque', FILTER_VALIDATE_INT);
    $precoUnitario = filter_input(INPUT_POST, 'precoUnitario', FILTER_VALIDATE_FLOAT);
    $ptoReposicao = filter_input(INPUT_POST, 'ptoReposicao', FILTER_VALIDATE_INT);
    if ($nome && $descricao && $qtdEstoque && $precoUnitario && $ptoReposicao) {
        mysqli_query($db, "INSERT INTO produtos (nome, descricao, qtdEstoque, precoUnitario, ptoReposicao) VALUES ('$nome', '$descricao', '$qtdEstoque', '$precoUnitario', '$ptoReposicao')");

        # grava mensagem na sessão
        $_SESSION['message'] = "Produto adicionado!";
    }else{
        $_SESSION['erro'] = "Preencha todos os campos devidamente!";
    }
    
    header('location: ../produtos.php');
}

# altera produto
if (isset($_POST['altera'])) {

    # filtros para não passar caracteres que não sejam adequados aos campos
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
    $qtdEstoque = filter_input(INPUT_POST, 'qtdEstoque', FILTER_VALIDATE_INT);
    $precoUnitario = filter_input(INPUT_POST, 'precoUnitario', FILTER_VALIDATE_FLOAT);
    $ptoReposicao = filter_input(INPUT_POST, 'ptoReposicao', FILTER_VALIDATE_INT);
    
    if ($nome && $descricao && $qtdEstoque && $precoUnitario && $ptoReposicao) {
        mysqli_query($db, "UPDATE produtos SET nome = '$nome', descricao = '$descricao', qtdEstoque = '$qtdEstoque', precoUnitario = '$precoUnitario', ptoReposicao = '$ptoReposicao' WHERE id = $id");
    
        # grava mensagem na sessão
        $_SESSION['message'] = "Produto alterado!";
    }else{
        $_SESSION['erro'] = "Preencha todos os campos devidamente!";
    }
    header('location: ../produtos.php');
}

# remove produto
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($db, "DELETE FROM produtos WHERE id = $id");

    # grava mensagem na sessão
    $_SESSION['message'] = "Produto removido!";
    header('location: ../produtos.php');
}