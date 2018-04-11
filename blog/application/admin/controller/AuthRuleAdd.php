<?php
		namespace app\admin\controller;

		use think\Controller;
		use think\Db;
		use app\admin\controller\Base;
		class AuthRuleAdd extends Base
		{
		//用户列表页
		public function lst()
		{
		 //获取所有用户
		 //$r=Db::name('admin')->select();
		 //分页显示不需要获取数据，使用model直接获取对应表的数据
		$list=Db::name('auth_rule')->paginate(5);
		// $list=AuthRuleAddModel::paginate(3);
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
				//判断状态
				//进行数据的包装
				$data=
				[
					'title'=>input('title'),
					'name'=>input('name'),
				];
				//自动设置type
				$data['type']=1;
				//如果状态为未启动则手动设置其值
				if(!isset($_POST['status']))
				{
					$data['status']=0;
				}
				//进行数据的判断
				$validate=validate('AuthRuleAdd');
				if(!$validate->scene('add')->check($data))
				{
					$this->error($validate->getError());//错误自动跳转
				}
				else
				{

				//这里注意，我们已经设置好了表前缀，但是使用
				//table()的话是要完整表名的，表前缀无效，所以这里使用name()
				$result=Db::name('auth_rule')->insert($data);
				if($result)
				{
					return $this->success('添加权限成功','lst');
				}
				else
				{
					return $this->error('权限插入失败');
				}
				}

			}

			else{
				return $this->fetch();
			}
			
		}
		public function del()
		{
			//删除指定id的用户，get获取
			$id=input('param.id');
			if($id==1|2|3)
			{
				$this->error("该主要权限不可删除");
			}
			$re=Db::name('auth_rule')->delete($id);
			if($re)
			{
				$this->success('成功删除该规则','admin/auth_rule_add/lst');
			}
			else
			{
				$this->error('删除规则失败');

			}

		}
		public function edi()
		{
			$id=input('param.id');
			$data=Db::name('auth_rule')->select($id);
			$this->assign('links',$data);

			//判断是否有post的数据传输
			if(request()->isPost())
			{
				//进行数据的包装
				$data=
				[
				    'title'=>input('title'),
					'name'=>input('name')
				];
				//如果状态为未启动则手动设置其值
				if(!isset($_POST['status']))
				{
					$data['status']=0;
				}
				else
				{
					$data['status']=1;
					
				}
				//进行数据的判断
				$validate=validate('AuthRuleAdd');
				if(!$validate->scene('edi')->check($data))
				{
					$this->error($validate->getError());//错误自动跳转
				}
				else
				{

				//这里注意，我们已经设置好了表前缀，但是使用
				//table()的话是要完整表名的，表前缀无效，所以这里使用name()
				$result=Db::name('auth_rule')->where('id',$id)->update($data);
				
				 $this->success('修改链接成功','lst');
				
				}

			}

			else{
				return $this->fetch();
			}
		}
		
	}
		
		