<?php
namespace app\forum\controller;
use app\index\model\User_info;
use think\Controller;
use think\Db;
use think\db\exception\DataNotFoundException;
use think\db\exception\ModelNotFoundException;
use think\exception\DbException;
use think\Request;

class Forum extends Controller{
public $userModel;
public $forumModel;
public $discussModel;
    /**
     * Forum constructor.
     * @param Request|null $request
     */
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->userModel = db('User_info');
        $this->forumModel = db('Forum_log');
        $this->discussModel = db('Discuss');
    }


    /**
     * 论坛首页
     * @return mixed
     */
    public function index(){

        if (request()->isPost()){
            $search = input('post.search');
            $list= $this->forumModel->where('delete',0)->where('title','>',$search)->paginate(10);
            $page = $list->render();
//            cache('produce',$list,10);
//            cache('page',$page,10);
//        }
            //分页显示输出
            $this->assign('list',$list);
            $this->assign('page',$page);// 把分页数据赋值给模板变量list
//        var_dump($list);exit();
            $this->assign('forum',$this->forumModel->select());
        }else{
        $list= $this->forumModel->where('delete',0)->paginate(10);
        $page = $list->render();
//            cache('produce',$list,10);
//            cache('page',$page,10);
//        }
        //分页显示输出
        $this->assign('list',$list);
        $this->assign('page',$page);// 把分页数据赋值给模板变量list
//        var_dump($list);exit();
        $this->assign('forum',$this->forumModel->select());}
        return $this->fetch();
    }


    /**用户注册
     * @return mixed
     */
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
            //进行规则验证
            $result = $this->validate(
                [
                    'user_name' => $this->userModel->user_name,
                    'user_pwd' => $this->userModel->user_pwd,
                    'repassword' => $repwd,
                    'user_mail' => $this->userModel->user_mail,
                ],
                [
                    'user_name' => 'require|max:10',
                    'user_pwd' => 'require|length:6,16|alphaNum',
                    'repassword' => 'require|confirm:user_pwd',
                    'user_mail' => 'require'
                ]);
            if (true !== $result){
                $this->error($result);
            }
            $s = $this->salt();
            $this->userModel->user_pwd = md5($this->userModel->user_pwd.$s);
            $this->userModel->salt = $s;
            // 获取表单上传文件 例如上传了001.jpg
            $file = request()->file('user_pic');
            // 移动到框架应用根目录/public/uploads/ 目录下
            if($file){
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/forum/user_pic/img');
                if($info){
                    // 成功上传后 获取上传信息
                    // 输出 jpg
                    echo $info->getExtension();
                    // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                    echo $info->getSaveName();
                    // 输出 42a79759f284b767dfcb2a0197904287.jpg
                    echo $info->getFilename();

                    $img = './uploads/forum/user_pic/img/'.$info->getSaveName();
                    $image = \think\Image::open($img);
                    // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.png
                    $thumb = './uploads/forum/user_pic/thumb/'.$info->getFileName();
                    $image->thumb(150, 150)->save($thumb);
//                    $this->sceneryModel->file = $img;
                    $this->userModel->user_pic = $img;
                    $this->userModel->thumb = $thumb;
//                    var_dump($this->userModel->sex);exit();
                    $data = [
                        'user_name' => $this->userModel->user_name,
                        'user_pwd' => $this->userModel->user_pwd,
                        'salt' => $this->userModel->salt,
                        'sex' => $this->userModel->sex,
                        'user_pic' => $this->userModel->user_pic,
                        'thumb' => $this->userModel->thumb,
                        'user_mail' => $this->userModel->user_mail,
                        'sign' => $this->userModel->sign
                    ];
                    if ($this->userModel->insert($data)){
                        $this->success('提交成功','forum/forum/index','','2');
                    }else{
                        $this->error('提交失败','','','2');
                    }
                }else{
                    // 上传失败获取错误信息
                    echo $file->getError();
                }
            }else{
                $thumb = './uploads/forum/user_pic/default/default.jpg';
                $this->userModel->user_pic = $thumb;
                $this->userModel->thumb = $thumb;
                $data = [
                    'user_name' => $this->userModel->user_name,
                    'user_pwd' => $this->userModel->user_pwd,
                    'salt' => $this->userModel->salt,
                    'sex' => $this->userModel->sex,
                    'user_pic' => $this->userModel->user_pic,
                    'thumb' => $this->userModel->thumb,
                    'user_mail' => $this->userModel->user_mail,
                    'sign' => $this->userModel->sign
                ];
                if ($this->userModel->insert($data)){
                    $this->success('提交成功','forum/forum/index','','2');
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


    /**
     * 密码加盐
     * @return bool|string
     */
    public function salt(){
        $str = 'asdjflsl[k23u42]fjsa#$@!kdjfjlk90';
        $salt = substr(str_shuffle($str),0,8);
        return $salt;
    }


    /**
     * 用户登录
     * @return mixed
     * @throws DataNotFoundException
     * @throws ModelNotFoundException
     * @throws DbException
     */
    public function login(){
        if (request()->isPost()){
            $user_name = input('post.user_name');
            $user_pwd = input('post.user_pwd');
            $userinfo = $this->userModel->where(array('user_name'=>$user_name))->where('delete',0)->where('ban',0)->find();
            if (!$userinfo){
                $this->error('用户名错误或用户名不存在或用户名已被禁止','','','2');
            }
            if ($userinfo['user_pwd'] !== md5($user_pwd.$userinfo['salt'])){
                $this->error('密码错误','','','2');
            }
            session('user_id',$userinfo['id']);
            session('user_name',$userinfo['user_name']);
            $this->success('登录成功','forum/forum/index','','2');
        }
        return $this->fetch();
    }
    //登出
    public function logout(){
        session('user_id',null);
        session('user_name',null);
        $this->redirect('forum/forum/index');
    }
    //个人中心
    public function personal_center(){
        if (request()->isPost()){
            $this->userModel->user_mail = input('user_mail');
            $this->userModel->sex = input('sex');
            $this->userModel->sign = input('sign');
            $file = request()->file('user_pic');
            // 移动到框架应用根目录/public/uploads/ 目录下
            if($file){
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/forum/user_pic/img');
                if($info){
                    // 成功上传后 获取上传信息
                    // 输出 jpg
                    echo $info->getExtension();
                    // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                    echo $info->getSaveName();
                    // 输出 42a79759f284b767dfcb2a0197904287.jpg
                    echo $info->getFilename();

                    $img = './uploads/forum/user_pic/img/'.$info->getSaveName();
                    $image = \think\Image::open($img);
                    // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.png
                    $thumb = './uploads/forum/user_pic/thumb/'.$info->getFileName();
                    $image->thumb(150, 150)->save($thumb);
//                    $this->sceneryModel->file = $img;
                    $this->userModel->user_pic = $img;
                    $this->userModel->thumb = $thumb;
//                    var_dump($this->userModel->sex);exit();
                    $data = [
                        'sex' => $this->userModel->sex,
                        'user_pic' => $this->userModel->user_pic,
                        'thumb' => $this->userModel->thumb,
                        'sign' => $this->userModel->sign,
                        'user_mail' => $this->userModel->user_mail
                    ];
                    if ($this->userModel->where('id',session('user_id'))->update($data)){
                        $this->success('提交成功','forum/forum/personal_center','','2');
                    }else{
                        $this->error('提交失败','','','2');
                    }
                }else{
                    // 上传失败获取错误信息
                    echo $file->getError();
                }
            }else{
                //编辑时，使用之前默认图片
                $_file = $this->userModel->where('id',session('user_id'))->field('user_pic')->find();
                $_thumb = $this->userModel->where('id',session('user_id'))->field('thumb')->find();
                $this->userModel->user_pic = $_file['user_pic'];
                $this->userModel->thumb = $_thumb['thumb'];
                $data = [
                    'sex' => $this->userModel->sex,
                    'user_pic' => $this->userModel->user_pic,
                    'thumb' => $this->userModel->thumb,
                    'sign' => $this->userModel->sign,
                    'user_mail' => $this->userModel->user_mail
                ];
//                var_dump($data);exit();
                $this->userModel->where('id',session('user_id'))->update($data);
                $this->success('更新成功','forum/forum/personal_center','','2');
            }
            $this->assign('pc', $this->userModel->where('id', session('user_id'))->find());
        }
        $id = session('user_id');
        $this->assign('pc', $this->userModel->where('id', $id)->find());
        return $this->fetch();
    }

    //发布问题
    public function que_add(){
        if (request()->isPost()){
            $thumb = array();
            $this->forumModel->user_name = session('user_name');
            $thumb = $this->userModel->where('user_name',$this->forumModel->user_name)->find();
            $this->forumModel->user_pic = $thumb['thumb'];
//            var_dump($this->forumModel->user_pic);exit();
//            var_dump($this->forumModel->user_name);exit();
            $this->forumModel->title = input('post.title');
//            var_dump($this->owlModel->where('title',$this->owlModel->title)->field('title')->find());exit();
            $this->forumModel->article = input('post.article');
            $this->forumModel->date = date('Y-m-d H:i:s');
//            var_dump($this->forumModel->date);exit();
            // 获取表单上传文件 例如上传了001.jpg
//            var_dump($file);exit();
                        $data = [
                            'user_name' => $this->forumModel->user_name,
                            'user_pic' => $this->forumModel->user_pic,
                            'title' => $this->forumModel->title,
                            'article' => $this->forumModel->article,
                            'date' => $this->forumModel->date,
                            'num' => 0,
                        ];
                    if ($this->forumModel->insert($data)){
                        $this->success('发布成功','forum/forum/index','','2');
                    }else{
                        $this->error('提交失败','','','2');
                    }
                }
        return $this->fetch();
    }

    //问题详情
    public function detail(){
//        var_dump(input('id'));exit();
        if (request()->isPost()){
            $id = input('post.id');
            $forum_info = $this->forumModel->where('id',$id)->find();
            $this->assign('info', $forum_info);

            $list= $this->discussModel->where('forumlog_id',$id)->where('delete',0)->paginate(5);
            $page = $list->render();
            $this->assign('list',$list);
            $this->assign('page',$page);// 把分页数据赋值给模板变量list
            $this->assign('count',$this->discussModel->where('forumlog_id',$id)->where('delete',0)->count());
        }else{
            $forum_info = $this->forumModel->where('id',session('log_id'))->where('delete',0)->find();
            $log_info = $this->discussModel->where('forumlog_id',session('log_id'))->where('delete',0)->select();

            $list = $this->discussModel->where('forumlog_id',session('log_id'))->where('delete',0)->paginate(5);
            $page = $list->render();
            $this->assign('list',$list);
            $this->assign('page',$page);
            $this->assign('count',$this->discussModel->where('forumlog_id',session('log_id'))->where('delete',0)->count());
            $this->assign('l_info',$log_info);
            $this->assign('info', $forum_info);
            return $this->fetch();
        }
        return $this->fetch();
    }

    //评论
    public function discuss(){
        if (request()->isPost()){
            $this->discussModel->forumlog_id = input('log_id');
            $this->discussModel->user_id = session('user_id');
            $f = array();
            $f = $this->userModel->where('id',$this->discussModel->user_id)->where('delete',0)->find();
            $this->discussModel->user_name = $f['user_name'];
            $this->discussModel->user_pic = $f['user_pic'];
            $this->discussModel->information = input('dis');
            $this->discussModel->date = date('Y-m-d H:i:s');
            $data = [
                'forumlog_id' => $this->discussModel->forumlog_id,
                'user_id' => $this->discussModel->user_id,
                'user_name' => $this->discussModel->user_name,
                'user_pic' => $this->discussModel->user_pic,
                'information' => $this->discussModel->information,
                'date' => $this->discussModel->date,
            ];
            if ($this->discussModel->insert($data)){
                $this->forumModel->num = $this->discussModel->where('forumlog_id',$this->discussModel->forumlog_id)->where('delete',0)->count('id');
                $data_f = [
                    'num' => $this->forumModel->num,
                ];
                $this->forumModel->where('id',$this->discussModel->forumlog_id)->where('delete',0)->update($data_f);
                session('log_id', $this->discussModel->forumlog_id);
                $this->success('提交成功','forum/forum/detail','','2');
            }else{
                $this->error('提交失败','','','2');
            }
        }
        $this->redirect('forum/forum/detail');
    }

    //个人中心——修改密码
    public function change_password(){
        if (request()->isPost()){
            //接收前端表单提交的数据
            $this->userModel->old_password = input('post.old_password');
            $this->userModel->new_password = input('post.new_password');
            $repwd = input('post.re_new_password');
            $arr = array();
            $arr = $this->userModel->where('id', session('user_id'))->find();
            if ($arr['user_pwd'] != md5($this->userModel->old_password.$arr['salt'])){
                $this->error('原密码不正确','forum/forum/change_password','','2');
            }
            //进行规则验证
            $result = $this->validate(
                [
                    'user_pwd' => $this->userModel->new_password,
                    'repassword' => $repwd,
                ],
                [
                    'user_pwd' => 'require|length:6,16',
                    'repassword' => 'require|confirm:user_pwd',
                ]);
            if (true !== $result){
                $this->error($result);
            }
            $data = [
                'user_pwd' => $this->userModel->new_password
            ];
            $this->userModel->where('id',session('user_id'))->update($data);
            $this->success('密码修改成功','','','2');
        }
        $this->assign('change', $this->userModel->where('id', session('user_id'))->find());
        return $this->fetch();
    }

    //我的帖子
    public function log_management(){
        $list= $this->forumModel->where('user_name',session('user_name'))->where('delete',0)->paginate(2);
        $page = $list->render();
        //分页显示输出
        $this->assign('list',$list);
        $this->assign('page',$page);// 把分页数据赋值给模板变量list
//        var_dump($list);exit();
        $this->assign('log_m',$this->userModel->where('id',session('user_id'))->find());
        return $this->fetch();
    }

    //我的帖子——删除
    public function log_management_del(){
        $id = input('id');
        $data = [
            'delete' => 1
        ];
        if ($this->forumModel->where('id',$id)->update($data)){
            $this->success("删除成功",'forum/forum/log_management','',2);
        }else{
            $this->error("删除失败",'','',2);
        }
    }
}