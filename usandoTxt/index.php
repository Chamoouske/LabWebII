<form method="POST" action="index.php">
    <label>
        Novo Nome:
        <br>
        <input type="text" name="nome">
    </label>
    <input type="submit" value="Adicionar">
</form>

<?php

    // recebendo o campo nome do formulário
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);

    // RECEBENDO AS LINHAS DO ARQUIVO
    $texto = file_get_contents('listanomes.txt');

    // se houver nome inclui no arquivo
    if ($nome) {
        $texto .= "\n" . $nome;
        file_put_contents('listanomes.txt', $texto);
    }

    // ler as linhas do arquivo e criar um array - cada linha um elemento
    $texto = file_get_contents('listanomes.txt');
    $linhas = explode("\n", $texto);

    echo "<h2>" . "Lista de nomes" . "</h2>";
?>

<ul>
    <?php
        // imprime os elementos do array no formato de listas
        for ($i=0; $i < count($linhas); $i++) { 
            echo "<li>" . $linhas[$i] ."</li>";
        }
    ?>
</ul>