<?php
/**
 * Created by PhpStorm.
 * User: gyc
 * Date: 2020/3/26
 * Time: 下午4:08
 */
/**
 * 常量
 */

date_default_timezone_set("Asia/Shanghai");

// 目录分隔符
define('DS', DIRECTORY_SEPARATOR);

// 项目目录
define('ROOT_PATH', dirname(__DIR__));

// 时间常量
define('CUR_DATE', date('Y-m-d'));
define('CUR_DATETIME', date('Y-m-d H:i:s'));
define('CUR_TIMESTAMP', time());

// 数据库常量
define('TB_PK', 'id');   // 表主键
define('TB_PREFIX', 'zdr_'); // 表前缀

// 日志目录
define('LOG_PATH', ROOT_PATH . DS . 'var' . DS . 'logs');
define('CACHE_PATH', ROOT_PATH . DS . 'var' . DS . 'cache');
