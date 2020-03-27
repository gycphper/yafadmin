<?php
/**
 * Created by PhpStorm.
 * User: gyc
 * Date: 2020/3/26
 * Time: 下午10:10
 */
use Yaf\Plugin_Abstract;
use Yaf\Registry;
use Yaf\Request_Abstract;
use Yaf\Response_Abstract;
use Yaf\Dispatcher;
class TwigPlugin extends Plugin_Abstract{

    public function routerStartup(Request_Abstract $request, Response_Abstract $response) {
    }

    public function routerShutdown(Request_Abstract $request, Response_Abstract $response)
    {
        $config = Registry::get('config')->toArray();
        $dispatcher= Dispatcher::getInstance();
        $twig = '';
        // view 放在module 目录里
        if($request->module==$config['application']['dispatcher']['defaultModule']){
            $twig = new Twig_Adapter(APPLICATION_PATH.'/application/views', $config['twig']);
        } else {
            $twig = new Twig_Adapter(APPLICATION_PATH.'/application/modules/'.$request->module.'/views', $config['twig']);
        }
        $dispatcher->setView($twig);
    }

    public function dispatchLoopStartup(Request_Abstract $request, Response_Abstract $response) {
    }

    public function preDispatch(Request_Abstract $request, Response_Abstract $response) {
    }

    public function postDispatch(Request_Abstract $request, Response_Abstract $response) {
    }

    public function dispatchLoopShutdown(Request_Abstract $request, Response_Abstract $response) {
    }
}
