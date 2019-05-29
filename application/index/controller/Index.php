<?php
namespace app\index\controller;
use think\Controller;
use think\Request;

class Index extends Controller
{
    public $operaModel;
    public $owlModel;
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->operaModel = db('Opera');
        $this->owlModel = db('Owl');
    }

    //前台首页
    public function index()
    {
        return $this->fetch();
    }

    //民俗风情
    public function folk_customs(){
//        $list= $operaModel->paginate();
//        $this->assign('list',$list);
        $this->assign('opera',$this->operaModel->select());
        return $this->fetch();
    }

    //古树建筑
    public function ancient_tree_architecture(){
        $this->assign('owl',$this->owlModel->select());
        return $this->fetch();
    }

    //名人传记
    public function biography(){
        return $this->fetch();
    }
}
