<?php
 namespace app\admin\validate; //规则的验证器
 use think\Validate;
 class AuthRuleAdd extends Validate
 {
 	//书写验证规则
 	protected $rule = [
                        'title' => 'require|unique:auth_rule|max:25',
                         'name' => 'require|unique:auth_rule',
                         'name' =>'/^.[a-z]{1,}\/[a-z]{1,}.$/'
                         
                       ];
    //书写报错信息
   protected $message = [
						'title.max'  =>'该名称最多25个字符',
						'title.require' => '规则名称必须填写',
						'title.unique'=>'该规则名称已经存在',
						'name.require' =>'控/方必须填写',
						'name.unique' =>'该控/方已经存在了',
						'name'  =>'控/方格式不正确'

						];
	//书写验证场景
	protected $scene =[
			'add' =>['title','name'],
			'edi' =>['title.require','title.max','name','name.req ']


	];
  

 }