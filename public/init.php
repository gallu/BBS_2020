<?php  // init.php
//
ob_start();

// 基準になるディレクトリを把握
define('BASEPATH', realpath(__DIR__ . '/..'));
//var_dump( BASEPATH );

// BBSクラスの取り込み
//require_once(BASEPATH . '/libs/BbsMessageFile.php');
require_once(BASEPATH . '/libs/BbsMessageDB.php');

// DBハンドル用
require_once(BASEPATH . '/libs/DbHandle.php');

