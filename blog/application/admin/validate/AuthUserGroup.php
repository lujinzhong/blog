<?php
 namespace app\admin\validate; //规则的验证器
 use think\Validate;
 class AuthUserGroup extends Validate
 {
 	//书写验证规则
 	protected $rule = [
                        'title' => 'require|unique:auth_group|max:25',
                        'rules'=>'\d+(,\d+)*',
                        'rules'=>'require'
                       ];
    //书写报错信息
   protected $message = [
						'title.max'  =>'该名称最多25个字符',
						'title.require' => '名称必须填写',
						'title.unique'=>'该名称已经存在',
						'rules'  =>'权限格式不正确',
						'rules.require'=>'权限必须填写'

						];
	//书写验证场景
	protected $scene =[
			'add' =>['title','rules','rules.require'],
			'edi' =>['title.require','title.max','rules','rules.require ']


	];
  

 }