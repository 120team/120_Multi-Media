<?php
namespace app\index\controller;
use think\Controller;

class forum extends Controller{
    public function index(){
        return $this->fetch();
    }
}