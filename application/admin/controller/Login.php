<?php
namespace app\admin\controller;
use app\admin\model\User;
use think\Controller;
use think\Db;

class Login extends Controller
{
    //用户注册/添加管理员
//    public function reg(){
//        //实例化User
//        if (Request()->isPost()){
//            $userModel = new User;
//
//            //接收前端表单提交的数据
//            $userModel->username = input('post.username');
//            $userModel->password = input('post.password');
//            $repwd = input('post.repwd');
//            $identifying = input('post.identifying code');
//            //进行规则验证
//            $result = $this->validate(
//                [
//                    'username' => $userModel->username,
//                    'password' => $userModel->password,
//                    'repassword' => $repwd,
//                ],
//                [
//                    'username' => 'require|max:10|unique:user',
//                    'password' => 'require|length:5,18|alphaNum',
//                    'repassword' => 'require|confirm:password',
//                ]);
//            if (true !== $result){
//                $this->error($result);
//            }
//            $s = $this->salt();
//            $userModel->password = md5($userModel->password.$s);
//            $userModel->salt = $s;
//            //写入数据库
//                if ($userModel->save()){
//                    return $this->success('注册成功');
//                }else{
//                    return $this->error('注册失败');
//                }
//        }
//        return $this->fetch();
//    }

    //密码加盐
//    public function salt(){
//        $str = 'asdjflsl[k23u42]fjsa#$@!kdjfjlk90';
//        $salt = substr(str_shuffle($str),0,8);
//        return $salt;
//    }

//用户登录
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
                $this->redirect('admin\Index\index',302);
            }
        }

        return $this->fetch();
    }
}
