<?php
// condicional ternário = IF de uma só linha
$idade = 20;
// IF normal
if($idade < 18){
    echo "Menor de idade<br>";
}else{
    echo "Maior de idade<br>";
}

// IF ternário
// (condição) ? RESULTADO POSITIVO : RESULTADO NEGATIVO;
echo (($idade < 18) ? 'Menor de idade' : "Maior de idade") . "<br>";

// ou movendo para variáveis
$resultado = ($idade < 18) ? 'Menor de idade' : "Maior de idade";
echo ($resultado) . "<br>";

$menorDeIdade = ($idade < 18) ? true : false;
echo ($menorDeIdade);

if ($menorDeIdade) {
    echo 'MENOR';
} else {
    echo 'MAIOR';
}
