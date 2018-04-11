<?php
 namespace app\index\controller;
 use think\Controller;
 use think\Db;
 class Base extends Controller
 {
 	public function _initialize()  //初始化函数
 	{
 		//查询所有的标签
		  $cates=Db::name('cate')->select();
		  //给模板传数据
		  $this->assign('cates',$cates);
		  //关联查询所有的文章
		  $list=Db::name('article')->alias('a')->join('cate c','c.id=a.cateid')->field('a.id,a.time,a.desc,a.title,a.pic,a.author,a.state,a.keywords,a.click,a.cateid,c.catename')->paginate(5);
		  //传数据
		  $this->assign('articles',$list);
		   //对关键字进行字符串切割处理
		   //计算有多少条文章
		  $num_article=Db::name('article')->count();
		  $this->assign('num_article',$num_article);
		  //因为上面的结果分页了，所以会造成id不存在，在这里重新查询不分页
		  $data=Db::name('article')->alias('a')->join('cate c','c.id=a.cateid')->field('a.id,a.time,a.desc,a.title,a.pic,a.author,a.state,a.keywords,a.click,a.cateid,c.catename')->select();
		  
		  for($i=0;$i<$num_article;$i++)
		  {
		  	$list_ex[$i]=explode('，', $data[$i]['keywords']);
		  }
		  //把分割好的关键词数组传到模板
		  $this->assign('list_ex',$list_ex);
		  // dump($list_ex);die;
		  // 这里写热门点击的文章列表
		  $remen=Db::name('article')->order('click')->limit(4)->select();
		  //传数据
		  $this->assign('remen',$remen);
		  // 这里查找被推荐的文章(最多4条，按发表时间顺序排列)
            $con=Db::name('article')->where('state','1')->order('time')->limit(4)->select();
            //给模板传数据
            $this->assign('con',$con);
            //这里查询友情链接,限制为五条
            $l=Db::name('links')->limit(5)->select();
            $this->assign('l',$l);

 	}

 }