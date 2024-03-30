<?php  // BbsMessageFile.php

require_once(BASEPATH . '/libs/BbsMessage.php');

class BbsMessageFile extends BbsMessage {
    //
    const DATA_FILE_NAME = BASEPATH . '/data/bbs.csv';

    // ファイルからの読み込み
    public static function getList() {
        //
        $data = [];
        $file_r = new SplFileObject(static::DATA_FILE_NAME, 'r');
        while($datum = $file_r->fgetcsv()) {
            if ($file_r->eof()) {
                break;
            }
            $datum['key'] = $file_r->key() + 1; // 1 startで行数
            $data[] = $datum;
        }
        // 配列を逆順にする
        $data = array_reverse($data);
        //
        return $data;
    }
    // ファイルに書き込み
    protected function writeData() {
        // ファイルに書き込み
        $file = new SplFileObject(static::DATA_FILE_NAME, 'a+'); // XXX
        $file->fputcsv($this->getData());
    }
}
