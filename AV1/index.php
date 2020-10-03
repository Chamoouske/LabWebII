<?php include('fecharBD.php'); ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início</title>
    <!-- Toda a parte inicial do html tá no arquivo header.php e é carregado apartir daqui -->
    <?php include('header.php'); ?>

    <div class="menu_principal">
        <label>Ir para a tela de produtos: </label>
        <a class="sair_btn" href="produtos.php">Produtos</a>
        <br><br>
        <label for="">Ir para Upload de arquivos: </label>
        <a class="sair_btn" href="../uploadArquivos/index.php">Upload</a>
        <br><br>
        <label for="">Ir para Usar Arquivos txt: </label>
        <a class="sair_btn" href="../usandoTxt/index.php">Upload</a>
    </div>

    <footer>
        <h3>Devesvolvido por: <a class="github" href="https://gist.github.com/Chamoouske">Ajax Lima</a></h3>
    </footer>
    </body>

</html>