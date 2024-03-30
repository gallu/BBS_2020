<?php  // static_val.php
// http://dev2.m-fr.net/XXXX/BBS/static_val.php

class Hoge {
    public static function t() {
        $i = 0;
        $i ++;
        echo "i is {$i} <br>\n";
    }
    public static function ttt() {
        static $i = 0;
        $i ++;
        echo "static i is {$i} <br>\n";
    }
}

//
Hoge::t();
Hoge::t();
Hoge::t();
//
Hoge::ttt();
Hoge::ttt();
Hoge::ttt();



