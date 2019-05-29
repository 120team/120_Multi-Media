<?php
namespace app\admin\controller;
use think\Controller;
use think\db\exception\DataNotFoundException;
use think\db\exception\ModelNotFoundException;
use think\Exception;
use think\exception\DbException;
use think\exception\PDOException;
use think\Request;


class Custom extends Controller {
    public $operaModel;
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->operaModel = db('Opera');
    }

    /**
     * @return mixed
     * @throws Exception
     * @throws DataNotFoundException
     * @throws ModelNotFoundException
     * @throws DbException
     */
    public function opera(){
//        var_dump($articleModel->select());
//        $list = cache('produce');
//        $page = cache('page');
//        if (!$list){
//            exit();
            $list= $this->operaModel->paginate(2);
            $page = $list->render();
//            cache('produce',$list,10);
//            cache('page',$page,10);
//        }
        //分页显示输出
        $this->assign('list',$list);
        $this->assign('page',$page);// 把分页数据赋值给模板变量list
//        var_dump($list);exit();
        $this->assign('opera',$this->operaModel->select());
        $this->assign('count',$this->operaModel->count());
        return $this->fetch();
    }

    /**
     * @return mixed
     */
    public function opera_add(){
        if (request()->isPost()){
            $this->operaModel->title = input('post.title');
            $this->operaModel->information = input('post.information');
            $result = $this->validate(
                [
                    'title' => $this->operaModel->title,
                ],
                [
                    'title' => 'require'
                ]);
            // 获取表单上传文件 例如上传了001.jpg
            $file = request()->file('img');
//            var_dump($file);exit();
            // 移动到框架应用根目录/public/uploads/ 目录下
            if($file){
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/opera/img');
                if($info){
                    // 成功上传后 获取上传信息
                    // 输出 jpg
                    echo $info->getExtension();
                    // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                    echo $info->getSaveName();
                    // 输出 42a79759f284b767dfcb2a0197904287.jpg
                    echo $info->getFilename();

                    $img = './uploads/opera/img/'.$info->getSaveName();
                    $image = \think\Image::open($img);
                    // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.png
                    $thumb = './uploads/opera/thumb/'.$info->getFileName();
                    $image->thumb(150, 150)->save($thumb);
                    $this->operaModel->img = $img;
                    $this->operaModel->thumb = $thumb;
                    if (true!== $result){
                        $this->error($result);
                    }
                    $data = [
                        'title' => $this->operaModel->title,
                        'information' => $this->operaModel->information,
                        'img' => $this->operaModel->img,
                        'thumb' => $this->operaModel->thumb
                    ];
                    if ($this->operaModel->insert($data)){
                        $this->success('提交成功','admin/custom/opera','','2');
                    }else{
                        $this->error('提交失败','','','2');
                    }
                }else{
                    // 上传失败获取错误信息
                    echo $file->getError();
                }
            }
        }
        return $this->fetch();
    }

    /**
     * @return mixed
     * @throws Exception
     * @throws DataNotFoundException
     * @throws ModelNotFoundException
     * @throws DbException
     * @throws PDOException
     */
    public function opera_edit(){
        if (request()->isPost()) {
            $id = input('id');
            $this->operaModel->title = input('post.title');

            // 获取表单上传文件 例如上传了001.jpg
            $file = request()->file('img');
            // 移动到框架应用根目录/public/uploads/ 目录下
            if($file){
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/opera/img');
                if($info){
                    // 成功上传后 获取上传信息
                    // 输出 jpg
                    echo $info->getExtension();
                    // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                    echo $info->getSaveName();
                    // 输出 42a79759f284b767dfcb2a0197904287.jpg
                    echo $info->getFilename();
                    $img = './uploads/opera/img/'.$info->getSaveName();
//                    var_dump(\think\Image::open($img));exit();
                    $image = \think\Image::open($img);
                    // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.png
                    $thumb = './uploads/opera/thumb/'.$info->getFileName();
                    $image->thumb(150, 150)->save($thumb);
                    $this->operaModel->img = $img;
                    $this->operaModel->thumb = $thumb;
                    $data = [
                        'title' => $this->operaModel->title,
                        'img' => $this->operaModel->img,
                        'thumb' => $this->operaModel->thumb
                    ];
                    if ($this->operaModel->where('id',$id)->update($data)){
                        $this->success('提交成功','admin/custom/opera','','2');
                    }else{
                        $this->error('提交失败','','','2');
                    }
                }else{
                    // 上传失败获取错误信息
                    echo $file->getError();
                }
            }else{
                //编辑时，使用之前默认图片
                $_file = $this->operaModel->where('id',$id)->field('img')->find();
                $_thumb = $this->operaModel->where('id',$id)->field('thumb')->find();
                if (!(is_null($_file) && is_null($_thumb))){
                    $data = [
                        'title' => $this->operaModel->title,
                        'img' => $_file['img'],
                        'thumb' => $_thumb['thumb'],
                    ];
                    $this->operaModel->where('id',$id)->update($data);
                    $this->success('提交成功','admin/custom/opera','','2');
                }else{
//                        var_dump($this->sceneryModel->where('id',$id)->update($data));exit();
                    $this->error('提交失败','','','2');
                }
            }
        }
        $this->assign('opera',$this->operaModel->find(input('id')));
        return $this->fetch();
    }

    /**
     * @throws Exception
     * @throws PDOException
     */
    public function opera_del(){
        if ($this->operaModel->delete(input('id'))){
            $this->success("删除成功",'admin/custom/opera','',2);
        }else{
            $this->error("删除失败",'','',2);
        }
    }
}
