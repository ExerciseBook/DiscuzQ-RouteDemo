# 概述
Discuz Q 二开样例 - 添加自己的路由

# 配置
1. `我还不知道`
2. 在 `config/config.php` 中的 `providers` 添加 `ExerciseBook\DiscuzQRouteDemo\RouteProvider::class`
3. 将 `route/web.php` 中的 `$route->get('/{other:.*}', 'other', \App\Http\Controller\IndexController::class);` 这行注释掉。

# 代码流程解释
1. 先看 `RouteProvider.php` 文件中的 `boot()` 函数。
2. 再看 `ApiTest.php`。
3. 最后看 `TestApiSerializer.php`。