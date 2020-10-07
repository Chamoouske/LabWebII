<?php include('BD/crudvendas.php'); ?>

<?php
# recupera o registro para edição
if (isset($_GET['edit'])) {
    $codven = $_GET['edit'];
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM vendas WHERE codven=$codven");
    # testa o retorno do select e cria o vetor com os registros trazidos

    if ($record) {
        $n = mysqli_fetch_array($record);
        $codven = $n['codven'];
        $idcli = $n['idcli'];
        $idprod = $n['idprod'];
        $qtdVen = $n['qtdVen'];
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendas</title>
    <!-- O cabeçalho é chamado de outro arquivo (header.php) para ser usado o mesmo arquivo em diversas janelas -->
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
        <?php $results = mysqli_query($db, "SELECT codven, cli.nomecli, idprod, qtdVen, (qtdVen * precoUnitario) as valorTot FROM vendas ven INNER JOIN clientes cli inner join produtos ON ven.idcli = cli.idcli and idprod = id ORDER BY codven"); ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Id Produto</th>
                    <th>Qtd Vendida</th>
                    <th>Valor Total</th>
                    <th colspan="2">Ação</th>
                </tr>
            </thead>
            <!-- cria o vetor com os registros trazidos do select -->
            <!-- Início while -->
            <?php while ($rs = mysqli_fetch_array($results)) { ?>
                <tr>
                    <td><?php echo $rs['codven']; ?></td>
                    <td><?php echo $rs['nomecli']; ?></td>
                    <td><?php echo $rs['idprod']; ?></td>
                    <td><?php echo $rs['qtdVen'] ?></td>
                    <td><?php echo $rs['valorTot'] ?></td>
                    <td>
                        <a href="vendas.php?edit=<?php echo $rs['codven']; ?>" class="edit_btn">Alterar</a>
                    </td>
                    <td>
                        <a href="BD/crudvendas.php?del=<?php echo $rs['codven']; ?>" class="del_btn">Remover</a>
                    </td>
                </tr>
            <?php } ?>
            <!-- Fim while -->
        </table>
        <!--------------------------------------------------------------- -->
    </div>

    <form method="post" action="BD/crudvendas.php">
        <!-- campo oculto - contem o id do registro que vai ser atualizado -->
        <input type="hidden" name="codven" value="<?php echo $codven; ?>">

        <div class="input-group">
            <label>Id do Cliente</label>

            <input type="number" name="idcli" value="<?php echo $idcli; ?>" placeholder="99" title="Campo requerido" required>
        </div>
        <div class="input-group">
            <label>Id do Produto</label>

            <input type="number" name="idprod" value="<?php echo $idprod; ?>" placeholder="99" title="Campo requerido" required>
        </div>
        <div class="input-group">
            <label>Quantidade no estoque</label>

            <input type="number" name="qtdVen" value="<?php echo $qtdVen; ?>" placeholder="99" title="Campo requerido" required>
        </div>
        <div class="input-group">

            <?php if ($update == true) : ?>
                <button class="btn" type="submit" name="altera" style="background: #556B2F;">Alterar</button>
            <?php else : ?>
                <button class="btn" type="submit" name="adiciona">Adicionar</button>
            <?php endif ?>

        </div>
    </form>
<?php include('header-footer/footer.php'); ?>