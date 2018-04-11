<?php
		namespace app\admin\controller;

		use think\Controller;
		use think\Db;
		use app\admin\model\Cate as CateModel;
		use app\admin\controller\Base;
		class Cate extends Base
		{
		//用户列表页
		public function lst()
		{
		 //获取所有用户
		 //$r=Db::name('admin')->select();
		 //分页显示不需要获取数据，使用model直接获取对应表的数据
		 $list=CateModel::paginate(3);
		 //传数据
		 $this->assign('result',$list);
		 //加载界面
		 return $this->fetch();

		}
		//添加页
		public function add()
		{
			//判断是否有post的数据传输
			if(request()->isPost())
			{
				//进行数据的包装
				$data=
				[
				    'catename'=>input('catename')
					
				];
				//进行数据的判断
				$validate=validate('Cate');
				if(!$validate->scene('add')->check($data))
				{
					$this->error($validate->getError());//错误自动跳转
				}
				else
				{
				//这里注意，我们已经设置好了表前缀，但是使用
				//table()的话是要完整表名的，表前缀无效，所以这里使用name()
				$result=Db::name('cate')->insert($data);
				if($result)
				{
					return $this->success('添加栏目成功','lst');
				}
				else
				{
					return $this->error('栏目插入失败');
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
			$re=Db::name('cate')->delete($id);
			if($re)
			{
				$this->success('成功删除该栏目','admin/cate/lst');
			}
			else
			{
				$this->error('删除栏目失败');

			}

			
			
			
			

		}
		public function edi()
		{
			$id=input('param.id');
			$data=Db::name('cate')->select($id);
			$this->assign('cate',$data);

					//判断是否有post的数据传输
			if(request()->isPost())
			{
				//进行数据的包装
				$data=
				[
					'id'=>$id,
				    'catename'=>input('catename')
				];
				//进行数据的判断
				$validate=validate('Cate');
				if(!$validate->scene('add')->check($data))
				{
					$this->error($validate->getError());//错误自动跳转
				}
				else
				{
				//这里注意，我们已经设置好了表前缀，但是使用
				//table()的话是要完整表名的，表前缀无效，所以这里使用name()
				$result=Db::name('cate')->where('id',$id)->update($data);
				if($result)
				{
					return $this->success('更新栏目名称成功','lst');
				}
				else
				{
					return $this->error('错误操作，栏目更新失败');
				}
				}

			}

			else{
				return $this->fetch();
			}
		}
		//登录
		// public function login()
		// {

		// 		//判断是否有post的数据传输
		// 	if(request()->isPost())
		// 	{
		// 		//获取登录名
		// 		$username=input('username');
		// 		$password=input('password');
		// 		//进行数据的包装
		// 		$data=
		// 		[
		// 		    'username'=>$username,
		// 			'password'=>$password
		// 		];
		// 		//进行数据的判断
		// 		$validate=validate('User');
		// 		if(!$validate->scene('add')->check($data))
		// 		{
		// 			$this->error($validate->getError());//错误自动跳转
		// 		}
		// 		else
		// 		{
		// 		//这里注意，我们已经设置好了表前缀，但是使用
		// 		//table()的话是要完整表名的，表前缀无效，所以这里使用name()
		// 		$result=Db::name('admin')->where('username',$username)->select();
		// 		if($result[0]['password']==$password)
		// 		{
		// 			$this->success('登录成功','lst');

		// 		}
		// 		else
		// 		{
		// 			$this->error('用户名或者密码错误！');
		// 		}
		// 		}

		// 	}

		// 	else{
		// 		return $this->fetch();
		// 	}

		// }
		
	}
		
		