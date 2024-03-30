<?php  // timing.php

function check($input) {
    $key = 'abcdefghijklmn';
    $t = microtime(true);
    for($i = 0; $i < 10000000; ++$i) {
        if ($key === $input) {
        }
    }
    $t_end = microtime(true);
    var_dump($input, $t_end - $t);
    echo "\n";
}

//
check('Zbcdefghijklmn');
check('Zbcdefghijklmn');
check('bbcdefghijklmn');
check('cbcdefghijklmn');
check('abcdefghijklmZ');
