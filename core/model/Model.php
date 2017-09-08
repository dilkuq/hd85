<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/7
 * Time: 21:52
 */
namespace core\model;

class Model{
    protected static $config;
    //当调用当前类的方法找不到的时候,会自动触发 调用方式为 "->"
    public function __call($name, $arguments)
    {
        return self::mo($name,$arguments);
    }

    //当调用当前类的方法找不到的时候,会自动触发 调用方式为 "::"
    public static function __callStatic($name, $arguments)
    {
        return self::mo($name,$arguments);
    }

    public static function mo($a,$b){
        $callClass = get_called_class();
        $info = explode('\\',$callClass);
        $table = $info[2];
        return call_user_func_array([new Base(self::$config,$table),$a],$b);
    }
    //传递配置项参数方法
    public static function setConfig($config){
        self::$config = $config;
    }

}