<?php
namespace app\admin\controller;
use think\Controller;
class Index extends Controller
{

    public function index()
    {


        if (request()->isPost()){
            $username = input('post.username');
            $pwd = input('post.password');

            $userModel = db('User');
            $userinfo = $userModel->where(array('username'=>$username))->find();
            if (!$userinfo){
                $this->error('用户名错误','',2);
            }
            if ($userinfo['password'] == md5($pwd.$userinfo['salt'])){
                $this->error('密码错误','',2);
            }else{
                cookie('userid',$userinfo['id']);
                cookie('username',$username);
                $this->success('登录成功','',2);
            }
        }


         return $this->fetch();
    }

    public function reg(){
        return $this->fetch();
    }

}
