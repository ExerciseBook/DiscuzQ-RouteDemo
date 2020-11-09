# 概述
Discuz Q 二开样例 - 添加自己的路由

# 配置
1. 使用指令 `composer require exercisebook/discuzq-routedemo` 下载本库。
2. 在 `config/config.php` 中的 `providers` 添加 `ExerciseBook\DiscuzQRouteDemo\RouteProvider::class` 使得 DiscuzQ 可以正常加载本库。
3. 将 `route/web.php` 中的 `$route->get('/{other:.*}', 'other', \App\Http\Controller\IndexController::class);` 这行注释掉以确保路由不冲突。

# 代码流程解释

## 对于 API 路由
1. 官方文档： <https://discuz.com/docs/api.html>
1. 先看 `RouteProvider.php` 文件中的 `boot()` 函数。
2. 再看 `TestApiController.php`。
3. 最后看 `TestApiSerializer.php`。

## 对于页面路由
1. 先看 `RouteProvider.php` 文件中的 `boot()` 函数。
2. 再看 `TestViewController.php`。
