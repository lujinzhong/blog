<?php
 namespace app\admin\validate; //用户的验证器
 use think\Validate;
 class Article extends Validate
 {
 	//书写验证规则
 	protected $rule = [
                        'title' => 'require|unique:Article|max:25',
                         'author' => 'require|max:25',
                         'desc' =>'max:80',
                         'keywords'=>'max:30',
                         //
                         'pic'=>'image'

                         // 'pic'=>'fileSize|max:2048000' //大约2m
                       ];
    //书写报错信息
   protected $message = [
						'title'  =>'标题最多25个字符',
						'author' => '作者姓名必须填写，且不能超过25字节',
						'desc' =>'文章描述最大30个字符',
						'keywords.max'=>'关键词最多30个字符',
						'keywords'=>'关键词只能由中文+英文字母的组合，且逗号分隔',
						'pic'=>'上传的不是图片，请重新操作'
						// 'pic.fileSize'=>'上传的图片大小不能超过2m'
						];
	//书写验证场景
	protected $scene =[
			'add' =>['title','author','desc','keywords'],//添加文章(图片单独验证)

			'edi'=>['title','author','desc','keywords','pic'],//修改文章
			 'pic'=>['pic']  //单独验证图片
	];
  

 }