<?php
namespace app\admin\model;
use think\Model;
use app\admin\controller\admin  as admin; //引入admin控制器
use think\Db;
class Login extends Model
{
	public function login($data) //用来验证登录
	{
		//根据传过来的验证名进行密码匹配
		$name=$data['username'];
		$password=$data['password'];
		$i=Db::name('admin')->where('username',$name)->select();
		if($i[0]['password'] == $password)
        {
        	return 1;
        }
        else
        {
        	return 0;
        }

		

	}

}
