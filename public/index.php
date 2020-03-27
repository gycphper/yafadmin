<?php
use Yaf\Application;
define('APPLICATION_PATH', realpath(dirname(__FILE__).'/../'));
include_once __DIR__ .'/../conf/config.php';
$application = new Application( APPLICATION_PATH ."/conf/application.ini");
$application->bootstrap()->run();
