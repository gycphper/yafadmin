<?php
/**
 * @name ErrorController
 * @desc 错误控制器, 在发生未捕获的异常时刻被调用
 * @see http://www.php.net/manual/en/yaf-dispatcher.catchexception.php
 * @author gyc
 */

class ErrorController extends Base_Controllers {

    public function errorAction($exception) {
        $this->getView()->assign("exception", $exception->getMessage());
    }
}
