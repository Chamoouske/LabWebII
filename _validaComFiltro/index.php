<?php
require('header.php');
?>

<form method="POST" action="recebedor.php">
    <!-- quando não especifica o action - envia para o próprio programa -->
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

    <!-- trocar senha por e-mail -->
    <label>
        E-mail:
        <br>
        <input type="text" name="email">
    </label>
    <br><br>

    <input type="submit" value="Enviar">
</form>