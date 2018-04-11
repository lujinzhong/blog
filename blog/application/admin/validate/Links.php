<?php
 namespace app\admin\validate; //用户的验证器
 use think\Validate;
 class Links extends Validate
 {
 	//书写验证规则
 	protected $rule = [
                        'title' => 'require|unique:links|max:25',
                         'url' => 'url|unique:links',
                         'desc' =>'max:25'
                       ];
    //书写报错信息
   protected $message = [
						'title'  =>'标题最多25个字符',
						//'password.alphaNum' => '密码只能包含数字和字母',
						'url.url' => 'url不正确，请正确填写',
						'url.unique'=>'url已经存在'
						'desc' =>'描述最大25个字符'

						];
	//书写验证场景
	protected $scene =[
			'add' =>['title','url','desc'],


	];
  

 }