<?php
		namespace app\admin\controller;

		use think\Controller;
		use think\Db;
		use app\admin\model\Article as ArticleModel;
		use app\admin\controller\Base;
		class Article extends Base
		{
		//用户列表页
		public function lst()
		{
		 //获取所有用户
		 //$r=Db::name('admin')->select();
		 //分页显示不需要获取数据，使用model直接获取对应表的数据
		 
		 // $list=ArticleModel::paginate(3);

		//在这里使用关联查询获取栏目名(这句要好好学)
	    $list=Db::name('article')->alias('a')->join('cate c','c.id=a.cateid')->field('a.id,a.title,a.pic,a.author,a.state,c.catename')->paginate(3);
		 //传数据
		 $this->assign('result',$list);
		 //加载界面
		 return $this->fetch();

		}
		//添加页
		public function add()
		{
			//获取已有的栏目分类
			$cateres=Db::name('cate')->select();
			$this->assign('cateres',$cateres);
			//判断是否有post的数据传输
			if(request()->isPost())
			{
				
               
                $validate=validate('Article'); //使用助手函数实例化
                
                
				if($_FILES['pic']['tmp_name'])//是否有图片上传
				{
					$file =request()->file('pic');
				  	 //在这里单独验证图片
					if(!$validate->scene('pic')->check('$file'))
				    {
					$this->error($validate->getError());//错误自动跳转
					die;
				    }
					//进行图片的保存
					// 移动到框架应用根目录/public/static/uploads/ 目录下
					$info = $file->move(ROOT_PATH . 'public' . DS . 'static/uploads');
						if($info){
						$path=$info->getSaveName();
                        
						}
						else
						{
						// 上传失败获取错误信息
						echo $file->getError();
						}
				     }
				   //不上传采用默认图片 	
				else{
					$path='default.png'; 
					//采用默认图片路径
					
				}
				
				//进行数据的包装
				$data=
				[
				    'title'=>input('title'),
					'author'=>input('author'),
					'content'=>input('content'),
					'cateid'=>input('cateid'),
					'desc'=>input('desc'),
					'pic'=>$path,
					'keywords'=>input('keywords'),
					'time'=>time()
				];
				//如果未选分类
				// if($data['cateid']==0)
				// {
				// 	$data['cateid']='未选分类';
				// }
				//根据返回的值判断是否推荐，1为推荐，0为不推荐
				if(input('state')=='on')
				{
					$data['state']=1;
				}
				else
				{
					$data['state']=0;
				}
				//进行数据的判断
				
				if(!$validate->scene('add')->check($data))
				{
					$this->error($validate->getError());//错误自动跳转
				}
				else
				{
				//这里注意，我们已经设置好了表前缀，但是使用
				//table()的话是要完整表名的，表前缀无效，所以这里使用name()
				$result=Db::name('Article')->insert($data);
				if($result)
				{
					return $this->success('添加文章成功','lst');
				}
				else
				{
					return $this->error('文章添加失败');
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
			$re=Db::name('Article')->delete($id);
			if($re)
			{
				$this->success('成功删除该文章','admin/Article/lst');
			}
			else
			{
				$this->error('删除文章失败');

			}
		}
		public function edi()
		{
			

			$id=input('param.id');
			//使用关联查询
			// $data=Db::name('article')->where('id',$id)->alias('a')->join('cate c','c.id==a.cateid')->field('a.title,a.author,c.catename,a.keywords,a.desc,a.state,a.content');
			$datas=Db::name('article')->select($id);
			$this->assign('article',$datas);
			//返回栏目选项
			$cates=Db::name('cate')->select();
			$this->assign('cates',$cates);
			//判断是否有post的数据传输
			if(request()->isPost())
			{
				//进行数据的包装
				$data=
				[
					'id'=>$id,
				    'title'=>input('title'),
					'author'=>input('author'),
					'content'=>input('content'),
					'cateid'=>input('cateid'),
					'desc'=>input('desc'),
					'keywords'=>input('keywords'),
					'time'=>time()

				];
				if(input('state')=='on')
				{
					$data['state']=1;
				}
				else
				{
					$data['state']=0;
				}
				if($_FILES['pic']['tmp_name'])//如果要修改新的图片
				{
					//这里要写绝对路径，不然删不掉，我也不晓得为啥
					$picstr='F:/phpstudy/WWW/tp5/public/static/uploads/'.$datas[0]['pic'];

					@unlink($picstr); //删除原图片
				   //然后上传新的图片
					$newfile=request()->file('pic');
					$newinfo = $newfile->move(ROOT_PATH . 'public' . DS . 'static/uploads');
					$newpath=$newinfo->getSaveName();
					$data['pic']=$newfile;
					
				}
				//进行数据的判断
				$validate=validate('Article');
				if(!$validate->scene('edi')->check($data))
				{
					$this->error($validate->getError());//错误自动跳转
				}
				else
				{
				//这里注意，我们已经设置好了表前缀，但是使用
				//table()的话是要完整表名的，表前缀无效，所以这里使用name()
				//注意要验证的是文件，而不是文件名，下面我再修改$data['pic']
				//$data['pic']=$newpath;
				$result=Db::name('article')->where('id',$id)->update($data);
				if($result)
				{
					return $this->success('修改文章成功','lst');
				}
				else
				{
					return $this->error('修改文章失败');
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
		
		