<?php
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller{
    public function login() {
       $this->display();
        }
        public function captcha(){
            $cfg=array(
        'fontSize'  =>  12,              // 验证码字体大小(px)
        'useCurve'  =>  false,            // 是否画混淆曲线
        'useNoise'  =>  false,            // 是否添加杂点	
        'imageH'    =>  35,               // 验证码图片高度
        'imageW'    =>  80,               // 验证码图片宽度
        'length'    =>  4,               // 验证码位数
        'fontttf'   =>  '4.ttf',              // 验证码字体，不设置随机获取
            );
            
        $verify= new \Think\Verify($cfg);
        $verify->entry();
        }
        
        public function checkLogin(){
            //接收数据
            $post=I('post.');

            //验证验证码
            $verify= new \Think\Verify();
            
            $result=$verify->check($post['captcha']);
           if($result){
               //验证码正确
               $user=M('user');
               //删除验证码元素
               unset($post['captcha']);
               //查询数据表中是否存在输入的用户名密码
              $data= $user->where($post)->find();
              //判断是否存在用户
               if($data){
                   //用户信息持久化
                   session('id',$data[id]);
                   session('username',$data[username]);
                   session('role_id',$data[role_id]);
                   
                   $this->success('登录成功',U('Index/index'),3);
               } else {
                   $this->error('用户名或密码错误');
               }
               
           } else {
              //验证码错误
              $this->error('验证码错误');
    }
            
        }
        public function logout() {
            session(null);
            $this->success('退出成功',U('login'),3);
         
            
        }
}