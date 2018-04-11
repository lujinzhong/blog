<?php
		namespace app\index\controller;

		use app\index\controller\Base;
		use think\Db;
	class Article extends Base
		{
		public function index()
		{

			//获取所选文章的的id
			$article_id=input('param.id');
			//传进来后点击数应该加一
			$num=Db::name('article')->where('id',$article_id)->setInc('click');
			//从数据库调取该文章
			$wenzhang=Db::name('article')->where('id',$article_id)->select();
            //根据获取的文章栏目进行匹配到相关的阅读
			$article_about=Db::name('article')->where('cateid',$wenzhang[0]['cateid'])->limit(10)->select();
		
			//给模板传数据
			$this->assign('article_about',$article_about);
			$this->assign('article',$wenzhang);
			//获取对应的栏目名
			$lanmu=Db::name('cate')->where('id',$wenzhang[0]['cateid'])->select();
			//给模板传数据
			$this->assign('lanmu',$lanmu);
            // 这里查找被推荐的文章(最多8条，按发表时间顺序排列)
            $commend=Db::name('article')->where('state','1')->order('time')->limit(8)->select();
            //给模板传数据
            $this->assign('commend',$commend);
		    return $this->fetch('article');

		}
	}
		
		