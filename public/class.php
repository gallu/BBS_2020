<?php  // class.php
// http://dev2.m-fr.net/XXXX/BBS/class.php

abstract class Hoge {
    public function t() {
        echo "Hoge#t() <br>\n";
    }
    public function ttt() {
        echo "Hoge#ttt() <br>\n";
    }
    //
    abstract public function at();
}
class Foo extends Hoge {
    public function ttt() {
        echo "Foo#ttt() <br>\n";
    }
    public function at() {
        echo "Foo#at() <br>\n";
    }
}
/*
$obj = new Hoge();
//var_dump($obj);
$obj->t();
*/
//
$obj_2 = new Foo();
var_dump($obj_2);
$obj_2->t();
$obj_2->ttt();
$obj_2->at();

