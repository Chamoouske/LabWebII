<?php include('BD/crud.php'); ?>

<?php
# recupera o registro para edição
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM produtos WHERE id=$id");
    # testa o retorno do select e cria o vetor com os registros trazidos

    if ($record) {
        $n = mysqli_fetch_array($record);
        $nome = $n['nome'];
        $descricao = $n['descricao'];
        $qtdEstoque = $n['qtdEstoque'];
        $precoUnitario = $n['precoUnitario'];
        $ptoReposicao = $n['ptoReposicao'];
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
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
        <?php $results = mysqli_query($db, "SELECT * FROM produtos"); ?>
        <table>
            <thead>
                <tr>
                    <th>ID </th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Qtd Estoque</th>
                    <th>Preço Unitário</th>
                    <th>Ponto de Reposição</th>
                    <th colspan="2">Ação</th>
                </tr>
            </thead>
            <!-- cria o vetor com os registros trazidos do select -->
            <!-- Início while -->
            <?php while ($rs = mysqli_fetch_array($results)) { ?>
                <tr>
                    <td><?php echo $rs['id']; ?></td>
                    <td><?php echo $rs['nome']; ?></td>
                    <td><?php echo $rs['descricao']; ?></td>
                    <td><?php echo $rs['qtdEstoque'] ?></td>
                    <td><?php echo $rs['precoUnitario'] ?></td>
                    <td><?php echo $rs['ptoReposicao'] ?></td>
                    <td>
                        <a href="produtos.php?edit=<?php echo $rs['id']; ?>" class="edit_btn">Alterar</a>
                    </td>
                    <td>
                        <a href="BD/crud.php?del=<?php echo $rs['id']; ?>" class="del_btn">Remover</a>
                    </td>
                </tr>
            <?php } ?>
            <!-- Fim while -->
        </table>
        <!--------------------------------------------------------------- -->
    </div>

    <form method="post" action="BD/crud.php">
        <!-- campo oculto - contem o id do registro que vai ser atualizado -->
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="input-group">
            <label>Produto</label>

            <input type="text" name="nome" value="<?php echo $nome; ?>" placeholder="Nome do produto" title="Campo requerido" required>
        </div>
        <div class="input-group">
            <label>Descrição</label>

            <input type="text" name="descricao" value="<?php echo $descricao; ?>"  placeholder="Descrição do produto" title="Campo requerido" required>
        </div>
        <div class="input-group">
            <label>Quantidade no estoque</label>

            <input type="number" name="qtdEstoque" value="<?php echo $qtdEstoque; ?>" placeholder="99" title="Campo requerido" required>
        </div>
        <div class="input-group">
            <label>Preço unitário</label>

            <input type="text" name="precoUnitario" value="<?php echo $precoUnitario; ?>" placeholder="9.99" pattern="\d*\.?\d*" title="Apenas numéros e com . como divisor decimal" required>
        </div>
        <div class="input-group">
            <label>Ponto de reposição</label>

            <input type="number" name="ptoReposicao" value="<?php echo $ptoReposicao; ?>" placeholder="99" title="Campo requerido" required>
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