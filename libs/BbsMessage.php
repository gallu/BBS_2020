<?php  // BbsMessage.php
/**
 * 1インスタンス(オブジェクト)が「BBSの1つのメッセージ」を意味するクラス
 */
 
abstract class BbsMessage {
    //
    abstract public static function getList();
    abstract protected function writeData();

    // 「外部からnew」が出来ないようにする
    protected function __construct() {
    }

    //
    public function __set($name, $value) {
        //var_dump($name, $value); exit;
        $properties = $this::getProperties();
        if (false === isset($properties[$name])) {
            throw new \Exception("{$name}とか、ンな変数名、無いよ？");
        }
        // else
        $this->data[$name] = $value;
    }
    //
    public static function getErrorMessages() {
        return static::$error_messages;
    }
    //
    public function getData() {
        return $this->data;
    }

    //
    public static function write() {
        $obj = static::createFromForm();
        $obj->writeData();
    }

    protected static function createFromForm() {
        //
        $obj = new static();
        //
        foreach(static::getProperties() as $p => $v) {
            if (0 === $v) {
                continue;
            }
            $obj->data[$p] = strval($_POST[$p]  ??  '');
            if ('' === $obj->data[$p]) {
                static::$error_messages[] = "{$p}は必須項目です";
            }
        }
        $obj->data['created_at'] = date('Y/m/d H:i:s');
        $obj->data['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
        $obj->data['client_ip'] = $_SERVER['REMOTE_ADDR'];
        // エラーなら例外ぶん投げる
        if ([] !== static::$error_messages) {
            throw new \Exception('');
        }
        // else
        return $obj;
    }

    //
    protected static function getProperties() {
        return [
            'title'      => 1,
            'name'       => 1,
            'body'       => 1,
            'delete_key' => 1,
            //
            'bbs_id'     => 0,
            'created_at' => 0,
            'user_agent' => 0,
            'client_ip'  => 0, 
        ];
    }
//
private $data = [];
private static $error_messages = [];
}
 
