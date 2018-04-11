<?php
namespace app\admin\controller;
use think\Controller;
use think\Session;
use think\auth\Auth;

class Base extends Controller
{
//这是个简单的权限验证，如果登录成功设置了响应的session值，则可以访问所有目录

  public function _initialize() //初始化函数，执行任何其他函数时都会调用
   {
    $s=Session::get('username');
    // echo $s;
   	//echo Session::has('username');
   	if($s=='null')  //检查是否正常登录
   	{
   		//非正常登录打回登录界面
   		$this->error('孩子，你还没登录啊！','admin/login/login');

   	}
   	//这里写auth权限验证
   	$auth=new Auth();
   	//获取已登录的用户id
   	$id=Session::get('userid');
   	//获取当前的控制器和方法结合的字符串
   	$con=request()->controller()."/".request()->action();
   	//设置不需要权限就可以访问的方法
   	$auth_arr=['Admin/login','Index/index','Admin/xgpassword','Admin/edi'];
    //进行判断，如果是超级管理员就不验证了
    if($id != 1)
    {
        if(!in_array($con, $auth_arr))
        {
        	if(!$auth->check($con,$id))
    	      {
    		     $this->error("你没有权限",'index/index');
    	       }

        }

    	
    }
  

   }
}