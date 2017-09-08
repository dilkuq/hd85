<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/8
 * Time: 11:00
 */
namespace core;
class Controller{
    //跳转页面属性
    protected $url='window.history.back()';

    //跳转页面方法
    public function setRedirect($url=''){
        if($url==''){
            $this->url='window.history.back()';
        }else{
            $this->url="location.href='{$url}'";
        }
        return $this;
    }
    //消息提示方法
    public function message($msg){
        include './view/message.php';
    }




}