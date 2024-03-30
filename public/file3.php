<?php  // file3.php
//  http://dev2.m-fr.net/XXXX/BBS/file3.php

//
$dir = __DIR__ . '/../data';
$filename = $dir . '/test.csv';

//
$file = new SplFileObject($filename, 'a+');
//
$data = [];
$data[] = 'ra,"nd';
$data[] = mt_rand(0, 9999);
//
$file->fputcsv($data);

//
$file_r = new SplFileObject($filename, 'a+');
/*
foreach($file_r as $line) {
    echo $line , '<br>';
}
*/
while($datum = $file_r->fgetcsv()) {
    if ($file_r->eof()) {
        break;
    }
    var_dump($datum);
}









