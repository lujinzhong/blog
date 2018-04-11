<?php
		namespace app\admin\controller;

		use think\Controller;
		use think\Db;
		use app\admin\controller\Base;
		class AuthUserGroup extends Base
		{
		//用户列表页
		public function lst()
		{
		 //直接获取对应规则表的对应id和title
		 $rules=Db::name('auth_rule')->select();
		 $this->assign('rules',$rules);
		 //获取所有用户
		 //$r=Db::name('admin')->select();
		//计算有多少个用户组
		// $num_group=Db::name('auth_group')->count('id');
		// //先查出对应的规则
		// $rule_array=Db::name("auth_group")->select();
		// //进行字符串切割，放进二维数组$array_rule中
		// for($i=0;$i<$num_group;$i++)
		// {
		//  $array_rule[$i]=explode(',', $rule_array[$i]['rules'],-1);
		// }
		// //将权限id转换成权限title,先查询规则表
		// $num_rule=Db::name('auth_rule')->count();
  //       $auth_rules=Db::name('auth_rule')->field('id,title,status')->select();
  //       // echo '$num_group:'; dump($num_group);//2
  //       // echo '$num_rule:';  dump($num_rule);//6
  //       // echo '$array_rule:';dump($array_rule);
  //       // echo '$auth_rules:';dump($auth_rules);
  //       //先把规则表的id作为数组下标，title值作为数组元素值
  //       for($i=0;$i<$num_rule;$i++)
  //       {
  //       	$arr[$auth_rules[$i]['id']]=$auth_rules[$i]['title'];
  //       }
  //       //echo '$arr:';dump($arr);
      
  //       for($i=0;$i<$num_group;$i++) //有几个用户组就循环几次
  //       {
  //       	for($b=0;$b<$num_rule+40;$b++)//这里避免有非顺序id的出现
  //       	{
  //       		if(!empty($array_rule[$i][$b]))//规则id从1开始的，所以没问题
  //       		{
  //       		 $array_rule[$i][$b]=$arr[(int)$array_rule[$i][$b]];//id对应
  //       		}
  //       		//(1)$array_rule[0][0]=$arr[1](增加管理员)
  //       		//(2)$array_rule[0][1]=$arr[2]()
  //       		//(3)$array_rule[0][2]=$arr[3]()
  //       		//(4)$array_rule[0][3]=$arr[4]()

  //       	}
        	
  //       }
        //传标签数据
        // $this->assign('label',$array_rule);//该数组为对应id的对应规则名称
       //echo '$array_rule:'; dump($array_rule);die;

		//关联查询
		// $list=Db::name("auth_group")->alias('a')->join('auth_rule r' ,a.)
		 //分页显示不需要获取数据，使用model直接获取对应表的数据
		$list=Db::name('auth_group')->paginate(3);
		// $list=AuthRuleAddModel::paginate(3);
		 //传数据
		 $this->assign('result',$list);
		 //加载界面
		 return $this->fetch();

		}
		//添加页
		public function add()
		{
			//直接获取对应规则表的对应id和title
		    $rules=Db::name('auth_rule')->select();
		    $this->assign('rules',$rules);
		    //获取规则的id,数组索引从0开始
		    for($i=0;$i<count($rules);$i++)
		    {
		    	$rule_id[$i]=$rules[$i]['id'];
		    }
			//判断是否有post的数据传输
			if(request()->isPost())
			{
				//判断状态
				//进行数据的包装
				$data=
				[
					'title'=>input('title'),
					'rules'=>input('rules'),
				];
				//如果状态为未启动则手动设置其值
				if(!isset($_POST['status']))
				{
					$data['status']=0;
				}
				//进行数据的判断
				$validate=validate('AuthUserGroup');
				if(!$validate->scene('add')->check($data))
				{
					$this->error($validate->getError());//错误自动跳转
				}
				else
				{
				 //进行用户规则是否乱填

					//根据 ，切割数组
					$rules_input=explode(',', $data['rules']);
					//删除重复的元素
					$rules_input=array_unique($rules_input);
					// dump($rules_input);
					//重新排数组下标从0开始
					$rules_input=array_values($rules_input);
					// dump($rules_input);
					for($i=0;$i<count($rules_input);$i++)
					{
						if(!in_array($rules_input[$i], $rule_id))
						{
							$this->error('请不要输入无效的规则id');
						}

					}
				//这里注意，我们已经设置好了表前缀，但是使用
				//table()的话是要完整表名的，表前缀无效，所以这里使用name()
				$result=Db::name('auth_group')->insert($data);
				if($result)
				{
					return $this->success('添加用户组成功','lst');
				}
				else
				{
					return $this->error('用户组插入失败');
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
			if($id==1)
			{
				$this->error("该超级管理员组不可删除");
			}
			$re=Db::name('auth_rule')->delete($id);
			if($re)
			{
				$this->success('成功删除该用户组','admin/auth_user_group/lst');
			}
			else
			{
				$this->error('删除该用户组失败');

			}

		}
		public function edi()
		{
			//直接获取对应规则表的对应id和title
		    $rules=Db::name('auth_rule')->select();
		    $this->assign('rules',$rules);
		    //根据id查询
			$id=input('param.id');
			$data=Db::name('auth_group')->select($id);
			$this->assign('group',$data);

			//判断是否有post的数据传输
			if(request()->isPost())
			{
				//进行数据的包装
				$data=
				[
				    'title'=>input('title'),
					'rules'=>input('rules')
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
				$validate=validate('AuthUserGroup');
				if(!$validate->scene('edi')->check($data))
				{
					$this->error($validate->getError());//错误自动跳转
				}
				else
				{

				//这里注意，我们已经设置好了表前缀，但是使用
				//table()的话是要完整表名的，表前缀无效，所以这里使用name()
				$result=Db::name('auth_group')->where('id',$id)->update($data);

				 $this->success('修改用户组成功','lst');
				
				}

			}

			else{
				return $this->fetch();
			}
		}
		
	}
		
		