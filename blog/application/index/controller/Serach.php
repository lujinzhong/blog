<?php
		namespace app\index\controller;
		use app\index\controller\Base;
        use think\Db;
		class Serach extends Base
		{
		public function index()
		{
			
		     $keywords=input('keywords');
		     //进行数据库关键字模糊搜索
		     $data=Db::name('article')->where('keywords','like',"%$keywords%")->alias('a')->join('cate c','c.id=a.cateid')->field('a.id,a.time,a.desc,a.title,a.pic,a.author,a.state,a.click,a.cateid,a.keywords,c.catename')->paginate(5);
		   
		  
		     
		     	$this->assign('list',$data);
		     	$this->assign('keys',$keywords);
		     	return $this->fetch('index');
		     
		}
		
	}
		
		