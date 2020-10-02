<?php

$i = 1;

$ingredientes = [
    'açucar',
    'farinha de trigo',
    'ovo',
    'chocolate',
    'leite',
    'fermento em pó'
];

foreach ($ingredientes as $item) {
    echo $i . 'º Item: ' . $item . '<br>';
    $i += 1;
}

echo "<br><br>";