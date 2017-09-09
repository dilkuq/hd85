<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/8
 * Time: 19:22
 */

namespace app\admin\controller;
use core\Controller;
use system\model\Grade as g;
use core\view\View;

class Grade extends Common {
    //加载班级列表方法
    public function lists(){
        //获取grade表中的所有班级数据
        $data=g::get();
        return View::make()->with(compact('data'));
    }

    //添加方法
    public function post(){
        if($_POST){
            $data=g::where("gname='{$_POST["gname"]}'")->get();
            if($data){
                return $this->setRedirect('index.php?s=admin/grade/post')->message('" '.$_POST["gname"].' " ,'.'该班级已存在！');
            }
            $sql = "insert into grade set gname ='{$_POST['gname']}'";
            $result = g::exec($sql);
            return $this->setRedirect('index.php?s=admin/grade/lists')->message('" '.$_POST["gname"].' " '.'班级名称添加成功');
        }

        return View::make();
    }

    //删除方法
    public function delete(){
        $id = $_GET['id'];
        //组合sql语句
        $sql = "delete from grade where id = {$id}";
        //执行sql语句
        $result = g::exec($sql);
        if($result){
            return $this->setRedirect('index.php?s=admin/grade/lists')->message('删除数据成功');
        }else{
            return $this->setRedirect('index.php?s=admin/grade/lists')->message('删除数据失败');
        }
    }

    public function edit(){
        //获取当前get参数中id所对应班级数据
        $id = $_GET['id'];
        $data = g::findArray($id);

        if($_POST){
            $data = g::where("gname = '{$_POST["gname"]}' and id != {$id}")->get();
            if($data){
                return $this->message('该班级名称已存在!');
            }
            //组合修改数据的sql
            $sql = "update grade set gname = '{$_POST["gname"]}' where id = {$id}";
            $result = g::exec($sql);
            return $this->setRedirect('index.php?s=admin/grade/lists')->message('修改班级数据成功');
        }
        //将数据$data分配到模板
        return View::make()->with(compact('data'));
    }




}