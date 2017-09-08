<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/7
 * Time: 19:14
 */

namespace core;

class Boot{
    public static function run(){
        //开启session
        session_start();
        //初始化框架
        self::apprun();
    }
    //初始化框架方法
    public static function apprun(){
        //通过ges参数中的s参数判断走进哪个控制器
       if(isset($_GET['s'])){
           //explode将字符串转成数组
           $info=explode('/',$_GET['s']);
           //定义模块变量
           $m=$info[0];
           //定义控制器变量
           $c=ucfirst($info[1]);
           //定义方法变量
           $a=$info[2];
       }else{
           //定义模块变量
           $m="home";
           //定义控制器变量
           $c="Index";
           //定义方法变量
           $a="index";
       }
       //定义常量，后面找模板的时候用到
        //定义模块常量
        define('MODULE',$m);
       //定义控制器常量
        define('CONTROLLER',strtolower($c));
        //定义方法常量
        define('ACTION',$a);
        //通过控制器$c的值来执行到对应控制器类，组合所调用的控制器类
        $class="app\\{$m}\controller\\{$c}";
        //实例化控制器类，并调用里面的方法
        echo call_user_func_array([new $class,$a],[]);
    }
}
