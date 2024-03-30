<?php  // index.php
//  http://dev2.m-fr.net/XXXX/BBS/

require_once( __DIR__ . '/init.php');

// vendorを使うので
require_once( BASEPATH . '/vendor/autoload.php' );

// Twigインスタンスを生成
$path = BASEPATH . '/templates';
$twig = new \Twig\Environment(
    new \Twig\Loader\FilesystemLoader($path)
);
//var_dump($twig);

// 書き込まれた内容の取得
try {
    //
    $data = BbsMessageDB::getList();
} catch (\Throwable $e) {
    // 処理なしでそのまま通す
}
//var_dump($data); exit;

// 書き込まれた内容のcontextへの代入
$context = [
    'data' => $data,
];

// 出力
echo $twig->render('index.twig', $context);
