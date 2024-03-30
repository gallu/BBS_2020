<?php  // write.php
//
require_once( __DIR__ . '/init.php');

//var_dump($_POST);
try {
    // 書き込む
    BbsMessageDB::write();
} catch (\Throwable $e) {
    // XXX
    echo 'エラーがありました。<br><pre>';
    var_dump(BbsMessageDB::getErrorMessages());
    exit;
}

// index.phpに移動する
header('Location: ./index.php');
