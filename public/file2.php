<?php  // file2.php
//  http://dev2.m-fr.net/XXXX/BBS/file2.php

//var_dump( __DIR__ );
$dir = __DIR__ . '/../data';
//var_dump( $dir );

//
$filename = $dir . '/test2.txt';

//
//$fd = fopen($filename, 'a+');
$file = new SplFileObject($filename, 'a+');
var_dump($file);

//
//fwrite($fd, 'rand:' . mt_rand(0, 9999) . "\n" );
$file->fwrite('rand:' . mt_rand(0, 9999) . "\n" );

//
//fclose($fd);

//
$file = new SplFileObject($filename, 'r');
while($line = $file->fgets()) {
    echo $line , '<br>';
}

//
$file = new SplFileObject($filename, 'r');
foreach($file as $no => $line) {
    echo "{$no}: {$line}<br>";
}

