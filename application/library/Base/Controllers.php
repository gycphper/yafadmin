<?php
/**
 * Created by PhpStorm.
 * User: gyc
 * Date: 2020/3/26
 * Time: 下午5:07
 */
use Yaf\Controller_Abstract;
Class Base_Controllers extends Controller_Abstract{

    public function init()
    {
        $session_id = getSession('admin');
        if(empty($session_id)){
            $this->redirect('/login/index');
        }
    }
}
