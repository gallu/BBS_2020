<?php  // file.php
//  http://dev2.m-fr.net/XXXX/BBS/file.php

//var_dump( __DIR__ );
$dir = __DIR__ . '/../data';
//var_dump( $dir );

//
$filename = $dir . '/test.txt';

//
$fd = fopen($filename, 'a+');
var_dump($fd);

//
fwrite($fd, 'rand:' . mt_rand(0, 9999) . "\n" );

//
fclose($fd);
