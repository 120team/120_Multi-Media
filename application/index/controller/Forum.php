<?php
namespace app\index\controller;
use app\index\model\User_info;
use think\Controller;
use think\Request;

class Forum extends Controller{
public $userModel;
public $forumModel;
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->userModel = db('User_info');
        $this->forumModel = db('Forum_log');
    }

    //论坛首页
    public function index(){
        return $this->fetch();
    }

    //用户注册
    public function register(){
        //实例化User
        if (Request()->isPost()){

            //接收前端表单提交的数据
            $this->userModel->user_name = input('post.user_name');
            $this->userModel->user_pwd = input('post.user_pwd');
            $repwd = input('post.repwd');
            $this->userModel->sex = input('post.sex');
            $this->userModel->user_mail = input('post.user_mail');
            $this->userModel->sign = input('post.sign');
//            $identifying = input('post.identifying code');
            //进行规则验证
//            $result = $this->validate(
//                [
////                    'username' => $userModel->username,
//                    'user_pwd' => $this->userModel->user_pwd,
//                    'repassword' => $repwd,
//                ],
//                [
////                    'username' => 'require|max:10|unique:user',
//                    'user_pwd' => 'require|length:6,16|alphaNum',
//                    'repassword' => 'require|confirm:user_pwd',
//                ]);
//            if (true !== $result){
//                $this->error($result);
//            }
            $s = $this->salt();
            $this->userModel->user_pwd = md5($this->userModel->user_pwd.$s);
            $this->userModel->salt = $s;
            // 获取表单上传文件 例如上传了001.jpg
            $file = request()->file('user_pic');
            // 移动到框架应用根目录/public/uploads/ 目录下
            if($file){
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/user_pic');
                if($info){
                    // 成功上传后 获取上传信息
                    // 输出 jpg
                    echo $info->getExtension();
                    // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                    echo $info->getSaveName();
                    // 输出 42a79759f284b767dfcb2a0197904287.jpg
                    echo $info->getFilename();

                    $img = './uploads/user_pic/'.$info->getSaveName();
                    $image = \think\Image::open($img);
                    // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.png
                    $thumb = './uploads/user_pic/thumb/'.$info->getFileName();
                    $image->thumb(150, 150)->save($thumb);
//                    $this->sceneryModel->file = $img;
                    $this->userModel->user_pic = $thumb;
//                    var_dump($this->userModel->sex);exit();
                    $data = [
                        'user_name' => $this->userModel->user_name,
                        'user_pwd' => $this->userModel->user_pwd,
                        'salt' => $this->userModel->salt,
                        'sex' => $this->userModel->sex,
                        'user_pic' => $this->userModel->user_pic,
                        'user_mail' => $this->userModel->user_mail,
                        'sign' => $this->userModel->sign
                    ];
                    if ($this->userModel->insert($data)){
                        $this->success('提交成功','','','2');
                    }else{
                        $this->error('提交失败','','','2');
                    }
                }else{
                    // 上传失败获取错误信息
                    echo $file->getError();
                }
            }else{
                $thumb = './uploads/user_pic/thumb/b3fad1f3b14f861e7e28c0d22c9c8cc5.jpg';
                $this->userModel->user_pic = $thumb;
                $data = [
                    'user_name' => $this->userModel->user_name,
                    'user_pwd' => $this->userModel->user_pwd,
                    'salt' => $this->userModel->salt,
                    'sex' => $this->userModel->sex,
                    'user_pic' => $this->userModel->user_pic,
                    'user_mail' => $this->userModel->user_mail,
                    'sign' => $this->userModel->sign
                ];
                if ($this->userModel->insert($data)){
                    $this->success('提交成功','','','2');
                }else{
                    $this->error('提交失败','','','2');
                }
            }

            //写入数据库
//                if ($this->userModel->save()){
//                    return $this->success('注册成功');
//                }else{
//                    return $this->error('注册失败');
//                }
        }
        return $this->fetch();
    }

    //密码加盐
    public function salt(){
        $str = 'asdjflsl[k23u42]fjsa#$@!kdjfjlk90';
        $salt = substr(str_shuffle($str),0,8);
        return $salt;
    }

    //用户登录
    public function login(){
        if (request()->isPost()){
            $user_name = input('post.user_name');
            $user_pwd = input('post.user_pwd');
            $userinfo = $this->userModel->where(array('user_name'=>$user_name))->find();
            if (!$userinfo){
                $this->error('用户名错误','','','2');
            }
            if ($userinfo['user_pwd'] !== md5($user_pwd.$userinfo['salt'])){
                $this->error('密码错误','','','2');
            }else{
                cookie('user_id',$userinfo['user_pwd']);
                cookie('user_name',$userinfo['user_name']);
                $_cookie = encryption($userinfo['user_name'].$userinfo['user_pwd'].config('_cookie'));
                cookie('key',$_cookie);
                $this->success('登录成功','','','2');
            }
        }
        return $this->fetch();
    }
}