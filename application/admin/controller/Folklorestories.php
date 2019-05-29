<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;

class Folklorestories extends Controller{
    public $userModel;
    public $logModel;
    public $disModel;
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->userModel = db('User_info');
        $this->logModel = db('Forum_log');
        $this->disModel = db('Discuss');
    }
    //用户管理
    public function user_management(){
        $list= $this->userModel->where('delete',0)->paginate(5);
        $page = $list->render();
//            cache('produce',$list,10);
//            cache('page',$page,10);
//        }
        //分页显示输出
        $this->assign('list',$list);
        $this->assign('page',$page);// 把分页数据赋值给模板变量list
//        var_dump($list);exit();
        $this->assign('user_info',$this->userModel->where('delete',0)->select());
//        var_dump($this->assign('user_info',$this->userModel->where('delete',0)->select()));exit();
        $this->assign('count',$this->userModel->where('delete',0)->count());
        return $this->fetch();
    }

    public function user_ban(){
        $arr = $this->userModel->where('id',input('id'))->find();
        if ($arr['ban'] == 0){
            $this->userModel->ban = 1;
        }else{
            $this->userModel->ban = 0;
        }
        $data=[
            'ban' => $this->userModel->ban
        ];
        if ($this->userModel->where('id',input('id'))->update($data)){
            if ($this->userModel->ban == 1){
            $this->success('禁用成功','admin/folklorestories/user_management','','2');}else{
                $this->success('解禁成功','admin/folklorestories/user_management','','2');
            }
        }else{
            $this->error('禁用失败','admin/folklorestories/user_management','','2');
        }
    }

    public function user_del(){
        $this->userModel->delete = 1;
        $data = [
            'delete' => $this->userModel->delete
        ];
        if ($this->userModel->where('id',input('id'))->update($data)){
            $this->success('删除成功','admin/folklorestories/user_management','','2');
        }
    }

    public function user_log(){
        $list= $this->logModel->where('delete',0)->paginate(5);
        $page = $list->render();
//            cache('produce',$list,10);
//            cache('page',$page,10);
//        }
        //分页显示输出
        $this->assign('list',$list);
        $this->assign('page',$page);// 把分页数据赋值给模板变量list
//        var_dump($list);exit();
        $this->assign('user_info',$this->userModel->where('delete',0)->select());
//        var_dump($this->assign('user_info',$this->userModel->where('delete',0)->select()));exit();
        $this->assign('count',$this->logModel->where('delete',0)->count());
        return $this->fetch();
    }

    public function log_del(){
        $this->logModel->delete = 1;
        $data = [
            'delete' => $this->logModel->delete
        ];
        if ($this->logModel->where('id',input('id'))->update($data)){
            $this->success('删除成功','admin/folklorestories/user_log','','2');
        }
    }

    public function discuss(){
        $list= $this->disModel->where('delete',0)->paginate(5);
        $page = $list->render();
//            cache('produce',$list,10);
//            cache('page',$page,10);
//        }
        //分页显示输出
        $this->assign('list',$list);
        $this->assign('page',$page);// 把分页数据赋值给模板变量list
//        var_dump($list);exit();
//        var_dump($this->assign('user_info',$this->userModel->where('delete',0)->select()));exit();
        $this->assign('count',$this->disModel->where('delete',0)->count());
        return $this->fetch();
    }

    public function discuss_del(){
        $this->disModel->delete = 1;
        $data = [
            'delete' => $this->disModel->delete
        ];
        if ($this->disModel->where('id',input('id'))->update($data)){
            $this->success('删除成功','admin/folklorestories/discuss','','2');
        }
    }
}