<?php
# importa a conexão com o BD
include('conexao.php');

# fecha a conexão com o BD
mysqli_close($db);

header('location: ../index.php');