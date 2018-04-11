<?php
		namespace app\index\controller;

		use app\index\controller\Base;
		use think\Db;
	class Cate extends Base
	{
		public function index()
		{
	
			//获取所选文章的cateid
			$cateid=input('param.cateid');
			//根据获取的id展示所选栏目的文章
			 //关联查询所有的文章
		  $data=Db::name('article')->where('cateid',$cateid)->alias('a')->join('cate c','c.id=a.cateid')->field('a.id,a.time,a.desc,a.title,a.pic,a.author,a.state,a.click,a.cateid,a.keywords,c.catename')->paginate(5);
			//传数据

		  $this->assign('list',$data);
		   return $this->fetch('cate');

		}
	}
		
		