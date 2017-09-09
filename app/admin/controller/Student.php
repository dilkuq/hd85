<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/9
 * Time: 9:27
 */

namespace app\admin\controller;
use core\view\View;
use system\model\Student as stu;

class Student extends Common{
    //列表方法
    public function lists(){
        $data=stu::get();
        return View::make()->with(compact('data'));
    }
    public function post(){
        if($_POST){
            $data = stu::where("name = '{$_POST["name"]}'")->get();
            if($data){
                return $this->message('该学生名称已存在！');
            }
            $sql="insert into student (name,sex,birthday,grade,introduction)values('".$_POST['name']."','".$_POST['sex']."','".$_POST['birthday']."','".$_POST['grade']."','".$_POST['introduction']."')";
            $result = stu::exec($sql);
            return $this->setRedirect('index.php?s=admin/student/lists')->message('"'.$_POST['name'].'"'.'添加成功');
        }
        return View::make()->with(compact('data'));
    }

    //编辑方法
    public function edit(){
        $id = $_GET['id'];
        $data = stu::findArray($id);

        if($_POST){
            $data = stu::where("name = '{$_POST["name"]}' and id != {$id}")->get();
            if($data){
                return $this->message('该班级名称已存在!');
            }
            $sql = "update student set name='{$_POST["name"]}','{$_POST[\"sex\"]}','{$_POST[\"grade\"]}','{$_POST[\"birthday\"]}','{$_POST[\"introduction\"]}',  where id = {$id}";
            $result = stu::exec($sql);
            return $this->setRedirect('index.php?s=admin/grade/lists')->message('修改班级数据成功');
        }

        return View::make()->with(compact('data'));
    }

    //删除方法
    public function delete(){
        $id = $_GET['id'];
        $sql = "delete from student where id = {$id}";
        $result = stu::exec($sql);
        if($result){
            return $this->setRedirect('index.php?s=admin/student/lists')->message('删除数据成功');
        }else{
            return $this->setRedirect('index.php?s=admin/student/lists')->message('删除数据失败');
        }
    }




}