<?php
 namespace app\admin\validate; //用户的验证器
 use think\Validate;
 class Admin extends Validate
 {
 	//书写验证规则
 	protected $rule = [
                        'username' => '/^[a-zA-Z0-9_-]{4,16}$/',
                        'username'=>'require|unique:admin',
                         'password' => 'require|length:6,20',
                         'phone' =>'/^((13[0-9])|(14[5|7])|(15([0-3]|[5-9]))|(18[0,5-9]))\d{8}$/'
                       ];
    //书写报错信息
   protected $message = [
						'username'  =>'用户名4到16位（字母，数字，下划线，减号）',
						'username.unique'=>'用户名不得重复',
						//'password.alphaNum' => '密码只能包含数字和字母',
						'password' => '密码6到12位',
						'phone' =>'手机不符合规则'

						];
	//书写验证场景
	protected $scene =[
			'add' =>['username','password'],


	];
  

 }