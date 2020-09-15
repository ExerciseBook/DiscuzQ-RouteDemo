<?php

namespace ExerciseBook\DiscuzQRouteDemo;

use Discuz\Http\RouteCollection;
use Discuz\Foundation\AbstractServiceProvider;

class RouteProvider extends AbstractServiceProvider
{
    /**
     * 注册服务.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * @param string $string
     * @param $default
     * @return mixed
     */
    public function get_config($app, string $string, $default)
    {
        return (Arr::get(app()['discuz.config'], $string, $default));
    }

    /**
     * @return RouteCollection
     */
    private function getRoute()
    {
        return $this->app->make(RouteCollection::class);
    }

    /**
     * 启动函数
     */
    public function boot()
    {
        // 获取路由控制器
        $route = $this->getRoute();

        // 添加一个路由组
        $route->group('/api/route-demo', function (RouteCollection $route) {
            // 添加一个路由
            $route->get('/api-demo', 'routedemo.apidemo', ApiTestController::class);
        });
    }
}
