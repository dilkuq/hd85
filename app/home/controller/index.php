<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/7
 * Time: 20:10
 */

namespace app\home\controller;
use core\view\view;

class Index{
    public function index(){
        return View::make();
    }
    public function post(){
        echo 'yollash';
    }
}
