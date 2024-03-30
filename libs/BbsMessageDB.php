<?php  // BbsMessageDB.php

require_once(BASEPATH . '/libs/BbsMessage.php');

class BbsMessageDB extends BbsMessage {
    //
    public function delete($delete_key) {
//var_dump($delete_key, $this->getData()['bbs_id']); exit;
//var_dump($delete_key, $this->getData()['delete_key']);

        // delete_keyが正しいかどうか確認をする
        if (hash_equals($this->getData()['delete_key'], $delete_key)) {
            //echo 'keyは正しい';
            /* 削除用のSQL文を流す */
            $dbh = DbHandle::get();

            // プリペアドステートメントを作成する
            $sql = 'DELETE FROM bbs WHERE bbs_id = :bbs_id;';
            $pre = $dbh->prepare($sql);

            // 値をバインドする
            $pre->bindValue(':bbs_id', $this->getData()['bbs_id']);

            // 実行する
            $r = $pre->execute();
//var_dump($r);
        }
    }

    // DBから「1 IDのデータ」を取得
    public static function get($id) {
        //
        $dbh = DbHandle::get();

        // プリペアドステートメント作って
        $sql = 'SELECT * FROM bbs WHERE bbs_id = :bbs_id;';
        $pre = $dbh->prepare($sql);
        // BINDして
        $pre->bindValue(':bbs_id', $id);
        // 実行
        $r = $pre->execute();
        $datum = $pre->fetch( \PDO::FETCH_ASSOC );
        // みつからなかった時の処理
        if (false === $datum) {
            return null;
        }
//var_dump($datum);

        // インスタンス作ってデータを差し込む
        $obj = new static();
        foreach($datum as $k => $v) {
            $obj->$k = $v;
        }
       
        //
        return $obj;
    }

    // DBからの読み込み
    public static function getList() {
        //
        $dbh = DbHandle::get();
        
        // プリペアドステートメント作って
        $sql = 'SELECT * FROM bbs ORDER BY created_at DESC;';
        $pre = $dbh->prepare($sql);

        // BINDして
        // XXX 今回はなし
        
        // 実行
        $r = $pre->execute();
        $data = $pre->fetchAll( \PDO::FETCH_ASSOC );
//var_dump($data);
        //
        return $data;
    }
    // DBに書き込み
    protected function writeData() {
        // データ取得して
        $datum = $this->getData();
//var_dump($datum); exit;

        //
        $dbh = DbHandle::get();

        // プリペアドステートメント作って
        $sql = 'INSERT INTO bbs(title, name, body, delete_key, created_at, user_agent, client_ip)
                         VALUES(:title, :name, :body, :delete_key, :created_at, :user_agent, :client_ip);';
        $pre = $dbh->prepare($sql);

        // BINDして
        foreach($datum as $k => $v) {
            $pre->bindValue(":{$k}", $v);
        }

        // 実行
        $r = $pre->execute();
//var_dump($r); exit;
    }
}










