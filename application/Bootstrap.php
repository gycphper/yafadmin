<?php
use Yaf\Application;
use Yaf\Registry;
use Yaf\Dispatcher;
use Yaf\Bootstrap_Abstract;
use Predis\Client;
use Yaf\Loader;
use Illuminate\Container\Container as LContainer;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher as LDispatcher;
/**
 * @name Bootstrap
 * @author gyc
 * @desc 所有在Bootstrap类中, 以_init开头的方法, 都会被Yaf调用,
 * @see http://www.php.net/manual/en/class.yaf-bootstrap-abstract.php
 * 这些方法, 都接受一个参数:Yaf_Dispatcher $dispatcher
 * 调用的次序, 和申明的次序相同
 */
class Bootstrap extends Bootstrap_Abstract {

    private $config;

    public function _initConfig(){
        //把配置保存起来
        $this->config = Application::app()->getConfig();
        Registry::set('config', $this->config);
    }
    /**
    注册错误调试模式功能
     */
    public function _initError(){
        $config_all = $this->config->application->toArray();
        if ($config_all['debug']) {
            define('DEBUG_MODE', false);
            ini_set('display_errors', 'On');
            error_reporting(E_ERROR);//致命错误显示
        } else {
            define('DEBUG_MODE', false);
            ini_set('display_errors', 'Off');
        }
    }

	public function _initPlugin(Dispatcher $dispatcher) {
		//注册一个插件
        // 注册视图路径
        $dispatcher->registerPlugin(new TwigPlugin());
	}

	public function _initRoute(Dispatcher $dispatcher) {
		//在这里注册自己的路由协议,默认使用简单路由
        $router = $dispatcher->getRouter();
        $router->addConfig(Registry::get("config")['routes']);
	}
	
	public function _initView(Dispatcher $dispatcher) {
		//在这里注册自己的view控制器
	}

    /**
     * 注册composer autoload
     */
    public function _initAutoload(){
        Loader::import(ROOT_PATH.DS.'vendor'.DS.'autoload.php');
    }

    /**
     * 注册Redis
     */
    public function _initRedis(){
        $config = $this->config->redis->toArray();
        $client = new Client([
            'host' => $config['host'],
            'port' => $config['port']
        ],['prefix' => $config['prefix']]);
        Registry::set('redis',$client);
    }

    /**
     * 注册本地类前缀
     */
    public function _initLocalNamespace(){
        $namespace = [
            'Base',
            'Common',
            'Validate'
        ];
        Loader::getInstance()->registerLocalNamespace($namespace);
    }

    /**
     * 注册公共函数库
     */
    public function _initCommonFunctions(){
        Loader::import(APPLICATION_PATH.DS.'application/library/Common/Functions.php');
    }

    // 初始化 Eloquent ORM
    public function _initDefaultDbAdapter(Dispatcher $dispatcher)
    {
        $capsule = new Capsule();
        $capsule->addConnection($this->config->database->toArray());
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    /**
     * 初始化 illuminate/database
     */
    public function _initDbAdapter() {
        $databaseConfig = $this->config->database->toArray();
        $capsule = new Capsule();
        $capsule->addConnection($databaseConfig);

        // Set the event dispatcher used by Eloquent models...
        $capsule->setEventDispatcher(new LDispatcher(new LContainer));

        // Make this Capsule instance available globally via static methods...
        $capsule->setAsGlobal();

        // Setup the Eloquent ORM...
        $capsule->bootEloquent();
        // 定义 DB 别名，方便使用 DB facade
        class_alias('Illuminate\Database\Capsule\Manager', 'DB');
    }
}
