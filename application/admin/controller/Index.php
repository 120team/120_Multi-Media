<?php
namespace app\admin\controller;

use think\Controller;
use think\db\exception\DataNotFoundException;
use think\db\exception\ModelNotFoundException;
use think\exception\DbException;


class Index extends Controller
{
    /**
     * 首页
     * @return mixed
     */
    public function index(){
        return $this->fetch();
    }


    /**
     * 用户登录
     * @return mixed
     * @throws DataNotFoundException
     * @throws ModelNotFoundException
     * @throws DbException
     */
    public function login()
    {
//        echo chk();exit();
        if (request()->isPost()){
            $username = input('post.username');
            $pwd = input('post.password');
            $userModel = db('User');
            $userinfo = $userModel->where(array('username'=>$username))->find();
            if (!$userinfo){
                $this->error('用户名错误','','','2');
            }
            if ($userinfo['password'] !== md5($pwd.$userinfo['salt'])){
                $this->error('密码错误','','','2');
            }else{
                cookie('userid',$userinfo['password']);
                cookie('username',$userinfo['username']);
                $_cookie = encryption($userinfo['username'].$userinfo['password'].config('_cookie'));
                cookie('key',$_cookie);
                $this->redirect('admin\index\index',302);
            }
        }
        return $this->fetch();
    }


    /**
     * 退出登录
     * @return mixed
     */
    public function logout(){
        cookie('userid',null);
        cookie('username',null);
        cookie('key',null);
        return $this->fetch('login');
    }


    //清除缓存
//    public function Clear_Cachep(){
//        cache('produce',null);
//        $this->redirect('admin\custom\produce',302);
//    }
//
//    public function Clear_Caches(){
//        cache('scenery',null);
//        $this->redirect('admin\main\scenery',302);
//    }
}
