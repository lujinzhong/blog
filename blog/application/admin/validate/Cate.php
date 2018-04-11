<?php
 namespace app\admin\validate; //用户的验证器
 use think\Validate;
 class Cate extends Validate
 {
 	//书写验证规则
 	protected $rule = [
                        'catename'=>'require|unique:cate|max:25'
                       ];
    //书写报错信息
   protected $message = [
						'catename.require'  =>'栏目名必须填写',
						'catename.unique'=>'栏目名不得重复',
						'catename.max'=>'栏目名不能超过25个字节'

						];
	//书写验证场景
	protected $scene =[
			'add' =>['catename','password'],


	];
  

 }