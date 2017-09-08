<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/7
 * Time: 20:18
 */
namespace core\view;

class View{
    //当调用当前类的方法找不到的时候,会自动触发 调用方式为 "->"
    public function __call($name, $arguments)
    {
        return self::par($name,$arguments);
    }

    //当调用当前类的方法找不到的时候,会自动触发 调用方式为 "::"
    public static function __callStatic($name, $arguments)
    {
        return self::par($name,$arguments);
    }

    public static function par($a,$b){
        return call_user_func_array([new Base(),$a],$b);
    }

}