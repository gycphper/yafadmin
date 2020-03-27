###可以按照以下步骤来部署和运行程序:
#####1.请确保机器已经安装了Yaf框架, 并且已经加载入PHP;

1.下载安装包 [Yaf](https://github.com/laruence/yaf.git) 非解压文件的请自行解压后进入安装包；
2. 执行phpize
3. ./configure --with-php-config=/usr/local/php/bin/php-config
4. make
5. sudo make install
6. 然后修改/usr/local/php/etc/php.ini  加入扩展
    extension=yaf / extension=yaf.so
7. 然后重启php  /etc/int.d/php-fpm reload
8. 检测是否加载扩展  php-m|grep yaf  获取查看phpinfo();
9. 利用yaf生成yaf项目代码
进入yaf下载目录  /tools/cg  执行php yaf_cg demo(demo为项目名自定义) 输出DONE 然后进入output就可以看到代码
####2.把yaf_demo目录Copy到Webserver的目录下;
####3.需要在php.ini里面启用如下配置，生产的代码才能正确运行：
	yaf.environ="develop" 此处是开发环境  生产为product
	yaf.use_namespace = 1 开启命名空间
####4.重启Webserver;
####5.访问http://yourhost/demo/,出现Hellow Word!, 表示运行成功,否则请查看php错误日志;
####6.nginx 相关配置  （虚拟机）:
```
if (!-e $request_filename) {
    rewrite ^/(.*)  /index.php/$1 last;
}
```
####如果使用regex路由出现404  可以使用:
```
if (!-e $request_filename) {
    rewrite ^/(.*)  /index.php?$1 last;
}
```
