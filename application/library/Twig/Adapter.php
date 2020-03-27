<?php
use Yaf\View_Interface;

/**
 * Class TwigAdapter
 *
 * Twig模板适配
 */
class Twig_Adapter implements View_Interface {
    /** @var \Twig\Loader\FilesystemLoader */
    protected $loader;
    /** @var \Twig\Environment */
    public $twig;
    protected $variables = array();
    /**
     * @param string $templateDir
     * @param array  $options
     */
    public function __construct($templateDir, array $options = array()) {
        $this->loader = new \Twig\Loader\FilesystemLoader($templateDir);
        $this->twig   = new \Twig\Environment($this->loader, $options);
    }
    /**
     * @param string $name
     * @return bool
     */
    public function __isset($name) {
        return isset($this->variables[$name]);
    }
    /**
     * @param string $name
     * @param mixed  $value
     */
    public function __set($name, $value) {
        $this->variables[$name] = $value;
    }
    /**
     * @param string $name
     * @return mixed
     */
    public function __get($name) {
        return $this->variables[$name];
    }
    /**
     * @param string $name
     */
    public function __unset($name) {
        unset($this->variables[$name]);
    }
    /**
     * Return twig instance
     * @return \Twig_Environment
     */
    public function getTwig() {
        return $this->twig;
    }
    /**
     * @param string $name
     * @param mixed $value
     * @return bool
     */
    public function assign($name, $value = null) {
        $this->variables[$name] = $value;
    }
    /**
     * @param string $template
     * @param array  $variables
     * @return bool
     */
    public function display($template, $variables = null) {
        echo $this->render($template, $variables);
    }
    /**
     * @return string
     */
    public function getScriptPath() {
        return $this->loader->getPaths();
    }
    /**
     * @param string $template
     * @param array  $variables
     * @return string
     */
    public function render($template, $variables = null) {
        if ( is_array($variables) ) {
            $this->variables = array_merge($this->variables, $variables);
        }

        return $this->twig->loadTemplate($template)->render($this->variables);
    }
    /**
     * @param string $templateDir
     * @return void
     */
    public function setScriptPath($templateDir) {
        $this->loader->setPaths($templateDir);
    }
    /**
     * @param string $path
     * @return void
     */
    public function addPath($path) {
        $this->loader->addPath($path);
    }
}