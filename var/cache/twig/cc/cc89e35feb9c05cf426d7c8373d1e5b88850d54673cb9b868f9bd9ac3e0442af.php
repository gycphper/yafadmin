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

/* login/base.twig */
class __TwigTemplate_661a7069724638ef401bc24c23903f6c55f024cf8331e523c72c264834b01f7e extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"utf-8\">
    <title>后台登录</title>
    <meta name=\"renderer\" content=\"webkit\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0\">
    <link rel=\"stylesheet\" href=\"/static/js/layui/css/layui.css\" media=\"all\">
    <link rel=\"stylesheet\" href=\"/static/css/admin.css\" media=\"all\">
    <link rel=\"stylesheet\" href=\"/static/css/login.css\" media=\"all\">
</head>
<body>

<div class=\"layadmin-user-login layadmin-user-display-show\" >

    <div class=\"layadmin-user-login-main\">
        <div class=\"layadmin-user-login-box layadmin-user-login-header\">
            <h2>后台管理系统</h2>
        </div>
        ";
        // line 21
        $this->displayBlock('content', $context, $blocks);
        // line 22
        echo "    </div>
</div>

<script src=\"/static/js/layui/layui.js\"></script>
<script>
    layui.config({
        base: '/static/js/' //静态资源所在路径
    }).use(['layer'],function () {
        var layer = layui.layer;
    })
</script>
</body>
</html>";
    }

    // line 21
    public function block_content($context, array $blocks = [])
    {
    }

    public function getTemplateName()
    {
        return "login/base.twig";
    }

    public function getDebugInfo()
    {
        return array (  71 => 21,  55 => 22,  53 => 21,  31 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
<head>
    <meta charset=\"utf-8\">
    <title>后台登录</title>
    <meta name=\"renderer\" content=\"webkit\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0\">
    <link rel=\"stylesheet\" href=\"/static/js/layui/css/layui.css\" media=\"all\">
    <link rel=\"stylesheet\" href=\"/static/css/admin.css\" media=\"all\">
    <link rel=\"stylesheet\" href=\"/static/css/login.css\" media=\"all\">
</head>
<body>

<div class=\"layadmin-user-login layadmin-user-display-show\" >

    <div class=\"layadmin-user-login-main\">
        <div class=\"layadmin-user-login-box layadmin-user-login-header\">
            <h2>后台管理系统</h2>
        </div>
        {% block content %}{% endblock content %}
    </div>
</div>

<script src=\"/static/js/layui/layui.js\"></script>
<script>
    layui.config({
        base: '/static/js/' //静态资源所在路径
    }).use(['layer'],function () {
        var layer = layui.layer;
    })
</script>
</body>
</html>", "login/base.twig", "/home/wwwroot/yafadmin/application/views/login/base.twig");
    }
}
