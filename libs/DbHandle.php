<?php  // DbHandle.php

class DbHandle {
    //
    public static function get() {
        //
        static $dbh = null;
        if (null === $dbh) {
            // 接続情報の作成
            $user = 'bbs_2020';
            $pass = 'bbs_2020';
            $database = 'bbs_2020';
            $host = 'localhost';
            //
            $dsn = "mysql:host={$host};dbname={$database};charset=utf8mb4";
            //var_dump($dsn);
            $options = [
                PDO::ATTR_EMULATE_PREPARES => false,  // 静的プレースホルダにする
                PDO::MYSQL_ATTR_MULTI_STATEMENTS => false, // 複文を禁止する
                //PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // SQLのエラーを例外で処理する
            ];

            //
            try {
                $dbh = new PDO($dsn, $user, $pass, $options);
            } catch (\PDOException $e) {
                echo "DB接続エラー \n";
                echo $e->getMessage();
                exit;
            }
        }
        return $dbh;
    }
}
