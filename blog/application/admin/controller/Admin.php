<?php
		namespace app\admin\controller;

		use think\Controller;
		use think\Db;
		use app\admin\model\Admin as AdminModel;
		use app\admin\controller\Base;
		class Admin extends Base
		{
		//用户列表页
		public function lst()
		{
		 //获取所有用户
		 //$r=Db::name('admin')->select();
		 //分页显示不需要获取数据，使用model直接获取对应表的数据
		// $list=AdminModel::paginate(3);
		 //使用三表关联查询
		 $list=Db::name('admin')->alias('a')->join('auth_group_access ga','a.id=ga.uid')->join('auth_group g','ga.group_id=g.id')->field('a.id,a.username,g.title')->paginate(3);
		 
		 //传数据
		 $this->assign('result',$list);
		 //加载界面
		 return $this->fetch();

		}
		//添加页
		public function add()
		{
			//查询用户表
			$group=Db::name('auth_group')->select();
			//传数据
			$this->assign('group',$group);
			//判断是否有post的数据传输
			if(request()->isPost())
			{
				//进行数据的包装
				$data=
				[
				    'username'=>input('username'),
					'password'=>input('password')
				];
				$group=input('group');
				//如果用户组未选，直接报错
				if($group==0)
				{
					$this->error("未选择用户组,请重新添加");
				}
				//进行数据的判断
				
				$validate=validate('Admin');
				if(!$validate->scene('add')->check($data))
				{
					$this->error($validate->getError());//错误自动跳转
				}
				else
				{
				//这里注意，我们已经设置好了表前缀，但是使用
				//table()的话是要完整表名的，表前缀无效，所以这里使用name()
				$result=Db::name('admin')->insert($data);
				//获取新增id
				$id = Db::name('admin')->getLastInsID();
				//这里将新增的管理员和用户组信息存入数据库
				$arr=
				[
					'uid'=>$id,
					'group_id'=>$group

				];
				$re=Db::name('auth_group_access')->insert($arr);
				if($result&&$re)
				{
					return $this->success('添加管理员成功','lst');
				}
				else
				{
					return $this->error('管理员插入失败');
				}
				}

			}

			else{
				return $this->fetch();
			}
			
		}
		public function del()
		{
			//删除指定id的用户
			$id=input('param.id');
			if($id!=1)
			{
				$re=Db::name('admin')->delete($id);
			if($re)
			{
				$this->success('成功删除该管理员','admin/admin/lst');
			}
			else
			{
				$this->error('删除失败');

			}

			}
			else
			{
				$this->error('删除失败,该用户为超级管理员！');
			}
			
			

		}
		public function edi()
		{
			$id=input('param.id');
			//$data=Db::name('admin')->select($id);
			//$this->assign('admin',$data);
			$data=Db::name('admin')->alias('a')->join('auth_group_access ga','a.id=ga.uid')->join('auth_group g','ga.group_id=g.id')->field('a.id,a.username,a.password,ga.group_id,g.title')->where('a.id',$id)->select();
			$this->assign('admin',$data);
			$this->assign('id_now',$id);
			//获取所有的用户组
			$array=Db::name('auth_group')->select();
			$this->assign('group',$array);
			//判断是否有post的数据传输
			if(request()->isPost())
			{
				//进行数据的包装
				$data=
				[
					'id'=>$id,
				    'username'=>input('username'),
					'password'=>input('password')
				];
				//获取要更新的用户组类别
				$array=
				[
					'uid'=>$id,
					'group_id'=>input('group')
				];
				
				if($array['group_id']==0)
				{
					$this->error("请选择所属用户组");

				}
				//防止超级管理员误改自己的所属用户组
				if($array['uid']==1&&$array['group_id']!=1)
				{
					$this->error("拒绝此不正确操作！");
				}
			   
				//进行数据的判断
				$validate=validate('Admin');
				if(!$validate->scene('add')->check($data))
				{
					$this->error($validate->getError());//错误自动跳转
				}
				else
				{

                
				//这里注意，我们已经设置好了表前缀，但是使用
				//table()的话是要完整表名的，表前缀无效，所以这里使用name()
				$result=Db::name('admin')->where('id',$id)->update($data);
				//更新用户组表信息
				$re=Db::name('auth_group_access')->where('uid',$id)->update($array);

				 $this->success('更新管理员成功','lst');
				
				}

			}

			else{
				return $this->fetch();
			}
		}
		//登录
		public function login()
		{

				//判断是否有post的数据传输
			if(request()->isPost())
			{
				//获取登录名
				$username=input('username');
				$password=input('password');
				//进行数据的包装
				$data=
				[
				    'username'=>$username,
					'password'=>$password
				];
				//进行数据的判断
				$validate=validate('User');
				if(!$validate->scene('add')->check($data))
				{
					$this->error($validate->getError());//错误自动跳转
				}
				else
				{
				//这里注意，我们已经设置好了表前缀，但是使用
				//table()的话是要完整表名的，表前缀无效，所以这里使用name()
				$result=Db::name('admin')->where('username',$username)->select();
				if($result[0]['password']==$password)
				{
					$this->success('登录成功','lst');

				}
				else
				{
					$this->error('用户名或者密码错误！');
				}
				}

			}

			else{
				return $this->fetch();
			}

		}
		//修改密码
		public function xgpassword()
		{
		 //获取要修改的用户id	
		  $id=input('param.id');
		  //直接重定向到指定修改页面
		  return $this->redirect('edi',['id'=>$id]);
          
		  
		}
		
	}
		
		