<?php
/**
 * Created by PhpStorm.
 * User: gyc
 * Date: 2020/3/27
 * Time: 上午9:00
 */
use Yaf\Controller_Abstract;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
class LoginController extends Controller_Abstract
{

    public function indexAction()
    {
        $this->display('/index');
        return false;
    }

    public function loginAction(){
        $captcha = $this->getRequest()->getPost('captcha');
        if(getSession('captcha') == $captcha){
            return _success('','验证码正确');
        }else{
            return _error('验证码输入错误');
        }
    }

    /**
     * 生成验证码
     */
    public function captchaAction(){
        $phraseBuilder = new PhraseBuilder(4);
        $phraseBuilder->build(4);
        $builder = new CaptchaBuilder(null,$phraseBuilder);
        //设置高、宽
        $builder->build($width = 100,$height = 35,$font = null);
        $builder->setBackgroundColor(255,251,240);
        $phrase = $phraseBuilder->niceize($builder->getPhrase());
        //存入session
        setSession('captcha',$phrase);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
        return false;
    }

}