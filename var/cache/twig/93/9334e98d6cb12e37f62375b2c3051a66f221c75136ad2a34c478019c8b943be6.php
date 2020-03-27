<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* login//index.twig */
class __TwigTemplate_3f91ed304a3e97f3ee22f5f5df6d931cdeb687ed12fd30e496b1529abde1366b extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "login/base.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("login/base.twig", "login//index.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        // line 4
        echo "<div class=\"layadmin-user-login-box layadmin-user-login-body layui-form\">
    <form action=\"/login/login\" method=\"post\">
        <div class=\"layui-form-item\">
            <label class=\"layadmin-user-login-icon layui-icon layui-icon-username\" for=\"LAY-user-login-username\"></label>
            <input type=\"text\" name=\"username\" lay-verify=\"required\" placeholder=\"用户名\" class=\"layui-input\">
        </div>
        <div class=\"layui-form-item\">
            <label class=\"layadmin-user-login-icon layui-icon layui-icon-password\" for=\"LAY-user-login-password\"></label>
            <input type=\"password\" name=\"password\"  lay-verify=\"required\" placeholder=\"密码\" class=\"layui-input\">
        </div>
        <div class=\"layui-form-item\">
            <div class=\"layui-row\">
                <div class=\"layui-col-xs7\">
                    <label class=\"layadmin-user-login-icon layui-icon layui-icon-captcha\" for=\"LAY-user-login-captcha\"></label>
                    <input type=\"text\" name=\"captcha\" id=\"LAY-user-login-captcha\" lay-verify=\"required\" placeholder=\"图形验证码\" class=\"layui-input\">
                </div>
                <div class=\"layui-col-xs5\">
                    <div style=\"margin-left: 10px;\">
                        <img src=\"/login/captcha\" onclick=\"this.src='/login/captcha/?'+Math.random()\" class=\"layadmin-user-login-codeimg\" id=\"LAY-user-get-captcha\">
                    </div>
                </div>
            </div>
        </div>
        <div class=\"layui-form-item\">
            <button type=\"submit\" class=\"layui-btn layui-btn-fluid\" lay-submit lay-filter=\"\">登 入</button>
        </div>
    </form>
</div>
";
    }

    public function getTemplateName()
    {
        return "login//index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 4,  39 => 3,  29 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% extends'login/base.twig' %}

{% block content %}
<div class=\"layadmin-user-login-box layadmin-user-login-body layui-form\">
    <form action=\"/login/login\" method=\"post\">
        <div class=\"layui-form-item\">
            <label class=\"layadmin-user-login-icon layui-icon layui-icon-username\" for=\"LAY-user-login-username\"></label>
            <input type=\"text\" name=\"username\" lay-verify=\"required\" placeholder=\"用户名\" class=\"layui-input\">
        </div>
        <div class=\"layui-form-item\">
            <label class=\"layadmin-user-login-icon layui-icon layui-icon-password\" for=\"LAY-user-login-password\"></label>
            <input type=\"password\" name=\"password\"  lay-verify=\"required\" placeholder=\"密码\" class=\"layui-input\">
        </div>
        <div class=\"layui-form-item\">
            <div class=\"layui-row\">
                <div class=\"layui-col-xs7\">
                    <label class=\"layadmin-user-login-icon layui-icon layui-icon-captcha\" for=\"LAY-user-login-captcha\"></label>
                    <input type=\"text\" name=\"captcha\" id=\"LAY-user-login-captcha\" lay-verify=\"required\" placeholder=\"图形验证码\" class=\"layui-input\">
                </div>
                <div class=\"layui-col-xs5\">
                    <div style=\"margin-left: 10px;\">
                        <img src=\"/login/captcha\" onclick=\"this.src='/login/captcha/?'+Math.random()\" class=\"layadmin-user-login-codeimg\" id=\"LAY-user-get-captcha\">
                    </div>
                </div>
            </div>
        </div>
        <div class=\"layui-form-item\">
            <button type=\"submit\" class=\"layui-btn layui-btn-fluid\" lay-submit lay-filter=\"\">登 入</button>
        </div>
    </form>
</div>
{% endblock %}", "login//index.twig", "/home/wwwroot/yaf_demo/application/views/login/index.twig");
    }
}
