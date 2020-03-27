<?php
/**
 * @name IndexController
 * @author gyc
 * @desc 默认控制器
 * @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */
class IndexController extends Base_Controllers {

	public function indexAction() {
//	    $user = new UserModel();
//	    $user->username = "郭亚超";
//	    $user->phone = "15538177309";
//	    $user->name = "管理员";
//	    $user->email = "727306285@qq.com";
//	    $user->password = "123456";
//	    $user->uuid = "";
//        $res = $user->save();
        //$num = UserModel::where('id',8)->update(['username'=>'铝合金','id'=>8]);
        //dd($num);
        //$user = UserModel::find(8);
        //$user->username = "郭亚超";
        //->save();
        //$data = DB::table('icons')->paginate(10);
        $this->getView()->render('index/index.twig');
        return false;
	}
}
