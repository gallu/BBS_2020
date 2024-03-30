<?php // delete.php

//
require_once( __DIR__ . '/init.php');
//var_dump($_POST);

// 削除対象のidを取得
$id = strval($_POST['id'] ?? '');
$delete_key = strval($_POST['delete_key'] ?? '');
if ('' !== $id) {
//var_dump($id); exit;
    // DBから「idに紐付くメッセージ」を取得
    $obj = BbsMessageDB::get($id);
//var_dump($obj); exit;
    if (null !== $obj) {
        // 「DBの中の削除キー」と「postされた削除キー」が一緒なら削除
//var_dump($delete_key); exit;
        $obj->delete($delete_key);
    }
    /* PHP8なら………
    BbsMessageDB::get($id)?->delete( $delete_key );
    */
}
//exit;

// TopPageに移動
header('Location: ./index.php');


