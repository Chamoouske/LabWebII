<?php

session_start();
include('conexao.php');

# inicializa variáveis
$nome = "";
$endereco = "";
$fone = null;
$email = null;
$id = 0;
$update = false;

# adiciona produto
if (isset($_POST['adiciona'])) {
    
    # filtros para não passar caracteres que não sejam adequados aos campos
    $nome = filter_input(INPUT_POST, 'nomecli', FILTER_SANITIZE_SPECIAL_CHARS);
    $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_SPECIAL_CHARS);
    $fone = filter_input(INPUT_POST, 'fone', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    if ($nome && $endereco && $fone && $email) {
        mysqli_query($db, "INSERT INTO clientes (nomecli, endercli, fonecli, emailcli) VALUES ('$nome', '$endereco', '$fone', '$email')");

        # grava mensagem na sessão
        $_SESSION['message'] = "Cliente adicionado!";
    }else{
        $_SESSION['erro'] = "Preencha todos os campos devidamente!";
    }
    
    header('location: ../clientes.php');
}

# altera produto
if (isset($_POST['altera'])) {

    # filtros para não passar caracteres que não sejam adequados aos campos
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $nome = filter_input(INPUT_POST, 'nomecli', FILTER_SANITIZE_SPECIAL_CHARS);
    $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_SPECIAL_CHARS);
    $fone = filter_input(INPUT_POST, 'fone', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
    
    if ($nome && $endereco && $fone && $email) {
        mysqli_query($db, "UPDATE produtos SET nomecli = '$nome', endercli = '$endereco', fonecli = '$fone', emailcli = '$email' WHERE id = $id");
    
        # grava mensagem na sessão
        $_SESSION['message'] = "Clinte alterado!";
    }else{
        $_SESSION['erro'] = "Preencha todos os campos devidamente!";
    }
    header('location: ../clientes.php');
}

# remove produto
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($db, "DELETE FROM clientes WHERE id = $id");

    # grava mensagem na sessão
    $_SESSION['message'] = "Cliente removido!";
    header('location: ../clientes.php');
}