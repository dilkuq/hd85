<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/8
 * Time: 9:48
 */
namespace app\admin\controller;
use core\Controller;
use core\view\View;
use Gregwar\Captcha\CaptchaBuilder;
use system\model\User as userModel;

class User extends Controller {
    public function login(){
        if($_POST){
            //判断用户名是否存在
            $userInfo=userModel::where("username='{$_POST["username"]}'")->get();
            if(empty($userInfo)){
               return $this->message('用户名不存在');
            }
            //判断用户输入的密码信息是否正确
            if($_POST['password']!=$userInfo[0]['password']){
               return $this->message('密码不正确');
            }
            //判断验证码是否正确
            if($_POST['code'] !=$_SESSION['code']){
                return $this->message('验证码错误');
            }
            //七天免登录
            if(isset($_POST['autologin'])){
                setcookie(session_name(),session_id(),time()+7*24*3600,'/');
            }
            $_SESSION['username']=$_POST['username'];
            $_SESSION['userid']=$userInfo[0]['ID'];
            $this->setRedirect('Index.php?s=admin/index/index')->message('登录成功');
        }

        //加载模板
        return View::make();
    }

    //验证码
    public function code(){
        header('content-type:image/jpg');
        $builder = new CaptchaBuilder;
        $builder->build();
        $_SESSION['code'] = $builder->getPhrase();
        $builder->output();
    }
    //退出登录
    public function loginout(){
        session_unset();
        session_destroy();
        setcookie(session_name(),session_id(),time()-1,'/');
        return $this->setRedirect('Index.php?s=admin/user/login')->message('退出成功');

    }

}
