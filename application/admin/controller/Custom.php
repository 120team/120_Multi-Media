<?php
namespace app\admin\controller;
use app\admin\model\Article;
use app\admin\model\User;
use think\Controller;
use think\Db;


class Custom extends Controller {
    /**
     * @return mixed
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function produce(){

        $articleModel = db('Article');
//        var_dump($articleModel->select());
//        $list = cache('produce');
//        $page = cache('page');
//        if (!$list){
//            exit();
            $list= $articleModel->paginate(2);
            $page = $list->render();
//            cache('produce',$list,10);
//            cache('page',$page,10);
//        }
        //分页显示输出
        $this->assign('list',$list);
        $this->assign('page',$page);// 把分页数据赋值给模板变量list
//        var_dump($list);exit();
        $this->assign('produce',$articleModel->select());
        $this->assign('count',$articleModel->count());
        return $this->fetch();
    }

    public function produceadd(){
        if (request()->isPost()) {
            $articleModel = db('Article');
            $articleModel->title = input('post.title');
            $articleModel->information = input('post.information');
            $result = $this->validate(
                [
                    'title' => $articleModel->title,
                    'information' => $articleModel->information,
                ],
                [
                    'title' => 'require',
                    'information' => 'require|min:10',
                ]);
            if (true !== $result){
                $this->error($result);
            }
            if (model('Article')->allowField(['title','information'])->save($_POST)){
                $this->success('提交成功','admin/main/scenery','','2');
            }else{
                $this->error('提交失败','','','2');
            }
        }
        return $this->fetch();
    }

    public function produceedit(){
        $articleModel = db('Article');
        if (request()->isPost()) {
            $articleModel = db('Article');
            $id = input('id');
            if ($articleModel->where('id',$id)->update($_POST)){
                $this->success("更新成功",'admin/custom/produce','',2);
            }else{
                $this->error("更新失败",'','',2);
            }
        }
        $this->assign('info',$articleModel->find(input('id')));
        return $this->fetch();
    }

    public function producedel(){
        $articleModel = db('Article');
        if ($articleModel->delete(input('id'))){
            $this->success("删除成功",'admin/custom/produce','',2);
        }else{
            $this->error("删除失败",'','',2);
        }
    }
}
?>