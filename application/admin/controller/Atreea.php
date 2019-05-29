<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;

class Atreea extends Controller{
    public $owlModel;
    public $nwlModel;
    public $frModel;
    public $otModel;
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->owlModel = db('Owl');
        $this->nwlModel = db('Nwl');
        $this->frModel = db('Residence');
        $this->otModel = db('Oldtrees');
    }

    //老西湖
    public function old_west_l(){
        $list= $this->owlModel->paginate(2);
        $page = $list->render();
//            cache('produce',$list,10);
//            cache('page',$page,10);
//        }
        //分页显示输出
        $this->assign('list',$list);
        $this->assign('page',$page);// 把分页数据赋值给模板变量list
//        var_dump($list);exit();
        $this->assign('opera',$this->owlModel->select());
        $this->assign('count',$this->owlModel->count());
        return $this->fetch();
    }

    public function old_west_lake_add(){
        if (request()->isPost()){
            $this->owlModel->title = input('post.title');
//            var_dump($this->owlModel->where('title',$this->owlModel->title)->field('title')->find());exit();
            if (is_null($this->owlModel->where('title',$this->owlModel->title)->field('title')->find()))
                {$this->owlModel->flag = 1;}
            else
                {$this->owlModel->flag = 0;}
            $this->owlModel->information = input('post.information');
            // 获取表单上传文件 例如上传了001.jpg
            $file = request()->file('img');
//            var_dump($file);exit();
            // 移动到框架应用根目录/public/uploads/ 目录下
            if($file){
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/old_west_lake/img');
                if($info){
                    // 成功上传后 获取上传信息
                    // 输出 jpg
                    echo $info->getExtension();
                    // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                    echo $info->getSaveName();
                    // 输出 42a79759f284b767dfcb2a0197904287.jpg
                    echo $info->getFilename();

                    $img = './uploads/old_west_lake/img/'.$info->getSaveName();
                    $image = \think\Image::open($img);
                    // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.png
                    $thumb = './uploads/old_west_lake/thumb/'.$info->getFileName();
                    $image->thumb(150, 150)->save($thumb);
                    $this->owlModel->img = $img;
                    $this->owlModel->thumb = $thumb;
                    if($this->owlModel->flag == 1){
                    $data = [
                        'title' => $this->owlModel->title,
                        'information' => $this->owlModel->information,
                        'img' => $this->owlModel->img,
                        'thumb' => $this->owlModel->thumb,
                        'flag' => $this->owlModel->flag
                    ];}else
                    {
                        $data = [
                            'title' => null,
                            'information' => $this->owlModel->information,
                            'img' => $this->owlModel->img,
                            'thumb' => $this->owlModel->thumb,
                            'flag' => $this->owlModel->flag
                        ];
                    }
                    if ($this->owlModel->insert($data)){
                        $this->success('提交成功','admin/atreea/old_west_l','','2');
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

    public function old_west_lake_edit(){
        if (request()->isPost()) {
            $id = input('id');
            $a = array();
            $a = $this->owlModel->where('id',$id)->field('flag')->find();
//            var_dump($a['flag']);exit();
            $this->owlModel->title = input('post.title');
            $this->owlModel->information = input('post.information');
            // 获取表单上传文件 例如上传了001.jpg
            $file = request()->file('img');
            // 移动到框架应用根目录/public/uploads/ 目录下
            if($file){
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/old_west_lake/img');
                if($info){
                    // 成功上传后 获取上传信息
                    // 输出 jpg
                    echo $info->getExtension();
                    // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                    echo $info->getSaveName();
                    // 输出 42a79759f284b767dfcb2a0197904287.jpg
                    echo $info->getFilename();
                    $img = './uploads/old_west_lake/img/'.$info->getSaveName();
//                    var_dump(\think\Image::open($img));exit();
                    $image = \think\Image::open($img);
                    // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.png
                    $thumb = './uploads/old_west_lake/thumb/'.$info->getFileName();
                    $image->thumb(150, 150)->save($thumb);
                    $this->owlModel->img = $img;
                    $this->owlModel->thumb = $thumb;
                    if ($a['flag'] == 1){
                    $data = [
                        'title' => $this->owlModel->title,
                        'information' => $this->owlModel->information,
                        'img' => $this->owlModel->img,
                        'thumb' => $this->owlModel->thumb
                    ];}else
                        {
                            $data = [
                                'title' => null ,
                                'information' => $this->owlModel->information,
                                'img' => $this->owlModel->img,
                                'thumb' => $this->owlModel->thumb
                            ];
                        }
                    if ($this->owlModel->where('id',$id)->update($data)){
                        $this->success('提交成功','admin/atreea/old_west_l','','2');
                    }else{
                        $this->error('提交失败','','','2');
                    }
                }else{
                    // 上传失败获取错误信息
                    echo $file->getError();
                }
            }else{
                //编辑时，使用之前默认图片
                $_file = $this->owlModel->where('id',$id)->field('img')->find();
                $_thumb = $this->owlModel->where('id',$id)->field('thumb')->find();
                if (!(is_null($_file) && is_null($_thumb))){
                    if ($a['flag'] == 1){
                    $data = [
                        'title' => $this->owlModel->title,
                        'information' => $this->owlModel->information,
                        'img' => $_file['img'],
                        'thumb' => $_thumb['thumb'],
                    ];}else
                    {
                        $data = [
                            'title' => null,
                            'information' => $this->owlModel->information,
                            'img' => $_file['img'],
                            'thumb' => $_thumb['thumb'],
                        ];
                    }
                    $this->owlModel->where('id',$id)->update($data);
                    $this->success('提交成功','admin/atreea/old_west_l','','2');
                }else{
//                        var_dump($this->sceneryModel->where('id',$id)->update($data));exit();
                    $this->error('提交失败','','','2');
                }
            }
        }
        $this->assign('owl',$this->owlModel->find(input('id')));
        return $this->fetch();
    }

    public function old_west_lake_del(){
        if ($this->owlModel->delete(input('id'))){
            $this->success("删除成功",'admin/atreea/old_west_l','',2);
        }else{
            $this->error("删除失败",'','',2);
        }
    }

    //新西湖
    public function new_west_lake(){
        $list= $this->nwlModel->paginate(2);
        $page = $list->render();
//            cache('produce',$list,10);
//            cache('page',$page,10);
//        }
        //分页显示输出
        $this->assign('list',$list);
        $this->assign('page',$page);// 把分页数据赋值给模板变量list
//        var_dump($list);exit();
        $this->assign('opera',$this->nwlModel->select());
        $this->assign('count',$this->nwlModel->count());
        return $this->fetch();
    }

    public function new_west_lake_add(){
        if (request()->isPost()){
            $this->nwlModel->title = input('post.title');
//            var_dump($this->owlModel->where('title',$this->owlModel->title)->field('title')->find());exit();
            if (is_null($this->nwlModel->where('title',$this->nwlModel->title)->field('title')->find()))
            {$this->nwlModel->flag = 1;}
            else
            {$this->nwlModel->flag = 0;}
            $this->nwlModel->information = input('post.information');
            // 获取表单上传文件 例如上传了001.jpg
            $file = request()->file('img');
//            var_dump($file);exit();
            // 移动到框架应用根目录/public/uploads/ 目录下
            if($file){
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/new_west_lake/img');
                if($info){
                    // 成功上传后 获取上传信息
                    // 输出 jpg
                    echo $info->getExtension();
                    // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                    echo $info->getSaveName();
                    // 输出 42a79759f284b767dfcb2a0197904287.jpg
                    echo $info->getFilename();

                    $img = './uploads/new_west_lake/img/'.$info->getSaveName();
                    $image = \think\Image::open($img);
                    // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.png
                    $thumb = './uploads/new_west_lake/thumb/'.$info->getFileName();
                    $image->thumb(150, 150)->save($thumb);
                    $this->nwlModel->img = $img;
                    $this->nwlModel->thumb = $thumb;
                    if($this->nwlModel->flag == 1){
                        $data = [
                            'title' => $this->nwlModel->title,
                            'information' => $this->nwlModel->information,
                            'img' => $this->nwlModel->img,
                            'thumb' => $this->nwlModel->thumb,
                            'flag' => $this->nwlModel->flag
                        ];}else
                    {
                        $data = [
                            'title' => null,
                            'information' => $this->nwlModel->information,
                            'img' => $this->nwlModel->img,
                            'thumb' => $this->nwlModel->thumb,
                            'flag' => $this->nwlModel->flag
                        ];
                    }
                    if ($this->nwlModel->insert($data)){
                        $this->success('提交成功','admin/atreea/new_west_lake','','2');
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

    public function new_west_lake_edit(){
        if (request()->isPost()) {
            $id = input('id');
            $a = array();
            $a = $this->nwlModel->where('id',$id)->field('flag')->find();
//            var_dump($a['flag']);exit();
            $this->nwlModel->title = input('post.title');
            $this->nwlModel->information = input('post.information');
            // 获取表单上传文件 例如上传了001.jpg
            $file = request()->file('img');
            // 移动到框架应用根目录/public/uploads/ 目录下
            if($file){
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/new_west_lake/img');
                if($info){
                    // 成功上传后 获取上传信息
                    // 输出 jpg
                    echo $info->getExtension();
                    // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                    echo $info->getSaveName();
                    // 输出 42a79759f284b767dfcb2a0197904287.jpg
                    echo $info->getFilename();
                    $img = './uploads/new_west_lake/img/'.$info->getSaveName();
//                    var_dump(\think\Image::open($img));exit();
                    $image = \think\Image::open($img);
                    // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.png
                    $thumb = './uploads/new_west_lake/thumb/'.$info->getFileName();
                    $image->thumb(150, 150)->save($thumb);
                    $this->nwlModel->img = $img;
                    $this->nwlModel->thumb = $thumb;
                    if ($a['flag'] == 1){
                        $data = [
                            'title' => $this->nwlModel->title,
                            'information' => $this->nwlModel->information,
                            'img' => $this->nwlModel->img,
                            'thumb' => $this->nwlModel->thumb
                        ];}else
                    {
                        $data = [
                            'title' => null ,
                            'information' => $this->nwlModel->information,
                            'img' => $this->nwlModel->img,
                            'thumb' => $this->nwlModel->thumb
                        ];
                    }
                    if ($this->nwlModel->where('id',$id)->update($data)){
                        $this->success('提交成功','admin/atreea/new_west_lake','','2');
                    }else{
                        $this->error('提交失败','','','2');
                    }
                }else{
                    // 上传失败获取错误信息
                    echo $file->getError();
                }
            }else{
                //编辑时，使用之前默认图片
                $_file = $this->nwlModel->where('id',$id)->field('img')->find();
                $_thumb = $this->nwlModel->where('id',$id)->field('thumb')->find();
                if (!(is_null($_file) && is_null($_thumb))){
                    if ($a['flag'] == 1){
                        $data = [
                            'title' => $this->nwlModel->title,
                            'information' => $this->nwlModel->information,
                            'img' => $_file['img'],
                            'thumb' => $_thumb['thumb'],
                        ];}else
                    {
                        $data = [
                            'title' => null,
                            'information' => $this->nwlModel->information,
                            'img' => $_file['img'],
                            'thumb' => $_thumb['thumb'],
                        ];
                    }
                    $this->nwlModel->where('id',$id)->update($data);
                    $this->success('提交成功','admin/atreea/new_west_lake','','2');
                }else{
//                        var_dump($this->sceneryModel->where('id',$id)->update($data));exit();
                    $this->error('提交失败','','','2');
                }
            }
        }
        $this->assign('nwl',$this->nwlModel->find(input('id')));
        return $this->fetch();
    }

    public function new_west_lake_del(){
        if ($this->nwlModel->delete(input('id'))){
            $this->success("删除成功",'admin/atreea/new_west_lake','',2);
        }else{
            $this->error("删除失败",'','',2);
        }
    }

    //故居
    public function former_residence(){
        $list= $this->frModel->paginate(2);
        $page = $list->render();
//            cache('produce',$list,10);
//            cache('page',$page,10);
//        }
        //分页显示输出
        $this->assign('list',$list);
        $this->assign('page',$page);// 把分页数据赋值给模板变量list
//        var_dump($list);exit();
        $this->assign('opera',$this->frModel->select());
        $this->assign('count',$this->frModel->count());
        return $this->fetch();
    }

    public function former_residence_add(){
        if (request()->isPost()){
            $this->frModel->title = input('post.title');
//            var_dump($this->owlModel->where('title',$this->owlModel->title)->field('title')->find());exit();
            if (is_null($this->frModel->where('title',$this->frModel->title)->field('title')->find()))
            {$this->frModel->flag = 1;}
            else
            {$this->frModel->flag = 0;}
            $this->frModel->information = input('post.information');
            // 获取表单上传文件 例如上传了001.jpg
            $file = request()->file('img');
//            var_dump($file);exit();
            // 移动到框架应用根目录/public/uploads/ 目录下
            if($file){
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/Former_Residence/img');
                if($info){
                    // 成功上传后 获取上传信息
                    // 输出 jpg
                    echo $info->getExtension();
                    // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                    echo $info->getSaveName();
                    // 输出 42a79759f284b767dfcb2a0197904287.jpg
                    echo $info->getFilename();

                    $img = './uploads/Former_Residence/img/'.$info->getSaveName();
                    $image = \think\Image::open($img);
                    // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.png
                    $thumb = './uploads/Former_Residence/thumb/'.$info->getFileName();
                    $image->thumb(150, 150)->save($thumb);
                    $this->frModel->img = $img;
                    $this->frModel->thumb = $thumb;
                    if($this->frModel->flag == 1){
                        $data = [
                            'title' => $this->frModel->title,
                            'information' => $this->frModel->information,
                            'img' => $this->frModel->img,
                            'thumb' => $this->frModel->thumb,
                            'flag' => $this->frModel->flag
                        ];}else
                    {
                        $data = [
                            'title' => null,
                            'information' => $this->frModel->information,
                            'img' => $this->frModel->img,
                            'thumb' => $this->frModel->thumb,
                            'flag' => $this->frModel->flag
                        ];
                    }
                    if ($this->frModel->insert($data)){
                        $this->success('提交成功','admin/atreea/former_residence','','2');
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

    public function former_residence_edit(){
        if (request()->isPost()) {
            $id = input('id');
            $a = array();
            $a = $this->frModel->where('id',$id)->field('flag')->find();
//            var_dump($a['flag']);exit();
            $this->frModel->title = input('post.title');
            $this->frModel->information = input('post.information');
            // 获取表单上传文件 例如上传了001.jpg
            $file = request()->file('img');
            // 移动到框架应用根目录/public/uploads/ 目录下
            if($file){
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/Former_Residence/img');
                if($info){
                    // 成功上传后 获取上传信息
                    // 输出 jpg
                    echo $info->getExtension();
                    // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                    echo $info->getSaveName();
                    // 输出 42a79759f284b767dfcb2a0197904287.jpg
                    echo $info->getFilename();
                    $img = './uploads/Former_Residence/img/'.$info->getSaveName();
//                    var_dump(\think\Image::open($img));exit();
                    $image = \think\Image::open($img);
                    // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.png
                    $thumb = './uploads/Former_Residence/thumb/'.$info->getFileName();
                    $image->thumb(150, 150)->save($thumb);
                    $this->frModel->img = $img;
                    $this->frModel->thumb = $thumb;
                    if ($a['flag'] == 1){
                        $data = [
                            'title' => $this->frModel->title,
                            'information' => $this->frModel->information,
                            'img' => $this->frModel->img,
                            'thumb' => $this->frModel->thumb
                        ];}else
                    {
                        $data = [
                            'title' => null ,
                            'information' => $this->frModel->information,
                            'img' => $this->frModel->img,
                            'thumb' => $this->frModel->thumb
                        ];
                    }
                    if ($this->frModel->where('id',$id)->update($data)){
                        $this->success('提交成功','admin/atreea/former_residence','','2');
                    }else{
                        $this->error('提交失败','','','2');
                    }
                }else{
                    // 上传失败获取错误信息
                    echo $file->getError();
                }
            }else{
                //编辑时，使用之前默认图片
                $_file = $this->frModel->where('id',$id)->field('img')->find();
                $_thumb = $this->frModel->where('id',$id)->field('thumb')->find();
                if (!(is_null($_file) && is_null($_thumb))){
                    if ($a['flag'] == 1){
                        $data = [
                            'title' => $this->frModel->title,
                            'information' => $this->frModel->information,
                            'img' => $_file['img'],
                            'thumb' => $_thumb['thumb'],
                        ];}else
                    {
                        $data = [
                            'title' => null,
                            'information' => $this->frModel->information,
                            'img' => $_file['img'],
                            'thumb' => $_thumb['thumb'],
                        ];
                    }
                    $this->frModel->where('id',$id)->update($data);
                    $this->success('提交成功','admin/atreea/former_residence','','2');
                }else{
//                        var_dump($this->sceneryModel->where('id',$id)->update($data));exit();
                    $this->error('提交失败','','','2');
                }
            }
        }
        $this->assign('fr',$this->frModel->find(input('id')));
        return $this->fetch();
    }

    public function former_residence_del(){
        if ($this->frModel->delete(input('id'))){
            $this->success("删除成功",'admin/atreea/former_residence','',2);
        }else{
            $this->error("删除失败",'','',2);
        }
    }

    //古树
    public function oldtrees(){
        $list= $this->otModel->paginate(2);
        $page = $list->render();
//            cache('produce',$list,10);
//            cache('page',$page,10);
//        }
        //分页显示输出
        $this->assign('list',$list);
        $this->assign('page',$page);// 把分页数据赋值给模板变量list
//        var_dump($list);exit();
        $this->assign('opera',$this->otModel->select());
        $this->assign('count',$this->otModel->count());
        return $this->fetch();
    }

    public function oldtrees_add(){
        if (request()->isPost()){
            $this->otModel->title = input('post.title');
//            var_dump($this->owlModel->where('title',$this->owlModel->title)->field('title')->find());exit();
            if (is_null($this->otModel->where('title',$this->otModel->title)->field('title')->find()))
            {$this->otModel->flag = 1;}
            else
            {$this->otModel->flag = 0;}
            $this->otModel->information = input('post.information');
            // 获取表单上传文件 例如上传了001.jpg
            $file = request()->file('img');
//            var_dump($file);exit();
            // 移动到框架应用根目录/public/uploads/ 目录下
            if($file){
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/old_trees/img');
                if($info){
                    // 成功上传后 获取上传信息
                    // 输出 jpg
                    echo $info->getExtension();
                    // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                    echo $info->getSaveName();
                    // 输出 42a79759f284b767dfcb2a0197904287.jpg
                    echo $info->getFilename();

                    $img = './uploads/old_trees/img/'.$info->getSaveName();
                    $image = \think\Image::open($img);
                    // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.png
                    $thumb = './uploads/old_trees/thumb/'.$info->getFileName();
                    $image->thumb(150, 150)->save($thumb);
                    $this->otModel->img = $img;
                    $this->otModel->thumb = $thumb;
                    if($this->otModel->flag == 1){
                        $data = [
                            'title' => $this->otModel->title,
                            'information' => $this->otModel->information,
                            'img' => $this->otModel->img,
                            'thumb' => $this->otModel->thumb,
                            'flag' => $this->otModel->flag
                        ];}else
                    {
                        $data = [
                            'title' => null,
                            'information' => $this->otModel->information,
                            'img' => $this->otModel->img,
                            'thumb' => $this->otModel->thumb,
                            'flag' => $this->otModel->flag
                        ];
                    }
                    if ($this->otModel->insert($data)){
                        $this->success('提交成功','admin/atreea/oldtrees','','2');
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

    public function oldtrees_edit(){
        if (request()->isPost()) {
            $id = input('id');
            $a = array();
            $a = $this->otModel->where('id',$id)->field('flag')->find();
//            var_dump($a['flag']);exit();
            $this->otModel->title = input('post.title');
            $this->otModel->information = input('post.information');
            // 获取表单上传文件 例如上传了001.jpg
            $file = request()->file('img');
            // 移动到框架应用根目录/public/uploads/ 目录下
            if($file){
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/old_trees/img');
                if($info){
                    // 成功上传后 获取上传信息
                    // 输出 jpg
                    echo $info->getExtension();
                    // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                    echo $info->getSaveName();
                    // 输出 42a79759f284b767dfcb2a0197904287.jpg
                    echo $info->getFilename();
                    $img = './uploads/old_trees/img/'.$info->getSaveName();
//                    var_dump(\think\Image::open($img));exit();
                    $image = \think\Image::open($img);
                    // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.png
                    $thumb = './uploads/old_trees/thumb/'.$info->getFileName();
                    $image->thumb(150, 150)->save($thumb);
                    $this->otModel->img = $img;
                    $this->otModel->thumb = $thumb;
                    if ($a['flag'] == 1){
                        $data = [
                            'title' => $this->otModel->title,
                            'information' => $this->otModel->information,
                            'img' => $this->otModel->img,
                            'thumb' => $this->otModel->thumb
                        ];}else
                    {
                        $data = [
                            'title' => null ,
                            'information' => $this->otModel->information,
                            'img' => $this->otModel->img,
                            'thumb' => $this->otModel->thumb
                        ];
                    }
                    if ($this->otModel->where('id',$id)->update($data)){
                        $this->success('提交成功','admin/atreea/oldtrees','','2');
                    }else{
                        $this->error('提交失败','','','2');
                    }
                }else{
                    // 上传失败获取错误信息
                    echo $file->getError();
                }
            }else{
                //编辑时，使用之前默认图片
                $_file = $this->otModel->where('id',$id)->field('img')->find();
                $_thumb = $this->otModel->where('id',$id)->field('thumb')->find();
                if (!(is_null($_file) && is_null($_thumb))){
                    if ($a['flag'] == 1){
                        $data = [
                            'title' => $this->otModel->title,
                            'information' => $this->otModel->information,
                            'img' => $_file['img'],
                            'thumb' => $_thumb['thumb'],
                        ];}else
                    {
                        $data = [
                            'title' => null,
                            'information' => $this->otModel->information,
                            'img' => $_file['img'],
                            'thumb' => $_thumb['thumb'],
                        ];
                    }
                    $this->otModel->where('id',$id)->update($data);
                    $this->success('提交成功','admin/atreea/oldtrees','','2');
                }else{
//                        var_dump($this->sceneryModel->where('id',$id)->update($data));exit();
                    $this->error('提交失败','','','2');
                }
            }
        }
        $this->assign('ot',$this->otModel->find(input('id')));
        return $this->fetch();
    }

    public function oldtrees_del(){
        if ($this->otModel->delete(input('id'))){
            $this->success("删除成功",'admin/atreea/oldtrees','',2);
        }else{
            $this->error("删除失败",'','',2);
        }
    }
}