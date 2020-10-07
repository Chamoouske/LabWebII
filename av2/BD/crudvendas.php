<?php

session_start();
include('conexao.php');

# inicializa variáveis
$codven = null;
$idcli = null;
$idprod = null;
$qtdVen = null;
$update = false;

# adiciona produto
if (isset($_POST['adiciona'])) {

    # filtros para não passar caracteres que não sejam adequados aos campos
    $idcli = filter_input(INPUT_POST, 'idcli', FILTER_VALIDATE_INT);
    $idprod = filter_input(INPUT_POST, 'idprod', FILTER_VALIDATE_INT);
    $qtdVen = filter_input(INPUT_POST, 'qtdVen', FILTER_VALIDATE_INT);

    if ($idcli && $idprod && $qtdVen) {
        # recebe o idcli da tabela clientes igual o $idcli
        $validaCliente = mysqli_query($db, "SELECT * FROM clientes WHERE idcli = $idcli");
        # recebe o id da tabela produtos igual o $idprod
        $ValidaProduto = mysqli_query($db, "SELECT * FROM produtos WHERE id = $idprod");

        # verifica se existe um cliente com o id informado do formulário
        if ($validaCliente) {
            $n = mysqli_fetch_array($validaCliente);
            if ($n['idcli'] != $idcli) {
                $_SESSION['erro'] = "ID de Cliente inválido!";
                header('location: ../vendas.php');
                return;
            }
        }

        # verifica se existe um produto com o id informado do formulário
        if ($ValidaProduto) {
            $n = mysqli_fetch_array($ValidaProduto);
            if ($n['id'] != $idprod) {
                $_SESSION['erro'] = "ID de Produto inválido!";
                header('location: ../vendas.php');
                return;
            }
            # verifica se a quantidade em estoque é menor que a quantidade pedida
            if ($n['qtdEstoque'] <= $qtdVen) {
                $_SESSION['erro'] = "Qtd pedida acima da Qtd em estoque!";
                header('location: ../vendas.php');
                return;
            }
        }

        mysqli_query($db, "INSERT INTO vendas (idcli, idprod, qtdVen) VALUES ('$idcli', '$idprod', '$qtdVen')");
        # grava mensagem na sessão
        $_SESSION['message'] = "Venda adicionada!";
    } else {
        # grava mensagem na sessão
        $_SESSION['erro'] = "Preencha todos os campos devidamente!";
    }
    header('location: ../vendas.php');
}

# altera produto
if (isset($_POST['altera'])) {

    # filtros para não passar caracteres que não sejam adequados aos campos
    $codven = filter_input(INPUT_POST, 'codven', FILTER_VALIDATE_INT);
    $idcli = filter_input(INPUT_POST, 'idcli', FILTER_VALIDATE_INT);
    $idprod = filter_input(INPUT_POST, 'idprod', FILTER_VALIDATE_INT);
    $qtdVen = filter_input(INPUT_POST, 'qtdVen', FILTER_VALIDATE_INT);

    if ($idcli && $idprod && $qtdVen) {
        mysqli_query($db, "UPDATE vendas SET idcli = '$idcli', idprod = '$idprod', qtdVen = '$qtdVen' WHERE codven = $codven");

        # grava mensagem na sessão
        $_SESSION['message'] = "Venda alterado!";
    } else {
        $_SESSION['erro'] = "Preencha todos os campos devidamente!";
    }
    header('location: ../vendas.php');
}

# remove produto
if (isset($_GET['del'])) {
    $codven = $_GET['del'];
    mysqli_query($db, "DELETE FROM vendas WHERE codven = $codven");

    # grava mensagem na sessão
    $_SESSION['message'] = "Venda removido!";
    header('location: ../vendas.php');
}
