<?php
namespace app\admin\model;
use think\Model;
class User extends Model{
    public $_validate = array(
        array('username','3,9','用户名过长或过短','1','length',3),
        array('email','email','邮箱格式错误','1','',3),
        array('password','3,18','密码过短或过长','1','length',3),
        array('repwd','password','两次密码不一致','1','confirm',3),
        array('username','','用户名已存在','1','unique',3),
    );
}
?>