<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/8
 * Time: 9:37
 */
namespace app\index\controller;
use think\captcha\Captcha;
use think\Controller;
use think\Request;

class Login extends  Controller
{
    public function index()
    {

        return $this->fetch();
        //return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';
    }

    /**
     * 删除
     */
    public function delete(){
        $id=Request::instance()->param('id');
        $rs=db('user')->where(array('id'=>$id))->delete();
        if ($rs){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }
    /**
     * 修改处理
     */
    public function update_hendel(){
            $id=Request::instance()->param('id');
            $file=request()->file('user_head');
            $info=$file->move(ROOT_PATH .'public'.DS .'uploads');
            if ($info){
                // $info->getFilename() 表示保存的文件名称  $info->getExtension() 表示文件的后缀
                $data['user_head'] =$info->getSaveName();
            }else{
                echo $file->getError();
            }
            $data['user_name']=Request::instance()->post('user_name');
            $data['user_email']=Request::instance()->post('user_email');
            $rs=db('user')->where(array('id'=>$id))->update($data);
            if($rs){
                $this->success('修改成功',url('userlist'));
            }else{
                $this->error('修改失败');
            }
    }

    /**
     * 修改
     */
    public function update(){
        $id=Request::instance()->param('id');
        $userfind=db('user')->where(array('id'=>$id))->find();
        $this->assign('userfind',$userfind);
        return $this->fetch();
    }

    public function userlist(){
        $list=db('user')->order('id desc')->select();
        $this->assign('list',$list);
        return $this->fetch();
    }

    public function login(){
        $captcha=Request::instance()->post('captcha');
        $catche=new Captcha();
        if (!$catche->check($captcha)){
            $this->error('验证码输入不正确，请重输');
        }

        $data['user_name']=Request::instance()->post('username');
        $data['user_password']=Request::instance()->post('password');
        if (!$data['user_name']&&$data['user_password']){
            $this->error('登录成功');
        }
        $list=db('user')->where(array('user_name'=>$data['user_name'],'user_password'=>$data['user_password']))->find();
        if ($list){
                session('id',$list['id']);
                session('name',$data['user_name']);
                $this->success('登录成功',url('userlist'));
        }else{
            $this->error('登录失败');
        }
    }

    /**
     * 注册处理
     */
    public function register(){
        //$post=Request::instance()->post();
        $data['user_name']=Request::instance()->post('username');
        $data['user_email']=Request::instance()->post('email');
        $data['user_password']=Request::instance()->post('password');
        $password=Request::instance()->post('passwords');
        if ($password!=$data['user_password']){
            $list['status']=500;
            $list['data']=array('data'=>'两次密码不一致，请重输');
            echo json_encode($list,JSON_UNESCAPED_UNICODE);
            die;
        }
        if (db('user')->insert($data)){
            $list['status']=200;
            $list['data']=array('data'=>'注册成功');
            echo json_encode($list,JSON_UNESCAPED_UNICODE);
            die;
        }
    }
}