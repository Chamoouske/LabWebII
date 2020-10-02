<?php

// loop enquanto i for menor que 20
for ($i=0; $i < 20; $i++) { 
    // loop enquanto j for menor que i
    for ($j=0; $j < $i; $j++) { 
        echo '-';
    }
    echo '<br>';
}