<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/8
 * Time: 10:04
 */
namespace app\admin\controller;

use core\view\View;

class Index extends Common {
    public function index(){
        return View::make();
    }
}
