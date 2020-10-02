<?php
    session_start();

    require('header.php');

    if (isset($_SESSION['aviso'])) {
        echo $_SESSION['aviso'] . "<br>";

        // apoós ler o aviso ele é apagado - só aparece uma vez
        $_SESSION['aviso'] = null;
    }
?>

<form method="POST" action="recebedor.php">

    <label>
        Nome:
        <br>
        <input type="text" name="nome">
    </label>
    <br><br>

    <label>
        Idade:
        <br>
        <input type="text" name="idade">
    </label>
    <br><br>

    <label>
        E-mail:
        <br>
        <input type="text" name="email">
    </label>
    <br><br>

    <input type="submit" value="Enviar">

</form>