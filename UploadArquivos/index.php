<!--
    Usar POST para enviar arquivos
    enctype - define como o formulário agrega o conteúdo para enviar o arquivo
    usar imput file - envia o arquivo e seus dados para o superglobal $_FILES
-->

<form method="POST" action="recebedor.php" enctype="multipart/form-data">
    <input type="file" name="arquivo">
    <input type="submit" value="Enviar">
</form>