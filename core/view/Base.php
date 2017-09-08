<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/7
 * Time: 20:18
 */

namespace core\view;

class Base{

    //模板文件属性变量
    protected $file;
    //模板参数属性变量
    protected $vars=[];

    //加载模板方法
    public function make(){
        $this->file="../app/".MODULE."/view/".CONTROLLER."/".ACTION.".php";
        return $this;
    }
    //分配模板方法
    public function with($var){
        $this->vars=$var;
        return $this;
    }
    public function __toString()
    {
//      通过extract方法处理当前模板的参数
        extract($this->vars);
        include $this->file;
        return '';
    }

}

