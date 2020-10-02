<?php
    print_r($_FILES);
    // função para mover o arquivo da área temporária para onde vamos usar
    // move_uploaded_files(localização, destino/nome)
    // o nome pode ser um novo ou usar o original do arquivo
    $nome = $_FILES['arquivo']['name'];
    move_uploaded_file($_FILES['arquivo']['tmp_name'], 'arquivos/' . $nome);

    // verifica se o arquivo é do tipo desejado - mais seguro
    $permitidos = ['image/jpeg', 'image/jpg', 'image/png'];

    if (in_array($_FILES['arquivo']['type'], $permitidos)) {
        //$nome = md5(time() . rand(0, 1000)) . '.jpg';
        move_uploaded_file($_FILES['arquivo']['tmp_name'], 'arquivos/' . $nome);

        echo '<br>' . 'Arquivo salvo com sucesso!';
    } else {
        echo '<br>' . 'Arquivo não permitido!';
    }
?>

<form method="POST" action="index.php">
    <input type="submit" value="Voltar">
</form>