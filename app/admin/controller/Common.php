<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/8
 * Time: 14:12
 */

namespace app\admin\controller;
use core\Controller;

class Common extends Controller{
    public function __construct(){
        if(!isset($_SESSION['username'])){
            return $this->setRedirect('Index.php?s=admin/user/login')->message('非法登陆');
        }
    }
}


