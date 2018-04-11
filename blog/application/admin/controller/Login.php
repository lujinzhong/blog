<?php
		namespace app\admin\controller;
		use app\admin\Model\Login  as loginmodel; //引入model
		use think\Controller;
		use think\Db;
		class Login extends Controller
		{

		
		public function login()
		{
		if(request()->isPost()) //判断是否有post数据传入
			{
			//先获取登录的数据
			$info=input('post.');
			//如果没有该用户名，直接die掉
			$userdata=Db::name('admin')->where('username',$info['username'])->select();
			if(empty($userdata))//并没有该用户
			{
				$this->error('并没有该管理员');die;

			}
			else
			{

				$obj=new loginmodel;//实例化模型
				//调用相关函数
				$re=$obj->login($info);
				//根据返回值来判断是否登录成功
				if($re==1)
				{
					//验证验证码是否错误
					$captcha=input('yzm');
					if(empty($captcha))
					{
						$this->error('验证码未输入');die;
					}
					else if(!captcha_check($captcha))
					{
						$this->error('验证码错误！');die;

					}
					else
					{
					  //登录成功设置session

					  session('userid',$userdata[0]['id']);
					  session('username',$userdata[0]['username']);

					   $this->success('登录成功，正在为您跳转..','admin/index/index');

					}
					
				}
				else
				{
					$this->error('用户名或者密码错误');
				}
			}

			}
			else
			{
				//又返回登录界面时清空所有session值,需要重新登录
				session('username','null');
				session('id','null');
				return $this->fetch('login');
			}
		 

		}
	}
		