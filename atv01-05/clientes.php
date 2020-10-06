<?php include('BD/crudcli.php'); ?>

<?php
# recupera o registro para edição
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM clientes WHERE idcli=$id");
    # testa o retorno do select e cria o vetor com os registros trazidos

    if ($record) {
        $n = mysqli_fetch_array($record);
        $nome = $n['nomecli'];
        $endereco = $n['endercli'];
        $fone = $n['fonecli'];
        $email = $n['emailcli'];
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <?php include('header-footer/header.php'); ?>
    <!-- teste se a sessão existe e exibe sua mensagem -->
    <?php if (isset($_SESSION['message'])) : ?>
        <div class="msg">
            <?php
            # exibe mensagem da sessão
            echo $_SESSION['message'];
            # apaga a sessão
            unset($_SESSION['message']);
            ?>
        </div>
    <?php endif ?>
    <?php if (isset($_SESSION['erro'])) : ?>
        <div class="inva">
            <?php
            # exibe mensagem da sessão
            echo $_SESSION['erro'];
            # apaga a sessão
            unset($_SESSION['erro']);
            ?>
        </div>
    <?php endif ?>
    <!-- ------------------------------------------------- -->
    <div class="lista">
    <!-- recupera os registros do banco de dados e exibe na página -->
        <?php $results = mysqli_query($db, "SELECT * FROM clientes"); ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th colspan="2">Ação</th>
                </tr>
            </thead>
            <!-- cria o vetor com os registros trazidos do select -->
            <!-- Início while -->
            <?php while ($rs = mysqli_fetch_array($results)) { ?>
                <tr>
                    <td><?php echo $rs['idcli']; ?></td>
                    <td><?php echo $rs['nomecli']; ?></td>
                    <td><?php echo $rs['fonecli']; ?></td>
                    <td><?php echo $rs['emailcli']; ?></td>
                    <td>
                        <a href="clientes.php?edit=<?php echo $rs['idcli']; ?>" class="edit_btn">Alterar</a>
                    </td>
                    <td>
                        <a href="BD/crudcli.php?del=<?php echo $rs['idcli']; ?>" class="del_btn">Remover</a>
                    </td>
                </tr>
            <?php } ?>
            <!-- Fim while -->
        </table>
        <!-- ------------------------------------------------------------ -->
    </div>

    <form method="post" action="BD/crudcli.php">
        <!-- campo oculto - contem o id do registro que vai ser atualizado -->
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="input-group">
            <label>Cliente</label>

            <input type="text" name="nomecli" value="<?php echo $nome; ?>">
        </div>
        <div class="input-group">
            <label>Endereço</label>

            <input type="text" name="endereco" value="<?php echo $endereco; ?>">
        </div>
        <div class="input-group">
            <label>Telefone</label>

            <input type="text" name="fone" value="<?php echo $fone; ?>">
        </div>
        <div class="input-group">
            <label>Email</label>

            <input type="email" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="input-group">

            <?php if ($update == true) : ?>
                <button class="btn" type="submit" name="altera" style="background: #556B2F;">Alterar</button>
            <?php else : ?>
                <button class="btn" type="submit" name="adiciona">Adicionar</button>
            <?php endif ?>
        </div>
    </form>

    <!-- Toda a parte final do html tá no arquivo footer.php e é carregado apartir daqui -->
    <?php include('header-footer/footer.php');
