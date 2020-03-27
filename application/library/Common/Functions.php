<?php
/**
 * Created by PhpStorm.
 * User: gyc
 * Date: 2020/3/26
 * Time: 下午5:34
 * 公共函数库
 */
use Yaf\Session;

//格式打印
function dd($data){
    echo "<pre>";
    print_r($data);
}

//设置session k/v
function setSession($name,$value){
    return Session::getInstance()->__set($name,$value);
}
//获取session
function getSession($name){
    return  Session::getInstance()->__get($name);
}
//删除制定name的session
function unsetSession($name){
    return Session::getInstance()->__unset($name);
}

/**
 * @param array $data
 * @param string $msg
 * @param int $code
 * @return string
 */
function _success($data = [],$msg = '操作成功',$code = 200)
{
    return _error($msg,$code,$data);
}

/**
 * @param $msg
 * @param $code
 * @param array $data
 * @return string
 */
function _error($msg,$code = '-1',$data = [])
{
    $data = [
        'msg'  => $msg,
        'code' => $code,
        'data' => $data
    ];
    if ('cli' !== PHP_SAPI ){
        header("content-Type: application/json; charset=utf-8");
        die(json_encode($data));
    }
    else {
        die(json_encode($data, JSON_UNESCAPED_UNICODE ));
    }
}

/**
 * @return array|false|string
 * 获取客户端ip
 */
function get_client_ip(){
    if(isset($_SERVER)){
        if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }elseif(isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
    }else{
        //不允许就使用getenv获取
        if(getenv("HTTP_X_FORWARDED_FOR")){
            $ip = getenv( "HTTP_X_FORWARDED_FOR");
        }elseif(getenv("HTTP_CLIENT_IP")) {
            $ip = getenv("HTTP_CLIENT_IP");
        }else{
            $ip = getenv("REMOTE_ADDR");
        }
    }
    return $ip;
}

/**
 * @param $url
 * @param array $post_data
 * @return mixed
 */
function requestPost($url , $post_data = array() ){
    // 1. 初始化一个cURL会话
    $ch = curl_init();
    // 2. 设置请求选项, 包括具体的url
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // 设置请求为post类型
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //不验证证书
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); //不验证证书
    // 添加post数据到请求中
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    // 3. 执行一个cURL会话并且获取相关回复
    $response = curl_exec($ch);
    // 4. 释放cURL句柄,关闭一个cURL会话
    curl_close($ch);
    return $response;
}

/**
 * get请求
 * @param $url
 * @return mixed
 */
function requestGet($url){
    // 1. 初始化一个cURL会话
    $ch = curl_init();
    //设置选项，包括URL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //不验证证书
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); //不验证证书
    //执行并获取HTML文档内容
    $response = curl_exec($ch);
    // 4. 释放cURL句柄,关闭一个cURL会话
    curl_close($ch);
    return $response;
}
