<?php
namespace app\admin\controller;
use app\admin\model\Scenery;
use think\Controller;
use think\Request;

class Main extends Controller{
    public $sceneryModel;
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->sceneryModel = db('Scenery');
    }

    public function scenery(){
//        var_dump($articleModel->select());
        $list = cache('scenery');
//        if (!$list){
//            exit();
            $list = $this->sceneryModel->paginate(2);
//            cache('scenery',$list,10);
//        }

        //分页显示输出
        $this->assign('list',$list);
        $this->assign('page',$list->render());// 把分页数据赋值给模板变量list

        $this->assign('scenery',$this->sceneryModel->select());
        return $this->fetch();
    }

    public function sceneryadd(){
        if (request()->isPost()){
            $this->sceneryModel->title = input('post.title');
            $result = $this->validate(
                [
                    'title' => $this->sceneryModel->title,
                ],
                [
                    'title' => 'require'
                ]);
            // 获取表单上传文件 例如上传了001.jpg
            $file = request()->file('file');
            // 移动到框架应用根目录/public/uploads/ 目录下
            if($file){
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/sce');
                if($info){
                    // 成功上传后 获取上传信息
                    // 输出 jpg
                    echo $info->getExtension();
                    // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                    echo $info->getSaveName();
                    // 输出 42a79759f284b767dfcb2a0197904287.jpg
                    echo $info->getFilename();

                    $img = './uploads/sce/'.$info->getSaveName();
                    $image = \think\Image::open($img);
                    // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.png
                    $thumb = './uploads/sce/thumb/'.$info->getFileName();
                    $image->thumb(150, 150)->save($thumb);
                    $this->sceneryModel->file = $img;
                    $this->sceneryModel->thumb = $thumb;
                    if (true!== $result){
                        $this->error($result);
                    }
                    $data = [
                        'title' => $this->sceneryModel->title,
                        'file' => $this->sceneryModel->file,
                        'thumb' => $this->sceneryModel->thumb
                    ];
                    if ($this->sceneryModel->insert($data)){
                        $this->success('提交成功','admin/main/scenery','','2');
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

    public function scenerydel(){
        if ($this->sceneryModel->delete(input('id'))){
            $this->success("删除成功",'admin/main/scenery','',2);
        }else{
            $this->error("删除失败",'','',2);
        }
    }

    public function sceneryedit(){
        if (request()->isPost()) {
            $id = input('id');
            $this->sceneryModel->title = input('post.title');

            // 获取表单上传文件 例如上传了001.jpg
            $file = request()->file('file');
            // 移动到框架应用根目录/public/uploads/ 目录下
            if($file){
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/sce');
                if($info){
                    // 成功上传后 获取上传信息
                    // 输出 jpg
                    echo $info->getExtension();
                    // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                    echo $info->getSaveName();
                    // 输出 42a79759f284b767dfcb2a0197904287.jpg
                    echo $info->getFilename();

                    $img = './uploads/sce/'.$info->getSaveName();
                    $image = \think\Image::open($img);
                    // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.png
                    $thumb = './uploads/sce/thumb/'.$info->getFileName();
                    $image->thumb(150, 150)->save($thumb);
                    $this->sceneryModel->file = $img;
                    $this->sceneryModel->thumb = $thumb;
                    $data = [
                        'title' => $this->sceneryModel->title,
                        'file' => $this->sceneryModel->file,
                        'thumb' => $this->sceneryModel->thumb
                    ];
                    if ($this->sceneryModel->where('id',$id)->update($data)){
                        $this->success('提交成功','admin/main/scenery','','2');
                    }else{
                        $this->error('提交失败','','','2');
                    }
                }else{
                    // 上传失败获取错误信息
                    echo $file->getError();
                }
            }else{
                //编辑时，使用之前默认图片
                    $_file = $this->sceneryModel->where('id',$id)->field('file')->find();
                    $_thumb = $this->sceneryModel->where('id',$id)->field('thumb')->find();
                    if (!(is_null($_file) && is_null($_thumb))){
                        $data = [
                            'title' => $this->sceneryModel->title,
                            'file' => $_file['file'],
                            'thumb' => $_thumb['thumb'],
                        ];
                        $this->sceneryModel->where('id',$id)->update($data);
                        $this->success('提交成功','admin/main/scenery','','2');
                    }else{
//                        var_dump($this->sceneryModel->where('id',$id)->update($data));exit();
                        $this->error('提交失败','','','2');
                    }
            }
        }
        $this->assign('sce',$this->sceneryModel->find(input('id')));
        return $this->fetch();
    }
}
